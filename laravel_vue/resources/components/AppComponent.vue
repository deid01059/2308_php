<template>
	<h1>
		APP VUE 컴포넌트!!!!
		<h2>{{ $store.state.testStr }}</h2>
		<h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
		<h2>라라벨 데이터 id : {{ laravelData.id }}</h2>
		<ul>
			<li><a href="/login">로그인</a></li>
			<li><a href="/board">보드</a></li>
			<li><a href="/">루뜨</a></li>
		</ul>
		<router-link to="/login">라우터 로그인</router-link>
		<router-view></router-view>
	</h1>
</template>
<script>

export default {
	name: 'AppComponent',
	props: {
		laravelData: Object,
	},
	beforeCreate() {
		this.$store.commit('setLaravelData', this.laravelData);
	},
	
}
</script>