<template>
	<div class="info_container">
		<div>아이디</div>
		<div>비밀번호입력</div>
		<div>비밀번호변경</div>
		<div>비밀번호변경</div>
		<button>변경하기</button>	
		<div>이름</div>
		<button>변경하기</button>	
		<div>회원탈퇴</div>
		<button>탈퇴하기</button>	
		<router-link :to="'/main'" >
            취소
        </router-link>
	</div>
</template>
<script>
export default {
	name: 'InfoComponent',

	components: {

	},


	methods: {

	}
}
</script>