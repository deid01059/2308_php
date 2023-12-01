<template>
	<div class="shop_frame">
		<div class="shop_header center">
			<div
				@click="this.$store.commit('setBnoFlg',0);
					this.$store.dispatch('actionGetBoard','0');
				"
			>
				자유게시판
			</div>
			<div
				@click="this.$store.commit('setBnoFlg',1);
				this.$store.dispatch('actionGetBoard','1');"
				
			>
				QnA
			</div>
			<div
				@click="this.$store.commit('setBnoFlg',2);
				this.$store.dispatch('actionGetBoard','2');
				"
			>
				공지사항
			</div>
		</div>
		<div class="shop_write">
			<span 
				class="shop_write_btn"
				@click="changefageflg"
				>글작성</span>
		</div>
		<div class="shop_container">
			<div class="shop_card"
				v-for="item in $store.state.boardData" :key="item"
			>
				<div class="shop_card_header">
					<div class="shop_card_title">제목 : {{ item.title }}</div>
					<div class="shop_card_hit">조회수 : {{ item.b_hits }}</div>
				</div>
				<div class="shop_card_container">
					<!-- <div class="shop_card_img"  :style="{backgroundImage : `url('${item.img}')`}"></div> -->
					<img class="shop_card_img" :src="item.img">
					<div class="shop_card_content">{{ item.content }}</div>
				</div>
				<div class="shop_card_footer">
					<div class="shop_card_like_btn">좋아요</div>
					<div class="shop_card_like">{{ item.b_like }}</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="shop_modal"
		v-if="($store.state.fageFlg)"
	>
		<div class="shop_modal_frame">
			<div  class="shop_modal_header">	
				<div class="shop_modal_label">
					작성 카테고리
				</div>
				<select  id="shop_type" class="shop_modal_select">
					<option>자유게시판</option>
					<option>QnA</option>
					<option>공지사항</option>
				</select>		
			</div>
			<div class="shop_modal_container">
				<div>
					<div class="shop_modal_label">제목</div>
					<input id="shop_title" class="shop_modal_input" type="text" placeholder="제목을 입력해 주세요">
				</div>
				<div>
					<div class="shop_modal_label">내용</div>
					<textarea id="shop_content" class="shop_modal_textbox" type="text" placeholder="내용을 입력해 주세요"></textarea>
				</div>
				<div>
					<div class="shop_modal_label">사진파일</div>
					<input id="shop_file" type="file" accept="image/*">
				</div>
			</div>
			<div class="shop_modal_footer center">
				<div class="shop_modal_btn"
					@click="addboard"
				>작성</div>
				<div class="shop_modal_btn"
					@click="changefageflgf"
				>취소</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	name: 'ShopComponent',
	
	components: {

	},

	data() {
		return {
			setting: '',
		}
	},

	created() {
        let boo = $cookies.get('u_id') ?  true : false;
        this.$store.commit('setCookieFlg', boo);
		this.$store.dispatch('actionGetBoard', '0');
    },
	methods: {
		changefageflg(){
			this.$store.commit('setFageFlg',true);
		},
		changefageflgf(){
			this.$store.commit('setFageFlg',false);
		},
		addboard(){
			this.$store.dispatch('actionAddBoard');
		},
	}
}
</script>