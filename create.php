<!DOCTYPE html>
<html lang="zh-tw">
<?php include '_head.php';?>
<div class="container">
 <div class="row" style="padding-top:10px">
<!--	
	<button class="btn" onclick="testCanvas()">Test</button> 
-->
   <div class="col-lg-6">
	<div class="label label-info">Source</div>
 	<div id="canvas-container">
    		<canvas id="canvas" width="500px" height="500px"></canvas>
	</div>
	<button class="btn btn-primary" onclick="saveCanvas()">Publish</button>
	<button class="btn btn-default" onclick="setTemplate(1)">T1</button>
	<button class="btn btn-default" onclick="setTemplate(2)">T2</button>
	<button class="btn btn-default" onclick="setTemplate(3)">T3</button>
   </div>
   <div class="col-lg-6">
	<div id="images">
	   <?php
		$dirname = "uploads/";
		$images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
		foreach($images as $image) {
		 echo '<img draggable="true" src="'.$image.'" style="max-width:150px;"/></img>';
		}
	    ?>	
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script>

	<script src="custom.js"></script>
</html>

