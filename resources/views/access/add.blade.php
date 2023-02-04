@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Tambah Hak Akses</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <form action="{{ route('access.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="akses-nama" class="form-label">Nama Akses *</label>
                                        <input type="text" class="form-control" id="akses_nama" name="akses_nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="akses-keterangan" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="akses_keterangan" name="akses_keterangan" rows="3"></textarea>
                                    </div>
                                    <a href="{{ route('access.index') }}" type="button" class="btn btn-primary">Kembali</a>
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
