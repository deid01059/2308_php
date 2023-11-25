<template>
	<Header></Header>
	<router-view></router-view>
</template>
<script>
import Header from './components/Header.vue';

export default {
	name: 'main',
	props: {

	},
	
	components: {
		Header,
	},
}
</script>
<style>
/* css연결 */
/* import앞 @붙이는건 css문법 */
@import url(/css/tng.css);
</style>
