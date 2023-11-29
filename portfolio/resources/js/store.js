import { createStore } from "vuex";
import axios from "axios";
import router from  "./router.js";
import createPersistedState from "vuex-persistedstate";


const store = createStore({
	// state() : data를 저장하는 영역
	state() {
		return {
		fageFlg: 0, // 탭ui용 플래그
		idFlg: 0,
		loginFlg: false,
		varErr: [],
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
		setLoginFlg(state,boo){
			state.loginFlg=boo;
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
				if(res.data.length === 0){
					context.commit('setIdFlg',1);
					document.querySelector('#u_id').readOnly = true;
				}else if(res.data.length > 0){
					context.commit('setIdFlg',2);
				}else {
					context.commit('setIdFlg',0);
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
					if(res.data.code === "0"){
						console.log('if');
						alert("회원가입에 성공 했습니다.");
						router.push('/login')
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
			}else{
				alert('아이디중복확인을 해주세요')
			}
		},

		
		// 회원가입
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
					console.log('then')
					console.log(res)
					if(res.data.code === "0"){
						router.push('/main')
						context.commit('setLoginFlg',true);
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
	},
	plugins: [
		createPersistedState({
			paths: ['loginFlg']
		})
	]
	
});

export default store;