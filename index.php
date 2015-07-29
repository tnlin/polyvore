<!DOCTYPE html>
<html lang="zh-tw">
  <head>
    <meta charset="utf-8">
    <title>Polyvore Clone</title>
	<!--Boostrap -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<!--Customize-->
        <link rel="stylesheet" href="custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Polyvore Clone</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Demo </a></li>
        <li><a href="">Show </a></li>
      </ul>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
 <div class="row" style="padding-top:10px">
   <div class="col-lg-1">
	<button class="btn btn-primary disabled">Publish</button>
	<hr>
	<button class="btn" onclick="show()">Save</button>
   </div>
   <div class="col-lg-6">
	<div class="label label-info">Source</div>
 	<div id="canvas-container">
    		<canvas id="canvas" width="500px" height="400px"></canvas>
	</div>
	<div id="images">
	   <?php
		$dirname = "uploads/";
		$images = glob($dirname."*.png");
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
    		<canvas id="c2" width="500px" height="400px"></canvas>
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

