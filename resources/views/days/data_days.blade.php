@extends('master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
        <h1 class="h3 mb-0 text-gray-800">HARI</h1>
        <a href="{{ route('day.create') }}"
            class="bg-gradient-info d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Hari</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="d-flex justify-content-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($days as $day)
                            <tr>
                                <td>{{ $day->id }}</td>
                                <td>{{ $day->nama }}</td>
                                <td class="form-inline d-flex justify-content-center">
                                    <a href="{{ route('day.edit', $day->id) }}"
                                        class="btn btn-warning btn-sm btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <form action="{{ route('day.destroy', $day->id) }}" method="POST">
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
