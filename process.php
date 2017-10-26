<?php
$dbh = new PDO('mysql:host=localhost;dbname=anicoboard', 'root', 'stonker26', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
switch($_GET['mode']){

    case 'insert':
        $stmt = $dbh->prepare("INSERT INTO register (email, name, author, password) VALUES (:email, :name, :author, :password)");            
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':author',$author);
        $stmt->bindParam(':password',$hashpass);
        
        $email = $_POST['email'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $password = $_POST['password'];

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ]; #솔트 (추가문자열 암호화 옵션, 3번째 인자값)
        
        $hashpass = password_hash($password, PASSWORD_BCRYPT, $options); #암호화 코드
        
        $stmt->execute(); #true 쿼리 실행
                
        header("Location: login.php"); #리다이렉션 페이지 이동
        break;

    case 'delete':
        $stmt = $dbh->prepare('DELETE FROM register WHERE id = :id');
        $stmt->bindParam(':id', $id);
 
        $id = $_POST['id'];
        $stmt->execute();
        header("Location: list.php"); 
        break;

    case 'modify':
        $stmt = $dbh->prepare('UPDATE register SET title = :title, description = :description WHERE id = :id');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];
        $stmt->execute();
        header("Location: list.php?id={$_POST['id']}");
        break;
}
?>