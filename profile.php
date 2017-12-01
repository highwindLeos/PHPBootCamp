<?php
session_start();
require 'model/profileModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $profilemodel = new profileModel($db);

    # filter_var 와 filter_input 의 차이점 과 필터의 종류의 대하여 학습
    $author = filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING); 
    $loginer = $_SESSION['author'];
    
    #Pageing Variable.
    $picture = $profilemodel->getPictureCountByAuthor($author); #행의 갯수를 구하는 함수.
    
    $pageGet = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING); 
    $page = ($pageGet) ? $pageGet : 1; #삼항 연산자를 통한 if 문. (페이지 값이 없을경우 기본 값은 1 false).
    $pictureCnt = $picture[0][0];  #Pictures 의 행 의 수를 구한다.

    $pageList = 6; #한 페이지에 표시할 게시물 수 (LIMIT 의 입력값으로 들어감)
    $pageBlock = 2; #블록의 수 (각 페이지의 링크가 됨)

    $pageNum = ceil($pictureCnt / $pageList); # 총 페이지 수 (반올림 함수 이용 소수점을 올림한다.)
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
    
    $Selectpoint = ($page - 1) * $pageList;

    $followProfile = $profilemodel->getFollowingsByAuthor($author);

    if(!empty($author)) { # 쿼리스트링으로 사용자가 접근했다면. 
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author, $Selectpoint, $pageList);
        $followings = $profilemodel->getFollowingsByAuthor($author);
        $followers = $profilemodel->getFollowersByAuthor($author);
        
    } else {
        header("Location: profile.php?author=$loginer"); #리다이렉션 페이지 이동   
    } #방어적 프로그래밍(Defensive Programming) 이라는 주제를 학습.

include 'view/profileView.php';
?>