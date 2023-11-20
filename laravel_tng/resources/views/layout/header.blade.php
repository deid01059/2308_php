<header>
	<div class="main_header center">
		<a href="#">혼자작업</a>
		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#">4</a>
	</div>
	{{-- 로그인 상태 --}}
	@auth
	@endauth
	{{-- 비로그인 상태 --}}
	@guest
	@endguest
</header>