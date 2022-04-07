<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    public function index(){
        return view('dashboard.index');
    }

    public function crud(){
        $dummy = Dummy::get();
        return view('dashboard.crud', compact('dummy') );
    }

    public function store(Request $request){

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);
        
        $data = new Dummy;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil ditambahkan'
        );

        return Redirect()->back()->with($notification);

    }

    public function update(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);
        $data = Dummy::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil diperbaharui'
        );

        return Redirect()->back()->with($notification);

    }

    public function destroy(Request $request){
        $data = Dummy::find($request->id);
        $data->delete();

        $notification = array(
            'status' => 'success',
            'title' => 'Proses berhasil',
            'message' => 'Data berhasil dihapus'
        );
        return Redirect()->back()->with($notification);
    }
}
