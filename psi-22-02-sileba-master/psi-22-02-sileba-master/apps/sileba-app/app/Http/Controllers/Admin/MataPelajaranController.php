<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\MataPelajaran;
use App\Models\Pengguna;
use App\Models\Guru;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MataPelajaranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = MataPelajaran::where('nama_mapel','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.pelajaran.list', compact('collection'));
        }
        return view('pages.admin.pelajaran.main');
    }
    public function create()
    {
        $guru = Guru::get();
        $kelas = Room::get();
        return view('pages.admin.pelajaran.input', ['pelajaran' => new MataPelajaran, 'guru' => $guru, 'kelas' => $kelas]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_mapel' => 'required',
            'deskripsi' => 'required',
            'guru' => 'required',
            'kelas' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_mapel')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_mapel'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('guru')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('guru'),
                ]);
            }elseif ($errors->has('kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kelas'),
                ]);
            }
        }
        $mataPelajaran = new MataPelajaran;
        $mataPelajaran->nama_mapel = $request->nama_mapel;
        $mataPelajaran->deskripsi = Str::title($request->deskripsi);
        $mataPelajaran->guru_id = $request->guru;
        $mataPelajaran->kelas_id = $request->kelas;
        $mataPelajaran->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Mata Pelajaran '. $request->nama_mapel . ' tersimpan',
        ]);
    }
    public function show(MataPelajaran $course)
    {
        //
    }
    public function edit(MataPelajaran $pelajaran)
    {
        $kelas = Room::get();
        $guru =  Guru::get();
        return view('pages.admin.pelajaran.input', compact('guru','pelajaran','kelas'));
    }
    public function update(Request $request, MataPelajaran $pelajaran)
    {
        $validator = Validator::make($request->all(), [
            'nama_mapel' => 'required',
            'deskripsi' => 'required',
            'guru' => 'required',
            'kelas' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_mapel')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_mapel'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('guru')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('guru'),
                ]);
            }elseif ($errors->has('kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kelas'),
                ]);
            }
        }
        $pelajaran->nama_mapel = Str::title($request->nama_mapel);
        $pelajaran->deskripsi = Str::title($request->deskripsi);
        $pelajaran->kelas_id = $request->kelas;
        $pelajaran->guru_id = $request->guru;
        $pelajaran->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Mata Pelajaran '. $request->nama_mapel . ' terupdate',
        ]);
    }
    public function destroy(MataPelajaran $pelajaran)
    {
        $pelajaran->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Mata Pelajaran '. $pelajaran->nama_mapel . ' terhapus',
        ]);
    }
}
