<template>
	<div v-if="$store.state.flgTapUi === 0">
		<!-- 포스트 호출 -->
		<PostComponent></PostComponent>
	</div>

	<!-- 글작성용 -->
	<div  v-if="$store.state.flgTapUi === 1">
		<div 
			class="upload-img"
			:style="{backgroundImage : `url('${$store.state.imgURL}')`}"
		></div>
		<div>
			<textarea class="write-box" name="contnet" id="content" placeholder="글을써주세요"></textarea>
		</div>
	</div>
</template>
<script>
import PostComponent from './PostComponent.vue';

export default {
	name: 'ContainerComponent',	
	props: {
	},
	
	components: {
		PostComponent,
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