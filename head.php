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
		function previewFiles() {
			var previewDiv = document.getElementById('image-preview');
			if (!previewDiv) {
				return;
			}
			for(let file of document.querySelector('input[type=file]').files){
				var reader  = new FileReader();
				reader.onload = function (event) {
					let preview = document.createElement("img");
					preview.src = event.target.result;
					preview.height = 200;
					previewDiv.appendChild(preview);
				}
				reader.readAsDataURL(file);
			}
		}
	</script>

	<body>
		<h1>Partage des photos</h1>
