function reload_image(){
  Get("img_pixelated").src = "pixeler.php?uri=" + Get("input_uri").value 
    + "&d=" + Get("input_pixels").value 
    + "&w=" + Get("input_width" ).value ;
}
function Get(id){ return document.getElementById(id) ; }
