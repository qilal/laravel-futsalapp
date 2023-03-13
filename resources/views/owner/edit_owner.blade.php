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
                <select class="form-control" name="lapangan_id" id="lapangan_id">
                    @foreach ($lapangan as $lapangan)
                        <option value="{{ $lapangan->id_lapangan_futsal }}">{{ $lapangan->nama }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection