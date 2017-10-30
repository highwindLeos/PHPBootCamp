<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><?= date('Y-m-d H:i:s').' (24시간)</br>'?></h3>

    <h3><?= date("Y-m-d h:i:sa").' (12시간)'?></h3>

    <script> 
        window.setTimeout('window.location.reload()',1000); //1초마다 새로고침   
    </script>
</body>
</html>
