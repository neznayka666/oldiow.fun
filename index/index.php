<?php
Header('Content-Type: text/html; charset=utf8');
Header("Cache-Control: no-cache, must-revalidate");
Header("Pragma: no-cache");
$img_server = 'images/';

define('MICROLOAD', true);
// Загружаем файл конфига, ВАЖНЫЙ.
include ($_SERVER['DOCUMENT_ROOT'].'/configs/config.php');
// Подключаемся к SQL базе
$db = new MySQL(SQL_USER, SQL_PASS, SQL_BASE);
############################## 
$rid = !empty($_SERVER['QUERY_STRING']) ? abs(intval($_SERVER['QUERY_STRING'])) : false;
if ( $rid != false ) setcookie('RefererReg', $rid, time()+3600);
// Установим для русской даты.. не везде будет работать.. левую функцию лень вставлять.. если что можно удалить
//setlocale(LC_ALL, 'ru_RU.CP1251');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Инстинкты Воина: Возрождение - Многопользовательская ролевая онлайн игры, mmorpg, фэнтези, бои, квесты, задания</title>
	<script type="text/javascript" src="../js/mod/jquery.js"></script>
   <script type="text/javascript">
     /* $(document).ready(function() {
        $('div.modal').click(function() {
            var modalid = $(this).attr('rel');
            $('#' + modalid).fadeIn(600);
            $('#fadebody').fadeIn(600);
            var topm = ($('#' + modalid).height() + 10) / 2;
            var leftm = ($('#' + modalid).width() + 10) / 2;
            $('#' + modalid).css({
                'margin-top': -topm,
                'margin-left': -leftm
            });
            $('#fadebody, .close').click(function() {
                $('#fadebody , .modalbox').fadeOut(600)
                return false;
            });
        });
        /*
        $("#form_show").click(function() {
            url_open = 'reg.php';
            viewwin = open(url_open, "regWindow",
                "width=455, height=300, status=yes, toolbar=no, menubar=no, resizable=no, scrollbars=no"
            );
            return false;
        });
        
    });
*/
    function jgetForm() {
        if ($('#user').val() == '') {
            $('#user').focus();
            return;
        }
        if ($('#pass').val() == '') {
            $('#pass').focus();
            return;
        }
        var obj = document.getElementById('goGame');
        obj.setAttribute("action", "/game.php?");
        obj.setAttribute("method", "post");
        obj.submit();
    }

    function OpenPopupCenter(pageURL, title, w, h) {
        var left = (screen.width - w) / 4;
        var top = (screen.height - h) / 2; // for 25% - devide by 4  |  for 33% - devide by 3
        var targetWin = window.open(pageURL, title,
            'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' +
            w + ', height=' + h + ', top=' + top + ', left=' + left);
    }
    </script>
	 <STYLE>
		 *{
			 margin:0;
			 padding:0;
		 }
		 body {
			  background:#000;
		 }
body, td, ol, ul, li {
  FONT-SIZE: 10pt;
  FONT-FAMILY: Verdana, Arial, Helvetica, Tahoma, sans-serif;
 
}
.MainInput	{
	FONT-SIZE: 8pt;
	COLOR: #FBFA97;
	BACKGROUND-COLOR: #351517;
	WIDTH: 80px;
	HEIGHT: 15px;
	BORDER-TOP: 1px;
	BORDER-LEFT: 1px;
	BORDER-TOP-COLOR: #EACC7E;
	BORDER-BOTTOM-COLOR: #EACC7E;
	BORDER-LEFT-COLOR: #EACC7E;
	BORDER-RIGHT-COLOR: #EACC7E;
	BORDER-STYLE: Outset;
	FONT-FAMILY: Tahoma;
	TEXT-ALIGN: Center;
}
A:link, A:visited, A:active {
	COLOR: #4D1B1F;
	TEXT-DECORATION: None;
}
A:hover {
	COLOR: #86252E;
	TEXT-DECORATION: None;
}

img {
	border: 0px;
}
</STYLE>
</head>
<body LEFTMARGIN=0 TOPMARGIN=0>

<div class="main" style="margin:0 auto;width:1024px;" >
<TABLE WIDTH=1024 CELLSPACING=0 CELLPADDING=0 >
<TR HEIGHT=118>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_1.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_2.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_3.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_4.gif'></TD>
</TR>
<TR HEIGHT=118>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_1.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_2.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_3.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_4.gif'></TD>
</TR>
</TABLE>

<DIV STYLE="POSITION: Relative; margin-top: -121px;">

<TABLE WIDTH=1024 CELLSPACING=0 CELLPADDING=0 BORDER=0>
<TR HEIGHT=118>
	<TD ALIGN=LEFT VALIGN=BOTTOM WIDTH=397><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=1><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=120 HEIGHT=1><IMG SRC='<?=$img_server?>index_page/label_lib.png'></TD>
	<TD WIDTH=230><SPAN></SPAN></TD>
	<TD ALIGN=RIGHT VALIGN=BOTTOM WIDTH=397><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=1><!--<IMG SRC='<?=$img_server?>index_page/label_forum.png' ALT='Открыть форум в новом окне'>--><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=120 HEIGHT=1></TD>
</TR>
</TABLE>

</DIV>



<TABLE WIDTH=1024 CELLSPACING=0 CELLPADDING=0 BORDER=0>
<TR HEIGHT=100%>
	<TD WIDTH=297 HEIGHT=100% VALIGN=TOP BACKGROUND='<?=$img_server?>index_page/menu_line.gif'>
		<TABLE WIDTH=297 HEIGHT=100% CELLSPACING=0 CELLPADDING=0 BORDER=0 >
		<TR>
			<TD HEIGHT=290 BACKGROUND='<?=$img_server?>index_page/login_form.gif' VALIGN=TOP ALIGN=RIGHT HEIGHT=100%>

			<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 WIDTH=190 >
			<FORM ACTION='../../game.php' METHOD=POST>
			<TR>
				<TD ALIGN=CENTER>
					<IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=25><BR>
					<A HREF='#' onclick="OpenPopupCenter('/reg.php', 'TEST!?', 500, 500);"><IMG SRC='<?=$img_server?>index_page/label_register.png' ALT='Зарегистрировать нового персонажа'></A><BR>
					
					<A HREF='#'><IMG SRC='<?=$img_server?>index_page/label_forgot.png'></A>
					
					<BR><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=7><TABLE BORDER=0 WIDTH=150 CELLSPACING=0 CELLPADDING=0>
					<TR>
						<TD WIDTH=57 VALIGN=CENTER><IMG SRC='<?=$img_server?>index_page/label_login.png'></TD>
						<TD VALIGN=TOP><INPUT TYPE=TEXT	Class='MainInput' name="logins" ><BR><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=1></TD>
					</TR>
					<TR>
						<TD COLSPAN=2 HEIGHT=6><SPAN></SPAN></TD>
					</TR>
					<TR>
						<TD WIDTH=57 VALIGN=CENTER><IMG SRC='<?=$img_server?>index_page/label_password.png'></TD>
						<TD VALIGN=TOP><INPUT TYPE=PASSWORD	Class='MainInput' name="psw"><BR><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=1></TD>
					</TR>
					</TABLE>
					
					<BR>

					<DIV ALIGN=LEFT>
					<IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=20 HEIGHT=1><INPUT id="login_pop" TYPE=IMAGE SRC='<?=$img_server?>index_page/label_enter.png' ALT='Пройти авторизацию'>
					</DIV>


				</TD>
				<TD WIDTH=20><SPAN></SPAN></TD>
			</TR>
			</FORM>
			</TABLE>

			</TD>
		</TR>
		<TR HEIGHT=100%>
			<TD HEIGHT=100% BACKGROUND='<?=$img_server?>index_page/menu_line.gif' ALIGN=RIGHT VALIGN=TOP>
			<!-- Menu Content -->



			<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 WIDTH=190 HEIGHT=100%>
			<TR>
				<TD ALIGN=CENTER VALIGN=BOTTOM>

				</TD>
				<TD WIDTH=20><SPAN></SPAN></TD>
			</TR>
			</TABLE>



			<!-- End Of -->			
			</TD>
		</TR>
		<tr>
			<td height="21" background="https://web.archive.org/web/20081219174154im_/http://img.instincts.ru/i/index_page/menu_bottom.gif"><span></span></td>
		</tr>
		</TABLE>
	
	</TD>
	<TD WIDTH=727 VALIGN=TOP HEIGHT=100% BACKGROUND='<?=$img_server?>index_page/content_line.gif'>
		<TABLE WIDTH=727 HEIGHT=100% CELLSPACING=0 CELLPADDING=0 BORDER=0>
		<TR>
			<TD HEIGHT=97 BACKGROUND='<?=$img_server?>index_page/content_top.gif' ALIGN=LEFT VALIGN=TOP>

			<TABLE WIDTH=625 HEIGHT=100% BORDER=0 CELLSPACING=0 CELLPADDING=0 >
			<TR>
				<TD VALIGN=BOTTOM ALIGN=LEFT><IMG SRC='<?=$img_server?>index_page/text.png'><DIV ALIGN=Right><SMALL><A HREF=''>Читать далее &raquo;</A></SMALL></DIV><BR><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=1></TD>
				<TD WIDTH=240 ALIGN=RIGHT VALIGN=TOP >
				<IMG SRC='<?=$img_server?>index_page/0.gif' HEIGHT=22>

					<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 HEIGHT=37 >
					<TR>
						<TD ROWSPAN=3 WIDTH=60 ALIGN=LEFT><IMG SRC='<?=$img_server?>index_page/online.png'></TD>
					</TR>
					<TR>
						<TD WIDTH=150 ALIGN=CENTER><IMG SRC='<?=$img_server?>index_page/label_online.png'></TD>
					</TR>
					<TR>
						<TD ALIGN=CENTER><B>
			<?php
				$all = $db->sql('SELECT COUNT(uid) FROM `users` WHERE `online`= 1;');
				echo "".$all." 	";
						//$all["us"]
			
				mysql_close($data);
			?></B> чел.</TD>
					</TR>
					</TABLE>
				</TD>
			</TR>
			</TABLE>


			</TD>
		</TR>
		<TR HEIGHT=100%>
			<TD BACKGROUND='<?=$img_server?>index_page/content_line.gif' VALIGN=TOP HEIGHT=100% ALIGN=LEFT>
			<!-- Menu Content -->
	
<?php
echo '<TABLE WIDTH=625 HEIGHT=100% BORDER=0 CELLSPACING=0 CELLPADDING=0 >	<TR><TD ALIGN=LEFT VALIGN=TOP>';

if ( !isset($_GET['subact']) )
{
	$news = $db->sql('SELECT * FROM `lib_news` ORDER BY `date` DESC LIMIT 0,5;');
	while ( $n = mysql_fetch_assoc($news) )
	{
		echo '<TABLE WIDTH=625 HEIGHT=100% BORDER=0 CELLSPACING=0 CELLPADDING=0 >	<TR><TD ALIGN=LEFT VALIGN=TOP>';
		echo '<B>'.$n['title'].'</B>, <SMALL>Дата: '.date('d.m.Y H:i', $n['date']).'.</SMALL><BR>'.nl2br($n['text']).'';
		echo " <CENTER><IMG SRC='".$img_server."index_page/deleter.png'></CENTER></TD></TR></TABLE>";
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

} 
//echo '</div>';
?>	<!-- End Of -->			
			</TD>
		</TR>

		</TABLE>
	</TD>
</TR>
<tr>
			<td height="21" background="https://web.archive.org/web/20081219174154im_/http://img.instincts.ru/i/index_page/content_bottom.gif"><span></span></td>
		</tr>
</TABLE>
</div>
</body>
</html>