<?php

namespace Modules\Backend\Http\Controllers;

use Modules\Frontend\Models\Order;

class OrderController
{
    public function index()
    {
        $orders = Order::query()
            ->with('shippingAddress')
            ->withCount('items')
            ->latest('placed_at')
            ->latest()
            ->paginate(15);

        return view('backend::orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load([
            'customer',
            'items.productItem.product',
            'shippingAddress',
        ]);

        return view('backend::orders.show', compact('order'));
    }

    public function confirm(Order $order)
    {
        return $this->changeStatus(
            $order,
            ['pending'],
            'confirmed',
            'Order confirmed successfully.',
            'Only pending orders can be confirmed.'
        );
    }

    public function shippingCompany(Order $order)
    {
        return $this->changeStatus(
            $order,
            ['confirmed'],
            'shipping_company',
            'Order moved to shipping company successfully.',
            'Only confirmed orders can be moved to shipping company.'
        );
    }

    public function deliver(Order $order)
    {
        return $this->changeStatus(
            $order,
            ['shipping_company'],
            'delivered',
            'Order marked as delivered to customer.',
            'Only orders at the shipping company can be delivered.'
        );
    }

    private function changeStatus(Order $order, array $allowedStatuses, string $status, string $success, string $error)
    {
        if (! in_array((string) $order->status, $allowedStatuses, true)) {
            return back()->with('error', $error);
        }

        $order->update(['status' => $status]);

        return redirect()
            ->route('backend.orders.show', $order)
            ->with('success', $success);
    }
}
