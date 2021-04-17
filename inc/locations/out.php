<?php

include (ROOT.'/inc/class/map.class.php');

$map = new Naturen($player->pers);
$wt = $player->pers['waiter']-tme();

?>
<link rel="stylesheet" type="text/css" href="/css/map_v1.css" />
<!--[if lt IE 7]>
<link href="/css/iepng.css" rel="stylesheet" type="text/css">
<![endif]-->
<script type="text/javascript" src="/js/map_v1.js"></script>
<script type="text/javascript" src="/js/quest_v1.js"></script>
<SCRIPT language="JavaScript">
var map_img_path = '/public_content/mapimg';
var IMG = '/public_content/mapimg';
var url_map = '/images/map';
var inshp = [
    <?php echo $player->pers["chp"].",".$player->pers["hp"].",".$player->pers["cma"].",".$player->pers["ma"].",".intval($sphp).",".intval($spma).",".floor($player->pers["tire"])?>
];
var mapbt = [<?php echo $map->mapbt();?>];
var map = [
    <?php echo '['.($player->pers['x']).','.($player->pers['y']).',1,"'.DN.'",['.(($wt>0) ? '1,'.$wt : '').'],""],['.$map->retVievMap().']';?>
];
view_map();
</SCRIPT>

<?php
//exit;
?>