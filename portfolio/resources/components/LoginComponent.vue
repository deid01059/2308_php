<template>
	<div class="login_bg">
		<div class="login_frame">
			<div class="login_frame_t">로그인</div>
			<div
				v-for="item in $store.state.varErr" :key="item" class="regist_err">{{ item }}</div>
			<div class="login_frame_b">
				<div class="login_box_l">
					<div>
						<div class="login_blue">아이디</div>
						<input type="text" class="login_input" id="l_id">
					</div>
					<div>
						<div class="login_pw">비밀번호</div>
						<input type="password" class="login_input" id="l_pw">
					</div>
					<button class="login_btn"
						@click="login"
					>로그인</button>
				</div>
				<div class="login_box_r">
					<div class="login_blue">큐알코드입니다</div>
					<img class="login_box_r_qr" src="/img/qr.jpg">
					<div>큐알코드 회원가입은 할 줄 몰라서 내 깃허브 qr코드로 대체</div>
				</div>
			</div>
		</div>
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
	methods: {
		login(){
			this.$store.dispatch('actionLogin');
		},
	}
}
</script>