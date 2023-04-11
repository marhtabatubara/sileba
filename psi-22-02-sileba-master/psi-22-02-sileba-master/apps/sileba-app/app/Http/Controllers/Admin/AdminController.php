<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Operator;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Operator::
            where('nama','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.admin.list', compact('collection'));
        }
        return view('pages.admin.admin.main');
    }
    public function create()
    {
        return view('pages.admin.admin.input', ['admin' => new Operator]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:operator_sekolah,email|max:255',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:pengguna,username',
            'id_operator' => 'numeric|nullable|unique:operator_sekolah,id_operator|unique:pengguna,id_operator',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
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
            }elseif ($errors->has('id_operator')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_operator'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new Operator;
        $user->id_operator = $request->id_operator;
        $user->nama = Str::title($request->nama);
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        $account = new Pengguna;
        $account->role = 'o';
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->created_at = now();
        $account->updated_at = now();
        $account->id_operator = $user->id_operator;
        $account->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Admin '. $request->nama . ' tersimpan',
        ]);
    }
    public function show(Operator $admin)
    {
        //
    }
    public function edit(Operator $admin)
    {
        return view('pages.admin.admin.input', compact('admin'));
    }
    public function update(Request $request, Operator $admin)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|max:255|unique:operator_sekolah,email,'.$admin->id_operator.',id_operator',
            'jenis_kelamin' => 'required',
            'username' => 'required|unique:pengguna,username,'.$admin->id_operator.',id_operator',
            'id_operator' => 'numeric|nullable|unique:operator_sekolah,id_operator|unique:pengguna,id_operator',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
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
            }elseif ($errors->has('id_operator')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_operator'),
                ]);
            }
        }
        $admin->nama = Str::title($request->nama);
        $admin->email = $request->email;
        $admin->jenis_kelamin = $request->jenis_kelamin;
        $admin->update();

        $account = Pengguna::where('id_operator', $admin->id_operator)->first();
        $account->username = $request->username;
        $account->updated_at = now();
        $account->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Admin '. $request->nama . ' diubah',
        ]);
    }
    public function destroy(Operator $admin)
    {
        Storage::delete($admin->photo);
        $admin->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Admin '. $admin->name . ' terhapus',
        ]);
    }
}
