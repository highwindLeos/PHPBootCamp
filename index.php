<?php include_once "validate.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram</title>

    <link rel="icon" href="/PHPcamp/img/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="content">
        <div class="item">
            <img src="img/slide.png">
        </div>
        <div class="item">
            <div class="login">
                <a href="#"><img id="logo" src="img/logo.png"></a>
                <h3>친구들의 사진과 동영상을 보려면 가입하세요.</h3>
                <a href="#"><img class="logo" src="img/login.png"></a>
                <p><img src="img/line.png"> 또는 <img src="img/line.png"></p>
                <form method="POST"> <!-- action="./process.php?mode=insert" -->
                    <p>
                        <input type="text" id="email" name="email" 
                        value="<?php if(isset($errors['email'])) echo $_POST['email']; ?>" placeholder="이메일">
                    </p>
                    <p><?php if(isset($errors['email1'])) echo $errors['email1']; ?></p>
                    <p><?php if(isset($errors['email2'])) echo $errors['email2']; ?></p>
                    <p>
                        <input type="text" id="name" name="name" 
                        value="<?php if(isset($errors['name'])) echo $_POST['name']; ?>"  placeholder="성명">
                    </p>
                    <p><?php if(isset($errors['name1'])) echo $errors['name1']; ?></p>
                    <p><?php if(isset($errors['name2'])) echo $errors['name2']; ?></p>
                    <p>
                        <input type="text" id="author" name="author" 
                        value="<?php if(isset($errors['author'])) echo $_POST['author']; ?>"  placeholder="사용자 이름">
                    </p>
                    <p><?php if(isset($errors['author1'])) echo $errors['author1']; ?></p>
                    <p><?php if(isset($errors['author2'])) echo $errors['author2']; ?></p>
                    <p>
                        <input type="password" id="password" name="password" 
                        value="<?php if(isset($errors['password'])) echo $_POST['password']; ?>"  placeholder="비밀번호">
                    </p>
                    <p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
                    <p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>
                    <input class="join" type="image" value="가입" src="img/join.png">                    
                </form>
                <p>가입하면 Instagram의 약관 및 개인정보처리방침에 동의하게 됩니다.</p>
            </div>
            <div class="auth">
                <p>계정이 있으신가요? <a href="login.php" class="logintext">로그인.</a></p>
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
    <footer>
        <p>
            <span class="footerlink"><a href="#">INSTARGRAM정보</a></span>
            <span class="footerlink"><a href="#">지원</a></span>
            <span class="footerlink"><a href="#">블로그</a></span>
            <span class="footerlink"><a href="#">홍보</a> </span>
            <span class="footerlink"><a href="#">센터</a></span>
            <span class="footerlink"><a href="#">API</a></span>
            <span class="footerlink"><a href="#">채용</a></span>
            <span class="footerlink"><a href="#">개인정보처리방침</a></span>
            <span class="footerlink"><a href="#">약관</a></span>
            <span class="footerlink"><a href="#">디렉터리</a></span>
            <span class="footerlink"><a href="#">언어</a></span>
            <!-- INSTARGRAM 정보, 지원, 블로그, 홍보 센터, API, 채용, 개인정보처리방침, 약관, 디렉터리, 언어 -->
            <span> &#169; 2017 instargram</span>
        </p>
    </footer>
</body>
<!-- <script src="js/validate.js" type="text/javascript"></script> -->
</html>