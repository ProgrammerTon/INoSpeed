<?php
$uploadDir = "uploads/";

if (isset($_GET['delete'])) {
    $fileToDelete = $uploadDir . basename($_GET['delete']);
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        echo "File deleted successfully!";
    }
}

$files = array_diff(scandir($uploadDir), array('.', '..'));

echo "<h2>Stored Images</h2>";
echo "<table border='1' style='border-collapse: collapse; width: 100%; text-align: center;'>";
echo "<tr>";

$colCount = 0;
$maxCols = 5; // Max 5 images per row

foreach ($files as $file) {
    if ($colCount % $maxCols == 0 && $colCount != 0) {
        echo "</tr><tr>"; 
    }

    echo "<td style='padding: 10px;'>";
    echo "<strong>$file</strong><br>"; 
    echo "<img src='$uploadDir$file' width='150' style='border: 1px solid #ccc; padding: 5px;'><br>";
    echo "<a href='$uploadDir$file' download>Download</a> | ";
    echo "<a href='?delete=$file' onclick='return confirm(\"Delete this image?\")'>Delete</a>";
    echo "</td>";

    $colCount++;
}

echo "</tr>";
echo "</table>";
?>
