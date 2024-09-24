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
                        <div class="col-md-3 mb-3">
                            <label for="product" class="form-label">ឈ្មេាះទំនិញ</label>
                            <select name="product" id="product" class="form-control select2" required>
                                <option value="" disabled selected>-- Select a product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="quantity" class="form-label">ចំនួន</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Order</button>
                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
                </form>

                <h3 class="mt-4">បញ្ជី</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>ឈ្មេាះ</th>
                            <th>តម្លៃ</th>
                            <th>កូដ</th>
                            <th>ចំនួន</th>
                            <th>តម្លៃសរុប</th>
                            <th>ផ្សេងៗ</th>
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
                                    <div class="input-group">
                                        <button class="input-group-text" onclick="decrementQuantity(event)">-</button>
                                        <input type="number" name="quantity" value="{{ $order['quantity'] }}"
                                            class="qty quantityInput">
                                        <button class="input-group-text" onclick="incrementQuantity(event)">+</button>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</main>
<script>
    function decrementQuantity(event) {
        event.preventDefault();
        const input = event.target.closest('div').querySelector('input[name="quantity"]');
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
            updateOrderQuantity(input);
        }
    }

    function incrementQuantity(event) {
        event.preventDefault();
        const input = event.target.closest('div').querySelector('input[name="quantity"]');
        input.value = parseInt(input.value) + 1;
        updateOrderQuantity(input);
    }

    function updateOrderQuantity(input) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('orders.updateQuantity') }}';
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);

        const indexInput = document.createElement('input');
        indexInput.type = 'hidden';
        indexInput.name = 'index';
        indexInput.value = input.closest('tr').querySelector('input[name="index"]').value;
        form.appendChild(indexInput);

        const quantityInput = document.createElement('input');
        quantityInput.type = 'hidden';
        quantityInput.name = 'quantity';
        quantityInput.value = input.value;
        form.appendChild(quantityInput);

        document.body.appendChild(form);
        form.submit();
    }

    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@endsection