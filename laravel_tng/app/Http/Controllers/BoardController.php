<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\BoardName;
use App\Models\BoardType;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mainget()
    {
        $data = [];
        $data1 = [];
        $data['board_names'] = BoardName::select('b_no', 'b_name')->get();
        $data['board_types'] = BoardType::select('id', 'b_typename')->get();  
        return view('welcome')
        ->with('headerdata', json_encode($data))
        ->with('data', json_encode($data1));
    }
    public function boardget()
    {
        $data = [];
        $data1 = [];
        

        $data['board_names'] = BoardName::select('b_no', 'b_name')->get();
        $data['board_types'] = BoardType::select('id', 'b_typename')->get();  

        $b_no = isset($_GET["b_no"]) ? $_GET["b_no"] : 1;
        $b_type = isset($_GET["id"]) ? $_GET["id"] : 1;

        
        $data1['board_names'] = BoardName::select('b_name')->where('b_no',$b_no) ->get();
        $data1['board_types'] = BoardType::select('b_typename')->where('id',$b_type) ->get();  
        $data1['board'] =
                Board::join('b_types', 'boards.b_no', '=', 'b_types.id')
                ->join('b_names', 'boards.b_type', '=', 'b_names.b_no')
                ->where('boards.b_no', $b_no)
                ->where('boards.b_type', $b_type)
                ->whereNull('boards.deleted_at')
                ->orderBy('boards.created_at', 'desc')
                ->limit(5)
                ->get();

        return view('welcome')
        ->with('headerdata', json_encode($data))
        ->with('data', json_encode($data1));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function error()
    {
        $data = [];
        $data1 = [];
        $data['board_names'] = BoardName::select('b_no', 'b_name')->get();
        $data['board_types'] = BoardType::select('id', 'b_typename')->get();

        return view('welcome')
        ->with('headerdata', json_encode($data))
        ->with('data', json_encode($data1));
    }
    
}
