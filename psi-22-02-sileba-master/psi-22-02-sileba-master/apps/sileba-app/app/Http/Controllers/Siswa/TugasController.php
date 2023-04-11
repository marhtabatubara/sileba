<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pengumpulan;
use App\Models\Tugas;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
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
            $collection = Tugas::join('mata_pelajaran','matpel_id','=','mata_pelajaran.id')
            ->join('siswa','mata_pelajaran.kelas_id','=','siswa.kelas_id')
            ->join('pengguna','siswa.nisn','=','pengguna.nisn')
            ->select('tugas.id','mata_pelajaran.nama_mapel','tugas.end_at','tugas.judul_tugas','tugas.start_at','tugas.berkas_tugas')
            ->where('mata_pelajaran.nama_mapel','like','%'.$keywords.'%')
            ->where('siswa.nisn',Auth::user()->nisn)
            ->paginate(10);
            return view('pages.siswa.tugas.list', compact('collection'));
        }
        return view('pages.siswa.tugas.main');
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
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('file')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('file'),
                ]);
            }
        }
        $pengumpulan = new Pengumpulan;
        $berkas = request()->file('file')->store('pengumpulan_tugas');
        $pengumpulan->tugas_id = $request->tugas_id;
        $pengumpulan->nisn = Auth::user()->nisn;
        $pengumpulan->file =$berkas;
        $pengumpulan->diupload_pada = now();
        $pengumpulan->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pengumupulan tugas tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tuga)
    {
        $pengumpulan = Pengumpulan::where('tugas_id', $tuga->id)->first();
        return view('pages.siswa.tugas.input', compact('tuga','pengumpulan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tuga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tuga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tuga)
    {
        //
    }
}
