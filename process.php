<?php
$dbh = new PDO('mysql:host=localhost;dbname=anicoboard', 'root', 'stonker26', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
switch($_GET['mode']){

    case 'insert':
        $stmt = $dbh->prepare("INSERT INTO register (email, name, author, password) VALUES (:email, :name, :author, :password)");
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':author',$author);
        $stmt->bindParam(':password',$password);

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        
        password_hash( $password, PASSWORD_BCRYPT, $options);
 
        $email = $_POST['email'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $password = $_POST['password'];
        $stmt->execute();
        header("Location: login.php"); 
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