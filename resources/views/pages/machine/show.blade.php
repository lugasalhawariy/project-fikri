
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  @if($item->gallery->count() > 1)
    <ol class="carousel-indicators">
    @for($i = 0; $i < $item->gallery->count(); $i++)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class=""></li>
    @endfor
  </ol>
  @endif
  <div class="carousel-inner">
    @foreach ($item->gallery as $data)
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" id="demo">
        <img src="{{ url($data->photo) }}" alt="" class="d-block mx-auto my-3" style="min-height: 500px; max-height: 500px; max-weight: 100%;">
    </div>
    @endforeach
  </div>
  @if($item->gallery->count() > 1)
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
  @endif
</div>

<table class="table table-bordered">

    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Tag</th>
        <td>{{ $item->tag }}</td>
    </tr>
    <tr>
        <th>area</th>
        <td>{{ $item->area }}</td>
    </tr>
    <tr>
        <th>Merk</th>
        <td>{{ $item->merk }}</td>
    </tr>
    <tr>
        <th>Model</th>
        <td>{{ $item->model }}</td>
    </tr>
    <tr>
        <th>Range</th>
        <td>{{ $item->range }}</td>
    </tr>
    <tr>
        <th>Unit</th>
        <td>{{ $item->unit }}</td>
    </tr>
    <tr>
        <th>Histori Pemakaian</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>ID</th>
                    <th>Nama pengguna</th>
                    <th>Keterangan</th>
                    <th>Sparepart</th>
                </tr>
                <tr>
                    @foreach ($item->history as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->employee->name }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>{{ $data->sparepart }}</td>
                        </tr>
                    @endforeach
                </tr>
                {{-- tambah data history --}}
                

            </table>

            <h5 class="pt-3 pb-2">Tambah Histori Alat</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
            <form method="post" action="{{ route('history.store') }}">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="machines_id">
                <div class="form-group">
                    <label for="employees_id" class="form-control-label">Nama Karyawan</label>
                    <select name="employees_id" class="form-control">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan" value="{{ old('keterangan') }}">
                </div>
                <div class="form-group">
                    <label for="sparepart">Sparepart</label>
                    <input type="text" class="form-control" name="sparepart" placeholder="sparepart" value="{{ old('sparepart') }}">
                </div>
                
                
                {{-- tombol simpan --}}
                <button class="btn btn-primary btn-block" type="submit">Simpan</button>
            </form>

            

        </div>

        </td>
    </tr>
</table>