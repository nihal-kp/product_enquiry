@extends("admin.layout.app")
@section("content")
<div class="container col-11 col-md-10 col-lg-10 center mt-4">
    <h4 class="my-4">Create New Product</h3>
    <form class="form-horizontal" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control @error("name") is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required>
                    @error("name")
                    <p style="color:red">{{$errors->first("name")}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input @error("image") is-invalid @enderror" id="customFile" name="image" required>
                    <label class="custom-file-label" for="customFile">Image</label>
                    @error("image")
                    <p style="color:red">{{$errors->first("image")}}</p>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error("price") is-invalid @enderror" placeholder="Price" name="price" value="{{ old('price') }}" required>
                    @error("price")
                    <p style="color:red">{{$errors->first("price")}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <textarea class="form-control @error("description") is-invalid @enderror" placeholder="Description" name="description" rows="6" required>{{ old('description') }}</textarea>
                    @error("description")
                    <p style="color:red">{{$errors->first("description")}}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success my-4 mx-3">Save</button>
        <a class="btn btn-info mx-3 my-4" href="{{ route('product.index') }}">Cancel</a>
    </form>
    @include('admin.product.table')
</div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection