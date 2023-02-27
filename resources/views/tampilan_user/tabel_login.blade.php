@extends('tampilan_user.master_user_login')
@section('title', 'Futsal Field Rental | Jadwal Booking')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
        </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $lapangan->nama }}</h6>

            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><span class="mx-1">JAM</span>/<span class="m-1">HARI</span></th>
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
                                $is_open = false ;
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
                                    <input class="btn-check text-nowrap" id="$prcheck" name="id"
                                        type="checkbox" value="{{ $prcheck }}"disabled>
                                    <label class="btn btn-danger" for="{{ $prcheck }}">{{ $pr }}</label>
                                </td>
                                <?php } else { ?>
                                <td>
                                    <form action="{{ route('cart.store') }}" method="POST" > {{-- enctype="multipart/form-data" --}}
                                        @csrf
                                        <input type="hidden" value="{{ $prcheck }}" name="id">
                                        <input type="hidden" value="{{ $hour->jam . ' | ' . $day->nama . ' | Lapangan ' .  $lapangan->nama }}" name="name">
                                        <input type="hidden" value="{{ $pr }}" name="price">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="btn btn-success">{{ $pr }}</button>
                                    </form>
                                </td>
                                {{-- <div class="modal-footer ">
                                    <button class="btn btn-light btn-icon-split">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-cart-arrow-down"></i>
                                        </span>
                                        <span class="text">Bayar Sekarang</span>
                                    </button>
                                </div>
                             --}}
                                <?php } ?>
                                @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
             {{-- enctype="multipart/form-data" --}}
            
            {{-- button bayar sekarang --}}
            {{-- <div class="modal-footer ">
                <a href="#" data-toggle="modal" data-target="#Cart" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                        <i class="fas fa-cart-arrow-down"></i>
                    </span>
                    <span class="text">Bayar Sekarang</span>
                </a>
            </div> --}}

        </div>
    </div>
    {{-- tampilan cart --}}
    {{-- <div class="modal fade" id="Cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-tittle">
                    <h3 class="text-bold">Cart List</h3>
                    </div>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="container">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-info" role="alert">
                        {{ $message }}
                        </div>
                    @endif
                    <div class="model-body">
                    <table class="table caption-top">
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-right">Harga</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>
                            <a href="#">
                                <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                            </a>
                            </td>
                            <td class="hidden text-right md:table-cell">
                            <span class="text-sm font-medium lg:text-base">
                                Rp. {{ $item->price }}
                            </span>
                            </td>
                            <td class="hidden text-left md:table-cell">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="btn btn-danger">x</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-right"><h5><b>Total Harga</b></h5></td>
                        <td class="text-right" colspan="2"><h5> Rp. {{ Cart::getTotal() }} </h5></td>
                    </tr>
                    </tbody>
                    </table>
                </div>
                    <div class="modal-footer">
                        <div class="col-md-8 text-right">
                            <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">Hapus Semua Keranjang</button>
                            </form>
                        </div>
                        <div class="col-md-3 text-left">
                            <form action="{{ route('order.checkout') }}" method="POST">
                            @csrf
                                <button class="btn btn-success">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
