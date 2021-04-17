<?php
// ALTER TABLE `users` ADD `last_instant` INT( 11 ) UNSIGNED NOT NULL DEFAULT '0'
// INSERT INTO `locations` (`id`, `name`, `inc`, `go_id`) VALUES ('inst_turnir', 'Подземелье', 'instant/turnir.php', '');
// ALTER TABLE `users` ADD `etap_instant` TINYINT( 2 ) UNSIGNED NOT NULL DEFAULT '0'
// ALTER TABLE `bots` ADD INDEX ( `level` )

DEFINE ('MIN_LEVEL', 10);



$inst = ( date('d', $player->pers['last_instant']) != date('d') ) ? true : false;
if ( $player->pers['level']< MIN_LEVEL ) $inst = false;

if ( $http->_get('go_turnir') and $inst )
{
	$player->pers['last_instant'] = tme();
	$player->pers['location'] = 'inst_turnir';
	$player->pers['etap_instant'] = 1;
	$_no_echo = true;
	//include_once (ROOT.'/inc/locations/instant/turnir.php');
	include ('inc/locations/instant/turnir.php');
	set_vars('`last_instant` = '.$player->pers['last_instant'].', `location` = "'.$player->pers['location'].'", `etap_instant` = 1', UID);
}

if ( !isset($_no_echo) )
{
	echo"
	<table border=0 cellspacing=0 cellspadding=0 style='margin:40px auto; width:100%;max-width:1200px;' class='margin-5'>
    <tr>
        <td width='25%'></td>
        <td width='50%'>
            <div class='titleCity'>Подземелье Чемпионов!</div>
        </td>
        <td width='25%'></td>
    </tr>
	</table>
	";

	echo'<table cellspacing="5" cellpadding="5" style="margin:0 auto;width:100%;max-width:1200px;" class="greyBlock margin-5">
		<tr><td style="text-align:center;">';
	if ( $inst ) 
	{
		
		echo 'Здравствуй путник!<br />
		Хочешь испытать свои силы в схватке с ужасными существами? За победу ты получишь хорошее вознаграждение!<br />
		Зайдя в подземелье ты уже не сможешь вернутся обратно, выполнить задание можно лишь раз в день.<br /><br />
		<center><a href="main.php?do=3&go_turnir=1" class="bga" style="width:250px;">Спустится в подземелье</a></center>';
		
	} else echo '<div class="redBlock margin-5">Вы больше не можете выполнить это задание сегодня.</div>';
	echo'</td> </tr></table>';
}
?>
</td>
</tr>
</table>