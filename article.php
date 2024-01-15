<?php 
include("head.php");

$id = $_GET['id'];

$string = file_get_contents("content/messages.json");
$messages = json_decode($string, true);

$message = $messages[$id];
if($message) {
	echo "<article>";
	if (array_key_exists ("images", $message)){
		foreach ($message['images'] as $image) {
			$url = $image["url"];
			$name = $image["name"];
			echo "<img src='$url' alt='Image manquante' title='$name'/>";
		}
	}
	if (array_key_exists ("videos", $message)){
		foreach ($message['videos'] as $video) {
			$url = $video["url"];
			echo "<video controls>";
			echo "<source src='$url' type='video/mp4' />";
			echo "<p>";
			echo "	Votre navigateur ne prend pas en charge les vidéos HTML5. Voici";
			echo "	<a href='$url'>un lien pour télécharger la vidéo</a>.";
			echo "</p>";
			echo "</video>";
		}
	}
	if (array_key_exists ("misc", $message)){
		echo "<h3>Fichiers</h3>";
		echo "<ul>";
		foreach ($message['misc'] as $fichier) {
			$url = $fichier["url"];
			$name = $fichier["name"];
			echo "<li><a href='$url'>$name</a></li>";
		}
		echo "</ul>";
	}
	echo "<p>";
	echo $message['content'];
	echo "</p>";

	echo "<p class='date'>";
	echo date(DATE_RFC2822, $message['date']);
	echo "</p>";

	echo "<p><a href='cc-admin/delete.php?id=$id'>Delete this post</a></p>";
	echo "<p><a href='cc-admin/edit.php?id=$id'>Edit this post</a></p>";

	echo "</article>";
} else {
	echo "that item doesn't exist. id = $id";
}

include("footer.php");
?>

	