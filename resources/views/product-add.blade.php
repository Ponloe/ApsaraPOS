@extends ('layouts.master')
@section('content')

<main>
  <div class="container-fluid mt-4">
    <div class="card">
      <div class="card-header">
        Add Products
      </div>
      <div class="card-body">
        <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12 mb-3">
            <label for="productName">Product Name *</label>
            <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="selectCategory">Select Category *</label>
            <select class="form-control" id="selectCategory" name="category_id" required>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label for="selectWarehouse">Select Warehouse *</label>
            <select class="form-control" id="selectWarehouse" name="warehouse_id" required>
              @foreach($warehouses as $warehouse)
                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label for="productCode">Code *</label>
            <input type="text" class="form-control" id="productCode" name="code" placeholder="Enter Code" required>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="productPrice">Price *</label>
              <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter price" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="productQuantity">Quantity *</label>
              <input type="number" class="form-control" id="productQuantity" name="quantity" placeholder="Enter quantity" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="productImage">Image *</label>
              <input type="file" class="form-control" id="productImage" name="image">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</main>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Khmer&family=Moulpali&family=Noto+Sans+Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

    body {
        font-family: 'Khmer', 'Moulpali', 'Noto Sans Khmer', 'Poppins', sans-serif;
    }
</style>
@endsection