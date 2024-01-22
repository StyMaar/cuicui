<?php
include("check-auth.php");
$requested_file = $_GET['file'];
$attachment_location = "videos/$requested_file";
$file_size = filesize($attachment_location);
if (file_exists($attachment_location)) {
    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
    header("Content-Type: $content_type");
    header("Cache-Control: max-age=29030400");
    header("Accept-Ranges: bytes");
    readfile($attachment_location);
} else {
    die("Error: File not found on disk.");
}

?>