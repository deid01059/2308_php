<template>
	<header>
	<div class="main_header_t">
		<router-link :to="'/main'" class="main_header_t_f">GR.GG</router-link>
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
		<router-link :to="'/login'" class="header_login_btn">로그인</router-link>
	</div>
	<div class="main_header_b">
		<a href="#">자유게시판</a>
		<a href="#">질문게시판</a>
		<a href="#">나만의공략</a>
		<a href="#">패치노트</a>
		<a href="#">Q&A</a>
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