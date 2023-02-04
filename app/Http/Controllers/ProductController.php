<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('barang')
                    ->join('pengguna', 'barang.idPengguna', '=', 'pengguna.idPengguna')
                    ->select('barang.idBarang', 'barang.namaBarang', 'barang.keterangan', 'pengguna.namaPengguna')
                    ->orderBy('barang.idBarang', 'asc')
                    ->get();

        return view('product/index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::orderBy('namaDepan', 'asc')->get();
        return view('product/add', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_user' => 'required',
            'product_nama' => 'required',
            'product_satuan' => 'required',
            'product_keterangan' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate);
        } else {
            $idPengguna = $request->product_user;
            $namaBarang = $request->product_nama;
            $satuan = $request->product_satuan;
            $keterangan = $request->product_keterangan;

            $save = Product::create([
                        'idPengguna' => $idPengguna,
                        'namaBarang' => $namaBarang,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan,
                    ]);

            if ($save) {
                return redirect()->route('product.index')->with('message', 'Successfully add product data!');
            } else {
                return redirect()->back()->with('error', "Can't add new product! Try again");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('barang')
                ->join('pengguna', 'barang.idPengguna', '=', 'pengguna.idPengguna')
                ->select('barang.namaBarang', 'barang.satuan', 'barang.keterangan', 'pengguna.namaDepan', 'pengguna.namaBelakang')
                ->where('barang.idBarang', $id)
                ->first();

        return view('product/detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::orderBy('namaDepan', 'asc')->get();
        $data = Product::where('idBarang', $id)->first();

        return view('product/edit', ['data' => $data, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'product_user' => 'required',
            'product_nama' => 'required',
            'product_satuan' => 'required',
            'product_keterangan' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate);
        } else {
            $idPengguna = $request->product_user;
            $namaBarang = $request->product_nama;
            $satuan = $request->product_satuan;
            $keterangan = $request->product_keterangan;

            $save = Product::where('idBarang', $id)->update([
                        'idPengguna' => $idPengguna,
                        'namaBarang' => $namaBarang,
                        'satuan' => $satuan,
                        'keterangan' => $keterangan,
                    ]);

            if ($save) {
                return redirect()->route('product.index')->with('message', 'Successfully updated product data!');
            } else {
                return redirect()->back()->with('error', "Can't update the product! Try again");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function delete($id)
    {
        $delete = Product::where('idBarang', $id)->delete();

        if ($delete) {
            return redirect()->route('product.index')->with('message', 'Successfully deleted product data!');
        } else {
            return redirect()->back()->with('error', "Can't delete the product data! Try again");
        }
    }
}
