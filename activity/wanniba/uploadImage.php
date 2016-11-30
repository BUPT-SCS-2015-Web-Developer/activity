<?php
	ini_set("display_errors", "On");
	error_reporting(E_ALL | E_STRICT);

	if(count($_FILES) > 0)
	{
		$f = $_FILES['file'];
	    $filename = md5(uniqid(rand())) . '_' . $f['name'];
		$filenameFinal = 'upload/' . $filename;
		move_uploaded_file($f['tmp_name'], $filenameFinal);
		echo $filename;
	}
	else
	{
		echo 'no files';
	}

?>
