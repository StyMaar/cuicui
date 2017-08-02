# Cuicui

Cuicui is a tiny micro-blog engine.

## Features

- post messages
- edit or delete posts
- upload pictures
-  [no database needed](http://sebsauvage.net/wiki/doku.php?id=php:shaarli#why_not_use_a_real_database_files_are_slow)

## What's in this repo

The main index.php => the list of messages posted, with pagination (with GET param)
admin/index.php => the create/edit page (with optional GET param)
admin/upload.php => the update script (with file and post param)
admin/delete.php => the delete script (with GET param)
admin/edit.php => the «edit» page (with GET param)
admin/do_edit.php => the edit script (with POST param)
article.php => display a single message and the related comments (with GET param)

## Authentication

There is no custom credential mechanism for Cuicui, it's supposed to use the default authentication mecanism of the web server you're using.

For Apache, it uses a pair of `.htaccess` and `.htpasswd` files that you need to add to the `admin/` directory :

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

To find `ABSOLUTE_PATH_TO_YOUR_.HTPASSWD_FILE_ON_THE_SERVER` on the server you're installing Cuicui, and to calculate the `PASSWORD_HASH`, there is a small helper in `admin/tool.php`.


## Installation (on Apache)

1. Clone this repository.
2. Edit `admin/tool.php` with your password.
3. Upload the repo on your server
4. Go to `yourdomain.tld/admin/tool.php`, you'll find the path and password hash.
5. create a `.htaccess` and a `.htpasswd` with the path and hash you just found
6. upload them to your website, and remove `admin/tool.php` from the server.
