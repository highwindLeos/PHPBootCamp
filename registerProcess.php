<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use DatabaseModel\UserModel; #네임스페이스에  Class 를 사용한다.
use DatabaseModel\LoginModel; 

require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            die($e->getMessage());
        }

    $usermodel = new UserModel($db);
    $loginmodel = new LoginModel($db);
        
    #입력 데이터 필터링
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);  
    $name =  filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if($_POST){ #POST에 값이 있다면 검증을 실행.
        # 변수설정
        $errors = array(); #에러 메세지를 담을 배열을 생성

        # 검증 코드
        # 이메일
        if(empty($email)){
            $_SESSION['email1'] = $errors['email1'] = "* 이메일은 빈칸일 수 없습니다.";
        } else {
            
             $emailOverlapCheck = $usermodel->emailOverlapCheck($email);
            
            if ($emailOverlapCheck) { #이메일 중복 체크(입력한 값과 데이터베이스에서 조회한 값이 있다면.)
            $_SESSION['email3'] = $errors['email3'] ="* 이미 존재하는 이메일입니다.";
            }
        }
        if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){ # 이메일 입력값 검증 
            $emailVar = $email; #true 이메일 주소이면 $emailVal 변수에 넣음
        } else {
            $_SESSION['email2'] = $errors['email2'] = "* 이메일 형식이 아닙니다."; 
            #false 이메일 주소가 아니면 오류 메세지를 세션배열에 넣음.
        }
        
        # 이름
        if(empty($name)){
            $_SESSION['name1'] = $errors['name1'] = "* 이름은 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['name']) < 4)
        {
            $_SESSION['name2'] = $errors['name2'] = "* 이름은 2자 이상이어야합니다.";
        }
        
        # 별명
        if(empty($author)){
            $_SESSION['author1'] = $errors['author1'] = "* 사용자 이름은 빈칸일 수 없습니다.";
        } else {
            
            $authorOverlapCheck = $usermodel->authorOverlapCheck($author);
            
            if($authorOverlapCheck){ #사용자 이름 중복 체크(입력한 값과 데이터베이스에서 조회한 값이 있다면.)
                $_SESSION['author3'] = $errors['author3'] = "*이미 존재하는 사용자 이름입니다.";
            }
        }
        if(strlen($author) < 3){
            $_SESSION['author2'] = $errors['author2'] = "* 사용자 이름은 3자 이상이어야합니다.";
        }
        
        # 암호
        if(empty($password)){
            $_SESSION['password1'] = $errors['password1'] = "* 암호는 빈칸일 수 없습니다.";
        }
        if(strlen($password) < 6 || strlen($password) > 18 )
        {
            $_SESSION['password2'] = $errors['password2'] = "* 암호는 6~18자 사이이어야합니다.";
        }
    }  

    if(count($errors) == 0){ #에러값이 없다면 true
        $usermodel->Register($email, $name, $author, $password); #모델 함수 호출.
        $users = $loginmodel->getUsersByEmail($email); #이메일 입력값으로 Users table 의 행을 가져와서 변수에 담음.
        session_regenerate_id(); #세션 아이디 값을 재설정.
        $_SESSION = array(); #세션 데이터 초기화.
        $_SESSION['is_login'] = true;  #세션에 True 값을 입력.(Login 유지 세션 배열. 로그인 된 페이지에서 조건으로 사용됨)
        $_SESSION['email'] = $email; #세션에 이메일 값을 입력.
        $_SESSION['id'] = $users['id']; #세션에 가입하는 사용자 정보를 입력.
        $_SESSION['author'] = $users['author']; #세션에 가입하는 사용자 정보를 입력.
        
        header("Location: main.php"); #리다이렉션 페이지 이동
    } else { 
        header("Location: index.php"); #false 리다이렉션 페이지 이동
    }

?>