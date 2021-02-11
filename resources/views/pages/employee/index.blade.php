@extends('layouts.second')

@section('title')
    Form Karyawan
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-5 py-3 text-right">
                <a href="{{ route('employee.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Karyawan
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>No Badge</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    
                    @forelse ($data as $item)
                        <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->departemen }}</td>
                            <td>{{ $item->divisi }}</td>
                            <td>{{ $item->no_badge }}</td>
                            <td class="text-right">
                              <a href="" class="btn btn-info btn-sm">
                                <i class="fa fa-pencil-alt"></i>
                              </a>
                              <form action="{{ route('employee.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </form>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <tbody>
                        <tr>
                            <td colspan="6" class="p-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    </tbody>
                    @endforelse
              
                </table>
            </div>
        </div>
    </div>
@endsection