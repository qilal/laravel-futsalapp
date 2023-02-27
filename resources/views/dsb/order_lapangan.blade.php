@extends('master')
@section('title', 'Rental Field Futsal | Detail Order')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 container">
    <h1 class="h3 mb-0 text-gray-800">Order List</h1>
    <a href="#"
        class="d-none d-sm-inline-block bg-gradient-info btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Generate</a>
</div>
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>Lapangan</th>
                <th>Jam</th>
                <th>Hari</th>
                <th>Harga</th>
                <th>Status</th>
            </thead>
            <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
        </table>
    </div>
</div>
</div>
@endsection
    