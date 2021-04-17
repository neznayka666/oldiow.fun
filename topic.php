<?php
echo $pers;


include( $_SERVER["DOCUMENT_ROOT"] . "/includes/config.inc.php");
include( DROOT . "/includes/functions.inc.php");

$pers = GetUser();

if( $pers['level']>0 and $pers['forum_accesses'] == 0 )
{
	mysql_query("UPDATE `users` SET `forum_accesses` = '1' WHERE `uid`='".$pers['uid']."'");
}

$forums_result=mysql_fetch_array(mysql_query("SELECT * FROM `forum_section` WHERE `id`='".$_GET['f']."'"));
$forum_topic=mysql_fetch_array(mysql_query("SELECT * FROM `forum_topics` WHERE `id`='".$_GET['id']."'"));
//Pages
$post_counts = mysql_num_rows(mysql_query("SELECT * FROM `forum_posts` WHERE `tid`='".$forum_topic['id']."'"));
$page = (intval($_GET['tp'])-1)*20;
if($page>(($post_counts/20)*20)){
	$page = ceil(($post_counts/20)*20);	
	$_GET['tp'] = ceil($post_counts/20);
	$post_counts = 0;
}
if($page<0){
	$page = 0;	
	$_GET['tp'] = 1;
}
//End Pages

if(!empty($_POST['search'])){
	$SearchResult = TopicSearch($_POST['search']);
}

$access = explode("|",$pers['forum_accesses']);
$fmain_access = access_build($access);

if($forum_topic['close']=='1'){
	$fmain_access = access_build($access,1,0);
}
if($pers['forum_lastmsg']>time()){
	$fmain_access = access_build($access,1,0);
}




echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>'.$forum_topic['name'].' - Просмотр темы</TITLE>
<LINK href="/css/forum/forum.css" rel="STYLESHEET" type="text/css">
';
if(in_array('64',$access) or in_array('256',$access) or in_array('8192',$access)){
echo'<LINK href="/css/forum/nyroModal.css" rel="STYLESHEET" type="text/css">
';
}
echo'<META Http-Equiv="Content-Type" Content="text/html; charset=utf-8">
<META Http-Equiv="Cache-Control" Content="No-Cache">
<META Http-Equiv="Pragma" Content="No-Cache">
<META Http-Equiv="Expires" Content="0">
<SCRIPT src="/js/forum/forum_topic.js"></SCRIPT>
<SCRIPT src="/js/forum/forum_v02.js"></SCRIPT>
';
if(in_array('64',$access) or in_array('256',$access) or in_array('8192',$access)){
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
if(in_array('8192',$access)){
	echo'EditPost = function(id){$.nyroModalManual({url: \'/action/?act=8&f=\'+fmain[0]+\'&p=\'+fmain[1]+\'&id=\'+fmain[2]+\'&tp=\'+fmain[3]+\'&rid=\'+id,width:\'650\'});}
';
}
if ( $forums_result['access']==2 and $pers['sign']!='watchers' ) ; 
else {

	$poster=explode("|",$forum_topic['poster']);
	echo'var fdata = ["'.cat_name($forums_result['cid']).'","'.$forums_result['name'].'","none.gif","'.$forum_topic['name'].'",'.$forum_topic['fixed'].','.$forum_topic['close'].',"'.$poster['0'].'",'.$poster['1'].',"'.$poster['2'].'","'.$poster['3'].'","default_avatar",'.$poster['4'].',0,"'.$forum_topic['msg'].'",'.((empty($_POST['search']))?$post_counts:'0').',"'.date("j.n.Y H:i",$forum_topic['create']).'"';

	if(!empty($_POST['search']))
	{
		echo $SearchResult;
	}
	elseif(empty($_POST['search']))
	{
		$i=0;
		$query=mysql_query("SELECT * FROM `forum_posts` WHERE `tid`='".$forum_topic['id']."' ORDER BY `id` ASC LIMIT ".$page.",20");
		while($row=mysql_fetch_array($query))
		{
			$i++;
			$poster=explode("|",$row['poster']);
			$hposter=explode("|",$row['hposter']);	
			echo',['.$row['id'].',"none.gif","'.$poster['0'].'",'.$poster['1'].',"'.$poster['2'].'","'.$poster['3'].'",0,0,"'.date("j.n.Y H:i",$row['time']).'","'.($row['hide']?'Скрытое сообщение':$row['name']).'","'.($row['hide']?'Скрытое сообщение':$row['msg']).'","'.$hposter['0'].'",'.$hposter['1'].',"'.$hposter['2'].'","'.$hposter['3'].'",0,'.$row['hide'].']';	
		}
	}
	mysql_query("UPDATE `forum_topics` SET `looks`=looks+1 WHERE `id`='".$forum_topic['id']."'");
	echo"];\n";
}
echo 'view_forum_topic();
</SCRIPT>

</BODY>
</HTML>';
?>