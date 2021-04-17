<?php

//define('MICROLOAD', true);
// Загружаем файл конфига, ВАЖНЫЙ.
include ($_SERVER['DOCUMENT_ROOT'].'/configs/config.php');
// Подключаемся к SQL базе
$db = new MySQL(SQL_USER, SQL_PASS, SQL_BASE);
// Подключаем класс обработки входящих данных
$http = new Jhttp();
############################## 

$PageTitle = "Новости";
$PageImg = "users_top";
?>
<html>

<head>
    <title>Инстинкты Воина: Возрождение - Новости</title>
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


                                                                <TABLE cellspacing=0 cellpadding=3 border=0 width=100%>
                                                                    <TR>
                                                                        <TD>
                                                                            <?php
                                                                            if (!preg_match("/^[0-9]{1,10}$/", $_GET['p']) and $p!= 0) {echo "error!";}
                                                                            else {
                                                                                $p = (int)$_GET['p'];
                                                                                $S = $db->sql("SELECT * FROM `lib_news` ORDER BY `date` DESC  ");
                                                                                if (!$p) { $p = 0; }
                                                                                else { $p = $p-1;}
                                                                                $lim=10;
                                                                                $pages =(int)($lim*$p);
                                                                                $num=(int)(mysql_num_rows($S)/$lim);
                                                                                $S = $db->sql("SELECT * FROM `lib_news` ORDER BY `date` DESC LIMIT $pages,$lim ");
                                                                                if (mysql_num_rows($S)>0) {
                                                                                    while($news = mysql_fetch_array($S)){
                                                                                        $news_id=$news["id"];
                                                                                        $news_autor=$news["autor"];
                                                                                        $news_date=$news["date"];
                                                                                        $date=date("Y.m.d H:i",$news["date"]);
                                                                                        $news_name=$news["title"];
                                                                                        $news_text=$news["text"];
                                                                                        $news_autor = $news["autor"];
                                                                                        $i=0;
                                                                                        $news_time = $news[t];
                                                                                        ?>
                                                                            <table>
                                                                                <tr>
                                                                                    <td>
                                                                                        <h3><?=$news_name;?></h3>
                                                                                        <p><?=$date;?></p>
                                                                                        <p align=justify>
                                                                                            <?=$news_text;?>
                                                                                        </p>
                                                                                        <p>С уважением,
                                                                                            <a href="/info.php?<?=$news_autor;?>"
                                                                                                target="_blank"><?=$news_autor;?></a>
                                                                                        </p>
                                                                                        <hr
                                                                                            style="border:1px solid #8e503a;">
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <?php
                                                                            }
                                                                            echo "<center>";
                                                                            $b=0;
                                                                            $i=0;
                                                                            while ($i<$num){
                                                                                $i++;
                                                                                $b++;
                                                                                if ($i==$p+1){print "<FONT>$i </font>";}
                                                                                else { print "<a href='?p=$i'>$i</a> ";}
                                                                                if ($b==25) {print "<br>"; $b=0;}
                                                                            }
                                                                        }
                                                                    }
                                                                    echo "</center></td>
                                                                    </tr>
                                                                    </table>
                                                                    ";
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