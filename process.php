<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=anicoboard', 'root', 'stonker26', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
switch($_GET['mode']){

    case 'insert':
        $stmt = $dbh->prepare("INSERT INTO register (email, name, author, password) VALUES (:email, :name, :author, :password)");            
        $stmt->bindParam(':email',$emailVal);
        $stmt->bindParam(':name',$nameSefe);
        $stmt->bindParam(':author',$authorSefe);
        $stmt->bindParam(':password',$hashpassSefe);
        
        if($_POST){
            # 변수설정
            $errors = array();

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
            if(strlen($_POST['password']) < 6)
            {
                $_SESSION['password2'] = $errors['password2'] = "* 암호는 6자 이상이어야합니다.";
            }
        }        
        
        $email = $_POST['email'];
        $emailSefe = filter_var($email, FILTER_SANITIZE_EMAIL); # 이메일 입력 데이터 필터링
        
        if (filter_var($emailSefe, FILTER_VALIDATE_EMAIL)) { # 이메일 입력값 검증 
            $emailVal = $emailSefe; #true 이메일 주소이면 $emailVal 변수에 넣음
        } else{
            $_SESSION['email2'] = "* 이메일 형식이 아닙니다."; #false 이메일 주소가 아니면 오류 메세지를 세션배열에 넣음.
        }

        $name = $_POST['name'];
        $nameSefe = filter_var($name, 
                    FILTER_SANITIZE_STRING,
                    FILTER_FLAG_STRIP_LOW¦FILTER_FLAG_ENCODE_HIGH
                    ); #다국어 문자 필터링

        $author = $_POST['author'];
        $authorSefe = filter_var($author, 
                      FILTER_SANITIZE_STRING,
                      FILTER_FLAG_STRIP_LOW¦FILTER_FLAG_ENCODE_HIGH
                      ); #다국어 문자 필터링

        $password = $_POST['password'];
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
        $hashpass = password_hash($password, PASSWORD_BCRYPT, $options); #암호화 코드
        $hashpassSefe = filter_var($hashpass, 
                        FILTER_SANITIZE_STRING,
                        FILTER_FLAG_STRIP_LOW¦FILTER_FLAG_ENCODE_HIGH
                        ); #다국어 문자 필터링

        if(count($errors) == 0){ #에러값이 없다면 true
            $stmt->execute(); # 쿼리 실행
            $_SESSION = array(); #세션 데이터 초기화.
            header("Location: login.php"); #리다이렉션 페이지 이동
        } else { 
            header("Location: index.php"); #리다이렉션 페이지 이동
        }
        break;

//    case 'delete':
//        $stmt = $dbh->prepare('DELETE FROM register WHERE id = :id');
//        $stmt->bindParam(':id', $id);
// 
//        $id = $_POST['id'];
//        $stmt->execute();
//        header("Location: list.php"); 
//        break;
//
//    case 'modify':
//        $stmt = $dbh->prepare('UPDATE register SET title = :title, description = :description WHERE id = :id');
//        $stmt->bindParam(':title', $title);
//        $stmt->bindParam(':description', $description);
//        $stmt->bindParam(':id', $id);
//        
//        $title = $_POST['title'];
//        $description = $_POST['description'];
//        $id = $_POST['id'];
//        $stmt->execute();
//        header("Location: list.php?id={$_POST['id']}");
//        break;
}
?>