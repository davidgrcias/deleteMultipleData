<?php
require 'connection.php';
if(isset($_POST["delete"]) && isset($_POST["deleteId"])){
  foreach($_POST["deleteId"] as $deleteId){
    $delete = "DELETE FROM tb_data WHERE id = $deleteId";
    mysqli_query($conn, $delete);
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Multiple Data</title>
  </head>
  <body>
    <table border = 1 cellpadding = 8 cellspacing = 0>
      <form class="" action="" method="post">
        <tr>
          <td> <button type="submit" name="delete">Delete</button> </td>
          <td>#</td>
          <td>Name</td>
          <td>Age</td>
        </tr>
        <?php
        $rows = mysqli_query($conn, "SELECT * FROM tb_data");
        $i = 1;
        foreach($rows as $row) :
        ?>
        <tr>
          <td align = center> <input type="checkbox" name="deleteId[]" value="<?php echo $row['id']; ?>"> </td>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["age"]; ?></td>
        </tr>
        <?php endforeach; ?>
      </form>
    </table>
  </body>
</html>
