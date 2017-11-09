<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram</title>
    
    <!--  favicon insert  -->
    <link rel="icon" href="img/favicon.ico"/>
    <!--  Css stylesheet  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.php"><img class="loginlogo" src="img/icon/logo.png"></a> 
                <input class="search" type="text" placeholder="검색" />
                <div class="navbaricon">
                    <img src="img/icon/iconheader01.png">
                    <img src="img/icon/iconheader02.png">
                    <img src="img/icon/iconheader03.png">
                </div>
            </nav>
        </div>
    </header>
    <article>
       <?php foreach($articles as $item){ ?>
        <div class="article">
            <div class="titleimg">
                <img src="<?= htmlspecialchars($item['usericon']['usericon']); ?>">
            </div>
            <div class="mainimg">
                <img src="<?= htmlspecialchars($item['src']['src']); ?>">
            </div>
            <div class="imgbtn">
                <a href="#"><img src="img/icon/iconarticle01.png"></a>
                <a href="#"><img src="img/icon/iconarticle02.png"></a>
            </div>
            <div class="articleparam">
                <p class="like"><?= htmlspecialchars($item['like']['like'].'개'); ?></p>
                <p class="comment">
                    <span class="userid"><?= htmlspecialchars($item['usericon']['author']).' '; ?></span>
                    <?= htmlspecialchars($item['article']).'<a href="#">'.htmlspecialchars($item[8]).'</a>'; ?>
                </p>
                <p class="datetime"><?= htmlspecialchars($item[9]); ?></p> 
            </div>
            <hr>
            <p>
                <input class="comment" type="text" placeholder="댓글달기" /> 
                <a href=""><img class="submit" src="<?= htmlspecialchars($item[10]); ?>"></a>
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
            <span> &#169; 2017 Instargram</span>
        </p>
    </footer>
</body>
</html>