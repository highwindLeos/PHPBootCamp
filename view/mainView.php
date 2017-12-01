<?php include 'head.php'; ?>
    <article>
       <?php foreach($articles as $item){ ?>
        <div class="article">
            <div class="titleimg inner-article">
                <div>
                    <div class="deleteform">
                    <?php if($item['usericon']['author'] == $_SESSION['author'] ){ #로그인 된 사용자의 글에만 삭제버튼이 출력 ?>
                    <form>
                        <input class="delete" type="hidden" name="article-id" value="<?= $item['id']; ?>" />  
                        <button class="deletebtn" type="submit" formmethod="POST" 
                                formaction="deleteArticleProcess.php?author=<?= $_SESSION['author']; ?>">
                        <img class="delete" src="img/icon/delete.png" /></button>
                    </form>
                    <?php } ?>
                    </div>
                    <a href="profile.php?author=<?= $item['usericon']['author'] ?>">
                        <img src="<?php if(!empty($item['usericon']['usericon'])){
                                    echo htmlspecialchars($item['usericon']['usericon']);
                                        } else { echo 'img/noimage.jpg'; }  ?>">
                        <sapn class="author"><?= htmlspecialchars($item['usericon']['author']); ?></sapn>
                    </a>
                </div>
            </div>
            <div class="mainimg">
                <img src="<?= htmlspecialchars($item['src']['src']); ?>">
            </div>
            <div class="inner-article">
                <div class="imgbtn">
                <?php $isLike =  true;
                foreach($item['like'] as $likeList){ 
                    if($_SESSION['id'] == $likeList['users_id']){ #배열안에 사용자명이 있는지. 있다면 true.
                        $isLike = false;
                    } else {
                        $isLike = true;
                    }
                }
                if($isLike){  ?>
                    <form class="like">
                        <input type="hidden" name="likeid" value="<?= $item['id']; ?>" />
                        <button class="like-btn" formmethod="POST" name="like" 
                        value="<?= $_SESSION['id'] ?>" formaction="likeProcess.php?author=<?= $_SESSION['author'] ?>">
                        <img src="img/icon/iconarticle01.png"></button>
                    </form>
                <?php } else { ?>
                    <form class="like">
                        <input type="hidden" name="likeid" value="<?= $item['id']; ?>" />
                        <button class="like-btn" formmethod="POST" name="unlike" 
                        value="<?= $_SESSION['id'] ?>" formaction="unlikeProcess.php?author=<?= $_SESSION['author'] ?>">
                        <img src="img/icon/iconarticle04.png"></button>
                    </form>
                <?php } ?>
                </div>
                <div class="articleparam">
                    <p class="like">
                        <?= htmlspecialchars('좋아요 '.count($item['like']).'개'); ?>
                    </p>
                    <p class="articles">
                       <a href="profile.php?author=<?= $item['usericon']['author'] ?>">
                            <span class="userid"><?= htmlspecialchars($item['usericon']['author']); ?></span>
                        </a>
                        <?= htmlspecialchars($item['article']); ?>
                    </p>
                     <p class="datetime"><?= htmlspecialchars($item['date']); ?></p> 
                     <hr style="margin:0 0 15px 0">
                     <p class="comment">Comment (댓글)</p>
                     <p>
                        <?php if($item['comments']){ # comment 존재 여부. 
                             foreach($item['comments'] as $commentList){ ?>
                             <p class="comment-out">
                                 <a href='profile.php?author=<?= $commentList['author'] ?>'>
                                 <span class="comment-author"><?= htmlspecialchars($commentList['author']); ?></span></a>
                                 <span><?= htmlspecialchars($commentList['comment']); ?><br></span>
                             </p>
                         <?php }
                         } else { echo "<p class='comment-author'>댓글이 없습니다.</p>"; } ?>
                     </p>
                </div>
            </div>
            <hr>
            <form class="commentform">
                <input class="comment" type="text" name="comment" placeholder="댓글달기" />
                <input class="comment" type="hidden" name="article-id" value="<?= $item['id']; ?>" />  
                <button class="commentbtn" type="submit" formmethod="POST" formaction="commentProcess.php">
                <img class="commentbtn" src="img/icon/iconarticle03.png" /></button>
            </form>
        </div>
        <?php } ?>

        <div class="page">
            <nav>
                <ul>
                    <li class="page-item"><a class="page-link" href="main.php?page=1">처음으로</a></li>
                    <li class="page-item"><a class="page-link" href="main.php?page=<?= $Startpage - 1 ?>">이전</a></li>
                    <?php for ($p = $Startpage; $p <= $Endpage; $p++) { ?>
                        <li class="page-item"><a class="page-link" href="main.php?page=<?=$p?>"><?=$p?></a></li>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="main.php?page=<?= $Endpage + 1 ?>">다음</a></li>
                    <li class="page-item"><a class="page-link" href="main.php?page=<?= $pageNum ?>">끝으로</a></li>
                </ul>
            </nav>
            <p>-<?= $page ?> 페이지-</p>                                             
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