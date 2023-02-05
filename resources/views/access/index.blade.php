@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <h1>Pengelolaan Data Hak Akses</h1>
                        <a href="{{ route('access.create') }}" class="btn btn-info text-white mt-2 mb-3">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-admin table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Akses</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $access)
                                    <tr>
                                        <th scope="row">{{ $access->idAkses }}</th>
                                        <td>{{ $access->namaAkses }}</td>
                                        <td>{{ $access->keterangan }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('access.edit', $access->idAkses) }}" class="btn btn-sm btn-warning text-white"><i class='bx bxs-pencil'></i></a>
                                            &nbsp;
                                            <button type="button" class="btn btn-sm btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modal_delete_{{ $access->idAkses }}"><i class='bx bxs-trash'></i></button>
                                            <div class="modal fade" id="modal_delete_{{ $access->idAkses }}" tabindex="-1" aria-labelledby="modal_delete_label_{{ $access->idAkses }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal_delete_label_{{ $access->idAkses }}">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to delete this data?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('access.delete', ['id' => $access->idAkses]) }}" type="button" class="btn btn-success">Confirm</a>
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
