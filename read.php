<?php
        require 'database.php';
        $id = null;
        if ( !empty($_GET['id'])) {
                $id = $_REQUEST['id'];
        }

        if ( null==$id ) {
                header("Location: index.php");
        } else {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM canvas where id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
		#get data
		$json = $data['json'];
		$image= $data['image'];
		$id   = $data['id'];
                Database::disconnect();
        }
?>

<!DOCTYPE html>
<html lang="zh-tw">
<?php include('_head.php'); ?>

<body>
    <div class="container">
	<div class="row">
                <h3>Product detail</h3>
		<div class="col-lg-6">
			<?php
				echo '  <div class="thumbnail">';
				echo '          <img src="'.$image.'"></img> ';
				echo '          <div class="caption">';
				echo '                  <h3>'.$id.'</h3>';
				echo '                  <label class="label label-info">'.$image.'</label>';
				echo '          </div>';
				echo '  </div>';
			?>
		</div>
		<div class="col-lg-6">
	<?php
		#conect db
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		#parse json
		$jsonIterator = new RecursiveIteratorIterator(
		new RecursiveArrayIterator(json_decode($json, TRUE)),
		RecursiveIteratorIterator::SELF_FIRST);
		foreach ($jsonIterator as $key => $val) {
		 if($key == "src" && $key != "0" ){
			$patten = '/upload.*/';
			#use regex to get $image to query product info
			preg_match($patten, $val, $results);
			#sql query
			$sql = "SELECT * FROM product where filename = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($results[0]));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			echo '<div class="col-lg-6">';
			echo '	<a href="'.$data['url'].'"><img src="'.$val.'" class="img-responsive" style="max-height:150px;"></img></a>';
			echo '</div>';
			echo '<div class="col-lg-6">';
			echo '	<h3>'.$data['productName'].'</h3>';
			echo '	<p>'.$data['descript'].'</p><br>';
			echo '	<a href="'.$data['url'].'"><button class="btn btn-xs btn-danger">Buy now</button></a><hr>';
			echo '</div>';
		 }
		}
		Database::disconnect();
	?>
		</div>
	</div>
    </div> <!-- /container -->
  </body>
</html>

