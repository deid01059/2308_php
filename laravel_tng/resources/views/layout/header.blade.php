<header>
	<div class="main_header_t">
		<a href="/" class="main_header_t_f">GR.GG</a>
			<div>
				<a href="/">리그오브레전드</a>
			</div>
			<div>
				<a href="/">발로란트</a>
			</div>
			<div>
				<a href="/">오버워치</a>
			</div>
			<div>
				<a href="/">배틀그라운드</a>
			</div>
			<div>
				<a href="/">롤토체스</a>
			</div>
			<div>
				<a href="/">메이플</a>
			</div>
		<a href="#" class="main_header_t_l">로그인</a>
	</div>
	<div class="main_header_b">
		<a href="#">자유게시판</a>
		<a href="#">질문게시판</a>
		<a href="#">나만의공략</a>
		<a href="#">패치노트</a>
		<a href="#">Q&A</a>
	</div>
	{{-- 로그인 상태 --}}
	@auth
	@endauth
	{{-- 비로그인 상태 --}}
	@guest
	@endguest
</header>