@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('typelapangan.update', $typelapangan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Nama</label>
                    <input value="{{ $typelapangan->name }}" type="text" name="name" class="form-control mb-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
