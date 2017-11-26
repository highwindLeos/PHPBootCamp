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
        
        $stmt = $this->db->prepare($deleteSql);
        $stmt->bindParam(':follow', $followUser);
        $stmt->bindParam(':users_id', $loginerid);

        $stmt->execute(); # 쿼리 실행
    }
}

?>