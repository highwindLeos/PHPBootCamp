<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram - Log in</title>

    <link rel="icon" href="img/favicon.ico"/>
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
        <?php foreach($list as $item){ ?>
        <div class="article">
            <div class="titleimg">
                <img src="<?= htmlspecialchars($item[userIcon]) ?>">
            </div>
            <div class="mainimg">
                <img src="<?= htmlspecialchars($item[image]) ?>">
            </div>
            <div class="imgbtn">
                <img src="<?= htmlspecialchars($item[goodIcon]) ?>">
                <img src="<?= htmlspecialchars($item[commentIcon]) ?>">
            </div>
            <div class="articleparam">
                <p class="like"><?= htmlspecialchars($item[viewCount].'개') ?></p>
                <p class="comment">
                    <span class="userid"><?= htmlspecialchars($item[userId]).' '?></span>
                    <?= htmlspecialchars($item[comment]).'<a href="#">'.htmlspecialchars($item[more]).'</a>' ?>
                </p>
                <p class="datetime"><?= htmlspecialchars($item[date]) ?></p> 
            </div>
            <hr>
            <p>
                <input class="comment" type="text" placeholder="댓글달기" /> 
                <a href=""><img class="submit" src="<?= htmlspecialchars($item[commentSubmit]) ?>"></a>
            </p>
        </div>
        <?php } ?>
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
        </p>
        <p class="copy">
            <span> &#169; 2017 instargram</span>
        </p>
    </footer>
</body>
</html>