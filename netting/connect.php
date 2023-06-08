<?php
ob_start();
session_start();
        try {
         $db = new PDO("mysql:host=localhost;dbname=pnr;charset=utf8", "root", "");
        } catch (PDOException $e) {
         print $e->getMessage();
        }


?>