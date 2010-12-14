<html>
<head><title>plsgen-generated photoalbum.</title>

<link rel='stylesheet' href='indexstyle.css' type='text/css' /> 

</head>
<body>
<div id="wrapper">
<div id="head">
<h1>Photo albums!</h1>
<a style="display: block; float: right;" href="rss.php"><img src="images/rss_icon.png" alt="RSS" border="0" /></a>
<div id="head-link"><a href="http://example.com">Update index.php!</a>
</div>
</div>
<div id="content">

<?php 

//define the path as relative
$path = "./";

//using the opendir function
$dir_handle = @opendir($path) or die("Unable to open $path");
   
//running the while loop
while ($file = readdir($dir_handle)) {
	$target = $path . $file;
	if (($file != "images") && ($file != "generate") &&  ($file != ".") && ($file != "..")) {
		if(file_exists($target)) {
			if (!is_file($target)) {
				if (is_file($target . "/.title")) {
					$fd = fopen($target . "/.title", "r");
					$buf = "";
					$buf = fgets($fd, 4096);
					fclose($fd);
					$album[$file] = "<span class='strong'>" . $buf . "</span>";
				}

				if (is_file($target . "/.indeximage")) {
					$fd = fopen($target . "/.indeximage", "r");
					$buf =  $file . "/thumb/";
					$buf .= fgets($fd, 4096);
					chop ($buf);	
					fclose($fd);
					$idximage[$file] = "<img src='" . $buf . "' alt='Thumb' />";
				}

			} else {

			}
		}   
	}
}
//closing the directory
closedir($dir_handle);

krsort($album);

foreach ( $album as $key => $value ) {
	echo "<div class='album'>";
	echo "<div class='idxthumb'>";
	echo "<a target=_blank href='" . $key . "'>";
	echo $idximage[$key];
	echo "</a>";
	echo "</div>";
	echo "<div class='idxlink'>";
	echo "<a target=_blank href='" . $key . "'>" . $key . "</a>\n";
	echo "</div>";
	echo "<div class='title'>$value</div>";
	echo "</div>";
}
?>
</div>
</div>
<div style="font-family: sans; font-size: 7pt; color: #444; margin-top: 20px;">
Photo gallery index by Jon Langseth, generated using <a href="index.phps">index.php</a>
</div>
</body>
</html>
