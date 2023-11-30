<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function search(Request $req)
    {

        $result = User::select('u_id')->where('u_id',$req->id) ->get();

        return response()->json([
            'code' => '0'
            ,'data' => $result
        ], 200);
    }

    public function insert(Request $req)
    {

        $data = $req->only('u_id','name','password','phone');
        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        // 회원 정보 DB에 저장
        // orm,엘로컨트 방식
        $result = User::create($data);

        return response()->json([
            'code' => '0'
            ,'data' => $result
        ], 200);
    }

    public function login(Request $req)
    {
        $result = User::where('u_id',$req->u_id)->first();
        if(!$result || !(Hash::check($req->password, $result->password))){
            $errorMsg = ['아이디와 비밀번호를 다시 확인해주세요'];
            return response()->json([
                'code' => 'E04'
                ,'errorMsg' => $errorMsg
            ], 300);
        };

        return response()->json([
            'code' => '0'
            ,'data' => $result
        ], 200);
    }

}
