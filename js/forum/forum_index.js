function view_forum_index_top()
{
       d.write('<div id="container">');
       d.write('<div id="fTop">'+PNGImage('forum/design/ftop.gif','forum/design/ftop.png',783,299)+'</div>');
       d.write('<div id="wingsPlace"></div>');
       d.write('<div id="mainCols">');
       d.write('<table cellpadding="0" cellspacing="0" width="100%" border="0">');
       d.write('<tr><td><table cellpadding="0" cellspacing="0" width="100%" border="0"><tr height="208"><td width="184">'+PNGImage('forum/design/left_col.gif','forum/design/left_col.png',184,208)+'</td><td width="174">'+PNGImage('forum/design/left_tent.gif','forum/design/left_tent.png',174,208)+'</td><td class="leftTent" width="50%">&nbsp;</td><td class="rightTent" width="50%">&nbsp;</td><td width="172">'+PNGImage('forum/design/right_tent.gif','forum/design/right_tent.png',172,208)+'</td><td width="184">'+PNGImage('forum/design/right_col.gif','forum/design/right_col.png',184,208)+'</td></tr><tr height="91"><td align="right"><img src="http://'+img_host+'/forum/design/left_colum.gif" width="164" height="91" border="0"></td><td colspan="4">&nbsp;</td><td align="left"><img src="http://'+img_host+'/forum/design/right_colum.gif" width="164" height="91" border="0"></td></tr></table></td></tr>');
       d.write('<tr>');
       d.write('<td valign="top" width="100%">');
       d.write('<div id="tableForum">');
       d.write('<table cellpadding="0" cellspacing="0" width="100%" align="center" border="0">');
}

function view_forum_index_category(arr,sta)
{
       var w = sta > 0 ? 'w' : '';
       var all_forum = arr[2].length - 1;
       var i = 0;
       
       d.write('<tr><td width="70" height="29"><img src="http://'+img_host+'/forum/design/c1'+w+'.gif" width="70" height="29" border="0"></td><td align="left"><img src="http://'+img_host+'/forum/design/c2'+w+'.gif" width="45" height="29" border="0"></td><td>&nbsp;</td><td align="right"><img src="http://'+img_host+'/forum/design/c3'+w+'.gif" width="43" height="29" border="0"></td><td width="70" height="29"><img src="http://'+img_host+'/forum/design/c4'+w+'.gif" width="70" height="29" border="0"></td></tr>');
       d.write('<tr><td><img src="http://'+img_host+'/forum/design/c5'+w+'.gif" width="70" height="39" border="0"></td><td width="80%"><table cellpadding="0" cellspacing="0" width="100%" border="0"><tr><td valign="top" width="50%" class="tbg" style="padding-top: 7px; padding-right: 7px" nowrap="nowrap"><span class="forumTitle">'+arr[0]+'</span></td><td width="28"><img src="http://'+img_host+'/forum/design/te1.gif" width="28" height="39" border="0"></td><td style="background: url(\'http://'+img_host+'/forum/design/tbgg.gif\') repeat-x">&nbsp;</td><td width="7"><img src="http://'+img_host+'/forum/design/tbgg2.gif" width="7" height="39" border="0"></td></tr></table></td><td class="tbg3"><strong>Тем&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Ответов</td><td><table cellpadding="0" cellspacing="0" width="100%" border="0"><tr><td width="30"><img src="http://'+img_host+'/forum/design/ttt1.gif" width="30" height="39" border="0"></td><td class="ttbg" align="left"><strong>Последнее</strong></td></tr></table></td><td><img src="http://'+img_host+'/forum/design/c6'+w+'.gif" width="70" height="39" border="0"></td></tr>');
       for(i=0; i<=all_forum; i++) view_forum_index_sub(arr[2][i],(i < all_forum ? 0 : 1));
       d.write('<tr><td><img src="http://'+img_host+'/forum/design/c7.gif" width="70" height="69" border="0"></td><td align="left" class="bbg"><img src="http://'+img_host+'/forum/design/c9.gif" width="12" height="69" border="0" align="left" style="float: left;"><img src="http://'+img_host+'/forum/design/c12.gif" width="14" align="right" style="float: right;" height="69" border="0"></td><td class="bbg"><img src="http://'+img_host+'/forum/design/c11.gif" width="201" height="69" border="0"></td><td align="right" class="bbg"><img src="http://'+img_host+'/forum/design/c13.gif" width="7" height="69" border="0" align="left"><img src="http://'+img_host+'/forum/design/c10.gif" align="right" width="10" height="69" border="0"></td><td><img src="http://'+img_host+'/forum/design/c8.gif" width="70" height="69" border="0"></td></tr>');
}

function view_forum_index_sub(arr,end)
{
       var strtime = arr[6].split('.');                                                                                     
       var nick = Nickname(arr[8],arr[9],arr[10],arr[11],arr[7],0);
       d.write('<tr><td valign="top" class="forBg1">&nbsp;</td><td bgcolor="#FFFFFF" class="forumLine'+(!end ? '' : 'End')+'"><table cellpadding="0" cellspacing="0" border="0"><tr><td align="left" width="22"><img src="http://'+img_host+'/forum/design/ico.gif" width="16" height="34" border="0"></td><td><a href="/'+arr[0]+'/" class="fLink">'+arr[1]+'</a><br>'+arr[3]+'</td></tr></table></td><td class="forBg3'+(!end ? '' : 'End')+'" align="center"><table cellpadding="0" cellpadding="0" border="0" width="150"><tr><td align="center" width="40%"><span class="redText">'+arr[4]+'</span></td><td align="center"><span class="redText">'+arr[5]+'</span></td></tr></table></td><td bgcolor="#FFFFFF" nowrap class="forumLineLast'+(!end ? '' : 'End')+'">'+(nick ? '<span class="nick">'+nick+'</span><br>'+strtime[0]+' '+mo[strtime[1]]+' '+strtime[2] : 'нет сообщений')+'</td><td valign="top" class="forBg2">&nbsp;</td></tr>');
}

function view_forum_index_bottom()
{
       d.write('</table>');
       d.write('</div>');
       d.write('</td></tr>');
       d.write('<tr><td><table cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tr height="45"><td class="lColBg">&nbsp;<div id="bLeft">'+PNGImage('forum/design/b1.gif','forum/design/b1.png',158,42)+'</div></td><td><img src="http://'+img_host+'/forum/design/spacer.gif" width="1" height="45" border="0"></td><td class="rColBg">&nbsp;<div id="bRight">'+PNGImage('forum/design/b2.gif','forum/design/b2.png',158,42)+'</div></td></tr></table></td></tr>');	
       d.write('</table>');
       BottomLinks();
}

function view_forum_index()
{
       var i;
       var all_categ = fdata.length - 1;
       view_forum_index_top();
       for(i=0; i<=all_categ; i++) view_forum_index_category(fdata[i],(i > 0 ? 1 : 0));
       view_forum_index_bottom();
}