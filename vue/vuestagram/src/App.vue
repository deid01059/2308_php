<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li 
        v-if="$store.state.flgTapUi !==0" 
        @click="golist" 
        class="header-button header-button-left"
        >취소</li>
      <li ><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li 
        v-if="$store.state.flgTapUi === 1"
        @click="addBoard" 
        class="header-button header-button-right"
        >작성</li>
    </ul>
  </div>
  <!-- vuex사용법 -->
  <!-- <p>{{ $store.state.phptest }}</p> -->



  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <button 
    @click="plusLoad"
    v-if="$store.state.lastBoardId > 1" 
    >더보기</button>
  <br>
  <br>

  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store" @click="golist"  v-if="$store.state.flgTapUi === 0">+</label>
      <label for="file" class="label-store" @click="golist" v-if="$store.state.flgTapUi === 1">딴 사진</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue'

export default {
  name: 'App',
  created() {
    // dispatch = store의 action 호출
    this.$store.dispatch('actionGetBoardList');
  },
  components: {
    ContainerComponent,
  },

  methods: {
    updateImg(e){
      let file = e.target.files;
      const IMGURL = URL.createObjectURL(file[0]);

      // 작성 영역에 이미지를 표시하기위한 데이터 저장
      this.$store.commit('setImgURL',IMGURL)

      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData',file[0])

      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUi', 1)

      // 이벤트 타겟 초기화
      e.target.value = '';
    },
    // flg 0 처리(리스트로)
    golist(){
      this.$store.commit('setFlgTapUi', 0)
    },
    // 글작성처리
    addBoard(){
      // 글작성 처리 호출
      this.$store.dispatch('actionPostBoardAdd');
    },
    // 더보기버튼처리
    plusLoad(){
      // 글작성 처리 호출
      this.$store.dispatch('actionGetPlusLoad');
    },

  }
}
</script>

<style>
/* css연결 */
/* import앞 @붙이는건 css문법 */
@import url(./assets/css/common.css);
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
