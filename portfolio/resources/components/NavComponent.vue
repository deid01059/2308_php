<template>
	<div class="nav_container">
		<nav class="nav1 center">
			<ul>
				<li><a
						@click="my_b"
					>내 블로그</a></li>
				<li><a
						@click="my_g"
					>내 깃허브</a></li>
			</ul>
			<ul>
				<div class="nav_search">
					<input type="text" placeholder="    검색하기" class="nav_input">
					<button class="nav_btn">
						<img src="/img/search.svg">
					</button>
				</div>
			</ul>
		</nav>
	</div>
</template>
<script>
export default {
	name: 'NavComponent',
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
		my_b(){
			window.open('https://blog.naver.com/deid01059', '네이버팝업')
		},
		my_g(){
			window.open('https://github.com/deid01059/2308_php', '네이버팝업')
		},
	}
}
</script>