@extends('tampilan_user.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nama Lapangan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
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
                            <td> <label class="btn btn-user-daftar" for="minggu"><input class="btn-check text-nowrap"
                                        id="minggu" name="hours[]" type="checkbox" value="" autocomplete="off">
                                    45000</td>
                            <td> <label class="btn btn-user-daftar" for="minggu"><input class="btn-check text-nowrap"
                                        id="minggu" name="hours[]" type="checkbox" value="" autocomplete="off">
                                    45000</td>
                            <td> <label class="btn btn-user-daftar" for="minggu"><input class="btn-check text-nowrap"
                                        id="minggu" name="hours[]" type="checkbox" value="" autocomplete="off">
                                    45000</td>
                            <td> <label class="btn btn-user-daftar" for="minggu"><input class="btn-check text-nowrap"
                                        id="minggu" name="hours[]" type="checkbox" value="" autocomplete="off">
                                    45000</td>
                            <td><label class="btn btn-success" for="jumat"><input class="btn-check text-nowrap"
                                        id="jumat" name="hours[]" type="checkbox" value=""checked disabled>
                                    45000</td>
                            <td><label class="btn btn-danger" for="sabtu"><input class="btn-check text-nowrap"
                                        id="sabtu" name="hours[]" type="checkbox" value=""disabled>
                                    60000</td>
                            <td>
                                <label class="btn btn-user-daftar" for="minggu"><input class="btn-check text-nowrap"
                                        id="minggu" name="hours[]" type="checkbox" value="" autocomplete="off">
                                    80000</label>
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
