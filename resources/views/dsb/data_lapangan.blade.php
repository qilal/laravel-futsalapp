@extends('master')
@section('title', 'Rental Field Futsal | List Field')
@section('content')

<?php if (Auth::user()->role_id == 1)
{ ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4 container">
    <h1 class="h3 mb-0 text-gray-800">List Data Lapangan</h1>
    <a href="{{ route('lapangan.create') }}"
        class="d-none d-sm-inline-block bg-gradient-info btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Lapangan</a>
</div>
<?php } ?>

<div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Gambar Lapangan</th>
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
                                <td><a href="{{ $lapangan->link_alamat }}"><img style="width: 35px; high: 35px;"
                                            src="{{ url('/img/LogoMakr-2GRsRi.png') }}" alt=""></a> <br>{{ $lapangan->alamat }}</td>
                                <td> <img src="/img/{{ $lapangan->gambar }}" alt="Gambar Lapangan" width="100px" ></td>
                                <td>{{ $lapangan->jumlah_lapangan }}</td>
                                <td>{{ $lapangan->jumlah_bola }}</td>
                                <td>
                                    <a href="{{ route('lapangan.edit', $lapangan->id_lapangan_futsal) }}"
                                        class="btn btn-warning btn-sm btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <?php if (Auth::user()->role_id == 1)
                                        { ?>
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
                                    <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                    </tfoot>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- list --}}
    {{-- <div class="row px-3">
        @foreach ($lapangans as $lapangan)
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->nama }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="container">
                                    <div class="dropdown-header ml-1">Action</div>
                                    <div class="ml-2">
                                        <a href="{{ route('lapangan.edit', $lapangan->id_lapangan_futsal) }}"
                                            class="btn btn-warning btn-sm btn-icon-split ml-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-pencil-alt"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                    </div>
                                    <div class="dropdown-divider"></div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid w-100 rounded" src=" /img/{{ $lapangan->gambar }}" alt="...">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <a href="{{ $lapangan->link_alamat }}"><img style="width: 35px; high: 35px;"
                                        src="{{ url('/img/LogoMakr-2GRsRi.png') }}" alt=""></a>
                                <h6 class="m-0 font-weight-normal text">{{ $lapangan->alamat }}</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="m-0 font-weight-bold text-primary">KONTAK : {{ $lapangan->nomor_tlp }}</h6>
                                <h6 class="m-0 font-weight-bold text-primary">JUMLAH LAPANGAN
                                    : {{ $lapangan->jumlah_lapangan }}</h6>
                                <h6 class="m-0 font-weight-bold text-primary">SEDIA BOLA : {{ $lapangan->jumlah_bola }}
                                </h6>
                                <a href="{{ route('tabel-admin', $lapangan->id_lapangan_futsal) }}"
                                    class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Pesan Sekarang</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
