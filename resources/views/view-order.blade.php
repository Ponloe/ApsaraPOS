@extends ('layouts.master')
@section('content')

<main>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <p>No orders found.</p>
    @else
        <div class="container-fluid px-4">
            <div class="card mt-4 shadow=sm">
                <div class="card-header">
                    <h4 class="md-0">Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Payment Method</th>
                                <th>Total</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $orderCode => $orderGroup)
                                @foreach($orderGroup as $order)
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $orderCode }}</td>
                                            <td>Ponloe</td>
                                            <td>089873536</td>
                                            <td>ABA</td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info mb-0 px-2 btn-sm">View</a>
                                                <a href="#" class="btn btn-primary mb-0 px-2 btn-sm">Print</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                </div>
    @endif
</main>

@endsection