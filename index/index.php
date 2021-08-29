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
	<script type="text/javascript" src="./js/mod/jquery.js"></script>
   <script type="text/javascript">
    $(document).ready(function() {
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

        $("#form_show").click(function() {
            url_open = 'reg.php';
            viewwin = open(url_open, "regWindow",
                "width=455, height=300, status=yes, toolbar=no, menubar=no, resizable=no, scrollbars=no"
            );
            return false;
        });
    });

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
    </script>
	 <STYLE>
body, td, ol, ul, li {
  FONT-SIZE: 10pt;
  FONT-FAMILY: Verdana, Arial, Helvetica, Tahoma, sans-serif;
  background:#000;
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
<body>
<div class="main" style="margin:0 auto;">
<TABLE WIDTH=1024 CELLSPACING=0 CELLPADDING=0 >
<TR HEIGHT=118>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_1.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_2.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_3.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_1_4.gif'></TD>
</TR>
<TR HEIGHT=119>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_1.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_2.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_3.gif'></TD>
	<TD WIDTH=256><IMG SRC='<?=$img_server?>index_page/top_2_4.gif'></TD>
</TR>
</TABLE>

<DIV STYLE="POSITION: Relative; margin-top: -119px;">

<TABLE WIDTH=1024 CELLSPACING=0 CELLPADDING=0 BORDER=0>
<TR HEIGHT=118>
	<TD ALIGN=LEFT VALIGN=BOTTOM WIDTH=397><IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=1 HEIGHT=1><!--<IMG SRC='<?=$img_server?>index_page/0.gif' WIDTH=120 HEIGHT=1><IMG SRC='<?=$img_server?>index_page/label_lib.png'>--></TD>
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
					<A HREF='#' onClick="jgetForm();" id="enter1"><IMG SRC='<?=$img_server?>index_page/label_register.png' ALT='Зарегистрировать нового персонажа'></A><BR>
					
					<A HREF='remind.php'><IMG SRC='<?=$img_server?>index_page/label_forgot.png'></A>
					
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
				$all = mysql_fetch_array(mysql_query("select (SELECT count(*) FROM `users`) as us, (SELECT count(*) FROM `online`)as onl"));
				echo "".$all["onl"]." 	";
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



			<TABLE WIDTH=625 HEIGHT=100% BORDER=0 CELLSPACING=0 CELLPADDING=0 >
			<TR>
				<TD ALIGN=LEFT VALIGN=TOP>

				<B>Обновленная главная страница</B>, <SMALL>06.11.2013 22:38</SMALL><BR>
				&nbsp;&nbsp;&nbsp;Обновлен дизайн главной страницы игры. Отныне главная страница содержит ссылки на полезные ресурсы, а так же колонку новостей. В скором времени будет изменен дизайн Библиотеки, что существенно упростит навигацию по ее разделам.
				
				<CENTER>
					<IMG SRC='<?=$img_server?>index_page/deleter.png'>
				</CENTER>			
				
				</TD>
			</TR>
			</TABLE>



			<!-- End Of -->			
			</TD>
		</TR>

		</TABLE>
	</TD>
</TR>
		<TR>
			<TD HEIGHT=21 BACKGROUND='<?=$img_server?>index_page/menu_bottom.gif' ><SPAN></SPAN></TD>
			<TD HEIGHT=21 BACKGROUND='<?=$img_server?>index_page/content_bottom.gif' ><SPAN></SPAN></TD>
		</TR>
</TABLE>
</body>
</html>