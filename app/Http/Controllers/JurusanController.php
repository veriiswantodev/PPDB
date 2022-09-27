<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class JurusanController extends Controller
{
    
    public function index()
    {
        return view('jurusan.index');
    }

    public function data(){
        $jurusan = Jurusan::orderBy('id', 'desc')->get();

        return datatables()
            ->of($jurusan)
            ->addIndexColumn()
            // ->addColumn('aksi', function ($jurusan){
            //     return '<div class="btn-group">
            //         <button onclick="editForm(`'. route('jurusan.update', $jurusan->id) .'`)" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
            //         <button onclick="deleteData(`'. route('jurusan.destroy', $jurusan->id) .'`)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            //     </div>
            //     ';
            // })
            // ->rawColumns(['aksi'])
            ->make(true);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $jurusan = Jurusan::create([
            'nama' => $request->input('nama'),
            'slug' => Str::slug($request->input('nama')),
        ]);
        $jurusan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    
    public function show($id)
    {
        $jurusan = Jurusan::find($id);

        return response()->json($jurusan);
    }

   
    public function edit(Jurusan $jurusan)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->nama =  $request->nama;
        $jurusan->update();

        return response()->json('Data Berhasil di simpan', 200);
    }

    
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
    }
}
