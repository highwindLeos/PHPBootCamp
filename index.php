<?php
session_start();
    if(isset($_SESSION['is_login'])){ #변수가 설정되어 있다면 True
        header('Location: main.php');
        exit;
    }

$pageTitle = 'PHP BootCamp AnInstargram - '.basename(__FILE__, '.php'); #현제 페이지의 경로에서 파일명만 사용.
?>
<?php include 'view/indexView.php'; ?>
