@extends("admin.layout.app")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    <h4 class="my-4">Enquiries</h4>
    <table class="table">
    <tr>
        <th>#</th> <th>Product Name</th> <th>Product Image</th> <th>Customer Name</th> <th>Customer Email</th> <th>Customer's Enquiry</th>
    </tr>
    <?php $n = 1; ?>
    @foreach($enquiries as $enquiry)
    <tr>
        <td><?= $n; ?></td>
        <td>{{$enquiry->product->product_name}}</td>
        <td><img src="{{asset('images/'.$enquiry->product->product_image)}}" width="50"></td>
        <td>{{$enquiry->user->name}}</td>
        <td>{{$enquiry->user->email}}</td>
        <td>{{$enquiry->enquiry}}</td>
    </tr>
    <?php $n++; ?>
    @endforeach
    </table>
</div>
@endsection