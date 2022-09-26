<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasjidRequest;
use App\Http\Requests\UpdateMasjidRequest;
use App\Models\Masjid;

class MasjidController extends Controller
{
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
        //
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
    public function edit(Masjid $masjid)
    {
        //
    }

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
