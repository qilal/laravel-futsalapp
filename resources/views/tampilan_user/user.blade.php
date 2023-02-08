@extends('tampilan_user.master')
@section('title', 'dashboard')
@section('content')
    <div class="row px-3">
        @foreach ($lapangans as $lapangan)
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->nama }}</h6>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid w-100 rounded" src="{{ $lapangan->gambar }}" alt="...">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->alamat }}</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="m-0 font-weight-bold text-primary">KONTAK : {{ $lapangan->nomor_tlp }}</h6>
                                <h6 class="m-0 font-weight-bold text-primary">TIPE LAPANGAN : {{ $lapangan->jumlah_bola }}
                                </h6>
                                <h6 class="m-0 font-weight-bold text-primary">JUMLAH LAPANGAN
                                    : {{ $lapangan->jumlah_lapangan }}</h6>
                                <h6 class="m-0 font-weight-bold text-primary">SEDIA BOLA : {{ $lapangan->jumlah_bola }}</h6>
                                <a href="{{ route('lapangan.harga', $lapangan->id_lapangan_futsal) }}"
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
    </div>
@endsection
