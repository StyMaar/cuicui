~~Mise à jour Readme~~
~~multiple file upload~~
~~video upload~~
~~conserver le nom du fichier pour les fichiers miscs~~
~~Bugfix pour les fichier .mov~~
notifications => Non, pas avant d'avoir ré-écrit tout le truc en Rust
progressive web app (y compris possibilité de la faire apparaître dans «partager»):
    - https://developer.chrome.com/docs/capabilities/web-apis/web-share-target?hl=fr
    - https://developer.mozilla.org/fr/docs/Web/Progressive_web_apps/Tutorials/js13kGames/Installable_PWAs
    - https://chodounsky.com/2019/03/24/progressive-web-application-as-a-share-option-in-android/

~~Bug avec le nom des fichiers "miscs" => il faudrait plus qu'une simple entrée htaccess mais un rewriterule avec un script PHP qui dans l'url récupère les infos utiles (l'id du post et l'index du fichier) pour ensuite aller chercher dans la base de données json afin de récupérer le nom et le mettre dans le HEADER `Content-Disposition attachment` (exemple: `Content-Disposition: attachment; filename="filename.jpg"`)~~

~~Réparer les options d'affichage d'un post individuel, de suppression, d'édition.~~
