<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use DatabaseModel\articleModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
        
    $articlemodel = new articleModel($db);# 인스턴스를 만듭니다.

    # Session value variable.
    $email = $_SESSION['email']; #로그인한 사용자의 mail.
    $usersId = $_SESSION['id']; #로그인한 사용자의 Id.
        
    #Pageing Variable.
    $article = $articlemodel->getArticlesCount($usersId); #행의 갯수를 구하는 함수.

    $pageGet = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING); 
    $page = ($pageGet) ? $pageGet : 1; #삼항 연산자를 통한 if 문. (페이지 값이 없을경우 기본 값은 1 false).

    $articlecount = $article[0][0]; #Article 의 행 의 수를 구한다.

    $pageList = 10; #한 페이지에 표시할 게시물 수 (LIMIT 의 입력값으로 들어감)
    $pageBlock = 3; #블록의 수 (각 페이지의 링크가 됨)

    $pageNum = ceil($articlecount / $pageList); # 총 페이지 수 (반올림 함수 이용 소수점을 올림한다.)
    $blockNum = ceil($pageNum / $pageBlock); # 총 블록
    $nowBlock = ceil($page / $pageBlock); # 현제 블록

    $Startpage = ($nowBlock * $pageBlock) - ($pageBlock - 1); #시작 페이지.
    if ($Startpage <= 1) { # 시작 페이지가 1보다 작아지면 안되기 때문에 Startpage는 항상 1 이하일경우 1로 고정.
        $Startpage = 1; 
    }

    $Endpage = $nowBlock * $pageBlock; #종료 페이지. 현제 블록 * 페이지 블럭
    if ($pageNum <= $Endpage) { # 종료 페이지의 수가 페이지 수보다 커지면 종료페이지는 페이지수로 고정.
        $Endpage = $pageNum;
    }
    
    $Selectpoint = ($page - 1) * $pageList; #가져오는 데이터 

    $articles = $articlemodel->getArticles($Selectpoint, $pageList, $usersId);  #페이징. LIMIT 를 적용한 함수.

    for($i=0; $i < count($articles); $i++) { # $articles 의 수만큼 반복한다.(정수형 반환)

        #사용자 아이콘 + 사용자 별명: 데이터 베이스에 users내용의 users_id를 참고로 usericon + Author 컬럼을 가져온다.
        $articles[$i]['usericon'] = $articlemodel->getUserIcons($articles[$i]['users_id']);

        #메인 사진 : 데이터 베이스에 articles내용을 Id를 참고로 pictures table에 모든 컬럼을 가지고온다.
        $articles[$i]['src'] = $articlemodel->getPictures($articles[$i]['id']);

        #코멘트 갯수 : 데이터 베이스에 articles 내용의 Id를 참고로 코멘트 컬럼을 가지고온다.
        $articles[$i]['comments'] = $articlemodel->getComments($articles[$i]['id']);

        #좋아요 갯수 : 데이터 베이스에 articles 내용의 Id를 참고로 likes table에 like 컬럼을 가지고온다.
        $articles[$i]['like'] = $articlemodel->getLikeCnt($articles[$i]['id']);

    }

include 'view/mainView.php'; # 뷰를 가져온다.

?>