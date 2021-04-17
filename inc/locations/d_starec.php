<?php
$ti=time();
?>
<table border=0 width=100%>
    <tr>
        <td valign=top height=210>
            <center>
                <?
echo'<img src="images/locations/starec.gif" onclick="top.goloc(\'city0\',\''.$ti.'\')" style=\'cursor:hand\' title=\'Выйти в город\' width=175 height=375></td>';
?>
    </tr>
    <tr>
        <td valign=top valign=top>
            <script>
            function talk(phrase) {
                var tab_b =
                    '<center><table border=0 class=inv width=95% cellpadding=1 cellspacing=1 bgcolor=#0dd0dс><tr><td>';
                var tab_e = '</td></tr></table><BR>';

                if (phrase == 1) {
                    grunvald.innerHTML = tab_b +
                        '<B>Старец:</B><BR>- Позволь представиться, я Старый-целитель, я в этом городе самое уважаемое лицо...<BR><BR><a href="javascript:talk(7)" class=us2><B>- Можно еще пару вопросов?</B></a><BR><a href="javascript:talk(8)" class=us2><B>- Спасибо, до свидания!</B></a>' +
                        tab_e;
                }
                if (phrase == 2) {
                    grunvald.innerHTML = tab_b +
                        '<B>Старец:</B><BR>- Хм...Я могу тебе предлажить различные задания, разумееться за вознгрождение. <BR><BR><a href="javascript:talk(7)" class=us2><B>- Можно еще пару вопросов?</B></a><BR><a href="javascript:talk(8)" class=us2><B>- Спасибо, до свидания!</B></a>' +
                        tab_e;
                }
                if (phrase == 7) {
                    grunvald.innerHTML = tab_b +
                        '<B>Старец:</B><BR>- Конечно! Что бы ты хотел узнать?<BR><BR><a href="javascript:talk(2)" class=us2><B>- Для чего ты мне нужен?</B></a><BR><a href="javascript:talk(8)" class=us2><B>- Нет, ничего...До свидания!</B></a>' +
                        tab_e;
                }
                if (phrase == 8) {
                    grunvald.innerHTML = tab_b + '<B>Старец:</B><BR>- До скорой встречи!' + tab_e;
                }
            }

            function dialog() {
                grunvald.innerHTML =
                    '<center><table border=0 class=inv width=95% cellpadding=1 cellspacing=1 bgcolor=#0dd0dс><tr><td><B>Старец:</B><BR>- Приветствую тебя, друг, я нашол тебя на берегу реки. ты был без сознания!<BR><BR><a href="javascript:talk(1)" class=us2><B>- Кто ты?</B></a><BR><a href="javascript:talk(2)" class=us2><B>- Для чего ты мне нужен?</B></a><BR><a href="javascript:talk(8)" class=us2><B>- Извини я зря потревожил тебя!</B></a></td></tr></table><BR>';
                dia.visible = 0;
            }
            </script>
            <div id='grunvald'></div>

            <div id="dia" align=center><input type=button class=b name="dia" value="Диалог" onClick="dialog()"><BR><BR>

        </td>
    </tr>
</table>