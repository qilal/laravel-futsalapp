@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('lapangan.update', $lapangan->id_lapangan_futsal) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Nama</label>
                    <input value="{{ $lapangan->nama }}" type="text" name="nama" class="form-control mb-2">
                    <label for="alamat">Alamat</label>
                    <input type="text" value="{{ $lapangan->alamat }}" name="alamat" class="form-control mb-2">
                    <label for="alamat">gambar</label><br>
                    <input type="file" value="{{ $lapangan->gambar }}" name="gambar"
                        class="btn btn-user-daftar mb-2"><br>
                    <label for="alamat">Nomor Whatssap</label>
                    <input type="text" value="{{ $lapangan->nomor_tlp }}" name="nomor_tlp" class="form-control mb-2">
                    <label for="jumlah lapangan">Jumlah Lapangan</label>
                    <input type="number" value="{{ $lapangan->jumlah_lapangan }}" name="jumlah_lapangan"
                        class="form-control mb-2">
                    <label for="jumlah bola">Jumlah Bola</label>
                    <input type="number" value="{{ $lapangan->jumlah_bola }}" name="jumlah_bola" class="form-control mb-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
