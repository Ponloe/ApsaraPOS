@extends ('layouts.master')
@section('content')

<main>
    <div class="container">
        <h1>Orders List</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($orders->isEmpty())
            <p>No orders found.</p>
        @else
            @foreach($orders as $orderCode => $orderGroup)
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Order Code: {{ $orderCode }}</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderGroup as $order)
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item['product'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['price'] }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</main>

@endsection