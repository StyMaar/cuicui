<?php
include("check-auth.php");
?>

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
					}else if (type == "video/mp4" || type == "video/quicktime"){
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

				if (type == "video/quicktime"){
					let overwrittenFile = new File([file], "filename.mov", {
						type: "video/mp4"
					});
					reader.readAsDataURL(overwrittenFile);
				}else{
					reader.readAsDataURL(file);
				}
			}
		}

		// get a file from an image tag (warning: download the image again in the process)
		async function FileFromImageTag(imageTag){
			let response = await fetch(imageTag.src);
			return new File([await response.arrayBuffer()], imageTag.title)
		}

		async function share(article){
			let filesArray= [];

			let date = article.getElementsByClassName("date")[0].innerText;
			let message = article.getElementsByClassName("message")[0].innerText;

			for(let imageTag of article.getElementsByTagName("img")){
				filesArray.push(await FileFromImageTag(imageTag))
			}

			if (navigator.canShare && navigator.canShare({ files: filesArray })) {
				await navigator.share({
				files: filesArray,
				title: date,
				text: message,
				})
			} else {
				console.log(`Your system doesn't support sharing files.`);
			}
		}

		function insertShareButton(){
			if (navigator.canShare){
				for (let article of document.getElementsByTagName("article")){
					let shareButton = document.createElement("button");
					shareButton.innerHTML = "Partager";

					article.insertBefore(shareButton, article.firstChild);

					shareButton.onclick = function(){
						let article = shareButton.parentElement;
						share(article)
						.then(() => console.log('Share was successful.'))
						.catch((error) => {
							console.log('Sharing failed', error);
							alert("sharing failed"+error);
						});
					};
				}
			}
		}

		window.onload = function(){
			insertShareButton()
		}

	</script>

	<body>
		<h1>Partage des photos</h1>
