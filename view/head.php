<?php
if(!isset($_SESSION['is_login'])){ #변수가 설정되어 있지 않다면 True
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
    
    <!--  favicon insert  -->
    <link rel="icon" href="img/favicon.ico"/>
    <!--  Css stylesheet  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">
    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function chkValidate_btn(){
            if(!frm.iconupload.value){
                alert("파일을 꼭 첨부해주세요.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="main.php"><img class="loginlogo" src="img/icon/logo.png"></a> 
                <div class="navbaricon">
                    <img src="img/icon/iconheader01.png">
                    <img src="img/icon/iconheader02.png">
                    <a href="profile.php?author=<?= $_SESSION['author']; ?>"><img src="img/icon/iconheader03.png"></a>
                    <a href="write.php"><img src="img/icon/iconheader04.png"></a>
                    <span class="welcome">어서오세요. <span id="loginer"><?= $_SESSION['author']; ?></span> 님</span>
                </div>
            </nav>
        </div>
    </header>