<?php

try {
    // 예외상황이 발생 할만한 소스코드(우리가 처리하고싶은 소스코드)
    echo "Try 실행\n";

    throw new Exception("강제예외발생");
    echo "try 종료\n";
} catch( Exception $e ) {
    // 예외상황 발생 시 실행
    echo "catch 실행\n";
    echo $e->getmessage(),"\n";
} finally {
    // 정상이든 예외발생이든 무조건 실행
    echo "finally 실행\n";
}




?>