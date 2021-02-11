@extends('layouts.second')

@section('title', 'Tambah Alat')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Alat</h1>
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
            <form method="post" action="{{ route('machine.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Mesin" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="tag" class="form-control-label">Pilih Tag</label>
                    <select name="tag" class="form-control">
                        <option value="T7UUI">T7UUI</option>
                        <option value="987IO">987IO</option>
                        <option value="3RKLL">3RKLL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="area">Area</label>
                    <input type="text" class="form-control" name="area" placeholder="Machine Area" value="{{ old('area') }}">
                </div>
                <div class="form-group">
                    <label for="merk">Merk</label>
                    <input type="text" class="form-control" name="merk" placeholder="merk" value="{{ old('merk') }}">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" name="model" placeholder="model" value="{{ old('model') }}">
                </div>
                <div class="form-group">
                    <label for="range" class="form-control-label">Tentukan Rank</label>
                    <select name="range" class="form-control">
                        <option value="1-10">1-10</option>
                        <option value="10-20">10-20</option>
                        <option value="20-40">20-40</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input type="number" class="form-control" name="unit" placeholder="Unit" value="{{ old('unit') }}">
                </div>
                
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>
    </div>
    
</div>
@endsection
