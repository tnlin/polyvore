<!DOCTYPE html>
<html lang="zh-tw">
<?php include '_head.php';?>
<body>
<div class="container">
<div class="row">
	<?php
	   include 'database.php';
	   $pdo = Database::connect();
	   $sql = 'SELECT id,image FROM canvas ORDER BY id DESC';
	   $q = $pdo->prepare($sql);
	   $q->execute();
	   foreach ($q as $row) {
		echo '<div class="col-lg-3">';
		echo '	<div class=thumbnail>';
		echo '		<img src="'.$row['image'].'" width="200" height="200"></img>'; 
		echo '		<div class=caption>';
		echo '			<h3>'.$row['id'].'</h3>';
		echo '			<label class="label label-info">'.$row['image'].'</label>';
		echo '		</div>';
		echo '	</div>';
		echo '</div>';
	   }
	   Database::disconnect();
	?>
</div><!--row-->
</div><!--container-->

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>

<script>
 
</script>
</html>
