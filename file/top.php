<?php


echo"<table width=100% border=0 cellspacing=0 cellpadding=3>
<tr>";

// First Reiting
echo"
<td width=33% valign='top'>
<FIELDSET style='BORDER-COLOR: E6C9B5'><LEGEND><FONT COLOR=#8A6246><B>Уровень</B></FONT></LEGEND>
<table width=100% cellpadding=5 cellspacing=5 border=0><tr><td>";

$rt=mysql_query("SELECT * FROM users where `block`!='NULL' order by `level` desc limit 0,25");

while ($reit = mysql_fetch_array($rt)) {{$n+=1; 
	echo"</b></u>$n.</u></b>&nbsp;&nbsp;";
	if ($reit[align]) { echo "<img src='//oldiow.ru/images/signs/align/{$reit[align]}.gif'> ";}
	echo"<img src='//oldiow.ru/images/signs/{$reit[sign]}.gif' title='{$reit[clan_name]}'> 
	<b>$reit[user]</b> [<b>$reit[level]</b>] 
	<a href='//oldiow.ru/info.php?{$reit[user]}' target='_blank'> 
	<img src='//oldiow.ru/images/icons/inf.gif' border=0></a><br>";
} 
}

unset($rt,$reit,$n);
echo"
</td></tr></table>
</FIELDSET>
</td>";

// Second Reiting
echo"
<td width=33% valign='top'>
<FIELDSET style='BORDER-COLOR: E6C9B5'><LEGEND><FONT COLOR=#8A6246><B>Мощь персонажа</B></FONT></LEGEND>
<table width=100% cellpadding=5 cellspacing=5 border=0><tr><td>";

$rt=mysql_query("SELECT * FROM users where `block`!='NULL' order by `rank_i` desc limit 0,25");


while ($reit = mysql_fetch_array($rt)) {{$n+=1; 
	echo"</b></u>$n.</u></b>&nbsp;&nbsp;";
	if ($reit[align]) { echo "<img src='//oldiow.ru/images/signs/align/{$reit[align]}.gif'> ";}
	echo"<img src='//oldiow.ru/images/signs/{$reit[sign]}.gif' title='{$reit[clan_name]}'> <b>$reit[user]</b> [<b>$reit[level]</b>] <a href='//oldiow.ru/info.php?{$reit[user]}' target='_blank'> <img src='//oldiow.ru/images/icons/inf.gif' border=0></a> ({$reit[rank_i]}) <br>";} }

unset($rt,$reit,$n);
echo"
</td></tr></table>
</FIELDSET>
</td>";

//

// Third Reiting
echo"
<td width=33% valign='top'>
<FIELDSET style='BORDER-COLOR: E6C9B5'><LEGEND><FONT COLOR=#8A6246><B>Подземелье Чемпионов</B></FONT></LEGEND>
<table width=100% cellpadding=5 cellspacing=5 border=0><tr><td>";

$rt=mysql_query("SELECT * FROM users where `block`!='NULL' order by `inst_rait` desc limit 0,25");


while ($reit = mysql_fetch_array($rt)) {{$n+=1; 
	echo"</b></u>$n.</u></b>&nbsp;&nbsp;";
	if ($reit[align]) { echo "<img src='//oldiow.ru/images/signs/align/{$reit[align]}.gif'> ";}
	echo"<img src='//oldiow.ru/images/signs/{$reit[sign]}.gif' title='{$reit[clan_name]}'> <b>$reit[user]</b> [<b>$reit[level]</b>] <a href='//oldiow.ru/info.php?{$reit[user]}' target='_blank'> <img src='//oldiow.ru/images/icons/inf.gif' border=0></a> ({$reit[inst_rait]}) <br>";} }

unset($rt,$reit,$n);
echo"
</td></tr></table>
</FIELDSET>
</td>";

//
echo"</tr></table>";
?>