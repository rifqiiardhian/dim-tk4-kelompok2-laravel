@extends('layouts.app')

@section('content')
<div class="section section-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Laba Rugi</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Rp. {{ number_format($hasil, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Barang Terjual</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{$b_terjual}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Pengguna</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{$pengguna}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Pembeli</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{$pembeli}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-dashboard bg-white">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-admin table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Total Penjualan</th>
                                        <th scope="col">Total Pembelian</th>
                                        <th scope="col">Laba Rugi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data as $val)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $val->namaBarang }}</td>
                                        <td>{{ $val->t_penjualan ? number_format($val->t_penjualan) : '-' }}</td>                        
                                        <td>{{ $val->t_pembelian ? number_format($val->t_pembelian) : '-' }}</td>
                                        <td>{{ $val->laba_rugi ? number_format($val->laba_rugi) : '-'}}</td>                        
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
