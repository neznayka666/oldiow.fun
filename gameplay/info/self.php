<?php
/*
if ($player->pers["invisible"]>tme()) {$_INV = 1;$player->pers["cfight"]=0;$player->pers["online"]=0;} else $_INV = 0;
if ($player->pers["online"]==1) 
{
if ($player->pers["location"]<>'out')
$location = $db->sqla("SELECT name FROM `locations` WHERE `id`='".$player->pers["location"]."'");
else 
$location = $db->sqla("SELECT name FROM `nature` WHERE `x`='".$player->pers["x"]."' and `y`='".$player->pers["y"]."' ;");
$_ONLINE = "[".$player->pers["online"].",'".tp($curtimeonline=(tme()-$player->pers["lastvisits"]))."','".$location["name"]."',".$player->pers["x"].",".$player->pers["y"].",".$player->pers["cfight"]."]";
}
else
{
	$location["name"] = '';
	
	if ($preveleg) 
	{
		if ($player->pers["location"]<div>'out')
		$location = $db->sqla("SELECT name FROM `locations` WHERE `id`='".$player->pers["location"]."'");
		else 
		$location = $db->sqla("SELECT name FROM `nature` WHERE `x`='".$player->pers["x"]."' and `y`='".$player->pers["y"]."' ;");
		if ($player->pers["invisible"]>tme()) {$_INV = 1;$player->pers["cfight"]=0;} else $_INV = 0;
	}
	$_ONLINE = "[".$player->pers["online"].",'0','".$location["name"]."',0,0,".$player->pers["cfight"].",".$_INV."]";
	
}
*/
/*
$INFO_TEXT = '';
$INFO_TEXT .= '<table style="width: 100%"> <tr> <td class="title">ФОТОГРАФИЯ</td> </tr> <tr> <td align=center class=loc>';
if ($player->pers["photo"])
 $INFO_TEXT .= "<img src='http://".IMG."/photos/".$player->pers["uid"]."_".$player->pers["photo"].".jpg'>";
else 
$INFO_TEXT .= "<font class=puns>Нет фотографии</font>";
$INFO_TEXT .='</td></tr></table>';
*/
$chars = $db->sqla("SELECT about FROM chars WHERE uid=".$player->pers["uid"]);
$INFO_TEXT1 .= "<p>Имя:<b> ".htmlspecialchars($player->pers["name"])."</b></p>";
$INFO_TEXT1 .= "<p>Город:<b> ".htmlspecialchars($player->pers["city"])."</b></p>";
$INFO_TEXT1 .= "<p>Страна:<b> ".htmlspecialchars($player->pers["country"])."</b></p>";
if ($player->pers["icq"])$INFO_TEXT1 .= "<p>ICQ:<b> ".$player->pers["icq"]."</b><img src='http://web.icq.com/whitepages/online?icq=".$player->pers["icq"]."&img=26' height=12></p>";
if ($player->pers["vkid"])$INFO_TEXT1 .= "<p>ВКонтакте:<b><a class=timef target=_blank href='http://vkontakte.ru/profile.php?id=".$player->pers["vkid"]."'>".$player->pers["vkid"]."</a></b></p>";
if ($player->pers["pol"]=="male") $INFO_TEXT1 .= "<p>Пол:<b> Мужской</b><br>" ; else $INFO_TEXT1 .= "Пол:<b> Женский</b></p>";
if ($chars["about"]) $INFO_TEXT1 .= "<p><font >О СЕБЕ</font><br>".str_replace ("
","</p>",$chars["about"]);
/*
if ($you) $rep = '<a href="javascript:report();" class=bg>Написать отзыв</a>'; else $rep = '';
echo '<script>head('.$_ONLINE.',\''.$player->pers["user"].'\');</script><table style="width: 100%"> <tr> <td style="width: 60%" valign=top id=main>'.$INFO_TEXT.'</td> <td style="width: 40%" id=reports align=center valign=top><hr><div id=report>'.$rep.'</div></td> </tr></table> '; 
*/
echo '
<div id="about">
<table style="width: 98%;background-color:#dab69e;border-radius:3px;margin:0 auto;padding:5px;"> <tr> <td valign=top>'.$INFO_TEXT1.'</td></tr></table>
</div>';
echo '<div id="wttable">'.$INFO_INC.'</div>';
// Подарки
##################
echo "<script>";
$count_prs = $db->sqlr("SELECT COUNT(*) FROM presents_gived WHERE uid=".$player->pers["uid"],0);
echo "var prs = [".$count_prs."";
$prs = $db->sql("SELECT * FROM presents_gived WHERE uid=".$player->pers["uid"]);
while ($p = mysql_fetch_assoc($prs))
{
	$who = $p["who"];
	if (!$preveleg and $p["anonymous"]) $who = 'Анонимно';
	$p["name"] = str_replace("\r\n","",$p["name"]);
	echo ",['".str_replace('"','',$p["name"])."','".$p["image"]."','".$who."','".date("d.m.Y H:i",$p["date"])."','".$p["text"]."']";
}
echo "];show_presents();";
echo "</script>";
###################

# Удалить отзыв
/*
if (@$_POST["deleterep"]) 
{
	echo 1;
	$r = $db->sql("SELECT * FROM reports_for_users WHERE uid=".$player->pers["uid"]." and date=".intval($_POST["deleterep"])."");
	if ($r["who"]==$you["user"] or $you["user"]==$player->pers["user"] or $preveleg)
	$db->sql("DELETE FROM reports_for_users WHERE uid=".$player->pers["uid"]." and date=".intval($_POST["deleterep"])."");
}
*/
#Добавить отзыв:
/*
if (@$_POST["report"] and $you["money"]>=50)
{
	$umg = ( $you['sign'] == 'watchers' ) ? 'watch/'.$you['clan_state'] : $you['sign'];
	$db->sql("INSERT INTO `reports_for_users` ( `uid` , `lvl` , `sign` , `date` , `who` , `text` ) 
	VALUES ('".$player->pers["uid"]."', '".$you["level"]."', '".$umg."', '".tme()."'
	, '".$you["user"]."', '".str_replace("'","",$_POST["report"])."');");
	say_to_chat ("s","<font class=user onclick=\"top.say_private(\'".$you["user"]."\')\">".$you["user"]."</font> написал вам отзыв.",1,$player->pers["user"],'*',0);
	set_vars("money=money-20",$you["uid"]);
}
*/
# Отзывы
/*
echo "<script>";
if (empty($_GET["all_reports"]))
$rep = $db->sql("SELECT * FROM reports_for_users WHERE uid=".$player->pers["uid"]." ORDER BY date DESC LIMIT 7;");
else
$rep = $db->sql("SELECT * FROM reports_for_users WHERE uid=".$player->pers["uid"]." ORDER BY date DESC");
echo "rep_text +='<table border=0 width=320 cellspacing=0 cellpadding=0 class=fightlong><tr><td class=brdr>ОТЗЫВЫ: <a href=\"info.php?".$player->pers["user"]."&no_watch=1&&all_reports=1&self=1\" class=nt>[ВСЕ]</a></td></tr>';";
$k = 0;
while($r = mysql_fetch_assoc ($rep))
{
	$k++;
	$del = 0;
	$r["text"] = str_replace("\r\n","<br>",$r["text"]);
	$r["text"] = str_replace("\n","<br>",$r["text"]);
	$r["text"] = str_replace("\r","<br>",$r["text"]);
	$r["text"] = str_replace("'","\'",$r["text"]);
	if ($r["who"]==$you["user"] or $you["user"]==$player->pers["user"] or $preveleg)$del = $r["date"];
	echo "pr_r('".$r["who"]."',".$r["lvl"].",'".$r["sign"]."','".date("d.m.Y H:i",$r["date"])."','".$r["text"]."',".$del.");";
}
if ($k==0) echo "rep_text +='<tr><td class=time>Здесь пока никто не написал</td></tr>';";
echo "rep_text +='</table>';";
echo "document.getElementById('reports').innerHTML += rep_text;";
echo "</script>";
*/
?>