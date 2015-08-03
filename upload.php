<!DOCTYPE html>
<html lang="zh-tw">
<?php include('_head.php'); ?>
<body>
<div class="container">
<div class="row">
   <form  class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
     <div class="col-lg-6 col-offset-2">
	<div class="form-group">
	    <label class="col-lg-2 control-label">商品名稱</label>
	    <div class="col-lg-10">
    	    	<input class="form-control" name="productName" placeholder="請輸入商品名稱">
	    </div>
	</div>
	<div class="form-group">
	    <label class="col-lg-2 control-label">介紹</label>
	    <div class="col-lg-10">
		<textarea class="form-control" name="descript" rows="3" placeholder="請輸入商品敘述"></textarea>
	    </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">網址</label>
	    <div class="col-lg-10">
	    	    <input type="url" name="url" class="form-control" placeholder="請輸入連結網址">
	    </div>
	</div>
	<div class="form-group">
	    <label class="col-lg-2 control-label">圖片</label>
	    <div class="col-lg-10">
		<span class="btn btn-primary btn-file">
	    		Browse<input type="file" name="fileToUpload" id="fileToUpload">
		</span>
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      	<button type="submit" name="submit" class="btn btn-default">上架</button>
	    </div>
	</div>
     </div>

     <div class="col-lg-4">
	    <img id="blah" src="http://placehold.it/200x200" />
      </div>
   </form>
</div>

<?php
if(isset($_POST["submit"])) {
$target_dir = "uploads/";
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$filename = md5(uniqid(rand()));
$extension = end($temp);
$target_file = $target_dir.$filename. '.' . $extension;
//echo $target_file . '<hr>';

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	require 'database.php';	
	$name = $_POST['productName'];
	$descript = $_POST['descript'];
	$url = $_POST['url'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO product(productName,fileName,descript,url) VALUES (?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$filename,$target_file,$url));
        Database::disconnect();

        echo '<div class="alert alert-info">The file' . basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.</div>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}//if isset($_POST["submit"])
?>


</div><!--Container-->
</body>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#fileToUpload").change(function(){
    readURL(this);
});

</script>

<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>



</html>
