<?php

include("head.php");
$POSTS_PER_PAGE = 20;

if (array_key_exists ("page", $_GET)){
	$current_page = $_GET['page'];
} else {
	$current_page = 0;
}

$string = file_get_contents("content/messages.json");
$messages = json_decode($string, true);

$i = 0;

function cmp($a, $b){
	$date_a = $a['date'];
	$date_b = $b['date'];
	if ($date_a == $date_b) {
		return 0;
	}
	return ($date_a > $date_b) ? -1 : 1;
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
			echo "<img src='$url' alt='Image manquante' />";
		}
		echo "<p>";
		echo $message['content'];
		echo "</p>";

		echo "<p class='date'>";
		$date = date(DATE_RFC2822, $message['date']);
		echo "<a href='article.php?id=$id'>$date</a>";
		echo "</p>";
		echo "</article>";
	}
	$i++;
}


echo "</section>";
print_nav($current_page, $POSTS_PER_PAGE, $length);
include("footer.php");
?>
