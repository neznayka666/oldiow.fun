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

<title>Инстинкты Воина: Возрождение - Многопользовательская ролевая онлайн игры, mmorpg, фэнтези, бои, квесты, задания</title>
<style>
body, td, ol, ul, li , p {
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
</style>

<body bgcolor="#000000" leftmargin="0" topmargin="0"><!-- BEGIN WAYBACK TOOLBAR INSERT -->

<center>

<table width="1024" cellspacing="0" cellpadding="0">
<tr height="118">
	<td width="256"><img src="<?=$img_server;?>index_page/top_1_1.gif"></td>
	<td width="256"><img src="<?=$img_server;?>index_page/top_1_2.gif"></td>
	<td width="256"><img src="<?=$img_server;?>index_page/top_1_3.gif"></td>
	<td width="256"><img src="<?=$img_server;?>index_page/top_1_4.gif"></td>
</tr>
<tr height="119">
	<td width="256"><img src="<?=$img_server;?>index_page/top_2_1.gif"></td>
	<td width="256"><img src="<?=$img_server;?>index_page/top_2_2.gif"></td>
	<td width="256"><img src="<?=$img_server;?>index_page/top_2_3.gif"></td>
	<td width="256"><img src="<?=$img_server;?>index_page/top_2_4.gif"></td>
</tr>
</table>

<div style="POSITION: Relative; margin-top: -119px;">

<table width="1024" cellspacing="0" cellpadding="0" border="0">
<tr height="118">
	<td align="LEFT" valign="BOTTOM" width="397"><img src="<?=$img_server;?>index_page/0.gif" width="120" height="1"><a href="//lib.oldiow.ru/" target="_blank"><img src="<?=$img_server;?>index_page/label_lib.png" alt="Открыть форум в новом окне"></a></td>
	<td width="230"><span></span></td>
	<td align="RIGHT" valign="BOTTOM" width="397"><img src="<?=$img_server;?>index_page/label_forum.png"><img src="<?=$img_server;?>index_page/0.gif" width="120" height="1"></td>
</tr>
</table>

</div>

<table width="1024" cellspacing="0" cellpadding="0">
<tr height="100%">
	<td width="297" height="100%" valign="TOP" background="<?=$img_server;?>index_page/menu_line.gif">
		<table width="297" height="100%" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td height="290" background="<?=$img_server;?>index_page/login_form.gif" valign="TOP" align="RIGHT">

			<table border="0" cellspacing="0" cellpadding="0" width="190">
			<form ACTION='../../game.php' method="POST">
			<tr>
				<td align="CENTER">
					<img src="<?=$img_server;?>index_page/0.gif" width="1" height="25"><br>
					<a href="#" onclick="OpenPopupCenter('/reg.php', 'TEST!?', 500, 500);"><img src="<?=$img_server;?>index_page/label_register.png" alt="Зарегистрировать нового персонажа"></a><br>
					
					<img src="<?=$img_server;?>index_page/label_forgot.png">
					
					<br><img src="<?=$img_server;?>index_page/0.gif" width="1" height="7"><table border="0" width="150" cellspacing="0" cellpadding="0">
					<tr>
						<td width="57" valign="CENTER"><img src="<?=$img_server;?>index_page/label_login.png"></td>
						<td valign="TOP"><input type="TEXT" class="MainInput" name="logins"><br><img src="<?=$img_server;?>index_page/0.gif" width="1" height="1"></td>
					</tr>
					<tr>
						<td colspan="2" height="6"><span></span></td>
					</tr>
					<tr>
						<td width="57" valign="CENTER"><img src="<?=$img_server;?>index_page/label_password.png"></td>
						<td valign="TOP"><input type="PASSWORD" class="MainInput" name="psw"><br><img src="<?=$img_server;?>index_page/0.gif" width="1" height="1"></td>
					</tr>
					</table>
					
					<br>

					<div align="LEFT">
					<img src="<?=$img_server;?>index_page/0.gif" width="20" height="1"><input type="IMAGE" id="login_pop" src="<?=$img_server;?>index_page/label_enter.png" alt="Пройти авторизацию">
					</div>

				</td>
				<td width="20"><span></span></td>
			</tr>
			</form>
			</table>

			</td>
		</tr>
		<tr height="100%">
			<td height="100%" background="<?=$img_server;?>index_page/menu_line.gif" align="RIGHT" valign="TOP">
			<!-- Menu Content -->

			<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
				<td align="CENTER" valign="BOTTOM">
				<!-- Top.Roleplay.Ru -->
               <script type="text/javascript" language="javascript">
               var topRPGc = "<img src='https://s02.rpgtop.su/cgi-bin-mod/iv.cgi?a=ins&id=26307&rnd=" +
                Math.random();
               topRPGc += "&r=" + escape(document.referrer) +
               "' width='1' height='1' border='0'><a href='https://rpgtop.su/26307' title='Рейтинг Ролевых Ресурсов - RPG TOP' target='_blank'>" +
               "<img src='//img.rpgtop.su/88x31x11x3.gif' alt='Рейтинг Ролевых Ресурсов - RPG TOP' border='0' width='88' height='31'></a> ";
               document.write(topRPGc);
               </script>
               <noscript>
               <img src='//s02.rpgtop.su/cgi-bin-mod/iv.cgi?a=ins&id=26307' width='1' height='1' border='0'>
					<a href='https://rpgtop.su/26307' target='_blank'>
					<img src='//img.rpgtop.su/88x31x11x3.gif' alt='Рейтинг Ролевых Ресурсов - RPG TOP' border='0' width='88' height='31'></a>
               </noscript>
               <!-- /Top.Roleplay.Ru -->
				</td>
				<td width="20"><span></span></td>
			</tr>
			</table>
			<!-- End Of -->			
			</td>
		</tr>
		<!--tr>
			<td height="21" background="<?=$img_server;?>index_page/menu_bottom.gif"><span></span></td>
		</!--tr-->
		</table>
	
	</td>
	<td width="727" valign="TOP" height="100%">
		<table width="727" height="100%" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td height="97" background="<?=$img_server;?>index_page/content_top.gif" align="LEFT" valign="TOP">

			<table width="625" height="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="BOTTOM" align="LEFT"><img src="<?=$img_server;?>index_page/text.png"><div align="Right"><small><a href="">Читать далее &raquo;</a></small></div><br><img src="<?=$img_server;?>index_page/0.gif" width="1" height="1"></td>
				<td width="240" align="RIGHT" valign="TOP">
				<img src="<?=$img_server;?>index_page/0.gif" height="22">

					<table cellspacing="0" cellpadding="0" border="0" height="37">
					<tr>
						<td rowspan="3" width="60" align="LEFT"><img src="<?=$img_server;?>index_page/online.png"></td>
					</tr>
					<tr>
						<td width="150" align="CENTER"><img src="<?=$img_server;?>index_page/label_online.png"></td>
					</tr>
					<tr>
						<td align="CENTER">
						<?php $vsego = $db->sqlr('SELECT COUNT(uid) FROM `users` WHERE `online`= 1;'); ?>	
						
						<b><?=$vsego;?></b> чел.</td>
					</tr>
					</table>
				</td>
			</tr>
			</table>


			</td>
		</tr>
		<tr height="100%">
			<td background="<?=$img_server;?>index_page/content_line.gif" valign="TOP" height="100%" align="LEFT">
			<!-- Menu Content -->
			<?php
					if ( !isset($_GET['subact']) )
					{
						$news = $db->sql('SELECT * FROM `lib_news` ORDER BY `date` DESC LIMIT 0,5;');
						while ( $n = mysql_fetch_assoc($news) )
						{
							echo '<TABLE WIDTH=625 BORDER=0 CELLSPACING=0 CELLPADDING=0 >	<TR><TD ALIGN=LEFT VALIGN=TOP>';
							echo '<B>'.$n['title'].'</B>, <SMALL>'.date('d.m.Y H:i', $n['date']).'.</SMALL><BR>'.nl2br($n['text']).'';
							echo " <CENTER><IMG SRC='".$img_server."index_page/deleter.png'></CENTER></TD></TR></TABLE>";
						}	
					}
			?>			
			<!-- End Of -->			
			</td>
		</tr>
		</table>
	</td>
</tr>
	<tr>
			<td height="21" width="297" background="<?=$img_server;?>index_page/menu_bottom.gif"><span></span></td>
	
			<td height="21" width="727" background="<?=$img_server;?>index_page/content_bottom.gif"><span></span></td>
		</tr>	
</table>

</center>

<script type="text/javascript" src="../js/mod/jquery.js"></script>
<script type="text/javascript">
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