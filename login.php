<?php
session_start();
if(isset($_SESSION['is_login'])){ #변수가 설정되어 있다면 True
    header('Location: main.php');
    exit;
}

$pageTitle = 'PHP BootCamp AnInstargram - '.basename(__FILE__, '.php');
?>

<?php include 'view/loginView.php';?>
