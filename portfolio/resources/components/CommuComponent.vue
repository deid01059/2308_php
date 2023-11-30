<template>
	<div class="commu_frame">
		<div class="commu_read">
			<div class="commu_msg" :id="'tlak_item' + $store.state.lastTalkId"
				v-for="item in $store.state.talkData" :key="item"
			>
				<p>
					<span>{{ item.u_id }}</span>
					<span>{{ item.created_at }}</span>
				</p>
				<div>{{ item.talk }}</div>
			</div>
		</div>
		<div class="commu_write_box">
			<div class="commu_write_plus">
				+
			</div>
			<div class="commu_write_frame">
				<input type="text" id="commuinput" placeholder="메세지를 입력하세요 (최대 50글자)" class="commu_write">
				<div class="commu_add_btn"
				v-if="($store.state.cookieFlg)"
				@click="addtalk"
				>작성</div>
				<div class="commu_add_btn"			
				v-if="(!$store.state.cookieFlg)"
					@click="msg"
				>작성</div>
			</div>
		</div>
	</div>

</template>
<script>
export default {
	name: '',




	data() {
		return {
			setting: '',
		}
	},
    created() {
        let boo = $cookies.get('u_id') ?  true : false;
        this.$store.commit('setCookieFlg', boo);
		this.$store.dispatch('actionloadTalk');
    },
	methods: {
		addtalk(){
			this.$store.dispatch('actionAddTalk');
		},
		msg(){
			alert('로그인후 이용가능한 컨텐츠 입니다.')
		}
	}
}
</script>