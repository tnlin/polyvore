/* Drag and Drop code adapted from http://www.html5rocks.com/en/tutorials/dnd/basics/ */
var canvas = new fabric.Canvas('canvas');
// Note the use of the `originX` and `originY` properties, which we set
// to 'left' and 'top', respectively. This makes the math in the `clipTo`

function findByClipName(name) {
    return _(canvas.getObjects()).where({
            clipFor: name
        }).first()
}

// Since the `angle` property of the Image object is stored 
// in degrees, we'll use this to convert it to radians.
function degToRad(degrees) {
    return degrees * (Math.PI / 180);
}

var clipByName = function (ctx) {
    this.setCoords();
    var clipRect = findByClipName(this.clipName);
    var scaleXTo1 = (1 / this.scaleX);
    var scaleYTo1 = (1 / this.scaleY);
    ctx.save();
    
    	var ctxLeft = -( this.width / 2 ) + clipRect.strokeWidth;
	var ctxTop = -( this.height / 2 ) + clipRect.strokeWidth;
	var ctxWidth = clipRect.width - clipRect.strokeWidth;
	var ctxHeight = clipRect.height - clipRect.strokeWidth;

    ctx.translate( ctxLeft, ctxTop );
    
    ctx.rotate(degToRad(this.angle * -1));
    ctx.scale(scaleXTo1, scaleYTo1);
    ctx.beginPath();
    ctx.rect(
        clipRect.left - this.oCoords.tl.x,
        clipRect.top - this.oCoords.tl.y,
        clipRect.width,
        clipRect.height
    );
    ctx.closePath();
    ctx.restore();
}

////////////////////
////////////////////
// functions a little bit more straight-forward.
var clipRect1_1 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 10,
    top: 10,
    width: 230,
    height: 280,
    fill: '#DDD', /* use transparent for no fill */
//    stroke:'black',
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect1_1.set({
    clipFor: 'c1_1'
});


var clipRect1_2 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 260,
    top: 10,
    width: 230,
    height: 280,
    fill: '#DDD', /* use transparent for no fill */
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect1_2.set({
    clipFor: 'c1_2'
});


var clipRect1_3 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 10,
    top: 310,
    width: 480,
    height: 180,
    fill: '#DDD', /* use transparent for no fill */
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect1_3.set({
    clipFor: 'c1_3'
});

var clipRect2_1 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 10,
    top: 10,
    width: 180,
    height: 480,
    fill: '', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0.5,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect2_1.set({
    clipFor: 'c2_1'
});

var clipRect2_2 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 300,
    top: 10,
    width: 190,
    height: 480,
    fill: '', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0.5,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect2_2.set({
    clipFor: 'c2_2'
});

var clipRect2_3 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 150,
    top: 50,
    width: 200,
    height: 300,
    fill: '', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0.5,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect2_3.set({
    clipFor: 'c2_3'
});

var clipRect2_4 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 120,
    top: 300,
    width: 260,
    height: 180,
    fill: '', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0.5,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect2_4.set({
    clipFor: 'c2_4'
});


var clipRect3_1 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 10,
    top: 10,
    width: 340,
    height: 140,
    fill: '#DDD', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect3_1.set({
    clipFor: 'c3_1'
});

var clipRect3_2 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 360,
    top: 10,
    width: 130,
    height: 480,
    fill: '#DDD', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect3_2.set({
    clipFor: 'c3_2'
});

var clipRect3_3 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 10,
    top: 160,
    width: 340,
    height: 330,
    fill: '#DDD', /* use transparent for no fill */
    stroke:'gray',
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect3_3.set({
    clipFor: 'c3_3'
});

var templateChoice=1;
setTemplate(templateChoice);

function setTemplate(num){
  templateChoice=num;
  if(templateChoice==1){
	canvas.clear().renderAll();
	canvas.backgroundColor = "#E1F5FE";
	canvas.add(clipRect1_1);
	canvas.add(clipRect1_2);
	canvas.add(clipRect1_3);
  }else if(templateChoice==2){
	canvas.clear().renderAll();
	canvas.backgroundColor = "";
	clipRect2_1.strokeWidth=0.5;
	clipRect2_2.strokeWidth=0.5;
	clipRect2_3.strokeWidth=0.5;
	canvas.add(clipRect2_1);
	canvas.add(clipRect2_2);
	canvas.add(clipRect2_3);
	canvas.add(clipRect2_4);
  }else if(templateChoice==3){
	canvas.clear().renderAll();
	canvas.backgroundColor = "#fee";
	canvas.add(clipRect3_1);
	canvas.add(clipRect3_2);
	canvas.add(clipRect3_3);
  }
}
/* 
NOTE: the start and end handlers are events for the <img> elements; the rest are bound to the canvas container.
*/

function handleDragStart(e) {
    [].forEach.call(images, function (img) {
        img.classList.remove('img_dragging');
    });
    this.classList.add('img_dragging');
}

function handleDragOver(e) {
    if (e.preventDefault) {
        e.preventDefault(); // Necessary. Allows us to drop.
    }

    e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.
    // NOTE: comment above refers to the article (see top) -natchiketa

    return false;
}

function handleDragEnter(e) {
    // this / e.target is the current hover target.
    this.classList.add('over');
}

function handleDragLeave(e) {
    this.classList.remove('over'); // this / e.target is previous target element.
}

function handleDrop(e) {    
    // this / e.target is current target element.

    /*
    if (e.stopPropagation) {
        e.stopPropagation(); // stops the browser from redirecting.
    }
    */
    
    e.stopPropagation(); // Stops some browsers from redirecting.
    e.preventDefault(); // Stops some browsers from redirecting.
    var cName;
    if(templateChoice==1){
	if(e.layerX > 10 && e.layerX < 240 && e.layerY > 10  && e.layerY < 280){
		cName = 'c1_1';
	}
	else if(e.layerX > 260 && e.layerX < 490 && e.layerY > 10  && e.layerY < 280){
		cName = 'c1_2';
	}
	else if(e.layerX > 10 && e.layerX < 490 && e.layerY > 310  && e.layerY < 490){
		cName = 'c1_3';
	}
    }else if(templateChoice==2){
	if(e.layerX > 10 && e.layerX < 190 && e.layerY > 10  && e.layerY < 490){
		cName = 'c2_1';
		clipRect2_1.strokeWidth=0;
	
	}
	else if(e.layerX > 300 && e.layerX < 490 && e.layerY > 10  && e.layerY < 490){
		cName = 'c2_2';
		clipRect2_2.strokeWidth=0;
	}
	else if(e.layerX > 150 && e.layerX < 350 && e.layerY > 50  && e.layerY < 350){
		cName = 'c2_3';
		clipRect2_3.strokeWidth=0;
	}
	else if(e.layerX > 120 && e.layerX < 380 && e.layerY > 300  && e.layerY < 480){
		cName = 'c2_4';
		clipRect2_4.strokeWidth=0;
	}
    }else if(templateChoice==3){
	if(e.layerX > 10 && e.layerX < 350 && e.layerY > 10  && e.layerY < 150){
		cName = 'c3_1';
	
	}
	else if(e.layerX > 360 && e.layerX < 490 && e.layerY > 10  && e.layerY < 490){
		cName = 'c3_2';
	}
	else if(e.layerX > 10 && e.layerX < 350 && e.layerY > 160  && e.layerY < 490){
		cName = 'c3_3';
	}
    }

    // handle browser images
        var myimg = document.querySelector('#images img.img_dragging');
	var pugImg = new Image();
	pugImg.onload = function (img){
          var pug = new fabric.Image(pugImg, {
            width: myimg.width,
            height: myimg.height,
            left: e.layerX-myimg.width/2,
            top: e.layerY-myimg.height/2,
	    clipName: cName,
            clipTo: function (ctx) {
                return _.bind(clipByName, pug)(ctx)
            }
          });
          canvas.add(pug); 
	}
	pugImg.src = myimg.src;
    return false;
}

function handleDragEnd(e) {
    // this/e.target is the source node.
    [].forEach.call(images, function (img) {
        img.classList.remove('img_dragging');
    });
}

if (Modernizr.draganddrop) {
    // Browser supports HTML5 DnD.

    // Bind the event listeners for the image elements
    var images = document.querySelectorAll('#images img');
    [].forEach.call(images, function (img) {
        img.addEventListener('dragstart', handleDragStart, false);
        img.addEventListener('dragend', handleDragEnd, false);
    });
    // Bind the event listeners for the canvas
    var canvasContainer = document.getElementById('canvas-container');
    canvasContainer.addEventListener('dragenter', handleDragEnter, false);
    canvasContainer.addEventListener('dragover', handleDragOver, false);
    canvasContainer.addEventListener('dragleave', handleDragLeave, false);
    canvasContainer.addEventListener('drop', handleDrop, false);
} else {
    // Replace with a fallback to a library solution.
    alert("This browser doesn't support the HTML5 Drag and Drop API.");
}


$(window).keydown(function(e) {
    switch (e.keyCode) {
        case 46: // when press delete
        if(canvas.getActiveGroup()){
                canvas.getActiveGroup().forEachObject(function(o){ canvas.remove(o) });
                canvas.discardActiveGroup().renderAll();
        } else {
                canvas.remove(canvas.getActiveObject());
        }
    }
});

function testCanvas(){
        var json = JSON.stringify( canvas );
        //Create img
        var dataURL = canvas.toDataURL();
        document.getElementById('canvasImg').src = dataURL;
        //Create Canvas2
	canvas2 = new fabric.Canvas('c2');
        canvas2.clear();
        canvas2.loadFromJSON(json, canvas2.renderAll.bind(canvas2));
}

function saveCanvas(){
 if(confirm("確定發布?"))
 {
    
    var json = JSON.stringify( canvas);
     
    var dataURL = canvas.toDataURL();
//    console.log(json);
    $.ajax({
        url: "save.php",
        type: "POST",
	dataType:"text",
	data:{
	   'json':json,
	   'imgBase64': dataURL
	}
    }).done(function (msg){
        //console.log("--OK--:"+msg);
	alert("發布成功");
	window.location = "./";	
    });
 }else{}

}
