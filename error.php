<?php 
require_once 'database.php';
$conn = db_connect();
?>
<?php  
include_once "shared/top.php";
?>
<main class="container">
<div class = "row">
<div class="col">
<h1 class = "mt-5 pt-5">We are Sorry !</h1>
<p> Something unexpected just happened. Our support team been notified and will get right on it </p>
<a href="main.php" class="btn btn-outline-secondary">Back to Home</a>
</div>
<div class="col">
<img src="./img/error.png" alt="Unexpected error" style="width: 600px;">

</div>
</div>

</main>


<?php 
include_once "shared/footer.php";
?>