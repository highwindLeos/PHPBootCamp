<h1>복수 인자 입력</h1>
<?php
function get_arguments($arg1, $arg2){
    return $arg1 + $arg2;
}
echo get_arguments(10, 20);
echo get_arguments(20, 30);
?>