<?php

/********************************************************/
/* NSN GR Downloads                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright � 2000-2005 by NukeScripts Network         */
/************************************************************************/
/* PHP-Nuke Platinum: Expect to be impressed                  COPYRIGHT */
/*                                                                      */
/* Copyright (c) 2004 - 2006 by http://www.techgfx.com                  */
/*     Techgfx - Graeme Allan                       (goose@techgfx.com) */
/*                                                                      */
/* Copyright (c) 2004 - 2006 by http://www.conrads-berlin.de            */
/*     MrFluffy - Axel Conrads                 (axel@conrads-berlin.de) */
/*                                                                      */
/* Refer to TechGFX.com for detailed information on PHP-Nuke Platinum   */
/*                                                                      */
/* TechGFX: Your dreams, our imagination                                */
/************************************************************************/

$pagetitle = _DOWNLOADSADMIN;
$numrows = $db->sql_numrows($db->sql_query("SELECT url FROM ".$prefix."_nsngd_downloads WHERE url='$url'"));
if ($numrows>0) {
  include("header.php");
  title($pagetitle);
  adminmain();
  echo "<br>\n";
  OpenTable();
  echo "<center><font class='content'><b>"._ERRORURLEXIST."</b></center><br>";
  echo "<center>"._GOBACK."</center>";
  CloseTable();
  include("footer.php");
} else {
  if ($title=="" || $url=="" || $description=="") {
    include("header.php");
    title($pagetitle);
    adminmain();
    echo "<br>\n";
    OpenTable();
    if($title=="") { echo "<center><font class='content'><b>"._ERRORNOTITLE."</b></center><br>"; }
    if($url=="") { echo "<center><font class='content'><b>"._ERRORNOURL."</b></center><br>"; }
    if($description=="") { echo "<center><font class='content'><b>"._ERRORNODESCRIPTION."</b></center><br>"; }
    echo "<center>"._GOBACK."</center>";
    CloseTable();
    include("footer.php");
  }
  $title = stripslashes(FixQuotes($title));
  $url = stripslashes(FixQuotes($url));
  $description = stripslashes(FixQuotes($description));
  $sname = stripslashes(FixQuotes($sname));
  $email = stripslashes(FixQuotes($email));
  $sub_ip = $_SERVER['REMOTE_ADDR'];
  if ($submitter == "") { $submitter = $aname; }
  $db->sql_query("INSERT INTO ".$prefix."_nsngd_downloads VALUES (NULL, '$cat', '$perm', '$title', '$url', '$description', now(), '$sname', '$email', '$hits', '$submitter', '$sub_ip', '$filesize', '$version', '$homepage', '1')");
  echo "<br><center><font class='option'>"._NEWDOWNLOADADDED."<br><br>";
  echo "[ <a href='modules.php?name=$module_name&amp;file=admin&amp;op=Downloads'>"._DOWNLOADSADMIN."</a> ]</center><br><br>";
  if ($new==1) {
    $result = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_nsngd_accesses WHERE username='$sname'"));
    if ($result < 1) {
      $db->sql_query("INSERT INTO ".$prefix."_nsngd_accesses VALUES ('$sname', 0, 1)");
    } else {
      $db->sql_query("UPDATE ".$prefix."_nsngd_accesses SET uploads=uploads+1 WHERE username='$submitter'");
    }
    $db->sql_query("DELETE FROM ".$prefix."_nsngd_new WHERE lid='$lid'");
    if ($email!="") {
      $subject = ""._YOURDOWNLOADAT." $sitename";
      $message = ""._HELLO." $sname:\n\n"._DL_APPROVEDMSG."\n\n"._TITLE.": $title\n"._URL.": $url\n"._DESCRIPTION.": $description\n\n\n"._YOUCANBROWSEUS." $nukeurl/modules.php?name=$module_name\n\n"._THANKS4YOURSUBMISSION."\n\n$sitename "._TEAM."";
      $from = "$sitename";
      @mail($email, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion());
    }
  }
  if($xop == "DownloadNew") { $zop = $xop; } else { $zop = "Downloads"; }
  header("Location: ".$admin_file.".php?op=".$zop);
}

?>