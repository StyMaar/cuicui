<?php 
$id = $_GET['id'];

$string = file_get_contents("../content/messages.json");
$messages = json_decode($string, true);

if($messages[$id]) {
	unlink('../content/messages.json.bckp');
	copy('../content/messages.json', '../content/messages.json.bckp'); //create a backup of the storage file

	unset($messages[$id]);

	$fh = fopen('../content/messages.json', 'w');
	fwrite($fh, json_encode($messages));
	fclose($fh);
	header("Location: /fanclub/", true, 307);
} else {
	echo "failed to remove an item that doesn't exist. id = $id";
}
?>
