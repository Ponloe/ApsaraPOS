@extends ('layouts.master')
@section('content')

<main>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <div class="card mt-4 shadow=sm">
            <div class="card-header">
                <h4 class="md-0">Orders</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    @if($orders->isEmpty())
                        <p>No orders found.</p>
                    @else
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
                            @foreach($orders as $order)
                                @if($order->items && $order->items->isNotEmpty())
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $order->order_code }}</td>
                                            <td>Ponloe</td>
                                            <td>0123456789</td>
                                            <td>ABA</td>
                                            <td>{{ $item->price * $item->quantity }}$</td>
                                            <td>
                                                <a href="#" class="btn btn-info mb-0 px-2 btn-sm">View</a>
                                                <a href="#" class="btn btn-primary mb-0 px-2 btn-sm">Print</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No items found for this order.</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</main>

@endsection