@extends ('layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ប្រភេទ</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard" style="text-decoration: none;">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                ប្រភេទ
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
                            <th>ឈ្មេាះ</th>
                            <th>ពិពណ៌នា</th>
                            <th>ផ្សេងៗ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                        data-target="#editModal1">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Khmer&family=Moulpali&family=Noto+Sans+Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

    body {
        font-family: 'Khmer', 'Moulpali', 'Noto Sans Khmer', 'Poppins', sans-serif;
    }
</style>
@endsection