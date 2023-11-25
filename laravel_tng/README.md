<!-- 라라벨 인스톨 -->
0. Laravel 공식 사이트
	https://laravel.kr

1. PHP, DB, Apache Install
	라라벨 프레임워크는 몇 가지 시스템 요구 사항이 있습니다.
	Laravel의 Version마다 상이하므로 확인이 필요합니다.

	Laravel 9.x 기준으로 웹 서버에 최소 PHP 버전 및 extension이 다음과 같은지 확인해야 합니다.
		PHP >= 8.0
		BCMath PHP Extension
		Ctype PHP Extension
		Fileinfo PHP Extension
		JSON PHP Extension
		Mbstring PHP Extension
		OpenSSL PHP Extension
		PDO PHP Extension
		Tokenizer PHP Extension
		XML PHP Extension

2. Composer Install
	- PHP 의존성 관리 도구
	- 아래 사이트에 접속하여 다운로드
		https://getcomposer.org/download/
	- 설치 완료 후, 터미널에서 "composer"를 입력하여 설치 확인

3. Laravel 프로젝트 생성 (이하 터미널에서 커멘드라인으로 작업)
	3-1. Laravel 프로젝트를 생성할 위치로 이동
	3-2. 아래 커멘드로 라라벨 설치
		composer create-project laravel/laravel="9" 디렉토리명
		(**주의** : php.ini에 zip, fileinfo, openssl, pdo_mysql, mbstring Extension 주석 해제 필요)
	3-3. Apache 설정
		- root 변경
			DocumentRoot "${SRVROOT}/htdocs/"라라벨디렉토리명"/public"
			<Directory "${SRVROOT}/htdocs/"라라벨디렉토리명"/public">
		- mod_rewrite 모듈 활성
			LoadModule rewrite_module modules/mod_rewrite.so
		(**주의** : Apache 서버 재기동 필요)
	3-4. Laravel 서버 실행
		- larabel-board 디렉토리 안에서 아래 커멘드 실행
			php artisan serve
	3-5. 접속 확인

4. 유용한 확장프로그램
	Laravel goto view : ctrl + 좌클릭으로 해당 뷰파일로 이동 기능 제공
	Laravel Snippets : 일부 자동완성 기능 제공
	laravel blasde snippets : 블레이드 문법 자동완성 기능 제공
	Laravel Extra Intellisense : 일부 자동완성 기능 제공


<!-- 라라벨 소개 -->
0. Laravel 이란?
	오픈소스 PHP 웹 프레임워크 중 하나
	MVC 모델로 웹 애플리케이션을 개발하기 위해 고안

1. Laravel Application의 Life Cycle
	1-1. Entry Point
		시작지점 (public/index.php)
	1-2. HTTP Kernel
		Application 셋업 및 미들웨어를 설정하고, 라우터를 실행
	1-3. Router
		Request에 일치하는 경로를 찾고 정의된 Controller나 Action Method, Closure 등을 실행
	1-4. Middleware
		경로에 지정된 처리의 실행 전후에 임의의 처리를 실행
		Request나 Response에 포함 된 값의 갱신이나 암호화, 세션 실행, 인증 처리 등을 실행
		여러 미들웨어를 조합하여 사용 가능
	1-5. Controller or Closure
		HTTP Request에 대응하는 처리를 실행
		실질적인 비지니스 로직이 구현되는 곳으로 좁은 의미로의 Application의 실행 기점
		처리를 완료하면 Response를 만들고 반환

2. 디렉토리 구조
root/
	|--	app/ 		: 컨트롤러나 모델, 미들웨어 등 주요한 처리 클래스가 모여있는 디렉토리
	|--	bootstrap	: 가장 먼저 실행되는 처리나 autoloading 설정, 퍼포먼스 향상을 위한 cache 등을 배치 (일반적으로 수정 불필요)
	|--	config		: 설정 파일을 배치 (composer로 프로젝트를 생성했을 경우 .env로 대체 됨, .env에 없는 설정을 config디렉토리의 설정을 사용)
	|--	database	: DB 관련 파일을 배치
	|--	lang		: 다국어 파일을 배치
	|--	public		: 엔트리 포인트(index.php)가 배치되는 루트로 설정
	|--	resources	: 뷰 파일, CSS, JavaScript 파일 등을 배치
	|--	routes		: 루트 정의 파일을 배치
	|--	storage		: 라라벨이 만드는 파일을 출력하는 위치로, 로그파일이나 캐시 및 컴파일 된 파일등을 배치
	|--	tests		: 테스트 코드 파일을 배치
	|--	vendor		: composer로 프로젝트를 생성했을 경우 다운로드된 패키지 및 Laravel 본체 코드가 배치, 버전관리에 비포함

3. 루트 디렉토리의 파일
	.editorconfig	: IDE 또는 에디터에서 참고하는 코딩 표준 스타일 설정 파일
	.env 			: 환경 변수를 지정하는 파일
	.env.example	: 환경설정 예제 파일
	.gitattributes	: git 디렉토리 및 파일 단위로 설정을 적용하는 파일
	.gitignore		: git 버전 관리 제외 대상 설정 파일
	composer.json	: 개발자가 편집하는 composer 설정 파일, 프로젝트의 구성과 의존성에 대한 정보
	composer.lock	: 자동으로 생성되는 composer 설정 파일, 프로젝트의 구성과 의존성에 대한 정보
	package.json	: 프론트엔드의 파일과 의존성에 대한 정보가 있는 설정 파일
	phpunit.xml		: 테스트에서 사용하는 PHPUnit 설정 파일


<!-- 뷰설정 -->
npm install  
npm run dev    뷰파일 변경시 실행
npm install --save-dev vue     디펜던시에 뷰 추가
npm install --``save-dev vue-loader   모듈없어서 에러날때 설치


npm run wacth    rundev역활 알아서 행동


<!-- 실질적으로 laravel vue 같이사용시 라라벨서버열고 wacth켜두면 됨 -->