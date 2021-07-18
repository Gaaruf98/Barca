<?php 
require_once 'database.php';
$conn = db_connect();
?>

<?php 
include_once "shared/top.php";
//if                      
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // --- use same forms fileds as before 
    // save form inputs data 
  $firstName = trim(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
  $lastName= trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
 $position = trim(filter_var($_POST['position'], FILTER_SANITIZE_STRING));
 $number = trim(filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT));
 $id = trim(filter_var($_POST['fcb_id'],FILTER_SANITIZE_URL));
// --- run the update 
try {
    $sql = "UPDATE fcb SET firstName =:firstName, ";
     $sql .= "lastName=:lastName, position=:position,number=:number "; 
     $sql .="WHERE fcb_id=:id";     
     //command object
$cmd= $conn->prepare($sql);
$cmd -> bindParam(':firstName',$firstName, PDO::PARAM_STR,20);
$cmd -> bindParam(':lastName',$lastName, PDO::PARAM_STR,20);
$cmd -> bindParam(':position',$position, PDO::PARAM_STR, 32);
$cmd -> bindParam(':number',$number, PDO::PARAM_INT);
$cmd -> bindParam(':id',$id, PDO:: PARAM_INT);

// execute the command
$cmd -> execute();
// --- redirect to fcb.php
header("Location: fcb.php");
} catch (PDOException $e){
  header("Location: error.php");
}
// if (Get)
else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // --- get id from url
    $id = filter_var($_GET['fcb_id'], FILTER_SANITIZE_NUMBER_INT);
    
     $sql = "SELECT * FROM fcb WHERE fcb_id=" . $id;
     // ---query db for 1 record 
     $barca = db_queryOne($sql,$conn);
    // --- pre -populate fields 
     $firstName = $barca['firstName'];
     $lastName = $barca['lastName'];
     $position = $barca['position'];
     $number = $barca['number'];
}
    
?>
 <h1 class="text-center mt-5"> Edit your Player </i></h1>


<div class="row mt-5 justify-content-center ">

<form class="col-6 mt-5" action="barca-edit.php" method="post" >
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="first-Name">First Name</label>
<div class="col-10">
<input required class="form-control form-control-lg" type="text" name="firstName" value = "<?php echo $firstName; ?>">
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="lastNmae">LastName</label>
<div class="col-10">
<input required class="form-control form-control-lg" type="text" name="lastName" value = "<?php echo $lastName; ?>">
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="position">Position</label>
<div class="col-10">
<select name="position" id="" class = "form-select form=select-lg">

<?php 
$sql = "SELECT position FROM positions ORDER BY position";
$positions = db_queryAll($sql,$conn);
foreach($positions as $eachposition) {
  echo "<option " .(($eachposition ["position"] == strtolower($position)) ? 'selected' : '') ." value = " . $eachposition["position"] . ">" . ucfirst($eachposition["position"]) . "</option>"; 

}
?>
</select>
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="number">Number</label>
<div class="col-10">
<input required class="form-control form-control-lg" pattern ="[0-9]{2}"class="form-control form-control-lg" type="text" name="number" value= "<?php echo $number; ?>">
</div>
</div>

<div class="d-grid">
<input readonly class="form-control form-control-lg" type="hidden" name="fcb_id" value="<?php echo $id; ?>">
<button class="btn btn-success btn-lg"> Update Your Profile </button>
</div>
</form>
</div>
<?php 
include_once "shared/footer.php";
?>