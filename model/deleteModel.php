<?php
class deleteModel
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    
    public function DeleteFollowsByUsersId($follow, $users_id){
        
        $deleteSql = "DELETE FROM follows WHERE users_id = :users_id AND follow = :follow";
        
        $follow = trim($_POST['followUser']); #팔로우 하는 사용자. 
        $users_id = trim($_SESSION['id']); #팔로우 하는 사용자의 id. 

        $stmt = $this->db->prepare($deleteSql);
        $stmt->bindParam(':follow', $follow);
        $stmt->bindParam(':users_id', $users_id);

        $stmt->execute(); # 쿼리 실행
    }
}

?>