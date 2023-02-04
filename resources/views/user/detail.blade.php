@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Detail Data Pengguna</h1>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="user_akses" class="form-label fw-bold">Hak Akses</label>
                                        <p>{{ $data->namaAkses }} - {{ $data->keterangan }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_pengguna" class="form-label fw-bold">Nama Pengguna / Username</label>
                                        <p>{{ $data->namaPengguna }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_firstname" class="form-label fw-bold">Nama Lengkap</label>
                                        <p>{{ $data->namaDepan }} {{ $data->namaBelakang }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_hp" class="form-label fw-bold">No HP</label>
                                        <p>{{ $data->noHp }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_alamat" class="form-label fw-bold">Alamat</label>
                                        <p>{{ $data->alamat }}</p>
                                    </div>
                                    <a href="{{ route('user.index') }}" type="button" class="btn btn-primary">Kembali</a>
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
