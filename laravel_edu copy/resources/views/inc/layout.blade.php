<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @yield : 자식 템플릿에서 해당하는 section에게 자리를 양도
                    자식한테 section이 없을 경우는 두번째 파라미터를 사용
        --}}
    <title>@yield('title', '부모 타이틀')</title>
</head>
<body>
    {{-- 다른 템플릿을 포함시키는 방법 --}}
    @include('inc.header')

    {{-- 메인영역 --}}
    @yield('main')


    {{-- @section ~ @show : 자식 템플리셍 해당하는 section이 없을 떄,
                            부모의 것이 실행
    --}}
    @section('show')
        <h2>부모의 show 입니다.</h2>
        <p>부모부모부모</p>
    @show

    {{-- 다른 템플릿으 포함시킬 때 변수 셋팅하는 방법 --}}
    @include('inc.footer',['key1' => 'key1 부모에서 셋팅'])
</body>
</html>