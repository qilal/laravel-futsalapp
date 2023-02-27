@extends('master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('price.update', $price->id) }}" method="post">
                @csrf
                @method('PATCH')
                <label for="Status">Harga</label>
                <input value="{{ $price->harga }}" type="text" name="harga" class="form-control mb-2">
                <label for="Status">Status</label>
                <div class="mb-2 col-6 col-sm-4 col-md-3 col-xl-auto">
                    <input class="btn-check" id="tutup" name="is_open" type="radio" value="0" <?= !$price->is_open  ? 'checked' : '' ?>>
                    <label class="btn btn-outline-danger" for="tutup">TUTUP</label>
                    <input class="btn-check" id="buka" name="is_open" type="radio" value="1" <?= $price->is_open ? 'checked' : '' ?> >
                    <label class="btn btn-user-daftar" for="buka">BUKA</label>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
