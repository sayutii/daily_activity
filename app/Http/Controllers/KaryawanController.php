<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {   
        $karyawan = KaryawanModel::get();
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
        $fields = $request->all();
        $link_back='karyawan-index';
        DB::beginTransaction();
        $message_default=[
            'success'=>'Berhasil menambahkan data Karyawan baru!',
            'error'=>'Maaf Gagal menambahkan data Karyawan baru!, mungkin anda kurang ngopii'
        ];
        $this->validate($request, [
            'id_card' => 'required',
            'nama_karyawan' => 'required',
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
        try {   
            $data_save=$fields;
            if($data_save){
                $model = KaryawanModel::create([
                    'id_card' => $request->id_card,
                    'nama_karyawan' => $request->nama_karyawan,
                    'jk' => $request->jk,
                    'no_hp' => $request->no_hp,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'foto' => $nameFoto
                ]);  
                $is_save=0;
                if($model){
                    $is_save=1;
                }   
                if($is_save){
                    DB::commit();
                    return redirect()->route($link_back)->with(['success' => $message_default['success']]);
                }else{
                    DB::rollBack();
                    return redirect()->route($link_back)->with(['error' => $message_default['error']]);
                }
            }else{
                return redirect()->route($link_back)->with(['error' => $message_default['error']]);
            }
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            if($e->errorInfo[1] == '1062'){
                return redirect()->route($link_back)->with(['error' => 'Maaf tidak dapat menyimpan data yang sama']);
            }
            return redirect()->route($link_back)->with(['error' => $message_default['error']]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route($link_back)->with(['error' => $message_default['error']]);
        }
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
        $fields = $id;
        $link_back='karyawan-index';
        DB::beginTransaction();
        $message_default=[
            'success'=>'Data Karyawan berhasil diperbarui!',
            'error'=>'Maaf Gagal memperbarui data Karyawan baru!, mungkin anda kurang ngopii'
        ];
        $this->validate($request, [
            'nama_karyawan' => 'required',
            'jk' => 'required',
        ]);

        try {   
            $data_save=$fields;
            if($data_save){
                $guru = KaryawanModel::findorfail($data_save);
                $user = User::where('id_card', $guru->id_card)->first();
                if ($user) {
                    $user_data = [
                        'name' => $request->nama_karyawan
                    ];
                    $is_save=0;
                    if($user->update($user_data)){
                        $is_save=1;
                    } 
                }
                $guru_data = [
                    'nama_karyawan' => $request->nama_karyawan,
                    'jk' => $request->jk,
                    'no_hp' => $request->no_hp,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lahir' => $request->tgl_lahir
                ];
                $is_save=0;
                if($guru->update($guru_data)){
                    $is_save=1;
                }   
                if($is_save){
                    DB::commit();
                    return redirect()->route($link_back)->with(['success' => $message_default['success']]);
                }else{
                    DB::rollBack();
                    return redirect()->route($link_back)->with(['error' => $message_default['error']]);
                }
            }else{
                return redirect()->route($link_back)->with(['error' => $message_default['error']]);
            }
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            if($e->errorInfo[1] == '1062'){
                return redirect()->route($link_back)->with(['error' => 'Maaf tidak dapat menyimpan data yang sama']);
            }
            return redirect()->route($link_back)->with(['error' => $message_default['error']]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route($link_back)->with(['error' => $message_default['error']]);
        }
    }

    public function actionDelete($id)
    {
        $link_back='karyawan-index';
        DB::beginTransaction();
        $message_default=[
            'success'=>'Data Karyawan berhasil dihapus!',
            'error'=>'Maaf Gagal Meghapus Data Karyawan!, mungkin anda kurang ngopii'
        ];
        try {   
            $model = KaryawanModel::findorfail($id);
            $is_save=0;
            if($model->delete()){
                $is_save=1;
            }   
            if($is_save){
                DB::commit();
                return redirect()->route($link_back)->with(['success' => $message_default['success']]);
            }else{
                DB::rollBack();
                return redirect()->route($link_back)->with(['error' => $message_default['error']]);
            }
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            if($e->errorInfo[1] == '1062'){
                return redirect()->route($link_back)->with(['error' => 'Maaf tidak dapat menyimpan data yang sama']);
            }
            return redirect()->route($link_back)->with(['error' => $message_default['error']]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route($link_back)->with(['error' => $message_default['error']]);
        }
    }
}
