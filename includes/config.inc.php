<?php

error_reporting(0);

define('DROOT',$_SERVER["DOCUMENT_ROOT"]);
$res = mysql_connect ("localhost","newiowfun","rd3oFkiFZB218v3I");
mysql_select_db("new_oldiow_fun", $res);
mysql_query("SET NAMES utf8");

define ('IMG', str_replace('forum.', '', $_SERVER['HTTP_HOST']).'/images');

?>