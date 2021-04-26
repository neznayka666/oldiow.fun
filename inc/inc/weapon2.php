<?php
$text = '';
$t = tme();
$napad = 0; 
if ( @!$counter ) $counter = 0; if ( @!$sht ) $sht = ''; 
$options = explode ("|",$player->pers["options"]);
if (is_array($vesh)) $v = $vesh;
if ( !empty($v['id']) )
{
	$text.= "show_w(";
	if ( !empty($v["name"]) )
	{
		$counter++; 
		if (@$lavka == 1) $v["durability"] = $v["max_durability"];
		$text .= "'".$v["name"]."','".$sht."','".$v["image"]."','".$v["durability"]."','".$v["max_durability"]."','";
		if ($v['dprice']==0)
		{
			if ($v["where_buy"]==0){ $val = 'зм.'; $img='';}
			elseif ($v["where_buy"]==4){ $val = 'сз.'; $img='';}
			else { $val = 'зм.'; $img='';}
			if (@$lavka<>1 or $player->pers['money']>=$v['price']) $text .= "<font class=user><!--img src=/images/".$img."--> <b>".$v["price"]." ".$val."</font></b><font class=items><br>";
			else $text .= "<font class=hp><!--img src=/images/".$img."--> <b>".$v["price"]." ".$val."</font></b><font class=items><br>";
		}
		else $text .= "<!--img src=/images/signs/diler.gif--> <b>".$v["dprice"]." сп. </b><font class=items><br>";
		$text .= "',".$v['price'].",'".$v["dprice"]."','";
		$rank_i = ($v["s1"]+$v["s2"]+$v["s3"]+$v["s4"]+$v["s5"]+$v["s6"]+$v["kb"])*0.3 + ($v["mf1"]+$v["mf2"]+$v["mf3"]+$v["mf4"]+$v["mf5"])*0.03 + ($v["hp"]+$v["ma"])*0.04+($v["udmin"]+$v["udmax"])*0.3;
		if ($v["stype"]=="shit")
		$v["describe"] .= "<br>Защита от магии +50%";
		if ($v["type"]=="napad" and $v["index"]!='b' and $v["index"]!='b_z' and $v["index"]!='k' and $v["index"]!='k_z')
		{
			if ($v["stype"]=="napadt")
				{$v["describe"] .= "<div class=but>Свиток тактического нападения</div>";}
			else
				{$v["describe"] .= "<div class=but>Свиток классического нападения</div>";}
			if ($v["p_type"]==15)
				{$v["describe"] .= "<div class=hp>ЗАКРЫТЫЙ БОЙ</div>";}
		}
		
		if ($v["index"]=="b")	{$v["describe"] .= "<div class=but>Свиток боевого нападения</div>";}
		if ($v["index"]=="b_z")	{$v["describe"] .= "<div class=but>Свиток боевого нападения <div class=hp>ЗАКРЫТЫЙ БОЙ</div></div>";}
		if ($v["index"]=="k")	{$v["describe"] .= "<div class=but>Свиток кулачного нападения</div>";}
		if ($v["index"]=="k_z")	{$v["describe"] .= "<div class=but>Свиток кулачного нападения <div class=hp>ЗАКРЫТЫЙ БОЙ</div></div>";}
		
		if ($v["stype"]=="resources")
		{$v["describe"] .= "Полезный ресурс";}
		if ($v["timeout"])
		{
			if($v["describe"])
				{$v["describe"].='<br><span class=timef>Пропадёт через '.tp($v["timeout"]-$t)."</span>";}
			else
				{$v["describe"].='<span class=timef>Пропадёт через '.tp($v["timeout"]-$t)."</span>";}
		}
		if ($v["type"]=="rune") {$v["describe"].='<br>Чтобы вставить руну в предмет, нужно чтобы этот предмет был надет на вас, и ничего больше.';if ($v["udmax"])$v["udmin"]=1;}
		if ($v["upgrated"]) {$v["describe"].='<br><b class=green>УЛУЧШЕНА</b>';}

		$attrs = '<table style="border-width:0px; font-size:10px;width:100%" cellspacing=0><tr><td>';
		$v_count = 0;
		$R = all_params();
		foreach($R as $r)
			if ( @$v[$r] and $r<>"udmin" and $r<>"udmax" )
			{
				$v_count++;
				if (substr($r,0,2)=='mf') $prc = '%'; else $prc = '';
				if ($r == 'kb') $prc = '';
				if ($r == 'hp') $prc = '<b>HP</b>';
				if ($r == 'ma') $prc = '<b>EP</b>';
				$attrs.= ' '.name_of_skill($r).': <b>'.plus_param($v[$r]).' '.$prc.'</b><br>';
			}
		if ($v["udmin"] or $v["udmax"])
		{
			$v_count++;
			$attrs.= 'Минимальный урон: <b>'.$v["udmin"].'</b><br>Максимальный урон: <b>'.$v["udmax"].'</b><br>';
		}
		//if($v["material_show"]) $attrs.= '<tr><td>Материал: </td><td>'.$v["material_show"].'</td></tr>';
		//else $attrs.= '<tr><td>Материал: </td><td><i>неизвестно</i></td></tr>';
		if ($rank_i>0) $attrs.= 'Мощь предмета: <i>'.$rank_i.'</i><br>';
		$attrs .= '</td></tr></table>';
		if (!$v_count) $attrs = '';
		
		if ($v["where_buy"]<>'0') $text .= "1',"; else $text .= "0',";
		$text .= "'".$attrs."','".$v["describe"]."','".$v["present"]."','".$v["clan_sign"]."','".$v["clan_name"]."',".intval($v["slots"]).",".intval($v["radius"]).",".intval($v["arrows"]).",".intval($v["arrows_max"]).",'".$v["arrow_name"]."','";

		$_ATTR = '';
		if ($v["type"]=="zakl")
		{
			$bl = $db->sqla("SELECT esttime,params FROM `auras` WHERE `id`='".$v["index"]."'");
			$_ATTR = '<table border=0 cellspacing=0 cellspadding=0 width=100%>';
				$params = explode("@",$bl["params"]);
				foreach($params as $par)
				{
					$p = explode("=",$par);
					if (substr($p[0],0,2)=='mf') $perc = '%'; else $perc = '';
					if (@$p[1][strlen($p[1])-1]=='%') $perc .= '<i>[%]</i>';
					if (@$p[1]) $_ATTR .= "<tr><td width=60% class=items>".name_of_skill($p[0]).": </td><td class=items><b>".plus_param(intval($p[1])).$perc."</b></td></tr>";
				}
			$_ATTR .= '</table>';
			$text .= tp($bl['esttime']).$_ATTR."','";
		} else $text .= "0','";
		$z=1;
		$text .= $v["weight"]."','".$v["index"]."','";
		

		if ($player->pers["level"]<$v["tlevel"]) {$p="hp";$z=0;} else $p="green";
		$text .= "<font class=".$p." style=font-size:12px;><b>Уровень</b>: ".$v["tlevel"]."</font>";

		$attrs = '<table style="border-width:0px; font-size:10px;width:100%" cellspacing=0><tr><td>';
		$v_count = 0;
		$R = all_params();
		foreach($R as $r)
		{
			if ( @$v['t'.$r] )
			{
				$v_count++;
				if (substr($r,0,2)=='mf') $prc = '%'; else $prc = '';
				if ($r == 'kb') $prc = '';
				if ($r == 'hp') $prc = '<b>HP</b>';
				if ($r == 'ma') $prc = '<b>EP</b>';
				if ($v['t'.$r]>$player->pers[$r]) {$cls = 'hp';$z=0;} else $cls = 'green';
				$attrs.= '<span class='.$cls.' style=font-size:12px;> '.name_of_skill($r).': <b>'.$v['t'.$r].' '.$prc.'</b></span><br>';
			}
		}
		$attrs .= '</td></tr></table>';
		if (!$v_count) $attrs = '';
		$text .= $attrs;

		if($v["clan_sign"])$text .= "Клан: <img src=/images/signs/".$v["clan_sign"].".gif title=\'".$v["clan_name"]."\'> <b>".$v["clan_name"]."</b><br>";

		$text .= "'";
		if ($v["type"]=="zakl") $napad=2;
		if ($v["type"]=="napad") $napad=1;
	}
	$text .= ");\n";
}
?>