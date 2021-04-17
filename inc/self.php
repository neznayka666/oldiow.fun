<?php
	function send_mail($to, $body, $title=false)
	{
		$email = 'robot@'.HOST;
		$subject = ($title==false) ? $_SERVER['SERVER_NAME'] : htmlspecialchars($title);
		$headers = "From: ".$_SERVER['SERVER_NAME']." <".$email.">\r\n";   
		$headers .= "Return-path: <".$email.">\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=windows-1251;\r\n";
		$body.= '<br /><br />С Уважением, Администрация <a href=http://'.HOST.'/>'.$_SERVER['SERVER_NAME'].'</a> &copy;';
		if( mail($to, $subject, $body, $headers) ) return true; else return false;
	}
	
	
	#Photo upload
	if (@$_FILES)
	{
		if ($_FILES['photofile']['type']=='image/gif')
		{
			$im = @imagecreatefromgif ($_FILES['photofile']['tmp_name']);
			if ($im) 
			{
				$filename = $_FILES['photofile']['tmp_name'];
				list($width, $height) = getimagesize($filename);
				$newwidth = 400;
				if($width < $newwidth) $newwidth = $width;
				$percent = $newwidth/$width;
				$newheight = $height * $percent;
				$thumb = imagecreatetruecolor($newwidth, $newheight);
				imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				imagejpeg($thumb,"images/photos/".$player->pers["uid"]."_".(++$player->pers["photo"]).".jpg",100);
				set_vars("photo=photo+1",UID);
			}
		}
		if (eregi('image/?jpeg',$_FILES['photofile']['type']))
		{
			$im = @imagecreatefromjpeg ($_FILES['photofile']['tmp_name']);
			if ($im) 
			{
				$filename = $_FILES['photofile']['tmp_name'];
				list($width, $height) = getimagesize($filename);
				$newwidth = 400;
				if($width < $newwidth) $newwidth = $width;
				$percent = $newwidth/$width;
				$newheight = $height * $percent;
				$thumb = imagecreatetruecolor($newwidth, $newheight);
				imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				imagejpeg($thumb,"images/photos/".$player->pers["uid"]."_".(++$player->pers["photo"]).".jpg",100);
				set_vars("photo=photo+1",UID);
			}
		}
	}
	
	if (@$http->post["email"])
	{
		
		$mail = filter_var(substr($http->post['email'],0,35), FILTER_VALIDATE_EMAIL);
		if ( $player->pers['email'] <> $mail )
		{
			$is_m = (int)$db->sqlr('SELECT `uid` FROM `users` WHERE `email` = "'.$mail.'" ;');
			if ( !$is_m ) {
				$db->sql('DELETE FROM `mail_hesh` WHERE `uid` = '.UID);
				$hesh = sha1(time().rand(0, time()));
				$db->sql('INSERT INTO `mail_hesh` (`uid`, `hesh`, `date`) VALUES ('.UID.', "'.$hesh.'", '.tme().');');
				$linc = 'http://'.HOST.'/mail.php?do=check&hesh='.$hesh;
				if ( send_mail($mail, 'Для подтверждения Вашего E-Mail перейдите по ссылке <a href="'.$linc.'">'.$linc.'</a>', 'Подтверждение E-Mail') )
				{
					$player->pers['mail_good'] = 2;
					set_vars('`mail_good`=2',UID);
				}
			} else {
				$mail = $player->pers["email"];
				echo 'Почта уже кем-то используется. Выберите другую. Рекомендуем сервис <a href="http://gmail.com/" target="_blank">Gmail</a>';
			}
		}
		$player->pers["email"] = $mail;
		$player->pers["name"] = $http->post["name"];
		$player->pers["city"] = $http->post["city"];
		$player->pers["country"] = $http->post["country"];
		$player->pers["icq"] = intval($http->post["icq"]);
		$player->pers["vkid"] = intval($http->post["vkid"]);
		if($player->pers["level"]<2)
		{
			$from = explode(".",$http->post["dr"]);
			$from = mktime(0,0,0,$from[1],$from[0],$from[2]);
			$player->pers["DR_congratulate"] = mktime(0, 0, 0, $from[1], $from[0],date("Y"))+86400*7;
			if(date("d.m.Y",$from)!==false)
			{
				set_vars("dr='".date("d.m.Y",$from)."',DR_congratulate=".$player->pers["DR_congratulate"],UID);
				$player->pers["dr"] = date("d.m.Y",$from);
				
			}
		}
		set_vars("
		email='".$player->pers["email"]."',
		name='".$player->pers["name"]."',
		city='".$player->pers["city"]."',
		country='".$player->pers["country"]."',
		vkid='".$player->pers["vkid"]."',
		icq='".$player->pers["icq"]."'",UID);
	}
	
	if (@$http->post["about"])
	{
		$chars["about"] = $http->post["about"];
		$chars["about"] = str_replace("


","
",$chars["about"]);
		if (!$player->pers["diler"]) $chars["about"] = substr($chars["about"],0,900);
		$chars["about"] = str_replace("\\","",$chars["about"]);
		$db->sql("UPDATE chars SET about='".$chars["about"]."' WHERE uid=".UID);
	}
?>
<SCRIPT src="js/self.js?1"></SCRIPT>

<table style="width: 100%" class="greyBlock margin-5" cellspacing="5" cellpadding="5">
    <tr>
        <td valign="top" style="width: 200px;display:none;">
            <table style="width: 100%">
                <tr>
                    <td class="title">ФОТОГРАФИЯ</td>
                </tr>
                <tr>
                    <td align=center>
                        <?php
	if ($player->pers["photo"])
	 echo "<img src='http://".IMG."/photos/".$player->pers["uid"]."_".$player->pers["photo"].".jpg'>";
	else 
	 echo "<img src=http://".IMG."/icons/image.png><br/><i >Нет фотографии</i><br/>";
?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
	if ($player->pers["photo"])
	 echo "<a class=bg href='javascript:ch_photo()'>Сменить фотографию</a>";
	else 
	 echo "<a class=bg href='javascript:ch_photo()'>Загрузить фотографию</a>";
?>
                    </td>
                </tr>
            </table>
        </td>
        <td valign="top">
            <table style="width: 100%;" cellspacing="0" cellpadding="0">
                <tr>
                    <td><b>О вас</b></td>
                </tr>
                <tr>
                    <td align=center>
                        <form method=post>
                            <table width="100%" cellspacing="5" cellpadding="5">
                                <?php
	echo "<tr>";
	echo "<td width='50%'>E-Mail</td>";
	echo "<td><input name=email value='".$player->pers["email"]."' style='width:100%'></td>";
	echo "<td><img src='//".IMG."/icons/v/".(($player->pers['mail_good']<>1) ? 'no' : '')."check.png'></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Имя</td>";
	echo "<td><input name=name value='".$player->pers["name"]."' style='width:100%'></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Город</td>";
	echo "<td><input name=city value='".$player->pers["city"]."' style='width:100%'></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Страна</td>";
	echo "<td><input name=country value='".$player->pers["country"]."' style='width:100%'></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Дата рождения</td>";
	if($player->pers["level"]<2)
		echo "<td><input class=but name=dr value='".$player->pers["dr"]."' size=10></td>";
	else
		echo "<td><input class=but name=dr value='".$player->pers["dr"]."' size=10 DISABLED></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Дата регистрации</td>";
	echo "<td >".$player->pers["ds"]."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Время онлайн</td>";
	echo "<td >".tp($curtimeonline=(time()-$player->pers["lastvisits"]))."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td width='50%'>Проведено в игре</td>";
	echo "<td >".tp($player->pers["timeonline"]+$curtimeonline)."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td colspan=2 align=center><input type=submit value='Применить' class='inv_but'></td>";
	echo "</tr>";
	
?>
                        </form>
            </table>
        </td>
    </tr>
</table>
</td>
</tr>
<tr>
    <td colspan="2" valign="top">
        <table style="width: 100%">
            <tr>
                <td><b>Краткая информация о вас</b></td>
            </tr>
            <tr>
                <td align=center>
                    <form method=post>
                        <?php
	if (!$db->sqlr("SELECT COUNT(*) FROM chars WHERE uid='".$player->pers["uid"]."'"))
	{
		$db->sql("INSERT INTO `chars` (`uid`) VALUES ('".$player->pers["uid"]."');");
	}
	$chars = $db->sqla("SELECT about FROM chars WHERE uid=".$player->pers["uid"]);
	echo "<textarea style='width:100%' rows=8 name=about>";
	echo $chars["about"];
	echo "</textarea>";
	echo "<br>";
	echo "<input type=submit value='Применить' class='inv_but'>";
?>
                    </form>
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</center>