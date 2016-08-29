<?php
include("../head.php");
?>

<form method="post" action="upload.php" enctype="multipart/form-data">
	<textarea name="message" rows="8"></textarea>
	<input type="file" name="monfichier" /><br />
	<input type="submit" value="Envoyer le fichier" />
</form>
<?php
include("../footer.php");
?>
