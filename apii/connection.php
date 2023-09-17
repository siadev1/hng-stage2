<?php


try{
    //db connection details
    $host="containers-us-west-53.railway.app";
    $dbname="railway";
    $user="root";
    $pass="gbPzxssn7aEWvkmss3QO";
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo  $e->getMessage();
  }

?>
