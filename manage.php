
<!DOCTYPE html>
<html lang="zh-tw">
<?php include '_head.php';?>
<body>
<div class="container">
<div class="row">
           <table class="table table-striped table-bordered">
             <tbody>
                     <?php
                           include 'database.php';
                           $pdo = Database::connect();
                           $sql = 'SELECT * FROM product ORDER BY id DESC';
                           $q = $pdo->prepare($sql);
                           $q->execute();
                           foreach ($q as $row) {
                            echo '<tr>';
                            echo '<td><image src='.$row['fileName'].' width="50" height="50"></image></td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['productName'] . '</td>';
                            echo '<td>'. $row['descript'] . '</td>';
                            echo '<td>'. $row['url'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Modify</a> ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a> ';
                            echo '</td>';
                            echo '</tr>';
                           }
                           Database::disconnect();
                        ?>
              </tbody>
	    </table>
</div><!--row-->
</div><!--container-->
<body>
<html>
