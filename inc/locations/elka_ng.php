<table width=100% cellspacing=0 cellpadding=0>
<tr>
<td align=center>
<table cellspacing=0 cellpadding=0 border=0 width=100%>
<tr>
<td width=170 align=left valign=top>
<FIELDSET><font color='#ffffff'><b>&nbsp;Магазин подарков:&nbsp;</b></font>
<table width=200>
<tr>
<td align=center>
<table>
<td style='text-align: center'><img border="0" src="images/locations/prshop.gif" style=\'cursor:hand\' width="382" height="270">
<tr>
<center>
<table width=100% cellspacing='0' cellpadding='0' border=0><tr><td style='width: 200px'>
</table>

</td>
</tr>
</table>

<!-- Конец навигации -->


</td>
<td align=center valign=top>

<FIELDSET><font color='#ffffff'><b>&nbsp; Подарки:&nbsp;</b> </font>
<?
echo "<font color=white>У вас с собой <b>".round($pers["money"],2)." <img src='images/money.gif'><b>".round($pers["dmoney"],2)." <img src='images/signs/diler.gif'></b></font><br>";

?>
<font class=hp><form action=main.php method=post>
<?
################################ Серебро покупка подарков#################################
if (@$_POST["id"])
{
	$id = sqla("SELECT * FROM presents WHERE id='".intval($_POST["id"])."'");
	if (isset($id["id"]))
	{
	    $persto = sqla("SELECT uid,user,location FROM users	WHERE user='".addslashes($_POST["towho"])."'");
		if (@$persto["uid"] and $pers["money"]>$id["price"] and $_POST["towho"]<>$pers["user"])
		{
		sql("INSERT INTO `presents_gived` ( `uid` , `name` , `image` , `date` , `who` , `anonymous` , `text`,`ng`,`price` )
VALUES ('".$persto["uid"]."', '".$id["name"]."', '".$id["image"]."', '".time()."', '".$pers["user"]."', '".intval($_POST["anonymous"])."', '".$_POST["p"]."', '".$id["ng"]."', '".$id["price"]."');");
		sql("UPDATE users SET money=money-".$id["price"]." WHERE uid='".$pers["uid"]."'");
		echo "Вы подарили подарок для ".$persto["user"];
		say_to_chat('s','Вам прислали подарок.',1,$persto["user"],'*',0);
        }
        else echo "<b><font color=red>Ошибка, возможные причины: Такого персонажа не существует. Не хватает ЛН. Нельзя дарить самому себе.</font></b>";
		}
        else echo "<b><font color=red>Не хватает серебра.</font></b>";
}
#################################################################

################################ Золото покупка подарков#################################
if (@$_POST["did"])
{
	$did = sqla("SELECT * FROM presents WHERE id='".intval($_POST["did"])."'");
	if (isset($did["id"]))

	{
	    $dpersto = sqla("SELECT uid,user,location FROM users WHERE user='".addslashes($_POST["towho"])."'");

		if (@$dpersto["uid"] and $pers["dmoney"]>$did["dprice"] and $_POST["towho"]<>$pers["user"])
		{
		sql("INSERT INTO `presents_gived` ( `uid` , `name` , `image` , `date` , `who` , `anonymous` , `text`,`ng`,`dprice`,`price` )
VALUES ('".$dpersto["uid"]."', '".$did["name"]."', '".$did["image"]."', '".time()."', '".$pers["user"]."', '".intval($_POST["anonymous"])."', '".$_POST["p"]."', '".$did["ng"]."', '".$did["dprice"]."', '".$did["price"]."');");
			sql("UPDATE users SET dmoney=dmoney-".$did["dprice"]." WHERE uid='".$pers["uid"]."'");
			echo "Вы подарили подарок для ".$dpersto["user"];
			say_to_chat('s','Вам прислали подарок .',1,$dpersto["user"],'*',0);
		}
		else echo "<b><font color=red>Ошибка, возможные причины: Такого персонажа не существует. Не хватает БР. Нельзя дарить самому себе.</font></b>";
		}
		else echo "Нельзя дарить себе.";
}
#################################################################
?>
</font>



<table border="0" width="100%" cellspacing="0" cellpadding="0">

<td width="100"><font color='#ffffff'>Для&nbsp;кого</font></td>
<td width="100"><input type=text class=lbutton name=towho></td>
<td width="28">&nbsp;</td>
<td width="46"><font color='#ffffff'>Подпись</font></td>
<td width="358"><input type=text class=lbutton name=p style="width: 100%" size="100"></td>
<td width="11">&nbsp;</td>
<td width="56"><font color='#ffffff'>Анонимно</font></td>
<td width="20"><input type="checkbox" name="anonymous" value="1"></td>
<td width="172" align="right"><input type="submit" value="Отправить" class="lbutton"></td>
</table><hr>



<table border="0" width="100%" cellspacing="0" cellpadding="0">
<font color=red>НОВЫЙ ГОД</font>
<?
################################ Серебро нг вывод#################################
	$presents = mysql_query("SELECT * FROM presents WHERE ng=1 and price>0 ORDER BY price ASC");
	$i=0;
	while($p=mysql_fetch_array($presents))
	{
		if ($i%4==0) echo "<tr>";
		echo "<td class=lbutton width=200 align=center><img src='images/presents/".$p["image"].".jpg'><br><font class=items><b>".$p["price"]." <img src='images/money.gif' title=Серебро></b></font><br><input type=radio value=".$p["id"]." name=id></td>";
		if ($i%4==4) echo "</tr>";
		$i++;
	}
?>

<?
################################ Золото нг вывод#################################
	$dpresents = mysql_query("SELECT * FROM presents WHERE ng=1 and dprice>0 ORDER BY dprice ASC");
	$i=0;
	while($p=mysql_fetch_array($dpresents))
	{
		if ($i%4==0) echo "<tr>";
		echo "<td class=lbutton width=200 align=center><img src='images/presents/".$p["image"].".jpg'><br><font class=items><b>".$p["dprice"]." <img src='images/signs/diler.gif' title=Золото></b></font><br><input type=radio value=".$p["id"]." name=did></td>";
		if ($i%4==4) echo "</tr>";
		$i++;
	}
?>
</table>


</form>


</td>
<td width=170 align=right valign=top><!-- Возможности -->

<table cellspacing=0 cellpadding=0 style='border-style: outset; border-width: 0' border=0 width=150>
<tr>
<td align=center >
<FIELDSET><LEGEND align=center>&nbsp;Действие:&nbsp;</LEGEND>
<map name="links">
<?
echo "
<input type=button class=hbutton ".build_go_string('elka',$lastom_new)." value='Выйти из здания'style='width:100%;'>";

?>
</FIELDSET> </font>
</center>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>

