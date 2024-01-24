<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Token;
use Exception;
use App\Exceptions\MyDbException;
use App\Http\Utils\TokenUtil;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AuthController extends Controller
{
    protected $tokenDI;
    public function __construct(TokenUtil $tokenUtil){
        $this->tokenDI = $tokenUtil;
    }
    /**
     *  로그인처리
     * 
     *  @param Illuminate\Http\Request $request 리퀘스트 객체
     *  @return string json 엑세스토큰 , 쿠키httponly 리플레쉬토큰
     */
    public function login(Request $req){
        // DB 유저정보 획득
        $userInfo = User::where('u_id', $req->u_id)
                        ->where('u_pw',$req->u_pw)
                        ->first();
        Log::debug($userInfo);
        // 유저정보 NUll 확인
        if(is_null($userInfo)){
            throw new Exception('E20');
        }
        // 토큰생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

	    // 리플래쉬 토큰 DB 저장
        $ext = Carbon::createFromTimestamp($this->tokenDI->getPayloadValueToKey($refreshToken,'ext'));

        try {
            DB::beginTransaction();
            // 없으면 인선트 있으면 업데이트
            Token::updateOrInsert(
                ['u_pk'=>$this->tokenDI->getPayloadValueToKey($refreshToken,'upk')],
                [
                    't_rt' => $refreshToken
                    ,'t_ext' => $ext->format('Y-m-d H:i:s')
                ]
            );
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception('E80');
        }

        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ],200)->cookie('refresh_token',$refreshToken,env('TOKEN_EXP_REFRESH'));
    }
}
