<?php

/********************************************************/
/* NSN News                                             */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/********************************************************/
/* Based on: Threaded Discussion                        */
/* Copyright (C) 2000  Thatware Development Team        */
/* http://atthat.com/                                   */
/********************************************************/

if(!defined('NSNNE_ADMIN')) { die("Illegal File Access Detected!!"); }
include("header.php");
NE_Admin(_NE_CATEGORIES." "._NE_ADMIN.": "._NE_CATEGORYADD);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form action='".$admin_file.".php' method='post'>\n";
echo "<input type='hidden' name='op' value='NECategoryAddSave'>\n";
echo "<tr><td bgcolor='$bgcolor2'><b>"._NE_CATEGORYNAME.":</b></td>\n";
echo "<td><input type='text' name='title' size='22' maxlength='20'></td></tr>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._NE_CATEGORYADD."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
ne_copy();
include("footer.php");

?>