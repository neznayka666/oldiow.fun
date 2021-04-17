<?php

//session_start();

// Контроль ошибок на php уровне
if ( @$_COOKIE['AdminJoe'] ) Error_Reporting (E_ERROR | E_WARNING | E_PARSE);
else Error_Reporting (0);

// Устанавливаем системные константы
DEFINE ('GLOBAL_START_TIME', microtime(true));
DEFINE ('IMG', $_SERVER['HTTP_HOST'].'/images');			# 
DEFINE ('ROOT', $_SERVER['DOCUMENT_ROOT']);
//DEFINE ('ROOT', str_replace('\configs', '', dirname(__FILE__)));					
DEFINE ('IMG_ROOT', ROOT.'/images');					// Абсолютный путь
DEFINE ('SERVICE_ROOT', ROOT.'/public_content/service');				// Абсолютный путь
DEFINE ('WEAPON_UPLOADS', '');						// Абсолютный путь

DEFINE ('HOST', $_SERVER['HTTP_HOST']);						### 
DEFINE ('IMG_HOST', 'image.'. HOST );						### 
DEFINE ('LIB_HOST', 'lib.'. HOST );							### 
DEFINE ('SUP_HOST', 'support.'. HOST );						### 
DEFINE ('FOR_HOST', 'forum.'. HOST );						### 

// Настройка подключения к базе данных
DEFINE ('SQL_HOST', 'localhost');
DEFINE ('SQL_USER', 'newiowfun');		
DEFINE ('SQL_PASS', 'rd3oFkiFZB218v3I');			
DEFINE ('SQL_BASE', 'new_oldiow_fun');	#


	# Делаем минифильтрация всякой ВЦ
if ( defined('MICROLOAD') )
{
	function filter($v){return str_replace("'","",str_replace("\\","",htmlspecialchars($v)));}
	foreach ($_POST as $key=>$value) $_POST[$key] = filter($value);
	foreach ($_GET  as $key=>$value) $_GET[$key]  = filter($value);
	foreach ($_COOKIE  as $key=>$value) $_COOKIE[$key]  = filter($value);
}

include_once (ROOT .'/inc/class/mysql.php');

# Сделаем переменную с временем и сделаем вывод через функцию) 
$GLOBAL_TIME = time();
function tme()
{
	GLOBAL $GLOBAL_TIME;
	return $GLOBAL_TIME;
}

?>