<?php include 'head.php'; ?>
    <article>
        <div class="article">
            <div class="article-write">
                <a href="main.php">
                    <img src="img/logo.png">
                </a>
                <h3>글쓰기 (Write content)</h3>
            </div>
            <hr>
            <div class="form">
                <form class="article-write" enctype="multipart/form-data">
                    <label for="image_uploads"> 업로드 할 이미지 파일을 선택해주세요.(PNG, JPG)</label>
                    <input type="file" class="fileupload" name="image_uploads" accept=".jpg, .jpeg, .png" multiple>
                    <p class="validate"><?php if(isset($_SESSION['picture'])) echo $_SESSION['picture'];
                        unset($_SESSION['picture']) ?></p>
                    <textarea class="article-input" name="article" placeholder="내용을 입력하세요." ></textarea>
                    <p class="validate"><?php if(isset($_SESSION['article'])) echo $_SESSION['article'];
                        unset($_SESSION['article']) ?></p>
                    <button class="submit-btn" type="submit" formmethod="POST" formaction="writeProcess.php">
                        <img src="img/writebtn.png" alt="보내기">
                    </button>
                    <button class="submit-btn" type="submit" formmethod="POST" formaction="writeProcess.php?name=cancle">
                        <img src="img/canclebtn.png" alt="보내기">
                    </button>
                </form>
            </div>
        </div>   
    </article>  
<?php include 'footer.php'; ?>