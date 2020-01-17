<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login_index(){
        if(!Session::get('loginAdmin')){
            return view('admin/loginAdmin');
        }else{
            return redirect('/dashboard');
        }
    }

    public function login_proses(Request $request){
        $admin = Admin::where('username', $request->username)->first();

        if($admin){
            if(Hash::check($request->password, $admin->password)){
                Session::put('loginAdmin', true);
                Session::put('username', $admin->username);
                return redirect('/dashboard')->with('alert success', 'Anda berhasil login');
            }else{
                return redirect('/login')->with('alert danger', 'Password salah!');
            }
        }else{
            return redirect('/login')->with('alert danger', 'Username salah!');
        }
    }

    public function dashboard(){
        if(!Session::get('loginAdmin')){
            return redirect('/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            return view('admin/dashboardAdmin');
        }
    }

    public function logout(){
        if(!Session::get('loginAdmin')){
            return redirect('/login')->with('alert danger', 'Anda harus login terlebih dahulu');
        }else{
            Session()->forget('loginAdmin');
            return redirect('/login')->with('alert danger','Anda sudah logout');
        }
    }
}
