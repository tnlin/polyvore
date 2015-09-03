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
    	    	<input class="form-control" name="productName" placeholder="請輸入商品名稱" required>
	    </div>
	</div>
	<div class="form-group">
	    <label class="col-lg-2 control-label">介紹</label>
	    <div class="col-lg-10">
		<textarea class="form-control" name="descript" rows="3" placeholder="請輸入商品敘述" required></textarea>
	    </div>
	</div>

	<div class="form-group">
	    <label class="col-lg-2 control-label">網址</label>
	    <div class="col-lg-10">
	    	    <input type="url" name="url" class="form-control" placeholder="請輸入電商導購網址" required>
	    </div>
	</div>
	<div class="form-group">
	    <label class="col-lg-2 control-label">圖片</label>
	    <div class="col-lg-10">
		<span class="btn btn-primary btn-file">
	    		Browse<input type="file" name="fileToUpload" id="fileToUpload">
		</span>
	      	<button type="submit" name="submit" class="btn btn-default">上架</button>
	    </div>
	</div>


	<div class="form-group">
            <label class="col-lg-2 control-label">分類</label>
            <div class="col-lg-10">
              <select class="form-control" name="category">
                <option value="">Choose ...</option>
                <option value="T-Shirt">T-Shirt</option>
                <option value="襯衫">襯衫</option>
                <option value="夾克">夾克</option>
                <option value="毛衣">毛衣</option>
                <option value="洋裝">洋裝</option>
                <option value="裙子">裙子</option>
                <option value="牛仔褲">牛仔褲</option>
                <option value="褲子">褲子</option>
                <option value="圍巾">圍巾</option>
                <option value="包包">包包</option>
                <option value="珠寶">珠寶</option>
              </select>                  
            </div>
	</div>
	<div class="form-group">
            <label class="col-lg-2 control-label">場合</label>
            <div class="col-lg-10">
              <select class="form-control" name="occasion">
                <option value="">Choose ...</option>
                <option value="外出">外出</option>
                <option value="居家">居家</option>
                <option value="工作">工作</option>
              </select>                  
            </div>
	</div>

	<div class="form-group">
            <label class="col-lg-2 control-label">價格(NT)</label>
            <div class="col-lg-10">
	    	    <input type="number" name="price" class="form-control">
            </div>
	</div>

	<div class="form-group">
            <label class="col-lg-2 control-label">顏色</label>
            <div class="col-lg-10">
              <select class="form-control" name="color">
                <option value="">Choose ...</option>
                <option value="黑">黑</option>
                <option value="藍">藍</option>
                <option value="棕">棕</option>
                <option value="綠">綠</option>
                <option value="灰">灰</option>
                <option value="橘">橘</option>
                <option value="粉">粉</option>
                <option value="紫">紫</option>
                <option value="紅">紅</option>
                <option value="銀">銀</option>
                <option value="白">白</option>
                <option value="黃">黃</option>
              </select>                  
            </div>
	</div>



	<div class="form-group">
            <label class="col-lg-2 control-label">大小</label>
            <div class="col-lg-10">
              <select class="form-control" name="size">
                <option value="">Choose ...</option>
                <option value="xs">XS</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
                <option value="xxl">XXL</option>
                <option value="xxxl">XXXL</option>
              </select>                  
            </div>
	</div>
	<div class="form-group">
            <label class="col-lg-2 control-label">圖樣</label>
            <div class="col-lg-10">
              <select class="form-control" name="pattern">
                <option value="">Choose ...</option>
                <option value="格紋">格紋</option>
                <option value="色塊">色塊</option>
                <option value="迷彩">迷彩</option>
                <option value="刺繡">刺繡</option>
                <option value="拼布">拼布</option>
              </select>                  
            </div>
	</div>
	<div class="form-group">
            <label class="col-lg-2 control-label">袖長</label>
            <div class="col-lg-10">
              <select class="form-control" name="sleeve">
                <option value="">Choose ...</option>
                <option value="無袖">無袖</option>
                <option value="短袖">短袖</option>
                <option value="3/4袖">3/4袖</option>
                <option value="長袖">長袖</option>
             </select>                  
            </div>
	</div>

	<div class="form-group">
            <label class="col-lg-2 control-label">風格</label>
            <div class="col-lg-10">
              <select class="form-control" name="style">
                <option value="">Choose ...</option>
                <option value="成熟">成熟</option>
                <option value="學院">學院</option>
                <option value="波西米亞">波西米亞</option>
              </select>                  
            </div>
	</div>

	<div class="form-group">
            <label class="col-lg-2 control-label">褲長</label>
            <div class="col-lg-10">
              <select class="form-control" name="length">
                <option value="">Choose ...</option>
                <option value="熱褲">熱褲</option>
                <option value="短褲">短褲</option>
                <option value="七分褲">七分褲</option>
                <option value="長褲">長褲</option>
                <option value="喇叭褲">喇叭褲</option>
              </select>                  
            </div>
	</div>

	<div class="form-group">
            <label class="col-lg-2 control-label">領型</label>
            <div class="col-lg-10">
              <select class="form-control" name="collar">
                <option value="">Choose ...</option>
                <option value="高領">高領</option>
                <option value="露背">露背</option>
                <option value="窄領">窄頸</option>
                <option value="方領">方領</option>
                <option value="立領">立領</option>
                <option value="吊帶">吊帶</option>
                <option value="V領">V領</option>
             </select>                  
            </div>
	</div>


	<div class="form-group">
            <label class="col-lg-2 control-label">材料</label>
            <div class="col-lg-10">
              <select class="form-control" name="material">
                <option value="">Choose ...</option>
                <option value="混棉">混棉</option>
                <option value="純棉">純棉</option>
                <option value="麻布">麻布</option>
                <option value="尼龍">尼龍</option>
                <option value="仿皮">仿皮</option>
              </select>                  
            </div>
	</div>





     </div>

     <div class="col-lg-4">
	    <img id="blah" src="http://placehold.it/300x300" style="max-width:300px;" />
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
if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
	$category = $_POST['category'];
	$occasion = $_POST['occasion'];
	$price = $_POST['price'];
	$color = $_POST['color'];
	$size = $_POST['size'];
	$pattern = $_POST['pattern'];
	$sleeve = $_POST['sleeve'];
	$style = $_POST['style'];
	$length = $_POST['length'];
	$collar = $_POST['collar'];
	$material = $_POST['material'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO product(productName,fileName,descript,url,category,occasion,price,color,size,pattern,sleeve,style,length,collar,material) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$target_file,$descript,$url,$category,$occasion,$price,$color,$size,$pattern,$sleeve,$style,$length,$collar,$material));
        Database::disconnect();

        echo '<div class="alert alert-info">The file' . basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.</div>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}//end of if isset($_POST["submit"])
?>


</div><!--Container-->
</body>
<script>
//Preview before upload to server
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

