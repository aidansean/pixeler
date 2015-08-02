from project_module import project_object, image_object, link_object, challenge_object

p = project_object('pixeler', 'Pixeler')
p.domain = 'http://www.aidansean.com/'
p.path = 'pixeler'
p.preview_image    = image_object('%s/images/project.jpg'   %p.path, 150, 250)
p.preview_image_bw = image_object('%s/images/project_bw.jpg'%p.path, 150, 250)
p.folder_name = 'aidansean'
p.github_repo_name = 'pixeler'
p.mathjax = True
p.tags = 'Images,Tools'
p.technologies = 'canvas,HTML,JavaScript'
p.links.append(link_object(p.domain, 'pixeler', 'Live page'))
p.links.append(link_object('http://stackoverflow.com/','questions/3114147/100-safe-photo-upload-script', 'Stack overflow: 100% safe photo upload script'))
p.introduction = 'This project was made rather quickly in response to an image challenge.  Afterwards I changed the project to allow the user to choose any image to pixelate.'
p.overview = '''The user specifies the uri of an image, and the settings for pixelation.  The image is loaded server side using PHP and then the pixels are manipulated and the image returned.  The image has to be loaded safely server side and the following code is used to check the MIME type:

<code>$imageURI = (isset($_GET['uri'])) ? $_GET['uri'] : 'monalisa_before.png' ;
$image_extension = substr(strrchr($imageURI, '.'), 1) ;</code>

<code>// Taken from http://stackoverflow.com/questions/3114147/100-safe-photo-upload-script
$mime_mapping = array('png' => 'image/png', 'gif' => 'image/gif', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg') ;
$info = getimagesize($imageURI);
if(!$info){ exit('not an image') ; }
$type = $mime_mapping[$image_extension] ;
if($info['mime']!=$type){ exit('wrong extension given') ; }</code>

<code>switch($type){
	case 'image/jpeg': $source = imagecreatefromjpeg($imageURI) ; break ;
	case 'image/gif' : $source = imagecreatefromgif ($imageURI) ; break ;
	case 'image/png' : $source = imagecreatefrompng ($imageURI) ; break ;
	default : quit('File type not known.') ; break ;
}</code>'''

p.challenges.append(challenge_object('Ideally the page should be able to load any image, including those from external domains.', 'Although I\'d prefer to use the canvas to pixelate images (as can be done with the ASCII art maker) that solution would be limited by the same source restrictions.  As a result, this project will stay with PHP until further notice.', 'Resolved'))

p.challenges.append(challenge_object('The user needs to be able to specfiy any URI and the server must be able to handle this safely.', 'Safely loading images in PHP is easier than I thought it would be.  Thanks, Stack Overflow!', 'Resolved'))
