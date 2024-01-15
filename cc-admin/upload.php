
<?php
include("../head.php");
?>

<?php
unlink('../content/messages.json.bckp');

copy('../content/messages.json', '../content/messages.json.bckp'); //create a backup of the storage file

$string = file_get_contents("../content/messages.json");
$messages = json_decode($string, true);

$id = uniqid();
$content = $_POST['message'];
$date = $_POST['date'];
$timestamp = strtotime($date);


$messages[$id]= [
	"content" => $content,
	"date" => $timestamp,
];

if (isset($_FILES['mesfichiers']))
{
	$fichiers = $_FILES['mesfichiers'];
	$total = count($fichiers['name']);
	$images = [];
	for( $i=0 ; $i < $total ; $i++ ) {
		$path = "images/$id-$i.jpg";
		$file = $fichiers['tmp_name'][$i];
		move_uploaded_file($file, "../$path");
		$images[] = $path;
	}
	$messages[$id]['images'] = $images;
}


$fh = fopen('../content/messages.json', 'w');
fwrite($fh, json_encode($messages));
fclose($fh);


header("Location: /fanclub/", true, 307);
?>
<?php
include("../footer.php");
?>
