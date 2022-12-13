<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {   
        $karyawan = KaryawanModel::OrderBy('id_card', 'asc')->get();
        $max = KaryawanModel::max('id_card');
        $kode = $max+1;
        if (strlen($kode) == 1) {
            $id_card = "0000".$kode;
        } else if(strlen($kode) == 2) {
            $id_card = "000".$kode;
        } else if(strlen($kode) == 3) {
            $id_card = "00".$kode;
        } else if(strlen($kode) == 4) {
            $id_card = "0".$kode;
        } else {
            $id_card = $kode;
        }
        
        $parameter_view = [
            'karyawan'=>$karyawan,
            'max'=>$max,
            'id_card'=>$id_card
        ];

        return view('admin.karyawan.index', $parameter_view);
    }

    public function actionCreate(Request $request)
    {
        $this->validate($request, [
            'id_card' => 'required',
            'nama_guru' => 'required',
            'jk' => 'required'
        ]);

        if ($request->foto) {
            $foto = $request->foto;
            $new_foto = date('siHdmY') . "_" . $foto->getClientOriginalName();
            $foto->move('uploads/karyawan/', $new_foto);
            $nameFoto = 'uploads/karyawan/' . $new_foto;
        } else {
            if ($request->jk == 'L') {
                $nameFoto = 'uploads/karyawan/35251431012020_male.jpg';
            } else {
                $nameFoto = 'uploads/karyawan/23171022042020_female.jpg';
            }
        }

        $karyawan = KaryawanModel::create([
            'id_card' => $request->id_card,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'no_hp' => $request->no_hp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'foto' => $nameFoto
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data Karyawan baru!');
    }

    public function actionFormUpdate($id)
    {
        $karyawan = KaryawanModel::findorfail($id);

        $parameter_view = [
            'karyawan'=>$karyawan
        ]; 
        return view('admin.karyawan.edit', $parameter_view);
    }

    public function actionUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'nama_guru' => 'required',
            'jk' => 'required',
        ]);

        $guru = KaryawanModel::findorfail($id);
        $user = User::where('id_card', $guru->id_card)->first();
        if ($user) {
            $user_data = [
                'name' => $request->nama_guru
            ];
            $user->update($user_data);
        } else {
        }
        $guru_data = [
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'no_hp' => $request->no_hp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir
        ];
        $guru->update($guru_data);

        return redirect()->route('karyawan-index')->with('success', 'Data Karyawan berhasil diperbarui!');
    }

    public function actionDelete($id)
    {
        $karyawan = KaryawanModel::findorfail($id);
        $karyawan->delete();
        return redirect()->route('karyawan-index')->with('warning', 'Data Karyawan berhasil dihapus!');
    }
}
