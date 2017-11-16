<?php include 'head.php'; ?>

    <article>
        <div class="article">
            <div class="article-write">
                <a href="#">
                    <img src="img/logo.png">
                    <h3>글쓰기 Write content</h3>
                </a>
            </div>
            <hr>
            <div class="form">
                <form class="article-write">
                    <label for="image_uploads"> 업로드 할 이미지 파일을 선택해주세요.(PNG, JPG)</label>
                    <input type="file" class="fileupload" name="image_uploads" accept=".jpg, .jpeg, .png" multiple>
                    <textarea class="article-input" name="article" placeholder="내용을 입력하세요." ></textarea>
                    <button class="submit-btn" type="submit" formmethod="POST" formaction="writeProcess.php">
                        <img src="img/writebtn.png" alt="보내기">
                    </button>
                    <button class="submit-btn" type="submit" formmethod="POST" formaction="main.php">
                        <img src="img/canclebtn.png" alt="보내기">
                    </button>
                </form>
            </div>
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