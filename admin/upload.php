
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
$date = time();

$messages[$id]= [
	"content" => $content,
	"date" => $date,
];

if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
	move_uploaded_file($_FILES['monfichier']['tmp_name'], "../images/$id.jpg");
	$messages[$id]['image'] = "images/$id.jpg";
}

$fh = fopen('../content/messages.json', 'w');
fwrite($fh, json_encode($messages));
fclose($fh);


header("Location: /microblog/", true, 307);
?>
<?php
include("../footer.php");
?>
