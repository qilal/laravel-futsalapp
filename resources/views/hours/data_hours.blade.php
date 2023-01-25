@extends('master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800">JAM</h1>
        <a href="{{ route('hour.create') }}"
            class="bg-gradient-info d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Jam</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>JAM</th>
                            <th class="d-flex justify-content-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($hours as $hour)
                            <tr>
                                <td>{{ $hour->id }}</td>
                                <td>{{ $hour->jam }}</td>
                                <td class="form-inline d-flex justify-content-center">
                                    <a href="{{ route('hour.edit', $hour->id) }}"
                                        class="btn btn-warning btn-sm btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form action="{{ route('hour.destroy', $hour->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-icon-split ml-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
