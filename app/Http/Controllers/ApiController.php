<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function listLaunches(Request $request)
    {
        $page = $request->page ?? 1;
        $size = $request->size ?? 10;
        $offset = ($page == 1) ? 0 :  ( $page-1 ) * $size ;

        $url = "https://api.spacexdata.com/v3/launches?page=$page&offset=$offset&limit=$size";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Accept: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($resp,true);

        return response()->json($data,200);
    }
}
