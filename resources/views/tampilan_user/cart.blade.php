@extends('tampilan_user.master_user_login')
@section('content')
<div class="container">
    <div class="modal-header">
        <a href="/userLogin" class="close btn-sm" type="button" data-dismiss="modal" aria-label="Close">
            <span class="a" aria-hidden="true">×</span>
        </a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-info" role="alert">
        {{ $message }}
        </div>
    @endif
    <h3 class="text-bold">Cart List</h3>
    <table class="table caption-top">
    <thead>
        <tr>
            <th class="text-left">Name</th>
            <th class="text-right">Harga</th>
            <th class="text-left">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($cartItems as $item)
        <tr>
            <td>
            <a href="#">
                <p class="mb-2 md:ml-4">{{ $item->name }}</p>
            </a>
            </td>
            <td class="hidden text-right md:table-cell">
            <span class="text-sm font-medium lg:text-base">
                Rp. {{ $item->price }}
            </span>
            </td>
            <td class="hidden text-left md:table-cell">
            <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
                <button class="btn btn-danger">x</button>
            </form>
            </td>
        </tr>
    @endforeach
    <tr>
        <td class="text-right"><h5><b>Total Harga</b></h5></td>
        <td class="text-right" colspan="2"><h5> Rp. {{ Cart::getTotal() }} </h5></td>
    </tr>
    </tbody>
    </table>
    <div class="row">
        <div class="col-md-10 text-right">
            <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Hapus Semua Keranjang</button>
            </form>
        </div>
        <div class="col-md-2 text-left">
            <form action="{{ route('order.checkout') }}" method="POST">
            @csrf
                <button class="btn btn-success">Checkout</button>
            </form>
        </div>
    </div>
</div>
@endsection