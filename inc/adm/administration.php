<table cellspacing=0 cellspadding=0 style='margin:40px auto; width:100%;max-width:1200px;' class='margin-5'>
    <tr>
        <td width='25%'></td>
        <td width='50%'>
            <div class='titleCity'>Возможности Администратора</div>
        </td>
        <td width='25%'></td>
    </tr>
</table>

<?php
if ($priv['level']>0)
{
	$_max = $db->sqla_id("SELECT `max_online`,`time_max_online` FROM `configs` LIMIT 0,1");
	$online = "Макс. Онлайн: <b>".$_max[0]."</b> | <span class=gray>".date("d.m.Y H:i",$_max[1])."</span>";
	
	$abb = '';
	$links = '';
	
	if ($priv['emain'] and $priv['level']==3) 
	{
		$abb .= "Вы <b>можете</b> управлять кабинетом министров.<br>";
		$links .= "<li><a  href=main.php?go=ministers> Кабинет министров</a></li>";
	}
	if ($priv['eusers'] and $priv['level']==3) 
	{
		$abb .= "Вы <b>можете</b> управлять населением мира.<br>";
		$links .= "<li><a  href=main.php?go=users> Население</a></li>";
	}
	
	if ($priv['emap'] and $priv['level']>=2) 
	{
		$abb .= 'Вы <b>можете</b> просматривать карту.<br>';
		if ($priv['emap']==2) $abb .= 'Вы <b>можете</b> изменять карту.<br>';
		$links .= '<li><a  href=main.php?go=map_edit> Редактор карты</a></li>';
	}
	if ($priv['ewp'] and $priv['level']>=2) 
	{
		$abb .= "Вы <b>можете</b> просматривать вещи.<br>";
		if ($priv['ewp']==2) $abb .= "Вы <b>можете</b> изменять вещи.<br>";
		$links .= "<li><a  href=main.php?go=weapons> Редактор вещей</a></li>";
	}

	if ($priv['eclans'] and $priv['level']>=2) 
	{
		$abb .= "Вы <b>можете</b> просматривать кланы.<br>";
		if ($priv['eclans']==2) $abb .= "Вы <b>можете</b> изменять кланы.<br>";
		$links .= "<li><a  href=main.php?go=aclans> Редактор кланов</a></li>";
	}
	
	if ($priv['emagic'] and $priv['level']>=2) 
	{
		$abb .= "Вы <b>можете</b> управлять магией в мире.<br>";
		$links .= "<li><a  href=main.php?go=magic> Магия</a></li>";
	}
	if ($priv['equests'] and $priv['level']>=2) 
	{
		$abb .= "Вы <b>можете</b> управлять квестами.<br>";
		$links .= "<li><a  href=main.php?go=quests> Квесты</a></li>";
	}
	if ($priv['ebots'] and $priv['level']>=2) 
	{
		$abb .= "Вы <b>можете</b> управлять существами мира.<br>";
		$links .= "<li><a  href=main.php?go=bots> Боты</a></li>";
	}
	if ($priv['etavern'] and $priv['level']>=2) 
	{
		$abb .= "Вы <b>можете</b> управлять таверной.<br>";
		$links .= "<li><a  href=main.php?go=tavern> Таверна</a></li>";
	}	
	if ($priv['ejour'] and $priv['level']>=1) 
	{
		$jms = (int)$db->sqlr('SELECT COUNT(date) FROM `support` WHERE `closed`>0 ;',0);
		$abb .= "Вы <b>можете</b> управлять средствами масс-медиа.<br>";
		$links .= "<li><a  href=main.php?go=jour> Масс-медиа (журналистика) [{$jms}]</a></li>";
		unset($jms);
	}
	
	$req = $db->sqlr("SELECT COUNT(*) FROM `avatar_request`");
	$links .= "<li><a  href=main.php?go=ava_req> Одобрить образ [<b class=user>".$req."</b>]</a></li>";
	if (UID==1 or UID==7) $links .= "<li><a a href=main.php?go=admdlr> Управление дилерами</a></li>";
	if (UID==1 or UID==7) $links .= "<li><a a href=main.php?go=imgloader>Загрузчик картинок</a></li>";
if (UID==1) $links .= "<li><a a href=main.php?go=admchat>Чат</a></li>";
	
	
	echo "<table cellspacing=5 cellspadding=5 style='margin:40px auto; width:100%;max-width:1200px;' class='greyBlock margin-5'>";
	echo "<tr><td colspan='2' align='center' class='whiteBlock margin-5'>Должность: Создатель мира назначил вас на должность <b>".$priv['status']."</b><hr>".$online."</td></tr>";
    echo "<tr>";
    echo "<td width='50%'>";	
	echo "<ul>".$links."</ul>";
}
/*
if ($_GET['reGHesh']==1)
{
	$hesh = rand(10000, 10000000);
	if(sql('INSERT INTO `invitation` ( `hesh`, `you`) VALUES ('.$hesh.', '.$pers['uid'].');'))
	echo 'Создан новый пригласительный ключ № <b>'.$hesh.'</b>';
	else echo 'Ошибка.';
}

echo '<br /><br /><a  href=main.php?reGHesh=1>Сгенерировать пригласительный ключ</a><br />';
*/
?>
</td>
<td width='50%'>
    <?=$abb;?>
</td>
</tr>
</table>