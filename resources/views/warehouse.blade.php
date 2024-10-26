@extends ('layouts.master')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ឃ្លាំង</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table me-1"></i> ឃ្លាំង</span>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addWarehouseModal">
                    Add Warehouse
                </button>
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
                            <th>ឈ្មេាះឃ្លាំង</th>
                            <th>ផ្សេងៗ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $warehouse->name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                            data-target="#editModal{{ $warehouse->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $warehouse->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $warehouse->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $warehouse->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $warehouse->id }}">Delete
                                                Warehouse</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this warehouse?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                                            <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST">
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

    <!-- Add Warehouse Modal -->
    <div class="modal fade" id="addWarehouseModal" tabindex="-1" aria-labelledby="addWarehouseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWarehouseModalLabel">Add Warehouse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('warehouses.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="warehouseName" class="form-label">ឈ្មេាះឃ្លាំង</label>
                            <input type="text" class="form-control" id="warehouseName" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</main>
@endsection