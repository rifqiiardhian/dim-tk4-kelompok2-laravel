@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Tambah Data Pengguna</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <form action="{{ route('user.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="user_akses" class="form-label">Hak Akses *</label>
                                        <select name="user_akses" id="user_akses" class="form-control" required>
                                            @foreach($akses as $data)
                                            <option value="{{ $data->idAkses }}">{{ $data->namaAkses }} - {{ $data->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_pengguna" class="form-label">Nama Pengguna / Username *</label>
                                        <input type="text" class="form-control" id="user_pengguna" name="user_pengguna" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_firstname" class="form-label">Nama Depan *</label>
                                        <input type="text" class="form-control" id="user_firstname" name="user_firstname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_lastname" class="form-label">Nama Belakang *</label>
                                        <input type="text" class="form-control" id="user_lastname" name="user_lastname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_hp" class="form-label">No HP *</label>
                                        <input type="text" class="form-control" id="user_hp" name="user_hp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_alamat" class="form-label">Alamat *</label>
                                        <textarea class="form-control" id="user_alamat" name="user_alamat" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_pass" class="form-label">Password Generated *</label>
                                        <input type="text" class="form-control" id="user_pass" name="user_pass" required>
                                    </div>
                                    <a href="{{ route('user.index') }}" type="button" class="btn btn-primary">Kembali</a>
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
