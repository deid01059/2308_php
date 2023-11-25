// npm install vuex@next		vuex다운
// npm install axios			axios다운
import { createStore } from "vuex";
import axios from "axios";

const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {

		}	
	},

	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
	
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	actions: {
		
	}
});

export default store;