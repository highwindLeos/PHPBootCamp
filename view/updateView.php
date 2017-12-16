<?php include 'head.php'; ?>

    <article>
        <div class="article">
            <div class="article-write">
                <a href="main.php">
                    <img src="img/logo.png">
                </a>
                <h3>글 수정 (Modify content)</h3>
                <hr>
                <h3>현제 수정 할 내용</h3>
                <div class="modify-picture"><img src="<?= $_SESSION['modifypicture']['src'] ?>"></div>
            </div>
            <hr>
            <div class="form">
                <form class="article-write" enctype="multipart/form-data">
                    <label for="image_uploads"> 수정 업로드 할 이미지 파일을 선택해주세요.(PNG, JPG)</label>
                    <input type="file" class="fileupload" name="image_uploads" accept=".jpg, .jpeg, .png" multiple>
                    <p class="validate"><?php if(isset($_SESSION['picture'])) echo $_SESSION['picture'];
                        unset($_SESSION['picture']) ?></p>
                    <textarea class="article-input" name="article" placeholder="현제 글 내용 : <?= $_SESSION['modifyarticle']['article'] ?>" ></textarea>
                    <p class="validate"><?php if(isset($_SESSION['article'])) echo $_SESSION['article'];
                        unset($_SESSION['article']) ?></p>
                    <input type="hidden" class="articleid" name="articleid" value="<?= $articleid ?>">
                    <button class="submit-btn" type="submit" formmethod="POST" 
                            formaction="updateProcess.php?author=<?= $_SESSION['author'] ?>&articleid=<?= $articleId ?>">
                        <img src="img/writebtn.png" alt="보내기">
                    </button>
                    <button class="submit-btn" type="submit" formmethod="POST" formaction="updateProcess.php?name=cancle">
                        <img src="img/canclebtn.png" alt="보내기">
                    </button>
                </form>
            </div>
        </div>   
    </article>

<?php include 'footer.php'; ?>