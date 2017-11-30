<?php include 'head.php'; ?>
    <article id="article">
       <div class="top-article">
            <a href="#open2"><img class="profile-img" src="<?= ($list['usericon']) ? $list['usericon'] : 'img/noimage.jpg'; ?>"> </a><!-- 삼항 연산자 : 조건 ? true : false -->
            <div class="info">
                <div><h2><?= $list['author'] ?></h2></div>
                <div><a href="#"><img class="button" src="img/profile/profile2.png"></a></div>
                <div><a href="#open1"><img class="setting" src="img/profile/profile3.png"></a></div>
            </div>
            <div class="count">
                <div>
                    <a href="main.php"><span>게시물 <?= count($pitures); ?></span></a>
                </div>
                <div>
                    <a href="followerList.php?author=<?= $list['author'] ?>"><span>팔로워 <?= count($followers); ?></span></a>
                </div>
                <div>
                    <a href="followingList.php?author=<?= $list['author'] ?>"><span>팔로우 <?= count($followings); ?></span></a>
                </div>
                <div>
                    <?php if($list['author'] != $_SESSION['author']){ #현제 로그인된 사용자라면 버튼을 출력하지 않기. ?>
                        <?php $isFollowing =  true; 
                            foreach($followers as $item){ 
                                if(array_search($_SESSION['author'], $item)){ #배열안에 사용자명이 있는지. 있다면 true.
                                    $isFollowing = false;
                                    break; #사용자 명이 있으면 false 를 대입하고 빠져나옴.
                                } else {
                                    $isFollowing = true;
                                }
                            }
                            if($isFollowing){  
                        ?>
                            <form class="follow">
                                <input type="hidden" name="followUser" value="<?= $list['id']; ?>" />
                                <button class="follow-btn" formmethod="POST" name="follow" 
                                value="<?= $_SESSION['author'] ?>" formaction="followProcess.php?author=<?= $list['author'] ?>">
                                <?= $list['author'] ?> 팔로우</button>
                            </form>
                        <?php } else { ?>
                            <form class="follow">
                                <input type="hidden" name="followUser" value="<?= $list['id']; ?>" />
                                <button class="follow-btn" formmethod="POST" name="unfollow" 
                                value="<?= $_SESSION['author'] ?>" formaction="unfollowProcess.php?author=<?= $list['author'] ?>">
                                <?= $list['author'] ?> 팔로우 중</button>
                            </form>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            
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
    <?php include 'profileViewModal.php'; ?>
</body>
</html>