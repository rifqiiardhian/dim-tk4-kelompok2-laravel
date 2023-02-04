@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Tambah Data Barang</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <form action="{{ route('product.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="product_user" class="form-label">Pengguna *</label>
                                        <select name="product_user" id="product_user" class="form-control" required>
                                            @foreach($user as $data)
                                            <option value="{{ $data->idPengguna }}">{{ $data->namaDepan }}  {{ $data->namaBelakang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_nama" class="form-label">Nama Barang *</label>
                                        <input type="text" class="form-control" id="product_nama" name="product_nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_satuan" class="form-label">Satuan *</label>
                                        <input type="text" class="form-control" id="product_satuan" name="product_satuan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_keterangan" class="form-label">Keterangan *</label>
                                        <textarea class="form-control" id="product_keterangan" name="product_keterangan" rows="3" required></textarea>
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
