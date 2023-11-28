<template>
	<div class="nav_container">
		<nav class="nav1 center">
			<ul>
				<li><a href="#">menu1</a></li>
				<li><a href="#">menu2</a></li>
				<li><a href="#">menu3</a></li>
				<li><a href="#">menu4</a></li>
				<li><a href="#">menu5</a></li>
				<li><a href="#">menu5</a></li>
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