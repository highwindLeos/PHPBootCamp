<?php
namespace DatabaseModel; #네임스페이스를 정의.

class UpdateModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function UsersIconUpload() {

        $updateSql = "UPDATE users SET usericon = :usericon WHERE author = :author;";
        
        $hostPath = realpath('./'); #현제 컴퓨터의 Server host 경로상의 실제 디렉토리 값을 반환.
            
        ini_set("display_errors", "1"); #PHP ini setting.
        $uploaddir = $hostPath.'\img\icon\user\\'; # Host path + Articles image files Path.
        $uploadfile = $uploaddir.basename($_FILES['icon_uploads']['name']); 
        #basename(); form 에 name 속성 대한 값으로 넘겨준다.
        
        if (move_uploaded_file($_FILES['icon_uploads']['tmp_name'], $uploadfile)) { 
            #move_uploaded_file(); 최초 업로드시 temp 디렉토리에 임시 저장. 두번째 인자값으로 들어오는 경로로 이동시킴.
            echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
        } else {
            echo "FileUpload Faild!!\n";
        }
        
        $src = 'img/icon/user/'.$_FILES['icon_uploads']['name']; #저장되는 파일의 파일명 (DB 저장될 문자열)
        $loginer = trim($_SESSION['author']);
           
        $stmt = $this->db->prepare($updateSql);
        $stmt->bindParam(':usericon', $src);
        $stmt->bindParam(':author', $loginer);

        $stmt->execute(); # 쿼리 실행
    }
    
}

?>
   

   