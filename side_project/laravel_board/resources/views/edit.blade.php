@extends('layout.layout')
@section('title', 'Edit')
@section('main')
<main>
    <div style="text-align: center">
        <form action="{{ route('board.update', ['board'=> $data->b_id]) }}" method="POST">
            @include('layout.errorlayout')
            @csrf
            @method('put')
            <p>번호 : {{ $data->b_id }}</p>
            <div class="mb-3">
                <label for="b_title" class="form-label">제목 : </label>
                <input type="text" class="form-control" id="b_title" name="b_title"  value="{{ $data->b_title }}">
            </div>
            <div class="mb-3">
                <label for="b_content" class="form-label" >내용 : </label>
                <input name="b_content"  class="form-control" id="b_content" cols="30" rows="10" value="{{ $data->b_content }}">
            </div>
            <p>작성일 : {{ $data->created_at }}</p>
            <p>수정일 : {{ $data->updated_at }}</p>
            <button type="submit" class="btn btn-dark">수정완료</button>
            <a href="{{ route('board.show', ['board'=> $data->b_id]) }}" class="btn btn-secondary">취소</a>
        </form>
    </div>
</main>
@endsection