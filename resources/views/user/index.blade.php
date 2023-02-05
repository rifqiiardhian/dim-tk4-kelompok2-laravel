@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Pengelolaan Data Pengguna</h1>
                        <a href="{{ route('user.create') }}" class="btn btn-info text-white mt-2 mb-3">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-admin table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Akses</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $user)
                                    <tr>
                                        <th scope="row">{{ $user->idPengguna }}</th>
                                        <td>{{ $user->namaDepan }} {{ $user->namaBelakang }}</td>
                                        <td>{{ $user->namaPengguna }}</td>
                                        <td>{{ $user->namaAkses }} - {{ $user->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('user.show', $user->idPengguna) }}" class="btn btn-sm btn-secondary text-white"><i class='bx bx-show' ></i></a>
                                            <a href="{{ route('user.edit', $user->idPengguna) }}" class="btn btn-sm btn-warning text-white"><i class='bx bxs-pencil'></i></a>
                                            <button class="btn btn-sm btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $user->idPengguna }}"><i class='bx bxs-trash' ></i></button>
                                            <div class="modal fade" id="modal_delete_{{ $user->idPengguna }}" tabindex="-1" aria-labelledby="modal_delete_label_{{ $user->idPengguna }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal_delete_label_{{ $user->idPengguna }}">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to delete this data?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('user.delete', ['id' => $user->idPengguna]) }}" type="button" class="btn btn-success">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
