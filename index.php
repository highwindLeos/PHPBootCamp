<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram</title>

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
                <form action="login.html">
                    <p>
                        <input type="text" name="id" placeholder="휴대폰 번호 및 이메일">
                    </p>
                    <p>
                        <input type="text" name="name" placeholder="성명">
                    </p>
                    <p>
                        <input type="text" name="user" placeholder="사용자 이름">
                    </p>
                    <p>
                        <input type="password" name="password" placeholder="비밀번호">
                    </p>                    
                </form>
                <a href="#"><img class="join" src="img/join.png"></a>
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
        <?php
        $link = ['INSTAGRAM 정보',
                '지원',
                '블로그',
                '홍보 센터',
                'API',
                '채용',
                '정보개인정보처리방침',
                '약관',
                '디렉터리',
                '언어'];

            for($i = 0; $i < 10; $i++)
            {
                echo '<span class="footerlink" OnClick="location.href="" ">'.$link[$i].'</span>';
            }
        ?>
        <span> &#169; 2017 instargram</span>
        </p>
                
            
        
    </footer>
</body>
</html>