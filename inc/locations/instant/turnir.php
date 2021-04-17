<table border=0 cellspacing=0 cellspadding=0 style='margin:40px auto; width:100%;max-width:1200px;' class='margin-5'>
    <tr>
        <td width='25%'></td>
        <td width='50%'>
            <div class='titleCity'>Подземелье Чемпионов!</div>
        </td>
        <td width='25%'></td>
    </tr>
</table>
<table cellspacing="5" cellpadding="5" style="margin:0 auto;width:100%;max-width:1200px;" class='greyBlock margin-5'>
    <tr>
        <td>
            <?php

// Имя бота / уровень / количество / награда за этап

$bot_list = Array(
	Array( // по 18
		Array('Тролль', 11, 5, '1|1'),			   // 1
		Array('Фагн', 12, 5, '1|2'),			   // 2
		Array('Фагн', 13, 5, '1|3'),			   // 3
		Array('Фагн', 14, 5, '1|4'),			   // 4
		Array('Разбойник', 14, 5, '1|5'),		   // 5
		Array('Фагн', 16, 5, '1|6'),			   // 6
		Array('Фагн', 17, 5, '1|7'),			   // 7
		Array('Тролль',20, 5, '1|8'),		       // 8
		Array('Монстр', 20, 6, '1|9'),	           // 9
		Array('Желтый Дракон', 15, 4, '1|10'),	   // 10
		//Array('Летучая мышь', 25, 1, '3|333502')   // 11
	),
	Array( // 19 +
		Array('Фагн', 17, 5, '1|1'),			      // 1
		Array('Защитник', 19, 5, '1|2'),		      // 2
		Array('Скелет', 19, 8, '1|3'),			      // 3
		Array('Монстр', 20, 8, '1|4'),			      // 4
		Array('Тролль', 20, 9, '1|5'),			      // 5
		Array('Желтый Дракон', 15, 5, '1|6'),  // 6
		Array('Огр', 20, 10, '1|7'),				  // 7
		Array('Пустынный Орк',22, 8, '1|8'),		  // 8
		Array('Пустынный Гоблин', 23, 10, '1|9'),	  // 9
		Array('Зеленый Дракон', 25, 5, '1|1'),		  // 10
		//Array('Летучая мышь', 30, 1, '3|333502')	  // 11
	)
);
	
// Разделяем по уровню
$bot_list = $bot_list[(($player->pers['level']>20) ? 1 : 0)];	
	
	
################################################################# Дальше код

function priz_gived()
{
	GLOBAL $player,$db,$bot_list;
	$obj_array = Array();
	$obj = explode('@', $bot_list[$player->pers['etap_instant']-2][3]);
	if ( !count($obj) ) return 'отсутствует  ';
	foreach ( $obj as $v )
	{
		$a = explode(',',$v); $ar = Array();
		foreach ($a as $i) $ar[] = explode('|', $i);
		$obj_array[] = $ar;
	}
	# Выбираем какой вариант дарить
	$obj_array = $obj_array[rand(0, count($obj_array)-1)];
	//$obj_array = 3;
	// Даем подарки
	$echo_list = '';

	// даем вещь
	$v = $db->sqla('SELECT `id`, `name` FROM `weapons` WHERE `id` = 333521 LIMIT 1;');
	if ( $v )
		{
			$echo_list.= '<b>'.$v['name'].'</b>, <b>1000</b> зм., <b>150</b> сз.';
			$tme = (int)$val[2];
			$tm = ($tme) ? (tme()+$tme) : 0;
			$id = insert_wp( $v['id'], $player->pers['uid'],-1,0,$player->pers['user'] );
			if ($id)
			$db->sql("UPDATE `wp` SET `timeout` = ".(tme()+3600*24).", `describe` = '<b>Подземелье</b>' WHERE `id` = ".$id);
			$db->sql('UPDATE `users` SET `money` = money+1000, `imoney` = imoney+150 WHERE `uid` = '.$player->pers['uid'].' LIMIT 1;');
		}
/*
	foreach ($obj_array as $val)
	{
		switch ( $val[0] )
		{
			case 1: // зм
					$echo_list.= $val[1].' зм. ';
					$player->pers['money']+= (int)$val[1];
					$db->sql('UPDATE `users` SET `money` = '.$player->pers['money'].' WHERE `uid` = '.$player->pers['uid'].' LIMIT 1;');
				break;
			case 2: // пр
					$echo_list.= $val[1].' пр. ';
					$player->pers['imoney']+= (int)$val[1];
					$db->sql('UPDATE `users` SET `imoney` = '.$player->pers['imoney'].' WHERE `uid` = '.$player->pers['uid'].' LIMIT 1;');
				break;
			case 3: // даем вещь
					$v = $db->sqla('SELECT `id`, `name` FROM `weapons` WHERE `id` = 333521 LIMIT 1;');
					if ( $v )
					{
						$echo_list.= $v['name'].', ';
						$tme = (int)$val[2];
						$tm = ($tme) ? (tme()+$tme) : 0;
						$id = insert_wp( $v['id'], $player->pers['uid'],-1,0,$player->pers['user'] );
						if ($id)
							$db->sql("UPDATE `wp` SET `timeout` = ".$tm.", `describe` = '<b>Подземелье</b>' WHERE `id` = ".$id);
					}
				break;
			case 4: // Даем опыт
					$echo_list.= $val[1].' опыта, ';
					$player->pers['exp']+= (int)$val[1];
					$db->sql('UPDATE `users` SET `exp` = '.$player->pers['exp'].' WHERE `uid` = '.$player->pers['uid'].' LIMIT 1;');
				break;
			case 5:	// Даем обнул
					$echo_list.= $val[1].' обнул., ';
					$player->pers['zeroing']+= (int)$val[1];
					$db->sql('UPDATE `users` SET `zeroing` = '.$player->pers['zeroing'].' WHERE `uid` = '.$player->pers['uid'].' LIMIT 1;');
				break;
		}
	}
	*/
	$echo_list = empty($echo_list) ? 'отсутствует' : substr($echo_list,0,strlen($echo_list)-2); 
	return $echo_list;
}

## Анализируем старые бои, получаем результаты
$pattle_id = Array(); $old_batt_echo = '';
if ( $player->pers['etap_instant'] > 1 )
{
	$res = $db->sql('SELECT `cfight` FROM `battle_logs` WHERE `uid` = '.UID.' ORDER BY `time` DESC LIMIT 0, '.($player->pers['etap_instant']-1).';');
	while ( $rs = mysql_fetch_row($res) ) $pattle_id[] = $rs[0];
	// Получаем инфу об последнем бое
	$last_battle = $db->sqlr('SELECT `result` FROM `fights` WHERE `id` = '.$pattle_id[0].';');
	if ( !preg_match('/Победа за: <b>'.$player->pers['user'].'/', $last_battle) )
	{
		say_to_chat('s','Вы проиграли!',1,$player->pers['user'],'*',0);
		set_vars('`last_instant` = '.tme().', `location` = "vhod", `etap_instant` = 0', UID);
		echo '<div id=waiter class=but align=center></div>';
		echo '<script>waiter(3);</script>';
		exit;
	}
	// Переворачиваем массив ключей
	sort($pattle_id);
	for ( $i = 0; $i<($player->pers['etap_instant']-1); $i++ )
		$old_batt_echo.= '<tr align="center"><td>Этап №'.($i+1).' - <a href="/fight.php?id='.$pattle_id[$i].'">Лог боя</a></td></tr>';
}


// Обрабатываем инфу об новом этапе
$new_etap_echo = '';
if ( $nex_etap = $bot_list[$player->pers['etap_instant']-1] )
{
	$bid = $db->sqlr('SELECT `id` FROM `bots` WHERE `user` = "'.$nex_etap[0].'" and `level` = "'.$nex_etap[1].'";');
	if ($bid)
	{
		$bot_lid = '';
		for ( $i=1; $i<=$nex_etap[2]; $i++ )
		{
			$bot_lid.= 'bot='.$bid.'|';
			$new_etap_echo.= '<tr align="center"><td><b>'.$nex_etap[0].'</b> ['.$nex_etap[1].'] <a href="binfo.php?name='.$nex_etap[0].'" target="_blank"><img src="images/icons/inf.gif"></a></td></tr>';
		}
	}
}else {
	$ls = priz_gived();
	say_to_chat('s','Вы выиграли! Получено: '.$ls,1,$player->pers['user'],'*',0);
	say_to_chat('a','Поздравляем чемпиона <b>'.$player->pers['user'].'</b> с успешным покорением подземелья!',0,'','*',0); 
	set_vars('`last_instant` = '.tme().', `location` = "vhod", `etap_instant` = 0, `inst_rait` = inst_rait+1', UID);
	echo '<div id=waiter class=but align=center></div><script>waiter(1);</script>';
	exit;
}

if ( $http->_get('next_etap') and isset($bot_lid) )
{
	set_vars('`etap_instant` = etap_instant+1', UID);
	begin_fight ($bot_lid,$player->pers['user'],"Подземелье. Этап №".$player->pers['etap_instant'].".","80","900","1",0,2,1);
	$echo_content = '<div id=waiter class=but align=center></div><script>waiter(1);</script>';
}

if ( $http->_get('exit_room') )
{
	if ( $player->pers['etap_instant']>2 )
	{
		//$ls = priz_gived();
		say_to_chat('s','Вы покидаете подземелье на уровне <b>'.$player->pers['etap_instant'].'</b>!'.$ls,1,$player->pers['user'],'*',0);
	}
	set_vars('`last_instant` = '.tme().', `location` = "vhod", `etap_instant` = 0', UID);
	$echo_content = '<div id=waiter class=but align=center></div><script>waiter(1);</script>';
}
?>
            <div class="but" align="center">
                <?php if ( isset($echo_content) )echo $echo_content.'<br />'; ?>
                Этап №<?=($player->pers['etap_instant']);?>.
                <table border="0" cellspacing="0" cellspadding="0" class="but" width="700">
                    <tr align="center">
                        <td>Пройденные этапы
                            <hr>
                        </td>
                        <td>Следующий этап
                            <hr>
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            <table border="0" cellspacing="0" cellspadding="0" width="300"><?=$old_batt_echo;?></table>
                        </td>
                        <td>
                            <table border="0" cellspacing="0" cellspadding="0" width="300"><?=$new_etap_echo;?></table>
                        </td>
                    </tr>
                    <tr align="center">
                        <td width="50%"><a
                                href="javascript:if(confirm('Вы уверены что хотите покинуть локацию?'))location='/main.php?exit_room=1';"
                                class="bga">Покинуть подземелье</a></td>
                        <td width="50%"><a href="main.php?next_etap=1" class="bga">Начать бой</a></td>
                    </tr>
                </table>
                <br /><br /><br /><i>*Вам необходимо выиграть все бои, лишь тогда вы станете истинным чемпионом! Всего
                    этапов
                    <?=count($bot_list);?>.</i>
            </div>
        </td>
    </tr>
</table>