@extends('layouts.second')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Photo Alat</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-shadow">
        <div class="card-body">
            <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="machines_id" class="form-control-label">Pilih Alat</label>
                    <select name="machines_id" class="form-control">
                        @foreach ($machines as $machine)
                            <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-label">Photo</label><br>
                    <input type="file" name="photo" placeholder="Photo">
                </div>
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
