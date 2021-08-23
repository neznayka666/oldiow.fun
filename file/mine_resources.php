<?php

$rt=mysql_query("SELECT * FROM resources order by `price` ASC");
$table = "<table width=100% border=0 cellspacing=0 cellpadding=3><tr>";
while ($res = mysql_fetch_array($rt))
{
$table .= "
<td>
<table width=100% cellspacing='0' cellpadding='3' style='border-radius:3px;border:1px solid #D2A280;'><tr>
<td width='80' align='center'><img src='//oldiow.ru/images/weapons/resources/".$res["image"].".gif' title='".$res["name"]."'></td>
<td><p><b>".$res['name']."</b><br>".$res['name_of_once']."</br>Цена: <b>$res[price]</b> зм.</p></td>
</tr></table></td>";
if (++$i % 4==0)  $table .="</tr><tr>";
}
$table .="</table>";
echo $table;
?>