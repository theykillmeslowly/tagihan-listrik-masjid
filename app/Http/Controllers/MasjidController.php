<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMasjidRequest;
use App\Http\Requests\UpdateMasjidRequest;
use App\Models\Masjid;
use Session;
class MasjidController extends Controller
{
    public function edit(Request $request, $id){
        if($request->isMethod('POST')){
            $validate = \Validator::make($request->all(),[
                'nama_masjid' => 'required',
                'alamat' => 'required',
                'no_listrik' => 'required|numeric',
                'gambar' => 'nullable|mimes:jpeg,jpg,png,gif',
                'nama_pengurus' => 'required',
                'no_pengurus' => 'required|numeric',
                'tampil' => 'required',
                'status' => 'required',
            ]);

            if($validate->fails()){
                return redirect('/admin/masjid')->withInput()->withErrors($validate);
            }else{
                $masjid = Masjid::find($id);

                if($request->file('gambar') !== null){
                    $gambar     = $request->file('gambar');
                    $namaFile   = uniqid().'.png';
                    if($gambar->move('uploads', $namaFile)){
                        $gambarMasjid = 'uploads/'.$namaFile;
                    }
                }else{
                    $gambarMasjid = $masjid->gambar;
                }

                $data = [
                    'nama_masjid' => $request->nama_masjid,
                    'alamat' => $request->alamat,
                    'no_listrik' => $request->no_listrik,
                    'nama_pengurus' => $request->nama_pengurus,
                    'no_pengurus' => $request->no_pengurus,
                    'gambar' => $gambarMasjid,
                    'status' => $request->status,
                    'tampil' => $request->tampil
                ];

                if($masjid->update($data)){
                    Session::flash('success', 'Edit masjid berhasil!');
                    return redirect('/admin/masjid');
                }else{
                    Session::flash('error', 'Edit masjid gagal!.');
                    return redirect('/admin/masjid');
                }
            }
        }
        $data = Masjid::find($id);
        return view('/admin/masjid/edit')->with('data', $data);
    }

    public function hapus($id){
        $user = Masjid::find($id);
        if($user->delete()){
            Session::flash('success', 'Hapus data berhasil!');
            return redirect('/admin/masjid');
        }else{
            Session::flash('error', 'Hapus data gagal!');
            return redirect('/admin/masjid');
        }
    }

    public function pendaftaran(){
        $data = Masjid::where('tampil', 'tidak')->get();
        return view('admin/pendaftaran')->with('data', $data);
    }

    public function cekTagihan($noMeter){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.sepulsa.com/api/v1/carts/add/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'url' => 'http://api.sepulsa.com/api/v1/oscar/products/14/',
            'quantity' => 1,
            'options' => [[
                'option' => 'https://api.sepulsa.com/api/v1/oscar/options/1/',
                'value' => $noMeter
            ]]
        );
        $post = json_encode($post);

        /*
        {"url":"http://api.sepulsa.com/api/v1/oscar/products/14/","quantity":1,"options":[{"option":"https://api.sepulsa.com/api/v1/oscar/options/1/","value":"538413096263"}]}
        */
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

        return response($result, 200);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Masjid::where('tampil', 'ya')->get();
        return view('admin/masjid/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasjidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasjidRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function show(Masjid $masjid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasjidRequest  $request
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasjidRequest $request, Masjid $masjid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masjid $masjid)
    {
        //
    }
}
