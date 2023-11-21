<template>
    <div class="bg_black">
        <div class="bg_white">
            <img :src="data.img">
            <h4>상품명 :{{ data.name }}</h4>
            <p>상품 설명 :{{ data.content }}</p>
            <p>가격 {{ data.price }}원</p>
            <input 
                type="text" 
                v-model="productCnt"
                >
            <p>총 가격 : {{ productCnt * data.price }} 원</p>
            <p>신고수 : {{ data.reportCnt }}</p>
            <button @click="$emit('closeModal')">닫기</button>
        </div>
    </div>
</template>
<script>
export default {
    name:'Modal',
    data(){
        return {
            productCnt: 0,
            totalPrice: 0,
        }
    },

    // data를 검사하는 함수를 정의하는영역
    watch: {
        // 함수명은 감시하고 싶은 데이터바인딩명과 동일해야합니다.
        productCnt(input) {
            if(input > 10 ) {
                alert('당신은 욕심쟁이 우후훗');
                this.productCnt = 10;
            } else if( input < 0){
                alert('개지랄하지마세요');
                this.productCnt = 0;
            }
        }
    },

    props:{
        data:Object,
        
    }
}
</script>
<style>
    
</style>