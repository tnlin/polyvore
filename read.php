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
				echo '  <canvas id="c" width="500px" height="500px"></canvas>';
//				echo '          <img id="myimg" src="'.$image.'"></img> ';
				echo '          <div class="caption">';
				echo '                  <h3>'.$id.'</h3>';
				echo '                  <label class="label label-info">'.$image.'</label>';
				echo '                  <label class="label label-primary" id="pos"></label>';
//				echo '                  <div class="alert alert-danger" id="pos"></div>';
				echo '          </div>';
				echo '  </div>';
			?>
		</div>
		<div id="detail" class="col-lg-6">
	<?php 
		#conect db
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		#parse json
		$jsonIterator = new RecursiveIteratorIterator(
		new RecursiveArrayIterator(json_decode($json, TRUE)),
		RecursiveIteratorIterator::SELF_FIRST);
		$counter=1;
		$array = array(array());
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
			echo '	<h3 id='.$counter.' >'.$data['productName'].'</h3>';
			echo '	<p>'.$data['descript'].'</p><br>';
			echo '	<a href="'.$data['url'].'"><button class="btn btn-xs btn-danger">Buy now</button></a><hr>';
//			echo $array[$counter]['left'] .','.$array[$counter]['top'] .','.$array[$counter]['width'] .','.$array[$counter]['height'];
			echo '</div>';
			$array[$counter]['productName']=$data['productName'];
			$array[$counter]['descript']=$data['descript'];
			$array[$counter]['url']=$data['url'];
			$counter += 1;
		 }
		 if($key == "left" && $key != "0" ){
			$array[$counter]['left']=$val;
		 }else if($key == "top" && $key != "0" ){
			$array[$counter]['top']=$val;
		 }else if($key == "width" && $key != "0" ){
			$array[$counter]['width']=$val;
		 }else if($key == "height" && $key != "0" ){
			$array[$counter]['height']=$val;
		 }else if($key == "scaleX" && $key != "0" ){
			$array[$counter]['width'] *= $val;
		 }else if($key == "scaleY" && $key != "0" ){
			$array[$counter]['height'] *= $val;
		 }
		}
		Database::disconnect();
	?>
		</div>
	</div>
    </div> <!-- /container -->
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>
  <script>
$(function(e) {
      	canvasImg = "<?php
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM canvas where id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                #get data
                echo $data['image'];
                Database::disconnect();
	?>"
	var arr = <?php  echo json_encode($array) ?>;
	var canvas = new fabric.Canvas('c');
	fabric.Image.fromURL(canvasImg, function(oImg) {
		canvas.add(oImg)
                canvas.item(0).selectable = false;
                canvas.item(0).strokeWidth = 0;	
	        for(i=1 ; i<arr.length ; i++){
        	    canvas.add( new fabric.Rect({
			left:arr[i].left , top:arr[i].top , width:arr[i].width , height:arr[i].height , fill:'' , stroke:'',lockMovementX:true,lockMovementY:true,hasControls:false
		    }));
       		}
	});
	canvas.hoverCursor='pointer';
	console.log(arr)
	//$("#c").mousemove(function(e){
	canvas.on('mouse:move', function(options) {
	 //  	var parentOffset = $(this).offset(); 
	 //  	var relX = e.pageX - parentOffset.left;
	//	var relY = e.pageY - parentOffset.top;
		var p = canvas.getPointer(options.e);
		var relX = p.x;
		var relY = p.y;
	   	$("#pos").text(parseInt(relX) + " , " + parseInt(relY));
		for(i=1;i<arr.length;i++){
			if(relX > arr[i].left &&  relX < arr[i].left + arr[i].width && relY > arr[i].top && relY < arr[i].top + arr[i].height){
	   			$("#pos").append(" | "+ arr[i].productName);
	   			$("#"+i).css("background-color","yellow");
			}else{
	   			$("#"+i).css("background-color","white");
			}
		}
	})
;
        canvas.on('mouse:over', function(e) {
                e.target.setStroke('black');
                canvas.renderAll();
        });

        canvas.on('mouse:out', function(e) {
                e.target.setStroke('');
                canvas.renderAll();
        });

        canvas.on('mouse:down', function(options) {
		var p = canvas.getPointer(options.e);
		var relX = p.x;
		var relY = p.y;
		for(i=1;i<arr.length;i++){
			if(relX > arr[i].left &&  relX < arr[i].left + arr[i].width && relY > arr[i].top && relY < arr[i].top + arr[i].height){
	                	window.open(arr[i].url);
			}
		}
                canvas.renderAll();
        });

	
})		
  </script>

</html>

