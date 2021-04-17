<center><table border=0 width=80%>
<tr>
<td class=return_win align=center>
<?
$clan = sqla ("SELECT * FROM `clans` WHERE `sign`='".$pers['sign']."'");

echo "<center class=but>У вас с собой <b>".$pers["dmoney"]."  Бр.</b></center>";
echo "<center class=login>На счету клана <b>".$clan["dmoney"]."  Бр.</b></center>";

if (@$_POST["dk2"])
{
	$k=abs(intval($_POST["dk2"]));
	$ye = floor($k/4500);
	if ($k>0 and $k<$pers["money"] and $ye>0)
	{
	$k = $ye*4500;
	sql("UPDATE users SET money=money-".$k.", dmoney=dmoney+".$ye." WHERE uid=".$pers["uid"]."");
	echo "<div class=return_win>Вы удачно обменяли ".$k."<img src=images/money.gif> на ".$ye." БР.</div>";
	}
}

if (@$_POST["dk"])
{
	$k=abs(intval($_POST["dk"]));
	$ye = floor($k/30);
	if ($k>0 and $k<$pers["money"] and $ye>0)
	{
	$k = $ye*30;
	sql("UPDATE users SET money=money-".$k.", coins=coins+".$ye." WHERE uid=".$pers["uid"]."");
	echo "<div class=return_win>Вы удачно обменяли ".$k."<img src=images/money.gif> на ".$ye." Паргамент(ов)</div>";
	}
}

echo "<div class=weapons_box><a href=main.php?c=individual class=bg>Мастер сборки индивидуальных артефактов.</a></div>";
if (substr_count($pers["rank"],"<glav>"))echo "<div class=weapons_box><a href=main.php?c=clan class=bg>Мастер сборки клановых артефактов.</a></div>";
if (@$_GET["c"]=='clan') include("inc/clans_arts.php");
elseif (@$_GET["c"]=='individual') include("inc/individual.php");
elseif (@$_GET["c"]=='indap') include("inc/indap.php");
//elseif (@$_GET["c"]=='clap') include("inc/clap.php");
else
{
//Покупаем  вещь
if (isset($_GET["buy"])) {
$v = sqla ("SELECT * FROM `weapons` WHERE `id`='".addslashes($_GET["buy"])."'");
if ($v["where_buy"]==1) {
if ($pers["dmoney"]<$v["dprice"]) echo "<b><font class=hp>Не хватает денег.</b></font>"; else
insert_wp($v["id"],$pers["uid"],-1,0,$pers["user"]);
$pers["dmoney"]-= $v["dprice"];
set_vars ("`dmoney`='".$pers["dmoney"]."'",UID);
echo "<br><font class=hp>Вы удачно купили \"".$v["name"]."\" за ".$v["dprice"]." y.e.</font>";
}}

if (isset($_GET["sbuy"]) and $clan["treasury"]<($clan["maxtreasury"]+30)) {
$v = sqla ("SELECT * FROM `weapons` WHERE `id`='".addslashes($_GET["sbuy"])."'");
if ($v["where_buy"]==1 and (substr_count($pers["rank"],"<inv>") or substr_count($pers["rank"],"<glav>"))) {
if ($pers["dmoney"]<$v["dprice"]) echo "<b><font class=hp>Не хватает денег.</b></font>"; else
sql("UPDATE wp SET clan_sign='".$pers["sign"]."' , clan_name='".$clan["name"]."', present='".$pers["user"]."' WHERE id=".insert_wp($v["id"],$pers["uid"],-1,0,$pers["user"]));
$pers["dmoney"]-= $v["dprice"];
set_vars ("`dmoney`='".$pers["dmoney"]."'",UID);
sql("UPDATE clans SET treasury=treasury+1 WHERE sign='".$pers["sign"]."'");
echo "<br><font class=hp>Вы удачно купили \"".$v["name"]."\" за ".$v["dprice"]." Бр. в клан казну!</font>";
}
}

if (isset($_GET["sfbuy"]) and $clan["treasury"]<($clan["maxtreasury"]+30)) {
$v = sqla ("SELECT * FROM `weapons` WHERE `id`='".addslashes($_GET["sfbuy"])."'");
if ($v["where_buy"]==1 and $pers["clan_state"]=='g') {
if ($clan["dmoney"]<$v["dprice"]) echo "<b><font class=hp>Не хватает денег.</b></font>";
else
{
sql("UPDATE wp SET clan_sign='".$pers["sign"]."' , clan_name='".$clan["name"]."', present='".$pers["user"]."' WHERE id=".insert_wp($v["id"],$pers["uid"],-1,0,$pers["user"]));
$clan["dmoney"]-= $v["dprice"];
sql ("UPDATE clans SET `dmoney`='".$clan["dmoney"]."',treasury=treasury+1 WHERE sign='".$pers["sign"]."'");
echo "<br><font class=hp>Вы удачно купили \"".$v["name"]."\" за ".$v["dprice"]." Бр. в клан казну (за счёт клана)!</font>";
}
}
}

if (isset($_GET["ar"]))
{
 $v = sqla ("SELECT * FROM `weapons` WHERE `id`='".addslashes($_GET["ar"])."'");
 if ($v["type"]<>'napad' and $v["type"]<>'zakl' and $v["type"]<>'teleport' and $v["stype"]<>'instrument')
 {
 if ($v["where_buy"]==1)
 {
		if (@$_GET["t"]==1) {$ft = 86400;$kk=0.05;}
		elseif (@$_GET["t"]==3) {$ft = 3*86400;$kk=0.1;}
		elseif (@$_GET["t"]==7) {$ft = 7*86400;$kk=0.15;}
		else {echo "go out!";exit;}
	if ($pers["dmoney"]<$v["dprice"]*$kk) echo "<b><font class=hp>Не хватает денег.</b></font>";
	else
	{
		sql("UPDATE wp SET timeout=".(time()+$ft)." WHERE id=".insert_wp($v["id"],$pers["uid"],-1,0,$pers["user"]));
		$pers["dmoney"]-= $v["dprice"]*$kk;
		set_vars("dmoney=".$pers["dmoney"]."",$pers["uid"]);
		echo "<br><font class=hp>Вы удачно арендовали \"".$v["name"]."\" за ".$v["dprice"]*$kk." Бр.!</font>";
	}
 }
}
}
//Лавка


$ti=time();

echo '<table border="0" cellpadding="0" width=100%>
	<tr>
		<td align="center" style="border-left-width: 1px; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"></td>
	</tr>
	<tr>
		<td align="center">';

if ($_FILTER["lavkatype"]=="") {
$_FILTER["lavkatype"]='shle';
$_FILTER["lavkaminlevel"]=0;
$_FILTER["lavkamaxlevel"]=$pers["level"];
$_FILTER["lavkamaxcena"]=5000;
$_FILTER["lavkasort"]="price";
}
?>
<p class=weapons_box>
<img src='images/locations/dd.jpg'>
</p>
<script> show_imgs_sell(); </script></td></tr><tr><td valign="top">
<?

echo '<form method="POST" action=main.php>
<table border="0" width="100%" cellspacing="0" class="fightlong">
	<tr>
		<td width="356">Обмен валюты: (30 <img src=images/money.gif> = 1 Пeргамент)</td>
		<td>&nbsp;<input type="text" name="dk" size="10" class=laar>
		LN
		<input type="submit" value="Обменять" class="login"></td>
	</tr>

    	<tr>
		<td width="356">Обмен валюты: (4500 <img src=images/money.gif> = 1 БР.)</td>
		<td>&nbsp;<input type="text" name="dk2" size="10" class=laar>
		LN
		<input type="submit" value="Обменять" class="login"></td>
	</tr>

</table></form><br>';
$lavka = 1;
if ($_FILTER["lavkatype"]!='napad')
	$stype = "`stype`='".$_FILTER["lavkatype"]."'";
	else
	$stype = "`type` = 'napad' ";

if ($_FILTER["lavkasort"]!='tlevel') $_FILTER["lavkasort"]='price';
$enures= sql ("SELECT * FROM `weapons` WHERE `tlevel`>='".$_FILTER["lavkaminlevel"]."' and `tlevel`<='".$_FILTER["lavkamaxlevel"]."' and `dprice`<='".$_FILTER["lavkamaxcena"]."' and ".$stype." and `where_buy`='1' ORDER BY `".$_FILTER["lavkasort"]."` ASC");
while ($vesh = mysql_fetch_array ($enures)) {

echo "<div class=weapons_box>";

$disabled = '';
if ($vesh["dprice"]>$pers["dmoney"]) $disabled = 'DISABLED';
echo "<div class=but2><input type=button class=inv_but onclick=\"w_buy('".$vesh["id"]."')\" value='Купить' ".$disabled."></div>";
 echo "<div class=but>";
if ($vesh["type"]<>'napad' and $vesh["type"]<>'zakl' and $vesh["type"]<>'teleport' and $vesh["stype"]<>'instrument' and $vesh["stype"]<>'rune')
{
$disabled = '';
if ($vesh["dprice"]*0.05>$pers["dmoney"]) $disabled = 'DISABLED';
echo "<input type=button class=inv_but onclick=\"location='main.php?ar=".$vesh["id"]."&t=1'\" value='Аренда 1 день [".($vesh["dprice"]*0.05)." Бр.]' ".$disabled."> ";
$disabled = '';
if ($vesh["dprice"]*0.1>$pers["dmoney"]) $disabled = 'DISABLED';
echo "<input type=button class=inv_but onclick=\"location='main.php?ar=".$vesh["id"]."&t=3'\" value='Аренда 3 дня [".($vesh["dprice"]*0.1)." Бр.]' ".$disabled."> ";
$disabled = '';
if ($vesh["dprice"]*0.15>$pers["dmoney"]) $disabled = 'DISABLED';
echo "<input type=button class=inv_but onclick=\"location='main.php?ar=".$vesh["id"]."&t=7'\" value='Аренда 7 дней [".($vesh["dprice"]*0.15)." Бр.]' ".$disabled."> ";
}

$disabled = '';
if($vesh["dprice"]<=$pers["dmoney"] and ($pers["clan_state"]=='g' or $pers["clan_tr"]) and $clan["treasury"]<($clan["maxtreasury"]+30));else
$disabled = 'DISABLED';
echo "<input type=button class=inv_but onclick=\"s_buy('".$vesh["id"]."')\" value='Купить в клан казну' ".$disabled.">";

$disabled = '';
if($vesh["dprice"]<=$clan["dmoney"] and $pers["clan_state"]=='g' and $clan["treasury"]<($clan["maxtreasury"]+30));else $disabled = 'DISABLED';
echo "<input type=button class=inv_but onclick=\"sf_buy('".$vesh["id"]."')\" value='Купить в клан казну(за счёт клана)' ".$disabled.">";

echo "</div>";
include ("inc/inc/weapon.php");
echo "</div>";
}
echo "</td></tr></table>";
}
?>
<script>
function w_buy (id) {
if (confirm("Вы точно хотите купить эту вещь?"))
location = 'main.php?buy='+id;
}
function s_buy (id) {
if (confirm("Вы точно хотите купить эту вещь в клан-казну?"))
location = 'main.php?sbuy='+id;
}
function sf_buy (id) {
if (confirm("Вы точно хотите купить эту вещь в клан-казну(за счёт клана)?"))
location = 'main.php?sfbuy='+id;
}
</script>
</td>
	</tr>
</table></center>