<?php

if (isset($_GET)) {
    // echo ;
    $file =  base64_decode(urldecode($_GET['data']));
    
}
// // $file = 'path/to/document.docx';

// header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
// header('Content-Disposition: inline; filename="' . basename($file) . '"');
// header('Content-Length: ' . filesize($file));

// readfile($file);


?>
<iframe src="<?= $file?>" ></iframe>