<?php 

$site_url = "http://photos.defcon.no";
$stream_title = "photos.defcon.no gallerystream";
$stream_description = "The latest entries in the photo galleries at defcon.no";
$contact_address = "jon.langseth@lilug.no";

$maxcount = 50;

$ctimes = array();
$album = array();
$title = array();
$idximage = array();

//define the path as relative
$basepath = "./";

//using the opendir function
$dir_handle = @opendir($basepath) or die("Unable to open $basepath");
   
//running the while loop
while ($dir = readdir($dir_handle)) {
	$target = $basepath . $dir;

			
	if ((!is_file($target)) && 
		(file_exists($target)) && 
		($dir != "images") &&
		($dir != ".") && 
		($dir != "..")) 
	{
		if (is_file($target . "/.title")) 
		{
			$ctime = filectime($target . "/.title");
			$key = date("Y-m-d-His", $ctime);
			$album[$key] = $dir;
			$ctimes[$key] = $ctime;

			$fd = fopen($target . "/.title", "r");
			$buf = chop(fgets($fd, 4096));
			fclose($fd);
			$title[$key] = $buf;

			if (is_file($target . "/.indeximage")) {
				$fd = fopen($target . "/.indeximage", "r");
				$buf =  "thumb/";
				$buf .= chop(fgets($fd, 4096));
				chop ($buf);	
				fclose($fd);
				$idximage[$key] = $buf;
			}

		}   
	}
}
//closing the directory
closedir($dir_handle);

krsort($album);
header("Content-type: application/xml;\n\n");
print ("<rss version='2.0' xmlns:dc='http://purl.org/dc/elements/1.1/'
xmlns:content='http://purl.org/rss/1.0/modules/content/'>\n");
print ("<!-- rss version='2.0' xmlns:dc='http://purl.org/dc/elements/1.1/' -->\n");
print ("  <channel>\n");
print ("    <title>" . $stream_title . "</title>\n");
print ("    <link>" . $site_url . "</link>\n");
print ("    <description>" . $stream_description . "</description>\n");
print ("    <docs>http://blogs.law.harvard.edu/tech/rss</docs>\n");
print ("    <managingEditor>" . $contact_address . "</managingEditor>\n");
print ("    <webMaster>" . $contact_address . "</webMaster>\n");

/*  // disse må fixxes
    <pubDate> <pubDate>
    </lastBuildDate> </lastBuildDate> */

foreach ( $album as $key => $value ) {
        print ("<item>\n");
        print ("<title>");
	$i_title = html_entity_decode($title[$key]);
	$url = $site_url  . "/" . $value;
	print ($i_title);
        print ("</title>\n");
	print ("  <pubDate>" . date("D, j M Y H:i:s +0100", $ctimes[$key]) . "</pubDate>\n");
        print ("  <link>" . $url . "</link>\n");
        print ("  <guid>$key$value</guid>\n");
        print ("  <description>\n");
	printf ("The photo gallery '%s' at <a href='%s'>%s</a> was updated/published at %s", $i_title,$url,$url,date("D, j M Y H:i:s +0100", $ctimes[$key]));
	print ("  </description>\n");
        print ("<content:encoded><![CDATA[ ");
	printf("<center><img src='%s/%s' /></center>", $url, $idximage[$key]);
	printf ("The photo gallery '%s' at <a href='%s'>%s</a> was updated/published at %s", $i_title,$url,$url,date("D, j M Y H:i:s +0100", $ctimes[$key]));
        print (" ]]></content:encoded>");
        print ("</item>\n");

	$maxcount--;
	 if ($maxcount < 1) break;
}
print ("  </channel>\n");
print ("</rss>");
?>


