<?php include 'head.php'; ?>
   
    <article id="article">
       <div class="top-article">
           <a href="#open2"><img class="profile-img" src="<?= ($list['usericon']) ? $list['usericon'] : 'img/noimage.jpg'; ?>"></a>
            <h2><?= $list['author']; ?></h2>
            <a href="#"><img class="button" src="img/profile/profile2.png"></a>
            <a href="#open1"><img class="setting" src="img/profile/profile3.png"></a>
            <p class="count"><span>게시물 <?= count($pitures); ?></span><span>팔로워 3</span><span>팔로우 6</span></p>
       </div>
        <div class="mid-article">
           <p><span><?= $list['author']; ?> 님의 게시물</span></p>
        </div>
        <div class="bottom-article">
            <?php foreach($pitures as $items){ ?>
                <div><img src="<?= $items['src'] ?>"></div>
            <?php } ?>
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
    <?php include 'profileViewModal.php'; ?>
</body>
</html>