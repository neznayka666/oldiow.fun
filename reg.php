<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Инстинкты Воина: Возрождение - [Регистрация]</title>
    <LINK href="/css/main_v2.css" rel="stylesheet" type="text/css">
    <SCRIPT src="/js/reg.js"></SCRIPT>
</head>

<body>
    <table cellspacing="0" cellpadding="5" width="98%"
        style="margin:5px auto;background:#f5f5f5;border:1px solid #cccccc;padding:15px;">
        <tr>
            <td colspan="3" style="text-align:center;">
                <h4 style="color:green;">Инстинкты Воина: Возрождение - [Регистрация]</h4>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:center;">
                <div class="hp" id="whow_msg"></div>
                <div class="ma" id="help_msg"></div>
            </td>
        </tr>
        <tr>
            <td style="width: 45%;"><span class="hp">Логин персонажа</span></td>
            <td style="width: 45%;"><input type="text" onchange="iSs(0)" id="login" onClick="help_msg(1);"></td>
            <td style="width: 10%;text-align:center;">
                <div id="iS0"></div>
            </td>
        </tr>
        <tr>
            <td> <span class="hp">E-Mail</span></td>
            <td><input type="text" onchange="iSs(1)" id="inp_email" onClick="help_msg(2);"></td>
            <td>
                <div id="iS1"></div>
            </td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" onchange="iSs(2)" id="inp_pass" onClick="help_msg(3);"></td>
            <td>
                <div id="iS2"></div>
            </td>
        </tr>
        <tr>
            <td>Пароль ещё раз</td>
            <td><input type="password" onchange="iSs(3)" id="inp_pass2" onClick="help_msg(4);"></td>
            <td>
                <div id="iS3"></div>
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
            <td></td>
        </tr>
        <tr>
            <td>Дата рождения</td>
            <td>
                <select id="inp_dayd">
                    <?php for ($i=1;$i<32;$i++) echo  "<option value=".$i.">".$i."</option>\n"; ?>
                </select>
                <select id="inp_monthd">
                    <?php for ($i=1;$i<13;$i++) echo  "<option value=".$i.">".$i."</option>\n"; ?>
                </select>
                <select id="inp_yeard">
                    <?php for ($i=1970;$i<2004;$i++) echo  "<option value=".$i.">".$i."</option>\n"; ?>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Цифры на картинке</td>
            <td>
                <table width="100%">
                    <tr>
                        <td width="45px"><img border="0"
                                src="./gameplay/code/reg_code.php?<?php echo session_name()?>=<?php echo session_id()?>"
                                alt="Код" id="captcha"></td>
                        <td>
                            <input type="text" id="code" size="8" maxlength="5" onClick="help_msg(0);">
                            <a href="javascript:ch_cpth()" class=timef>обновить</a>
                        </td>
                        <td>
                            <div id="iS4"></div>
                        </td>
                    </tr>
                </table>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3"><input type="checkbox" id="law" value=1 onClick="help_msg(0);"> Я согласен с <a
                    href="justice.htm" target="_blank"> законами игры</a></td>
        </tr>
        <tr>
            <td colspan="3"><a href="javascript:RegIster();" class="bga">Зарегистрироваться</a></td>
        </tr>
        <?php
/*
<tr>
	<td> <p><span lang="en-us" class="hp">Пригласительный ключ</span></p></td>
	<td><input type="text" id="invitation"></td>
	<td>&nbsp;</td>
</tr>
*/
?>
    </table>
</body>

</html>