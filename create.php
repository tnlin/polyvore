<!DOCTYPE html>
<html lang="zh-tw">
<?php include '_head.php';?>
<div class="container">
 <div class="row" style="padding-top:10px">
   <div class="col-lg-1">
	<button class="btn btn-primary" onclick="saveCanvas()">Publish</button>
	<hr>
	<button class="btn" onclick="testCanvas()">Test</button>
   </div>
   <div class="col-lg-6">
	<div class="label label-info">Source</div>
 	<div id="canvas-container">
    		<canvas id="canvas" width="400px" height="400px"></canvas>
	</div>
	<div id="images">
	   <?php
		$dirname = "uploads/";
		$images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
		foreach($images as $image) {
		 echo '<img draggable="true" src="'.$image.'" width="100" height="100"/></img>';
		}
	    ?>	
	</div>   
   </div>
   <div class="col-lg-1"></div>
   <div class="col-lg-4">
  	<!-- Based on the tutorial at http://www.html5rocks.com/en/tutorials/dnd/basics/ -->
	<div class="label label-success">Canvas Copy</div>
 	<div id="canvas-container">
    		<canvas id="c2" width="400px" height="400px"></canvas>
	</div>
	<hr>
	<div class="label label-info">PNG</div><br>
 	<div id="canvas-container">
		<img id="canvasImg"> </img>
	</div>
   </div>
 </div><!--row-->
</div><!--container-->

<!-- NOTE: Fabric.js sets both the <canvas> element and the wrapper element which it
creates to be user-unselectable using CSS properties (e.g. for Webkit, this is 
-webkit-user-select: none;). We could remove that property during the dragging, but 
I'm just going to wrap the canvas in a container and bind events to that, which is 
less intrusive.
 -->
</body>
	<!--Fabric & DnD -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.5.0/fabric.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
	<script src="custom.js"></script>
</html>

