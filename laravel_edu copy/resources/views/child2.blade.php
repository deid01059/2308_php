
{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')



{{-- 메인섹션에 생성: 구구단 찍기 --}}
@section('main')
    @for($i = 1; $i <10; $i++)
        <p>{{ $i }} 단</p>
        @for($a = 1; $a <10; $a++)
            <span>
                {{$i.' X '.$a.' = '.$i*$a }}
            </span>
            <br>
        @endfor
    @endfor

@endsection