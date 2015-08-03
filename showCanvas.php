<!DOCTYPE html>
<html lang="zh-tw">
<?php include '_head.php';?>
<body>
	<div id="display"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>

<script>
//$(document).ready(function(){

   var canvasArray =   <?php
                           include 'database.php';
                           $pdo = Database::connect();
                           $sql = 'SELECT json FROM canvas ORDER BY id DESC';
                           $q = $pdo->prepare($sql);
                           $q->execute();
			   $array = array();
                           foreach ($q as $row) {
				$array[]=$row['json'];
                           }
                           echo json_encode($array);
                           Database::disconnect();
                        ?>;

    for(var i=0; i< canvasArray.length-1; i++){
//	alert(canvasArray[i]);
	var num = 'c'+i;
	$("#display").append("<div id=\"canvas-container\">" +
				"<canvas id="+num+" width=\"400\" height=\"400\" ></canvans>"+
			    "</div>");
	var deploy = new fabric.Canvas(num);
	deploy.clear();
        deploy.loadFromJSON(canvasArray[i], deploy.renderAll.bind(deploy));
    }
 
</script>
</html>
