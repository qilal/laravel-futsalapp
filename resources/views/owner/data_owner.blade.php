@extends('master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800">Owner Lapangan Futsal</h1>
        <a href="{{ route('owner.create') }}"
            class="bg-gradient-info d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Owner</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jumlah Lapangan</th>
                            <th>Jumlah Bola</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($user as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nomor_tlp }}</td>
                                <td>{{ $user->role_id }}</td>
                            </tr>
                        @endforeach
                    </tfoot>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
