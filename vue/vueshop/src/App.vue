<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->

<Header :data="nav_list" :data2="sty_color1"></Header>

<!-- 할인 배너 -->
<Discount>
</Discount>

<transition name="modalAni">
  <!-- 모달 -->
  <Modal v-if="modalFlg"
  :data = "modalList"
  @closeModal = "modalClose"
  ></Modal>
  
  </transition >

  <!-- 상품리스트 -->

  <!-- 컴포넌트 안에서 for -->
  <!-- <Divlist
  :data = "products"
  @modalOpen = "modalOpen"
  @plusOne = "plusOne"
  ></Divlist> -->

  <!-- 컴포넌트 밖에서 for -->
  <div>
    <Divlist
      v-for="(item,i) in products" :key="i"
      :data ="item"
      :productkey = "i"
      @fncOne = "plusOne"
      @fncOpenModal = "modalOpen"
    >
    </Divlist>
  </div>

</template>

<script>
import data from './assets/js/data.js';

import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Divlist from './components/Divlist.vue';


export default {
  name: 'App',

  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data(){
    return{
      nav_list:['홈','상품','기타','문의'],
      sty_color1: 'color: white; font-size: 25px',
      products: data,
      modalFlg : false,
      modalList:{},
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
    },
    modalClose(){
      this.modalFlg=false;
    }

  },

  // components : 컴포넌트를 등록하는 영역
  components: {
    Discount,Header,Modal,Divlist,
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
