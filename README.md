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
