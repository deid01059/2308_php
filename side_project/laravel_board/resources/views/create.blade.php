@extends('layout.layout')
@section('title', 'Create')
@section('main')
<main>
    <form action="{{ route('board.store') }}" method="POST">
        @include('layout.errorlayout')
        @csrf
        <div class="mb-3">
            <label for="b_title" class="form-label">제목</label>
            <input type="text" class="form-control" id="b_title" name="b_title">
        </div>
        <div class="mb-3">
            <label for="b_content" class="form-label">내용</label>
            <input name="b_content"  class="form-control" id="b_content" cols="30" rows="10">
        </div>
        <a href="{{ route('board.index') }}" class="btn btn-secondary">취소</a>
        <button type="submit" class="btn btn-dark float-end">작성</button>
    </form>
</main>
@endsection