<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index(){
        // --------
        // 쿼리빌더
        // --------
        
        // 조회방법
        $result = DB::select('select * from boards limit 10');
        
        // 유저가 보내온 값

        // 1번방식
        $result = DB::select('select * from boards limit :no offset :no2',['no' => 2,'no2' => 10]);
        // 2번방식
        $result = DB::select('select * from boards limit ? offset ?',[2, 10]);
        



        
        // --------------------select--------------------
        // 테스트
        // 1번 문제카테고리가 4, 7, 8 인 게시글의 수를 출력해 주세요.
        $arr=[4, 7, 8];
        $result = DB::select(
            'SELECT COUNT( * ) AS cnt 
            FROM boards 
            WHERE categories_no = ? 
            OR categories_no = ? 
            OR categories_no = ?'
            , $arr);

        // 카테고리별 게시글 갯수를 출력해주세요
        $result = DB::select(
            'SELECT COUNT(categories_no) AS cnt 
            FROM boards 
            GROUP BY categories_no
            '
            );
        
        // 위에거에 + 카테고리명 출력
        
        $result = DB::select(
            'SELECT bo.categories_no,ca.name,COUNT(bo.categories_no) cnt 
            FROM boards bo
                JOIN categories ca
                    ON bo.categories_no = ca.no
            GROUP BY bo.categories_no,ca.name');


        // 트랜잭션
        // DB::beginTransaction();
        // DB::rollBack();
        // DB::commit();





        // --------------------insert--------------------
        $sql = 
            'INSERT INTO boards(
                title
                , content
                , created_at
                , updated_at
                , categories_no
            )
            VALUES(
                ?
                , ?
                , ?
                , ?
                , ?
            )';
        $arr = [
            '제목1'
            ,'내용내용1'
            ,now()
            ,now()
            ,'0'
        ];
        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');





        // --------------------update--------------------

        // DB::beginTransaction();
        // DB::update(
        //     'UPDATE boards SET title = ?, content = ? WHERE id= ?'
        //     ,['엡데이트1','업업',$result[0]->id] 
        // );
        // DB::commit();





        // --------------------delete--------------------

        // DB::beginTransaction();
        // $result = DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // DB::commit();
        
        // $result 값 영향받은 행의 갯수 리턴

        // ---------------
        // 쿼리 빌더 체이닝
        // ---------------
        // ex) SELECT * FROM boards WHERE id = 300;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->get();
        

        // ex) SELECT * FROM boards WHERE id = 300 OR id = 400
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id','=', 400)
            ->get();



        // ex) SELECT * FROM boards WHERE id = 300 OR id = 400 ORDER BY id DESC
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id','=', 400)
            ->orderBy('id', 'desc')
            ->get();
        


        // ex) SELECT * FROM categories WHERE no IN (1,2,3);
        $result = 
        DB::table('categories')
        ->whereIn('no',[1,2,3])
        ->get();
        

        // ex) SELECT * FROM categories WHERE no NOT IN (1,2,3);
        $result = 
            DB::table('categories')
            ->whereNotIn('no',[1,2,3])
            ->get();
            
        // first() : limit 1 하고 비슷하게 동작
        //            검색기준 최상단 1개 가져옴
        $result =
            DB::table('boards')
            ->first();
    
        // count() : 결과의 레코드 수를 반환
        $result =
            DB::table('boards')
            ->count();

        // max() : 해당 컬럼의 최대값
        $result =
            DB::table('categories')
            ->max('no');


        // 타이틀, 내용, 카테고리명 까지 출력 100개 출력
        $result =
            DB::table('boards')
            ->select('boards.title','boards.content','categories.name')
            ->join('categories','categories.no', 'boards.categories_no')
            ->limit(100)
            ->get();

        
        //  카테고리별 게시글 갯수와 카테고리명 과 번호를 출력
        $result =
        DB::table('boards')
            ->select('categories.name','categories.no',DB::raw('count(categories.no) cnt'))
            ->join('categories','categories.no', 'boards.categories_no')
            ->groupBy('categories.no','categories.name')
            ->get();
        return var_dump($result);
    }
}
