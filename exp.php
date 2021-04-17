<?php

//define('MICROLOAD', true);
// Загружаем файл конфига, ВАЖНЫЙ.
include ($_SERVER['DOCUMENT_ROOT'].'/configs/config.php');
// Подключаемся к SQL базе
$db = new MySQL(SQL_USER, SQL_PASS, SQL_BASE);
// Подключаем класс обработки входящих данных
$http = new Jhttp();
############################## 

$PageTitle = "Таблица опыта";
$PageImg = "users_top";
?>
<html>

<head>
    <title>Инстинкты Воина: Возрождение - Таблица опыта</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <META Http-Equiv=Cache-Control Content=no-cache>
    <meta http-equiv=PRAGMA content=NO-CACHE>
    <META Http-Equiv=Expires Content=0>
    <style>
    body {
        font-size: 13px;
        FONT-FAMILY: Arial;
        COLOR: #8A6246;
    }

    .titleCity {
        COLOR: #993300;
        FONT-FAMILY: Arial;
        FONT-SIZE: 14pt;
        FONT-WEIGHT: bold;
        TEXT-ALIGN: center;
    }

    img,
    table {
        border: 0;
    }
    </style>
</head>

<BODY LEFTMARGIN=0 TOPMARGIN=0 BGCOLOR=8E503A>


    <TABLE cellspacing=0 CELLPADDING=0 border=0 HEIGHT=100% WIDTH=100%>
        <TR HEIGHT=25>
            <TD>

                <TABLE width=100% height=25 cellspacing=0 cellpadding=0 border=0>
                    <tr height=25>

                        <td background='images/info/top_left.gif' width=27><img src='images/info/1.gif'></td>
                        <td background='images/info/top_center.gif'><img src='images/info/1.gif'></td>
                        <td background='images/info/top_right.gif' width=26><img src='images/info/1.gif'></td>

                    </tr>
                </TABLE>

            </TD>
        </TR>
        <TR>
            <TD>


                <TABLE width=100% cellspacing=0 cellpadding=0 border=0 height=100%>
                    <tr HEIGHT=100%>
                        <td background='images/info/left_2.gif' width=7><IMG SRC='images/info/1.gif'></td>
                        <td align=center valign=top>
                            <BR><BR>


                            <TABLE border=0 width=75% cellspacing=0 cellpadding=0>
                                <TR height=5>
                                    <TD background='images/info/line_1.gif'><IMG SRC='images/info/1.gif'></TD>
                                </TR>

                                <TR>
                                    <TD>

                                        <TABLE border=0 width=100% cellspacing=0 cellpadding=0>
                                            <TR>
                                                <TD width=9 background='images/info/ileft.gif'><IMG
                                                        SRC='images/info/1.gif'>
                                                </TD>


                                                <TD bgcolor=DAB69E align=center>

                                                    <TABLE border=0 width=100% cellspacing=0 cellpadding=10>
                                                        <TR>
                                                            <TD align=center valign=center>



                                                                <TABLE cellspacing=0 cellpadding=3 border=0 width=75%>
                                                                    <TR height=75>
                                                                        <TD width=80 align=left valign=top><IMG
                                                                                SRC='images/info/<?=$PageImg?>.gif'>
                                                                        </TD>
                                                                        <TD align=center class=titleCity>
                                                                            <B><?=$PageTitle?></B>
                                                                        </TD>
                                                                        <TD width=80 align=right valign=top><IMG
                                                                                SRC='images/info/logo.gif'></TD>
                                                                    </TR>
                                                                </TABLE>
                                                                <?php
$price = 100;
$exp = $price * 1.65;
echo $exp;
?>

                                                                <TABLE cellspacing=0 cellpadding=3 border=0 width=100%>
                                                                    <TR>
                                                                        <TD>
                                                                            <?php


$inf=mysql_query("SELECT * FROM exp order by exp");


echo"
<body>
<table width=1200 align=center align=center cellpadding=5 cellspacing=0 border=1 bgcolor=D3AB90 bordercolor=D3AB90>

<tr>
	<td align=center width=14%><b>Уровень</b></td>
	<td align=center width=14%><b>Золотые монеты</b></td>	
	<td align=center width=14%><b>Характеристики</b></td>	
	<td align=center width=14%><b>Особенности</b></td>
	<td align=center width=15%><b>Опыт</b></td>	
</tr>";




for ($i=0; $i<mysql_numrows($inf); $i++) {
$l=mysql_fetch_assoc($inf);

$money+=$l['money'];
$stats+=$l['stats'];
$free_f_skills+=$l['free_f_skills'];

if ($base!=0) $wins=$l['exp']/$base; else $wins=0;
$wins=round($wins);
$lvl="$l[id]"-1;
echo"<tr"; if ($als) echo""; echo">
	<td><center>$l[level]</td>
	<td><center>$l[money] ($money)</td>	
	<td><center>$l[stats] ($stats)</td>	
	<td><center>$l[free_f_skills] ($free_f_skills)</td>	
    <td><center>$l[exp]</td>	
</tr>";


$base=$l['base'];
if (!$als) $als=1; else $als=0;
}

echo"</table>";

?>
                                                                        </TD>
                                                                    </TR>
                                                                </TABLE>


                                                            </TD>
                                                        </TR>
                                                    </TABLE>

                                                </TD>

                                                <TD width=9 background='images/info/iright.gif'><IMG
                                                        SRC='images/info/1.gif'>
                                                </TD>
                                            </TR>
                                        </TABLE>

                                    </TD>
                                </TR>

                                <TR height=5>
                                    <TD background='images/info/line_1.gif'><IMG SRC='images/info/1.gif'></TD>
                                </TR>
                            </TABLE>


                            <BR><BR>
                        </td>
                        <td background='images/info/right_2.gif' width=7><IMG SRC='images/info/1.gif'></td>
                    </tr>

                </table>


            </TD>
        </TR>
        <TR HEIGHT=7>
            <TD>

                <TABLE width=100% height=7 cellspacing=0 cellpadding=0>
                    <tr height=7>

                        <td background='images/info/bottom_left.gif' width=7><img src='images/info/1.gif'></td>
                        <td background='images/info/bottom_center.gif'><img src='images/info/1.gif'></td>
                        <td background='images/info/bottom_right.gif' width=6><img src='images/info/1.gif'></td>

                    </tr>
                </TABLE>

            </TD>
        </TR>
    </TABLE>