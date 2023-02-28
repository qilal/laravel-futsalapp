<style>
    @media print {
       a .no-print {
            display: none;
        }
    }
   </style>
@extends('master')
@section('title', 'Rental Field Futsal | Detail Order')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4 container">
    <h1 class="h3 mb-0 text-gray-800">Order List</h1>
    <a href="#" onclick="window.print(); return false;"
        class="no-print d-none d-sm-inline-block bg-gradient-info btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Generate</a>
</div>
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>Nama Penyewa</th>
                <th>Lapangan</th>
                <th>Jam</th>
                <th>Hari</th>
                <th>Harga</th>
                <th>Status</th>
            </thead>

            <tfoot>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->order->user->name }}</td>
                        <td>{{ $orderDetail->lapangan->nama }}</td>
                        <td>{{ $orderDetail->hour->jam }}</td>
                        <td>{{ $orderDetail->day->nama }}</td>
                        <td>{{ $orderDetail->price }}</td>
                        <td>{{ $orderDetail->order->status }}</td>
                    </tr>
                @endforeach
            </tfoot>
        </table>
    </div>
</div>
</div>
@endsection
    