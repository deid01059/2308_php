@extends('layout.layout')
@section('title', 'Registration')
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 400px;" action="{{ route('user.registration.post') }}" method="POST">
        @include('layout.errorlayout')
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">e-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="passwordchk" class="form-label">비밀번호확인</label>
            <input type="password" class="form-control" id="passwordchk" name="passwordchk">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">이름</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <a href="{{ route('user.login.get') }}" class="btn btn-secondary">취소</a>
        <button type="submit" class="btn btn-dark float-end">회원가입</button>
    </form>
</main>
@endsection