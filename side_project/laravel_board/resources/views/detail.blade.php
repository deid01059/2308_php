@extends('layout.layout')
@section('title', 'Detail')
@section('main')
<main>
    <div style="text-align: center">
        <p>번호 : {{ $data->b_id }}</p>
        <p>조회수 : {{ $data->b_hits }}</p>
        <p>제목 : {{ $data->b_title }}</p>
        <p>내용 : {{ $data->b_content }}</p>
        <p>작성일 : {{ $data->created_at }}</p>
        <p>수정일 : {{ $data->updated_at }}</p>
        <form action="{{ route('board.destroy', ['board'=> $data->b_id]) }}" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-primary mb-2">삭제</button>
            <a href="{{ route('board.edit', ['board'=> $data->b_id]) }}" class="btn btn-primary">수정</a>
        </form>
        <a href="{{ route('board.index') }}" class="btn btn-primary">나가기</a>
    </div>
</main>
@endsection