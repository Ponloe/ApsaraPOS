@extends ('layouts.master')
@section('content')

<main>
  <div class="container-fluid mt-4">
    <div class="card">
      <div class="card-header">
        បន្ថែមប្រភេទ
      </div>
      <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="col-md-12 mb-3">
            <label for="categoryName">ឈ្មេាះ *</label>
            <input type="text" class="form-control" id="categoryName" name="name" placeholder="បញ្ចូលឈ្មោះប្រភេទ" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="categoryDescription">ពិពណ៌នា</label>
            <textarea class="form-control" id="categoryDescription" name="description" placeholder="បញ្ចូលពិពណ៌នាប្រភេទ"></textarea>
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