<?php  
require_once 'db_cred.php';

function db_queryAll($sql,$conn){
    try{
    $cmd = $conn->prepare($sql);
    $cmd -> execute();
    $fcb= $cmd->fetchAll();
   
    return $fcb;
}catch (Exception $e) {
    header("Location:error.php");
}
}

function db_queryOne($sql,$conn){
    try{
    $cmd = $conn->prepare($sql);
    $cmd -> execute();
    $fcb = $cmd->fetch();
   
    return $fcb;
}
catch (Exception $e){
    header("Location: error.php");

  }
}
function db_connect(){
    $conn = new PDO('mysql:host='. DB_SERVER .';dbname='. DB_NAME, DB_USER , DB_PASS);
      return $conn;
}
function db_disconnect($conn){
    if(isset($conn)){
// disconnect
$conn = null;

    }


    }



?>