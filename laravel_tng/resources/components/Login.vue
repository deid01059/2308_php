<template>
	<div class="login_container">
		<form action="#" class="login_box" >
			<label for="id">ID</label>
			<input type="text" id="id" name="u_id" placeholder="아이디를 입력 해주세요">
			<label for="pw">비밀번호</label>
			<input type="password" id="pw" name="password" placeholder="비밀번호를 입력 해주세요">
			<button type="submit">로그인</button>
			<router-link :to="'/regist'" class="">회원가입</router-link>
		</form>
	</div>
</template>
<script>
export default {
	name: 'Login',
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