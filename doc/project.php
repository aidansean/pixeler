<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/pixeler" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=pixeler" ;
$project = new project_object("pixeler", "Pixeler", "https://github.com/aidansean/pixeler", "http://aidansean.com/projects/?tag=pixeler", "pixeler/images/project.jpg", "pixeler/images/project_bw.jpg", "This project was made rather quickly in response to an image challenge.  Afterwards I changed the project to allow the user to choose any image to pixelate.", "Images,Tools", "canvas,HTML,JavaScript") ;
?>