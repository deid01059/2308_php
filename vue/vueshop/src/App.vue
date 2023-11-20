<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->
  <div class="nav">
    <!-- 반복문 -->

    <!-- 키값이 필요없을때 -->
    <a v-for="item in nav_list" :key="item" href="#">{{ item }}</a>
    <br>
    <!-- 키값이필요할때 -->
    <a v-for="(item, i) in nav_list" :key="i" href="#">{{ i + ':' + item }}</a>
  </div>

  <!-- 모달 -->
  <transition name="modalAni">
    <div class="bg_black" v-if="modalFlg">
      <div class="bg_white">
        <img :src="modalList.img" alt="">
        <h4>상품명 :{{ modalList.name }}</h4>
        <p>상품 설명 :{{ modalList.content }}</p>
        <p>가격 {{ modalList.price }}원</p>
        <p>신고수 : {{ modalList.reportCnt }}</p>
        <button @click="modalFlg=false">닫기</button>
      </div>
    </div>
  </transition >

  <!-- 상품리스트 -->
  <div>
    <div v-for ="(item, i) in products" :key="i">
      <h4 @click="modalOpen(item)">{{ item.name }}</h4>
      <p>{{ item.price }}원</p>
      <button @click="plusOne(i)">허위매물신고</button>
      <span>신고수 : {{ item.reportCnt }}</span>
    </div>
  </div>
</template>

<script>
import data from './assets/js/data.js';

export default {
  name: 'App',

  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data(){
    return{
      nav_list:['홈','상품','기타','문의'],
      sty_color1: 'color: blue; font-size: 25px',
      products: data,
      modalFlg : false,
      modalList:[],
    }
  },

  // methods : 함수를 정의하는 영역
  methods:{
    plusOne(i){
      this.products[i].reportCnt++;
    },
    modalOpen(item){
      this.modalList=item;
      this.modalFlg=true;
    }
  }
}
</script>


<style>
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* css파일로이관
.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a{
  color: #fff;
  text-decoration: none;
  padding: 10px;
  font-size: 2rem;
} */
</style>
