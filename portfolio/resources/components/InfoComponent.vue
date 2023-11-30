<template>
	<div class="info_frame">
		<div class="info_header">활동정보</div>
		<div class="info_container center">
			<div>
				작성 게시글 : ~개
			</div>
			<div>
				작성 게시글 : ~개	
			</div>		
			<div>
				작성 게시글 : ~개
			</div>		
			<div>
				작성 게시글 : ~개
			</div>
			<div>
				자세히 보기
			</div>
		</div>
		<div class="info_header">회원정보 및 수정</div>
		<div class="info_container">
			<div>
				<label for="info_id">ID</label>
				<input class="info_id_input" type="text" id="info_id" readonly value="아이디">
			</div>
			<div>
				<label>변경할 비밀번호</label>
				<input type="password" class="info_id_input2">
			</div>
			<div>
				<label>비밀번호확인</label>
				<input type="password" class="info_id_input2">
			</div>
			<div>
				<label>이름</label>
				<input type="text" value="이름" class="info_id_input2">
			</div>
			<div>
				<label>휴대폰</label>
				<input type="text" value="폰번호" class="info_id_input2">
			</div>
			<div class="info_container_footer center">
				<button class="info_btn">변경하기</button>	
				<router-link :to="'/main'" class="info_btn2">취소</router-link>
			</div>
		</div>
		<div>
			<div class="info_header">회원탈퇴</div>
			<div class="info_container_sec center">
				<div class="info_msg">
					경    고
				</div>
				<div class="info_redmsg">
					회원을 탈퇴하시면 복구하실수없습니다.
				</div>
				<div class="info_redmsg">
					그래도 탈퇴하시겠습니까?
				</div>
				<div class="info_container_footer">
					<button class="info_btn">탈퇴하기</button>	
					<router-link :to="'/main'" class="info_btn2">취소</router-link>
				</div>
			</div>
		</div>
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