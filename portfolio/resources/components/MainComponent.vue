<template>
    <!-- 헤더 영역 -->
    <div class="header">
        <div class="header_frame">
            <div class="header_frame_left">
                <router-link :to="'/main'" >
                    <img src="/img/logo_steam.svg" class="header_img">
                </router-link>
                <router-link :to="'/shop'"
                    class="header_menu"
                >
                    상점
                </router-link>
                <router-link :to="'/community'"
                    class="header_menu"
                    >커뮤니티</router-link>
                <div class="header_menu">정보</div>
                <div class="header_menu">지원</div>
            </div>
            <div class="header_frame_right">
                <a href="https://store.steampowered.com/about/" class="header_menu2">steam설치</a>
                <router-link :to="'/login'" class="header_menu2"
                    v-if="!($store.state.cookieFlg)"
                >로그인</router-link>
                <router-link :to="'/regist'" class="header_menu2"
                    v-if="!($store.state.cookieFlg)"
                >회원가입</router-link>
                <div class="header_menu2"
                    v-if="($store.state.cookieFlg)"
                    @click="delcookie"
                >로그아웃</div>
                <router-link :to="'/info'" class="header_menu2"
                    v-if="($store.state.cookieFlg)"
                >내정보</router-link>
            </div>
        </div>
    </div>
    <!-- 메인 영역 -->
    <router-view></router-view>

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
    components: {
        BoardComponent,LoginComponent,RegistComponent
    },
    methods: {
        delcookie(){
			this.$store.dispatch('actionDelCookie');
		},
    },
    created() {
        let boo = $cookies.get('u_id') ?  true : false;
        this.$store.commit('setCookieFlg', boo);
    },
}
</script>
