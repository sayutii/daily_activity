<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminDashboard()
    {
        $user = User::count();
        $karyawan = KaryawanModel::count();

        $parameter_view = [
            'user'=>$user,
            'karyawan'=>$karyawan,
        ];

        return view('admin.index', $parameter_view);
    }
}
