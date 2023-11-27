<template>
	<header>
		<div class="header_frame">
			<div class="header_frame_h">
				<router-link :to="'/main'" class="frame_header">GR.GG</router-link>
			</div>
		<div class="header_frame_b">
			<nav class="top-bar__menu-box-1">
				<ul>
					<li v-for="item in laravelData.board_names" :key="item">
						<div>{{ item.b_name }}</div>
						<ul>
							<li v-for="item1 in laravelData.board_types" :key="item1">
								<a :href="`/board/?b_no=${item.b_no}&id=${item1.id}`">{{ item1.b_typename }}</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
			<div class="header_frame_f">
				<router-link :to="'/login'" class="header_login_btn">로그인</router-link>
				<router-link :to="'/regist'" class="header_regist_btn">회원가입</router-link>
			</div>
	</div>
</header>
</template>
<script>

export default {
	name: 'MyHeaderComponent',
	props: {
		laravelData: Object,
	},
	
	components: {

	},

	data() {
		return {

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