<?php
ob_start();
session_start();


        try {
         $db = new PDO("mysql:host=localhost;dbname=mysv00.1;charset=utf8", "root", "");
        } catch (PDOException $e) {
         print $e->getMessage();
        }


?>