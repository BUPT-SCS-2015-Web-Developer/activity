<?php

if(count($_FILES) > 0)
{
	$f = $_FILES['file'];
    $filename = md5(uniqid(rand())) . '_' . $f['name'];
	$filenameFinal = 'files/' . $filename; 
	move_uploaded_file($f['tmp_name'], $filenameFinal);
	echo $filename;
}
else
{
	echo 'no files';
}

?>