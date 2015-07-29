/* Drag and Drop code adapted from http://www.html5rocks.com/en/tutorials/dnd/basics/ */

var canvas = new fabric.Canvas('canvas');

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

    // handle desktop images
    if(e.dataTransfer.files.length > 0){
               
        var files = e.dataTransfer.files;
        for (var i = 0, f; f = files[i]; i++) {
            
            // Only process image files.
            if (f.type.match('image.*')) {            
                // Read the File objects in this FileList.
                var reader = new FileReader();
                // listener for the onload event
                reader.onload = function(evt) {
                    // create img element
                    var img = document.createElement('img');
                    img.src= evt.target.result;                        
                    
                    // put image on canvas
                    var newImage = new fabric.Image(img, {
                        width: img.width,
                        height: img.height,
                        // Set the center of the new object based on the event coordinates relative to the canvas container.
                        left: e.layerX,
                        top: e.layerY
                    });
                    canvas.add(newImage);
                };
               // Read in the image file as a data URL.
               reader.readAsDataURL(f);
            }
        }
    }  
    // handle browser images
    else{        
       var img = document.querySelector('#images img.img_dragging');
        var newImage = new fabric.Image(img, {
            width: img.width*2,
            height: img.height*2,
            // Set the center of the new object based on the event coordinates relative to the canvas container.
            left: e.layerX,
            top: e.layerY
        });
        canvas.add(newImage); 
    } 
    
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

function show(){
        var json = JSON.stringify( canvas );
        //alert(json);
        //Create img
        var dataURL = canvas.toDataURL();
        document.getElementById('canvasImg').src = dataURL;
        //Create Canvas2
	canvas2 = new fabric.Canvas('c2');
        canvas2.clear();
        canvas2.loadFromJSON(json, canvas.renderAll.bind(canvas2));
}

