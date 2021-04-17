<?php

include( $_SERVER["DOCUMENT_ROOT"] . "/includes/config.inc.php");
include( DROOT . "/includes/functions.inc.php");

$pers = GetUser();
if($_COOKIE['level']>0 and $_COOKIE['forum_accesses'] == 0){
	mysql_query("UPDATE `users` SET `forum_accesses` = '1' WHERE `uid`='".$_COOKIE['uid']."'");
}

echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>Главная - Просмотр разделов';
echo $_get['uid'];
echo'</TITLE>
<LINK href="/css/forum/forum.css" rel="STYLESHEET" type="text/css">
<META Http-Equiv="Content-Type" Content="text/html; charset=utf-8">
<META Http-Equiv="Cache-Control" Content="No-Cache">
<META Http-Equiv="Pragma" Content="No-Cache">
<META Http-Equiv="Expires" Content="0">
<SCRIPT src="/js/forum/forum_index.js"></SCRIPT>
<SCRIPT src="/js/forum/forum_v02.js"></SCRIPT>
<SCRIPT src="/js/signs.js"></SCRIPT>
<SCRIPT src="/js/ft_v01.js"></SCRIPT>
<SCRIPT src="/js/png.js"></SCRIPT>
</HEAD>
<BODY onResize="FPC();" onLoad="Init();">

<SCRIPT language="JavaScript">
var d = document;
var img_host = "'.IMG.'";
var fmain = ['.$_GET['f'].','.$_GET['p'].','.$_GET['id'].','.$_GET['tp'].','.($pers['forum_accesses']?joe_bit($pers['forum_accesses']):0).','.joe_bit($pers['forum_smiles']).',"'.vCode().'",'.$pers['forum_lastmsg'].'];
var fdata = [';
$a=0;
$query1=mysql_query("SELECT * FROM `forum_cat` ORDER BY `listorder` ASC");
//Показываем Категории
while($cat=mysql_fetch_array($query1))
{
	$a++;
	echo"['".$cat['name']."','none.gif',[";
	$b=0;
	$query2=mysql_query("SELECT * FROM `forum_section` WHERE `cid`='".$cat['id']."' ORDER BY `listorder` ASC");
	//Показываем разделы
	while( $sec = mysql_fetch_array($query2) )
	{
		## Добавим проверку на доступ
		if ( $sec['access']==2 and $pers['sign']!='watchers' ) continue;
		if ( $sec['access']==2 ) $sec['name'] = '<font color=red>'.$sec['name'].'</font>';
		
		$b++;
		$poster=explode("|",lastp_user($sec['id']));
		echo"[".$sec['id'].",'".$sec['name']."','none.gif','".$sec['desc']."',".topic_count($sec['id']).",".post_count($sec['id'],'fid').",'".lastp_time($sec['id'])."',".$poster['4'].",'".$poster['0']."',".$poster['1'].",'".$poster['2']."','".$poster['3']."','<a href=\"/".$sec['id']."/\">".$sec['name']."</a>']";
		if($b!=mysql_num_rows($query2)){echo",";}
	}
	echo"]]";
	if($a!=mysql_num_rows($query1)){echo",";}
}
echo'];
view_forum_index();
</SCRIPT>

</BODY>
</HTML>';
echo $pers;
?>