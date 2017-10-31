<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram - Log in</title>

    <link rel="icon" href="/PHPcamp/img/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.php"><img class="loginlogo" src="img/icon/logo.png"></a> 
                <input class="search" type="text" placeholder="검색" />
                <img src="img/icon/iconheader01.png">
                <img src="img/icon/iconheader02.png">
                <img src="img/icon/iconheader03.png">
            </nav>
        </div>
    </header>
    <article>   
        <?php for($i = 0; $i < $file_count; $i++){ #for 문 시작 (img/image 폴더의 이미지 개수만큼 증가) ?>
        <div class="article">
            <div class="titleimg">
                <img src="<?= htmlspecialchars($list[0][icon]) ?>"> <!-- 다차원 배열값 출력하기 $변수명[배열인자][배열인자] --> 
            </div>
            <div class="mainimg">
                <img src="img/image/img<?= $i ?>.png">
            </div>
            <div class="imgbtn">
                <img src="<?= htmlspecialchars($list[1][icon]) ?>">
                <img src="<?= htmlspecialchars($list[2][icon]) ?>">
            </div>
            <div class="articleparam">
                <p class="like"><?= htmlspecialchars($list[4][article].$list[9][count].'개') ?></p>
                <p class="textmore"><?= htmlspecialchars($list[5][article]) ?></p>
                <p class="comment"><?= htmlspecialchars($list[6][article].$list[10][count].'개')
                                       .'<a href="">'.htmlspecialchars($list[8][allview]).'</a>' ?></p>
                <p class="description"><?= htmlspecialchars($list[7][article]) ?></p>
                <p class="datetime"><?= htmlspecialchars($list[$i][date]) ?></p> 
            </div>
            <hr>
            <p>
                <input class="comment" type="text" placeholder="댓글달기"> 
                <a href=""><img class="submit" src="<?= htmlspecialchars($list[3][icon]) ?>"></a>
            </p>
        </div>

        <?php } #for 문 끝 ?>
    </article>  
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
        </p>
        <p class="copy">
            <span> &#169; 2017 instargram</span>
        </p>
    </footer>
</body>
</html>