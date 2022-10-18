<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bantuan;
class AdminController extends Controller
{
    public function index(){
        return view('admin/index');
    }
    
    public function logoutAdmin(){
        Auth::logout();
        return redirect('/');
    }

    public function bantuan(Request $request){
        $data = Bantuan::all();
        return view('admin/bantuan/index')->with('data', $data);
    }
}
