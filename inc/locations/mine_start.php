<?php
if ( $player->pers["waiter"]>tme() )
	echo "<center><div id=waiter class=items align=center></div><s!cript>waiter(".($player->pers["waiter"]-tme()).");</s!cript></center>";

define("LMINE1",50);
define("LMINE2",120);
define("LMINE3",200);
define("LMINE5",500);
define("LMINE8",700);
define("LMINE12",1000);

if ( $http->_get('buy') and $http->_get("kolvo")>0 and $http->_get("kolvo")<100 and $player->jKey(1) )
{
	$buy = intval($http->_get("buy"));
	$v = $db->sqla("SELECT price,name,id,max_durability,dprice FROM `weapons` WHERE `id`='".$buy."' and (p_type=5 or p_type=13) and `dprice` = 0;", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
	if ( $v )
	{
		$kolvo = intval($http->get["kolvo"]);
		if ( $player->pers["money"]<($v["price"]*$kolvo) ) echo "<center class=but><font class=hp>Не хватает денег.</font></center>"; 
		else
		{
			for ($i=1;$i<=$kolvo;$i++) insert_wp($v["id"],$player->pers["uid"],$v["max_durability"],0);
			$v["q_s"]-= $kolvo;
			$player->pers["money"]-= $v["price"]*$kolvo;
			$db->sql("UPDATE `users` SET `money`='".$player->pers["money"]."' , `inv`='".$player->pers["inv"]."' WHERE `uid`='".$player->pers["uid"]."' ;");
			echo "<center class=but><font class=green>Вы удачно купили \"".$v["name"]."\" за <b>".$v["price"]."</b> зм.(".$kolvo." шт.)</font></center>";
		}
	} else echo 'Вещь не существует.';
}

if ( $http->_get('lbuy') > 0 and $http->_get('lbuy')<13 and !$player->AuraSpecial[14] )
{
	$cat = (int)$http->_get('lbuy');
	if ($cat==1 and $player->pers["money"]>LMINE1)
	{
		$a["image"] = 'i/lic/lic_sh';
		$a["params"] = '';
		$a["esttime"] = 3600;
		$a["name"] = 'Лицензия шахтёра';
		$a["special"] = 14;
		light_aura_on($a,$player->pers["uid"]);
		set_vars("money=money-".LMINE1,UID);
		$player->pers["money"]-=LMINE1;
	}
	elseif ($cat==2 and $player->pers["money"]>LMINE2)
	{
		$a["image"] = 'i/lic/lic_sh';
		$a["params"] = '';
		$a["esttime"] = 3600*2;
		$a["name"] = 'Лицензия шахтёра';
		$a["special"] = 14;
		light_aura_on($a,$player->pers["uid"]);
		set_vars("money=money-".LMINE2,UID);
		$player->pers["money"]-=LMINE2;
	}
	elseif ($cat==3 and $player->pers["money"]>LMINE3)
	{
		$a["image"] = 'i/lic/lic_sh';
		$a["params"] = '';
		$a["esttime"] = 3600*3;
		$a["name"] = 'Лицензия шахтёра';
		$a["special"] = 14;
		light_aura_on($a,$player->pers["uid"]);
		set_vars("money=money-".LMINE3,UID);
		$player->pers["money"]-=LMINE3;
	}
	elseif ($cat==5 and $player->pers["money"]>LMINE5)
	{
		$a["image"] = 'i/lic/lic_sh';
		$a["params"] = '';
		$a["esttime"] = 3600*5;
		$a["name"] = 'Лицензия шахтёра';
		$a["special"] = 14;
		light_aura_on($a,$player->pers["uid"]);
		set_vars("money=money-".LMINE5,UID);
		$player->pers["money"]-=LMINE5;
	}
	elseif ($cat==8 and $player->pers["money"]>LMINE8)
	{
		$a["image"] = 'i/lic/lic_sh';
		$a["params"] = '';
		$a["esttime"] = 3600*8;
		$a["name"] = 'Лицензия шахтёра';
		$a["special"] = 14;
		light_aura_on($a,$player->pers["uid"]);
		set_vars("money=money-".LMINE8,UID);
		$player->pers["money"]-=LMINE8;
	}
	elseif ($cat==12 and $player->pers["money"]>LMINE12)
	{
		$a["image"] = 'i/lic/lic_sh';
		$a["params"] = '';
		$a["esttime"] = 3600*12;
		$a["name"] = 'Лицензия шахтёра';
		$a["special"] = 14;
		light_aura_on($a,$player->pers["uid"]);
		set_vars("money=money-".LMINE12,UID);
		$player->pers["money"]-=LMINE12;
	}
	$player->AuraSpecial[14] = 3600*$cat;
}


echo "<table border=0 cellspacing=0 cellspadding=0 style='margin:40px auto; width:100%;max-width:1200px;' class='margin-5'><tr>";
echo "<td width='25%'>У вас с собой: <b>".round($player->pers["money"],2)."</b> зм.</td>";
echo "<td width='50%'><div class='titleCity'>Вход в Шахту</div></td>";
echo "<td width='25%'></td>";
echo "</tr></table>";

if ($player->AuraSpecial[14] and !$player->AuraSpecial[15]) {
	echo "<div class='greenBlock margin-5' style='margin:15px auto; width:100%;max-width:1200px;text-align:center;'><input type=button class='inv_but' onclick=\"location='main.php?gomine=1'\" value='Спуститься в шахту'>
	<hr>Осталось: <b>".tp($player->AuraSpecial[14])."</b>.</div>";
}
if ($player->AuraSpecial[15]) {
	echo "<center class=but>Отдышка: Осталось: <b>".tp($player->AuraSpecial[15])."</b>.</center>";
}



if (!$player->AuraSpecial[14] and !$player->AuraSpecial[15]) {
	echo "<table border=0 cellspacing=0 cellspadding=0 style='margin:0 auto; width:100%;max-width:1200px;' class='greyBlock margin-5'><tr>
	<td width=16% class=margin-5 align=center><p>Лицензия на добычу<br> на <b>1 час</b></p><p><img src='images/weapons/i/lic/lic_sh.gif' alt='Лицензия Шахтера'></p><p>Цена: <b>".LMINE1."</b> зм.</p><p><input type=button class='inv_but' onclick=\"location='main.php?lbuy=1'\" value='Купить'> </p></td>
	<td width=16% class=margin-5 align=center><p>Лицензия на добычу<br> на <b>2 часа</b></p><p><img src='images/weapons/i/lic/lic_sh.gif' alt='Лицензия Шахтера'></p><p>Цена: <b>".LMINE2."</b> зм.</p><p><input type=button class='inv_but' onclick=\"location='main.php?lbuy=2'\" value='Купить'></p></td>
	<td width=16% class=margin-5 align=center><p>Лицензия на добычу<br> на <b>3 часа</b></p><p><img src='images/weapons/i/lic/lic_sh.gif' alt='Лицензия Шахтера'></p><p>Цена: <b>".LMINE3."</b> зм.</p><p><input type=button class='inv_but' onclick=\"location='main.php?lbuy=3'\" value='Купить'></p></td>
	<td width=16% class=margin-5 align=center><p>Лицензия на добычу<br> на <b>5 часов</b></p><p><img src='images/weapons/i/lic/lic_sh.gif' alt='Лицензия Шахтера'></p><p>Цена: <b>".LMINE5."</b> зм.</p><p><input type=button class='inv_but' onclick=\"location='main.php?lbuy=5'\" value='Купить'></p></td>
	<td width=16% class=margin-5 align=center><p>Лицензия на добычу<br> на <b>8 часов</b></p><p><img src='images/weapons/i/lic/lic_sh.gif' alt='Лицензия Шахтера'></p><p>Цена: <b>".LMINE8."</b> зм.</p><p><input type=button class='inv_but' onclick=\"location='main.php?lbuy=8'\" value='Купить'></p></td>
	<td width=16% class=margin-5 align=center><p>Лицензия на добычу<br> на <b>12 часов</b></p><p><img src='images/weapons/i/lic/lic_sh.gif' alt='Лицензия Шахтера'></p><p>Цена: <b>".LMINE12."</b> зм.</p><p><input type=button class='inv_but' onclick=\"location='main.php?lbuy=12'\" value='Купить'></p></td>
	</tr></table>";
}

$lavka = 1;
$enures= $db->sql("SELECT * FROM `weapons` WHERE (`p_type`='5' or `p_type`='13' or `p_type`='18') AND `where_buy`='0' or `name`='Малый рюкзак' ORDER BY `price` ASC", __FILE__,__LINE__,__FUNCTION__,__CLASS__);
echo "<form action=main.php onsubmit='return false;' name=lavka1>";
while ($v=mysql_fetch_array ($enures))
{
	echo "<table border=0 cellspacing=0 cellspadding=0 style='margin:25px auto; width:100%;max-width:1200px;' class='greyBlock margin-5'><tr><td>";
	if ($v["price"]>$player->pers["money"]) echo '<font class=hp>Не хватает денег</font> ';
	if ($v["price"]<=$player->pers["money"]) echo "<input type=text class=laar size=1 id='".$v["id"]."k' value=1> <input type=button class=submit onclick=\"w_buy('".$v["id"]."')\" value='Купить'>";
	echo '</div>';
	$vesh = $v;
	include (ROOT.'/inc/inc/weapon.php');
	echo "</td>
	</tr></table>";
}
echo "</form>";

var_dump($player->lastom_new);

?>


<script>
function w_buy(id) {
    location = 'main.php?buy=' + id + '&kolvo=' + document.getElementById(id + 'k').value + '&<?=$player->jKey();?>&' +
        Math.random();
}
</script>