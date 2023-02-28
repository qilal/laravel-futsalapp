@extends('master')
@section('title', 'Rental Field Futsal | Detail Owner')
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('owner.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Nama Lapangan</label>
                <input value="{{ $user->lapangan_id }}" type="text" name="lapangan_id" class="form-control mb-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection