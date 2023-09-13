<?php


// class는 동종의 객체들이 모여있는 집합을 정의한 것


class ClassRoom {
	// 멤버필드


	// 멤버 변수
	
	// 접근 제어 지시자 : public, private, protected
	public $computer; 
	// public : 어디에서나 접근가능
	
	private $book;
	// private : class 내에서만 접근가능

	protected $bag;
	// protected : class와 나를 상속받은 자식 class내에서만 사용가능



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
}

// class instance 생성
$obj_classroom = new ClassRoom();

// 메소드 보는법

$obj_classroom -> class_room_set_value();
var_dump($obj_classroom -> computer);



$obj_classroom -> class_room_show_value();











?>