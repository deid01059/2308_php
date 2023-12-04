import { createStore } from "vuex";
import axios from "axios";
import router from  "./router.js";
import VueCookies from "vue-cookies";



const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {
		fageFlg: false,
		idFlg: 0,
		cookieFlg: false,
		varErr: [],
		talkData: [],
		boardData: [],
		imgURL: '',
		bNo: 0,
		}
	},

	// mutations : 데이터 수정용 함수 저장 영역
	mutations: {
		setIdFlg(state, int){
			state.idFlg = int;
		},
		setErrMsg(state,data){
			state.varErr=data;
		},
		setCookieFlg(state,boo){
			state.cookieFlg=boo;
		},
		setFageFlg(state,boo){
			state.fageFlg=boo;
		},
		setSearchTalk(state,data){
			state.talkData= data;
		},
		setPushTalk(state,data){
			state.talkData.unshift(data);
		},
		setUnShiftBoard(state,data){
			state.boardData.unshift(data);
		},
		setBoardList(state,data){
			state.boardData = data;
		},
		setBnoFlg(state,int){
			state.bNo=int;
		},
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	actions: {

		// 아이디 중복체크
		actionIdChk(context){
			let id = document.querySelector('#u_id').value
			const URL = '/api/regist/'+id
			const HEADER = {
				headers: {
					'Authorization': 'Bearer mykey',
				}
			};
			axios.get(URL, HEADER)
			.then(res => {
				if(res.data.code === "0"){
					if(res.data.data.length === 0){
						context.commit('setIdFlg',1);
						document.querySelector('#u_id').readOnly = true;
						console.log("flg1")
					}else if(res.data.data.length > 0){
						context.commit('setIdFlg',2);
						console.log("flg2")
					}else {
						context.commit('setIdFlg',0);
						context.commit('setErrMsg',res.data.errorMsg);
						console.log("flg0")
					}
				}else{
					console.log('else')
					context.commit('setErrMsg',res.data.errorMsg);
				}
	
			})
			.catch(err => {
				console.log(err.response.data);
			})
		},

		
		// 회원가입
		actionRegist(context){
			if(context.state.idFlg === 1){
				let id = document.querySelector('#u_id').value;
				let pw = document.querySelector('#pw').value;
				let pw_chk = document.querySelector('#pw_chk').value;
				let name = document.querySelector('#name').value;
				let phone = document.querySelector('#phone').value;

				const URL = '/api/regist'
				const HEADER = {
					headers: {
						'Authorization': 'Bearer mykey',
						'Content-Type': 'multipart/form-data',
					}
				};
				const formData = new FormData();
				formData.append('u_id', id);
				formData.append('password', pw);
				formData.append('pw_chk', pw_chk);
				formData.append('name', name);
				formData.append('phone', phone);


				axios.post(URL,formData,HEADER)
				.then(res => {
					document.querySelector('#u_id').value = '';
					document.querySelector('#pw').value = '';
					document.querySelector('#pw_chk').value = '';
					document.querySelector('#name').value = '';
					document.querySelector('#phone').value = '';
					if(res.data.code === "0"){
						alert("회원가입에 성공 했습니다.");
						context.commit('setErrMsg',[]);
						router.push('/login')
					}else{
						context.commit('setErrMsg',res.data.errorMsg);
					}
				})
				.catch(err => {
					context.commit('setErrMsg',err.response.data.errorMsg);
				})
			}else{
				console.log(context.state.idFlg)
				alert('아이디중복확인을 해주세요')
			}
		},

		
		// 로그인
		actionLogin(context){
			let id = document.querySelector('#l_id').value;
			let pw = document.querySelector('#l_pw').value;
				const URL = '/api/login'
				const HEADER = {
					headers: {
						'Authorization': 'Bearer mykey',
						'Content-Type': 'multipart/form-data',
					}
				};
				const formData = new FormData();
				formData.append('u_id', id);
				formData.append('password', pw);

				axios.post(URL,formData,HEADER)
				.then(res => {
					console.log('로그인성공')
					if(res.data.code === "0"){	
						VueCookies.set("u_id", res.data.data.u_id);
						context.commit('setCookieFlg', true);
						router.push('/main')
					}else{
						console.log('else');
						console.log(res.data.errorMsg);
						context.commit('setErrMsg',res.data.errorMsg);
					}
				})
				.catch(err => {
					console.log('catch');
					console.log(err.response.data.errorMsg);
					context.commit('setErrMsg',err.response.data.errorMsg);
				})
		},


		// 쿠키삭제
		actionDelCookie(context){
			context.commit('setCookieFlg', false);
			VueCookies.remove('u_id');
			router.push('/main')
		},


		// 토크 생성
		actionloadTalk(context){
				const URL = '/api/community'
				const HEADER = {
					headers: {
						'Authorization': 'Bearer mykey',
					}
				};
				axios.get(URL,HEADER)
				.then(res => {
					console.log(res)
					if(res.data.code === "0"){	
						context.commit('setSearchTalk', res.data.data);
					}else{
						context.commit('setErrMsg',res.data.errorMsg);
					}
				})
				.catch(err => {
					console.log(err)
				})
		},
		
		

		// 토크 등록
		actionAddTalk(context){
			if(VueCookies.get('u_id')){
				let talk = document.querySelector('#commuinput').value;

				const URL = '/api/community'
				const HEADER = {
					headers: {
						'Authorization': 'Bearer mykey',
						'Content-Type': 'multipart/form-data',
					}
				};
				const formData = new FormData();
				formData.append('talk', talk);
				formData.append('u_id', VueCookies.get('u_id'));
				
				axios.post(URL,formData,HEADER)
				.then(res => {
					if(res.data.code === "0"){	
						document.querySelector('#commuinput').value = '';
						context.commit('setPushTalk', res.data.data);
						context.commit('setLastId', res.data.data.id);
					}else{
						context.commit('setErrMsg',res.data.errorMsg);
						alert(context.state.varErr);
						context.commit('setErrMsg',res.data.errorMsg);
					}
				})
				.catch(err => {
					console.log(err.response.data)	
					if(err.response.data.code === "E03"){
						alert('글자수가 1~50자 가 아니거나 <>나{}는 사용하지 못합니다.')
						document.querySelector('#commuinput').value = ''
					};
					console.log(err)
				})
			}else{
				alert('로그인을 해야 이용가능한 컨텐츠 입니다.')
			}
		},

		
		
		// 보드 등록
		actionAddBoard(context){
			if(VueCookies.get('u_id')){
				let type = document.querySelector('#shop_type').value;
				if (type === "자유게시판"){
					type = "0"
				}else if(type === "QnA"){
					type = "1"
				}else if(type === "공지사항"){
					type = "2"
				}else {
					type = "0"
				}
				let title = document.querySelector('#shop_title').value;
				let content = document.querySelector('#shop_content').value;
				let img = document.querySelector('#shop_file');
				
				const URL = '/api/shop'
				const HEADER = {
					headers: {
						'Authorization': 'Bearer mykey',
						'Content-Type': 'multipart/form-data',
					}
				};
				const formData = new FormData();
				formData.append('b_no', type);
				formData.append('title', title);
				formData.append('u_id', VueCookies.get('u_id'));
				formData.append('content', content);
				formData.append('img', img.files[0]);
				console.log( context.state.postFileData)
				console.log(img.files[0]);
				
				axios.post(URL,formData,HEADER)
				.then(res => {
					// 데이터 초기화
					document.querySelector('#shop_title').value = "";
					document.querySelector('#shop_content').value = "";
					document.querySelector('#shop_file').value = "";
					// 작성글 데이터 셋팅
					if(type == context.state.bNo){
						context.commit('setUnShiftBoard',res.data.data)
					}
						// 작성후 모달창 닫기
					context.commit('setFageFlg',false);
	
				})
				.catch(err => {
					console.log('에러')	
					console.log(err.data)	
				})
			}else{
				alert('로그인을 해야 이용가능한 컨텐츠 입니다.')
			}
		},
		// 보드 생성
		actionGetBoard(context, bno){
				const URL = '/api/shop/'+ bno
				const HEADER = {
					headers: {
						'Authorization': 'Bearer mykey',
					}
				};
				axios.get(URL,HEADER)
				.then(res => {
					console.log(res)
					if(res.data.code === "0"){	
						context.commit('setBoardList', res.data.data);
					}else{
						context.commit('setErrMsg',res.data.errorMsg);
					}
				})
				.catch(err => {
					console.log(err)
				})
		},
	},
});


export default store;