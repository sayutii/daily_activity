<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function actionCreate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);

        if ($request->role == 'Karyawan') {
            $countGuru = KaryawanModel::where('id_card', $request->nomor)->count();
            $guruId = KaryawanModel::where('id_card', $request->nomor)->get();
            foreach ($guruId as $val) {
                $guru = KaryawanModel::findorfail($val->id);
            }
            if ($countGuru >= 1) {
                User::create([
                    'name' => $guru->nama_karyawan,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'id_card' => $request->nomor,
                ]);
                return redirect()->back()->with('success', 'Berhasil menambahkan user Guru baru!');
            } else {
                return redirect()->back()->with('error', 'Maaf User ini tidak terdaftar sebagai guru!');
            }
        } 
         else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan user Admin baru!');
        }
    }
}
