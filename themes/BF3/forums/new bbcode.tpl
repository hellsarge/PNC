<!-- BEGIN ulist_open --><ul><!-- END ulist_open -->
<!-- BEGIN ulist_close --></ul><!-- END ulist_close -->

<!-- BEGIN olist_open --><ol type="{LIST_TYPE}"><!-- END olist_open -->
<!-- BEGIN olist_close --></ol><!-- END olist_close -->

<!-- BEGIN listitem --><li><!-- END listitem -->

<!-- BEGIN quote_username_open --><table width="90%" cellspacing="1" cellpadding="3" border="0" align="center">
<tr>
<th align="left"><i>{USERNAME} {L_WROTE}:</i></th>
</tr>
<tr>
<td class="quote"><!-- END quote_username_open -->
<!-- BEGIN quote_open --><table width="90%" cellspacing="1" cellpadding="3" border="0" align="center">
<tr>
<th align="left"><i>{L_QUOTE}:</i></th>
</tr>
<tr>
<td class="quote"><p><!-- END quote_open -->
<!-- BEGIN quote_close --></p></td>
</tr>
</table><!-- END quote_close -->

<!-- BEGIN code_open --><table width="90%" cellspacing="1" cellpadding="3" border="0" align="center">
<tr>
<th align="left"><i>{L_CODE}:</i></th>
</tr>
<tr>
<td class="code"><p><!-- END code_open -->
<!-- BEGIN code_close --></p></td>
</tr>
</table><!-- END code_close -->
<!-- BEGIN b_open --><span style="font-weight:bold"><!-- END b_open -->
<!-- BEGIN b_close --></span><!-- END b_close -->
<!-- BEGIN u_open --><span style="text-decoration:underline"><!-- END u_open -->
<!-- BEGIN u_close --></span><!-- END u_close -->
<!-- BEGIN i_open --><span style="font-style:italic"><!-- END i_open -->
<!-- BEGIN i_close --></span><!-- END i_close -->
<!-- BEGIN color_open --><span style="color:{COLOR}"><!-- END color_open -->
<!-- BEGIN color_close --></span><!-- END color_close -->
<!-- BEGIN size_open --><span style="font-size:{SIZE}px; line-height:normal"><!-- END size_open -->
<!-- BEGIN size_close --></span><!-- END size_close -->
<!-- BEGIN img --><img src="{URL}" alt="Image" title="Image" border="0" /><!-- END img -->
<!-- BEGIN url --><a href="{URL}" target="_blank" class="postlink">{DESCRIPTION}</a><!-- END url -->
<!-- BEGIN email --><a href="mailto:{EMAIL}">{EMAIL}</a><!-- END email -->
<!-- BEGIN s_open --><strike><!-- END s_open -->
<!-- BEGIN s_close --></strike><!-- END s_close -->

<!-- BEGIN sup_open --><sup><!-- END sup_open -->
<!-- BEGIN sup_close --></sup><!-- END sup_close -->

<!-- BEGIN sub_open --><sub><!-- END sub_open -->
<!-- BEGIN sub_close --></sub><!-- END sub_close -->

<!-- BEGIN table_open --><table style="{TABLE}"><tr><!-- END table_open -->
<!-- BEGIN table_close --></tr></table><!-- END table_close -->

<!-- BEGIN cell_open --><td style="{CELL}"><!-- END cell_open -->
<!-- BEGIN cell_close --></td><!-- END cell_close -->

<!-- BEGIN spoil_open -->
	<div align="center">
	<div class="spoiltitle"><b>{L_BBCODEBOX_HIDDEN}:</b>&nbsp;
		<input class="spoilbtn" type="button" value="{L_BBCODEBOX_VIEW}" onClick="javascript:if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = '{L_BBCODEBOX_HIDE}'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = '{L_BBCODEBOX_VIEW}'; }" onfocus="this.blur();">
	</div>
	<div class="spoildiv">
	<div style="display: none;">
<!-- END spoil_open -->
<!-- BEGIN spoil_close --></div></div></div><span class="postbody"><!-- END spoil_close -->

<!-- BEGIN align_open --><div style="text-align:{ALIGN}"><!-- END align_open -->
<!-- BEGIN align_close --></div><!-- END align_close -->

<!-- BEGIN marq_open --><marquee direction="{MARQ}" scrolldelay="120"><!-- END marq_open -->
<!-- BEGIN marq_close --></marquee><!-- END marq_close -->

<!-- BEGIN table_open --><table style="{TABLE}"><tr><!-- END table_open -->
<!-- BEGIN table_close --></tr></table><!-- END table_close -->

<!-- BEGIN cell_open --><td style="{CELL}"><!-- END cell_open -->
<!-- BEGIN cell_close --></td><!-- END cell_close -->

<!-- BEGIN font_open --><span style="font-family:{FONT}"><!-- END font_open --> 
<!-- BEGIN font_close --></span><!-- END font_close --> 

<!-- BEGIN ram --><div align="center"><embed src="{URL}" align="center" width="275" height="40" type="audio/x-pn-realaudio-plugin" console="cons" controls="ControlPanel" autostart="false"></embed></div><!-- END ram -->

<!-- BEGIN flash --><!-- URL's used in the movie--> 
<!-- text used in the movie--> 
<!-- --> 
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" WIDTH={WIDTH} HEIGHT={HEIGHT}> 
<PARAM NAME=movie VALUE="{URL}"><PARAM NAME=quality VALUE=high> <PARAM NAME=scale VALUE=noborder> <PARAM NAME=wmode VALUE=transparent> <PARAM NAME=bgcolor VALUE=#000000> 
  <EMBED src="{URL}" quality=high scale=noborder wmode=transparent bgcolor=#000000 WIDTH={WIDTH} HEIGHT={HEIGHT} TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">
</EMBED></OBJECT><!-- END flash --> 

<!-- BEGIN GVideo -->
<object width="425" height="350">
        <param name="movie" value="http://video.google.com/googleplayer.swf?docId={GVIDEOID}"></param>
<embed style="width:400px; height:326px;" id="VideoPlayback"
        align="middle" type="application/x-shockwave-flash"
        src="http://video.google.com/googleplayer.swf?docId={GVIDEOID}"
        allowScriptAccess="sameDomain" quality="best" bgcolor="#ffffff"
        scale="noScale" salign="TL"  FlashVars="playerMode=embedded">
</embed>
</object><br />
<a href="http://video.google.com/googleplayer.swf?docId={GVIDEOID}" target="_blank">{GVIDEOLINK}</a><br />
<!-- END GVideo -->

<!-- BEGIN youtube -->
<object width="425" height="350">
   <param name="movie" value="http://www.youtube.com/v/{YOUTUBEID}"></param>
   <embed src="http://www.youtube.com/v/{YOUTUBEID}" type="application/x-shockwave-flash" width="425" height="350"></embed>
</object><br />
<a href="http://youtube.com/watch?v={YOUTUBEID}" target="_blank">{YOUTUBELINK}</a><br />
<!-- END youtube -->

<!-- BEGIN stream --><object id="wmp" width=300 height=70 classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95"
codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,0,0" 
standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject"> 
<param name="FileName" value="{URL}"> 
<param name="ShowControls" value="1"> 
<param name="ShowDisplay" value="0"> 
<param name="ShowStatusBar" value="1"> 
<param name="AutoSize" value="1"> 
<param name="autoplay" value="0"> 
<embed type="application/x-mplayer2" 
pluginspage="http://www.microsoft.com/windows95/downloads/contents/wurecommended/s_wufeatured/mediaplayer/default.asp" 
src="{URL}" name=MediaPlayer2 showcontrols=1 showdisplay=0 showstatusbar=1 autosize=1 autoplay=0 visible=1 animationatstart=0 transparentatstart=1 loop=0 height=70 width=300> 
</embed> 
</object><!-- END stream -->

<!-- BEGIN video -->
<div align="left"><embed src="{URL}" autoplay="false" width={WIDTH} height={HEIGHT}></embed></div>
<!-- END video -->

<!-- BEGIN web --><iframe width="100%" height="350" src="{URL}"></iframe><!-- END web -->

<!-- BEGIN hr --><hr noshade color='#000000' size='1'><!-- END hr -->

<!-- BEGIN fade_open -->
<span style="height: 1; Filter: Alpha(Opacity=100, FinishOpacity=0, Style=1, StartX=0, FinishX=100%)">
<!-- END fade_open -->
<!-- BEGIN fade_close -->
</span>
<!-- END fade_close -->