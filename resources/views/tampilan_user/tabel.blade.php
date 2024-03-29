@extends('tampilan_user.master')
@section('title', 'Futsal Field Rental | Jadwal Booking')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->nama }}</h6>

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
                                    <input class="btn-check text-nowrap" id="{{ $prcheck }}" name="hours[]"
                                        type="checkbox" value=""disabled>
                                    <label class="btn btn-danger" for="{{ $prcheck }}">{{ $pr }}</label>
                                </td>
                                <?php } else { ?>
                                <td>
                                    <button class="btn btn-success">{{ $pr }}</button>
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

                            {{-- <div class="modal-footer">
                                <a href="#" data-toggle="modal" data-target="#Cart" class="btn btn-light btn-icon-split">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </span>
                                    <span class="text">Bayar Sekarang</span>
                                    </a>
                                </div>
                                
                                <div class="modal fade" id="Cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    
                                </div> --}}
                    </div>
                </div>
             </div>
        </div>
    </div>
@endsection
