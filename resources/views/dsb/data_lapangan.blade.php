@extends('master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800">List Data Lapangan</h1>
        <a href="{{ route('lapangan.create') }}"
            class="d-none d-sm-inline-block bg-gradient-info btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Lapangan</a>
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
                        @foreach ($lapangans as $lapangan)
                            <tr>
                                <td>{{ $lapangan->id_lapangan_futsal }}</td>
                                <td>{{ $lapangan->nama }}</td>
                                <td><a href="{{ $lapangan->alamat }}"><img style="width: 35px; high: 35px;"
                                            src="{{ url('/img/LogoMakr-2GRsRi.png') }}" alt=""></a></td>
                                <td>{{ $lapangan->jumlah_lapangan }}</td>
                                <td>{{ $lapangan->jumlah_bola }}</td>
                                <td class="form-inline">
                                    <a href="{{ route('lapangan.edit', $lapangan->id_lapangan_futsal) }}"
                                        class="btn btn-warning btn-sm btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form action="{{ route('lapangan.destroy', $lapangan->id_lapangan_futsal) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-icon-split ml-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tfoot>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
