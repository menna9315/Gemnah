<section class="gemnah-account-panel gemnah-account-orders-panel">
    <div class="gemnah-account-panel-header">
        <div>
            <span class="gemnah-auth-kicker">ORDERS</span>
            <h2>Order history</h2>
        </div>
    </div>

    @if ($orders->isNotEmpty())
        <div class="gemnah-account-orders">
            @foreach ($orders as $order)
                @php
                    $rawStatus = (string) ($order->status ?: 'pending');
                    $rawPaymentStatus = (string) ($order->payment_status ?: 'unpaid');
                    $status = ucwords(str_replace('_', ' ', $rawStatus));
                    $paymentStatus = ucwords(str_replace('_', ' ', $rawPaymentStatus));
                    $statusClass = preg_replace('/[^a-z0-9-]+/', '-', strtolower(str_replace('_', '-', $rawStatus)));
                @endphp

                <article class="gemnah-account-order">
                    <div class="gemnah-account-order-main">
                        <div class="gemnah-account-order-title">
                            <span class="gemnah-account-order-number">{{ $order->order_number }}</span>
                            <button type="button" class="gemnah-account-order-details-btn" data-bs-toggle="modal" data-bs-target="#order-details-{{ $order->id }}">
                                Details
                            </button>
                        </div>
                        <span class="gemnah-account-order-date">
                            {{ $order->placed_at?->format('M d, Y') ?? $order->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    <div class="gemnah-account-order-meta">
                        <span>{{ $order->items_count }} {{ $order->items_count === 1 ? 'item' : 'items' }}</span>
                        <span>EGP {{ number_format((float) $order->total_amount, 2) }}</span>
                    </div>

                    <div class="gemnah-account-order-statuses">
                        <span class="gemnah-status-pill gemnah-status-pill-{{ $statusClass }}">
                            {{ $status }}
                        </span>
                        <span class="gemnah-status-pill gemnah-status-pill-payment">
                            {{ $paymentStatus }}
                        </span>
                    </div>
                </article>

                <div class="modal fade gemnah-order-modal" id="order-details-{{ $order->id }}" tabindex="-1" aria-labelledby="order-details-title-{{ $order->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="gemnah-order-modal-header">
                                <div>
                                    <span class="gemnah-auth-kicker">ORDER DETAILS</span>
                                    <h3 id="order-details-title-{{ $order->id }}">{{ $order->order_number }}</h3>
                                </div>
                                <button type="button" class="gemnah-order-modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ri-close-large-line d-block lh-1"></i>
                                </button>
                            </div>

                            <div class="gemnah-order-modal-body">
                                @forelse ($order->items as $orderItem)
                                    @php
                                        $productItem = $orderItem->productItem;
                                        $product = $productItem?->product;
                                        $itemName = collect([$orderItem->product_title, $orderItem->item_title])->filter()->implode(' - ');
                                        $itemImage = $productItem?->image
                                            ?: $productItem?->home_image
                                            ?: $product?->image
                                            ?: 'frontend/assets/image/product/p-1.jpg';
                                    @endphp

                                    <div class="gemnah-order-modal-item">
                                        <img src="{{ asset($itemImage) }}" alt="{{ $itemName ?: 'Order item' }}">
                                        <div class="gemnah-order-modal-item-info">
                                            <strong>{{ $itemName ?: $productItem?->title ?: 'Product item' }}</strong>
                                            <span>Qty {{ $orderItem->quantity }}</span>
                                        </div>
                                        <b>EGP {{ number_format((float) $orderItem->total_price, 2) }}</b>
                                    </div>
                                @empty
                                    <div class="gemnah-account-empty-orders">
                                        No items found for this order.
                                    </div>
                                @endforelse

                                <div class="gemnah-order-modal-summary" aria-label="Order totals">
                                    <div class="gemnah-order-modal-summary-row">
                                        <span>Shipping</span>
                                        <strong>EGP {{ number_format((float) $order->shipping_amount, 2) }}</strong>
                                    </div>
                                    <div class="gemnah-order-modal-summary-row is-total">
                                        <span>Total</span>
                                        <strong>EGP {{ number_format((float) $order->total_amount, 2) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="gemnah-account-empty-orders">
            No orders yet.
        </div>
    @endif
</section>
