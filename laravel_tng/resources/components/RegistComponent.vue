<template>
	<div class="login_container">
		<form action="#" class="login_box" >
			<label for="id">아이디</label>
			<input type="text" id="id" name="u_id">
			<button>아이디 확인</button>
			<label for="pw">비밀번호</label>
			<input type="password" id="pw" name="password">
			<label for="pw_chk">비밀번호확인</label>
			<input type="password" id="pw_chk" name="pw_chk">
			<label for="nick">닉네임</label>
			<input type="text" id="nick" name="nick">
			<label for="name">이름</label>
			<input type="text" id="name" name="name">
			<button type="submit">회원가입하기</button>
			<router-link :to="'/login'" class="">취소</router-link>
		</form>
	</div>
</template>
<script>

export default {
	name: 'RegistComponent',
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