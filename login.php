<?php # PDO 이용 DB접속 Code
$dbh = new PDO('mysql:host=localhost; dbname=anicoboard', 'root', 'stonker26'); #DB 접속을 위한 인자를 설정해서 PDO 객체에 담는다.
$stmt = $dbh->prepare('SELECT * FROM article'); #생성한 객체에 쿼리를 설정해서 stmt변수에 저장한다.
$stmt->execute(); #변수에 담긴 쿼리를 실행한다.
$list = $stmt->fetchAll(); #모든 데이터를 가져와서 list 변수에 담는다.
?>

<?php # code 시작 : 디렉토리에 있는 파일과 디렉토리의 갯수 구하기
$result = opendir("img/image"); #opendir함수를 이용해서 디렉토리의 핸들을 얻어옴
while($file = readdir($result)) { # readdir함수를 이용해서 디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
   if($file=="." || $file=="..") {continue;} # file명이 "." (또는 ||) ".." 이면 무시함

   $fileInfo = pathinfo($file); #pathinfo() 파일 경로의 정보를 가져온다. 
   $fileExt = $fileInfo['extension']; # 파일의 확장자를 구함

   if (empty($fileExt)){
      $dir_count++; # 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
   } else {
      $file_count++; # 파일에 확장자가 있으면 file_count를 증가시킴
   }
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
                <p class="datetime"><?= htmlspecialchars($list[0][date]) ?></p> 
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
            <span class="footerlink" OnClick="location.href="#"">INSTARGRAM정보</span>
            <span class="footerlink" OnClick="location.href="#"">지원</span>
            <span class="footerlink" OnClick="location.href="#"">블로그</span>
            <span class="footerlink" OnClick="location.href="#"">홍보 센터</span>
            <span class="footerlink" OnClick="location.href="#"">API</span>
            <span class="footerlink" OnClick="location.href="#"">채용</span>
            <span class="footerlink" OnClick="location.href="#"">개인정보처리방침</span>
            <span class="footerlink" OnClick="location.href="#"">약관</span>
            <span class="footerlink" OnClick="location.href="#"">디렉터리</span>
            <span class="footerlink" OnClick="location.href="#"">언어</span>
            <!-- INSTARGRAM 정보, 지원, 블로그, 홍보 센터, API, 채용, 개인정보처리방침, 약관, 디렉터리, 언어 -->
        </p>
        <p class="copy">
            <span> &#169; 2017 instargram</span>
        </p>
        <p style="color:black;">
        <!-- print_r($list); #list 변수 내용 찍기 -->
        </p>
    </footer>
</body>
</html>