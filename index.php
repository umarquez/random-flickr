<?php
/*	 -----------------------------------------------
 *	| Flickr API calls that gets a random image url |
 *	 -----------------------------------------------
 *	http://www.flickr.com/services/
 */
include('./random_flickr.class.php');

$images = random_flickr::getPics();
$image = random_flickr::chooseRandom($images);
$url = random_flickr::urlBuilder($image);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>--&gt; Flickr &amp; Facebook Integration [umarquez.com]</title>
</head>

<body>
<img id="random_pic" src="<?=$url?>" />
</body>
</html>
