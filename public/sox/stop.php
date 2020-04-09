<?php


// var_dump($_POST);
if ($_POST['play']) {
	exec('play uploads/Converted_file.mp3');
}
else if ($_POST['stop']) {
	exec('taskkill /F /IM play.exe');
	// header("Location: /");
}
elseif ($_POST['download']) {
	header("Location: uploads/Converted_File.mp3");
	// var_dump($_POST);
	// exec('del uploads /S /Q');
	// header("Location: /");
}
// exec('taskkill /F /IM play.exe');