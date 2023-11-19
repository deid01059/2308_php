<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // *del 231116 미들웨어로 이관
        // // 로그인 체크
        // if(!Auth::check()){
        //     return redirect()->route('user.login.get');
        // }


        // 게시글 획득
        $result = Board::get();

        return view('list')->with('data',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //방법1
        // Board::insert([
        //     'b_title'=>$request->b_title
        //     ,'b_content'=>$request->b_content
        //     ,'created_at'=>now()
        //     ,'updated_at'=>now()
        // ]);
        // return redirect()->route('board.index');
        
        // // 방법2 내방법
        // DB::beginTransaction();
        // $result = 
        //     DB::table('boards')
        //     ->insert([
        //         'b_title' => $_POST['b_title']
        //         ,'b_content' => $_POST['b_content']
        //         ,'updated_at' => now()
        //         ,'created_at' => now()
        //     ]);       
        // if(!$result){
        //     DB::rollback();
        // }else(
        //     DB::commit()
        // );
        // 방법3
        
        $arrInputData = $request->only('b_title', 'b_content');
        $result = Board::create($arrInputData);

        // save()를 이용하는 방법
        // $model = new Board($arrInputData)
        // $model = save();

        return redirect()->route('board.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // // 로그인 체크  
        // if(!Auth::check()){
        //     return redirect()->route('user.login.get');
        // }

        // 게시글 획득
        $result = Board::find($id); 

        // 조회수 올리기
        $result->b_hits++; // 조회수 1증가
        $result->timestamps = false;

        // 업데이트처리
        $result->save();



        return view('detail')->with('data',$result);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Board::find($id); 
        
        return view('edit')->with('data',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 방법1
        // $arrInputData = $request->only('b_title', 'b_content');
        // DB::beginTransaction();
        // $result = 
        //     DB::table('boards')
        //     ->where('b_id',$id)
        //     ->update([
        //         'b_title' => $_POST['b_title']
        //         ,'b_content' => $_POST['b_content']
        //     ]);       
        // if(!$result){
        //     DB::rollback();
        // }else(
        //     DB::commit()
        // );
        // $result1 = Board::find($id); 


        // 방법2 orm
        try {
            DB::beginTransaction();
            $result = Board::find($id); 
            $result->b_title = $request->b_title;
            $result->b_content = $request->b_content;
            $result->save();
            DB::commit();
        } catch(Excepion $e){
            DB::rollback();
            return redirect()->route('error')->withErrors($e -> getMessage());
        }
            
        return redirect()->route('board.show', ['board'=> $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            Board::destroy($id);
            DB::commit();
        } catch(Excepion $e){
            DB::rollback();
            return redirect()->route('error')->withErrors($e -> getMessage());
        }
        return redirect()->route('board.index');
    }
}
