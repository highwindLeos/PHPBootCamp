<?php
    session_start();

    $email_err = $name_err = $author_err = $password_err = '';

   if($_POST){
        # 변수설정

        # 검증 코드
        # 이메일
        if(empty(trim($_POST['email'])))
        {
            $_SESSION['email1'] = $email_err = "* 이메일은 빈칸일 수 없습니다.";
        }
        # 이름
        if(empty(trim($_POST['name'])))
        {
            $_SESSION['name1'] = $name_err = "* 이름은 빈칸일 수 없습니다.";
        } else if(strlen(trim($_POST['name'])) < 4)
        {
            $_SESSION['name1'] = $name_err = "* 이름은 2자 이상이어야합니다.";
        }
        # 별명
        if(empty(trim($_POST['author'])))
        {
            $_SESSION['author1'] = $author_err = "* 별명은 빈칸일 수 없습니다.";
        } else if(strlen(trim($_POST['author'])) < 3)
        {
            $_SESSION['author1'] = $author_err = "* 별명은 3자 이상이어야합니다.";
        }
        # 암호
        if(empty(trim($_POST['password'])))
        {
            $_SESSION['password1'] = $password_err = "* 암호는 빈칸일 수 없습니다.";
        } else if(strlen(trim($_POST['password'])) < 6)
        {
            $_SESSION['password1'] = $password_err = "* 암호는 6자 이상이어야합니다.";
        }
    }
?>