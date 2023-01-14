@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('days.update', $days->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Nama</label>
                    <input value="{{ $days->nama }}" type="text" name="name" class="form-control mb-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
