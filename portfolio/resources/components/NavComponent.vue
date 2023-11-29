<template>
	<div class="nav_container">
		<nav class="nav1 center">
			<ul>
				<li><a href="#">내 블로그</a></li>
				<li><a href="#">내 깃허브</a></li>
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

	}
}
</script>