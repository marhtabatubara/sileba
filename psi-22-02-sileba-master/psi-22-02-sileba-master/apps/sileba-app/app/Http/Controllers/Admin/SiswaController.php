<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Siswa::
            where('nama','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.siswa.list', compact('collection'));
        }
        return view('pages.admin.siswa.main');
    }
    public function create()
    {
        $kelas = Room::get();
        return view('pages.admin.siswa.input', ['siswa' => new Siswa, 'kelas' => $kelas]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'numeric|nullable|unique:siswa,nisn|unique:pengguna,nisn',
            'nama' => 'required',
            'email' => 'required|unique:siswa,email|max:255',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:pengguna,username',
            'password' => 'required|min:8',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nisn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nisn'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('tgl_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tgl_lahir'),
                ]);
            }elseif ($errors->has('agama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('agama'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('jenis_kelamin')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_kelamin'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new Siswa;
        $user->nisn = $request->nisn;
        $user->nama = Str::title($request->nama);
        $user->email = $request->email;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->agama = Str::upper($request->agama);
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        if($request->kelas){
            $user->kelas_id= $request->kelas;
        }
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        
        $account = new Pengguna;
        $account->role = 's';
        $account->nisn = $user->nisn;
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->created_at = now();
        $account->updated_at = now();
        $account->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa '. $request->nama . ' tersimpan',
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'date_birth' => 'required',
            'place_birth' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|unique:users|min:9|max:15',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('nisn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nisn'),
                ]);
            }elseif ($errors->has('kelas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kelas'),
                ]);
            }elseif ($errors->has('date_birth')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('date_birth'),
                ]);
            }elseif ($errors->has('place_birth')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('place_birth'),
                ]);
            }elseif ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            }elseif ($errors->has('religion')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('religion'),
                ]);
            }elseif ($errors->has('gender')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gender'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new Siswa;
        $user->nisn = $request->nisn;
        $user->class_id = $request->kelas;
        $user->name = Str::title($request->name);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 's';
        $user->date_birth = $request->date_birth;
        $user->place_birth = $request->place_birth;
        $user->address = $request->address;
        $user->religion = $request->religion;
        $user->gender = $request->gender;
        $user->kelas_id= $request->kelas;
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa '. $request->name . ' tersimpan',
        ]);
    }
    public function show(Siswa $siswa)
    {
        //
    }
    public function edit(Siswa $siswa)
    {
        $kelas = Room::get();
        return view('pages.admin.siswa.input', compact('siswa','kelas'));
    }
    public function update(Request $request, Siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'numeric|nullable|unique:siswa,nisn,'.$siswa->nisn.',nisn','|unique:pengguna,nisn,'.$siswa->nisn.',nisn',
            'nama' => 'required',
            'email' => 'required|max:255|unique:siswa,email,'.$siswa->nisn.',nisn',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:pengguna,username,'.$siswa->nisn.',nisn',
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nisn')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nisn'),
                ]);
            }elseif ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('tgl_lahir')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tgl_lahir'),
                ]);
            }elseif ($errors->has('agama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('agama'),
                ]);
            }elseif ($errors->has('alamat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('alamat'),
                ]);
            }elseif ($errors->has('jenis_kelamin')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jenis_kelamin'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $siswa->nisn = $request->nisn;
        $siswa->nama = Str::title($request->nama);
        $siswa->email = $request->email;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->agama = Str::upper($request->agama);
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->updated_at = now();
        $siswa->kelas_id= $request->kelas;
        $siswa->update();

        $account = Pengguna::where('nisn', $siswa->nisn)->first();
        $account->nisn = $siswa->nisn;
        $account->username = $request->username;
        if($request->password){
            $account->password = Hash::make($request->password);
        }
        $account->updated_at = now();
        $account->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'siswa '. $request->nama . ' diubah',
        ]);
    }
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Siswa '. $siswa->name . ' terhapus',
        ]);
    }
}
