<script>
var MAINID;

function w_buy(id) {
    MAINID = 'id' + id;
    $('#' + MAINID).html('<img src=http://<?php echo IMG;?>/spinner.gif>');
    $.get('/gameplay/ajax/get_lavka.php', {
        'buy': id,
        'kolvo': $('#' + id + 'k').val()
    }, function(r) {
        arr = r.split('@');
        if (arr[0] == 'NO') $('#' + MAINID).html(arr[1]);
        else if (arr[0] == 'OK') success(arr[1], arr[2], arr[3]);
    });
}
</script>
<table style="width:1200px;margin:25px auto;">
    <tr>
        <td width="25%">
            <?php echo "У Вас на счету: <b>".round($player->pers["money"],2)."</b> зм."; ?>
        </td>
        <td width="50%" align="center">
            <h3 style="COLOR: 993300;FONT-SIZE: 14pt;FONT-WEIGHT: bold;">Магазин</h3>
        </td>
        <td width="25%"></td>
    </tr>
</table>
<?php
if ($player->pers["priveleged"]>=1) {
echo "<table style='width:100%;' cellspacing=0 cellspacing=0 class=but><tr>";
echo "<td style='width: 25%' align=center><div><a href=# ".build_go_string('pr_shop',$lastom_new)." class=But>Второй этаж</a> Магазин подарков</div></td> <td style='width: 25%' align=center><div><a href=# ".build_go_string('warehouse',$lastom_new)." class=But>Третий этаж</a> Аукцион</div></td>";
echo "<td style='width: 25%' align=center><div><a href=# ".build_go_string('alchemy',$lastom_new)." class=But>Подвал</a> </div></td>";
echo "</tr></table>";
}
//Покупаем  вещь
if (isset($_GET["buy"]) and isset($_GET["kolvo"]) and $_GET["kolvo"]>0 and $_GET["kolvo"]<100)
{
	$v = $db->sqla("SELECT price,q_s,where_buy,name,id,max_durability FROM `weapons` WHERE `id`='".$_GET["buy"]."' ;");
	$kolvo = intval($_GET["kolvo"]);
	if ($kolvo>$v['q_s']) $kolvo = $v['q_s'];
	if ($v["where_buy"]==0 and $v["q_s"]>0)
	{
		if ($player->pers["money"]<($v["price"]*$kolvo)) 
		echo "<b><font class=hp>Не хватает денег.</b></font>"; 
		else 
		{
			for ($i=1;$i<=$kolvo;$i++) insert_wp($v["id"],$player->pers["uid"],$v["max_durability"],0,$player->pers["user"]);
			$player->pers["money"]-= $v["price"]*$kolvo;
			$db->sql ("UPDATE `users` SET `money`=money-".$v["price"]*$kolvo." WHERE `uid`='".$player->pers["uid"]."' ;");
			$db->sql ("UPDATE `weapons` SET `q_s`=q_s - ".$kolvo." WHERE `id`='".$v["id"]."' ;");
			echo "<br><font class=hp>Вы удачно купили \"".$v["name"]."\" за ".$v["price"]." зм.(".$kolvo." шт.)</font>";
		}
	}
}
//Лавка

if($_FILTER["lavkatype"]=='potion' and @$_GET["put_lot2"])
{
	$gos = 30;

	if(@$_GET["put_lot"])
	{
		$id = intval($_GET["put_lot"]);
		$price = mtrunc(intval($_POST["price"]));
		$RES = $db->sqla("SELECT * FROM `wp` WHERE `uidp`=".UID." and `stype`='potion' and `clan_sign`='' and `weared`=0 and `in_bank`=0 and id=".$id);
		if($price>$RES["price"]*$gos) $price=$RES["price"]*$gos;
		if($RES)
			$db->sql("UPDATE wp SET `tempprice`=".$price.", `in_bank`=2, `user`='".$player->pers["user"]."' WHERE id=".$id); 
	}
	$RES = $db->sql("SELECT * FROM `wp` WHERE `uidp`=".UID." and `stype`='potion' and `weared`=0 and `in_bank`=0 and `clan_sign`=''");
	echo "<table border='0' width='1200' cellspacing='0' cellpadding='0'>";
	while ($v=mysql_fetch_array ($RES))
	{
		echo "<tr><td>";
		echo "<form method=post action='main.php?put_lot2=1&put_lot=".$v["id"]."'>Цена: <input type=text class=login size=3 name=price value=".$v["price"]."> <b>зм.</b> <input type=submit class=inv_but value='Выставить на продажу'></form>";
		$vesh = $v;
		include ("inc/inc/weapon.php");
		echo "</td></tr>";
	}
	echo "</table>";
}
if($_FILTER["lavkatype"]=='potion' and @$_GET["buy_potion"])
{
	$id = intval($_GET["buy_potion"]);
	$RES = $db->sqla("SELECT * FROM `wp` WHERE in_bank=2 and id=".$id);
	if($RES)
	{
		if($RES["tempprice"]>$player->pers["money"])
		{
			echo "<center class=but><b class=hp>Не хватает денег на покупку</b></center>";
		}else
		{
			set_vars("money=money-".intval($RES["tempprice"]),UID);
			$player->pers["money"] -= $RES["tempprice"];
			$db->sql("UPDATE wp SET uidp=".UID.", user='".$player->pers["user"]."', in_bank=0, tempprice=0 WHERE id=".$id);
			say_to_chat("s","У вас купили <b>".$RES["name"]."</b> за <b>".$RES["tempprice"]." зм.</b>. Покупку совершил <b>".$player->pers["user"]."</b>. Комиссия: <b>".round($RES["tempprice"]*0.1,2)." зм.</b>",1,$RES["user"],"*");
			set_vars("money=money+".round($RES["tempprice"]*0.9,2),$RES["uidp"]);
			transfer_log(1,$RES["uidp"],$player->pers["user"],$RES["tempprice"],$RES["price"],$RES["name"],"Через лавку");
			transfer_log(4,$player->pers["uid"],$RES["user"],$RES["price"],$RES["tempprice"],$RES["name"],"Через лавку");
		}
	}
}

$ti=tme();

if ($_FILTER["lavkasort"]<>'tlevel' and $_FILTER["lavkasort"]<>'price')$_FILTER["lavkasort"]='price';
?>
<table width="1200" cellspacing="2" cellspadding="2" style="margin:15px auto;" class="greyBlock margin-5 padding-15">
    <tr>
        <td align=center colspan="2">
            <form method="POST" action='main.php'>

                Сортировка: <select size="1" name="sort" class=items>
                    <option <?php if ($_FILTER["lavkasort"]=='price' ) echo "selected" ; ?> value="price"> По
                        цене</option>
                    <option <?php if ($_FILTER["lavkasort"]=='tlevel' ) echo "selected" ; ?> value="tlevel"> По
                        уровню</option>
                </select> | <b class=about>Уровень от <input type="text" name="minlevel" size="7" value="<?php if ($_FILTER[" lavkaminlevel"]<>"") echo $_FILTER["lavkaminlevel"];else
                    echo "0";?>"> до <input type="text" name="maxlevel" size="7" value=<? if
                        ($_FILTER["lavkamaxlevel"]<>"") echo $_FILTER["lavkamaxlevel"];else echo
                    $player->pers["level"];?> ></b>
                | Не дороже <input type="text" name="maxcena" size="7" value="<?php if ($_FILTER[" lavkamaxcena"]<>"")
                echo $_FILTER["lavkamaxcena"];else echo"100000";?>"><b>зм.</b> | <input class="inv_but" type="submit"
                    value="Ок">
            </form>
        </td>
    </tr>
    </table->

    <table width="1200" cellspacing='2' cellpadding="2" style="margin:15px auto;padding:0;">
        <tr>
            <td style="width:250px;" valign="top" class="greyBlock margin-5 padding-15">
                <script>
                show_imgs_sell();
                </script>
            </td>
            <td valign="top" class="greyBlock margin-5 padding-15">
                <table width="100%" cellspacing="5" cellpadding="0">
                    <?php

$lavka = 1;
if ($_FILTER["lavkasort"]!='tlevel') $_FILTER["lavkasort"]='price';
if ($_FILTER["lavkatype"]!='napad') $stype = "`stype`='".$_FILTER["lavkatype"]."'";
else $stype = "`type` = 'napad' ";
	
$enures = $db->sql("SELECT * FROM `weapons` WHERE `tlevel`>='".$_FILTER["lavkaminlevel"]."' and `tlevel`<='".$_FILTER["lavkamaxlevel"]."' and `price`<='".$_FILTER["lavkamaxcena"]."' and ".$stype." and `where_buy`='0' ORDER BY `".$_FILTER["lavkasort"]."` ASC");
echo "<form action=main.php onsubmit='return false;' name=lavka1>";
while ($v=mysql_fetch_array ($enures))
{
	if($v["material"]=='')
	{
		$r = rand(1,2);
		if($v["tlevel"]<3) $r = rand(1,2);
		elseif($v["tlevel"]<10) $r = rand(2,4);
		else $r = rand(3,5);
		$resources = $db->sql("SELECT * FROM resources ORDER BY RAND() LIMIT 0,".$r);
		while($_r = mysql_fetch_array($resources))
		{
			$v["material_show"] .= $_r["name"].", ";
			$v["material"] .= $_r["image"]."|";
		}
		$v["material"] = substr($v["material"],0,strlen($v["material"])-1);
		$v["material_show"] = substr($v["material_show"],0,strlen($v["material_show"])-2);
		$db->sql("UPDATE weapons SET material='".$v["material"]."',material_show='".$v["material_show"]."' WHERE id='".$v["id"]."'");
	}
	echo "<tr><td style='border:1px solid #ccc;background:#f5f5f5;padding:5px;'>";
	echo"<div id='id".$v["id"]."'></div>";
	if ($v["q_s"]<1) echo "<font class=hp><b> Нет в наличии</b></font> ";
	if ($v["q_s"]>0 and $v["price"]<=$player->pers["money"]) echo "<p style='background:#e2e0e0;padding:3px;margin:3px;'>В наличии: <b>".$v["q_s"]."</b> | <input type=text size=2 id='".$v["id"]."k' value=1> <input type=button class=inv_but onclick=\"w_buy('".$v["id"]."')\" value='Купить'></p>";
	$vesh = $v;
	include (ROOT.'/inc/inc/weapon.php');
	echo "</td></tr>";
}

if($_FILTER["lavkatype"]=='potion')
{
	$lavka = 0;
	echo "<center><a href='main.php?put_lot2=1' class=wbut>Выставить</a></center>";
	echo "<table border=1 width=760 cellspacing=0 cellpadding=0 class=but>";
	$RES = $db->sql("SELECT * FROM `wp` WHERE in_bank=2");
	while ($v=mysql_fetch_array ($RES)) 
	{
		echo "<tr><td>";
		echo "Цена: <b>".$v["tempprice"]." зм.</b> | Выставил: <b>".$v["user"]."</b>";
		if($v["tempprice"]<=$player->pers["money"])echo " | <input type=button class=inv_but onclick=\"location = 'main.php?buy_potion=".$v["id"]."'\" value='Купить'>";
		$vesh = $v;
		include ("inc/inc/weapon.php");
		echo "</td></tr>";
	}
	echo "</table>";
}
?></form>
                </table>
            </td>
        </tr>
    </table>

    <script>
    function success(name, price, kolvo) {
        document.getElementById(MAINID).innerHTML = '<p style="padding:10px;color:green;">Вы удачно купили <b>"' +
            name + '"</b> за <b>' + price +
            ' зм.</b> в количестве ' + kolvo + ' шт.</p>';
    }
    </script>