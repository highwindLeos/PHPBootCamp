<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram</title>

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
                <h3>친구들의 사진과 동영상을 보려면 가입하세요.</h3>
                <a href="#"><img class="facebooklogin" src="img/login.png"></a>
                <p class="linebar"><img src="img/line.png"> 또는 <img src="img/line.png"></p>
                <form>
                    <p>
                        <input type="text" id="email" name="email" placeholder="이메일">
                    </p>
                    <p class="validate"><?php if(isset($_SESSION['email1'])) echo $_SESSION['email1']; unset($_SESSION['email1']) ?></p>
                    <p class="validate"><?php if(isset($_SESSION['email2'])) echo $_SESSION['email2']; unset($_SESSION['email2']) ?></p>
                    <p>
                        <input type="text" id="name" name="name" placeholder="성명">
                    </p>
                    <p class="validate"><?php if(isset($_SESSION['name1'])) echo $_SESSION['name1']; 
                        unset($_SESSION['name1']) ?></p>
                    <p class="validate"><?php if(isset($_SESSION['name2'])) echo $_SESSION['name2']; 
                        unset($_SESSION['name2']) ?></p>                    
                    <p>
                        <input type="text" id="author" name="author" placeholder="사용자 이름">
                    </p>
                    <p class="validate"><?php if(isset($_SESSION['author1'])) echo $_SESSION['author1'];
                        unset($_SESSION['author1']) ?></p>
                    <p class="validate"><?php if(isset($_SESSION['author2'])) echo $_SESSION['author2'];
                        unset($_SESSION['author2']) ?></p>
                    <p>
                        <input type="password" id="password" name="password" placeholder="비밀번호">
                    </p>
                    <p class="validate"><?php if(isset($_SESSION['password1'])) echo $_SESSION['password1'];
                        unset($_SESSION['password1']) ?></p>
                    <p class="validate"><?php if(isset($_SESSION['password2'])) echo $_SESSION['password2'];
                        unset($_SESSION['password2']) ?></p>
                    <button type="submit" formmethod="POST" formaction="process.php">
                    <img src="img/join.png"/></button>
                </form>
                <p>가입하면 Instargram의 <a href="#">약관</a> 및 <a href="#">개인정보처리방침</a>에 동의하게 됩니다.</p>
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
</html>