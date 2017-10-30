<?php
    if($_POST){
        # 변수설정
        $errors = array();
        $check_email  = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['email']); 
        #이메일 형식 정규표현식
        
        # 검증 코드
        # 이메일
        if(empty($_POST['email']))
        {
            $errors['email1'] = "* 이메일은 빈칸일 수 없습니다.";
        }
        if($check_email == false)
        {
            $errors['email2'] = "* 잘못된 이메일 형식입니다.";
        }
        # 이름
        if(empty($_POST['name']))
        {
            $errors['name1'] = "* 이름은 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['name']) < 4)
        {
            $errors['name2'] = "* 이름은 2자 이상이어야합니다.";
        }
        # 별명
        if(empty($_POST['author']))
        {
            $errors['author1'] = "* 별명은 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['author']) < 3)
        {
            $errors['author2'] = "* 별명은 3자 이상이어야합니다.";
        }
        # 암호
        if(empty($_POST['password']))
        {
            $errors['password1'] = "* 암호는 빈칸일 수 없습니다.";
        }
        if(strlen($_POST['password']) < 6)
        {
            $errors['password2'] = "* 암호는 6자 이상이어야합니다.";
        }
        
        #에러 배열을 검사한다.
        #if(count($errors) == 0)
        #{
            #리다이렉트 : 성공  
            #header("location : index.php");
        #}
    }
?>