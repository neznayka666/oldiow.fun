<?php
if($player->pers["good_pupils_count"]) {
		echo "<div class='greyBlock'>Вы уже обучили <b>".$player->pers["good_pupils_count"]."</b> персонажей.<br><i class=ma>За каждого 5ого вы будете дополнительно получать по 100 зм.</i></div>";
	}
if($http->_post('pupil'))
{
	$pname = $http->_post('pupil');
	$p = $db->sqla("SELECT `uid`,`user` FROM `users` WHERE `user` = '".$pname."' and level<=5 and instructor=0");
	if($p)
	{
		say_to_chat ("^","Персонаж <b>".$player->pers["user"]."</b>[".$player->pers["level"]."] предлагает вам стать его учеником. За это вы получите 10 зм. и +50% опыта за бои.","1",$p["user"],"*");
		
		$db->sql("INSERT INTO `salings` (`id`,`idw`,`uidp`,`price`, `uidwho`) VALUES (0,0,'".$player->pers["uid"]."',0,".$p["uid"].") ");
		$idf =  $db->insert_id();
		$m = "saling#".$idf;
		say_to_chat ('s',$m,1,$p["user"],'*',0);
		say_to_chat ("^","Заявка удачно подана.","1",$player->pers["user"],"*");
	}
}

$pupil = $db->sqla("SELECT * FROM `users` WHERE `instructor` = ".$player->pers["uid"]);


if( $http->_get('deny') )
{
	$db->sql("UPDATE users SET instructor=0 WHERE instructor = ".$player->pers["uid"]);
	say_to_chat ('^',"Персонаж <b>".$player->pers["user"]."</b>[".$player->pers["level"]."] отказался от обучения.",1,$pupil["user"],'*',0);
	$pupil = $db->sqla("SELECT * FROM users WHERE instructor = ".$player->pers["uid"]);
}

if($pupil)
{
	echo "<div class='greyBlock'>";		
	echo "У вас есть ученик ";	
	echo "<b>".$pupil["user"]."</b> [".$pupil["level"]."] <img src='images/icons/inf.gif' onclick=\"javascript:window.open('info.php?p=".$pupil["user"]."','_blank')\" style='cursor:pointer' > <input type=button  value='Отказаться от обучения' onclick=\"location = 'main.php?gopers=student&deny=1'\" class='inv_but' ></div>";
	echo "</div>";
}
else
{
	echo "<div class='greyBlock'>";	
	echo "";
	echo "Вы никого не обучаете...";
	echo "<br>";
	echo "<form method=post action=main.php?gopers=student>";
	echo "<div><input  type=text name=pupil id=pupil value=''> <input type=submit class='inv_but' value='Предложить стать наставником'></div>";
	echo "</form>";	
	echo "</div>";
	echo "<p class='infoBlock'><i style='text-align:left;'><b class=ma>Справка:</b> Предложить стать наставником можно любому персонажу ниже 10ого уровня. Предложение бесплатно, однако, если персонаж примет его, то с вашего счёта спишется <b>20 зм.</b>, а ученик получит <b>10 зм.</b> и <b>+50% опыта за бои</b> в награду. Обучать можно лишь одного персонажа. Если ваш ученик достигнет 5ого уровня вы получите в награду <b>200 зм.</b> и <b>10 пергаментов</b>!</i></p>";
	echo "<script>ActionFormUse = 'pupil';</script>";

	
}


?>