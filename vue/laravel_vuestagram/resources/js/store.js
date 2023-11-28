// npm install vuex@next		vuex다운
// npm install axios			axios다운
import { createStore } from "vuex";
import axios from "axios";

const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {
			boardData: [], // 게시글 저장용
			flgTapUi: 0, // 탭ui용 플래그
			imgURL: '', // 작성탭 표시용 이미지 URL저장용
			postFileData: null, // 글작성 파일데이터 저장용
			lastBoardId: 0, //가장 마지막 로드 된 게시글 번호 저장용
			moreViewFlg: true, //더보기버튼 플래그
		}	
	},

	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
		// 이름(state,data)  처음은 state고정
		// 초기데이터 셋팅용
		setBoardList(state,data){
			state.boardData = data;
			this.commit('setLastBoardId',data[data.length - 1].id)
		},

		// 탭ui 셋팅용
		setFlgTapUi(state,num){
			state.flgTapUi = num;
		},
		
		// 작성탭 표시용 이미지 URL 셋팅용
		setImgURL(state, url){
			state.imgURL = url;
		},
		// 글작성 파일데이터 셋팅용
		setPostFileData(state, file){
			state.postFileData = file;
		},
		// 작성 된 글 삽인용
		setUnShiftBoard(state,data){
			state.boardData.unshift(data);
		},
		// 작성 된 글 삽입 후 라스트보드아이디 변경
		setPushBoard(state,data){
			state.boardData.push(data);
			this.commit('setLastBoardId',data.id)
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
		// 초기 게시글 데이터 획득 ajax처리
		// actionGetBoardList(context) 처음은 context고정
		actionGetBoardList(context) {
			const URL = '/api/boards'
			const HEADER = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(URL,HEADER)
			.then(res => {
				// mutations 호출할때 commit
				context.commit('setBoardList',res.data);
			})
			.catch(err => {
				console.log(err);
			})
		},
		// 글작성처리
		actionPostBoardAdd(context){
			const URL = '/api/boards'
			const HEADER = {
				headers: {
					'Authorization': 'Bearer meerkat',
					'Content-Type': 'multipart/form-data',
				}
			};
			// const DATA = {
			// 	name : '최정훈',
			// 	img: context.state.postFileData,
			// 	content: document.querySelector('#content').value,
			// };
			const formData = new FormData();
            formData.append('name', '김덕배');
            formData.append('img', context.state.postFileData);
            formData.append('content', document.getElementById('content').value);	

			axios.post(URL,formData,HEADER)
			.then(res => {
				// 작성글 데이터 셋팅
				context.commit('setUnShiftBoard',res.data)

				// 리스트ui로 전환
				context.commit('setFlgTapUi', 0)

				// 작성 후 초기화 처리
				context.commit('setClearAddData');
			})
			.catch(err => {
				console.log(err);
			})
		},
		// 더보기
		actionGetPlusLoad(context) {
			const URL = '/api/boards/'+context.state.lastBoardId;
			const HEADER = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(URL,HEADER)
			.then(res => {
				if(res.data){
					context.commit('setPushBoard',res.data)
					context.commit('setLastBoardId',res.data.id)
				}else{
					context.commit('setMoreViewFlg', false);
				}		
			})
			.catch(err => {
				console.log(err.response.data);
			})
		},
	}
});

export default store;