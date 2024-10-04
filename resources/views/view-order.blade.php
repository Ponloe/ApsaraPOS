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
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Order Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->product }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->order_code }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>

@endsection