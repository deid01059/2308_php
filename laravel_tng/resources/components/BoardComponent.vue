<template>
	<div>
		<main class="board_main">
		<div class="board_header">
			<h1>{{ laravelData.board_names[0].b_name+' '+laravelData.board_types[0].b_typename }}</h1>
		</div>
		<div class="board_container">
			<div>
				<table class="board_container_1">
					<thead>최근게시물</thead>
					<tr	 v-for="item in laravelData.board" :key="item">
						<th>{{ item.title }}</th>
						<td>{{ item.content }}</td>
						<td>{{ item.created_at }}</td>
					</tr>
					<div 
					@click="plusLoad(laravelData.board.b_no,laravelData.board.b_type)"					
					>
					더보기
					{{ laravelData.board }}
					</div>
					<MoreBoardComponent></MoreBoardComponent>
				</table>
			</div>
			<div>
				<table>
					<thead>인기 게시물</thead>
					<tr>
						<th>몇등</th>
						<td>1번게시물입니다</td>
					</tr>
					<tr>
						<th>몇등</th>
						<td>1번게시물입니다</td>
					</tr>
					<tr>
						<th>몇등</th>
						<td>1번게시물입니다</td>
					</tr>
					<tr>
						<th>몇등</th>
						<td>1번게시물입니다</td>
					</tr>
					<tr>
						<th>몇등</th>
						<td>1번게시물입니다</td>
					</tr>
				</table>
			</div>
		</div>
	</main>
	</div>
</template>
<script>
import MoreBoardComponent from './MoreBoardComponent.vue'

export default {
	name: 'BoardComponent',
	props: {
		laravelData: Object,
	},
	
	components: {
		MoreBoardComponent,
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
		plusLoad($a,$b){
			// 데이터 추가조회
			this.$store.dispatch('actionGetPlusLoad',$a,$b);
		},
	}
}
</script>