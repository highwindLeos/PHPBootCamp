<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use DatabaseModel\ProfileModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $author = filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING); # Author.

    $profilemodel = new ProfileModel($db);# 인스턴스를 만듭니다.
    $list = $profilemodel->getFollowersIconByAuthor($author);
    $usericon = $profilemodel->getUserIconByAuthor($author);

    $pageTitle = 'PHP BootCamp AnInstargram - '.basename(__FILE__, '.php');

include 'view/followerListView.php';
?>