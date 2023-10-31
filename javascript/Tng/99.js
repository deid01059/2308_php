const BTN_API = document.querySelector('#btn_api')
const BTN_CLE = document.querySelector('#btn_api_clear')
BTN_API.addEventListener('click',my_fetch)
BTN_CLE.addEventListener('click',best)

function best(){
	const DIV_IMG = document.querySelector('#api_div'); 
	DIV_IMG.replaceChildren();
}

function my_fetch(){
	const INPUT_URL = document.querySelector('#input_url');
	fetch(INPUT_URL.value.trim())
	
	.then( response => {
		if(response.status >= 200 && response.status < 300){
			return response.json();
		} else{
			throw new Error('에러에러')
		}
	} )
	.then( data => makeImg(data) )
	.catch( error => console.log(error));
}

function makeImg(data){
	data.forEach( item => {
        const NEW_DIV = document.createElement('div');
        const NEW_ID = document.createElement('div');
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#api_div')
        NEW_ID.innerHTML=item.id;
        NEW_DIV.setAttribute('class','grid_div');
		NEW_IMG.setAttribute('src',item.download_url);
        NEW_ID.style.padding = '6px 0px';
		NEW_IMG.style.width ='100%';

		NEW_DIV.appendChild(NEW_ID);
		NEW_DIV.appendChild(NEW_IMG);
        DIV_IMG.appendChild(NEW_DIV);
	});
}
