    <div class="main">
        <div class="titleCity">Новогодняя Елка</div>
        <div class='cityWork'>
            <div style="position:relative;width:830px;height:329px;margin:0px auto;">
                <img src="/images/locations/city_new/elka.png" width="830" height="329">
                <div style="position:absolute;bottom:100px;left:0px;width:100%;font-size:20px;padding:25px;">
                    <?php
function item_name_ny($id)
{
	$itm= $GLOBALS['db']->sqla("SELECT name FROM weapons WHERE id='".$id."'");
	return $itm['name'];
}
if ($_GET["year"]=='1')
{
	$ny = rand(1,1);
	if ($ny=='1')
	{
		$prize='333515';
		$msg = item_name_ny(333515);
		$prize2='333518';
    $msg2 = item_name_ny(333518);
    $prize3='333519';
    $msg3 = item_name_ny(333519);    
    $prize4='333514';
    $msg4 = item_name_ny(333514); 
    $prize5='333516';
    $msg5 = item_name_ny(333516);
    $prize6='333517';
    $msg6 = item_name_ny(333517);          
	}
	
	if ($player->pers['ny']=='0')
	{
		$db->sql("UPDATE `users` SET `ny`='1', imoney=imoney+500 WHERE uid='".$player->pers["uid"]."'");
		$db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize,$player->pers["uid"],-1,0,$player->pers["user"]));
    $db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize2,$player->pers["uid"],-1,0,$player->pers["user"]));
    $db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize3,$player->pers["uid"],-1,0,$player->pers["user"]));
    $db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize4,$player->pers["uid"],-1,0,$player->pers["user"]));
    $db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize5,$player->pers["uid"],-1,0,$player->pers["user"]));
    $db->sql("UPDATE `wp` SET `timeout`='' WHERE id=".insert_wp($prize6,$player->pers["uid"],-1,0,$player->pers["user"]));     
		echo"<font style='color:white;font-size:12px;'>Вы получили в подарок: ".$msg.",".$msg2.",".$msg3.",".$msg4.",".$msg5.",".$msg6."</b> и <b>500</b> сз.</font>";
		say_to_chat ("s","Вы получили в подарок: <b>".$msg."</b>, <b>".$msg2."</b>, <b>".$msg3."</b>, <b>".$msg4."</b>, <b>".$msg5."</b>, <b>".$msg6."</b> и <b>500</b> сз.",1,$player->pers["user"],'*',0);
	}
	else
	{
		echo"<font style='color:red;text-shadow: 0 0 0.1em white, 0 0 0.1em white, 0 0 0.1em white, 0 0 0.1em white;'><b>Вы уже получили подарок</b></font>";
	}
}
if ($player->pers['ny']=='0')
	{
?>
                    <p style="color:white;"><b>Администрация <b>oldiow.fun</b> поздравляет <br>Вас с Новым Годом и
                            вручает
                            подарок:)</b>
                        <br>Спасибо за то, что ты с нами!
                    </p>
                    <?php
$today = date('Y-m-d'); 
$outdate = "2021-01-01";

if($today >= $outdate) {
  echo '<input type="button" onClick="location=\'main.php?year=1\'" value="Получить Подарок!!!"
                        title="Чтоб получить подарок, нажмите на кнопку" class="inv_but">';
}
else {
  echo '<p style="color:white;">Еще не время!</p>';
}

?>


                    <br />
                    <?php
	}
	else {
		echo"<font style='color:red;text-shadow: 0 0 0.1em white, 0 0 0.1em white, 0 0 0.1em white, 0 0 0.1em white;'><b>Вы уже получили подарок</b></font>";
	}
?>

                </div>
            </div>
        </div>
    </div>