<?php
session_start();
require 'config/config.php';
require 'model/profileModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $author = filter_var($_GET['author'], FILTER_DEFAULT); # users_id.

    $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
    $list = $profilemodel->getFollowersIconByAuthor($author);


require 'view/followerListView.php';
?>