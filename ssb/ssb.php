<?php
	$host = $_SERVER['HTTP_HOST'];

	header("Location: http://$host/smb/", TRUE, 301);

	exit;
?>