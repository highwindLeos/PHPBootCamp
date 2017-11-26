<?php include 'head.php'; ?>
   <article>
        <div class="article">
            <div class="article-write">
                <a href="main.php">
                    <img src="img/logo.png">
                    <h3>팔로우 리스트 (Following List)</h3></br>
                    <h4><?= htmlspecialchars($_GET['author']); ?> Following</h4>
                </a>
            </div>
            <hr>
            <div class="followlist">
                <?php if(!empty($list)){ foreach($list as $item){ #가져오는 데이터가 있다면 True. ?>
                    <div>
                        <a href="profile.php?author=<?= $item['author']; ?>">
                            <img class="follow-icon" src="<?= htmlspecialchars($item['usericon']); ?>" >
                            <span class="follow-author"><?= htmlspecialchars($item['author']); ?></span>
                        </a>
                    </div>
                <?php } #end foreach.
                   } else { ?>
                        <h4>팔로우 하고 있는 사용자가 없습니다.</h4>
                <?php } #end if ?>   
            </div>
        </div>   
    </article>  
    <footer>
        <p>
            <span class="footerlink"><a href="#">AnInstargram정보</a></span>
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
            <span> &#169; 2017 AnInstargram.</span>
        </p>
    </footer>
</body>
</html>