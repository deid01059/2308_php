<?php

namespace App\Http\Controllers;


use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TalkController extends Controller
{
    public function search(Request $req)
    {

        $result = Talk::
        limit(20)->orderBy('id', 'desc')->get();

        return response()->json([
            'code' => '0'
            ,'data' => $result
        ], 200);
    }
    public function insert(Request $req)
    {
        $data = $req->only('u_id','talk');
        $result = Talk::create($data);

        return response()->json([
            'code' => '0'
            ,'data' => $result
        ], 200);
    }
}
