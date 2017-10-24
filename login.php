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
            <nav>
                <a href="index.php"><img class="loginlogo" src="img/icon/logo.png"></a> 
                <input class="search" type="text" placeholder="검색">
                <img src="img/icon/iconheader01.png">
                <img src="img/icon/iconheader02.png">
                <img src="img/icon/iconheader03.png">
            </nav>
        </div>
    </header>
    <article>
        <?php #배열과 변수 설정
        $iconarticle = ['img/icon/iconarticle01.png',
                        'img/icon/iconarticle02.png',
                        'img/icon/iconarticle03.png',
                        'img/icon/iconarticle04.png'];

        $article = ['좋아요',
                    '문구 더보기',
                    '댓글',
                    'Lorem, ipsum dolor sit amet consectetur adipisicing.',
                    '10월 1일'];

        $input = '<input class="comment" type="text" placeholder="댓글달기">';

        $all = '<a href="">모두 보기</a>';

        $hr = '<hr>';
        ?>
        <?php for($i = 1; $i < 4; $i++){ #for 문 시작 ?>

         <div class="article">
            <div>
                <img src="<?= $iconarticle[0] ?>">
            </div>
            <div class="mainimg">
                <img src="img/icon/img0<?= $i ?>.png">
            </div>
            <div>
                <img src="<?= $iconarticle[1] ?>">
                <img src="<?= $iconarticle[2] ?>">
            </div>
            <div>
                <p class="like"><?= $article[0] ?> #개</p>
                <p class="textmore"><?= $article[1] ?></p>
                <p class="comment"><?= $article[2] ?> #개 <?= $all ?></p>
                <p class="description"><?= $article[3] ?></p>
                <p class="datetime"><?= $article[4] ?></p> 
            </div>
            <?= $hr ?>
            <p>
                <?= $input ?>
                <a href=""><img class="submit" src="<?= $iconarticle[3] ?>"></a>
            </p>
        </div>
        <?php } #for 문 끝 ?>
    </article>
    <footer>
        <p>
            <?php
                $link = ['INSTAGRAM 정보',
                        '지원',
                        '블로그',
                        '홍보 센터',
                        'API',
                        '채용',
                        '개인정보처리방침',
                        '약관',
                        '디렉터리',
                        '언어'];
            ?>
            <?php for($i = 0; $i < 10; $i++) { #for 문 시작 ?>
                <span class="footerlink" OnClick="location.href="" "><?= $link[$i] ?></span>
            <?php } #for 문 끝 ?>
        </p>
        <p class="copy">
            <span> &#169; 2017 instargram</span>
        </p>
    </footer>
</body>
</html>