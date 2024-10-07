@extends ('layouts.master')
@section('content')

<main>
    <div class="containers">
        <h1>Receipt</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @foreach($orders as $order)
            <p>Order Code: {{ $order->order_code }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item['product'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['price'] }}$</td>
                            <td>{{ $item['price'] * $item['quantity'] }}$</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
        <button onclick="window.print()" class="btn btn-primary">Print Receipt</button>
    </div>
</main>

@endsection