<div style="margin:25px auto;width:1200px;text-align:center;">
    <h3 class='titleCity'>Беседка</h3>
    <div style="position:relative;width:830px;height:329px;margin:0px auto;">
			<img src="images/nav/bg/bes.png">
			<div style="position:absolute;bottom:100px;left:0px;width:100%;font-size:20px;">
<?php
//подарок новичка
function item_name_ny($id)
{
	$itm= $GLOBALS['db']->sqla("SELECT name FROM weapons WHERE id='".$id."'");
	return $itm['name'];
}
if ($_GET["new_user"]=='1')
{
	$podarok = rand(1,1);
		if ($podarok=='1')
		{
			$prize='333450';
			$msg = item_name_ny(333450);
			$prize2='333465';
			$msg2 = item_name_ny(333465);
		}
	
		if ($player->pers['podarok']=='0')
		{
			$db->sql("UPDATE `users` SET `podarok`='1', money=money+5000 WHERE uid='".$player->pers["uid"]."'");
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
   <input type="button" onClick="location='main.php?new_user=1'" value="Получить Подарок!!!" title="Чтоб получить подарок, нажмите на кнопку" class="inv_but">
   <br />
<?php
	}
?>

<?php
if ($player->pers["priveleged"]>=1) {
/// годовой подарок
function item_name_year($id)
{
	$itm= $GLOBALS['db']->sqla("SELECT name FROM weapons WHERE id='".$id."'");
	return $itm['name'];
}
if ($_GET["year_gift"]=='1')
{
	$year_gift = rand(1,1);
		if ($year_gift=='1')
		{
			$prize='333450'; // футболка первых
			$msg = item_name_year($prize);
			$prize2='333465'; // свиток опыта
			$msg2 = item_name_year($prize2);
			$prize3='245627'; // кольцо победоносца
			$msg3 = item_name_year($prize3);
			$prize4='333573'; // Ярость [Нам 1 год!]
			$msg4 = item_name_year($prize4);
			$prize5='333574'; // Свиток каменной кожи [Нам 1 год!]
			$msg5 = item_name_year($prize5);
			$prize6='333378'; // Мощь Охотника [Нам 1 год!]
			$msg6 = item_name_year($prize6);
			$prize7='333444'; // Гнев Хаоса [Нам 1 год!]
			$msg7 = item_name_year($prize7);
			$prize8='333575'; // Coca Cola [Нам 1 год!]
			$msg8 = item_name_year($prize8);
			$money = 50000; 			
		}
	
		if ($player->pers['year_gift']=='0')
		{
			//$db->sql("UPDATE `users` SET `year_gift`='1', money=money+".$money." WHERE uid='".$player->pers["uid"]."'");
			if ($player->pers['podarok']=='1') { 
				$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize,$player->pers["uid"],-1,0,$player->pers["user"]));
			}
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize2,$player->pers["uid"],-1,0,$player->pers["user"]));
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize3,$player->pers["uid"],-1,0,$player->pers["user"]));
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize4,$player->pers["uid"],-1,0,$player->pers["user"]));
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize5,$player->pers["uid"],-1,0,$player->pers["user"]));
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize6,$player->pers["uid"],-1,0,$player->pers["user"]));
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize7,$player->pers["uid"],-1,0,$player->pers["user"]));
			$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize8,$player->pers["uid"],-1,0,$player->pers["user"]));
			if ($player->pers['podarok']=='1') { 
				echo"<br><font color=green><b>Администрация <b>oldiow.ru</b> поздравляет Вас с Годовщиной проекта и вручает вам подарок:)</b></font>";
				say_to_chat ("s","Вы получили в подарок: <b>".$msg."</b>, <b>".$msg2."</b>, <b>".$msg3."</b>, <b>".$msg4."</b>, <b>".$msg5."</b>, <b>".$msg6."</b>, <b>".$msg7."</b>, <b>".$msg8."</b> и <b>".$money."</b> зм.",1,$player->pers["user"],'*',0);
			}
			else {
				echo"<font color=green><b>Администрация <b>oldiow.ru</b> поздравляет Вас с Годовщиной проекта и вручает вам подарок:)</b></font>";
				say_to_chat ("s","Вы получили в подарок: <b>".$msg2."</b>, <b>".$msg3."</b>, <b>".$msg4."</b>, <b>".$msg5."</b>, <b>".$msg6."</b>, <b>".$msg7."</b>, <b>".$msg8."</b> и <b>".$money."</b> зм.",1,$player->pers["user"],'*',0);
			}			
		}
		else
		{
			echo"<font color=red><b>Вы уже получили подарок</b></font>";
		}
}
if ($player->pers['year_gift']=='0')
	{
	$you_date = "30.09.2021"; // Ваша дата
	$now_date = date('d.m.Y'); // Текущая дата
	$you_date_unix = strtotime($you_date);
	$now_date_unix = strtotime($now_date);

	if($now_date_unix < $you_date_unix) {
		echo '<p>Привет дорогой друг! <br>За твое терпение и преданость нашему миру, я для тебя приготовил награду. <br>Спасибо за то, что ты с нами!</p><br />';
		echo '<input type="button" onClick="location=\'main.php?year_gift=1\'" value="Получить Подарок!!!" title="Чтоб получить подарок, нажмите на кнопку" class="inv_but">';
	}
	}
}
?>			
		</div>
	</div>
</div>