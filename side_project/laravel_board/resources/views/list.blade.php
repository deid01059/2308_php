@extends('layout.layout')
@section('title', 'List')
@section('main')
    <div style="text-align: center">
        <a href="{{ route('board.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16" >
                <path class="list_insert_btn" d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
            </svg>
        </a>
    </div>
<main>
    @forelse($data as $item)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $item->b_title }}</h5>
                <p class="card-text">{{ $item->b_content }}</p>
                <a href="{{ route('board.show', ['board'=> $item->b_id]) }}" class="btn btn-primary">상세</a>
            </div>
        </div>
    @empty
        <div>게시글없음</div>
    @endforelse
</main>
@endsection