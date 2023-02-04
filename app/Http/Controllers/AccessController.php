<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Access::orderBy('idAkses', 'asc')->get();
        return view('access/index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('access/add');
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
            'akses_nama' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate);
        } else {
            $namaAkses = $request->akses_nama;
            $keterangan = $request->akses_keterangan;

            $save = Access::create([
                        'namaAkses' => $namaAkses,
                        'keterangan' => $keterangan,
                    ]);

            if ($save) {
                return redirect()->route('access.index')->with('message', 'Successfully add access data!');
            } else {
                return redirect()->back()->with('error', "Can't add new access! Try again");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Access::where('idAkses', $id)->first();

        return view('access/edit', ['data' => $data]);
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
            'akses_nama' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate);
        } else {
            $namaAkses = $request->akses_nama;
            $keterangan = $request->akses_keterangan;

            $save = Access::where('idAkses', $id)->update([
                        'namaAkses' => $namaAkses,
                        'keterangan' => $keterangan
                    ]);

            if ($save) {
                return redirect()->route('access.index')->with('message', 'Successfully updated access data!');
            } else {
                return redirect()->back()->with('error', "Can't update the access data! Try again");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Access $access)
    {
        //
    }

    public function delete($id)
    {
        $delete = Access::where('idAkses', $id)->delete();

        if ($delete) {
            return redirect()->route('access.index')->with('message', 'Successfully deleted access data!');
        } else {
            return redirect()->back()->with('error', "Can't delete the access data! Try again");
        }
    }
}
