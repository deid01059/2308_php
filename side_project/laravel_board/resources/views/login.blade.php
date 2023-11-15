@extends('layout.layout')
@section('title', 'Login')
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 400px;" action="{{ route('user.login.post') }}" method="POST">
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
        <button type="submit" class="btn btn-dark">로그인</button>
        </form>
</main>
@endsection