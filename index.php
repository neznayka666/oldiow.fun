<?php

define('MICROLOAD', true);
// Загружаем файл конфига, ВАЖНЫЙ.
require ('inc/config.php');
// Подключаемся к SQL базе
$db = new MySQL(SQL_USER, SQL_PASS, SQL_BASE);
// Подключаем класс обработки входящих данных
############################## 


if (isset($_COOKIE['uid']) and isset($_COOKIE['hashcode']) )
{
	$pers = $db->sqla('SELECT * FROM `users` WHERE `uid`="'.intval($_COOKIE['uid']).'" and `pass`="'.addslashes($_COOKIE['hashcode']).'" and `block`="" LIMIT 1;');
} else $pers = true;


$stop_view = false;

## 
$_GET['act'] = (int)$_GET['act'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="online игра, браузерная игра, Описание игры.">
    <meta name="keywords" content="онлайн, игры, библиотека">
    <title>Инстинкты Воина: Возрождение - Библиотека</title>
    <LINK href="./css/style.css" rel="STYLESHEET" type="text/css">
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/functions.js"></script>
    <link rel="icon" href="favicon.ico?v=2" type="image/x-icon" />
</head>

<body class="fightlong">
    <span id="storageElement"></span>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="25">
        <tr>
            <td width="27" style="background:url(images/info/top_left.gif);"></td>
            <td style="background:url(images/info/top_center.gif);"></td>
            <td width="26" style="background:url(images/info/top_right.gif);"></td>
        </tr>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" style="height:100%;">

        <!-- # -->
        <tr>
            <td width="7" style="background:url('images/info/bottom_left.gif');"></td>
            <td valign="top" style="width:200px;background:url('images/info/line_m.gif');">
                <!-- # Разметка меню -->
                <div id="id_menu" style="width:200px;">
                    <?php require_once('inc/menu.php');?>
                </div>
                <!-- Разметка меню # -->
            </td>
            <td valign="top" style="">
                <!-- # Основной контент -->
                <div class="content" style="padding:25px;">
                    <?php require_once('inc/content.php');?>
                </div>
                <!-- Основной контент # -->
            </td>
            <td width="7" style="background:url(images/info/bottom_left.gif);"></td>
        </tr>
        <!-- # -->
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="25">
        <tr>
            <td width="27" style="background:url(images/info/top_left.gif);"></td>
            <td style="background:url(images/info/top_center.gif);"></td>
            <td width="26" style="background:url(images/info/top_right.gif);"></td>
        </tr>
    </table>
</body>

</html>