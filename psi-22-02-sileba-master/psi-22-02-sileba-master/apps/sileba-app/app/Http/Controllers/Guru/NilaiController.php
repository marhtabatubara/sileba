<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pengumpulan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Pengumpulan::join('tugas','tugas_id','=','tugas.id')
            ->join('mata_pelajaran','matpel_id','=','mata_pelajaran.id')
            ->join('pengguna','mata_pelajaran.guru_id','=','pengguna.nip')
            ->join('siswa','pengumpulan_tugas.nisn','=','siswa.nisn')
            ->select('pengumpulan_tugas.id','tugas.judul_tugas','siswa.nama','pengumpulan_tugas.file','pengumpulan_tugas.nilai','pengumpulan_tugas.diupload_pada','mata_pelajaran.nama_mapel')
            ->where('mata_pelajaran.nama_mapel','like','%'.$keywords.'%')
            ->where('mata_pelajaran.guru_id',Auth::user()->nip)
            ->paginate(10);
            return view('pages.guru.nilai.list', compact('collection'));
        }
        return view('pages.guru.nilai.main');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumpulan $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumpulan $nilai)
    {
        return view('pages.guru.nilai.input', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumpulan $nilai)
    {
        $validator = Validator::make($request->all(), [
            'nilai' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nilai')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nilai'),
                ]);
            }
        }
        $nilai->nilai = $request->nilai;
        $nilai->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Nilai tersimpan',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumpulan $nilai)
    {
        //
    }
}
