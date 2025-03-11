<?php
date_default_timezone_set("Asia/Bangkok"); 

$uploadDir = "C:/xampp/htdocs/INoSpeed/uploads/"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = isset($_SERVER["HTTP_X_FILENAME"]) ? $_SERVER["HTTP_X_FILENAME"] : "image.jpg";
    $filePath = $uploadDir . date("d-m-Y_H-i-s") . ".jpg";  

    // Save image
    $input = fopen("php://input", "rb");
    $output = fopen($filePath, "wb");
    stream_copy_to_stream($input, $output);
    fclose($input);
    fclose($output);

    echo "File saved: $filePath";
} else {
    echo "Invalid request";
}
?>
