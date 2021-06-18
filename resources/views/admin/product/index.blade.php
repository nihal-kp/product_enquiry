@extends("admin.layout.app")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    {{-- <h2 class="py-4">Welcome Admin</h2> --}}
    <a class="btn btn-primary mt-5" href="{{ route('product.create') }}">Add New Product</a>
    @include('admin.product.table')
</div>
@endsection