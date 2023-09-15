<?php


try{
    //db connection details
    $host="localhost";
    $dbname="hngapi";
    $user="sia";
    $pass="Gentleboy652.com";
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo  $e->getMessage();
  }

?>