<?php
class InsertModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function UploadImageAndArticleId()
    {
        $insertSql = "INSERT INTO pictures (src, articles_id) VALUES (:src, :articles_id)";
        
        $hostPath = realpath('./'); #현제 컴퓨터의 Server host 경로상의 실제 디렉토리 값을 반환.
            
        ini_set("display_errors", "1");
        $uploaddir = $hostPath.'\img\image\\';
        $uploadfile = $uploaddir.basename($_FILES['image_uploads']['name']); #basename(); form 에 name 속성 대한 값으로 넘겨준다.
        
        if (move_uploaded_file($_FILES['image_uploads']['tmp_name'], $uploadfile)) { 
            #move_uploaded_file(); 최초 업로드시 temp 디렉토리에 임시 저장. 두번째 인자값으로 들어오는 경로로 이동시킴.
            echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
        } else {
            echo "FileUpload Faild!!\n";
        }
        
        $src = 'img/image/'.$_FILES['image_uploads']['name']; #저장되는 파일의 경로명 (DB 저장될 이름)
        $articles_id = trim($_SESSION['id']); 
                       
        $stmt = $this->db->prepare($insertSql);
        $stmt->bindParam(':src', $src);
        $stmt->bindParam(':articles_id', $articles_id);

        $stmt->execute(); # 쿼리 실행
    }
    
    public function WriteArticles()
    {
        $insertSql = "INSERT INTO articles (article, date, users_id) VALUES (:article, now(), :users_id)"; 
        #now() 는 Mysql 함수. 입력되는 순간의 시간을 기록함.
        
        $article = trim($_POST['article']);
        $users_id = trim($_SESSION['id']); 

        $stmt = $this->db->prepare($insertSql);
        $stmt->bindParam(':article', $article);
        $stmt->bindParam(':users_id', $users_id);

        $stmt->execute(); # 쿼리 실행
    }
}

?>