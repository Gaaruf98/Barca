<?php 
require_once 'database.php';
$conn = db_connect();
?>
<?php  
include_once "shared/top.php";
?>
 <h1 class="text-center mt-5"> Add New Player </i></h1>


<div class="row mt-5 justify-content-center ">

<form class="col-6 mt-5" action="save-barca.php" method="post" >
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="first-Name">First Name</label>
<div class="col-10">
<input required class="form-control form-control-lg" type="text" name="firstName">
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="lastNmae">LastName</label>
<div class="col-10">
<input class="form-control form-control-lg" type="text" name="lastName">
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="position">Position</label>
<div class="col-10">
<select name="position" id="" class = "form-select form=select-lg">

<?php 
$sql = "SELECT position FROM positions ORDER BY position";
$positions = db_queryAll($sql,$conn);
foreach($positions as $position) {
  echo "<option value= ".$position["position"] .">".ucfirst($position["position"])."</option>";
}
?>
</select>
</div>
</div>
<div class="row mb-4 ">
<label class="col-2 col-form-label fs-4" for="number">Number</label>
<div class="col-10">
<input pattern ="[0-9]{2}"class="form-control form-control-lg" type="text" name="number">
</div>
</div>

<div class="d-grid">
<button class="btn btn-success btn-lg"> submit </button>
</div>
</form>
</div>
<?php 
include_once "shared/footer.php";
?>