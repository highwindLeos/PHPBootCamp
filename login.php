<!--  #배열과 변수 설정
    $icon = ['img/icon/iconarticle01.png',
            'img/icon/iconarticle02.png',
            'img/icon/iconarticle03.png',
            'img/icon/iconarticle04.png'];

    $article = ['좋아요',
                '문구 더보기',
                '댓글',
                'Lorem, ipsum dolor sit amet consectetur adipisicing.'];

    $footerlink = ['INSTAGRAM 정보',
             '지원',
             '블로그',
             '홍보 센터',
             'API',
             '채용',
             '개인정보처리방침',
             '약관',
             '디렉터리',
             '언어'];

    $date = date('n월 j일');

    $allview = ' 모두 보기';

    $count = ' #개';
-->

<?php # PDO 이용 DB접속 Code
$dbh = new PDO('mysql:host=localhost; dbname=anicoboard', 'root', 'stonker26'); #DB 접속을 위한 인자를 설정해서 PDO 객체에 담는다.
$stmt = $dbh->prepare('SELECT * FROM article'); #생성한 객체에 쿼리를 설정해서 변수에 저장한다.
$stmt->execute(); #변수에 담긴 쿼리를 실행한다.
$list = $stmt->fetchAll(); #모든 데이터를 가져와서 list 변수에 담는다.

if(!empty($_GET['id'])) { #아이디 값이 있다면 (비어있지 않다면) true.
    $stmt = $dbh->prepare('SELECT * FROM article WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $id = $_GET['id'];
    $stmt->execute();
    $article = $stmt->fetch();
}
?>

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
        <?php for($i = 1; $i < 4; $i++){ #for 문 시작 ?>

        <div class="article">
            <div class="titleimg">
                <img src="<?= $icon[0] ?>">
            </div>
            <div class="mainimg">
                <img src="img/image/img<?= $i ?>.png">
            </div>
            <div class="imgbtn">
                <img src="<?= $icon[1] ?>">
                <img src="<?= $icon[2] ?>">
            </div>
            <div class="articleparam">
                <p class="like"><?= $article[0].$count ?></p>
                <p class="textmore"><?= $article[1] ?></p>
                <p class="comment"><?= $article[2].$count.'<a href="">'.$allview.'</a>' ?></p>
                <p class="description"><?= $article[3] ?></p>
                <p class="datetime"><?= $date ?></p> 
            </div>
            <hr>
            <p>
                <input class="comment" type="text" placeholder="댓글달기"> 
                <a href=""><img class="submit" src="<?= $icon[3] ?>"></a>
            </p>
        </div>
        
        <?php } #for 문 끝 ?>
    </article>  
    <footer>
        <p>
            <?php for($i = 0; $i < 10; $i++){ #for 문 시작?>
                    <span class="footerlink" OnClick="location.href="" "><?= $footerlink[$i] ?></span>
            <?php } #for 문 끝 ?>
        </p>
        <p class="copy">
            <span> &#169; 2017 instargram</span>
        </p>
    </footer>
</body>
</html>