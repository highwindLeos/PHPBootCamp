<?php
namespace DatabaseModel; #네임스페이스를 정의.

class DeleteModel
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
        
        $deleteSql = "DELETE articles, pictures FROM articles, pictures
                      WHERE articles.id= :article_id AND pictures.id = :article_id";
        
        $stmt = $this->db->prepare($deleteSql);
        $stmt->bindParam(':article_id', $articleId);

        $stmt->execute(); # 쿼리 실행
    }

    public function DeleteLikesByUsersId($loginerid, $articleId){
        
        $deleteSql = "DELETE FROM likes WHERE users_id = :users_id AND articles_id = :articles_id";
        
        $stmt = $this->db->prepare($deleteSql);
        $stmt->bindParam(':users_id', $loginerid);
        $stmt->bindParam(':articles_id', $articleId);

        $stmt->execute(); # 쿼리 실행
    }
}

?>