<?php
class deleteModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    
    public function DeleteFollowsByUsersId($followUser, $loginerid){
        
        $deleteSql = "DELETE FROM follows WHERE follow = :follow AND users_id = :users_id";
        
        $followUser = trim($_POST['followUser']); #팔로우 하고 있는 사용자 id. 
        $loginerid = trim($_SESSION['id']); #팔로우 하는 사용자의 id. 

        $stmt = $this->db->prepare($deleteSql);
        $stmt->bindParam(':follow', $followUser);
        $stmt->bindParam(':users_id', $loginerid);

        $stmt->execute(); # 쿼리 실행
    }
}

?>