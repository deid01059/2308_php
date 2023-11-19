@extends('layout.layout')
@section('title', 'List')
@section('main')
<main>
    {{-- 방법1 --}}
    <div>번호 : {{ $data->b_id }}</div>
    <div>조회수 : {{ $data->b_hits }}</div>
    <div>제목 : {{ $data->b_title }}</div>
    <div>내용 : {{ $data->b_content }}</div>
    <div>작성일 : {{ $data->created_at }}</div>
    <div>수정일 : {{ $data->updated_at }}</div>
    {{-- 방법2
    @forelse ($data as $item)
        <div>번호 : {{ $item->b_id }}</div>
        <div>조회수 : {{ $item->b_hits }}</div>
        <div>제목 : {{ $item->b_title }}</div>
        <div>내용 : {{ $item->b_content }}</div>
        <div>작성일 : {{ $item->created_at }}</div>
        <div>수정일 : {{ $item->updated_at }}</div>
    @empty
        <div>데이터가 존재하지 않습니다.</div>
    @endforelse
    --}}
</main>
@endsection