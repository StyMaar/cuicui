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

		<?php

		$POSTS_PER_PAGE = 1;

		if (array_key_exists ("page", $_GET)){
			$current_page = $_GET['page'];	
		} else {
			$current_page = 0;
		} 

		$string = file_get_contents("content/messages.json");
		$json_a = json_decode($string, true);

		$messages = $json_a['messages'];
		$i = 0;

		function cmp($a, $b) {
			if ($a['date'] == $b['date']) {
				return 0;
			}
			return ($a < $b) ? -1 : 1;
		}


		uasort($messages, 'cmp');


		function print_nav($page, $posts_per_page, $length){
			echo "<nav>";
				if($page >0 ) {
					$previous_page = $page-1;
					echo "<a href='?page=$previous_page'>Posts plus récents</a>";
				}
				if(($page+1)*$posts_per_page < $length){
					$next_page = $page+1;
					echo "<a href='?page=$next_page'>Posts plus anciens</a>";
				
				}
			echo "</nav>";
		}
		$length = count($messages);
		print_nav($current_page, $POSTS_PER_PAGE, $length);
		echo "<section>";

		//
		foreach ($messages as $id => $message) {
			if($i >= $current_page*$POSTS_PER_PAGE && $i < ($current_page+1)*$POSTS_PER_PAGE){
				echo "<article>";
				if (array_key_exists ("image", $message)){
					$url = $message['image'];
				
					echo "<img src='images/$url' alt='Image manquante' />";
				}	
				echo "<p>";
				echo $message['content'];
				echo "</p>";
			
				echo "<p class='date'>";
				echo date(DATE_RFC2822, $message['date']);
				echo "</p>";
				echo "</article>";
			}
			$i++;
		}


		echo "</section>";
		print_nav($current_page, $POSTS_PER_PAGE, $length);
		?>

		<footer>
			Deux roues pour demain, un projet par Pia et Kevin.<br />			
			Website handcrafted by StyMaar.
		<footer>
	</body>
</html>
