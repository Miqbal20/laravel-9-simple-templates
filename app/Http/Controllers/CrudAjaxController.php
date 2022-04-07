<?php

namespace App\Http\Controllers;
use App\Models\Dummy;

use Illuminate\Http\Request;
use DataTables;

class CrudAjaxController extends Controller
{
    //
    public function index(){
        $data = Dummy::orderBy('id', 'desc')->get();  
        if(request()->ajax()){
            return datatables()->of($data)
            ->addColumn('Aksi', function($data){
                $button = "
                <button type='button' id='".$data->id."' class='update btn btn-warning'  >
                    <i class='fas fa-edit'></i>
                </button>";

                $button .= "
                <button type='button' id='".$data->id."' class='destroy btn btn-danger'>
                    <i class='fas fa-times'></i>
                </button>";

                return $button;
            })
            ->rawColumns(['Aksi'])
            ->make(true);
        }    
        return view('dashboard.crudAjax', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required', 
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);

        // $notification = array(
        //     'status' => 'success',
        //     'title' => 'Proses berhasil',
        //     'message' => 'Data berhasil ditambahkan'
        // );

        $data = new Dummy;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

    }

    public function show(Request $request){
        $id = $request->id;
        $data = Dummy::find($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request){
        $id = $request->id;
        $update = [
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ];

        $data = Dummy::find($id);
        $data->update($update);
        $data->save();

        return response()->json(['data' => $data]);
        
 
    }

    public function destroy(Request $request){
        $id = $request->id;
        $data = Dummy::find($id);
        $data->delete();

        return response()->json(['data' => $data]);
    }


}
