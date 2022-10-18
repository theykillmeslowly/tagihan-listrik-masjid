<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bantuan;
use Session;
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

    public function edit(Request $request, $id){
        if($request->isMethod('POST')){
            $validate = \Validator::make($request->all(), [
                'judul' => 'required',
                'konten' => 'required',
            ]);

            if($validate->fails()){
                return redirect('/admin/bantuan/edit/'.$id)->withInput()->withErrors($validate);
            }else{
                $data = [
                    'judul' => $request->judul,
                    'konten' => $request->konten,
                    'author' => Auth::user()->name,
                ];

                $bantuan = Bantuan::find($id);
                if($bantuan->update($data)){
                    Session::flash('success', 'Edit bantuan berhasil!');
                    return redirect('/admin/bantuan/edit/'.$id);
                }else{
                    Session::flash('error', 'Edit bantuan gagal!');
                    return redirect('/admin/bantuan/edit/'.$id);
                }
            }
        }
        $data = Bantuan::find($id);
        return view('admin/bantuan/edit')->with('data', $data);
    }

    public function tambah(Request $request){
        if($request->isMethod('POST')){
            $validate = \Validator::make($request->all(), [
                'judul' => 'required',
                'konten' => 'required',
            ]);

            if($validate->fails()){
                return redirect('/admin/bantuan/tambah')->withInput()->withErrors($validate);
            }else{
                $data = [
                    'judul' => $request->judul,
                    'konten' => $request->konten,
                    'author' => Auth::user()->name,
                ];

                $bantuan = new Bantuan;
                if($bantuan->create($data)){
                    Session::flash('success', 'Tambah bantuan berhasil!');
                    return redirect('/admin/bantuan/');
                }else{
                    Session::flash('error', 'Tambah bantuan gagal!');
                    return redirect('/admin/bantuan/');
                }
            }
        }
        return view('admin/bantuan/tambah');
    }

    public function hapus($id){
        $user = Bantuan::find($id);
        if($user->delete()){
            Session::flash('success', 'Hapus data berhasil!');
            return redirect('/admin/bantuan');
        }else{
            Session::flash('error', 'Hapus data gagal!');
            return redirect('/admin/bantuan');
        }
    }
}
