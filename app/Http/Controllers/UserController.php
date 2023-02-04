<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pengguna')
                    ->join('hakAkses', 'pengguna.idAkses', '=', 'hakAkses.idAkses')
                    ->select('pengguna.idPengguna', 'pengguna.namaDepan', 'pengguna.namaBelakang', 'pengguna.namaPengguna', 'hakAkses.namaAkses', 'hakAkses.keterangan')
                    ->orderBy('pengguna.idPengguna', 'asc')
                    ->get();
                    
        return view('user/index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akses = Access::orderBy('namaAkses', 'asc')->get();
        return view('user/add', ['akses' => $akses]);
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
            'user_akses' => 'required',
            'user_pengguna' => 'required',
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'user_hp' => 'required',
            'user_alamat' => 'required',
            'user_pass' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate);
        } else {
            $idAkses = $request->user_akses;
            $namaPengguna = $request->user_pengguna;
            $namaDepan = $request->user_firstname;
            $namaBelakang = $request->user_lastname;
            $noHp = $request->user_hp;
            $alamat = $request->user_alamat;
            $password = Hash::make($request->user_pass);

            $save = User::create([
                        'idAkses' => $idAkses,
                        'namaPengguna' => $namaPengguna,
                        'namaDepan' => $namaDepan,
                        'namaBelakang' => $namaBelakang,
                        'noHp' => $noHp,
                        'alamat' => $alamat,
                        'password' => $password
                    ]);

            if ($save) {
                return redirect()->route('user.index')->with('message', 'Successfully add user data!');
            } else {
                return redirect()->back()->with('error', "Can't add new user! Try again");
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
        $data = DB::table('pengguna')
                ->join('hakAkses', 'pengguna.idAkses', '=', 'hakAkses.idAkses')
                ->select('pengguna.idPengguna', 'pengguna.namaDepan', 'pengguna.namaBelakang', 'pengguna.namaPengguna', 'hakAkses.namaAkses', 'hakAkses.keterangan', 'pengguna.noHp', 'pengguna.alamat')
                ->where('pengguna.idPengguna', $id)
                ->first();

        return view('user/detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akses = Access::orderBy('namaAkses', 'asc')->get();
        $data = User::where('idPengguna', $id)->first();

        return view('user/edit', ['data' => $data, 'akses' => $akses]);
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
            'user_akses' => 'required',
            'user_pengguna' => 'required',
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'user_hp' => 'required',
            'user_alamat' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate);
        } else {
            $idAkses = $request->user_akses;
            $namaPengguna = $request->user_pengguna;
            $namaDepan = $request->user_firstname;
            $namaBelakang = $request->user_lastname;
            $noHp = $request->user_hp;
            $alamat = $request->user_alamat;

            $save = User::where('idPengguna', $id)->update([
                        'idAkses' => $idAkses,
                        'namaPengguna' => $namaPengguna,
                        'namaDepan' => $namaDepan,
                        'namaBelakang' => $namaBelakang,
                        'noHp' => $noHp,
                        'alamat' => $alamat
                    ]);

            if ($save) {
                return redirect()->route('user.index')->with('message', 'Successfully updated user data!');
            } else {
                return redirect()->back()->with('error', "Can't updated the user! Try again");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $delete = User::where('idPengguna', $id)->delete();

        if ($delete) {
            return redirect()->route('user.index')->with('message', 'Successfully deleted user data!');
        } else {
            return redirect()->back()->with('error', "Can't delete the user data! Try again");
        }
    }
}
