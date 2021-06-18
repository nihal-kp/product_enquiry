@extends("layout.app")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    {{-- <h2 class="py-4">Welcome Admin</h2> --}}
    <h4 class="my-4">All Products</h4>
    <table class="table">
    <tr>
        <th>#</th> <th>Name</th> <th>Image</th> <th>Price</th> <th class="m-auto">Send Enquiry</th>
    </tr>
    <?php $n = 1; ?>
    @foreach($products as $product)
    <tr>
        <td><?= $n; ?></td>
        <td>{{$product->product_name}}</td>
        <td><img src="{{asset('images/'.$product->product_image)}}" width="50"></td>
        <td>{{$product->product_price}}</td>
        <td class="m-auto">
            <a class="btn btn-light" title="Send Enquiry" href="{{ route('enquiry',$product->id) }}"><i class="fa fa-pencil"></i></a>
        </td>
    </tr>
    <?php $n++; ?>
    @endforeach
    </table>
</div>
@endsection