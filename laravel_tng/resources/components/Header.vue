<template>
	<header>
		<div class="header_frame">
			<div class="header_frame_h">
				<router-link :to="'/main'" class="frame_header">GR.GG</router-link>
			</div>
		<div class="header_frame_b">
			<nav class="top-bar__menu-box-1">
				<ul>
					<li>
					<a href="#">리그오브레전드</a>
						<ul>
							<li><a href="#">자유게시판</a></li>
							<li><a href="#">질문게시판</a></li>
							<li><a href="#">패치노트</a></li>
							<li><a href="#">Q&A</a></li>
						</ul>
					</li>
					<li>
					<a href="#">오버워치</a>
						<ul>
							<li><a href="#">자유게시판</a></li>
							<li><a href="#">질문게시판</a></li>
							<li><a href="#">패치노트</a></li>
							<li><a href="#">Q&A</a></li>
						</ul>
					</li>
					<li>
					<a href="#">롤토체스</a>
						<ul>
							<li><a href="#">자유게시판</a></li>
							<li><a href="#">질문게시판</a></li>
							<li><a href="#">패치노트</a></li>
							<li><a href="#">Q&A</a></li>
						</ul>
					</li>
					<li>
						<a href="#">배틀그라운드</a>
						<ul>
							<li><a href="#">자유게시판</a></li>
							<li><a href="#">질문게시판</a></li>
							<li><a href="#">패치노트</a></li>
							<li><a href="#">Q&A</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
			<div class="header_frame_f">
				<router-link :to="'/login'" class="header_login_btn">로그인</router-link>
				<router-link :to="'/regist'" class="header_regist_btn">회원가입</router-link>
			</div>
	</div>
</header>
</template>
<script>

export default {
	name: 'header',
	props: {

	},
	
	components: {

	},

	data() {
		return {
			setting: '',
		}
	},

	created() {

	},

	mounted() {

	},

	methods: {

	}
}
</script>