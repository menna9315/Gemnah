<?php

namespace Modules\Frontend\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Modules\Frontend\Models\Customer;

class CustomerAuthController
{
    public function showLoginForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('frontend.account');
        }

        return view('frontend::auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('frontend.account');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::guard('customer')->attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $customer = Auth::guard('customer')->user();

        if (! $customer->is_active) {
            Auth::guard('customer')->logout();

            throw ValidationException::withMessages([
                'email' => 'This account is inactive.',
            ]);
        }

        $customer->forceFill([
            'last_login_at' => now(),
        ])->save();

        $request->session()->regenerate();

        return redirect()->intended(route('frontend.account'));
    }

    public function showRegisterForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('frontend.account');
        }

        return view('frontend::auth.register');
    }

    public function register(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('frontend.account');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'phone' => ['nullable', 'string', 'max:30', 'unique:customers,phone'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $customer = Customer::create($data);

        Auth::guard('customer')->login($customer);

        $customer->forceFill([
            'last_login_at' => now(),
        ])->save();

        $request->session()->regenerate();

        return redirect()
            ->route('frontend.account')
            ->with('success', 'Account created successfully.');
    }

    public function account()
    {
        $customer = Auth::guard('customer')->user();

        if (! $customer) {
            return redirect()->route('frontend.login');
        }

        $orders = $this->customerOrders($customer);

        return view('frontend::auth.account', compact('customer', 'orders'));
    }

    public function orders()
    {
        $customer = Auth::guard('customer')->user();

        if (! $customer) {
            return redirect()->route('frontend.login');
        }

        $orders = $this->customerOrders($customer);

        return view('frontend::auth.orders', compact('customer', 'orders'));
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->regenerateToken();

        return redirect()
            ->route('frontend.login')
            ->with('success', 'Signed out successfully.');
    }

    private function customerOrders(Customer $customer)
    {
        return $customer->orders()
            ->with(['items.productItem.product'])
            ->withCount('items')
            ->latest('placed_at')
            ->latest('id')
            ->get();
    }
}
