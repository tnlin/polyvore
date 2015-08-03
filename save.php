<?php 
 require 'database.php';
 if ( !empty($_POST)) {
	$json = $_POST['json'];
	$img = $_POST['imgBase64'];
	#save pngi
	define('UPLOAD_DIR', 'images/');
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . uniqid() . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';
	#json
	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="INSERT INTO canvas(json,image) VALUES (?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($json,$file));
        Database::disconnect();

	echo("Post success");
 }else{
	echo("Empty,GG:"+$_POST['json']);
  }
?>
