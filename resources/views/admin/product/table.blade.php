<h4 class="my-4">Products</h4>
<table class="table">
<tr>
    <th>#</th> <th>Name</th> <th>Image</th> <th>Description</th> <th>Price</th> <th>Status</th> <th>Actions</th>
</tr>
<?php $n = 1; ?>
@foreach($products as $product)
<tr>
    <td><?= $n; ?></td>
    <td>{{$product->product_name}}</td>
    <td><img src="{{asset('images/'.$product->product_image)}}" width="50"></td>
    <td>{{$product->product_description}}</td>
    <td>{{$product->product_price}}</td>
    <td class="text-center"><input type="checkbox" class="form-check-input product_status" value="{{$product->id}}" {{  ($product->product_status == 1 ? 'checked' : '') }}></td>
    <td class="row">
        <form action="{{ route('product.destroy',$product->id) }}" method="POST">
            <a class="btn btn-light" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-pencil"></i></a>
            
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this product?');"><i class="fa fa-trash"></i></button>
        </form>
    </td>
</tr>
<?php $n++; ?>
@endforeach
</table>