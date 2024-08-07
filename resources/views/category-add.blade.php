@extends ('layouts.master')
@section('content')

<main>
  <div class="container-fluid mt-4">
    <div class="card">
      <div class="card-header">
        Add Category
      </div>
      <div class="card-body">
        <form>
          <div class="col-md-12 mb-3">
            <label for="categoryName">Name *</label>
            <input type="text" class="form-control" id="categoryName" placeholder="Enter category name">
          </div>
          <div class="col-md-12 mb-3">
            <label for="categoryDescription">Description</label>
            <textarea class="form-control" id="categoryDescription" rows="3" placeholder="Enter category description"></textarea>
          </div>
          <div class="col-md-12 mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="categoryStatus">
            <label class="form-check-label" for="categoryStatus">Status (Checked=Hidden, UnChecked=Visible)</label>
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

@endsection