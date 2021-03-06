PHP-Nuke Blocks System
======================


Since PHP-Nuke 5.1 you can add new blocks by simply copying the blocks
files into its directory /blocks/.

Please read this doc carefully and remember that this system, as the whole
PHP-Nuke comes without any warranty and all you do from here is under
your own responsability and risk. Always remember to backup your
database and all your files before doing anything.


====================================
1.- Introduction to Use Block Files
====================================

We start on the "blocks" directory where you can add or delete all the
blocks' files you want.

The filenames under /blocks/ dir have two rules to work properly:

a) All spaces are filled with "_", so if you have a block called for example
   Quote of the Day, your filename need to be: block-Quote_of_the_Day.php
   Note the "block-" at the begining of the filename and the ".php" extension,
   both are needed in order to properly add a block from the administration.
   
b) All blocks needs to return a variable with the content called $content,
   you can see the Sample Block included.
   
All files in this directory that start with "block-" and have the .php extension
will be included in the selection form in the administration interfase, otherwise
you will not see anything.

To add the new block, go to administration interfase and select your new block
from the "Filename" field in the Blocks section.

If you don't write a Title for your block, by default the system will get the
title from the filename stripping the "_" characters and converting it into spaces.

If you created a block and then you delete the file, the system automaticaly will
show an error message on your block, also if there isn't any content in the $content
variable from your file.

When install a new block please be sure that the blank spaces on the filename
are replaced with "_", for Example: The_Weather. The filename is case sensitive,
this mean that isn't the same the_weather and The_Weather. The "_" character is
replaced automaticaly by a blank space when the block appears in your site. So
"The_Weather" block filename name will be changed to "Web Links". All this is
valid only if you don't set a title for your block when you add it.

Also, please read the block instructions that will be included by the block author
for installation purpouses.


=====================================
2.- Information for Blocks Developers
=====================================


Making a new block with this system is very easy. Developer just need to know
a few rules:

a) On each addon file please remember to add the following code as the first
   lines:
   
    if (eregi("block-Sample_Block.php",$PHP_SELF)) {
	Header("Location: index.php");
	die();
    }

   This is to avoid direct access to the block file, so users only see it in a
   block on your site.
    
b) You can make whatever you want into a block like database queries, include
   another file from the block, use HTML code, Forms, PHP code, Java, Javascript,
   Perl, Flash, etc.

c) You have limited width space to show the block content. This limit is set by
   the blocks width defined in your site's theme, note that if you include a big
   image your site will look like something horrible :-P

d) On the Blocks filename do not use blank spaces, instead use the character
   "_". For example if you want to create a block called "The Web Ring", the
   filename will be "The_Web_Ring".
   
e) Anything you do in the block you need to return a value. This value will be
   stored in a variable named: $content
   You can see the Sample Block to have the idea.
   

Hope that you enjoy this new feature of PHP-Nuke.

=============================================================================

NOTE: To stay under HTML 4.01 Transitional standard is very important that
you substitute all "&" characters in the URLs with "&amp;" tag. So, for
example, the URL:

    <a href="modules.php?op=modload&name=FAQ&file=index">

need to be written:

    <a href="modules.php?op=modload&amp;name=FAQ&amp;file=index">

and do not use FONT or LI tags (for example) let the CSS do this for you,
without this, your pages will not validate as HTML 4.01 compatible.

=============================================================================

Have fun now!