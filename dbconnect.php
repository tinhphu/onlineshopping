<?php
function connectDB()
 {
    $hn = "localhost";
    $user = "root";
    $pw = "";
    $db = "computer";
    $conn = new mysqli($hn, $user, $pw, $db) or die("Fail");
 
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  } 
  return $conn;
}

  $hn = "localhost";
  $user = "root";
  $pw = "";
  $db = "computer";

    try{
      $db=new PDO("mysql:host={$hn};dbname={$db}",$user,$pw);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOEXCEPTION $e){
      $e->getMessage();
    }
?>