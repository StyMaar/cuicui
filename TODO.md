~~Mise à jour Readme~~
~~multiple file upload~~
~~video upload~~
~~conserver le nom du fichier pour les fichiers miscs~~
~~Bugfix pour les fichier .mov~~
~~Bug avec le nom des fichiers "miscs" => il faudrait plus qu'une simple entrée htaccess mais un rewriterule avec un script PHP qui dans l'url récupère les infos utiles (l'id du post et l'index du fichier) pour ensuite aller chercher dans la base de données json afin de récupérer le nom et le mettre dans le HEADER `Content-Disposition attachment` (exemple: `Content-Disposition: attachment; filename="filename.jpg"`)~~
~~Réparer les options d'affichage d'un post individuel, de suppression, d'édition.~~
- ~~implémenter un vrai système de login/mdp => presque fini, il faut juste faire en sorte que les fichiers img et video soient bien derrière la protection~~

- chunking pour les uploads de gros fichiers:
    - https://stackoverflow.com/questions/9011138/handling-pluploads-chunked-uploads-on-the-server-side
    - https://stackoverflow.com/questions/20212851/slice-large-file-into-chunks-and-upload-using-ajax-and-html5-filereader
    - https://stackoverflow.com/questions/14646355/how-can-i-upload-large-files-by-chunk-pieces
    - https://api.video/blog/tutorials/uploading-large-files-with-javascript/

- progressive web app (y compris possibilité de la faire apparaître dans «partager»):
    - https://developer.chrome.com/docs/capabilities/web-apis/web-share-target?hl=fr
    - https://developer.mozilla.org/fr/docs/Web/Progressive_web_apps/Tutorials/js13kGames/Installable_PWAs
    - https://chodounsky.com/2019/03/24/progressive-web-application-as-a-share-option-in-android/

- notifications => Non, pas avant d'avoir ré-écrit tout le truc en Rust
