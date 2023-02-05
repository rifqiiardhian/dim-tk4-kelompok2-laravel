<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {    
       $pengguna = DB::table('pengguna')->count();
       $b_terjual = DB::table('penjualan')->sum('jumlahPenjualan');
       $pembeli = DB::table('pengguna')->where('namaPengguna', 'like', '%Pengguna%')->count();
       $hasil = DB::table(DB::raw("(SELECT hargaJual * jumlahPenjualan AS jumlah FROM penjualan) as a"))
            ->selectRaw("SUM(a.jumlah) AS hasil_a")
            ->value("hasil_a")
            - DB::table(DB::raw("(SELECT hargaBeli * jumlahPembelian AS jumlah FROM pembelian) as b"))
            ->selectRaw("SUM(b.jumlah) AS hasil_b")
            ->value("hasil_b");

        $data = DB::table('barang AS ba')
            ->select(
                'ba.namaBarang',
                'ba.idBarang',
                DB::raw(
                    '(
                        SELECT hargaJual * jumlahPenjualan
                        FROM penjualan AS a
                        WHERE a.idBarang = ba.idBarang
                    ) AS t_penjualan'
                ),
                DB::raw(
                    '(
                        SELECT SUM(a.jumlah)
                        FROM  (
                            SELECT hargaBeli * jumlahPembelian AS jumlah, idBarang FROM pembelian
                        ) AS a
                        WHERE a.idBarang = ba.idBarang
                        GROUP BY a.idBarang
                    ) AS t_pembelian'
                ),
                DB::raw(
                    '(
                        (
                            SELECT SUM(a.jumlah)
                            FROM  (
                                SELECT hargaBeli * jumlahPembelian AS jumlah, idBarang FROM pembelian
                            ) AS a
                            WHERE a.idBarang = ba.idBarang
                            GROUP BY a.idBarang
                        ) - 
                        (
                            SELECT hargaJual * jumlahPenjualan
                            FROM penjualan AS a
                            WHERE a.idBarang = ba.idBarang
                        )
                    ) AS laba_rugi'
                )
            )
            ->get();
        
        return view('dashboard/index', compact('data', 'hasil', 'pengguna','b_terjual','pembeli'));
    }   
}
