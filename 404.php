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
<h1 class = "mt-5 pt-5">Its Empty Hear</h1>
<p> Looks like this page can't be found. Maybe it was moved or renamed</p>
<a href="main.php" class="btn btn-outline-secondary">Back to Home</a>
</div>
<div class="col">
<img src="/img/404.png" alt="404 error" style="width: 600px;">

</div>
</div>

</main>


<?php 
include_once "shared/footer.php";
?>