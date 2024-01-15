# Cuicui

Cuicui is a tiny micro-blog engine.

## Fanclub

 `Fanclub`` est un fork de cuicui, que j'utilise pour partager des photos avec la familles.

Ce qui change:

- Les urls s'attendent maintenant à ce que le truc soit déployé dans `/fanclub` sur le site internet (Il faudrait que ce soit paramétré par un config globale dans cuicui déjà en fait …)

- Tout est planqué derrière le .htaccess, la partie admin n'a plus rien de spéciale. D'ailleurs on peut y accéder depuis les pages normales: l'upload se fait depuis la page d'accueil, et l'édition et suppression depuis la page spécifique d'un post. (Du coup, le .htpasswd doit lui aussi être à la racine)

- En plus des photos jpeg supportées par cuicui, cette version supporte l'upload de vidéos .mp4 et .mov (avec du mp4 dedans), de photos en png, et tout autres type fichiers qui sont alors traités comme des blobs téléchargeables, mais pas visionables sur le site.

- Le formulaire d'upload est plus avancé: on peut uploader plusieurs fichiers à la fois. De plus il supporte les thumbnails d'images et de vidéo, ainsi qu'une icone de fichiers pour les autres types.


## Features

- post messages
- edit or delete posts
- upload pictures
-  [no database needed](http://sebsauvage.net/wiki/doku.php?id=php:shaarli#why_not_use_a_real_database_files_are_slow)

## What's in this repo

The main index.php => the list of messages posted, with pagination (with GET param)
cc-admin/index.php => the create/edit page (with optional GET param)
cc-admin/upload.php => the update script (with file and post param)
cc-admin/delete.php => the delete script (with GET param)
cc-admin/edit.php => the «edit» page (with GET param)
cc-admin/do_edit.php => the edit script (with POST param)
article.php => display a single message and the related comments (with GET param)

## Authentication

There is no custom credential mechanism for Cuicui, it's supposed to use the default authentication mecanism of the web server you're using.

For Apache, it uses a pair of `.htaccess` and `.htpasswd` files that you need to add to the `cc-admin/` directory :

.htaccess
```
AuthName "welcome !"
AuthType Basic
AuthUserFile "ABSOLUTE_PATH_TO_YOUR_.HTPASSWD_FILE_ON_THE_SERVER"
Require valid-user
```

.htpasswd
```
USERNAME:PASSWORD_HASH
```

To find `ABSOLUTE_PATH_TO_YOUR_.HTPASSWD_FILE_ON_THE_SERVER` on the server you're installing Cuicui, and to calculate the `PASSWORD_HASH`, there is a small helper in `cc-admin/tool.php`.


## Installation (on Apache)

1. Clone this repository.
2. Edit `cc-admin/tool.php` with your password.
3. Upload the repo on your server
4. Go to `yourdomain.tld/cc-admin/tool.php`, you'll find the path and password hash.
5. create a `.htaccess` and a `.htpasswd` with the path and hash you just found
6. upload them to your website, and remove `cc-admin/tool.php` from the server.
