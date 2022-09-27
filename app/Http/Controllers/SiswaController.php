<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Jurusan;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $siswa = Siswa::all();
        return view('siswa.index', compact('jurusan', 'siswa'));
    }


    public function data(){
        $siswa = Siswa::orderBy('id', 'desc')->get();

        return datatables()
            ->of($siswa)
            ->addIndexColumn()
            ->addColumn('jurusan_id', function($siswa){
                $jurusan =  $siswa->jurusan->nama;
                return $jurusan;
            })
            ->addColumn('aksi', function ($siswa){
                return '<div class="btn-group">
                    <a href="/siswa/print/'.$siswa->id.'" class="btn btn-sm btn-success"><i class="fa fa-print"></i></a>
                    <button onclick="editForm(`'. route('siswa.update', $siswa->id) .'`)" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                    <button onclick="deleteData(`'. route('siswa.destroy', $siswa->id) .'`)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric|min:16',
            'kip' => 'nullable',
            'jenis_kelamin' => 'required',
            'jurusan_id' => 'required',
            'asal_sekolah' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date_format:Y-m-d',
            'agama' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $siswa = Siswa::create($request->all());

        return response()->json(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);

        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
    }

    public function print($id){
        $siswa =  Siswa::find($id);
        $setting = Setting::find(1);

        $pdf = Pdf::loadView('siswa.print', compact('siswa', 'setting'));
        return $pdf->stream($siswa->nama .'.pdf');
    }

    public function export() 
    {
        return Excel::download(new SiswaExport(), 'siswa.xlsx');
    }
}
