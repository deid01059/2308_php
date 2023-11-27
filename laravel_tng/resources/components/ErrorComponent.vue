<template>
	<div class="error_box">
		<h1>잘못된 URL입니다</h1>
		<router-link :to="'/main'" class="error_out_btn">메인페이지로 이동</router-link>
	</div>
</template>
<script>
export default {
	name: 'ErrorComponent',
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