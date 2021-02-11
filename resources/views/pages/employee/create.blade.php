@extends('layouts.second')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Karyawan</h1>
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
            <form method="post" action="{{ route('employee.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukan nama" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="departemen" class="form-control-label">Pilih Jabatan</label>
                    <select name="departemen" class="form-control">
                        <option value="Manager">Manager</option>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Sales">Sales</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="area">Divisi</label>
                    <input type="text" class="form-control" name="divisi" placeholder="Pilih Divisi" value="{{ old('divisi') }}">
                </div>
                <div class="form-group">
                    <label for="merk">No Badge</label>
                    <input type="text" class="form-control" name="no_badge" placeholder="No Badge" value="{{ old('no_badge') }}">
                </div>
                
                
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
