<?php

// cookie 삭제 방법

setcookie("myCookie", "홍길동", time());
// 현재시간으로 적용신규적용해서 바로사라지게한다

setcookie("myCookie2", "아버지를 아버지라 부르지 못하고", time()-1);
// -1초 전으로 적용해서 없어지게한다








?>