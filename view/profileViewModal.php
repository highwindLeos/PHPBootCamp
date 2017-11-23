<!-- Modal popup 1-->
    <div class="modal_content" id="open1">
        <div>
            <p class="modalcontent">비밀번호 변경</p>
            <p class="modalcontent">허가된 앱</p>
            <p class="modalcontent">알 림</p>
            <a href="logoutProcess.php"><p class="modalcontent">로그 아웃</p></a>
            <a href="#close"><p class="modalcontent">취소</p></a>
        </div>
    </div>
<!-- Modal popup 2-->
    <div class="modal_content" id="open2">
        <div class="modal">
            <p class="modalcontent">현제 사진 삭제</p>
            <p class="modalcontent btn">
                <form class="modalform" action="iconUploadProcess.php" method="POST" enctype="multipart/form-data">
                    <button class="replace">사용자 아이콘 업로드</button>   
                    <input type="file" class="upload" name="icon_uploads" accept=".jpg, .jpeg, .png" multiple>
                    <input type="submit" class="submit" value="아이콘전송" >
                </form>
            </p>
            <a href="#close"><p class="modalcontent">취소</p></a>
        </div>
    </div>