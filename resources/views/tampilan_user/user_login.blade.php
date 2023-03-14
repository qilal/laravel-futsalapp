@extends('tampilan_user.master_user_login')
@section('title', 'Futsal Field Rental')
@section('content')
    <div class="row px-3">
        @foreach ($lapangans as $lapangan)
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->nama }}</h6>
                    </div>
                    <div class="card-body">
                    <div class="card">
                        <img class="img-fluid rounded" src="/img/{{ $lapangan->gambar }}" alt="...">
                    </div>                   
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <a href="{{ $lapangan->link_alamat }}"><img style="width: 35px; high: 35px;"
                                        src="{{ url('/img/LogoMakr-2GRsRi.png') }}" alt=""></a>
                                <h6 class="m-0 font-weight-normal text">{{ $lapangan->alamat }}</h6>
                            </div>
                            <div class="card-body">
                                <a href="https://wa.me/{{ $lapangan->nomor_tlp }}" class="btn font-weight-bold"> KONTAK :{{ $lapangan->nomor_tlp }}</a>
                                <h6 class="m-0 font-weight-bold text-primary">JUMLAH LAPANGAN
                                    : {{ $lapangan->jumlah_lapangan }}</h6>
                                <h6 class="m-0 font-weight-bold text-primary">SEDIA BOLA : {{ $lapangan->jumlah_bola }}</h6>
                                <h6 class="m-0 font-weight-bold text-primary">Detail : <p>{{ $lapangan->detail_lapangan }}</p></h6>
                        <div class="card-footer">        
                            <a href="{{ route('tabel.user', $lapangan->id_lapangan_futsal) }}"
                                    class="container btn btn-info btn-icon-split">
                                    <span class="text">Pesan Sekarang</span>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
