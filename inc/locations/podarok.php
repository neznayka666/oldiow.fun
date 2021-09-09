<div style="margin:25px auto;width:1200px;text-align:center;">
    <h3 class='titleCity'>Беседка</h3>
    <div style="position:relative;width:830px;height:329px;margin:0px auto;">
        <img src="images/nav/bg/bes.png">
        <div style="position:absolute;bottom:100px;left:0px;width:100%;font-size:20px;">
            <?php
function item_name_ny($id)
{
	$itm= $GLOBALS['db']->sqla("SELECT name FROM weapons WHERE id='".$id."'");
	return $itm['name'];
}
if ($_GET["year"]=='1')
{
	$podarok = rand(1,1);
	if ($podarok=='1')
	{
		$prize='333450';
		$msg = item_name_ny(333450);
		$prize2='333465';
		$msg2 = item_name_ny(333465);
		$prize3='333465';
		$msg3 = item_name_ny(333465);
		$prize4='333465';
		$msg4 = item_name_ny(333465);
		$prize5='333465';
		$msg5 = item_name_ny(333465);
		$prize6='333465';
		$msg6 = item_name_ny(333465);
	}
	/*
	else if ($podarok=='2')
	{
		$prize='333351';
		$msg = item_name_ny(333351);
	}
	else if ($podarok=='3')
	{
		$prize='333357';
		$msg = item_name_ny(333357);
	}
	else if ($podarok=='4')
	{
		$prize='333356';
		$msg = item_name_ny(333356);
	}
	else if ($podarok=='5')
	{
		$prize='333349';
		$msg = item_name_ny(333349);
	}
	else if ($podarok=='6')
	{
		$pod = '`money`='.$player->pers['money'].'+"10000"';
		$msg = '10000 LN';
	}
	else if ($podarok=='7')
	{
		$pod = '`imoney`='.$player->pers['money'].'+"2000"';
		$msg = '2000 IM';
	}
	*/
	
	if ($player->pers['podarok']=='0')
	{
		$db->sql("UPDATE `users` SET `podarok`='1', money=money+50000 WHERE uid='".$player->pers["uid"]."'");
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize,$player->pers["uid"],-1,0,$player->pers["user"]));
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize2,$player->pers["uid"],-1,0,$player->pers["user"]));
		echo"<font color=green><b>Администрация <b>oldiow.ru</b> поздравляет Вас с регистрацией и вручает подарок:) <br>Вы получили в подарок: ".$msg.",".$msg2."</b></font>";
		say_to_chat ("s","Вы получили в подарок: <b>".$msg."</b>, <b>".$msg2."</b> и <b>5000</b> зм.",1,$player->pers["user"],'*',0);
	}
	else
	{
		echo"<font color=red><b>Вы уже получили подарок</b></font>";
	}
}
if ($player->pers['podarok']=='0')
	{
?>
            <p>Привет дорогой друг! <br>За твое терпение и преданость нашему миру, я для тебя приготовл награду.
                <br>Спасибо за то, что ты с нами!
            </p>
            <input type=button onClick="location='main.php?year=1'" value="Получить Подарок!!!"
                title="Чтоб получить подарок, нажмите на кнопку">
            <br />
            <?php
	}
	else {
		echo"<font color=red><b>Вы уже получили подарок</b></font>";
	}


	if ($player->pers['podarok']=='1')
	{
		$db->sql("UPDATE `users` SET `podarok`='2', money=money+50000 WHERE uid='".$player->pers["uid"]."'");
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize,$player->pers["uid"],-1,0,$player->pers["user"]));
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize2,$player->pers["uid"],-1,0,$player->pers["user"]));
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize3,$player->pers["uid"],-1,0,$player->pers["user"]));
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize4,$player->pers["uid"],-1,0,$player->pers["user"]));
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize5,$player->pers["uid"],-1,0,$player->pers["user"]));
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize6,$player->pers["uid"],-1,0,$player->pers["user"]));
		echo"<font color=green><b>Администрация <b>oldiow.ru</b> поздравляет Вас с регистрацией и вручает подарок:) <br>Вы получили в подарок: ".$msg.",".$msg2."</b></font>";
		say_to_chat ("s","Вы получили в подарок: <b>".$msg."</b>, <b>".$msg2."</b> и <b>50000</b> зм.",1,$player->pers["user"],'*',0);
	}
	else
	{
		echo"<font color=red><b>Вы уже получили подарок</b></font>";
	}
}

if ($player->pers['podarok']=='1')
	{
?>
            <p>Привет дорогой друг! <br>За твое терпение и преданость нашему миру, я для тебя приготовл награду.
                <br>Спасибо за то, что ты с нами!
            </p>
            <input type=button onClick="location='main.php?year=1'" value="Получить Подарок!!!"
                title="Чтоб получить подарок, нажмите на кнопку">
            <br />
            <?php
	}
	else {
		echo"<font color=red><b>Вы уже получили подарок</b></font>";
	}

	?>
        </div>
        <div>
        </div>