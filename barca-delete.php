<?php 

require_once 'database.php';

$conn = db_connect();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
$id = filter_var($_GET['fcb_id'], FILTER_SANITIZE_NUMBER_INT);

 $sql = "SELECT * FROM fcb WHERE fcb_id=" . $id;
 $barca = db_queryOne($sql,$conn);

 $firstName = $barca['firstName'];
 $lastName= $barca['lastName'];
 $position = $barca['position'];
 $number = $barca['number'];

   include_once 'shared/top.php';
   ?>
      <h1 class="text-center mt-5 display-1 text-warning">  <i class="bi bi-x-circle"></i></h1>
   <h1 class="text-center mt-5"> Are You sure want to delete <i class="bi bi-joystick"></i></h1>

   <div class="row mt-5 justify-content-center ">

<form class="col-6 mt-5" action="barca-delete.php" method="post" >
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="first-Name">First Name</label>
<div class="col-10">
<input readonly class="form-control form-control-lg" type="text" name="firstName" value="<?php echo $firstName; ?>">
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="lastNmae">LastName</label>
<div class="col-10">
<input readonly class="form-control form-control-lg" type="text" name="lastName" value="<?php echo $lastName; ?>">
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="position">Position</label>
<div class="col-10">
<input readonly class="form-control form-control-lg" type="text" name="position" value="<?php echo $position; ?>">

</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="number">Number</label>
<div class="col-10">
<input readonly class="form-control form-control-lg" type="text" name="number" value="<?php echo $number; ?>">
</div>
</div>

<div class="d-grid">
<input readonly class="form-control form-control-lg" type="hidden" name="fcb_id" value="<?php echo $id; ?>">
<button class="btn btn-danger btn-lg"> Delete for ever</button>
</div>
</form>
</div>
<?php 
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $id = filter_var($_POST['fcb_id'], FILTER_SANITIZE_NUMBER_INT);
  echo "id is $id";

$sql = "DELETE FROM fcb WHERE fcb_id =" .$id;

$cmd = $conn->prepare($sql);
$cmd -> execute();

header("Location: fcb.php");

}



?>

