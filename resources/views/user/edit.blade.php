@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Edit Data Pengguna</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <form action="{{ route('user.update', $data->idPengguna) }}" method="post">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="mb-3">
                                        <label for="user_akses" class="form-label">Hak Akses *</label>
                                        <select name="user_akses" id="user_akses" class="form-control" required>
                                            @foreach($akses as $selectdata)
                                            <option value="{{ $selectdata->idAkses }}" @if($data->idAkses === $selectdata->idAkses) selected @endif>{{ $selectdata->namaAkses }} - {{ $selectdata->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_pengguna" class="form-label">Nama Pengguna / Username *</label>
                                        <input type="text" class="form-control" id="user_pengguna" name="user_pengguna" value="{{ $data->namaPengguna }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_firstname" class="form-label">Nama Depan *</label>
                                        <input type="text" class="form-control" id="user_firstname" name="user_firstname" value="{{ $data->namaDepan }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_lastname" class="form-label">Nama Belakang *</label>
                                        <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="{{ $data->namaBelakang }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_hp" class="form-label">No HP *</label>
                                        <input type="text" class="form-control" id="user_hp" name="user_hp" value="{{ $data->noHp }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_alamat" class="form-label">Alamat *</label>
                                        <textarea class="form-control" id="user_alamat" name="user_alamat" rows="3" required>{{ $data->alamat }}</textarea>
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
