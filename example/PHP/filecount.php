<?php # 디렉토리에 있는 파일과 디렉토리의 갯수 구하기
$result = opendir("img/image"); #opendir함수를 이용해서 디렉토리의 핸들을 얻어옴
while($file = readdir($result)) { # readdir함수를 이용해서 디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
   if($file=="." || $file=="..") {continue;} # file명이 "." (또는 ||) ".." 이면 무시함

   $fileInfo = pathinfo($file); #pathinfo() 파일 경로의 정보를 가져온다. 
   $fileExt = $fileInfo['extension']; # 파일의 확장자를 구함

   if (empty($fileExt)){
      $dir_count++; # 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
   } else {
      $file_count++; # 파일에 확장자가 있으면 file_count를 증가시킴
   }
 }
?>