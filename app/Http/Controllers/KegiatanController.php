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
        $link_back='karyawan-index';
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

    public function actionIndex(Request $request)
    {
        $kegiatan = KegiatanModel::where('id_user', Auth::user()->id)->get();
        $parameter_view = [ 
            'kegiatan'=>$kegiatan
        ];
        return view('karyawan.kegiatan.columns', $parameter_view);
    }
}
