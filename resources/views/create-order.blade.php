@extends ('layouts.master')
@section('content')

<main>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                Create Order
            </div>
            <div class="card-body">
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
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="product" class="form-label">Product</label>
                            <select name="product" id="product" class="form-control" required>
                                <option value="" disabled selected>-- Select a product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Order</button>
                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
                </form>

                <h3 class="mt-4">Current Orders</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>N.O</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Code</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('orders', []) as $index => $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order['product'] }}</td>
                                <td>{{ $order['price'] }}$</td>
                                <td>{{ $order['code'] }}</td>
                                <td>
                                    <div class="quantity-buttons">
                                        <form action="{{ route('orders.updateQuantity') }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="index" value="{{ $index }}">
                                            <button type="submit" class="btn btn-secondary btn-sm"
                                                onclick="decrementQuantity(event)">-</button>
                                        </form>

                                        <form action="{{ route('orders.updateQuantity') }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="index" value="{{ $index }}">
                                            <input type="number" name="quantity" value="{{ $order['quantity'] }}" min="1"
                                                onchange="this.form.submit()" style="width: 50px;">
                                        </form>

                                        <form action="{{ route('orders.updateQuantity') }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="index" value="{{ $index }}">
                                            <button type="submit" class="btn btn-secondary btn-sm"
                                                onclick="incrementQuantity(event)">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{ $order['price'] * $order['quantity'] }}$</td>
                                <td>
                                    <form action="{{ route('orders.remove') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="index" value="{{ $index }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</main>
<style>
    .quantity-buttons {
        display: flex;
        align-items: center;
    }

    .quantity-buttons form {
        margin: 0 5px;
    }

    .quantity-buttons button {
        background-color: white;
        border: 1px solid #ced4da;
        color: #495057;
        padding: 5px 10px;
        cursor: pointer;
    }

    .quantity-buttons button:hover {
        background-color: #e9ecef;
    }

    .quantity-buttons span {
        margin: 0 10px;
    }
</style>

<script>
    function decrementQuantity(event) {
        event.preventDefault();
        const input = event.target.closest('div').querySelector('input[name="quantity"]');
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
            input.form.submit();
        }
    }

    function incrementQuantity(event) {
        event.preventDefault();
        const input = event.target.closest('div').querySelector('input[name="quantity"]');
        input.value = parseInt(input.value) + 1;
        input.form.submit();
    }
</script>

@endsection