<?php

class UserModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function Register($email,$name,$author)
    {
        $insertSql = "INSERT INTO users (email, name, author, password) VALUES (:email, :name, :author, :password)";
        
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
        $hashpass = password_hash(trim($_POST['password']), PASSWORD_BCRYPT, $options); #암호화 코드
        
        $stmt = $this->db->prepare($insertSql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':password', $hashpass);

        $stmt->execute(); # 쿼리 실행
    }
    
    public function emailOverlapCheck($email)
    {
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_INT);
        $stmt->execute();
        
        return !empty($stmt->fetch(PDO::FETCH_ASSOC)); # return Boolean value
    }
    
    public function authorOverlapCheck($author)
    {
        $stmt = $this->db->prepare("SELECT author FROM users WHERE author = :author");
        $stmt->bindParam(':author', $author, PDO::PARAM_INT);
        $stmt->execute();
        
        return !empty($stmt->fetch(PDO::FETCH_ASSOC)); # return Boolean value
    }
    
}