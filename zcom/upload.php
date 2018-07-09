<?php
$path = 'uploads/';
$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];

$movefile = move_uploaded_file($file_tmp, $path .$file_name);

if($movefile){
	echo "File moved sucessfully";
}else{
	echo "File moved failed";

}

?>