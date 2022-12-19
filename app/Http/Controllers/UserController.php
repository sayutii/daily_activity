<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $user = $user->groupBy('role');

        $parameter_view = [
            'user'=>$user
        ];

        return view('admin.user.index', $parameter_view);
    }

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
                return redirect()->back()->with('success', 'Berhasil menambahkan user Karyawan baru!');
            } else {
                return redirect()->back()->with('error', 'Maaf User ini tidak terdaftar sebagai Karyawan!');
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

    public function actionView($id)
    {
        $id = Crypt::decrypt($id);
        if ($id == "Admin" && Auth::user()->role == "Operator") {
            return redirect()->back()->with('warning', 'Maaf halaman ini hanya bisa di akses oleh Admin!');
        } else {
            $user = User::where('role', $id)->get();
            $role = $user->groupBy('role');
            
            $parameter_view = [
                'user'=>$user,
                'role'=>$role
            ];

            return view('admin.user.columns', $parameter_view);
        }
    }

    public function actionDelete($id)
    {
        $user = User::findorfail($id);
        if ($user->role == 'Admin') {
            if ($user->id == Auth::user()->id) {
                $user->delete();
                return redirect()->back()->with('warning', 'Data user berhasil dihapus! (Silahkan cek trash data user)');
            } else {
                return redirect()->back()->with('error', 'Maaf user ini bukan milik anda!');
            }
        } elseif ($user->role == 'Operator') {
            if ($user->id == Auth::user()->id || Auth::user()->role == 'Admin') {
                $user->delete();
                return redirect()->back()->with('warning', 'Data user berhasil dihapus! (Silahkan cek trash data user)');
            } else {
                return redirect()->back()->with('error', 'Maaf user ini bukan milik anda!');
            }
        } else {
            $user->delete();
            return redirect()->back()->with('warning', 'Data user berhasil dihapus! (Silahkan cek trash data user)');
        }
    }
}
