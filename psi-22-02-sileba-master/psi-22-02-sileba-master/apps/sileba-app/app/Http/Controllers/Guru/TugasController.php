<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            ->join('pengguna','mata_pelajaran.guru_id','=','pengguna.nip')
            ->select('tugas.id','mata_pelajaran.nama_mapel','tugas.end_at','tugas.judul_tugas','tugas.start_at','tugas.berkas_tugas')
            ->where('mata_pelajaran.nama_mapel','like','%'.$keywords.'%')
            ->where('mata_pelajaran.guru_id',Auth::user()->nip)
            ->paginate(10);
            return view('pages.guru.tugas.list', compact('collection'));
        }
        return view('pages.guru.tugas.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matpel = MataPelajaran::where('guru_id', Auth::user()->nip)->get();
        return view('pages.guru.tugas.input', ['tuga' => new Tugas, 'matpel' => $matpel]);
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
            'matpel' => 'required',
            'judul' => 'required',
            'berkas_tugas' => 'required',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('matpel')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('matpel'),
                ]);
            }elseif ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('berkas_tugas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('berkas_tugas'),
                ]);
            }elseif ($errors->has('start_at')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('start_at'),
                ]);
            }elseif ($errors->has('end_at')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('end_at'),
                ]);
            }
        }
        $tuga = new Tugas;
        $berkas = request()->file('berkas_tugas')->store('tugas');
        $tuga->matpel_id = $request->matpel;
        $tuga->judul_tugas = $request->judul;
        $tuga->berkas_tugas =$berkas;
        $tuga->start_at = $request->start_at;
        $tuga->end_at = $request->end_at;
        $tuga->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Tugas '. $request->judul . ' tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tuga)
    {
        $matpel = MataPelajaran::where('guru_id', Auth::user()->nip)->get();
        return view('pages.guru.tugas.input', compact('tuga','matpel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tuga)
    {
         $validator = Validator::make($request->all(), [
            'matpel' => 'required',
            'judul' => 'required',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('matpel')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('matpel'),
                ]);
            }elseif ($errors->has('judul')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('judul'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('start_at')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('start_at'),
                ]);
            }elseif ($errors->has('end_at')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('end_at'),
                ]);
            }
        }
        $tuga->matpel_id = $request->matpel;
        $tuga->judul_tugas = $request->judul;
        if((request()->file('berkas_tugas'))){
            Storage::delete($tuga->berkas_tugas);
            $berkas = request()->file('berkas_tugas')->store('tugas');
            $tuga->berkas_tugas = $berkas;
        }
        $tuga->start_at = $request->start_at;
        $tuga->end_at = $request->end_at;
        $tuga->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Tugas '. $request->judul . ' diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tuga)
    {
        Storage::delete($tuga->berkas_tugas);
        $tuga->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Tugas '. $tuga->judul_tugas . ' dihapus',
        ]);
    }
}
