<?php
include("../head.php");
$date = date(DATE_RFC2822, time());

?>

<form method="post" action="upload.php" enctype="multipart/form-data">
	<textarea name="message" rows="8"></textarea>
	<input type="file" name="monfichier" /><br />
	<?php
		echo "<input type='text' name='date' value='$date' />";
	?>
	<input type="submit" value="Envoyer le fichier" />
</form>
<?php
include("../footer.php");
?>
