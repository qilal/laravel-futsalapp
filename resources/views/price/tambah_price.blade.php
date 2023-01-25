@extends('master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('price.store') }}" method="post">
                    @csrf
                    <div class="col-12 mb-3 p-0">
                        <label for="lapangan">Lapangan</label>
                        <select class="form-control" name="lapangan" id="lapangan">
                            @foreach ($lapangans as $lapangan)
                                <option value="{{ $lapangan->id_lapangan_futsal }}">{{ $lapangan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <label for="jam" class="col-12 p-0">Jam</label>
                            @foreach ($hours as $hour)
                                <div class="form-check col-6 col-sm-4 col-md-3 col-xl-2 mb-2">
                                    <input class="form-check-input text-nowrap" id="jam" name="hours[]"
                                        type="checkbox" value="{{ $hour->id }}">
                                    <label class="form-check-label" for="jam">{{ $hour->jam }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row justify-content-xl-between">
                            <label for="hari" class="col-12 p-0">Hari</label>
                            @foreach ($days as $day)
                                <div class="form-check mb-2 col-6 col-sm-4 col-md-3 col-xl-auto">
                                    <input class="form-check-input" id="hari" type="checkbox" name="days[]"
                                        value="{{ $day->id }}">
                                    <label class="form-check-label" for="hari">{{ $day->nama }}</label>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 mb-3 p-0">
                        <label for="harga">Harga</label>
                        <input type="integer" name="harga" class="form-control mb-2">
                    </div>

                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
