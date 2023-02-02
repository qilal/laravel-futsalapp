@extends('tampilan_user.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nama Lapangan</h6>

            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        @foreach ($days as $day)
                            <th scope="col">{{ $day->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hours as $hour)
                        <tr>
                            <th scope="row">{{ $hour->jam }}</th>
                            <td> <input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
                                    value="" autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="($hours as $hour)">
                                    45000</label></td>
                            <td> <input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
                                    value="" autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="($hours as $hour)">
                                    45000</label></td>
                            <td> <input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
                                    value="" autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="($hours as $hour)">
                                    45000</label></td>
                            <td> <input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
                                    value="" autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="($hours as $hour)">
                                    45000</label></td>
                            <td><input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
                                    value="" autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="($hours as $hour)">
                                    45000</label></td>
                            <td>
                                <input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
                                    value=""disabled>
                                <label class="btn btn-danger" for="sabtu">60000</label>
                            </td>

                            <td>
                                <input class="btn-check text-nowrap" id="minggu" name="hours[]" type="checkbox"
                                    value="" checked autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="minggu">
                                    80000</label>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-sm-12 col-md-6">
                <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                            class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
                    <a href="#" class="btn btn-light btn-icon-split">
                        <span class="icon text-gray-600">
                            <i class="fas fa-cart-arrow-down"></i>
                        </span>
                        <span class="text">Bayar Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
