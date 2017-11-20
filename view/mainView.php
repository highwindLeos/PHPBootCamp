<?php include 'head.php'; ?>
   
    <article>
       <?php foreach($articles as $item){ #print_r($item) ?>
        <div class="article">
            <div class="titleimg inner-article">
                <a href="profile.php?author=<?= $item['usericon']['author'] ?>">
                    <img src="<?php if(!empty($item['usericon']['usericon'])){
                                   echo htmlspecialchars($item['usericon']['usericon']);
                            } else { echo 'img/noimage.jpg'; }  ?>">
                    <sapn class="author"><?= htmlspecialchars($item['usericon']['author']); ?></sapn>
                </a>
            </div>
            <div class="mainimg">
                <img src="<?= htmlspecialchars($item['src']['src']); ?>">
            </div>
            <div class="inner-article">
                <div class="imgbtn">
                    <a href="#"><img src="img/icon/iconarticle01.png"></a>
                    <a href="#"><img src="img/icon/iconarticle02.png"></a>
                </div>
                <div class="articleparam">
                    <p class="like"><?= htmlspecialchars($item['like']['like'].'개'); ?></p>
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
        <?php  } ?>
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
</body>
</html>