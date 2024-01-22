<?php
include("check-auth.php");
$requested_file = $_GET['file'];
$attachment_location = "images/$requested_file";
$content_type = mime_content_type($attachment_location);
$file_size = filesize($attachment_location);
if (file_exists($attachment_location)) {
    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
    header("Content-Type: $content_type");
    header("Cache-Control: max-age=29030400");
    header("Content-Length:$filesize");
    readfile($attachment_location);
} else {
    die("Error: File not found on disk.");
}
?>