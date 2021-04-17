<?php
$now=time();


if ($_GET['set']=="buy"){
	if ($pers["dmoney"]>=3){
	$nums = mysql_fetch_array(mysql_query("select MAX(number) as number from lotto"));
	if ($nums['number']<500) {
                $nm=$nums['number']+1;

        $buy = mysql_query("UPDATE users SET dmoney=dmoney-3 WHERE uid=".$pers["uid"]."");
        $insert = mysql_query("INSERT INTO lotto(name, number) VALUES('$pers[user]','$nm')");
        $infond = mysql_query("UPDATE lotto_fond SET fond=fond+3");
        echo "<p><center><font color='#ffffff'>Вы купили билет под номером: <b>$nm</b> за 3 <img src=images/gameplay/1_1.png></font></center><p>";
unset($NEW_NUMBER);
	}else echo "<font color='#ffffff'>Все билеты проданы, попробуйте на следующей неделе.</font>";
	exit();
}
	if ($money<5){
	echo "<font color='#ffffff'>У вас недостаточно денег</font>";
	exit();}

}
if ($_GET['set']=="play"){
$nums1 = mysql_fetch_array(mysql_query("select MAX(number) as number from lotto"));
$r_l = $nums1["number"];
	$num1 = rand(1, $r_l);
	$fondasd = mysql_query("SELECT * FROM lotto_fond");
	$resta = mysql_fetch_array($fondasd);
	$fond = $resta['fond'];
        $date = date('d.m.Y H:i:s');
	$sqlwin = mysql_query("SELECT * FROM lotto WHERE number='$num1'");
	$reswinrow = mysql_num_rows($sqlwin);
		if($reswinrow == 0){
			$win = "нет";
                        $winperson = mysql_query("INSERT INTO lotto_winner(time, name, number, fond) VALUES('$date', '$win','$num1', $fond)");

			$sbrosl = mysql_query("TRUNCATE TABLE lotto");
		}else{
			while ($reswin = mysql_fetch_array($sqlwin)){
			$win = $reswin['name'];
			}
			$plus = mysql_query("UPDATE users SET dmoney=dmoney+'$fond' WHERE user='$win'");
			$sbrosf = mysql_query("UPDATE lotto_fond SET fond=0");
			$sbrosl = mysql_query("TRUNCATE TABLE lotto");
                        		$winperson = mysql_query("INSERT INTO lotto_winner(time, name, number, fond) VALUES('$date', '$win','$num1', '$fond')");
//require_once("../function/chat_insert.php");
//insert_msg("fghg <SCRIPT language=JavaScript>top.chat_frame.loto('__________fgfdghd________','main_body',70); </script> <b>($stat[user])</b> ","","","1","","","0");
			//require_once("../function/chat_insert.php");
       			//insert_msg("Кто то зашел на вашу <b><u>уникальную ссылку</u></b>!<script>top.chat_frame.loto(\"__________fgfdghd________\",\"main_body\",70);</script>","","","1","","",0);
			}
echo "<p><center><font class=sysmessage>Выиграл номер: <b>$num1</b>. Победитель розыгрыша: <b>$win</b>.</font></center><p>";
exit();}
?>

<table width=100% cellspacing=0 cellpadding=3 border=3>
    <tr>
        <td>
            <table cellSpacing=0 cellPadding=3 width="100%" border=3 align=center>
                <tr>
                    <td width=45% valign=top>
                        <FIELDSET>
                            <LEGEND>
                                <font color="#ffffff">Победители прошлых розыгрышей</font>
                            </LEGEND>
                            <font color="#ffffff">
                                <?php
$otchet=mysql_query("SELECT * FROM lotto_winner order by id desc");
for ($i=0; $i<mysql_num_rows($otchet); $i++) {
$otchets=mysql_fetch_array($otchet);
echo"<u>$otchets[time]</u> | Победитель: <b>$otchets[name]</b> | Номер: $otchets[number] | Фонд: $otchets[fond]<img src=images/money.gif><br>";
}
$nums1 = mysql_fetch_array(mysql_query("select MAX(number) as number  from lotto"));
$ost = 500 - $nums1["number"];
$sum=mysql_fetch_array(mysql_query("SELECT fond FROM lotto_fond"));

?>
                            </font>
                        </FIELDSET>
                    </td>
                    <td width=55% valign=top>

                        <FIELDSET>
                            <LEGEND>
                                <font color="#ffffff">Правила игры</font>
                            </LEGEND>
                            <font color="#ffffff">Правила игры предельно просты, от Вас требуется только купить билет и
                                запомнить число которое вам покажит компьютер.
                                <br>
                                Если ваще число совпадёт в конце недели с числом которое выдаст компьютер, то значит вы
                                победитель!
                                <br>
                                Имена победителей розыгрышей публикуются на доске победителей(слева).
                                <br>
                                Сумма фонда лоттереи автоматически зачисливаеться на счёт выигрывшего игрока.<br>
                                Если победителей в розыгрыше нет, то сумма фонда остаёться до сл. розыгрыша.
                            </font>
                        </FIELDSET>
                        <p>
                        <FIELDSET>
                            <LEGEND>
                                <font color="#ffffff">Новая игра</font>
                            </LEGEND>
                            &nbsp;&nbsp;<b>
                                <font color="#ffffff">У Вас на счету:
                            </b> <u><?=$pers[dmoney]?></u> <b><img src=images/gameplay/1_1.png><br>&nbsp;&nbsp;Стоимость
                                билета <u>3</u> <b><img src=images/gameplay/1_1.png></b><br> &nbsp;&nbsp;Осталось
                                билетов: <u><?=$ost?></u><br>&nbsp;&nbsp;Сумма выигрыша: <u><?=$sum[fond]?></u>
                                <br><br>
                                <center>
                                    </font>


                                    <?php
if ($pers['sign']=="watchers") print "<input type=button class=input value='Провести лотто' onclick='window.location = \"?gameroom=3&set=play\"' class=search style='WIDTH: 100px'>
&nbsp;&nbsp;&nbsp;&nbsp; ";?>
                                    <? print "<input type=button class=input value='Купить билет' onclick='window.location = \"?gameroom=3&set=buy\"' class=search style='WIDTH: 100px'>"; ?>
                                </center>
                        </FIELDSET>
                        </form>
                    </td>
                </tr>
            </table>