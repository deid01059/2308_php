// npm install vuex@next		vuex다운
// npm install axios			axios다운
import { createStore } from "vuex";
import axios from "axios";

const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {
			errMsg: [],
			boardData: [],
			flgTapUi: 0,
			lastBoardId: 0,
			moreViewFlg: true,
			bNo:"1",
			bId:"1", 
		}	
	},

	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
		// 탭ui 셋팅용
		setFlgTapUi(state,num){
			state.flgTapUi = num;
		},
		// 
		setboard(state,str1,str2) {
			state.bNo = str1;
			console.log(str1)
			state.bId = str2;
		},
		// 작성 후 초기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			this.commit('setPostFileData', null);
		},
		// 마지막 게시글 번호 셋팅용
		setLastBoardId(state,num) {
			state.lastBoardId = num;
		},
		// 더보기 버튼 활성화
		setMoreViewFlg(state,boo) {
			state.moreViewFlg = boo;
			console.log(state.moreViewFlg)
		},
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	actions: {
		actionGetPlusLoad(context,no,id) {
			console.log(no)
			context.commit('setboard',no,id)
			const URL = '/boards/?b_no='+context.state.bNo+'&id='+context.state.bId;
			axios.get(URL)
			.then(res => {
			})
			.catch(err => {
				errMsg[ Msg ] = err.response.data;
			})
		},
	}
});

export default store;