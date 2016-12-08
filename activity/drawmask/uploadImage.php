<?php
	ini_set("display_errors", "On");
	error_reporting(E_ALL | E_STRICT);

	session_start();
	date_default_timezone_set('Asia/Shanghai');
	if(count($_FILES) > 0)
	{
		$f = $_FILES['file'];
	    $filename = date("Y-m-d_H:i:s") .'_'. $f['name'];
		$filenameFinal = 'upload/' . $filename;
		move_uploaded_file($f['tmp_name'], $filenameFinal);
		echo $filename;
		$_SESSION['pic_src'] = $filename;
	}
	else
	{
		echo 'no files';
	}

?>
