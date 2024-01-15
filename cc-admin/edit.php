<?php
include("../head.php");

$id = $_GET['id'];

$string = file_get_contents("../content/messages.json");
$messages = json_decode($string, true);

$message = $messages[$id];
if($message) {
		echo "<article>";
		if (array_key_exists ("images", $message)){
			foreach ($message['images'] as $url) {
				echo "<img src='$url' alt='Image manquante' />";
			}
		}

	  echo "<form method='post' action='do_edit.php' enctype='multipart/form-data'>";
	  $content = $message['content'];
	  echo "<textarea name='message' rows='8'>$content</textarea>";
		echo "<input type='hidden' value='$id' name='id' />";
		$date = date(DATE_RFC2822, $message['date']);
		echo "<input type='text' name='date' value='$date' />";
		echo "<input type='submit' value=\"Éditer l'article\" />";
		echo "</form>";
		echo "</article>";

} else {
	echo "that item doesn't exist. id = $id";
}

include("../footer.php");
?>
