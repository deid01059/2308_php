<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function loginget(){
        // 로그인 한 유저는 보드 리스트로 이동
        if(Auth::check()){
            return redirect()->route('board.index');
        }

        return view('login');
    }
    public function loginpost(Request $request){
        // del 1116 미들웨어로 동작
        // // 유효성 검사
        // $validator = Validator::make(
        //     $request->only('email','password')
        //     ,[
        //         'email'     => 'required|email|max:50'
        //         ,'password' => 'required|regex:/^(?=.*[a-z])(?=.*\d)(?=.*[!@~#?])[a-zA-Z\d!@~#?]+$/u|min:8|max:50'
        //     ]
        // );

        // // 유효성 검사 실패시 처리
        // if($validator->fails()){
        //     return view('login')->withErrors($validator->errors());
        // }

        // 유저 정보 습득
        $result = User::where('email',$request->email)->first();
        if(!$result || !(Hash::check($request->password, $result->password))){
            $errorMsg = '아이디와 비밀번호를 다시 확인해주세요';
            return view('login')->withErrors($errorMsg);
        };

        // 유저 인증작업
        Auth::login($result);
        if(Auth::check()){
            session($result->only('id'));
        }else{
            $errorMsg = "인증 에러가 발생했습니다";
            return view('login')->withErrors($errorMsg);
        }

        return redirect()->route('board.index');
    }


    public function registrationget(){
        return view('registration');
    }
    public function registrationpost(Request $request){
        // del 1116 미들웨어로 동작
        // // 유효성 검사
        // $validator = Validator::make(
        //     $request->only('email','name','password','passwordchk')
        //     ,[
        //         'email'     => 'required|email|max:50'
        //         // 이메일유효성검사
        //         // 필수 | 이메일형식인지 | 최대글자수
        //         ,'name'     => 'required|regex:/^[a-zA-Z가-힣]+$/u|min:2|max:50'
        //         ,'password' => 'required|same:passwordchk|regex:/^(?=.*[a-z])(?=.*\d)(?=.*[!@~#?])[a-zA-Z\d!@~#?]+$/u|min:8|max:50'
        //     ]
        // );
        
        // // 유효성 검사 실패시 처리
        // if($validator->fails()){
        //     return view('registration')->withErrors($validator->errors());
        // }

        // 데이터 베이스에 저장할 데이터 획득
        $data = $request->only('email','name','password');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);

        // 회원 정보 DB에 저장
        // orm,엘로컨트 방식
        $result = User::create($data);


        return redirect()->route('user.login.get');
    }
    // ===============
    // 로그아웃처리 
    // ===============

    public function logoutget(){
        Session::flush(); // 세션파기
        Auth::logout(); // 로그아웃        
        return redirect()->route('user.login.get');
    }
}