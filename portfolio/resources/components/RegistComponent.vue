<template>
	<div class="login_bg">
		<div class="login_frame">
			<div class="login_frame_t">회원가입</div>
			<div
				v-for="item in $store.state.varErr" :key="item" class="regist_err">{{ item[0] }}</div>
			<div class="login_frame_b">
				<div class="login_box_l">
					<div>
						<div class="regist_label">아이디</div>
						<input id="u_id" type="text" class="login_input" placeholder="숫자,영어들을 1개이상 포함한 6 ~ 15글자 내 로 입력 해 주세요.">
						<button
							@click="id_chk"
							v-if="$store.state.idFlg !== 1" 
						>중복확인</button>
						<button
							@click="id_chk_re"
							v-if="$store.state.idFlg === 1" 
						>ID변경</button>
						<span
							class="regist_chk"
							v-if="$store.state.idFlg === 1" 
						>사용가능한 아이디 입니다</span>
						<span
							class="regist_chk2"
							v-if="$store.state.idFlg === 2" 
						>이미사용중인 아이디 입니다</span>
					</div>
					<div>
						<div class="regist_label">비밀번호</div>
						<input  minlength="6" maxlength="15" type="password" id="pw" class="login_input" placeholder="숫자,영어,특수문자(!,@,#,~,?)들을 1개이상 포함한 8 ~ 20글자 내 로  입력 해 주세요">
					</div>
					<div>
						<div class="regist_label">비밀번호확인</div>
						<input type="password" id="pw_chk" class="login_input" placeholder="비밀번호와 같은 값 을 입력 해 주세요">
					</div>
					<div>
						<div class="regist_label">이름</div>
						<input type="text" id="name"  class="login_input" placeholder="한글이나 영어를 사용한 2~50글자 내로 입력 해 주세요">
					</div>
					<div>
						<div class="regist_label">전화번호</div>
						<input type="text" id="phone" class="login_input" placeholder="휴대폰번호 11개의 숫자를 입력 해 주세요">
					</div>
					<div class="regist_btns">
						<button class="regist_btn"
							@click="regist"
						>회원가입</button>
						<router-link :to="'/main'" class="regist_btn center" >취소</router-link>
					</div>
				</div>
			</div>
		</div>
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
		id_chk(){
			this.$store.dispatch('actionIdChk');
		},
		id_chk_re(){
			this.$store.commit('setIdFlg',0);
			document.querySelector('#u_id').removeAttribute('readonly')
		},
		regist(){
			this.$store.dispatch('actionRegist');
		
		}
	}
}
</script>