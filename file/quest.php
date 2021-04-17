<?php

function tp($l)
{
	$l = mtrunc($l);
	$n='';
	if ((floor($l/86400))<>0) {$n = $n.(floor($l/86400))."д&nbsp;";$l=$l%86400;}
	if ((floor($l/3600))<>0) $n = $n.(floor($l/3600))."ч&nbsp;";
	if ((floor(($l%3600)/60))<>0) $n = $n.(floor(($l%3600)/60))."м&nbsp;";
	$n = $n.(($l%3600)%60)."с";
	return $n;
}

function mtrunc($q)
{
	if ($q<0) $q=0;
	return $q;
}

function qjob_type($qu)
{
	$r = '';
	switch ($qu['job_type'])
	{
		case 1: $r = 'отобрать у <a href="https://oldiow.fun/binfo.php?name='.$qu['job_botname'].'" target="_blank"><b>'.$qu['job_botname'].'</b></a><br />Нужно:&nbsp;'.$qu['job_count'].'&nbsp;шт.<hr>'; break;
		case 2: $r = 'охота на <a href="https://oldiow.fun/binfo.php?name='.$qu['job_botname'].'" target="_blank"><b>'.$qu['job_botname'].'</b></a><br />Нужно:&nbsp;'.$qu['job_count'].'&nbsp;шт.<hr>'; break;
		case 3: $r = 'принести <b>'.$qu['job_botname'].'</b><br />Нужно:&nbsp;'.$qu['job_count'].'&nbsp;шт.<hr>'; break;
		case 4: $res = explode('|', $qu['job_botname']);
				$r = 'посетить <b>'.$qu['job_lutname'].'</b>';
			break;
	}
	return $r;
}
	
	if ( isset($_GET['nps']) )
	{
		echo '<a href="?act=12"><b>Назад</b></a><br /><br />';
		$nps = $db->sqla('SELECT * FROM `jQuest_nps` WHERE `qid` = '.(int)$_GET['nps'].' LIMIT 1;');
		if ( $nps )
		{
			echo '<table width="100%" style="text-align: center; border-collapse:collapse;">';
			echo '<tr valign="top" style="border: 1px solid #222222;"><td width="140" style="border: 1px solid #222222; padding: 5px;">
			<b>'.$nps['name'].'</b><br />
			<img src="https://oldiow.fun/public_content/faces/'.$nps['img'].'" width="130" height="130" border="0" style="cursor:pointer;" /><hr>
			Корд: '.$nps['x'].' : '.$nps['y'].'<br />
			</td><td style="border: 1px solid #222222; padding: 5px; text-align:left;">';
			
			$qs = $db->sql('SELECT * FROM `jQuest_list` WHERE `nps_id` = '.$nps['qid'].' ORDER BY `id` ASC;');
			while ( $q = mysql_fetch_assoc($qs) )
			{
				echo '<FIELDSET><LEGEND align="center"><b onClick="location=\'/?act=12&nps='.$nps['qid'].'&q='.$q['id'].'\';" style="cursor:pointer;">'.$q['name'].'</b></LEGEND>';
				echo '<table width="100%"'.((isset($_GET['q']) and $_GET['q']==$q['id']) ? ' class="but"' : '').'><tr valign="top"><td>';
				
				if ($q['runtime']) echo 'На выполнение '.tp($q['runtime']).'<hr>';
				echo qjob_type($q);
				echo 'Ур.:'.(!$q['min_level'] ? '' : '&nbsp;от&nbsp;'.$q['min_level']).(!$q['max_level'] ? '' : '&nbsp;до&nbsp;'.$q['max_level']).'<hr>';
				if ($q['pre_quest'])
				{
					$pq = $db->sqla('SELECT `id`, `name`, `nps_id` FROM `jQuest_list` WHERE `id` = '.$q['pre_quest'].' LIMIT 1;');
					echo 'Предквест: <b onClick="location=\'/?act=12&nps='.$pq['nps_id'].'&q='.$pq['id'].'\';" style="cursor:pointer;">'.str_replace(' ', '&nbsp;', $pq['name']).'</b><hr>';
				}
				if ($q['repetition']== -1)echo 'Повторяется<hr>';
				elseif ($q['repetition']==0)echo 'Нельзя&nbsp;повторить<hr>';
				else echo 'Раз&nbsp;в&nbsp;'.$q['repetition'].'&nbsp;дня.<hr>';
				//echo 'Шанс дропа <b>'.$q['job_success'].'%</b>';
				
				echo '</td><td>&nbsp;</td><td>'.str_replace('@', '<br />', $q['text_start']).'<hr>От этого квеста зависят:';
				# Находим квесты зависящие от этого и добавляем
				$zq = $db->sql('SELECT `id`, `name`, `nps_id` FROM `jQuest_list` WHERE `pre_quest` = '.$q['id'].' LIMIT 1;');
				while ( $z = mysql_fetch_assoc($zq) ) echo '<p><b onClick="location=\'/?act=12&nps='.$z['nps_id'].'&q='.$z['id'].'\';" style="cursor:pointer;">'.str_replace(' ', '&nbsp;', $z['name']).'</b></p>';
			
				echo '</td></tr></table></FIELDSET><br />';
			}
			echo '</td></tr></table>';
		} else echo 'NPS не найден.';
	} else {
		echo '<b class="title">Игровые NPS:</b><br /><br />';
		echo'<ul>';
		$nps = $db->sql('SELECT * FROM `jQuest_nps` WHERE `active` = 1 ORDER BY `qid` ASC;');
		while( $n = mysql_fetch_assoc($nps) )
		{
			echo '<li class="qlist"><a href="?act=12&nps='.$n['qid'].'">'.$n['name'].'</a> ['.$n['x'].' : '.$n['y'].']</li>';	
		}
		echo "</ul>";
	
	}
	


?>