<?php
session_start();
require 'model/loginModel.php';
require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            die($e->getMessage());
        }

    #필터링.

    $article = filter_input(INPUT_POST, 'article', FILTER_DEFAULT); 


?>