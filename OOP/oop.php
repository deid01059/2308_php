<?php

// interface  : 개발자의 실수나 구현하는과정에서 뺴거나 같은 형태를 쓰는대 다른 이름으로 복잡해질수도 있는걸 방지하기위해 쓰임
// 예를 들면 누구는 수영, 누구는 헤엄, 누구는 스위밍 이런식으로 다른식으로 할떄
interface 수영 {
	public function 수영();
}
interface 기름 {
	public function 기름();
}


// 추상클래스 abstract : 공통적인 부분을 통합하여 사용? 그런느낌
abstract class 포유류 {
	protected $이름;

	// abstract 자식메소드에서 무조껀 써야함
	abstract public function 호흡();

	public function __construct(string $이름) {
		$this->이름 = $이름;
	}

	public function 출산() {
		echo $this->이름.' 출산한다.';
	}
}

class 날다람쥐  extends 포유류 {
	public function 호흡(){
		echo $this->이름.' 폐호흡한다.';
	}
	public function 비행() {
		echo $this->이름.' 날아간다';
	}
}


class 고래 extends 포유류 implements 수영 {
	public function 호흡(){
		echo $this->이름.' 바다에서 폐호흡한다.';
	}
	public function 수영() {
		echo $this->이름.' 수영한다';
	}
}

class 고등어 implements 수영 {
	public function 수영() {
		echo ' 고등어 수영한다';
	}
}


// $obj = new 날다람쥐 ('날다람쥐');
// echo $obj->호흡();
$obj = new 고래('고래');
echo $obj->수영();
$obj = new 고등어();
echo $obj->수영();