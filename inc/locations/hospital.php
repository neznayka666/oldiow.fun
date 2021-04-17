 <SCRIPT SRC="./js/hospi.js"></SCRIPT>
<table cellpadding=0 cellspacing=0 border=0 align=center width=760>
<tr><td><img src=../image/1x1.gif width=1 height=10><?=$msg?><br></td></tr>
<tr><td>
<table cellpadding=0 cellspacing=1 border=0 align=center width=100%>
<tr><td bgcolor=#3564A5 width=100%><img src=../image/1x1.gif width=1 height=3></td></tr>
<tr><td bgcolor=#ffffff><img src=../image/gameplay/hospital/hospital_city1_0.jpg width=760 height=255 border=0></td></tr>
<tr><td bgcolor=#cccccc>
<table cellpadding=2 cellspacing=1 border=0 align=center width=100%>
<tr><td width=16% bgcolor=#f5f5f5><div align=center><a href=main.php?hospi_sel=1><font class=zaya><b>аптека</b></font></a></div></td><td width=17% bgcolor=#f5f5f5><div align=center><a href=main.php?hospi_sel=3><font class=zaya><b>алхимия</b></font></a></div></td><td width=16% bgcolor=#f5f5f5><div align=center><a href=main.php?hospi_sel=2><font class=zaya><b>лечение</b></font></a></div></td><td width=25% bgcolor=#f5f5f5><div align=center><a href=main.php?get_id=9&go=1&spr=20&vcode=45d5afade8e266986662019686bf9ff7# onClick="return check_hospi_enter(0,5)"><font class=zaya><b>комната отдыха</b></font></a></div></td><td width=25% bgcolor=#f5f5f5><div align=center><a href=main.php?get_id=9&go=3&spr=20&vcode=6b8cac5ea321f6f3c5cd1faa614aae7d# onClick="return check_hospi_enter(1,5)"><font class=zaya><b>больничная койка</b></font></a></div></td></tr>
</table>
</td></tr></table>
</td></tr>
</table>

<? $mass=($plstt[30]*2)+($plstt[33]*8)+$plstt[72];
?>
<table cellpadding=0 cellspacing=0 border=0 align=center width=760>
<tr><td>
<table cellpadding=0 cellspacing=1 border=0 align=center width=100%>
<tr><td>
<? if($hospi_sel==1){
$ITEMS = mysql_query("SELECT market.*, items.*
FROM market LEFT JOIN items ON market.id = items.id
WHERE kol>0 AND market=$player[loc] AND type='w0';");
$num = (mysql_num_rows($ITEMS)); 
if($num>0){?>
<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td bgcolor=#e0e0e0><table cellpadding=3 cellspacing=1 border=0 width=100%><tr><td colspan=2 bgcolor=#F9f9f9><div align=center><font class=inv><b> У Вас с собой <?=$player[nv]?> NV и вещей массой: <?=$plstt[71]?> Максимальный вес: <?=$mass?></b></div></td></tr>
<?
$freemass=$plstt[71];
while ($ITEM = mysql_fetch_assoc($ITEMS)) {
$par=explode("|",$ITEM['param']);
$need=explode("|",$ITEM[need]);
	$vcod=scode();
$bt=0;$tr_b='';$m=1;
foreach ($need as $value) {
$treb=explode("@",$value);
if($treb[0]==72)$treb[1]=$ITEM[level];
if($treb[0]==71){$treb[1]=$ITEM[massa];$plstt[71]=$mass-$freemass;}
if($treb[0]!=28){if($plstt[$treb[0]]<$treb[1]){$treb[1]="<font color=#cc0000>$treb[1]</font>";if($treb[0]==71){$m=0
;}}}
switch($treb[0])
{
case 28: $tr_b.="&nbsp;Очки действия: <b>$treb[1]</b><br>";break;
case 30: $tr_b.="&nbsp;Cила: <b>$treb[1]</b><br>";break;
case 31: $tr_b.="&nbsp;Ловкость: <b>$treb[1]</b><br>";break;
case 32: $tr_b.="&nbsp;Удача: <b>$treb[1]</b><br>";break;
case 33: $tr_b.="&nbsp;Здоровье: <b>$treb[1]</b><br>";break;
case 34: $tr_b.="&nbsp;Знания: <b>$treb[1]</b><br>";break;
case 35: $tr_b.="&nbsp;Мудрость: <b>$treb[1]</b><br>";break;
case 36: $tr_b.="&nbsp;Владение мечами: <b>$treb[1]</b><br>";break;
case 37: $tr_b.="&nbsp;Владение топорами: <b>$treb[1]</b><br>";break;
case 38: $tr_b.="&nbsp;Владение дробящим оружием: <b>$treb[1]</b><br>";break;
case 39: $tr_b.="&nbsp;Владение ножами: <b>$treb[1]</b><br>";break;
case 40: $tr_b.="&nbsp;Владение метательным оружием: <b>$treb[1]</b><br>";break;
case 41: $tr_b.="&nbsp;Владение алебардами и копьями: <b>$treb[1]</b><br>";break;
case 42: $tr_b.="&nbsp;Владение посохами: <b>$treb[1]</b><br>";break;
case 43: $tr_b.="&nbsp;Владение экзотическим оружием: <b>$treb[1]</b><br>";break;
case 44: $tr_b.="&nbsp;Владение двуручным оружием: <b>$treb[1]</b><br>";break;
case 45: $tr_b.="&nbsp;Магия огня: <b>$treb[1]</b><br>";break;
case 46: $tr_b.="&nbsp;Магия воды: <b>$treb[1]</b><br>";break;
case 47: $tr_b.="&nbsp;Магия воздуха: <b>$treb[1]</b><br>";break;
case 48: $tr_b.="&nbsp;Магия земли: <b>$treb[1]</b><br>";break;
case 53: $tr_b.="&nbsp;Воровство: <b>$treb[1]</b><br>";break;
case 54: $tr_b.="&nbsp;Осторожность: <b>$treb[1]</b><br>";break;
case 55: $tr_b.="&nbsp;Скрытность: <b>$treb[1]</b><br>";break;
case 56: $tr_b.="&nbsp;Наблюдательность: <b>$treb[1]</b><br>";break;
case 57: $tr_b.="&nbsp;Торговля: <b>$treb[1]</b><br>";break;
case 58: $tr_b.="&nbsp;Странник: <b>$treb[1]</b><br>";break;
case 59: $tr_b.="&nbsp;Языковедение: <b>$treb[1]</b><br>";break;
case 60: $tr_b.="&nbsp;Каллиграфия: <b>$treb[1]</b><br>";break;
case 61: $tr_b.="&nbsp;Ювелирное дело: <b>$treb[1]</b><br>";break;
case 62: $tr_b.="&nbsp;Самолечение: <b>$treb[1]</b><br>";break;
case 63: $tr_b.="&nbsp;Оружейник: <b>$treb[1]</b><br>";break;
case 64: $tr_b.="&nbsp;Доктор: <b>$treb[1]</b><br>";break;
case 65: $tr_b.="&nbsp;Самолечение: <b>$treb[1]</b><br>";break;
case 66: $tr_b.="&nbsp;Быстрое восстановление маны: <b>$treb[1]</b><br>";break;
case 67: $tr_b.="&nbsp;Лидерство: <b>$treb[1]</b><br>";break;
case 68: $tr_b.="&nbsp;Алхимия: <b>$treb[1]</b><br>";break;
case 69: $tr_b.="&nbsp;Развитие горного дела: <b>$treb[1]</b><br>";break;
case 70: $tr_b.="&nbsp;Рыбалка: <b>$treb[1]</b><br>";break;
case 71: $tr_b.="&nbsp;Масса: <b>$treb[1]</b><br>";break;
case 72: $tr_b.="&nbsp;Уровень: <b>$treb[1]</b><br>";break;
}
}
?>
<tr><td bgcolor=#f9f9f9><div align=center><img src=../image/weapon/<?=$ITEM[gif]?> border=0></div></td><td width=100% bgcolor=#ffffff valign=top><table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td bgcolor=#ffffff width=100%><font class=nickname><b><? if($player[nv]>=$ITEM[price] and $m!=0){?><input type=button class=invbut onclick="location='main.php?hospi_sel=1&post_id=1&wsuid=<?=$ITEM[id]?>&vcode=<?=scod()?>'" value="купить"> <? }?><?=$ITEM[name]?></b><font class=weaponch> (количество: <?=$ITEM[kol]?>)<br><img src=../image/1x1.gif width=1 height=3></td><td><br><img src=../image/1x1.gif width=1 height=3</td></tr><tr><td colspan=2 width=100%><table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td bgcolor=#D8CDAF width=50%><div align=center><font class=invtitle>свойства</div></td><td bgcolor=#B9A05C><img src=../image/1x1.gif width=1 height=1></td><td bgcolor=#D8CDAF width=50%><div align=center><font class=invtitle>требования</div></td></tr><tr><td bgcolor=#FCFAF3><font class=weaponch>&nbsp;Цена: <b><? if($ITEM[price]>$player[nv]){echo "<font color=#cc0000>$ITEM[price] NV</font>";}else{echo $ITEM[price]." NV";}?></b><br>
<? if($ITEM[slot]==16) echo "<font class=weaponch><b><font color=#cc0000>Можно одевать на кольчуги</font></b><br>";
blocks($ITEM[block]);
foreach ($par as $value) {
$stat=explode("@",$value);
if($stat[1]>0){$plus = "+";}else{$plus ="";}
switch($stat[0])
{
case 0: echo "Гравировка: <b>$stat[1]</b><br>"; break;
case 1: echo "Удар: <b>$stat[1]</b><br>";break;
case 2: echo "Долговечность: <b>".($stat[1]-$ITEM[iznos])."/$stat[1]</b><br>";break;
case 3: echo "Карманов: <b>$stat[1]</b><br>";break;
case 4: echo "Материал: <b>$stat[1]</b><br>";break;
case 5: echo "Уловка: $plus<b>$stat[1]%</b><br>";break;
case 6: echo "Точность: $plus<b>$stat[1]%</b><br>";break;
case 7: echo "Сокрушение: $plus<b>$stat[1]%</b><br>";break;
case 8: echo "Стойкость: $plus<b>$stat[1]%</b><br>";break;
case 9: echo "Класс брони: <b>$stat[1]</b><br>";break;
case 10: echo "Пробой брони: $plus<b>$stat[1]%</b><br>";break;
case 11: echo "Пробой колющим ударом: $plus<b>$stat[1]%</b><br>";break;
case 12: echo "Пробой режущим ударом: $plus<b>$stat[1]%</b><br>";break;
case 13: echo "Пробой проникающим ударом: $plus<b>$stat[1]%</b><br>";break;
case 14: echo "Пробой пробивающим ударом: $plus<b>$stat[1]%</b><br>";break;
case 15: echo "Пробой рубящим ударом: $plus<b>$stat[1]%</b><br>";break;
case 16: echo "Пробой карающим ударом: $plus<b>$stat[1]%</b><br>";break;
case 17: echo "Пробой отсекающим ударом: $plus<b>$stat[1]%</b><br>";break;
case 18: echo "Пробой дробящим ударом: $plus<b>$stat[1]%</b><br>";break;
case 19: echo "Защита от колющих ударов: $plus<b>$stat[1]</b><br>";break;
case 20: echo "Защита от режущих ударов: $plus<b>$stat[1]</b><br>";break;
case 21: echo "Защита от проникающих ударов: $plus<b>$stat[1]</b><br>";break;
case 22: echo "Защита от пробивающих ударов: $plus<b>$stat[1]</b><br>";break;
case 23: echo "Защита от рубящих ударов: $plus<b>$stat[1]</b><br>";break;
case 24: echo "Защита от карающих ударов: $plus<b>$stat[1]</b><br>";break;
case 25: echo "Защита от отсекающих ударов: $plus<b>$stat[1]</b><br>";break;
case 26: echo "Защита от дробящих ударов: $plus<b>$stat[1]</b><br>";break;
case 27: echo "НР: $plus<b>$stat[1]</b><br>";break;
case 28: echo "Очки действия: $plus<b>$stat[1]</b><br>";break;
case 29: echo "Мана: $plus<b>$stat[1]</b><br>";break;
case 30: echo "Cила: $plus<b>$stat[1]</b><br>";break;
case 31: echo "Ловкость: $plus<b>$stat[1]</b><br>";break;
case 32: echo "Удача: $plus<b>$stat[1]</b><br>";break;
case 33: echo "Здоровье: $plus<b>$stat[1]</b><br>";break;
case 34: echo "Знания: $plus<b>$stat[1]</b><br>";break;
case 35: echo "Мудрость: $plus<b>$stat[1]</b><br>";break;
case 36: echo "Владение мечами: $plus<b>$stat[1]%</b><br>";break;
case 37: echo "Владение топорами: $plus<b>$stat[1]%</b><br>";break;
case 38: echo "Владение дробящим оружием: $plus<b>$stat[1]%</b><br>";break;
case 39: echo "Владение ножами: $plus<b>$stat[1]%</b><br>";break;
case 40: echo "Владение метательным оружием: $plus<b>$stat[1]%</b><br>";break;
case 41: echo "Владение алебардами и копьями: $plus<b>$stat[1]%</b><br>";break;
case 42: echo "Владение посохами: $plus<b>$stat[1]%</b><br>";break;
case 43: echo "Владение экзотическим оружием: $plus<b>$stat[1]%</b><br>";break;
case 44: echo "Владение двуручным оружием: $plus<b>$stat[1]%</b><br>";break;
case 45: echo "Магия огня: $plus<b>$stat[1]%</b><br>";break;
case 46: echo "Магия воды: $plus<b>$stat[1]%</b><br>";break;
case 47: echo "Магия воздуха: $plus<b>$stat[1]%</b><br>";break;
case 48: echo "Магия земли: $plus<b>$stat[1]%</b><br>";break;
case 49: echo "Сопротивление магии огня: $plus<b>$stat[1]%</b><br>";break;
case 50: echo "Сопротивление магии воды: $plus<b>$stat[1]%</b><br>";break;
case 51: echo "Сопротивление магии воздуха: $plus<b>$stat[1]%</b><br>";break;
case 52: echo "Сопротивление магии земли: $plus<b>$stat[1]%</b><br>";break;
case 53: echo "Воровство: $plus<b>$stat[1]%</b><br>";break;
case 54: echo "Осторожность: $plus<b>$stat[1]%</b><br>";break;
case 55: echo "Скрытность: $plus<b>$stat[1]%</b><br>";break;
case 56: echo "Наблюдательность: $plus<b>$stat[1]%</b><br>";break;
case 57: echo "Торговля: $plus<b>$stat[1]%</b><br>";break;
case 58: echo "Странник: $plus<b>$stat[1]%</b><br>";break;
case 59: echo "Языковедение: $plus<b>$stat[1]%</b><br>";break;
case 60: echo "Каллиграфия: $plus<b>$stat[1]%</b><br>";break;
case 61: echo "Ювелирное дело: $plus<b>$stat[1]%</b><br>";break;
case 62: echo "Самолечение: $plus<b>$stat[1]%</b><br>";break;
case 63: echo "Оружейник: $plus<b>$stat[1]%</b><br>";break;
case 64: echo "Доктор: $plus<b>$stat[1]%</b><br>";break;
case 65: echo "Самолечение: $plus<b>$stat[1]%</b><br>";break;
case 66: echo "Быстрое восстановление маны: $plus<b>$stat[1]%</b><br>";break;
case 67: echo "Лидерство: $plus<b>$stat[1]%</b><br>";break;
case 68: echo "Алхимия: $plus<b>$stat[1]%</b><br>";break;
case 69: echo "Развитие горного дела: $plus<b>$stat[1]%</b><br>";break;
case 70: echo "Рыбалка: $plus<b>$stat[1]%</b><br>";break;
}
}
?>



</td><td bgcolor=#B9A05C><img src=../image/1x1.gif width=1 height=1></td><td bgcolor=#FCFAF3>
<font class=weaponch><?
echo $tr_b?>
</font>
</td></tr></table></td></tr></table></td></tr>
<? }}else{?>
<table cellpadding=5 cellspacing=1 border=0 width=100%><tr><td bgcolor=#F5F5F5 align=center colspan=2><font class=inv><b>Нет товаров в данной категории.</b></font></td></tr>
<? }?>
</table>

<? }
function blocks($bl){
	if($bl!="") {
	switch($bl)
       	{
            case 40: echo "<font class=weaponch><b><font color=#cc0000>Блокировка 1-ой точки</font></b><br>"; break;
            case 70: echo "<font class=weaponch><b><font color=#cc0000>Блокировка 2-х точек</font></b><br>"; break;
	    	case 90: echo "<font class=weaponch><b><font color=#cc0000>Блокировка 3-х точек</font></b><br>"; break;
    	}}}
?>
</td></tr>
</table>
</td></tr>
</table>