@extends ('layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ទំនិញ</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1" style="bold"></i>
                ស្ដុកទំនិញ
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>រូបភាព</th>
                            <th>កូដ</th>
                            <th>ឈ្មេាះ</th>
                            <th>ប្រភេទ</th>
                            <th>តម្លៃ</th>
                            <th>ចំនួន</th>
                            <th>ផ្សេងៗ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid" style="width: 100px;"></td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                            <td>{{ $product->price }}$</td>
                            <td>{{ $product->quantity }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#editModal{{ $product->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('inventory.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="productName{{ $product->id }}" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" id="productName{{ $product->id }}" name="name" value="{{ $product->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productCode{{ $product->id }}" class="form-label">Code</label>
                                                <input type="text" class="form-control" id="productCode{{ $product->id }}" name="code" value="{{ $product->code }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="selectWarehouse{{ $product->id }}" class="form-label">Select Warehouse</label>
                                                <select class="form-control" id="selectWarehouse{{ $product->id }}" name="warehouse_id" required>
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}" {{ $product->warehouses->contains($warehouse->id) ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="selectWarehouse{{ $product->id }}" class="form-label">Select Warehouses</label>
                                                @foreach($warehouses as $warehouse)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="warehouse_{{ $warehouse->id }}" name="warehouse_id[]" value="{{ $warehouse->id }}" {{ $product->warehouses->contains($warehouse->id) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="warehouse_{{ $warehouse->id }}">
                                                            {{ $warehouse->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mb-3">
                                                <label for="productPrice{{ $product->id }}" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="productPrice{{ $product->id }}" name="price" value="{{ $product->price }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productQuantity{{ $product->id }}" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="productQuantity{{ $product->id }}" name="quantity" value="{{ $product->quantity }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage{{ $product->id }}" class="form-label">Product Image</label>
                                                <input type="file" class="form-control" id="productImage{{ $product->id }}" name="image">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Product</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this product?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('inventory.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Bootstrap CSS -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Warehouses",
            allowClear: true
        });
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Khmer&family=Moulpali&family=Noto+Sans Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Khmer', 'Moulpali', 'Noto Sans Khmer', 'Poppins', sans-serif;
    }
</style>
@endsection