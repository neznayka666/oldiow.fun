<?
foreach($_POST as $keypost=>$val){$_POST[$keypost] = varcheck($val);}
foreach($_GET as $keyget=>$val){$_GET[$keyget] = varcheck($val);}
?>
<div style="position:absolute; left:-2px; top:-2px; z-index: 65200; width:0px; height:0px;" id="zcenter"></div>
<div id="back" style="position: absolute; left: 0; top: 0; width: 100%; z-index: 50;"></div>
<div style="padding-left:39px; text-align:left; padding-top:0px;" id="draw_pers_info"></div>
<div style="position: absolute; left: 0; top: 0; width: 100%; z-index: 50;" id="popup"></div>
<HTML>

<HEAD>
    <META Http-Equiv="Content-Type" Content="text/html; charset=windows-1251">
    <META Http-Equiv="Cache-Control" Content="No-Cache">
    <META Http-Equiv="Pragma" Content="No-Cache">
    <META Http-Equiv="Expires" Content="0">

    <LINK href="/css/info_loc.css" rel="STYLESHEET" type="text/css">
    <LINK href="/css/frame.css" rel="STYLESHEET" type="text/css">
    <LINK href="/css/stl.css" rel="STYLESHEET" type="text/css">
    <!--[if lt IE 7]>
<LINK href="/css/iepng.css" rel="STYLESHEET" type="text/css">
<![endif]-->
    <script type="text/javascript" src="js/interface/get_windows2.js?"></script>
    <SCRIPT src="/js/building_v03.js"></SCRIPT>
    <SCRIPT src="/js/ajax.js"></SCRIPT>
    <SCRIPT src="/js/signs.js"></SCRIPT>
    <SCRIPT src="/js/hpmp.js"></SCRIPT>
    <SCRIPT src="/js/basic.js"></SCRIPT>
    <SCRIPT src="/js/items.js"></SCRIPT>
    <SCRIPT src="/js/quest.js"></SCRIPT>
    <SCRIPT src="/js/nl_tooltip.js"></SCRIPT>
</HEAD>

<BODY>
    <!--<script LANGUAGE='JavaScript'>
document.ondragstart = test;
document.onselectstart = test;
document.oncontextmenu = test;

function test() {
 return false
}
</SCRIPT>-->
    <div id="tooltip"></div>
    <table cellpadding=0 cellspacing=0 border=0 align=center width=760>
        <tr>
            <td><img src=/image/gameplay/kazino.jpg width=760 height=255 border=0></td>
        </tr>
        <tr>
            <td><img src=/1x1.gif width=1 height=2></td>
        </tr>
        <tr>
            <td bgcolor=#CCCCCC>
                <table cellpadding=4 cellspacing=1 border=0 width=100%>
        </tr>
        <tr>
            <td align=center width=50%><A href='main.php?kazino=1&get=3&vcode=<?php scod()?>'><b>Кости</b></A></td>
            <td width=1% align=center><b>|</b></td>
            <td align=center width=50%><A href='main.php?kazino=2&get=3&vcode=<?php scod()?>'><b>Игра "Испытай
                        удачу"</b></A></td>
        </tr>
    </table>
    <?php if (@$_GET["kazino"]=='' and (@$_GET["kazino"]!='1' or @$_GET["kazino"]!='1')) {
echo "<center><b><font color='#990000'></font></b></center>";
} 
if(@$_GET['kazino']=='1'){ ?>
    <tr>
        <td bgcolor="#FFFFFF">
            <table width=100% cellspacing=0 cellpadding=3 border=0>

                <td width=30%>
                    <img src='image/bone/bone.jpg' alt='Кости'>
                </td>

                <td width=70% valign=top>
                    <FIELDSET>
                        <LEGEND>Правила игры</LEGEND>
                        Правила игры предельно просты, от Вас требуется только сделать ставку и кинуть кубики.<br>
                        Сумма, выпавшая на верхних гранях Ваших кубиков, сравнивается с суммой противника. Победителем
                        считается тот, у кого она больше.<br>
                        Выигрыш складывается из Ваших ставок.
                    </FIELDSET>

                    <?
function new_game () {
        ?>
                    <form action='main.php?kazino=1&set=game&get=123&vcode=<?php scod()?>' method=post>
                        <P>
                        <FIELDSET>
                            <LEGEND>Новая игра</LEGEND>
                            <center>
                                Ставка: <SELECT class=lbut name=type>
                                    <OPTION value='1' selected>100 Камни
                                    <OPTION value='2'>250 Камни
                                    <OPTION value='3'>1000 Камни
                                    <OPTION value='4'>5000 Камни
                                    <OPTION value='5'>10000 Камни</OPTION>
                                </SELECT>
                                <p><input type=submit value='Начать игру' class=lbut>
                            </center>
                        </FIELDSET>
                    </form>
                </td>
    </tr>
    </table>
    <?
        }
if (!$_GET[set])
{
new_game();
}
if ($_GET[set]==game) {
        if ($_POST[type]==1 or $_POST[type]==2 or $_POST[type]==3 or $_POST[type]==4 or $_POST[type]==5) {
                if ($_POST[type]==1) $st=100;
                if ($_POST[type]==2) $st=250;
                if ($_POST[type]==3) $st=1000;
                if ($_POST[type]==4) $st=5000;
                if ($_POST[type]==5) $st=10000;
                if ($player[nv]>=$st) {
                        if ($_POST[play]==1) {
                                $player_1 = rand(1,6);
                                $player_2 = rand(1,6);
                                $comp_1 = rand(2,6);
                                $comp_2 = rand(2,6);
                           }
?>
    <table width=100%>
        <tr>
            <td width=50%>
                <FIELDSET>
                    <LEGEND>Игрок №1</LEGEND>
                    <center><?php
if($player['clan_gif']!=''){echo"<img src=/image/signs/".$player['clan_gif'].">";}echo"<b>".$player['login']."</b>[".$player['level']."]<a href='/pinfo.cgi?".$player['login']."' target='_blank'><img src='/image/chat/info.gif' width='11' height='12' border='0' align='absmiddle'></a>";

?>
                    </center>
                    <br>
                    Деньги: <b><?=$player[nv]?> <img src="/image/money_all.gif" title="Камни"></b>
                    <br>
                    Ставка: <b><?=$st?> <img src="/image/money_all.gif" title="Камни"></b>
                    <?
if ($_POST[play]==1) {
?>
                    <br>
                    Выпало:
                    <center>
                        <img src='/image/bone/<?=$player_1?>.gif' alt='<?=$player_1?>'>
                        <p><img src='/image/bone/<?=$player_2?>.gif' alt='<?=$player_2?>'>
                    </center>
                    <?
  }
?>
                </FIELDSET>
            </td>
            <td width=50%>
                <FIELDSET>
                    <LEGEND>Игрок №2</LEGEND>
                    <center>
                        <i>невидимка</i>
                    </center>
                    <br>
                    Деньги: <b>??? <img src="/image/money_all.gif" title="Камни"></b>
                    <br>
                    Ставка: <b><?=$st?> <img src="/image/money_all.gif" title="Камни"></b>
                    <?
if ($_POST['play']==1) {
?>
                    <br>
                    Выпало:
                    <center>
                        <img src='/image/bone/<?=$comp_1?>.gif' alt='<?=$comp_1?>'>
                        <p><img src='/image/bone/<?=$comp_2?>.gif' alt='<?=$comp_2?>'>
                    </center>
                    <?
  }
?>
                </FIELDSET>
            </td>
        </tr>
    </table>
    <form action='?kazino=1&set=game&type=play&get=3&vcode=<?php scod()?>' method=post>
        <input type="hidden" name="type" value="<?=$_POST[type]?>">
        <input type="hidden" name="play" value="1">
        <FIELDSET>
            <LEGEND>Действия</LEGEND>
            <center>
                <? if ($_POST[play]==1) {
        $summa_player = $player_1+$player_2;
        $summa_comp = $comp_1+$comp_2;
        if ($summa_player>$summa_comp) {
				$stwin = $st*2;
                mysqli_query($GLOBALS['db_link'],"UPDATE user SET nv=nv+".$st." WHERE id='".$player['id']."'");

                                $player[nv] = $player[nv]+$st;
                echo "<p><center><font class=sysmessage>Поздравляем! Вы победили и получаете <b>$st <img src='/image/money_all.gif' title='Камни'></b> поверх вашей ставки!</font></center><p>";
        }
        if ($summa_player<$summa_comp) {
                                mysqli_query($GLOBALS['db_link'],"UPDATE user SET nv=nv-".$st." WHERE id='".$player['id']."'");

                                $player[nv] = $player[nv]-$st;
                echo "<p><center><font class=sysmessage>Вы проиграли! У Вас снимается  <b>$st <img src='/image/money_all.gif' title='Камни'></b>!</font></center><p>";
        }
        if ($summa_player==$summa_comp) {
                echo "<p><center><font class=sysmessage>Ничья! Бросьте кости еще раз!</font></center><p>";
        }
        echo "<input type=submit value='Сыграть еще раз' class=lbut>";
        }
        else {
                echo "<input type=submit value='Кинуть кости' class=lbut>";
        }
?> <input type=button value='Новая игра' class=lbut
                    onclick='window.location.href="main.php?kazino=1&tmp="+Math.random();""'>
            </center>
        </FIELDSET>
    </form>
    </td>
    </tr>
    </table>
    <?
                 }
                 else {
                         echo "<p><center><font class=bloked>У Вас недостаточно денег!</font></center><p>";
                         new_game();
                 }
        }
        else {
                echo "<p><center><font class=bloked>Не сделана ставка!</font></center><p>";
                new_game();
        }
}
?>
    </td>
    </tr>
    <?php 
}
if(@$_GET['kazino']=='2'){ ?>
    <tr>
        <td bgcolor="#FFFFFF">
            <center>
                <font color="red"><b>В разработке...</b>
            </center>
        </td>
    </tr>
    <?php
}
?>
    <script type="text/javascript">
    < ?
    if (isset($secrets) && !empty($secrets)): ? >
        message_window('success', '', '<?=$secrets?>', 'ok', '') <
        ?
        endif; ? >
    </script>