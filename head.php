<!DOCTYPE html>
<html>
	<head>
    	<title>Partage des photos de la famille</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
    	<link type="text/css" rel="stylesheet" href="style.css" />
	</head>

	<script>
		function previewFile() {
			var preview = document.getElementById('preview');

			if (!preview) {
				return;
			}

			var file    = document.querySelector('input[type=file]').files[0];
			var reader  = new FileReader();

			reader.onloadend = function () {
				preview.src = reader.result;
				preview.style.display = "";
			}

			if (file) {
				reader.readAsDataURL(file);
			} else {
				preview.src = "";
			}
		}
	</script>

	<body>
		<h1>Partage des photos</h1>
