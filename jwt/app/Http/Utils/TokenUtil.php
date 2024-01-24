<?php
namespace App\Http\Utils;

use App\Models\User;
use App\Http\Utils\EncrypUtil;
use Illuminate\Support\Facades\Log;

class TokenUtil {
	/**
	 * 토큰생성
	 * 
	 * @param App\Models\User $userInfo 유저정보
	 * @return list [$accessToken, $refreshToken]
	 */
	public function createTokens(User $userInfo){
		Log::debug("진입");
		$accessToken = $this->createToken($userInfo, env('TOKEN_EXP_ACCESS'));
		$refreshToken = $this->createToken($userInfo, env('TOKEN_EXP_REFRESH'));
		Log::debug($accessToken);
		Log::debug($refreshToken);
		
		return [$accessToken, $refreshToken];
	}
	/**
	 * JWT를 만들어 리턴
	 * 
	 *  @param App\Models\User $userInfo 유저정보
	 * 	@param int $ttl 초 단위
	 *  @return string $header.'.'.$payload.'.'.$signature JWT
	 */
	public function createToken(User $userInfo, int $ttl){
		$header = $this->makeTokenHeader();
		$payload = $this->makeTokenPayload($userInfo, $ttl);
		$signature = $this->makeTokenSignature($header, $payload);
		return $header.'.'.$payload.'.'.$signature;
	}
	
	/**
	 * 토큰의 헤더를 리턴
	 * 
	 * @return array 헤더배열
	 */
	protected function makeTokenHeader(){
		$arr = [
			'alg' => env('TOKEN_ALG')
			,'typ' => env('TOKEN_TYP')
		];
		
		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	/**
	 * 토큰의 페이로드를 리턴
	 * 
	 * @param App\Models\User $userInfo 유저정보
	 * @param int $ttl 초 단위
	 * @return array 헤더배열
	 */
	protected function makeTokenPayload(User $userInfo, int $ttl){
		$now = time();
		$arr = [
			'upk' => $userInfo->u_pk
			,'name' => $userInfo->u_name
			,'iat' => $now
			,'ttl' => $ttl
			,'ext' => $now+$ttl
		];
		
		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	/**
	 * 토큰의 시그니쳐를 리턴
	 * 
	 * @param 	string $header base64UrlEncode된 헤더
	 * @param 	string $header base64UrlEncode된 페이로드
	 * @return	string 시그니쳐
	 */
	protected function makeTokenSignature(string $header,string $payload){
		return EncrypUtil::hashWithSalt(env('TOKEN_ALG'),$header.'.'.$payload.env('TOKEN_SECRET_KEY'), env('TOKEN_SALT_LENGTH'));
	}
	/**
	 * 토큰 분리
	 * 
	 * @param string $token 토큰
	 * @return list header,payload,signature
	 */
	public function explodeToken($token){
		$arrToken = explode('.', $token);
		return[$arrToken[0],$arrToken[1],$arrToken[2]];
	}

	/**
	 * 토큰에서 페이로드의 특정 키의 값을 리턴
	 * 
	 * @param string $token 토큰
	 * @param string $key 페이로드 키
	 * @return string 페이로드 키에 해당하는 값
	 */
	public function getPayloadValueToKey(string $token,string $key){
		list($haeder,$payload,$signature) = $this->explodeToken($token);
		$payloadDecoded = json_decode(EncrypUtil::base64UrlDecode($payload));

		if(is_null($payloadDecoded) || !isset($payloadDecoded->$key)){
			throw new Exception('E05');
		}

		return $payloadDecoded->$key;
	}
}