<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('karyawan.kegiatan.index');
    }

    public function actionCreate(Request $request)
    {
        $fields = $request->all();
        $link_back='activity-index';
        $link_back_param = ['start' => date('Y-m-d')];
        DB::beginTransaction();
        $message_default=[
            'success'=>'Berhasil menambahkan data Karyawan baru!',
            'error'=>'Maaf Gagal menambahkan data Karyawan baru!, mungkin anda kurang ngopii'
        ];
        $this->validate($request, [
            'judul' => 'required',
            'jenis_kegiatan' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->gambar) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . "_" . $gambar->getClientOriginalName();
            $gambar->move('uploads/kegiatan/', $new_gambar);
            $nameGambar = 'uploads/kegiatan/' . $new_gambar;
        } 
        
        try {   
            $data_save=$fields;
            if($data_save){
                $model = KegiatanModel::create([
                    'judul' => $request->judul,
                    'jenis_kegiatan' => $request->jenis_kegiatan,
                    'waktu' => $request->waktu,
                    'tanggal' => $request->tanggal,
                    'keterangan' => $request->keterangan,
                    'gambar' => $nameGambar,
                    'id_user' => $request->id_user
                ]);  
                $is_save=0;
                if($model){
                    $is_save=1;
                }   

                if($is_save){
                    DB::commit();
                    return redirect()->route($link_back, $link_back_param)->with(['success' => $message_default['success']]);
                }else{
                    DB::rollBack();
                    return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
                }
            }else{
                return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
            }
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            if($e->errorInfo[1] == '1062'){
                return redirect()->route($link_back, $link_back_param)->with(['error' => 'Maaf tidak dapat menyimpan data yang sama']);
            }
            return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
        }
    }

    public function actionIndex(Request $request)
    {
        $user = Auth::user()->id;
        $tanggal = $request->start;
        $kegiatan = KegiatanModel::where('id_user', '=', $user)->where('tanggal', '=', $tanggal)->get();
        $parameter_view = [ 
            'kegiatan'=>$kegiatan
        ];
        return view('karyawan.kegiatan.columns', $parameter_view);
    }

    public function actionUpdate(Request $request, $id)
    {
        $fields = $id;
        $link_back='activity-index';
        $link_back_param = ['start' => date('Y-m-d')];
        DB::beginTransaction();
        $message_default=[
            'success'=>'Data Karyawan berhasil diperbarui!',
            'error'=>'Maaf Gagal memperbarui data Karyawan baru!, mungkin anda kurang ngopii'
        ];
        $this->validate($request, [
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        try {   
            $data_save=$fields;
            if($data_save){
                $model = KegiatanModel::findorfail($data_save);  
                    $data_kegiatan = [
                        'judul' => $request->judul,
                        'jenis_kegiatan' => $request->jenis_kegiatan,
                        'waktu' => $request->waktu,
                        'tanggal' => $request->tanggal,
                        'keterangan' => $request->keterangan,
                        'id_user' => $request->id_user,
                    ];
                $is_save=0;
                if($model->update($data_kegiatan)){
                    $is_save=1;
                }
                if($is_save){
                    DB::commit();
                    return redirect()->route($link_back, $link_back_param)->with(['success' => $message_default['success']]);
                }else{
                    DB::rollBack();
                    return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
                }
            }else{
                return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
            }
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            if($e->errorInfo[1] == '1062'){
                return redirect()->route($link_back, $link_back_param)->with(['error' => 'Maaf tidak dapat menyimpan data yang sama']);
            }
            return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
        }
    }

    public function actionDelete($id)
    {
        $link_back='activity-index';
        $link_back_param = ['start' => date('Y-m-d')];
        DB::beginTransaction();
        $message_default=[
            'success'=>'Data Karyawan berhasil dihapus!',
            'error'=>'Maaf Gagal Meghapus Data Karyawan!, mungkin anda kurang ngopii'
        ];
        try {   
            $model = KegiatanModel::findorfail($id);
            $is_save=0;
            if($model->delete()){
                $is_save=1;
            }   
            if($is_save){
                DB::commit();
                return redirect()->route($link_back, $link_back_param)->with(['success' => $message_default['success']]);
            }else{
                DB::rollBack();
                return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
            }
        } catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            if($e->errorInfo[1] == '1062'){
                return redirect()->route($link_back, $link_back_param)->with(['error' => 'Maaf tidak dapat menyimpan data yang sama']);
            }
            return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route($link_back, $link_back_param)->with(['error' => $message_default['error']]);
        }
    }
}
