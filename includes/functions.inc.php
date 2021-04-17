<?php

function GetUser(){
	$res = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `uid`='".intval($_COOKIE['uid'])."' and `pass`='".mysql_real_escape_string($_COOKIE['hashcode'])."' LIMIT 1;"));
	if ( $res['silence_forum'] > time() ) return false;
	return $res;
}
function PosterIns($uid){
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `uid` = '".$uid."'"));
	if ( !empty($user['sign']) and $user['sign'] != 'none' )
		$user['align'] = mysql_result(mysql_query("SELECT `align` FROM `clans` WHERE `sign` = '".$user['sign']."'"),0);
	if ( $user['sign'] == 'watchers' ) $user['sign'] = 'watch/'.$user['clan_state'];
	return $user['user']."|".$user['level']."|".$user['sign']."|".$user['align']."|0|0";
}
function topic_count($id){
	$num = mysql_num_rows(mysql_query("SELECT * FROM `forum_topics` WHERE `fid`='".$id."'"));
	return $num;
}
function post_count($id,$line){
	$num = mysql_num_rows(mysql_query("SELECT * FROM `forum_posts` WHERE `".$line."`='".$id."'"));
	return $num;
}
function lastp_time($id){
	$row = mysql_fetch_array(mysql_query("SELECT `lastmsg` FROM `forum_topics` WHERE `fid`='".$id."' ORDER BY `lastmsg` DESC LIMIT 1;"));
	return date("j.n.Y H:i",$row['lastmsg']);
}
function lastp_user($id){
	$row = mysql_fetch_array(mysql_query("SELECT `lposter` FROM `forum_topics` WHERE `fid`='".$id."' ORDER BY `lastmsg` DESC LIMIT 1"));
	return $row['lposter'];
}
function cat_name($id){
	$row = mysql_fetch_array(mysql_query("SELECT `name` FROM `forum_cat` WHERE `id`='".$id."'"));
	return $row['name'];
}
function vCode(){
	$vcode=md5(time().rand(100,10000));
	$_SESSION['vcode'][]=$vcode;
	return $vcode;
}
function access_build($array,$val=NULL,$cheange=NULL)
{
	$result = '';
	$i=1;
	foreach ($array as $value){
		$i++;
		if($value == $val){
			$result .= $cheange;
		}else{
			$result .= $value;
		}
		if($i <= count($array)){
				$result .= "|";
		}
	}
	return $result;
}
function ForumSearch($keyword)
{
	$keyword = trim($keyword);
	$keyword = stripslashes($keyword);
	$keyword = htmlspecialchars($keyword);
	
	$Params = explode("|",$Params);
	$query = mysql_query("SELECT * FROM `forum_topics` WHERE `fid`='".$_GET['f']."' AND `name` LIKE '%".strtoupper($keyword)."%' ORDER BY `fixed` DESC ,`lastmsg` DESC LIMIT 100");
	
	$Result = '';
	$i = 0;
	if (mysql_num_rows($query) > 0){
		$row = mysql_fetch_array($query);
		do{
			$i++;
			$poster=explode("|",$row['poster']);
			$lposter=explode("|",$row['lposter']);
			$Result .= '['.$row['id'].',"none.gif","'.$row['name'].'",'.$row['fixed'].','.$row['close'].','.post_count($row['id'],'tid').','.$row['looks'].',"'.$poster['0'].'",'.$poster['1'].',"'.$poster['2'].'","'.$poster['3'].'",'.$poster['4'].',"'.date("j.n.Y H:i",$row['lastmsg']).'","'.$lposter['0'].'","'.$lposter['1'].'","'.$lposter['2'].'","'.$lposter['3'].'",'.$lposter['4'].']';
			if($i!=mysql_num_rows($query)){
				$Result .= ",";
			}
		}
		while ($row = mysql_fetch_array($query));
	}
	return $Result;
}
function TopicSearch($keyword){
	global $_GET;
	$keyword = trim($keyword);
	$keyword = stripslashes($keyword);
	$keyword = htmlspecialchars($keyword);
	
	$Params = explode("|",$Params);
	$query = mysql_query("SELECT * FROM `forum_posts` WHERE `tid`='".$_GET['id']."' AND `msg` LIKE '%".strtoupper($keyword)."%' ORDER BY `id` ASC LIMIT 100");
	
	$Result = '';
	if (mysql_num_rows($query) > 0){
		$row = mysql_fetch_array($query);
		do{
			$poster=explode("|",$row['poster']);
			$hposter=explode("|",$row['hposter']);
			$Result .= ',['.$row['id'].',"none.gif","'.$poster['0'].'",'.$poster['1'].',"'.$poster['2'].'","'.$poster['3'].'",0,0,"'.date("j.n.Y H:i",$row['time']).'","'.($row['hide']?'Скрытое сообщение':$row['name']).'","'.($row['hide']?'Скрытое сообщение':$row['msg']).'","'.$hposter['0'].'",'.$hposter['1'].',"'.$hposter['2'].'","'.$hposter['3'].'",0,'.$row['hide'].']';	
		}
		while ($row = mysql_fetch_array($query));
	}
	return $Result;
}

function joe_bit($arr)
{
	$int = 0; $pr = explode('|', $arr);
	foreach ($pr as $v) $int |= (int)$v;
	return $int;
}


//Get Links
if(empty($_GET['f'])){
	$_GET['f']=0;
}
if(empty($_GET['p'])){
	$_GET['p']=1;
}
if(empty($_GET['id'])){
	$_GET['id']=0;
}
if(empty($_GET['tp'])){
	$_GET['tp']=1;
}
?>