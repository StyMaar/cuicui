The main index.php => the list of messages posted, with pagination (with GET param)
admin/index.php => the create/edit page (with optional GET param)
admin/upload.php => the update script (with file and post param)
admin/delete.php => the delete script (with GET param)
admin/edit.php => the «edit» page (with GET param)
admin/do_edit.php => the edit script (with POST param)
article.php => display a single message and the related comments (with GET param)
[microblog/comment.php => add a comment to a givent message (with GET param) TODO]

TODO:
- limit image size => use GD onthe server part, and find something for the client part (idées: http://stackoverflow.com/questions/2303690/resizing-an-image-in-an-html5-canvas#3223466 et https://www.npmjs.com/package/jpeg-js)
- add minimal CSS => DONE
- redirect after each successful posts => DONE
- allow edition of posts => DONE
- allow deletion of posts => DONE
- fix ordering bug => DONE
