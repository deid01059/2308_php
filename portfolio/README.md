E01 : 데이터 유효성 에러
E02 : 미인증 에러
E03 : URL 에러
E99 : 시스템 에러


신규 생성 및 수정 리스트
app/
    Exceptions/
        Handler.php     예외 발생 처리 추가
    Http/
        Controllers/
            BoardsController.php
        Middleware/
            ApiChkToken.php     토큰체크 미들웨어
        Kernel.php
    Models/
        Board.php
config/
    app.php
database/
    migrations/
        2023_07_04_141759_create_boards_table.php
    seeders/
        BoardSeeder.php
public/
    img/    이미지 저장 디렉토리
routes/
    api.php
    web.php
.env.example        Authorization용 키(APP_AUTHORIZATION_KEY) 추가


<!-- 라라벨 생성 -->
	composer create-project laravel/laravel="9" 디렉토리명

<!-- 집 라라벨 설정 -->
	composer install      벤더생성
	.env.example 복사 붙여넣기해서 .env로 변경
	php artisan key:generate    앱키생성

<!-- 뷰설정 -->
	npm install    뷰 install
	npm install vue-router@4     라우터 설정
	npm install vuex@next --save    뷰엑스설치
    npm install axios    엑시오스설치
    npm install --save-dev vue     디펜던시에 뷰 추가
    npm install --``save-dev vue-loader   모듈없어서 에러날때 설치

    webpack.mix.js  이거 가져가기

	npm run dev    뷰파일 변경시 실행 -> watch로 대체
<!-- 에러시 -->
	composer clear-cache    페이커오류시npm install vuex@next --sav
    composer clearcache



<!-- 실행 -->
php artisan serve   laravel 서버 열기
npm run wacth    rundev역활 알아서 행동


<!-- 새로고침 방지 -->

npm install --dev node-pre-gyp  첫번째

npm install vuex-persistedstate   새로고침 방지