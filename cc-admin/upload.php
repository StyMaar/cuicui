
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
	$videos = [];
	$misc = []; // pour les fichiers qui ne sont ni des images, ni des vidéos.

	for( $i=0 ; $i < $total ; $i++ ) {
		$file = $fichiers['tmp_name'][$i];
		$type = $fichiers['type'][$i];
		$name = $fichiers['name'][$i];

		preg_match('((\w+)/(.+))', $type, $matches, PREG_OFFSET_CAPTURE);
		$extension = $matches[2][0];

		if ($extension == "html"){
			$extension = "x-html";
		}

		$path = "$id-$i.$extension";
		
		if($extension == "jpeg" || $extension == "png"){
			$path = "images/$path";
			move_uploaded_file($file, "../$path");
			$images[] = array("url" => $path, "name"=> $name);
		}else if ($extension == "mp4"){
			$path = "videos/$path";
			move_uploaded_file($file, "../$path");
			$videos[] = array("url" => $path, "name"=> $name);
		}else{
			$path = "miscs/$path";
			move_uploaded_file($file, "../$path");
			$misc[] = array("url" => $path, "name"=> $name);
		}
	}
	if (count($images) !== 0) {
		$messages[$id]['images'] = $images;
	}
	
	if (count($videos) !== 0) {
		$messages[$id]['videos'] = $videos;
	}
	if (count($misc) !== 0) {
		$messages[$id]['misc'] = $misc;
	}
}


$fh = fopen('../content/messages.json', 'w');
fwrite($fh, json_encode($messages));
fclose($fh);


header("Location: /fanclub/", true, 307);
?>
<?php
include("../footer.php");
?>
