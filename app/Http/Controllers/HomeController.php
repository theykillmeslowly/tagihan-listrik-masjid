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
    public function cekTagihan(Request $request, $id){
        $masjid = Masjid::find($id);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.sepulsa.com/api/v1/carts/add/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'url' => 'http://api.sepulsa.com/api/v1/oscar/products/14/',
            'quantity' => 1,
            'options' => [[
                'option' => 'https://api.sepulsa.com/api/v1/oscar/options/1/',
                'value' => $masjid->no_listrik
            ]]
        );
        $post = json_encode($post);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $headers = array();
        $headers[]  = 'sessionid: '.env('SESSION_ID');
        $headers[]  = 'X-Chital-Api-Key: '.env('API_KEY');
        $headers[]  = 'Content-Type:  application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        
        if (curl_errno($ch)) {
            return response(["error" => curl_error($ch)], 422);
        }
        curl_close($ch);

        $result = json_decode($result);
        if($result->errors[0]->detail == "Bill Already Paid/ Not Available"){
            $masjid->status = 'lunas';
            if($masjid->save()){
                return view('tagihanLunas')->with('data', $masjid);
            }
        }else{
            $masjid->status = 'belum_lunas';
            if($masjid->save()){
                return view('tagihanBelumLunas')->with('data', $masjid);
            }
        }
    }
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
                    $gambarMasjid = 'uploads/'.$namaFile;
                }else{
                    $gambarMasjid = 'uploads/default.png';
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
