<?php

function getAllgalleryImages(){
	include 'connection.php';

	$gallery = "SELECT * FROM gallery";
	return mysqli_query($con,$gallery);
}

function insertImagetoGallery($img)
{
    include 'connection.php';

	$sql = "INSERT INTO gallery(gallery_image) VALUES('$img')";
	return mysqli_query($con, $sql);
}
?>