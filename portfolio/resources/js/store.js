import { createStore } from "vuex";
import axios from "axios";

const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {
		fageFlg: 0, // 탭ui용 플래그
		}
	},

	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
		setPageFlg(state,int){
			state.fageFlg = int;
		}
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	actions: {

	}
});

export default store;