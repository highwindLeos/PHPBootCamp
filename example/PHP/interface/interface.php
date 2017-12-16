<?php

$file = new SplFileObject('data.txt');

class MyFileObject extends SplFileObject{ #상속
    function getContents(){
       $contents  = $this->fread($this->getSize()); #파일을 읽어서 사이즈를 구하라.
       $this->rewind(); #파일의 포인어 위치를 다시 돌려준다.
       return $contents;
    }
}

$file = new MyFileObject('data.txt');

print_r($file->getContents());

print_r($file->getContents());

print_r($file->getContents());

?>