@extends ('layouts.master')
@section('content')

<main>
  <div class="container-fluid mt-4">
    <div class="card">
      <div class="card-header">
        Add Products
      </div>
      <div class="card-body">
        <form>
          <div class="col-md-12 mb-3">
            <label for="productName">Product Name *</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name">
          </div>
          <div class="col-md-12 mb-3">
            <label for="selectCategory">Select Category *</label>
            <select class="form-control" id="selectCategory">
              <option>កំពូល</option>
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label for="selectCategory">Select Warehouse *</label><!-- warehouse  -->
            <select class="form-control" id="selectCategory">
              <option>ឃ្លាំង ១</option>
              <option>ឃ្លាំង ២</option>
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label for="productName">Code *</label>
            <input type="text" class="form-control" id="Code" placeholder="Enter Code ">
          </div>
          <!-- <div class="col-md-12 mb-3">
            <label for="productDescription">Description</label>
            <textarea class="form-control" id="productDescription" rows="3"
              placeholder="Enter product description"></textarea>
          </div> -->
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="productPrice">Price *</label>
              <input type="number" class="form-control" id="productPrice" placeholder="Enter price">
            </div>
            <div class="col-md-4 mb-3">
              <label for="productQuantity">Quantity *</label>
              <input type="number" class="form-control" id="productQuantity" placeholder="Enter quantity" value="10">
            </div>
            <div class="col-md-4 mb-3">
              <label for="productImage">Image *</label>
              <input type="file" class="form-control" id="productImage">
            </div>
          </div>
          <!-- <div class="col-md-4 mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="productStatus">
            <label class="form-check-label" for="productStatus">Status (Checked=Hidden, UnChecked=Visible)</label>
          </div> -->
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
    @import url('https://fonts.googleapis.com/css2?family=Khmer&family=Moulpali&family=Noto+Sans+Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Khmer', 'Moulpali', 'Noto Sans Khmer', 'Poppins', sans-serif;
    }
</style>
@endsection
