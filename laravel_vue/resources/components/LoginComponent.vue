<template>
	<div>
		LoginComponent 컴포넌트!!!!
		<h2>라라벨 데이터 name : {{ $store.state.laravelData.name }} </h2>
	</div>
</template>
<script>
export default {
	name: 'LoginComponent',
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