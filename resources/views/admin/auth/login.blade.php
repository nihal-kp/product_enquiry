@extends("admin.layout.app")
@section("content")
<div class="container col-8 col-md-5 col-lg-5 center mt-4">
    <h2 class="mb-4">Login Now</h2>
    <form class="form-horizontal"  action="{{ route('admin_login_post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control @error("email") is-invalid @enderror" placeholder="Enter email" name="email" value="{{ old('email') }}" id="" required>
            @error("email")
            <p style="color:red">{{$errors->first("email")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control @error("password") is-invalid @enderror" placeholder="Enter password" name="password" value="{{ old('password') }}" id="" required>
            @error("password")
            <p style="color:red">{{$errors->first("password")}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>
@endsection