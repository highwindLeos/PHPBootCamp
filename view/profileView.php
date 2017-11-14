<?php
session_start();
if(!isset($_SESSION['is_login'])){ #변수가 설정되어 있지 않다면 True
    header('Location: login.php');
    exit;
}
?>
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
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="main.php"><img class="loginlogo" src="img/icon/logo.png"></a> 
                <input class="search" type="text" placeholder="검색" />
                <div class="navbaricon">
                    <img src="img/icon/iconheader01.png">
                    <img src="img/icon/iconheader02.png">
                    <img src="img/icon/iconheader03.png">
                    <a href="logoutProcess.php"><span class="logout">로그아웃</span></a>
                </div>
            </nav>
        </div>
    </header>
    <article id="article">
        <div class="top-article">
           <div class="top">
               <a href="#"><img class="profile-img" src="img/profile/profile.jpg"></a>
                <h2>highwind26</h2>
                <button><img src="img/profile/profile2.png"></button>
                <a href="#open"><img class="setting" src="img/profile/profile3.png"></a>
                <p><span>게시물 0</span><span>팔로워 3</span><span>팔로우 6</span></p>
           </div>
        </div>
        <div class="mid-article">
           <p><span>게시물</span><span>저장됨</span></p>
        </div>
        <div class="bottom-article">
            <div><img src="img/profile/img1.png"></div>
            <div><img src="img/profile/img2.png"></div>
            <div><img src="img/profile/img3.png"></div>
            <div><img src="img/profile/img4.png"></div>
            <div><img src="img/profile/img5.png"></div>
            <div><img src="img/profile/img6.png"></div>
            <div><img src="img/profile/img7.png"></div>
            <div><img src="img/profile/img8.png"></div>
            <div><img src="img/profile/img9.png"></div>
        </div>
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
            <span> &#169; 2017 Instargram.</span>
        </p>
    </footer>
    <!-- Modal popup-->
    <div class="white_content" id="open">
        <div>
            <p class="modalcontent">비밀번호 변경</p>
            <p class="modalcontent">허가된 앱</p>
            <p class="modalcontent">알 림</p>
            <p class="modalcontent">로그 아웃</p>
            <a href="#close"><p class="modalcontent">취소</p></a>
        </div>
    </div>
</body>
</html>