<?php

unlink('../content/messages.json.bckp');

copy('../content/messages.json', '../content/messages.json.bckp'); //create a backup of the storage file

$string = file_get_contents("../content/messages.json");
$messages = json_decode($string, true);

$content = $_POST['message'];
$id = $_POST['id'];

$message = $messages[$id];
if($message) {
  $message["content"] = $content;
  $messages[$id] = $message; // needed because PHP is STUPID !
  $fh = fopen('../content/messages.json', 'w');
  fwrite($fh, json_encode($messages));
  fclose($fh);

  header("Location: /microblog/", true, 307);

} else {
  include("../head.php");
	echo "that item doesn't exist. id = $id";
  include("../footer.php");
}
?>
