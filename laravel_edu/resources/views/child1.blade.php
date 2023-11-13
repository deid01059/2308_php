
{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식1 타이틀')

{{-- @section ~ @endsection : 처리해야 될 코드가 많을 경우 --}}
@section('main')
    <h2>자식1 화면입니다</h2>
    <p>여러데이터를 표시합니다.</p>
    <hr>
    {{-- 조건문 --}}
    <h3>조건문</h3>
    @if($gender === '0')
        <span>성별 : 남자</span>
    @elseif($gender === '1')
        <span>성별 : 여자</span>
    @else
        <span>성별(리턴 밸류 : {{ $gender }}): 레이디보이</span>
    @endif
    <hr>

    {{-- 반복문 --}}
    <h3>for문</h3>
    @for($i = 0; $i <5; $i++)
        {{-- {{ 변수 }} : 화면에 변수를 출력하는 방법 --}}
        <span>{{$i}}</span>
    @endfor

    <hr>
    <h3>foreach문</h3>
    @foreach($data as $key => $val)
        <p>{{ ' 총 카운트 수 : '.$loop->count.' >> 몇번째인지 : '.$loop->iteration}}</p>
        <span>
            {{ $key.' : '.$val }}
            <br>
        </span>
    @endforeach
    <hr>
    {{-- forelse --}}
    <h3>forelse문</h3>
    @forelse ($data2 as $key => $val)
        <span>
            {{ $key.' : '.$val }}
            <br>
        </span>
    @empty
        <span>
            빈배열입니다
        </span>
    @endforelse


<hr>
@endsection

{{-- 부모 show 테스트용 --}}
@section('show')
<h2>자식1 show 입니다.</h2>
<p>자식1자식1자식1</p>
@endsection