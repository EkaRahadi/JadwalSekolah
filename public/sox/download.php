<?php
	$tipe = $_POST['tipe'];
	header("Location: uploads/Converted_File.".$tipe);
	exec('del uploads /S /Q');
	// header("Location: /");