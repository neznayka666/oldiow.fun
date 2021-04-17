<?php
echo '<b class="title">Новости.</b><br /><br /><div class="news_middle">';

if ( isset($_POST['ntext']) and isset($_GET['subact']) and $pers != false )
{
	$text = $_POST['ntext'];
	$db->sql("INSERT INTO `lib_news_coment` (`id`, `id_news`, `user`, `text`, `date`) VALUES (NULL, '".$_GET['subact']."', '".$pers['user']."', '".$text."', '".time()."');");
	$db->sql("UPDATE `lib_news` SET `coment`=coment+1 WHERE `id`='".$_GET['subact']."';");
}

if ( isset($_GET['del']) and isset($_GET['subact']) and $pers != false and $pers['priveleged']==1 )
{
	$db->sql("DELETE FROM `lib_news_coment` WHERE `id`='".$_GET['del']."' and `id_news`='".$_GET['subact']."' ;");
	$db->sql("UPDATE `lib_news` SET `coment`=coment-1 WHERE `id`='".$_GET['subact']."';");
}


if ( !isset($_GET['subact']) )
{
	$news = $db->sql('SELECT * FROM `lib_news` ORDER BY `date` DESC LIMIT 0, 20;');
	while ( $n = mysql_fetch_assoc($news) )
	{
		echo '<div class=news><div class=p1>'.$n['title'].'</div><div class=p2>Автор: '.$n['autor'].' &nbsp;&nbsp;&nbsp; Дата: '.date('d.m.Y H:i', $n['date']).'.</div><div class=p3>'.nl2br($n['text']).'</div><!--div class=p3><a href="?act=1&subact='.$n['id'].'">Коментировать ('.$n['coment'].')</a></!--div--></div>';
	}
	echo '<div class="news p2">Страницы: <a href="javascript://" onclick="news(1);"><b>1</b></a></div>';
}
elseif ( ($news = $db->sqla('SELECT * FROM `lib_news` WHERE `id`="'.$_GET['subact'].'";')) != false )
{
	echo '<div class=news><div class=p1>'.$news['title'].'</div><div class=p2>Автор: '.$news['autor'].' &nbsp;&nbsp;&nbsp; Дата: '.date('d.m.Y H:i', $news['date']).'.</div><div class=p3>'.nl2br($news['text']).'</div></div>';
	$i = 0;
	$coment = $db->sql('SELECT * FROM `lib_news_coment` WHERE `id_news`="'.$news['id'].'" ORDER BY `date`;');
	while ( $com = mysql_fetch_assoc($coment) )
	{
		$i++;
		echo '<div class=news><div class=p3>'.nl2br($com['text']).'</div><div class=p2>Автор: '.$com['user'].' &nbsp;&nbsp;&nbsp; Дата: '.date('d.m.Y H:i', $com['date']).'. '.(($pers != false and $pers['priveleged']==1) ? '<a href="?act=1&subact='.$news['id'].'&del='.$com['id'].'">Удалить</a>' : '').'</div></div>';
	}
	//if ($i==0) echo '<br /><div class="p1" align="center">Комментарий не найдено.</div>';
	/*if ($pers != true) echo '<table width="100%" class="but"><form method="post">
		<tr><td><textarea name="ntext" class="inv_button" cols="50" rows="6"></textarea></td></tr>
		<tr><td><center><input type="submit" class="login" value="Комментировать"></center></td></tr>
		</form></table>';
		*/
} else echo '<b>Новость не найдена.</b><br /><br />';
echo '</div>';
?>