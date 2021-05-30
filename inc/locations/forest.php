<SCRIPT LANGUAGE='JavaScript' SRC='/js/forest.js'></SCRIPT>
<?php
$FOREST_ID = 32;//($player->pers["x"]*$player->pers["y"])%65500;
$tr = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"]+1)." and y=".$player->pers["foresty"]." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
$tl = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"]-1)." and y=".$player->pers["foresty"]." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
$td = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"])." and y=".($player->pers["foresty"]+1)." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
$tu = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"])." and y=".($player->pers["foresty"]-1)." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);

	$t = tme();
	//$t = "";
	$timep = 600;
	$timed = 240; // 240
	$tper = 5;
	$no_make=0;
	/*
	if ($t%3000==0)
	{
		$mperses = $db->sql("SELECT user,level FROM users WHERE location='forest' and cfight=0 and apps_id=0 and online=1");
		$bots_str = '';
		$users_str = '';
		while($mpers = mysql_fetch_array($mperses,MYSQL_ASSOC))
		{
			$a = $mpers["level"]+rand(-10,10);
			if ($a>99) $a=99;
			if ($a<1) $a = 1;
			$bots_str .= "bot=".(1000+$a)."|";
			$users_str .= $mpers["user"]."|";
		}
		begin_fight (substr($bots_str,0,strlen($bots_str)-1),substr($users_str,0,strlen($users_str)),"Атака подземных существ на шахтёров",100,180,0);
		say_to_chat ("s","Подземные существа атакуют шахтёров!!!",0,0,'*',0);
	}
	*/

	if ( @$http->get["forestgo"] and $player->pers["waiter_forest"]<=$t and $player->jKey(1) )
	{
		$res = $db->sql("SELECT * FROM resources_forest ORDER BY RAND()", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		$r1 = mysql_fetch_array($res);
		$r2 = mysql_fetch_array($res);
		$r3 = mysql_fetch_array($res);
		$kr1 = floor(rand(10,2000)*sqrt($player->pers["forestx"]+$player->pers["foresty"])/$r1["price"]);
		$kr2 = floor(rand(10,2000)*sqrt($player->pers["forestx"]+$player->pers["foresty"])/$r2["price"]);
		$kr3 = floor(rand(10,2000)*sqrt($player->pers["forestx"]+$player->pers["foresty"])/$r3["price"]);
		if ($r1["image"]==3)
		{

		}

		if ($http->get["forestgo"]=='left')
		{
			$player->pers["forestx"]=$player->pers["forestx"]-1;
			$player->pers["foresty"]=$player->pers["foresty"];
			if (!$tl["forest"]) $db->sql("INSERT INTO `forest` (`x`,`y`,`time_ready`,`r1id`,`r2id`,`r3id` , `r1k` , `r2k` , `r3k`,`forest`,`countp`)
				VALUES ('".($player->pers["forestx"])."', '".($player->pers["foresty"])."', '".($t+$timep-$player->pers["sp15"])."','".$r1["image"]."', '".$r2["image"]."', '".$r3["image"]."', '".$kr1."', '".$kr2."', '".$kr3."', '".$FOREST_ID."', '1');", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
			elseif ($tl["time_ready"]>$t)
				$db->sql("UPDATE forest SET time_ready=".($t+($tl["time_ready"]-$t)*($tl["countp"]-1)/$tl["countp"]).",countp=countp+1 WHERE x='".($player->pers["forestx"])."' and y='".($player->pers["foresty"])."' and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		}
		if ($http->get["forestgo"]=='right')
		{
			$player->pers["forestx"]=$player->pers["forestx"]+1;
			$player->pers["foresty"]=$player->pers["foresty"];
			if (!$tr["forest"]) $db->sql("INSERT INTO `forest` ( `x` , `y` , `time_ready` , `r1id` , `r2id` , `r3id` , `r1k` , `r2k` , `r3k` ,`forest` , `countp` ) 
				VALUES ('".($player->pers["forestx"])."', '".($player->pers["foresty"])."', '".($t+$timep-$player->pers["sp15"])."','".$r1["image"]."', '".$r2["image"]."', '".$r3["image"]."', '".$kr1."', '".$kr2."', '".$kr3."', '".$FOREST_ID."', '1');", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
			elseif ($tr["time_ready"]>$t)
				$db->sql("UPDATE forest SET time_ready=".($t+($tr["time_ready"]-$t)*($tr["countp"]-1)/$tr["countp"]).",countp=countp+1 WHERE x='".($player->pers["forestx"])."' and y='".($player->pers["foresty"])."' and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		}
		if ($http->get["forestgo"]=='up')
		{
			$player->pers["forestx"]=$player->pers["forestx"];
			$player->pers["foresty"]=$player->pers["foresty"]-1;
			if (!$tu["forest"]) $db->sql("INSERT INTO `forest` ( `x` , `y` , `time_ready` , `r1id` , `r2id` , `r3id` , `r1k` , `r2k` , `r3k` ,`forest` , `countp` )
				VALUES ('".($player->pers["forestx"])."', '".($player->pers["foresty"])."', '".($t+$timep-$player->pers["sp15"])."','".$r1["image"]."', '".$r2["image"]."', '".$r3["image"]."', '".$kr1."', '".$kr2."', '".$kr3."', '".$FOREST_ID."', '1');", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
			elseif ($tu["time_ready"]>$t)
			$db->sql("UPDATE forest SET time_ready=".($t+($tu["time_ready"]-$t)*($tu["countp"]-1)/$tu["countp"]).",countp=countp+1 WHERE x='".($player->pers["forestx"])."' and y='".($player->pers["foresty"])."' and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		}
		if ($http->get["forestgo"]=='down')
		{
			$player->pers["forestx"]=$player->pers["forestx"];
			$player->pers["foresty"]=$player->pers["foresty"]+1;
			if (!$td["forest"]) $db->sql("INSERT INTO `forest` ( `x` , `y` , `time_ready` , `r1id` , `r2id` , `r3id` , `r1k` , `r2k` , `r3k` ,`forest` , `countp` )
				VALUES ('".($player->pers["forestx"])."', '".($player->pers["foresty"])."', '".($t+$timep-$player->pers["sp15"])."','".$r1["image"]."', '".$r2["image"]."', '".$r3["image"]."', '".$kr1."', '".$kr2."', '".$kr3."', '".$FOREST_ID."', '1');", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
			elseif ($td["time_ready"]>$t)
				$db->sql("UPDATE forest SET time_ready=".($t+($td["time_ready"]-$t)*($td["countp"]-1)/$td["countp"]).",countp=countp+1 WHERE x='".($player->pers["forestx"])."' and y='".($player->pers["foresty"])."' and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		}
		set_vars("forestx=".$player->pers["forestx"].",foresty=".$player->pers["foresty"].",waiter_forest=".($t+$tper)."",$player->pers["uid"]);
		$player->pers["waiter_forest"]=$t+$tper;

		$tr = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"]+1)." and y=".$player->pers["foresty"]." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		$tl = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"]-1)." and y=".$player->pers["foresty"]." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		$td = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"])." and y=".($player->pers["foresty"]+1)." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		$tu = $db->sqla("SELECT * FROM forest WHERE x=".($player->pers["forestx"])." and y=".($player->pers["foresty"]-1)." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);

	} elseif (@$http->get["forestgo"]) var_dump($player->jKey(1));
$tunnel = $db->sqla("SELECT * FROM forest WHERE x=".$player->pers["forestx"]." and y=".$player->pers["foresty"]." and forest=".$FOREST_ID."");
############################################

if (!$tunnel["r1k"] and !$tunnel["r2k"] and !$tunnel["r3k"] and $t%20==0)
sql("UPDATE forest SET r1k=r1k+".rand(1,30).",r2k=r2k+".rand(2,15).",r3k=r3k+".rand(15,40)." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and forest=".$tunnel["forest"]."");

############################################
$inst = $db->sqla("SELECT id,udmin,udmax,durability,price FROM wp WHERE uidp=".$player->pers["uid"]." and weared=1 and p_type=5", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
if (!$inst["id"]) $no_make=1;
if (@$http->get["beginr"] and !$no_make and $player->pers["waiter_forest"]<$t and $player->pers["tire"]<100)
{
	include("forest/resource.php");
	$inst = $db->sqla("SELECT id,udmin,udmax,durability FROM wp WHERE uidp=".$player->pers["uid"]." and weared=1 and p_type=5", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
}
############################################

	$cursor = '';

	if (empty($tr["forest"]) or $tr["time_ready"]>$t) $cltr='class=fader onclick="go_confirm(\'right\')"'; else $cltr='onclick="location=\'main.php?forestgo=right&'.$player->jKey().'\'"';
	if (empty($tl["forest"]) or $tl["time_ready"]>$t) $cltl='class=fader onclick="go_confirm(\'left\')"'; else $cltl='onclick="location=\'main.php?forestgo=left&'.$player->jKey().'\'"';
	if (empty($tu["forest"]) or $tu["time_ready"]>$t) $cltu='class=fader onclick="go_confirm(\'up\')"'; else $cltu='onclick="location=\'main.php?forestgo=up&'.$player->jKey().'\'"';
	if (empty($td["forest"]) or $td["time_ready"]>$t) $cltd='class=fader onclick="go_confirm(\'down\')"'; else $cltd='onclick="location=\'main.php?forestgo=down&'.$player->jKey().'\'"';

$x = $player->pers["forestx"];
$y = $player->pers["foresty"];

	$cells_around = $db->sql("SELECT x,y,time_ready FROM forest WHERE x>=".($player->pers["forestx"]-3)." and x<=".($player->pers["forestx"]+3)." and y>=".($player->pers["foresty"]-2)." and y<=".($player->pers["foresty"]+2)." and forest=".$FOREST_ID."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);

$maked_str = Array();
while ($cc = mysql_fetch_array($cells_around))
if ($cc["time_ready"]<$t)
 $maked_str[$cc["x"]][$cc["y"]] = 'but';
else
 $maked_str[$cc["x"]][$cc["y"]] = 'inv';

	//if ()
	$cursor .= '<b>Поляна ['.($player->pers["forestx"]).';'.$player->pers["foresty"]*(-1).']</b>';

	$t=$t;
	if ($t<$player->pers["waiter_forest"] or $tunnel["time_ready"]>$t)
	{
		if ($t<$tunnel["time_ready"])
		{
			$player->pers["waiter_forest"]=$tunnel["time_ready"];
			set_vars ("waiter_forest='".$tunnel["time_ready"]."'",$player->pers["uid"]);
			$cursor .= "<br><div id=waiter  align=center></div><script>waiter(".($player->pers["waiter_forest"]-$t).");</script><br><font >Разведать сектор: ".$tunnel["countp"]."</font>";
		}
		else
		$cursor .= "<br><div id=waiter  align=center></div><script>waiter(".($player->pers["waiter_forest"]-$t).");</script>";
	$no_make=1;
	}
	else
	{
	if ($x==0 and $y==0) $mcell = '<b>0</b>'; else $mcell='&nbsp;';
	$cursor = $cursor.'<table border="1" width="210" cellspacing="0" cellpadding="0" class="whiteBlock">
	<tr>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-3][$y-2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-2][$y-2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-1][$y-2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x][$y-2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+1][$y-2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+2][$y-2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+3][$y-2].'">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-3][$y-1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-2][$y-1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-1][$y-1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x][$y-1].'">
		<img border="0" src="/images/nav/icon/active/top.png"  style="cursor:pointer" '.$cltu.'></td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+1][$y-1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+2][$y-1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+3][$y-1].'">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-3][$y].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-2][$y].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-1][$y].'">
		<img border="0" src="/images/nav/icon/active/left.png" style="cursor:pointer"  '.$cltl.'></td>
		<td align="center" width=41 height=41 valign=center><img border="0" src="/images/nav/icon/center.png" style="cursor:pointer" alt="'.$mcell.'"></td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+1][$y].'">
		<img border="0" src="/images/nav/icon/active/right.png" style="cursor:pointer"  '.$cltr.'></td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+2][$y].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+3][$y].'">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-3][$y+1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-2][$y+1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-1][$y+1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x][$y+1].'">
		<img border="0" src="/images/nav/icon/active/bottom.png"  style="cursor:pointer" '.$cltd.'></td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+1][$y+1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+2][$y+1].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+3][$y+1].'">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-3][$y+2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-2][$y+2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x-1][$y+2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x][$y+2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+1][$y+2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+2][$y+2].'">&nbsp;</td>
		<td align="center" width=41 height=41 class="'.$maked_str[$x+3][$y+2].'">&nbsp;</td>
	</tr>
</table>';
	}

	if ($tunnel["r1id"]) $r1 = $db->sqla("SELECT * FROM resources_forest WHERE image='".$tunnel["r1id"]."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
	$r1["k"]=$tunnel["r1k"];
	if ($tunnel["r2id"]) $r2 = $db->sqla("SELECT * FROM resources_forest WHERE image='".$tunnel["r2id"]."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
	$r2["k"]=$tunnel["r2k"];
	if ($tunnel["r3id"]) $r3 = $db->sqla("SELECT * FROM resources_forest WHERE image='".$tunnel["r3id"]."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
	$r3["k"]=$tunnel["r3k"];

if ($player->pers["tire"]>99) { $no_make = 1;}
$resources_forest = '';
if ($inst) $resources_forest3 .= 'Долговечность корзины: <b>'.$inst["durability"].'</b><br>Лесник: <b>'.($player->pers["sp15"]).'</b><br>Старатель: <b>'.($player->pers["sp16"]).'</b>';
if ($r1["image"] and ($r1["price"]<2 or $r1["price"]<$player->pers["sp15"]/16) and mtrunc($r1["k"]))
{
	
if (!$no_make)
$begin = '<input class=inv_but type=button value="Начать добычу" onclick="location=\'main.php?beginr='.$r1["image"].'\'">';
else $begin = '';
	$resources_forest .= '<table border=0 width=100% cellspacing="5" cellpadding="5" class="whiteBlock margin-5">';
	$resources_forest .= '<tr>';
	$resources_forest .= '<td align=center width=60><img src=images/weapons/resources_forest/'.$r1["image"].'.gif></td>';
	$resources_forest .= '<td ><b>'.$r1["name"].'</b><br>Единица: <b>'.$r1["name_of_once"].'</b>';
	$resources_forest .= '<br> Цена: <b>'.$r1["price"].' зм.</b><br> Обнаружено: <b>'.$r1["k"].'</b>&nbsp;единиц<br></td>';
	$resources_forest .= '<td align=center>'.$begin.'</td>';
	$resources_forest .= '</tr>';
	$resources_forest .= '</table>';
}
if ($r2["image"] and ($r2["price"]<2 or $r2["price"]<$player->pers["sp15"]/16) and mtrunc($r2["k"]))
{
if (!$no_make) $begin = '<input class=inv_but type=button value="Начать добычу" onclick="location=\'main.php?beginr='.$r2["image"].'\'">'; else $begin = '';
	$resources_forest .= '<table border=0 width=100% cellspacing="5" cellpadding="5" class="whiteBlock margin-5">';
	$resources_forest .= '<tr>';
	$resources_forest .= '<td align=center width=60><img src=images/weapons/resources_forest/'.$r2["image"].'.gif></td>';
	$resources_forest .= '<td ><b>'.$r2["name"].'</b><br>Единица: <b>'.$r2["name_of_once"].'</b>';
	$resources_forest .= '<br> Цена: <b>'.$r2["price"].' </b> зм.<br> Обнаружено: <b>'.$r2["k"].'</b>&nbsp;единиц<br></td>';
	$resources_forest .= '<td align=center>'.$begin.'</td>';
	$resources_forest .= '</tr>';
	$resources_forest .= '</table>';
}
if ($r3["image"] and ($r3["price"]<2 or $r3["price"]<$player->pers["sp15"]/16) and mtrunc($r3["k"]))
{
if (!$no_make) $begin = '<input class=inv_but type=button value="Начать добычу" onclick="location=\'main.php?beginr='.$r3["image"].'\'">'; else $begin = '';
	$resources_forest .= '<table border=0 width=100% cellspacing="5" cellpadding="5" class="whiteBlock margin-5">';
	$resources_forest .= '<tr>';
	$resources_forest .= '<td align=center width=60><img src=images/weapons/resources_forest/'.$r3["image"].'.gif></td>';
	$resources_forest .= '<td ><b>'.$r3["name"].'</b><br>Единица: <b>'.$r3["name_of_once"].'</b>';
	$resources_forest .= '<br> Цена: <b>'.$r3["price"].' </b> зм.<br> Обнаружено: <b>'.$r3["k"].'</b>&nbsp;единиц<br></td>';	
	$resources_forest .= '<td align=center >'.$begin.'</td>';
	$resources_forest .= '</tr>';
	$resources_forest .= '</table>';
}
if (!$resources_forest) $resources_forest .= '<div class="redBlock">Вы не обнаружили здесь никаких ресурсов.</div>';
$resources_forest2 .= '<hr><b>Уже найдено</b>';
$resources_forest2 .= '<table border=0 width=100% cellspacing="3" cellpadding="3">';

$_r = $db->sql("SELECT count(*) as a, `name`, `price` FROM `wp` WHERE `type`='resources' and `uidp`='".$player->pers["uid"]."' GROUP BY `name` ORDER BY `name`", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
	if(mysql_num_rows($_r)>0)
		{	
			while ($v = mysql_fetch_array($_r,MYSQL_ASSOC))
			{
				$resources_forest2 .= "<tr>";
				$resources_forest2 .= "<td class='whiteBlock' style='padding:5px;'><b>".$v["name"]."</b><p> Кол-во: <b>".$v["a"]."</b> шт. на сумму <b>".($v["price"]*$v["a"])."</b> зм.</p></td>";
				//$resources_forest2 .= "<td width=100> <b>".($v["price"]*$v["a"])."</b> зм.</td>";
				$resources_forest2 .= "</tr>";
			}
		}
		
$resources_forest2 .= '</table>';

//else  

//$resources_forest = '<img src="service/_gameplay_SYMBOLS.php?code='.md5($lastom_new).'"><br><input class=inv_but type=text name=code value="" id=code>'.$resources_forest;

?>

<table border=0 cellspacing=0 cellspadding=0 style='margin:40px auto; width:100%;max-width:1200px;' class='margin-5'>
    <tr>
        <td width='25%'><?php
			if ($player->AuraSpecial[21]) {
				echo "Осталось: <b>".tp($player->AuraSpecial[21])."</b>";
			}
			?></td>
        <td width='50%'>
            <div class='titleCity'>Лес [v1.0]</div>
        </td>
        <td width='25%'><?=$resources_forest3;?></td>
    </tr>
</table>

<table cellspacing="5" cellpadding="5" style="margin:0 auto;width:100%;max-width:1200px;" class='greyBlock margin-5'>
    <tr>
        <td align=center width=25% valign=top>
            <script>
            ins_HP(<?=$player->pers["chp"]?>, <?=$player->pers["hp"]?>, <?=$player->pers["cma"]?>,
                <?=$player->pers["ma"]?>,
                <?=intval($sphp)?>, <?=intval($spma)?>);
            /*
            show_only_hp(<?=$player->pers["chp"];?>, <?=$player->pers["hp"];?>, <?=$player->pers["cma"]?>,
                <?=$player->pers["ma"]?>);
            ins_HP(<?=$player->pers["chp"]?>, <?=$player->pers["hp"]?>, <?=$player->pers["cma"]?>,
				<?=$player->pers["ma"]?>, <?=$sphp?>, <?=$spma?>);
				*/
            </script>
            <?php
	echo "<font class=green>Усталость: <b>".floor($player->pers["tire"])."%</b></font><br>";
	if ($x==0 and $y==0) {
		echo "<center class=but><input type=button class=inv_but onclick=\"location='main.php?outforest=".$FOREST_ID."&".$player->jKey()."'\" value='Выйти из Леса'>";
	}
	else {
		echo $resources_forest2;
	}

?>
            <hr>

        </td>
        <td width=50% valign=top><b>Обнаруженные ресурсы:</b><br>
            <?php
if ($player->pers["tire"]<100){
echo $resources_forest;
}  
else 
{
echo "Вы слишком устали.";
}
?>

            <?php			
	if ($player->pers["forestx"]==0 and $player->pers["foresty"]==0) {
	$help .= '<hr><b>Помощь:</b><br><p >Для того чтобы начать добычу нужно пройти к поляне с ресурсами и начать добычу. Если ресурсы на поляне закончились, вы можете разведать новую поляну. Это можно делать группой. Просто нажмите на белую стрелку и согласитесь , тогда ваш персонаж начнёт разведывать новую поляну. Если в это время этоту поляну кто-то уже разведал, то время разведки снизиться и т.д. чем больше разведчиков - тем быстрее разведаеться новая поляна.</p><hr>';
	echo $help ;
	//echo '<p >Умение "ШАХТЁР" помогает разглядеть более дорогие ресурсы в стенах тунеля, а так же быстрее разрывать новые тунели.<br>Умение "ДОБЫЧА КАМНЕЙ" повышает кол-во добываемых ресурсов за единицу времени.</p><hr>';
}
?>
        </td>
        <td align=center width=25% valign=top>
            <div id="mainbox"> </div>
        </td>
    </tr>
</table>
<div id=inf_from_php style="position:absolute;display:none;"><?= $cursor;?><?=$r_get;?></div>

<script>
build_forest();

function go_confirm(where) {
    if (confirm("Вы действительно хотите разведать новую поляну?"))
        location = 'main.php?forestgo='+where+'&<?=$player->jKey();?>';
}
</script>