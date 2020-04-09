<?php

// exec('play uploads/Markvard.mp3');
// echo exec('notepad.exe');


// var_dump($tipe);

if(array_key_exists('thefile', $_FILES)) {
 
    // Memvalidasi file yang diupload
    if($_FILES['thefile']['size'] === 0 || empty($_FILES['thefile']['tmp_name'])) {
        echo("Tidak ada file yang dipilih.");
        echo($_FILES['thefile']['size']);
    } else if($_FILES['thefile']['error'] !== UPLOAD_ERR_OK) {
        echo("Ada error pada kode PHP.");
    } else {
     
        // Proses membuat folder jika belum ada
        if(!file_exists('uploads')){
          mkdir('uploads');  
        }else{
            exec('del "sox/uploads" /S /Q');
        }
         
        // Memindahkan file ke direktori tujuan
        if(move_uploaded_file($_FILES['thefile']['tmp_name'],'uploads/' . $_FILES['thefile']['name'])) {
            // echo("File sukses diupload!");
            // var_dump($_FILES);
            $nama =  $_FILES['thefile']['name'];
            $file_type = substr($nama, -3);
            // exec('cd ')
            $tipe = $_POST['tipe'];

            if ($tipe == 'bass10') {
                exec('sox "uploads/' .$nama. '" -c 1 uploads/Converted_File.mp3 gain -h bass +10 ');
            }else if ($tipe == 'bass10') {
                exec('sox "uploads/' .$nama. '" -c 1 uploads/Converted_File.mp3 gain -h bass +50 ');
            }else{
                exec('sox "uploads/' .$nama. '" uploads/Converted_File.mp3 gain -h pad 10 20 reverb ');
            }
            

            echo '
            <html>
                <head>
                    <title>TUBES PSD</title>
                    <link rel="stylesheet" type="text/css" href="../css/adminlte.min.css">
                </head>
                <body><center>
                File sukses diupload!
                <form class="pt-3" action="stop.php" method="post" target="_blank">
                    <input type="submit" name="play" class="btn" value="Play" />
                    <input type="submit" name="stop" class="btn" value="Stop" />
                    <input type="submit" name="download" class="btn btn-primary" value="Download!" />
                </form>
                <a href="/" class="btn">Back To Home</a>
               </center></body>
            </html>';

            // </form>
            // <form action="download.php" method="post">    
            //     <input type="hidden" name="tipe" value="'.$tipe.'" />            


            // <a href="uploads/Converted_File.'.$tipe.'">Download!</a>
            // exec('docto -f C:\xampp\htdocs\psd\uploads\'. $nama .' -O "C:\xampp\htdocs\psd\uploads\'. $nama .'pdf" -T wdFormatPDF');
            // exec('docto -f "C:/xampp/htdocs/psd/uploads/'.$nama.'" -O "C:/xampp/htdocs/psd/uploads/'.$nama.'.pdf" -T wdFormatPDF');
            
        } else {
            echo("Terjadi error pada proses upload.");
        }
    }
}
 ?>