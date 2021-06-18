<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Product Enquiry System :: Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/jquery.toast.min.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <a class="navbar-brand text-white" href=""><h3>Simple Product Enquiry System :: Admin Panel</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('product.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('enquiries') }}">Enquiries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('customers') }}">Customers</a>
                </li>
            </ul>
        @endauth
            <ul class="navbar-nav ml-auto mr-5">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin_logout') }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li><a class="nav-link text-white" href="{{ route('admin_login') }}">Login</a></li>
                    <li><a class="nav-link text-white" href="{{ route('admin_signup') }}">Register</a></li>
                @endguest
            </ul>
        </div>
    </nav>
    @yield("content")
    {{-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-4 mt-5">
    <div class="mx-auto mt-auto">
        <p style="color:white">Copyright @2021. All rights are reserved</p>
    </div>
    </nav> --}}
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.toast.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/toastr.js')}}" type="text/javascript"></script>
    
    <script>
        $('.product_status').click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).val();
            if($(this).prop("checked") == true) {
                $.ajax({
                    url:"{{url('admin/product/status_active')}}",
                    type:"POST",
                    data: { '_token':token, 'id':id },
                    success:function (data) {
                        // alert('Status changed to active!');
                        $.toast({
                            heading: data.heading,
                            text: data.msg,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 1500,
                            stack: 6
                        });
                    }
                });
            }
            else if($(this).prop("checked") == false) {
                $.ajax({
                    url:"{{url('admin/product/status_inactive')}}",
                    type:"POST",
                    data: { '_token':token, 'id':id },
                    success:function (data) {
                        // alert('Status changed to inactive!');
                        $.toast({
                            heading: data.heading,
                            text: data.msg,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 1500,
                            stack: 6
                        });
                    }
                });
            }
        });
    </script>
</body>
</html>