@extends('master')
@section('title', 'Rental Field Futsal | Edit Hour')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('hour.update', $hour->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Jam</label>
                    <input value="{{ $hour->jam }}" type="text" name="jam" class="form-control mb-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
