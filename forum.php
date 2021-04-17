<?php
echo $pers;
include( $_SERVER["DOCUMENT_ROOT"] . "/includes/config.inc.php");
include( DROOT . "/includes/functions.inc.php");

$pers = GetUser();
if($pers['level']>0 and $pers['forum_accesses'] == 0)
{
	mysql_query("UPDATE `users` SET `forum_accesses` = '1' WHERE `uid`='".$pers['uid']."'");
}

$access = explode("|",$pers['forum_accesses']);
$fmain_access = ($pers['forum_lastmsg']>time())?access_build($access,1,0):access_build($access);

$forums_result=mysql_fetch_array(mysql_query("SELECT * FROM `forum_section` WHERE `id`='".$_GET['f']."'"));
//Pages
$topic_counts = topic_count($forums_result['id']);
$page = (intval($_GET['p'])-1)*20;
if($page>(($topic_counts/20)*20))
{
	$page = ceil(($topic_counts/20)*20);	
	$_GET['p'] = ceil($topic_counts/20);
	$topic_counts = 0;
}
if($page<0)
{
	$page = 0;	
	$_GET['p'] = 1;
}
//End Pages

if(!empty($_POST['search'])){
	$SearchResult = ForumSearch($_POST['search']);
}

echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>'.$forums_result['name'].' - Просмотр форума</TITLE>
<LINK href="/css/forum/forum.css" rel="STYLESHEET" type="text/css">
';
if(in_array('256',$access)){
echo'<LINK href="/css/forum/nyroModal.css" rel="STYLESHEET" type="text/css">
';
}
echo'<META Http-Equiv="Content-Type" Content="text/html; charset=utf-8">
<META Http-Equiv="Cache-Control" Content="No-Cache">
<META Http-Equiv="Pragma" Content="No-Cache">
<META Http-Equiv="Expires" Content="0">
<SCRIPT src="/js/forum/forum_inner.js"></SCRIPT>
<SCRIPT src="/js/forum/forum_v02.js"></SCRIPT>
';
if(in_array('256',$access)){
echo'<SCRIPT src="/js/jQuery.js"></SCRIPT>
<SCRIPT src="/js/jquery.nyroModal.js"></SCRIPT>
';
}
echo'<SCRIPT src="/js/signs.js"></SCRIPT>
<SCRIPT src="/js/ft_v01.js"></SCRIPT>
<SCRIPT src="/js/png.js"></SCRIPT>
</HEAD>
<BODY onResize="FPC();" onLoad="Init();">

<SCRIPT language="JavaScript">
var d = document;
var img_host = "'.IMG.'";
var fmain = ['.$_GET['f'].','.$_GET['p'].','.$_GET['id'].','.$_GET['tp'].','.joe_bit($fmain_access).','.joe_bit($pers['forum_smiles']).',"'.vCode().'",'.$pers['forum_lastmsg'].'];
';
if(in_array('64',$access)){
	echo'MoveTop = function(id){$.nyroModalManual({url: \'/action/?act=3&f=\'+fmain[0]+\'&p=\'+fmain[1]+\'&id=\'+id+\'&tp=\'+fmain[3],width:\'650\'});}
';	
}
if(in_array('256',$access)){
	echo'EditTop = function(id){$.nyroModalManual({url: \'/action/?act=5&f=\'+fmain[0]+\'&p=\'+fmain[1]+\'&id=\'+id+\'&tp=\'+fmain[3],width:\'650\'});}
';	
}
if ( $forums_result['access']==2 and $pers['sign']!='watchers' ) ; 
else {

	echo'var fdata = ["'.cat_name($forums_result['cid']).'","'.$forums_result['name'].'",'.((empty($_POST['search']))?$topic_counts:'0').',';
	
	if(!empty($_POST['search']))
	{
		echo $SearchResult;
	}
	elseif(empty($_POST['search']))
	{
		$i=0;
		$query=mysql_query("SELECT * FROM `forum_topics` WHERE `fid`='".$_GET['f']."' ORDER BY `fixed` DESC ,`lastmsg` DESC LIMIT ".$page.",20");
		while($row=mysql_fetch_array($query))
		{
			$i++;
			$poster=explode("|",$row['poster']);
			$lposter=explode("|",$row['lposter']);
			echo'['.$row['id'].',"none.gif","'.$row['name'].'",'.$row['fixed'].','.$row['close'].','.post_count($row['id'],'tid').','.$row['looks'].',"'.$poster['0'].'",'.$poster['1'].',"'.$poster['2'].'","'.$poster['3'].'",'.$poster['4'].',"'.date("j.n.Y H:i",$row['lastmsg']).'","'.$lposter['0'].'","'.$lposter['1'].'","'.$lposter['2'].'","'.$lposter['3'].'",'.$lposter['4'].']';
			if($i!=mysql_num_rows($query)){
				echo",";
			}
		}
	}
	echo"];\n";
}
echo 'view_forum_inner();
</SCRIPT>

</BODY>
</HTML>';
?>