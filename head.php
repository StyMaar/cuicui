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
			previewDiv.replaceChildren(); // On supprime ce qui avait été précédement ajouté, puisque c'est comme ça que fonctionne le <input type='file'> lui-même.
			for(let file of document.querySelector('input[type=file]').files){
				let type = file.type;
				var reader  = new FileReader();
				reader.onload = function (event) {

					if(type == "image/jpeg" || type == "image/png"){
						let preview = document.createElement("img");
						preview.src = event.target.result;
						preview.height = 200;
						previewDiv.appendChild(preview);
					}else if (type == "video/mp4"){
						let preview = document.createElement("video");
						preview.controls = true;
						preview.height = 200;
						let source = document.createElement("source");
						source.src=event.target.result;
						source.type = 'video/mp4';
						preview.appendChild(source);
						previewDiv.appendChild(preview);
					}else{
						let preview = document.createElement("img");
						preview.src = "icons8-file-200.png";
						preview.height = 200;
						preview.style.border = "2px black solid";
						previewDiv.appendChild(preview);
					}

				}
				reader.readAsDataURL(file);
			}
		}
	</script>

	<body>
		<h1>Partage des photos</h1>
