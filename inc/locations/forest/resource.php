<?php

	if (rand(0,50)<1) set_vars("action=-1",UID);
	$r = intval($http->get["beginr"]);
	$r_get='<hr>';
	if (($r==$tunnel["r1id"] and $k=$tunnel["r1k"]) or
	($r==$tunnel["r2id"] and $k=$tunnel["r2k"]) or
	($r==$tunnel["r3id"] and $k=$tunnel["r3k"]))
	{
		$inst2 = $db->sqla("SELECT id FROM wp WHERE uidp=".$player->pers["uid"]." and weared=1 and p_type=13", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		//$r_get.= "<i class=user>Добыча</i><br>";
		$r = $db->sqla("SELECT * FROM resources WHERE image='".$r."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
		$r["k"]=$k;
		$instp = $inst["durability"]/$inst["price"];
		if ($inst2["id"])
			$kk = mtrunc(floor((rand($inst["udmin"],$inst["udmax"])*sqrt($player->pers["sp12"]*100)/175)/sqrt($r["price"]*4) + rand(2,3)));
		else
			$kk = mtrunc(floor((rand($inst["udmin"],$inst["udmax"])*sqrt($player->pers["sp12"]*100)/350)/sqrt($r["price"]*4) + rand(1,2)));
		//$mdur = mtrunc($instp*$kk*($r["price"]/mtrunc(sqrt($player->pers["sp12"]/25)+1)))+1;
		
		//if ($mdur>$inst["durability"]) $mdur = $kk;
			//$za = 0;
		
		if (rand(1,500)==1)
		{
			$v = $db->sqla("SELECT * FROM weapons WHERE type='rune' and price/10<".$player->pers["sp7"]." and dprice=0 ORDER BY RAND()", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
			if ($v)
			{
				insert_wp($v["id"],$player->pers["uid"],-1,0,$player->pers["user"]);
				$r_get .= "Разрывая клоки земли, вы откопали руну!<hr>";
				say_to_chat('s','Разрывая клоки земли, вы откопали руну!',1,$player->pers["user"],'*',0);
				$player->pers["waiter"]=$t+$timed;
				$db->sql("UPDATE wp SET `durability`=durability-".round($kk+1)." WHERE id='".$inst["id"]."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
				set_vars("waiter=".$player->pers["waiter"]."",$player->pers["uid"]);
				include(ROOT."/inc/inc/weapon2.php");
				$r_get .= "<script>".$text."</script>";
				$za = 1;
			}
		}

		if ($za==0)
		{
			if (rand(sqrt($player->pers["sp12"]),$player->pers["sp12"]*2)>$r["price"])
			{
				if ($kk>$r["k"]) $kk=$r["k"];
				//$r_get .= "Вы добываете: <b>".$r["name"]."</b> в количестве:  <b>".$kk."</b> ед.<br><b>".$kk*$r["price"]."</b> зм.</font><br>Долговечность кирки понизилась на ".round($kk).".<br>Рудокоп +".round(10/($kk+3),2).".<br>Шахтёрство +".round(5/($kk+3),2).".";
				say_to_chat ("s","Вы добываете: <b>".$r["name"]."</b> в количестве: <b>".$kk."</b> ед. Долговечность кирки понизилась на <b>-".round($kk)."</b>. Навык Рудокоп <b>+".round(10/($kk+3),2)."</b>. Навык Шахтёра <b>+".round(5/($kk+3),2)."</b>",1,$player->pers["user"],'*',0); 
				if (!$inst2["id"]) $r_get .= '<hr><div class=return_win><i>Совет: Без телеги количество добываемого ресурса в 2 раза меньше чем с телегой.</i></div><hr>';
				$player->pers["waiter"]=$t+$timed;
				$db->sql("UPDATE wp SET `durability`=durability-".round($kk+1)." WHERE id='".$inst["id"]."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);

				set_vars("sp12=sp12+'".round(10/($kk+3),2)."',sp7=sp7+'".round(5/($kk+3),2)."',peace_exp=peace_exp+3,waiter=".$player->pers["waiter"].",tire=tire+10",$player->pers["uid"]);

				//echo "sp12=sp12+'".(10/($kk+3))."',sp7=sp7+'".(5/($kk+3))."',peace_exp=peace_exp+3,waiter=".$player->pers["waiter"].",tire=tire+10",$player->pers["uid"];

				$rr = $db->sqla("SELECT * FROM wp WHERE uidp='".$player->pers["uid"]."' and in_bank=0 and id_in_w='res..".$r["image"]."'", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
				//if ($rr["id"]) $db->sql("UPDATE wp SET price=price+".$kk*$r["price"].",weight=weight+".$kk.",durability=durability+".$kk.",max_durability=max_durability+".$kk." WHERE id=".$rr["id"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
				//else
				//{
				//if ($rr["id"]) {
				for($i = 0; $i < $kk; ++$i) {
    				$db->sql("INSERT INTO `wp` ( `id` , `uidp` , `weared` ,`id_in_w`, `price` , `dprice` , `image` , `index` , `type` , `stype` , `name` , `describe` , `weight` , `where_buy` , `max_durability` , `durability` ,`p_type`)
						VALUES (0, '".$player->pers["uid"]."', '0','res..".$r["image"]."','".$r["price"]."', '0', 'resources/".$r["image"]."', '0', 'resources', 'resources', '".$r["name"]."', '', '1', '0', '1', '1','7');", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
				}
				//}
				//$db->sql("INSERT INTO `wp` ( `id` , `uidp` , `weared` ,`id_in_w`, `price` , `dprice` , `image` , `index` , `type` , `stype` , `name` , `describe` , `weight` , `where_buy` , `max_durability` , `durability` ,`p_type`)
						//VALUES (0, '".$player->pers["uid"]."', '0','res..".$r["image"]."','".$kk*$r["price"]."', '0', 'resources/".$r["image"]."', '0', 'resources', 'resources', '".$r["name"]."', '', '1', '0', '".$kk."', '".$kk."','7');", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
				//}
				if ($r["image"]==$tunnel["r1id"]){$db->sql("UPDATE mine SET r1k=r1k-".$kk." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and mine=".$tunnel["mine"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);  $tunnel["r1k"]-=$kk;}
				if ($r["image"]==$tunnel["r2id"]){$db->sql("UPDATE mine SET r2k=r2k-".$kk." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and mine=".$tunnel["mine"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);  $tunnel["r2k"]-=$kk;}
				if ($r["image"]==$tunnel["r3id"]){$db->sql("UPDATE mine SET r3k=r3k-".$kk." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and mine=".$tunnel["mine"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);  $tunnel["r3k"]-=$kk;}
				###
				loges_proffesions($kk*$r["price"], 2, 'Ш: '.round($player->pers['sp7']).'; Д: '.round($player->pers['sp12']),UID);
			}
			else
			{
				$r_get .= "Неудачным ударом кирки, вы испортили ресурс.<br>Долговечность кирки понизилась на ".round($kk+1).".<br>Рудокоп -".round((5/($player->pers["sp12"]+1)),3).".<hr><i>Совет: Это происходит из-за слишком малого количества вашего умения \"Рудокоп\". Поднять это умение можно в университете.</i><hr>";
				$player->pers["waiter"]=$t+$timed;
				$mm = round((5/($player->pers["sp12"]+1)),3);
				if ($player->pers["sp12"]<1) $mm=0;
				$db->sql("UPDATE wp SET durability=durability-".round($kk+1)." WHERE id='".$inst["id"]."'");
				set_vars("sp12=sp12-".$mm.",peace_exp=peace_exp+1,waiter=".$player->pers["waiter"].",tire=tire+8",$player->pers["uid"]);
				if ($r["image"]==$tunnel["r1id"]){$db->sql("UPDATE mine SET r1k=r1k-".$kk." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and mine=".$tunnel["mine"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);  $tunnel["r1k"]-=$kk;}
				if ($r["image"]==$tunnel["r2id"]){$db->sql("UPDATE mine SET r2k=r2k-".$kk." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and mine=".$tunnel["mine"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);  $tunnel["r2k"]-=$kk;}
				if ($r["image"]==$tunnel["r3id"]){$db->sql("UPDATE mine SET r3k=r3k-".$kk." WHERE x=".$tunnel["x"]." and y=".$tunnel["y"]." and mine=".$tunnel["mine"]."", __FILE__,__LINE__,__FUNCTION__,__CLASS__);  $tunnel["r3k"]-=$kk;}
			}
}
}
?>