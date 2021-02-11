@extends('layouts.default')

@section('title')
    Form Machine
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-5 py-3 text-right">
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Foto Alat
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nama Alat</th>
                            <th>Photo</th>
                        
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    @forelse ($items as $item)
                        <tbody>
                        <tr>
                            <td class="align-middle text-center">{{ $item->id }}</td>
                            <td class="align-middle text-center">{{ $item->machines->name }}</td>
                            <td class="text-center align-middle">
                                <img src="{{ url($item->photo) }}" alt="" style="width: 60px;">
                            </td>

                            <td class="align-middle text-center">
                              <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="4" class="p-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    </tbody>
                    @endforelse
              
                </table>
            </div>
        </div>
    </div>
@endsection
