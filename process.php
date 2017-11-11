<?php
session_start();
require 'model/UserModel.php';
require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $usermodel = new UserModel($db);
        
    #필터링
    $emailSefe = filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL); # 이메일 입력 데이터 필터링
    if (filter_input(INPUT_POST, $emailSefe, FILTER_VALIDATE_EMAIL)) { # 이메일 입력값 검증 
        $emailVar = $emailSefe; #true 이메일 주소이면 $emailVal 변수에 넣음
    } else {
        $_SESSION['email2'] = $errors['email2'] = "* 이메일 형식이 아닙니다."; #false 이메일 주소가 아니면 오류 메세지를 세션배열에 넣음.
    }

    $nameSefe = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);

    $authorSefe = filter_input(INPUT_POST, $author, FILTER_SANITIZE_STRING);

    $hashpassSefe = filter_input(INPUT_POST, $hashpass, FILTER_SANITIZE_STRING);


    if($_POST){ #POST에 값이 있다면 검증을 실행.
        # 변수설정
        $errors = array(); #에러 메세지를 담을 배열을 생성

        # 검증 코드
        # 이메일
        if(empty($_POST['email']))
        {
            $_SESSION['email1'] = $errors['email1'] = "* 이메일은 빈칸일 수 없습니다.";
        }
        # 이름
        if(empty($_POST['name']))
        {
            $_SESSION['name1'] = $errors['name1'] = "* 이름은 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['name']) < 4)
        {
            $_SESSION['name2'] = $errors['name2'] = "* 이름은 2자 이상이어야합니다.";
        }
        # 별명
        if(empty($_POST['author']))
        {
            $_SESSION['author1'] = $errors['author1'] = "* 별명은 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['author']) < 3)
        {
            $_SESSION['author2'] = $errors['author2'] = "* 별명은 3자 이상이어야합니다.";
        }
        # 암호
        if(empty($_POST['password']))
        {
            $_SESSION['password1'] = $errors['password1'] = "* 암호는 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 18 )
        {
            $_SESSION['password2'] = $errors['password2'] = "* 암호는 6~18자 사이이어야합니다.";
        }
    }  

    if(count($errors) == 0){ #에러값이 없다면 true
        $usermodel->Register(); #모델 함수 호출.
        $_SESSION = array(); #세션 데이터 초기화.
        header("Location: login.php"); #리다이렉션 페이지 이동
    } else { 
        header("Location: index.php"); #false 리다이렉션 페이지 이동
    }

?>