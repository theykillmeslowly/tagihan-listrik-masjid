<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $masjid = Masjid::where('status', 'belum_lunas')->where('tampil', 'ya')->get();
        return view('index')->with('data', $masjid);
    }

    public function daftarMasjid(){
        $masjid = Masjid::where('tampil', 'ya')->paginate(4);
        return view('daftarMasjid')->with('data', $masjid);
    }

    public function bantuan(){
        return view('bantuan');
    }

    public function hubungiKami(){
        return view('hubungiKami');
    }
    public function login(Request $request){
        if($request->isMethod('POST')){
            $validate = $request->validate([
                'username'  => 'required',
                'password'  => 'required',
            ]);
            $creds = [
                'username' => $request['username'],
                'password' => $request['password'],
            ];
            if(Auth::attempt($creds)){
                return redirect('/admin');
            }else{
                Session::flash('error', 'Invalid username or password!');
                return redirect('/login');
            }
        }
        return view('login');
    }
}
