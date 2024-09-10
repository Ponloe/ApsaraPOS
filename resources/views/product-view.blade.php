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
                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this product?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Khmer&family=Moulpali&family=Noto+Sans Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Khmer', 'Moulpali', 'Noto Sans Khmer', 'Poppins', sans-serif;
    }
</style>
@endsection