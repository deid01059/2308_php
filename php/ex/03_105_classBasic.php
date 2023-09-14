<?php


// class는 동종의 객체들이 모여있는 집합을 정의한 것


class ClassRoom {
	// 멤버필드


	// 멤버 변수
	
	// 접근 제어 지시자 : public, private, protected
	public $computer; 
	// public : 어디에서나 접근가능
	
	private $now;
	private $book;
	// private : class 내에서만 접근가능

	protected $bag;
	// protected : class와 나를 상속받은 자식 class내에서만 사용가능


	// 생성자(constructor) : 
	// 		- 클래스를 이용하여 객체를 생성할때 사용
	// 		- 새성자를 정의하지 않을때는 디폴트생성자가 선언됨
	// 		- 클래스를 인스턴스 할 때 자동으로 실행되는 메소드
	public function __construct() {
		echo "컨스트럭트실행";
		$this -> now = date("Y-m-d- H:i:s");
	}
	// 외부에서 실행할수 있어야하기에 public 으로 생성해야함




	// 메소드(method) : class내에 있는 함수 
	public function class_room_set_value() {
		$this ->computer ="컴퓨터";
		$this ->book ="책";
		$this ->bag ="가방";
	}
	
	// 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
	public function class_room_show_value() {
		$str = $this ->computer."\n"
				.$this ->book."\n"
				.$this ->bag;
		echo $str;
	}


	// getter 메소드
	public function get_now() {
		return $this -> now;
	}



	// setter 메소드
	public function set_now() {
		$this -> now = "9999-01-01 00:00:00";
	}
 

	// static : instance를 생성하지 않아도 호출할수있는 객체
	public static function static_test() {
		echo "스태틱 메소드 입니다";
	}
}

// class instance 생성
$obj_classroom = new ClassRoom();


// // 메소드 보는법

// $obj_classroom -> class_room_set_value();
// var_dump($obj_classroom -> computer);



// $obj_classroom -> class_room_show_value();




// set_now 확인
$obj_classroom ->set_now();




// get_now 확인
echo $obj_classroom -> get_now();


// static 호출

ClassRoom :: static_test();











?>
<?php


