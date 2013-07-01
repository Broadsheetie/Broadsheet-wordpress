<?php

/** Load WordPress Bootstrap */
require_once('./admin.php');

$error = false;

function imagealphamask(&$picture, $mask) {
	global $error;
	
	// Get sizes and set up new picture
	$xSize = imagesx($picture);
	$ySize = imagesy($picture);
	
	if($xSize != 624){
		$error = "Image width is $xSize - it must be 624px exactly";
		return false;
	}
	
	if($ySize != 127){
		$error = "Image width is $ySize - it must be 127px exactly";
		return false;
	}

	$newPicture = imagecreatetruecolor($xSize, $ySize);
	imagesavealpha($newPicture, true);
	imagefill($newPicture, 0, 0, imagecolorallocatealpha($newPicture, 0, 0, 0, 127));

	// Perform pixel-based alpha map application
	for($x = 0; $x < $xSize; $x++) {
		for($y = 0; $y < $ySize; $y++) {
			$alpha = imagecolorsforindex($mask, imagecolorat($mask, $x, $y));
			$alpha = 127 - floor($alpha[ 'red' ] / 2);
			$color = imagecolorsforindex($picture, imagecolorat($picture, $x, $y));
			imagesetpixel($newPicture, $x, $y, imagecolorallocatealpha($newPicture, $color[ 'red' ], $color[ 'green' ], $color[ 'blue' ], $alpha));
		}
	}

	// Copy back to original picture
    imagedestroy( $picture );
    $picture = $newPicture;

    copy ('../logo/header_logo.png', '../logo/' . date('YmdHis') . '.png');
	imagepng($picture,'../logo/header_logo.png');
}

if (count($_POST))
{
	// Load source and mask
	if (!$_FILES['newlogo']['error'])
	{
		//$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
		//$mimetype = finfo_file($finfo, $_FILES['newlogo']['tmp_name']);

		//if ($mimetype == 'image/png')
		{
			$source = imagecreatefrompng($_FILES['newlogo']['tmp_name']);
			
			if (!$source)
			{
				$error = 'There was a problem loading the image';
			}
			else 
			{
				$mask = imagecreatefrompng('../logo/mask_624x127.png');
				// Apply mask to source
				imagealphamask($source, $mask);
			}
		}	
		/*
		else
		{
			$error = "You may only upload a png - you uploaded: $mimetype";
		}
		*/
	}
	else
	{
		$error = 'There was an error uploading the file';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php 
if ($error)
{
	echo "<h1>ERROR: $error </h1>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Logo Creation</title>
</head>
<body>
	<ul>
		<li>The image you upload must be 624x127 exactly.</li>
		<li>The image must a PNG.</li>
	</ul>
	<img src='/logo/header_logo.png?t=<?php echo time();?>' width='624' height='127' />

	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="newlogo" /> <input type='hidden'
			name='create' /> <input type="submit" value="Upload" />
	</form>

</body>
</html>
