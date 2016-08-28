<!DOCTYPE html>
<html>
	<head>
    	<title>Deux roues pour demain microblog</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
    	<link type="text/css" rel="stylesheet" href="style.css" />
	</head>
	<body>
		<nav>
			Here will go the pagination
		</nav>
		<section>

		<?php

		$string = file_get_contents("content/messages.json");
		$json_a = json_decode($string, true);

		$messages = $json_a['messages'];
		foreach ($messages as $id => $message) {
			echo "<article>";
			if (array_key_exists ("image", $message)){
				$url = $message['image'];
				
				echo "<img src='images/$url' alt='$id' />";
			}	
			echo "<p>";
			echo $message['content'];
			echo "</p>";
			
			echo "<p class='date'>";
			echo $message['date'];
			echo "</p>";
			echo "</article>";
		}

		?>

		</section>
		<footer>
			Deux roues pour demain, un projet par Pia et Kevin.<br />			
			Website handcrafted by StyMaar.
		<footer>
	</body>
</html>
