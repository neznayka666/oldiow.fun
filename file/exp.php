<TABLE cellspacing=0 cellpadding=3 border=0 width=100%>
    <TR>
        <TD>
            <?php


$inf=mysql_query("SELECT * FROM `exp` order by `exp`");


echo"
<body>
<table width=100% align=center align=center cellpadding=5 cellspacing=0 class='exptd'>

<tr>
	<td align=center width=14%><b>Уровень</b></td>
	<td align=center width=14%><b>Золотые монеты</b></td>	
	<td align=center width=14%><b>Характеристики</b></td>	
	<td align=center width=14%><b>Особенности</b></td>
	<td align=center width=15%><b>Опыт</b></td>	
</tr>";


for ($i=0; $i<mysql_numrows($inf); $i++) {
$l=mysql_fetch_assoc($inf);

$money+=$l['money'];
$stats+=$l['stats'];
$free_f_skills+=$l['free_f_skills'];

if ($base!=0) $wins=$l['exp']/$base; else $wins=0;
$wins=round($wins);
$lvl="$l[id]"-1;

        
    if ($i%2==0) { $color = "#D2A280"; } 
    else { $color = ""; }
    echo "
    <tr bgcolor='".$color."' style='text-align:center;font-weight:600;'"; if ($als) echo""; echo">
    <td>{$l[level]}</td>
	<td>{$l[money]} ({$money})</td>	
	<td>{$l[stats]} ({$stats})</td>	
	<td>{$l[free_f_skills]} ({$free_f_skills})</td>	
    <td>{$l[exp]}</td>
    </tr>";
   


/*
echo"<tr"; if ($als) echo""; echo">
	<td><center>$l[level]</td>
	<td><center>$l[money] ($money)</td>	
	<td><center>$l[stats] ($stats)</td>	
	<td><center>$l[free_f_skills] ($free_f_skills)</td>	
    <td><center>$l[exp]</td>	
</tr>";
*/

$base=$l['base'];
if (!$als) $als=1; else $als=0;
}

echo"</table>";

?>
        </TD>
    </TR>
</TABLE>