<template>
	<div class="nav">
		<a :style="data2" v-for="(item, i) in data" :key="i" href="#">{{ i + ':' + item }}</a>
	</div>
</template>
<script>
export default {
	name:'Header',

	// props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기위한 영역
	props:{
		data: Array,
		data2: String,
	}
}
</script>
<style>
	
</style>