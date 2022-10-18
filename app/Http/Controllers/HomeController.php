<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masjid;
use App\Models\User;
use App\Models\Bantuan;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $masjid = Masjid::where('status', 'belum_lunas')->where('tampil', 'ya')->get();
        return view('index')->with('data', $masjid);
    }

    public function pendaftaran(Request $request){
        if($request->isMethod('POST')){
            $validate = \Validator::make($request->all(),[
                'nama_masjid' => 'required',
                'alamat' => 'required',
                'no_listrik' => 'required|numeric',
                'gambar' => 'required|mimes:jpeg,jpg,png,gif',
                'nama_pengurus' => 'required',
                'no_pengurus' => 'required|numeric',
            ]);

            if($validate->fails()){
                return redirect('/pendaftaran')->withInput()->withErrors($validate);
            }else{
                $gambar     = $request->file('gambar');
                $namaFile   = uniqid().'.png';
                if($gambar->move('uploads', $namaFile)){
                    $gambarMasjid = $namaFile;
                }else{
                    $gambarMasjid = 'default.png';
                }
                $data = [
                    'nama_masjid' => $request->nama_masjid,
                    'alamat' => $request->alamat,
                    'no_listrik' => $request->no_listrik,
                    'nama_pengurus' => $request->nama_pengurus,
                    'no_pengurus' => $request->no_pengurus,
                    'gambar' => $gambarMasjid,
                    'status' => 'belum_lunas',
                    'tampil' => 'tidak'
                ];

                $masjid = new Masjid;
                if($masjid->create($data)){
                    Session::flash('success', 'Pendaftaran masjid berhasil! Silahkan tunggu verifikasi dari admin.');
                    return redirect('/pendaftaran');
                }else{
                    Session::flash('error', 'Pendaftaran masjid gagal! Silahkan coba lagi.');
                    return redirect('/pendaftaran');
                }
            }
        }
        return view('pendaftaran');
    }

    public function daftarMasjid(){
        $masjid = Masjid::where('tampil', 'ya')->paginate(4);
        return view('daftarMasjid')->with('data', $masjid);
    }

    public function bantuan(){
        $data = Bantuan::all();
        return view('bantuan')->with('data', $data);
    }

    public function viewBantuan(Request $request, $id){
        $data = Bantuan::all();
        $bantuan = Bantuan::find($id);
        return view('viewBantuan')->with('data', $data)->with('bantuan', $bantuan);
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
                return redirect('/admin/index');
            }else{
                Session::flash('error', 'Username atau Password salah!');
                return redirect('/login');
            }
        }
        return view('login');
    }
}
