@extends('layouts.master')
@section('content')
    <h1>Order Receipt</h1>
    <p>Order Code: {{ $order->order_code }}</p>

    @if($order->items && $order->items->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ $item->price }}$</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price * $item->quantity }}$</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Grand Total: </strong> {{ $order->items->sum(fn($item) => $item->price * $item->quantity) }}$</p>
    @else
        <p>No items found for this order.</p>
    @endif
@endsection