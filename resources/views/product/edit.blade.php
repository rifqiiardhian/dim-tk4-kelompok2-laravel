@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Edit Data Barang</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <form action="{{ route('product.update', $data->idBarang) }}" method="post">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="mb-3">
                                        <label for="product_user" class="form-label">Pengguna *</label>
                                        <select name="product_user" id="product_user" class="form-control" required>
                                            @foreach($user as $selectdata)
                                            <option value="{{ $selectdata->idPengguna }}" @if($data->idPengguna === $selectdata->idPengguna) selected @endif>{{ $selectdata->namaDepan }}  {{ $selectdata->namaBelakang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_nama" class="form-label">Nama Barang *</label>
                                        <input type="text" class="form-control" id="product_nama" name="product_nama" value="{{ $data->namaBarang }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_satuan" class="form-label">Satuan *</label>
                                        <input type="text" class="form-control" id="product_satuan" name="product_satuan" value="{{ $data->satuan }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_keterangan" class="form-label">Keterangan *</label>
                                        <textarea class="form-control" id="product_keterangan" name="product_keterangan" rows="3" required>{{ $data->keterangan }}</textarea>
                                    </div>
                                    <a href="{{ route('product.index') }}" type="button" class="btn btn-primary">Kembali</a>
                                    <button type="reset" class="btn btn-secondary">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
