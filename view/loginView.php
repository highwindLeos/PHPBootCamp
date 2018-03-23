<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>

    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="content">
        <div class="item">
            <img src="img/slide.png">
        </div>
        <div class="item">
            <div class="login">
                <a href="index.php"><img id="logo" src="img/logo.png"></a>
                <form class="form">
                    <p>
                        <input type="text" id="email" name="email" placeholder="E-Mail (example : instargram@gmail.com)" autofocus/>
                        <p class="validate"><?php if(isset($_SESSION['login1'])) echo $_SESSION['login1']; unset($_SESSION['login1']) ?></p>
                        <p class="validate"><?php if(isset($_SESSION['login2'])) echo $_SESSION['login2']; unset($_SESSION['login2']) ?></p>
                    </p>
                    <p>   
                        <input type="password" id="password" name="password" placeholder="Password" />
                        <p class="validate"><?php if(isset($_SESSION['login3'])) echo $_SESSION['login3']; unset($_SESSION['login3']) ?></p>
                        <p class="validate"><?php if(isset($_SESSION['login4'])) echo $_SESSION['login4']; unset($_SESSION['login4']) ?></p>
                    </p>
                    <button type="submit" formmethod="POST" formaction="loginProcess.php">
                    <img src="img/login2.png"/></button>
                </form>
                <p class="linebar"><img src="img/line.png"> 또는 <img src="img/line.png"></p>
                <button>
                    <span class="facebooklogin"></span>
                    <span class="facebook">Facebook으로 로그인</span>
                </button>
                <p><a href="#">비밀번호를 잊으셨나요?</a></p>
            </div>
            <div class="auth">
                <p>계정이 없으신가요? <a href="index.php" class="logintext">가입하기.</a></p>
            </div>
            <div class="app">
                <p class="apptext">앱을 다운로드 하세요.</p>
                <div class="row">
                    <a href="#"><img src="img/iphone.png"></a>
                    <a href="#"><img src="img/googlestore.png"></a>
                </div>
            </div>
        </div>
    </section>        
    
<?php include 'onerowfooter.php'; ?>