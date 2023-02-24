@extends('tampilan_user.master_user_login')
@section('title', 'Futsal Field Rental')
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-info" role="alert">
        {{ $message }}
        </div>
    @endif
    <h3 class="text-bold">Order List</h3>
    <table class="table caption-top">
    <thead>
        <tr>
            <th>Total Item</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $order->total_item }}</td>
            <td>{{ $order->total_price }}</td>
            <td>
                <?php if ($order->status == 'Unpaid') { ?>
                    <span class="badge badge-warning">Belum Bayar</span>
                <?php } else { ?>
                    <span class="badge badge-success">Sudah Bayar</span>
                <?php } ?>
            </td>
            <td>
                <a href="{{ route('order.detail', $order->id) }}">
                    <button type="button" class="btn btn-success">Lihat</button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
