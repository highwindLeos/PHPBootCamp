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

    public function DeleteArticlesById($articleId){
        
        $deleteSql = "DELETE anicoboard.articles, anicoboard.pictures FROM anicoboard.articles, anicoboard.pictures
                      WHERE articles.id= :article_id AND pictures.id = :article_id";
        
        $stmt = $this->db->prepare($deleteSql);
        $stmt->bindParam(':article_id', $articleId);

        $stmt->execute(); # 쿼리 실행
    }
}

?>