@extends('layouts.default')

@section('title')
    Form Machine
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-5 py-3 text-right">
                <a href="{{ route('machine.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data Alat
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
                            <th>Tag</th>
                            <th>Area</th>
                            <th>Merk</th>
                            <th>Model</th>
                            <th>Range</th>
                            <th>Unit</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    
                    @forelse ($data as $item)
                        <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->tag }}</td>
                            <td>{{ $item->area }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->model }}</td>
                            <td>{{ $item->range }}</td>
                            <td>{{ $item->unit }}</td>
                            <td class="text-right">
                              <a href=".mymodal"
                              
                             data-remote="{{ route('machine.show', $item->id) }}"
                            data-toggle="modal"
                            data-target=".mymodal"
                            data-title="Detail {{ $item->name }}"

                              class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                              </a>
                              <form action="{{ route('machine.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="9" class="p-3 text-center">Data tidak ditemukan</td>
                        </tr>
                    </tbody>
                    @endforelse
              
                </table>
            </div>
        </div>
    </div>
@endsection
