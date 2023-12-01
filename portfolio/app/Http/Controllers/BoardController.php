<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class BoardController extends Controller
{
    public function insert(Request $req)
    {
        // 회원 정보 DB에 저장
        // orm,엘로컨트 방식
        $imgName = Str::uuid().'.'.$req->img->extension();
        $req->img->move(public_path('img'), $imgName);
        $board = new Board();
        $board->img = '/img/'.$imgName;
        $board->title = $req->title;
        $board->b_no = $req->b_no;
        $board->u_id = $req->u_id;
        $board->b_hits = 0;
        $board->b_like = 0;
        $board->content = $req->content;
        // $board->filter = $req->filter;
        $board->save();
        $board->img = asset($board->img);


        return response()->json([
            'code' => '0'
            ,'data' => $board
        ], 200);
    }
    public function search(Request $req)
    {
        $result = Board::limit(20)
        ->where('b_no',$req->b_no)
        ->orderBy('id', 'desc')->get();

        return response()->json([
            'code' => '0'
            ,'data' => $result
        ], 200);
    }
}
