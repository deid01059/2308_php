<template>
	<div>
		상점입니다
	</div>
</template>
<script>
export default {
	name: 'ShopComponent',
	
	components: {

	},

	data() {
		return {
			setting: '',
		}
	},

	created() {
        let boo = $cookies.get('u_id') ?  true : false;
        this.$store.commit('setCookieFlg', boo);
    },
	methods: {
	}
}
</script>