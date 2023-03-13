@extends('master')
@section('title', 'Rental Field Futsal | Create Owner')
@section('content')
    <div class="container">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create Owner Account</h1>
                        </div>
                        <form action="{{ route('owner.store') }}" method="POST" class="user">
                            @csrf
                            <input id="role_id" name="role_id" type="hidden" value="2">
                            <div class="form-group">

                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Name">

                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input name="nomer_tlp" type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="number phone">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input name="password_confirmation" type="password"
                                        class="form-control form-control-user" id="exampleRepeatPassword"
                                        placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lapangan">Lapangan</label>
                                <select class="form-control " name="lapangan" id="lapangan">
                                    @foreach ($lapangan as $lapangan)
                                        <option value="{{ $lapangan->id_lapangan_futsal }}">{{ $lapangan->nama }}</option>
                                    @endforeach
                                </select>
                             </div>
                            <button type="submit" class="btn btn-primary bg-gradient-info btn-xl">
                                Create Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
