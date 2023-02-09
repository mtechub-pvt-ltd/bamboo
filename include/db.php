<?php
session_start();
$server = 'localhost';
$username ='bambooUser';
$password ='mtechub123';
$db='bamboo';
$conn =mysqli_connect($server,$username,$password,$db);
 if(!$conn) {
     echo 'error';
 }
 else {
        // echo 'connected';
 }


    ?>
