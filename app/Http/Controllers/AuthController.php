<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request;

use Illuminate\Http\Request;
use App\Http\Requests\FormLogin;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function formRegister()
    {
        $roles = DB::table('roles')->get();
        return view('backend.auth.register', compact('roles'));
    }

    public function register(FormRegister $request)
    {
        $data = $request->only('name', 'email', 'password', 'role_id');
        $data['password'] = Hash::make($data['password']);
        DB::table('users')->insert($data);
        return redirect()->route('formlogin');
    }

    public function showFormLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
       $data = $request->only('email','password');
        if (Auth::attempt($data)) {
            return redirect()->route('welcome');
        } else {
            Session::flash('msg', 'Tai Khoan , Mat Khau khong dung');
            return redirect()->back();
        }
    }
}
