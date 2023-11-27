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
export default {
	name: 'BoardComponent',
	props: {
		laravelData: Object,
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