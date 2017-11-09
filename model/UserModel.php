<?php

class UserModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function Register()
    {
        $insertSql = 'INSERT INTO users (email, name, author, password) VALUES (:email, :name, :author, :password)';
        
        $stmt = $this->db->prepare($insertSql);            
        $stmt->bindParam(':email',$emailVal);
        $stmt->bindParam(':name',$nameSefe);
        $stmt->bindParam(':author',$authorSefe);
        $stmt->bindParam(':password',$hashpassSefe);
        
        $email = trim($_POST['email']); #trim() 여백을 삭제하는 메소드.
        $emailSefe = filter_var($email, FILTER_SANITIZE_EMAIL); # 이메일 입력 데이터 필터링
        
        if (filter_var($emailSefe, FILTER_VALIDATE_EMAIL)) { # 이메일 입력값 검증 
            $emailVal = $emailSefe; #true 이메일 주소이면 $emailVal 변수에 넣음
        } else {
            $_SESSION['email2'] = $errors['email2'] = "* 이메일 형식이 아닙니다."; #false 이메일 주소가 아니면 오류 메세지를 세션배열에 넣음.
        }

        $name = trim($_POST['name']);
        $nameSefe = filter_var($name, 
                    FILTER_SANITIZE_STRING,
                    FILTER_FLAG_STRIP_LOW¦FILTER_FLAG_ENCODE_HIGH
                    ); #다국어 문자 필터링

        $author = trim($_POST['author']);
        $authorSefe = filter_var($author, 
                      FILTER_SANITIZE_STRING,
                      FILTER_FLAG_STRIP_LOW¦FILTER_FLAG_ENCODE_HIGH
                      ); #다국어 문자 필터링

        $password = trim($_POST['password']);
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
            header("Location: index.php"); #false 리다이렉션 페이지 이동
        }
    }
    
}