@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('typelapangan.store') }}" method="post">
                    @csrf
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control mb-2">
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
