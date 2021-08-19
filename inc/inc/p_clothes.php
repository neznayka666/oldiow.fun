<?php
$wears = array();
for ($i=0;$i<23;$i++)
{
	$m = array();
	$m["image"]='slots/w'.($i+1);
	$m["id"]="0";
	$wears[$i]=$m;
}

$sh = $wears[0];
$na = $wears[8];
$oj = $wears[1];
$pe = $wears[9];
$or1 = $wears[2];
$or2 = $wears[10];
$po = $wears[3];
$z1 = $wears[4];
$z2 = $wears[5];
$z3 = $wears[6];
$sa = $wears[7];
$braslet1 = $wears[11];
$braslet2 = $wears[12];
$br = $wears[13];
$kam1 = $wears[14];
$kam2 = $wears[15];
//$kam3 = $wears[16];
//$kam4 = $wears[17];
$lo = $wears[16];
$kolco1 = $wears[17];
$kolco2 = $wears[18];
$kolco3 = $wears[19];
$kolco4 = $wears[20];
$kolco5 = $wears[21];
$kolco6 = $wears[22];

$or1type = $or2type = "";

$ws1=0;
$ws2=0;
$ws3=0;
$ws4=0;
$ws5=0;
$ws6=0;

if ($player->pers["uid"]) $res = $db->sql("SELECT * FROM `wp` WHERE uidp=".intval($player->pers["uid"])." and weared=1");
else $res = $db->sql("SELECT * FROM `wp` WHERE uidp=".intval(-1*$player->pers["bid"])." and weared=1");
$j=0;
$b=0;
$k=0;
while ($v=mysql_fetch_array($res))
{

		$ws1 += $v["s1"];
		$ws2 += $v["s2"];
		$ws3 += $v["s3"];
		$ws4 += $v["s4"];
		$ws5 += $v["s5"];
		$ws6 += $v["s6"];
		$dscr = $v["id"].'|';


		if ($v["name"]) {
		if ($v["upgrated"]==0) $dscr .= '<b>'.str_replace(' ','&nbsp;',str_replace('"','*',$v["name"]))."</b>@";
		if ($v["upgrated"]==1) $dscr .= '<b style="color:green;">'.str_replace(' ','&nbsp;',str_replace('"','*',$v["name"]))." [МФ]</b>@";
		if ($v["upgrated"]==2) $dscr .= '<b style="color:#9900CC;">'.str_replace(' ','&nbsp;',str_replace('"','*',$v["name"]))." [МФ]</b>@";
		}
		
		########		
		if ( UID == 1 )
		{
			if ($v["tlevel"]) $dscr .= '<font class=red>Уровень:</font> <b class=dark>'.$v["tlevel"]."</b>@";
			if ($v["clan_sign"]) $dscr .= '<font class=red>Клан:</font> <img src=/images/signs/'.$v["clan_sign"].'.gif>'.$v["clan_name"].'@';
			if ($v["price"]) $dscr .= '<b class=red>'.$v["price"]." зм</b>@";
			if ($v["dprice"]) $dscr .= '<b class=red>'.$v["dprice"]." сп</b>@";			
		}
		
		if ($v["udmax"]+$v["udmin"]) $dscr .= 'Удар: '.$v["udmin"]."-".$v["udmax"]."@";
		if ($v["kb"]) $dscr .= 'Броня: '.plus_param($v["kb"])."@";
		if ($v["mf5"]) $dscr .= 'Пробой брони: '.plus_param($v["mf5"])."% @";
		if ($v["hp"]) $dscr .= 'Уровень жизни: '.plus_param($v["hp"])." HP@";
		if ($v["ma"]) $dscr .= 'Уровень энергии: '.plus_param($v["ma"])." EP@";
		//if ($v["slots"]) $dscr .= 'Слотов: <B>'.$v["slots"]."</B>@";
		//if ($v["radius"]) $dscr .= 'Радиус поражения: <B>'.$v["radius"]."</B>@";
	if ($v["type"]=="naruchi" and $na["image"]=$v["image"]) $na["id"]=$dscr;
	if ($v["type"]=="ojerelie" and $oj["image"]=$v["image"]) $oj["id"]=$dscr;
	if ($v["type"]=="poyas" and $po["image"]=$v["image"]) $po["id"]=$dscr;
	if ($v["type"]=="sapogi" and $sa["image"]=$v["image"]) $sa["id"]=$dscr;
	if ($v["type"]=="shlem" and $sh["image"]=$v["image"]) $sh["id"]=$dscr;
	if ($v["type"]=="perchatki" and $pe["image"]=$v["image"]) $pe["id"]=$dscr;
	if ($v["type"]=="bronya" and $br["image"]=$v["image"]) $br["id"]=$dscr;
	if ($v["type"]=="kolchuga" and $lo["image"]=$v["image"]) $lo["id"]=$dscr;
	if ($v["type"]=="orujie" and $or1["id"]=="0" and $or1["image"]=$v["image"]){$or1["id"]=$dscr;$or1type=$v["stype"];}
	if ($v["type"]=="orujie" and ($or1["id"]<>$dscr)
	and $or2["image"]=$v["image"])	{$or2["id"]=$dscr;$or2type=$v["stype"];}
	

	if ($v["type"]=="kam")
	{
		for ($i=$j;$i<$j+1;$i++)
		if($i==0){$kam1["id"]=$dscr;$kam1["image"]=$v["image"];}
		elseif($i==1){$kam2["id"]=$dscr;$kam2["image"]=$v["image"];}
		//elseif($i==2){$kam3["id"]=$dscr;$kam3["image"]=$v["image"];}
		//elseif($i==3){$kam4["id"]=$dscr;$kam4["image"]=$v["image"];}
		$j++;
	}	
	
	if ($v["type"]=="braslet")
	{
		for ($i=$b;$i<$b+1;$i++)
		if($i==0){$braslet1["id"]=$dscr;$braslet1["image"]=$v["image"];}
		elseif($i==1){$braslet2["id"]=$dscr;$braslet2["image"]=$v["image"];}		
		$b++;
	}

	if ($v["type"]=="kolco")
	{
		for ($i=$k;$i<$k+1;$i++)
		if($i==0){$kolco1["id"]=$dscr;$kolco1["image"]=$v["image"];}
		elseif($i==1){$kolco2["id"]=$dscr;$kolco2["image"]=$v["image"];}
		elseif($i==2){$kolco3["id"]=$dscr;$kolco3["image"]=$v["image"];}
		elseif($i==3){$kolco4["id"]=$dscr;$kolco4["image"]=$v["image"];}
		elseif($i==4){$kolco5["id"]=$dscr;$kolco5["image"]=$v["image"];}
		elseif($i==5){$kolco6["id"]=$dscr;$kolco6["image"]=$v["image"];}			
		$k++;		
	}
	
}

if ($or1type=='noji' or $or1type=='shit')
{
	$tmp = $or1;
	$or1 = $or2;
	$or2 = $tmp;
}
$ws1 = plus_param($ws1);
$ws2 = plus_param($ws2);
$ws3 = plus_param($ws3);
$ws4 = plus_param($ws4);
$ws5 = plus_param($ws5);
$ws6 = plus_param($ws6);
?>