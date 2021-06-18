@extends("admin.layout.app")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    <h4 class="my-4">Customers</h4>
    <table class="table">
    <tr>
        <th>#</th> <th>Customer Name</th> <th>Customer Email</th>
    </tr>
    <?php $n = 1; ?>
    @foreach($customers as $customer)
    <tr>
        <td><?= $n; ?></td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->email}}</td>
    </tr>
    <?php $n++; ?>
    @endforeach
    </table>
</div>
@endsection