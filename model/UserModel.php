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
        $stmt->bindParam(':email',$emailVar);
        $stmt->bindParam(':name',$nameSefe);
        $stmt->bindParam(':author',$authorSefe);
        $stmt->bindParam(':password',$hashpassSefe);
        
        
        $email = trim($_POST['email']); #trim() 여백을 삭제하는 메소드.
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
        $hashpass = password_hash(trim($_POST['password']), PASSWORD_BCRYPT, $options); #암호화 코드

        $stmt->execute(); # 쿼리 실행
    }
    
}