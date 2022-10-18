<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
class UserController extends Controller
{
    public function index(){
        $data = User::all();
        return view('admin/user/index')->with('data', $data);
    }

    public function edit(Request $request, $id){
        if($request->isMethod('POST')){
            $validate = \Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'password' => 'nullable',
                'conf_password' => 'nullable|same:password',
            ]);
            if($validate->fails()){
                return redirect('/admin/user/edit/'.$id)->withInput()->withErrors($validate);
            }else{
                if($request->password !== null && $request->conf_password !== null){
                    if($request->password == $request->conf_password){
                        $password = \Hash::make($request->password);
                    }
                }else{
                    $password = User::find($id)->first()->password;
                }

                $data = [
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => $password,
                ];

                $user = User::find($id);
                if($user->update($data)){
                    Session::flash('success', 'Edit user berhasil!');
                    return redirect('/admin/user/edit/'.$id);
                }else{
                    Session::flash('error', 'Edit user gagal!');
                    return redirect('/admin/user/edit/'.$id);
                }
            }
        }
        $data = User::find($id);
        return view('admin/user/edit')->with('data', $data);
    }

    public function tambah(Request $request){
        if($request->isMethod('POST')){
            $validate = \Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'conf_password' => 'required|same:password',
            ]);
            if($validate->fails()){
                return redirect('/admin/user/')->withInput()->withErrors($validate);
            }else{
                if($request->password == $request->conf_password){
                    $password = \Hash::make($request->password);
                }
                
                $data = [
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => $password,
                ];

                $user = new User;
                if($user->create($data)){
                    Session::flash('success', 'Tambah user berhasil!');
                    return redirect('/admin/user/');
                }else{
                    Session::flash('error', 'Tambah user gagal!');
                    return redirect('/admin/user/');
                }
            }
        }
        return view('admin/user/tambah');
    }
}
