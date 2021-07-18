<?php 
require_once 'database.php';
$conn = db_connect();
?>
<?php 
include_once 'shared/top.php';
$sql = "SELECT * FROM fcb";
$fcb = db_queryAll($sql, $conn);

?>
<table class= "table table-dark table-sm">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Position</th>
      <th scope="col">Number</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
     
    </tr>
  </thead>
  <tbody>
 <?php foreach ($fcb as $barca){?>
    <tr>
      <th scope="row"><?php echo $barca['firstName'];?></th>
      <td><?php echo $barca['lastName'];?></td>
      <td><?php echo $barca['position'];?></td>
      <td><?php echo $barca['number'];?></a></td>
      <td><a href="barca-edit.php?fcb_id=<?php echo $barca['fcb_id'];?>"class="btn btn-secondary">Edit <i class="bi bi-pencil-square"></i></a></td>

      <td><a href="barca-delete.php?fcb_id=<?php echo $barca['fcb_id'];?>"class="btn btn-warning">Delete<i class="bi bi-trash"></i></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php

include_once 'shared/footer.php';





?>