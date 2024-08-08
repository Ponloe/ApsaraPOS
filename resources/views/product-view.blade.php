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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>រូបភាព</th>
                            <th>កូដ</th>
                            <th>ឈ្មេាះ</th>
                            <th>ប្រភេទ</th>
                            <th>ឯកតា</th>
                            <th>តម្លៃ</th>
                            <th>ចំនួន</th>
                            <th>ផ្សេងៗ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="{{ asset('assets/img/apsara.jpg') }}" alt="Apsara Image" class="img-fluid"
                                    style="width: 100px;"></td>
                            <td>1.01 KP</td>
                            <td>កំពូល​​​​​ កំ.២៦ស.ម.មុក.២០សម</td>
                            <td></td>
                            <td></td>
                            <td>8$</td>
                            <td>100</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                        data-target="#viewModal1">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                                        data-target="#editModal1">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal1">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- View Modal -->
                <div class="modal fade" id="viewModal1" tabindex="-1" role="dialog" aria-labelledby="viewModal1"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel1">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/edit-item" method="POST">
                                <div class="modal-body">
                                    <img src="{{ asset('assets/img/apsara.jpg') }}" alt="Apsara Image"
                                        class="img-fluid">
                                    <p>កូដ: 1.01 KP</p>
                                    <p>ឈ្មេាះ: កំពូល​​​​​ កំ.២៦ស.ម.មុក.២០សម</p>
                                    <p>ប្រភេទ: </p>
                                    <p>ឯកតា: </p>
                                    <p>តម្លៃ: 8$</p>
                                    <p>ឯកតា: 100</p>
                                    <p>ឃ្លាំង ១: 60</p>
                                    <p>ឃ្លាំង ២: 40</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel1"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel1">Edit Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/edit-item" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="itemName">Code</label>
                                        <input type="text" class="form-control" id="itemName" name="itemName"
                                            value="1.01 KP">
                                    </div>
                                    <div class="form-group">
                                        <label for="itemName">Name</label>
                                        <input type="text" class="form-control" id="itemName" name="itemName"
                                            value="កំពូល​​​​​ កំ.២៦ស.ម.មុក.២០សម">
                                    </div>
                                    <div class="form-group">
                                        <label for="itemPrice">Price</label>
                                        <input type="text" class="form-control" id="itemPrice" name="itemPrice"
                                            value="8$">
                                    </div>
                                    <div class="form-group">
                                        <label for="itemQuantity">Quantity</label>
                                        <input type="text" class="form-control" id="itemQuantity" name="itemQuantity"
                                            value="100">
                                    </div>
                                    <p>Warehouse 1: 60</p>
                                    <p>Warehouse 2: 40</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal1" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel1">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
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
    @import url('https://fonts.googleapis.com/css2?family=Khmer&family=Moulpali&family=Noto+Sans+Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Khmer', 'Moulpali', 'Noto Sans Khmer', 'Poppins', sans-serif;
    }
</style>
@endsection