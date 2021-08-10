<?php
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
<html>

<head>
    <TITLE>Инстинкты Воина: Возрождение - Главная страница </TITLE>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Expires" content="3">
    <meta name="robots" content="ALL">
    <meta name="keywords"
        content="ролевая игра, браузерная игра, интернет игра, интернет игры, лучшие интернет игры, лучшая онлайн игра, новая онлайн игра, online game, бесплатная онлайн игра, неоландс, новая браузерная онлайн игра, играть бесплатно, играть игры, игры онлайн бесплатно, лучшие игры, популярные игры, популярная онлайн игра, online игра">
    <meta name="description" content="oldiow.fun - online game!">
    <meta name="rating" content="General">
    <meta name="distribution" content="GLOBAL">
    <meta name="Classification" content="On-line oldiow.fun">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel=stylesheet type="text/css" href="/images/index/main.css">
    <!--link rel="stylesheet" type="text/css" href="./css/index_v2.css" /-->
    <!--[if lt IE 7]>
	<link href="./css/iepng.css" rel="stylesheet" type="text/css">
	<![endif]-->
    <!--script type="text/javascript" src="./js/mod/swfobject.js"></!--script-->
    <script type="text/javascript" src="./js/mod/jquery.js"></script>
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
</head>


<BODY BGCOLOR="6C401B" LEFTMARGIN=0 TOPMARGIN=0>

    <TABLE cellspacing=0 cellpadding=0 width=100% border=0 bordercolor=white>
        <TR>
            <TD width=190 valign=top>
                <TABLE cellspacing=0 cellpadding=0 width=190 height=431>
                    <TR>
                        <TD background='images/index/bg/lbg_1.gif'>
                            &nbsp;
                        </TD>
                    </TR>
                </TABLE>
            </TD>
            <TD align="center" valign=bottom rowspan=2>
                <!--
                Всего:
                <?php echo " [<b>" . mysql_num_rows(mysql_query("SELECT `id` FROM `players` WHERE bloked = 0 AND `rank` <> '60'")) . "</b>]"; ?>
                | Орков:
                <?php echo " [<b>" . mysql_num_rows(mysql_query("SELECT `id` FROM `players` WHERE bloked = 0 AND rase = '1' AND `rank` <> '60'")) . "</b>]"; ?>
                | Эльфов:
                <?php echo " [<b>" . mysql_num_rows(mysql_query("SELECT `id` FROM `players` WHERE bloked = 0 AND rase = '2' AND `rank` <> '60'")) . "</b>]"; ?>
                | Людей:
                <?php echo " [<b>" . mysql_num_rows(mysql_query("SELECT `id` FROM `players` WHERE bloked = 0 AND rase = '3' AND `rank` <> '60'")) . "</b>]"; ?>
                | Гномов:
                <?php echo " [<b>" . mysql_num_rows(mysql_query("SELECT `id` FROM `players` WHERE bloked = 0 AND rase = '4' AND `rank` <> '60'")) . "</b>]"; ?>
                | Монстров:
                <?php echo " [<b>" . mysql_num_rows(mysql_query("SELECT `id` FROM `players` WHERE bloked = 0 AND `rank` = '60'")) . "</b>]"; ?>
                -->
                <TABLE cellspacing=0 cellpadding=0 width=615 height=544>
        </tr>
        <TR>
            <TD background='images/index/bg/mbg.gif'>
                <TABLE cellspacing=0 cellpadding=0 width=100% height=100% border=0 bordercolor=white>
                    <TR>
                        <TD height=390 valign=bottom>
                            <TABLE cellspacing=0 cellpadding=0 width=100% height=120 border=0 bordercolor=white>
                                <TR>
                                    <TD>&nbsp;</TD>
                                    <TD width=300 align="center">
                                        <style>
                                        input[class=auth] {
                                            background-color: #d4aa6f;
                                        }
                                        </style>

                                        <TABLE cellspacing=0 cellpadding=0 width=176 height=77
                                            background='images/index/form.gif' border=0>
                                            <form id="goGame" action="/game.php" method="POST">

                                                <TR>
                                                    <TD height="20" align="center"><input type="text" name="user"
                                                            id="user" class=auth
                                                            style="TEXT-ALIGN: Center;margin-top:8px;"
                                                            onBlur="if (value == '') {value='Логин'}"
                                                            onFocus="if (value == 'Логин') {value =''}" value="Логин">
                                                    </TD>
                                                </TR>

                                                <TR>
                                                    <TD height="20" align="center"><input type=password name="pass"
                                                            id="pass" class=auth
                                                            style="TEXT-ALIGN: Center;margin-top:8px;"
                                                            onBlur="if (value == '') {value='Пароль'}"
                                                            onFocus="if (value == 'Пароль') {value =''}" value="Пароль">
                                                    </TD>
                                                </TR>
                                                <TR>
                                                    <TD valign="center" align="center"><img
                                                            src='images/index/submit.gif' onClick="jgetForm();"
                                                            id="enter1" style="cursor:pointer;margin-top:8px;"></TD>
                                                </TR>
                                            </FORM>
                                        </TABLE>
                                        <BR>
                                        <b>Ты ещё не с нами? <A href="#"
                                                onclick="OpenPopupCenter('/reg.php', 'TEST!?', 500, 500);">
                                                <u style='color:#7f3116;'>Регистрируйся!</u></b>
                                        </A><br><br>
                                    </TD>
                                </TR>
                            </TABLE>
                        </TD>
                    </TR>
                    <TR>
                        <TD>

                        </TD>
                    </TR>
                    <TR>
                        <TD width='100%'>
                            <table align="right">
                                <tr>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <p style='margin-top:40px;'><a href='http://lib.oldiow.fun/'
                                                target='_blank'>Новости</a> | <a href='#' target='_blank'>Форум</a> | <a
                                                href='http://lib.oldiow.fun/?act=5' target='_blank'>Рейтинг
                                                игроков</a></p>
                                    </td>
												<td>
													<p>
														<a href="https://freekassa.ru" target="_blank" rel="noopener noreferrer">
  														<img src="https://cdn.freekassa.ru/banners/small-white-2.png" title="Прием платежей">
													</a>
													</p>
												</td>
                                </tr>
                            </table>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
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
                                <img src='//s02.rpgtop.su/cgi-bin-mod/iv.cgi?a=ins&id=26307' width='1' height='1'
                                    border='0'><a href='https://rpgtop.su/26307' target='_blank'><img
                                        src='//img.rpgtop.su/88x31x11x3.gif' alt='Рейтинг Ролевых Ресурсов - RPG TOP'
                                        border='0' width='88' height='31'></a>
                            </noscript>
                            <!-- /Top.Roleplay.Ru -->
                        </TD>
                    </TR>
                </TABLE>
            </TD>
        </TR>
    </TABLE>
    </TD>
    <TD width=200 valign=top align=right>
        <TABLE cellspacing=0 cellpadding=0 width=159 height=431>
            <TR>
                <TD background='images/index/bg/rbg_1.gif'>
                    &nbsp;
                </TD>
            </TR>
        </TABLE>
    </TD>
    </TR>
    <TR>
        <TD width=144 valign=top>
            <TABLE cellspacing=0 cellpadding=0 width=73 height=85 border=0>
                <TR>
                    <TD background='images/index/bg/lbg_2.gif'>
                        &nbsp;
                    </TD>
                </TR>
            </TABLE>
        </TD>
        <TD align=right>
            <TABLE cellspacing=0 cellpadding=0 width=159 height=150 border=0>
                <TR>
                    <TD background='images/index/bg/rbg_2.gif'>
                        &nbsp;
                    </TD>
                </TR>
            </TABLE>
        </TD>
    </TR>
    </TABLE>
</body>

</html>