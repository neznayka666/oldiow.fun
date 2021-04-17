<?php

	function to_bb($string) 
	{
	 	$str_search[]="[b]";
	 	$str_search[]="[/b]";
	 	$str_replace[]="<b>";
     	$str_replace[]="</b>";
  	 	$str_search[]="[i]";
	 	$str_search[]="[/i]";
	 	$str_replace[]="<i>";
     	$str_replace[]="</i>";
  	 	$str_search[]="[u]";
	 	$str_search[]="[/u]";
	 	$str_replace[]="<u>";
     	$str_replace[]="</u>";
  	 	$str_search[]="[s]";
	 	$str_search[]="[/s]";
	 	$str_replace[]="<strike>";
     	$str_replace[]="</strike>";
  	 	$str_search[]="[quote]";
	 	$str_search[]="[/quote]";
	 	$str_replace[]="<blockquote style='background-color: #FFFFFF;'>";
     	$str_replace[]="</blockquote>";
  	 	$str_search[]="[center]";
	 	$str_search[]="[/center]";
	 	$str_replace[]="<center>";
     	$str_replace[]="</center>";
     	$string=str_replace($str_search, $str_replace, $string);          // преобразование текста
	 	$patern="#\[url=([^\]]*)\]([^\[]*)\[/url\]#i";
	 	$replace='<a href="\\1" target="_blank" rel="nofollow">\\2</a>';
		$string=preg_replace($patern, $replace, $string); //преобразование ссылок
		$patern="#\[img\]([^\[]*)\[/img\]#i";
	 	$replace='<img src="\\1" alt=""/>';
	 	$string=preg_replace($patern, $replace, $string);  //преобразование картинок
	 	$patern="#\[youtube=([^\]]*)\]#i";
	 	$replace='<object width="425" height="350"><param name="movie" value="http://www.youtube.com/v/\\1"></param><embed src="http://www.youtube.com/v/\\1" type="application/x-shockwave-flash" width="425" height="350"></embed></object>';
	 	$string=preg_replace($patern, $replace, $string);  //преобразование ютюба

		return nl2br($string);
	}


if ( isset($_GET['save']) and $pers != false and $pers['priveleged']==1 ) include_once ('inc/edit.php');
if ( isset($_GET['new_page']) and $pers != false and $pers['priveleged']==1 ) include_once ('inc/newpage.php');


if ( !$stop_view )
{
	if ( $_GET['act'] )
	{
		if ($_GET['act']==99) include_once ('lib_news.php');
		else
		{
			$res = $db->sqla('SELECT * FROM `lib_content` WHERE `id`="'.$_GET['act'].'" LIMIT 1;');
			if ( $res != false )
			{
				echo '<b class="title">'.$res['title'].'.</b><br /><br />';
				if ( isset($_GET['edit']) and $pers != false and $pers['priveleged']==1 ) include_once ('inc/edit.php');
				elseif ( !empty($res['file']) ) include_once($_SERVER['DOCUMENT_ROOT'].'/file/'.$res['file'].'.php');
				else
				{
					echo to_bb($res['text']);
					if ($pers != false and $pers['priveleged']==1 ) echo '<br /><br /><b>[<a href="?act='.$res['id'].'&edit=1">Редактировать</a>]</b><br /><br />';
				}
			} else echo '<b>Страница не найдена.</b><br />'.(($pers != false and $pers['priveleged']==1 ) ? '<a href="/?act='.$_GET['act'].'&new_page=1">Создать</a>' : '').'<br />';
		}
	} else include_once ('lib_news.php');
}
?>