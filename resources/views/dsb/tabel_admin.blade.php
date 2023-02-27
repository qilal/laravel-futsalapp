@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->nama }}</h6>
                {{-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Action:</div>
                        <a class="dropdown-item" href="{{ route('price.create') }}">Tambah Harga</a>
                        <div class="dropdown-divider"></div>                    
                            
                    </div>
                </div> --}}
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
                            @foreach ($days as $day)
                                <?php
                                $pr = 0;
                                $is_open = false;
                                $prcheck = null ;
                                ?>
                                @foreach ($prices as $price)
                                    <?php if ($price->lapangan_id == $lapangan->id_lapangan_futsal && $price->hour_id == $hour->id && $price->day_id == $day->id) {
                                        if ($price->is_open == false) {
                                            $pr = $price->harga;
                                            $prcheck = $price->id;
                                        } else {
                                            $is_open = true;
                                            $pr = $price->harga;
                                            $prcheck = $price->id;
                                        }
                                    }
                                    ?>
                                @endforeach
                                <?php if ($is_open == false || $prcheck == null) { ?>
                                <td>
                                    <?php if($prcheck != null){ ?>
                                    <form action="{{ route('price.edit', $prcheck ) }}" method="GET">
                                    <input class="btn-check text-nowrap" id="{{ $prcheck }}" name="hours[]"
                                        type="checkbox" value="">
                                    <button class="btn btn-danger" for="{{ $prcheck }}">{{ $pr }}</button>
                                    </form>
                                    <?php } else { ?>
                                    <button class="btn btn-danger" for="{{ $prcheck }}" disabled>{{ $pr }}</button>
                                    <?php } ?>
                                </td>
                                <?php } else { ?>
                                <td>
                                    {{-- <input type="hidden" value="{{ $pr }}">
                                    <input type="hidden" value="{{ $prcheck }}">
                                    <input type="hidden" value="{{ $price->lapangan_id }}"> --}}
                                    <form action="{{ route('price.edit', $prcheck ) }}" method="GET">
                                        <button class="btn btn-success">{{ $pr }}</button>
                                    </form>
                                </td>
                                <?php } ?>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <td> <input class="btn-check text-nowrap" id="($hours as $hour)" name="hours[]" type="checkbox"
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
                                <input class="btn-check text-nowrap" id="minggu" name="hours[]" type="checkbox"
                                    value="" checked autocomplete="off"> <label class="btn btn-user-daftar"
                                    for="minggu">
                                    80000</label>
                            </td>
                            </td> --}}

            {{-- <div class="col-sm-12 col-md-6">
                <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                            class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
                    <a href="#" class="btn btn-light btn-icon-split">
                        <span class="icon text-gray-600">
                            <i class="fas fa-cart-arrow-down"></i>
                        </span>
                        <span class="text">Bayar Sekarang</span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
