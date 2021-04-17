<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <LINK href="/css/main_v2.css" rel="stylesheet" type="text/css">
    <title>Инстинкты Воина: Возрождение - Регистрация</title>
    <meta http-equiv=content-type content='text/html; charset=utf-8'>
    <SCRIPT src="/js/reg.js"></SCRIPT>
</head>

<body>
    <table border="1" cellspacing=5 cellspadding=5 width="90%"
        style="border:1px solid #ccc;background:#f5f5f5;margin:25px auto;padding:5px;">
        <tr>
            <td colspan="3">
                <h3 style="text-align:center;color:green;">Инcтинкты Воина: Возрождение - [Регистрация]</h3>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="hp" align="center" id="whow_msg"></div>
                <div class="ma" align="center" id="help_msg"></div>
            </td>
        </tr>
        <tr>
            <td style="width:45%;"> <span class="hp">Логин персонажа</span></td>
            <td style="width:45%;"><input type="text" style="width: 100%;" onchange="iSs(0)" id="login"
                    onClick="help_msg(1);"></td>
            <td style="width:10%;text-align:center;">
                <div id="iS0"></div>
            </td>
        </tr>
        <tr>
            <td> <span lang="en-us" class="hp">E-Mail</span></td>
            <td><input type="text" style="width: 100%;" onchange="iSs(1)" id="inp_email" onClick="help_msg(2);"></td>
            <td style="width:10%;text-align:center;">
                <div id="iS1"></div>
            </td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" style="width: 100%;" onchange="iSs(2)" id="inp_pass" onClick="help_msg(3);"></td>
            <td style="width:10%;text-align:center;">
                <div id="iS2"></div>
            </td>
        </tr>
        <tr>
            <td>Пароль ещё раз</td>
            <td><input type="password" style="width: 100%" onchange="iSs(3)" id="inp_pass2" onClick="help_msg(4);"></td>
            <td style="width:10%;text-align:center;">
                <div id="iS3"></div>
            </td>
        </tr>
        <tr>
            <td>Дата рождения: </td>
            <td>
                <select name="dayd" class="items">
                    <?php for ($i=1;$i<32;$i++) echo  "<option value=".$i.">".$i."</option>\n"; ?>
                </select>
                <select name="monthd" class="items">
                    <?php for ($i=1;$i<13;$i++) echo  "<option value=".$i.">".$i."</option>\n"; ?>
                </select>
                <select name="yeard" class="items">
                    <?php for ($i=1970;$i<2000;$i++) echo  "<option value=".$i.">".$i."</option>\n"; ?>
                </select>
            </td>
            <td style="width:10%;text-align:center;">
                <div id=""></div>
            </td>
        </tr>
        <tr>
            <td>Пол</td>
            <td>
                <select size="1" id="pol" onClick="help_msg(0);">
                    <option value="0" SELECTED></option>
                    <option value="1">Мужской</option>
                    <option value="2">Женский</option>
                </select>
            </td>
            <td style="width:10%;text-align:center;"></td>
        </tr>

        <tr>
            <td>Контрольный код:</td>
            <td>
                <table width="100%">
                    <tr>
                        <td width="45px"><img border="0"
                                src="./gameplay/code/reg_code.php?<?php echo session_name()?>=<?php echo session_id()?>"
                                alt="Код" id="captcha"></td>
                        <td>
                            <input type="text" id="code" size="8" style="width: 100%;" onClick="help_msg(0);">
                            <a href="javascript:ch_cpth()" class=timef>обновить</a>
                        </td>
                        <td style="width:10%;text-align:center;">
                            <div id="iS4"></div>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:10%;text-align:center;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" id="law" value=1 onClick="help_msg(0);"> Я согласен с <a
                    href="justice.htm" target="_blank"> законами игры</a></td>
            <td style="width:10%;text-align:center;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <a href="javascript:RegIster();" class="bga" style="width:80%">Регистрация</a>
            </td>
        </tr>
        <?php
/*
<tr>
	<td > <p><span lang="en-us" class="hp">Пригласительный ключ</span></p></td>
	<td><input type="text" style="width: 100%;" id="invitation"></td>
	<td>&nbsp;</td>
</tr>
*/
?>
    </table>

</body>

</html>