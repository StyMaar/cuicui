<?php

$requested_path = $_GET['file'];

preg_match('/([a-z0-9]{13})-(\d)+(.+)/', "$requested_path", $matches);
$id = $matches[1];
$index = $matches[2];

$string = file_get_contents("content/messages.json");
$messages = json_decode($string, true);

$file_name="";
if (isset($messages[$id]["misc"][$index]["name"])){
    $file_name = $messages[$id]["misc"][$index]["name"];
}else{
    die("Error: File not found in database.");
}

$attachment_location = "miscs/$requested_path";
// https://stackoverflow.com/questions/6175533/how-to-return-a-file-in-php
if (file_exists($attachment_location)) {
    header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
    header("Content-Disposition: attachment; filename=\"$file_name\"");
    header("Cache-Control: public"); // needed for internet explorer
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length:".filesize($attachment_location));
    readfile($attachment_location);
} else {
    die("Error: File not found on disk.");
} 

?>