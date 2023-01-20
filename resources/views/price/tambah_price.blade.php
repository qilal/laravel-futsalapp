@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('price.store') }}" method="post">
                    @csrf
                    <select for="lapangan" name="lapangan_id">
                        @foreach ($lapangans as $lapangan)
                            <option>{{ $lapangan->id_lapangan_futsal }}</option>
                        @endforeach
                    </select>

                    <select for="jam" name="hour_id">
                        @foreach ($hours as $hour)
                            <option>{{ $hour->jam }}</option>
                        @endforeach
                    </select>

                    <select for="hari" name="day_id">
                        @foreach ($days as $day)
                            <option>{{ $day->nama }}</option>
                        @endforeach
                    </select>

                    <label for="harga">Harga</label>
                    <input type="integer" name="harga" class="form-control mb-2">

                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
