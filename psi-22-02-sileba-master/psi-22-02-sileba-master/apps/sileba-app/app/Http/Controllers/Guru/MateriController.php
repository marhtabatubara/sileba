<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
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
            $collection = Materi::join('mata_pelajaran','matpel_id','=','mata_pelajaran.id')
            ->join('pengguna','mata_pelajaran.guru_id','=','pengguna.nip')
            ->join('kelas','materi_pembelajaran.kelas_id','=','kelas.id')
            ->select('materi_pembelajaran.id','mata_pelajaran.nama_mapel','kelas.kode_kelas','materi_pembelajaran.judul','materi_pembelajaran.deskripsi','materi_pembelajaran.berkas_materi')
            ->where('mata_pelajaran.nama_mapel','like','%'.$keywords.'%')
            ->where('mata_pelajaran.guru_id',Auth::user()->nip)
            ->paginate(10);
            return view('pages.guru.materi.list', compact('collection'));
        }
        return view('pages.guru.materi.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Room::get();
        $matpel = MataPelajaran::where('guru_id', Auth::user()->nip)->get();
        return view('pages.guru.materi.input', ['materi' => new Materi, 'matpel' => $matpel ,'kelas' => $kelas]);
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
            'kelas' => 'required',
            'matpel' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'berkas_materi' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kelas'),
                ]);
            }elseif ($errors->has('matpel')) {
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
            }elseif ($errors->has('berkas_materi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('berkas_materi'),
                ]);
            }
        }
        $materi = new Materi;
        $berkas = request()->file('berkas_materi')->store('materi');
        $materi->matpel_id = $request->matpel;
        $materi->kelas_id = $request->kelas;
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->berkas_materi =$berkas;
        $materi->created_at = now();
        $materi->updated_at = now();
        $materi->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Materi '. $request->judul . ' tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        $kelas = Room::get();
        $matpel = MataPelajaran::where('guru_id', Auth::user()->nip)->get();
        return view('pages.guru.materi.input', compact('materi','kelas','matpel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'matpel' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kelas'),
                ]);
            }elseif ($errors->has('matpel')) {
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
            }
        }
        $materi->matpel_id = $request->matpel;
        $materi->kelas_id = $request->kelas;
        $materi->judul = $request->judul;
        if((request()->file('berkas_materi'))){
            Storage::delete($materi->berkas_materi);
            $berkas = request()->file('berkas_materi')->store('materi');
            $materi->berkas_materi = $berkas;
        }
        $materi->deskripsi = $request->deskripsi;
        $materi->created_at = now();
        $materi->updated_at = now();
        $materi->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Materi '. $request->judul . ' diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        Storage::delete($materi->berkas_materi);
        $materi->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Materi '. $materi->judul . ' dihapus',
        ]);
    }
}
