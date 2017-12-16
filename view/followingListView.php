<?php include 'head.php'; ?>
   <article>
        <div class="article">
            <div class="article-write">
                <a href="main.php">
                    <img src="img/logo.png">
                </a>
                    <h3>팔로우 리스트 (Following List)</h3></br>
                    <img class="profile-icon" src="<?= $usericon['usericon'] ?>">
                    <h4><?= htmlspecialchars($_GET['author']); ?> Following</h4>
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
<?php include 'footer.php'; ?>