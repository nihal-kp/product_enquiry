@extends("layout.app")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    {{-- <h2 class="py-4">Welcome Admin</h2> --}}
    <h4 class="my-4">Product Detail</h4>
    <table class="table">
    <tr>
        <th>Name</th> <td>:</td> <td>{{$product->product_name}}</td>
    </tr>
    <tr>
        <th>Image</th> <td>:</td> <td><img src="{{asset('images/'.$product->product_image)}}" width="50"></td>
    </tr>
    <tr>
        <th>Price</th> <td>:</td> <td>{{$product->product_price}}</td>
    </tr>
    <tr>
        <th>Description</th> <td>:</td> <td>{{$product->product_description}}</td>
    </tr>
    <form action="{{ route('send_enquiry') }}" method="POST">
    @csrf
    <tr>
        <td colspan="3">
        <div class="form-group">
            <textarea class="form-control @error("enquiry") is-invalid @enderror" placeholder="Enquiry" name="enquiry" rows="4" required>{{ old('enquiry') }}</textarea>
            @error("enquiry")
            <p style="color:red">{{$errors->first("enquiry")}}</p>
            @enderror
        </div>
        </td>
    </tr>
    </table>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="btn btn-success my-4 mx-3">Send Enquiry</button>
    <a class="btn btn-info mx-3 my-4" href="{{ route('home') }}">Cancel</a>
    </form>
</div>
@endsection