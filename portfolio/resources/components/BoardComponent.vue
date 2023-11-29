<template>
	<BackBoard></BackBoard>
	<div class="board_container">
		<CarouselComponent></CarouselComponent>
		<BoardList></BoardList>
	</div>

</template>
<script>

import CarouselComponent from './CarouselComponent.vue'
import BackBoard from './BackBoard.vue'
import BoardList from './BoardList.vue'
export default {
	name: 'BoardComponent',
	props: {

	},
	
	components: {
		CarouselComponent,BackBoard,BoardList
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