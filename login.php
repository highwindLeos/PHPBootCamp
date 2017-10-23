<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Camp instargram - Log in</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <header>
        <div class="container">
            <p>
                <a href="index.php"><img class="loginlogo" src="img/icon/logo.png"></a> 
                <input class="search" type="text" placeholder="검색">
                <img src="img/icon/iconheader01.png">
                <img src="img/icon/iconheader02.png">
                <img src="img/icon/iconheader03.png">
            </p>
        </div>
    </header>
    <article>
        <?php

        $iconarticle = ['img/icon/iconarticle01.png',
                        'img/icon/iconarticle02.png',
                        'img/icon/iconarticle03.png'];

        for($i = 1; $i < 4; $i++)
        {
            echo '<div class="article">';
            echo '<div><img src="'.$iconarticle[0].'"></div>';
            echo '<div class="mainimg"><img src="img/icon/img0'.$i.'.png"></div>';
            echo '<div><img src="'.$iconarticle[1].'">
                        <img src="'.$iconarticle[2].'">
                </div>';
            echo '<div>
                    <p>좋아요 #개</p>
                    <p>nbcnewsSwipe 문구 더 보기</p>
                    <p>댓글 #개 모두 보기</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                    <p>10월 1일</p> 
                </div>';
            echo '<p><input type="text" placeholder="댓글달기"></p>';  
            echo '</div>';
        }
        ?>
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
                        '정보개인정보처리방침',
                        '약관',
                        '디렉터리',
                        '언어'];

                for($i = 0; $i < 10; $i++)
                {
                    echo '<span class="footerlink" OnClick="location.href="" ">'.$link[$i].'</span>';
                }
            ?>
        </p>
        <p class="copy">
            <span> &#169; 2017 instargram</span>
        </p>
    </footer>
</body>
</html>