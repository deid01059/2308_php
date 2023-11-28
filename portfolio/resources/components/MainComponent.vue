<template>
    <!-- 헤더 영역 -->
    <div class="header">
        <div class="header_frame">
            <div class="header_frame_left">
                <img src="/img/logo_steam.svg" class="header_img"
                    @click="goboard"
                >
                <div class="header_menu">상점</div>
                <div class="header_menu">커뮤니티</div>
                <div class="header_menu">정보</div>
                <div class="header_menu">지원</div>
            </div>
            <div class="header_frame_right">
                <a href="https://store.steampowered.com/about/" class="header_menu2">steam설치</a>
                <div class="header_menu2"
                    @click="gologin"
                >로그인</div>
                <div class="header_menu2"
                    @click="goregist"
                >회원가입</div>
            </div>
        </div>
    </div>
    <!-- 메인 영역 -->
    <BoardComponent
        v-if="$store.state.fageFlg === 0"
    ></BoardComponent>
    <LoginComponent
        v-if="$store.state.fageFlg === 1"
    ></LoginComponent>
    <RegistComponent
        v-if="$store.state.fageFlg === 2"
    ></RegistComponent>
    <!-- 푸터 영역 -->
    <div class="footer">

    </div>
</template>
<script>
import BoardComponent from './BoardComponent.vue'
import LoginComponent from './LoginComponent.vue'
import RegistComponent from './RegistComponent.vue'
export default {

    name: 'MainComponent',
    props: {

    },
    
    components: {
        BoardComponent,LoginComponent,RegistComponent
    },

    data() {
        return {
            setting: '',
        }
    },

    methods: {
        goboard(){
            this.$store.commit('setPageFlg', 0)
        },
        gologin(){
            this.$store.commit('setPageFlg', 1)
        },
        goregist(){
            this.$store.commit('setPageFlg', 2)
        },
    }
}
</script>
