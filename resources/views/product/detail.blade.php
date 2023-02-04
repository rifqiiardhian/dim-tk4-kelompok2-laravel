@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Detail Data Barang</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="user_akses" class="form-label fw-bold">Nama Pengguna</label>
                                        <p>{{ $data->namaDepan }} - {{ $data->namaBelakang }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_pengguna" class="form-label fw-bold">Nama Barang</label>
                                        <p>{{ $data->namaBarang }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_firstname" class="form-label fw-bold">Satuan</label>
                                        <p>{{ $data->satuan }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_hp" class="form-label fw-bold">Keterangan</label>
                                        <p>{{ $data->keterangan }}</p>
                                    </div>
                                    <a href="{{ route('product.index') }}" type="button" class="btn btn-primary">Kembali</a>
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
