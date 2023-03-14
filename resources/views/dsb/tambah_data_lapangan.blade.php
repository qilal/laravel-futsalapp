@extends('master')
@section('title', 'Rental Field Futsal | Create Field')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('lapangan.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <label for="name">Nama</label>
                    <input type="text" name="nama" class="form-control mb-2">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control mb-2">
                    <label for="jumlah lapangan">Detail Alamat</label>
                    <input type="text" name="link_alamat" class="form-control mb-2">
                    <label for="jumlah lapangan">Gambar Lapangan</label><br>
                    <input type="file" name="gambar" class="btn btn-user-daftar mb-2"><br>
                    <label for="jumlah lapangan">Nomor Whatssap</label>
                    <input type="text" name="nomor_tlp" class="form-control mb-2">
                    <label for="jumlah lapangan">Jumlah Lapangan</label>
                    <input type="number" name="jumlah_lapangan" class="form-control mb-2">
                    <label for="jumlah bola">Jumlah Bola</label>
                    <input type="number" name="jumlah_bola" class="form-control mb-2">
                    <label for="jumlah bola">Detail Lapangan</label>
                    <input type="text" name="detail_lapangan" class="form-control mb-2">
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
