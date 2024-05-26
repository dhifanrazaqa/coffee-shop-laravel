<x-app-layout>
    <div class="container">
        <h1>Order History</h1>
        @if ($orders->isEmpty())
            <p>You have no orders.</p>
        @else
            <table class="table border-2">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-2">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td colspan="5">
                                <ul>
                                    @foreach ($order->products as $product)
                                        <li>{{ $product->title }} (Quantity: {{ $product->pivot->quantity }} x {{{ $product->pivot->price }}})</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
