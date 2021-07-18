<?php 
require_once 'database.php';
$conn = db_connect();
?>

<?php 
// save form inputs data 
$firstName = trim(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
$lastName= trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
$position = trim($_POST['position']);
$number = trim(filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT));
$is_form_valid = true;
if (empty(trim($firstName))) {
    echo" Please Enter First Name";
    $is_form_valid = false;  
}
if (empty(trim($lastName))) {
    echo" Please Enter Last Name";
    $is_form_valid = false;  
}
if (empty(trim($position))) {
    echo" Please Enter position ";
    $is_form_valid = false;  
}
if (empty(trim($number))) {
    echo" Please Enter number";
    $is_form_valid = false;  
}
$number_regex =  "/[0-9]{2}/";
if ($number < 0 || strlen($number) != 2 || !preg_match($number_regex,$number)){
echo " Invalid number";
$is_form_valid = false;
}
if ($is_form_valid){


require 'db.php';
try{
//setup the sql insert command
$sql = "INSERT INTO fcb (firstName,lastName,position,number) VALUES (:firstName, :lastName, :position, :number)";

//command object
$cmd= $conn->prepare($sql);
$cmd -> bindParam(':firstName',$firstName, PDO::PARAM_STR,20);
$cmd -> bindParam(':lastName',$lastName, PDO::PARAM_STR,20);
$cmd -> bindParam(':position',$position, PDO::PARAM_STR, 32);
$cmd -> bindParam(':number',$number, PDO::PARAM_INT);

// execute the command
$cmd -> execute();

//disconnect  from the database
$conn =null;
} catch (Exception $e) {
    header("Location: error.php");
    
    }
//show message that
echo "Barca Save?";
}

?>