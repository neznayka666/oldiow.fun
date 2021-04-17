<?php
if ($player->pers["level"]<3) echo "<a href=\"javascript:{if(confirm('Вы действительно хотите обнулиться полностью?')) location='main.php?fz=1';}\" class=bga>Полное обнуление</a><b><center>(0 уровень, все не артовые вещи  пропадают.)</center></b><br>";
echo "<form method=post action='main.php?gopers=options'>";

$v1='';$v2='';$v3='';
if ($opt[0]=="full")$v1='selected';
if ($opt[0]=="small")$v2='selected';
if ($opt[0]=="min")$v3='selected';

echo '<table border="0" width="100%" cellspacing="5" cellpadding="5" class="greyBlock">
<tr>
<td colspan="2">
<b>Настройки</b>
</td>
<td>
</tr>
<tr>
<td>
Цвет сообщений в чате:
</td>
<td>




<SELECT name=newchatcolor style="width:100px;">
<option></option>
<option value=000000 style="BACKGROUND: #000000"></option>
<option value=FF3366 style="background: #FF3366"></option>
<option value=CC0033 style="background: #CC0033"></option>
<option value=FF3399 style="background: #FF3399"></option>
<option value=CC0066 style="background: #CC0066"></option>
<option value=FF6699 style="background: #FF6699"></option>
<option value=CC3366 style="background: #CC3366"></option>
<option value=990033 style="background: #990033"></option>
<option value=FF6633 style="background: #FF6633"></option>
<option value=CC3300 style="background: #CC3300"></option>
<option value=FF3300 style="background: #FF3300"></option>
<option value=FF6600 style="background: #FF6600"></option>
<option value=FF9966 style="background: #FF9966"></option>
<option value=CC6633 style="background: #CC6633"></option>
<option value=993300 style="background: #993300"></option>
<option value=FF9933 style="background: #FF9933"></option>
<option value=CC6600 style="background: #CC6600"></option>
<option value=FF9900 style="background: #FF9900"></option>
<option value=FF99CC style="background: #FF99CC"></option>
<option value=CC6699 style="background: #CC6699"></option>
<option value=993366 style="background: #993366"></option>
<option value=660033 style="background: #660033"></option>
<option value=FF66CC style="background: #FF66CC"></option>
<option value=CC3399 style="background: #CC3399"></option>
<option value=990066 style="background: #990066"></option>
<option value=FF33CC style="background: #FF33CC"></option>
<option value=CC0099 style="background: #CC0099"></option>
<option value=FF00CC style="background: #FF00CC"></option>
<option value=FF0099 style="background: #FF0099"></option>
<option value=FF0066 style="background: #FF0066"></option>
<option value=FF0033 style="background: #FF0033"></option>
<option value=FF0000 style="background: #FF0000"></option>
<option value=FF3333 style="background: #FF3333"></option>
<option value=CC0000 style="background: #CC0000"></option>
<option value=FF6666 style="background: #FF6666"></option>
<option value=CC3333 style="background: #CC3333"></option>
<option value=990000 style="background: #990000"></option>
<option value=FF9999 style="background: #FF9999"></option>
<option value=CC6666 style="background: #CC6666"></option>
<option value=993333 style="background: #993333"></option>
<option value=660000 style="background: #660000"></option>
<option value=CC9999 style="background: #CC9999"></option>
<option value=996666 style="background: #996666"></option>
<option value=663333 style="background: #663333"></option>
<option value=FFCC99 style="background: #FFCC99"></option>
<option value=CC9966 style="background: #CC9966"></option>
<option value=996633 style="background: #996633"></option>
<option value=663300 style="background: #663300"></option>
<option value=FFCC66 style="background: #FFCC66"></option>
<option value=CC9933 style="background: #CC9933"></option>
<option value=996600 style="background: #996600"></option>
<option value=FFCC33 style="background: #FFCC33"></option>
<option value=CC9900 style="background: #CC9900"></option>
<option value=FFCC00 style="background: #FFCC00"></option>
<option value=CC99FF style="background: #CC99FF"></option>
<option value=9966CC style="background: #9966CC"></option>
<option value=9966FF style="background: #9966FF"></option>
<option value=FFCCFF style="background: #FFCCFF"></option>
<option value=CC99CC style="background: #CC99CC"></option>
<option value=996699 style="background: #996699"></option>
<option value=663366 style="background: #663366"></option>
<option value=FF99FF style="background: #FF99FF"></option>
<option value=CC66CC style="background: #CC66CC"></option>
<option value=CC33CC style="background: #CC33CC"></option>
<option value=CC00CC style="background: #CC00CC"></option>
<option value=6666CC style="background: #6666CC"></option>
<option value=3333CC style="background: #3333CC"></option>
<option value=000099 style="background: #000099"></option>
<option value=000066 style="background: #000066"></option>
<option value=0000CC style="background: #0000CC"></option>
<option value=0000FF style="background: #0000FF"></option>
<option value=336633 style="background: #336633"></option>
<option value=339933 style="background: #339933"></option>
<option value=669966 style="background: #669966"></option>
<option value=009900 style="background: #009900"></option>
<option value=006600 style="background: #006600"></option>
<option value=00CC00 style="background: #00CC00"></option>
<option value=3300FF style="background: #3300FF"></option>
<option value=00CCCC style="background: #00CCCC"></option>
<option value=009999 style="background: #009999"></option>
<option value=33CCCC style="background: #33CCCC"></option>
<option value=006666 style="background: #006666"></option>
<option value=336699 style="background: #336699"></option>
<option value=003366 style="background: #003366"></option>
<option value=003399 style="background: #003399"></option>
<option value=0033CC style="background: #0033CC"></option>
<option value=3366FF style="background: #3366FF"></option>
<option value=336600 style="background: #336600"></option>
<option value=339900 style="background: #339900"></option>
<option value=33CC00 style="background: #33CC00"></option>
<option value=00CC33 style="background: #00CC33"></option>
<option value=00CCFF style="background: #00CCFF"></option>
<option value=33CCFF style="background: #33CCFF"></option>
 ';

	$opt = explode ("|",$player->pers["options"]);
	
	/*
    $tt = 1;

    for ( $aa=0; $aa<8; $aa+=$tt ) { for ( $bb=0; $bb<8; $bb+=$tt ) { for ( $cc=5; $cc<8; $cc+=$tt ) { if (

		$opt[5]==dechex($aa).dechex($aa).dechex($bb).dechex($bb).dechex($cc).dechex($cc) )
		
        echo "<OPTION style='BACKGROUND: #" .dechex($aa).dechex($aa).dechex($bb).dechex($bb).dechex($cc).dechex($cc)."'
        value=".dechex($aa).dechex($aa).dechex($bb).dechex($bb).dechex($cc).dechex($cc)." SELECTED>
		</OPTION>";
		
        else echo '<option value=000000 SELECTED style="BACKGROUND: #000000"></option><option value=FF3366 style="background: #FF3366"></option><option value=CC0033 style="background: #CC0033"></option><option value=FF3399 style="background: #FF3399"></option><option value=CC0066 style="background: #CC0066"></option><option value=FF6699 style="background: #FF6699"></option><option value=CC3366 style="background: #CC3366"></option><option value=990033 style="background: #990033"></option><option value=FF6633 style="background: #FF6633"></option><option value=CC3300 style="background: #CC3300"></option><option value=FF3300 style="background: #FF3300"></option><option value=FF6600 style="background: #FF6600"></option><option value=FF9966 style="background: #FF9966"></option><option value=CC6633 style="background: #CC6633"></option><option value=993300 style="background: #993300"></option><option value=FF9933 style="background: #FF9933"></option><option value=CC6600 style="background: #CC6600"></option><option value=FF9900 style="background: #FF9900"></option><option value=FF99CC style="background: #FF99CC"></option><option value=CC6699 style="background: #CC6699"></option><option value=993366 style="background: #993366"></option><option value=660033 style="background: #660033"></option><option value=FF66CC style="background: #FF66CC"></option><option value=CC3399 style="background: #CC3399"></option><option value=990066 style="background: #990066"></option><option value=FF33CC style="background: #FF33CC"></option><option value=CC0099 style="background: #CC0099"></option><option value=FF00CC style="background: #FF00CC"></option><option value=FF0099 style="background: #FF0099"></option><option value=FF0066 style="background: #FF0066"></option><option value=FF0033 style="background: #FF0033"></option><option value=FF0000 style="background: #FF0000"></option><option value=FF3333 style="background: #FF3333"></option><option value=CC0000 style="background: #CC0000"></option><option value=FF6666 style="background: #FF6666"></option><option value=CC3333 style="background: #CC3333"></option><option value=990000 style="background: #990000"></option><option value=FF9999 style="background: #FF9999"></option><option value=CC6666 style="background: #CC6666"></option><option value=993333 style="background: #993333"></option><option value=660000 style="background: #660000"></option><option value=CC9999 style="background: #CC9999"></option><option value=996666 style="background: #996666"></option><option value=663333 style="background: #663333"></option><option value=FFCC99 style="background: #FFCC99"></option><option value=CC9966 style="background: #CC9966"></option><option value=996633 style="background: #996633"></option><option value=663300 style="background: #663300"></option><option value=FFCC66 style="background: #FFCC66"></option><option value=CC9933 style="background: #CC9933"></option><option value=996600 style="background: #996600"></option><option value=FFCC33 style="background: #FFCC33"></option><option value=CC9900 style="background: #CC9900"></option><option value=FFCC00 style="background: #FFCC00"></option><option value=CC99FF style="background: #CC99FF"></option><option value=9966CC style="background: #9966CC"></option><option value=9966FF style="background: #9966FF"></option><option value=FFCCFF style="background: #FFCCFF"></option><option value=CC99CC style="background: #CC99CC"></option><option value=996699 style="background: #996699"></option><option value=663366 style="background: #663366"></option><option value=FF99FF style="background: #FF99FF"></option><option value=CC66CC style="background: #CC66CC"></option><option value=CC33CC style="background: #CC33CC"></option><option value=CC00CC style="background: #CC00CC"></option><option value=6666CC style="background: #6666CC"></option><option value=3333CC style="background: #3333CC"></option><option value=000099 style="background: #000099"></option><option value=000066 style="background: #000066"></option><option value=0000CC style="background: #0000CC"></option><option value=0000FF style="background: #0000FF"></option><option value=336633 style="background: #336633"></option><option value=339933 style="background: #339933"></option><option value=669966 style="background: #669966"></option><option value=009900 style="background: #009900"></option><option value=006600 style="background: #006600"></option><option value=00CC00 style="background: #00CC00"></option><option value=3300FF style="background: #3300FF"></option><option value=00CCCC style="background: #00CCCC"></option><option value=009999 style="background: #009999"></option><option value=33CCCC style="background: #33CCCC"></option><option value=006666 style="background: #006666"></option><option value=336699 style="background: #336699"></option><option value=003366 style="background: #003366"></option><option value=003399 style="background: #003399"></option><option value=0033CC style="background: #0033CC"></option><option value=3366FF style="background: #3366FF"></option><option value=336600 style="background: #336600"></option><option value=339900 style="background: #339900"></option><option value=33CC00 style="background: #33CC00"></option><option value=00CC33 style="background: #00CC33"></option><option value=00CCFF style="background: #00CCFF"></option><option value=33CCFF style="background: #33CCFF"></option><option value=0066CC style="background: #0066CC"></option><option value=6600FF style="background: #6600FF"></option>';
        }
        }
		}
		*/
		echo '
		'.$opt[5].'
</select>
</td>
</tr>
<tr>
    <td>Информация о вещах</td>
    <td width="120"><select size="1" name="inv" style="width: 120">
            <option '.$v1.' value="full">Полная</option>
            <option '.$v2.' value="small">Сокращённая</option>
            <option '.$v3.' value="min">Минимальная</option>
        </select></td>
</tr>';
$v1='';$v2='';$v3='';
if ($opt[1]=="full")$v1='selected';
if ($opt[1]=="small")$v2='selected';
if ($opt[1]=="min")$v3='selected';
echo '<tr>
    <td>Информация о заклинаниях</td>
    <td width="120"><select size="1" name="zak" style="width: 120">
            <option '.$v1.' value="full">Полная</option>
            <option '.$v2.' value="small">Сокращённая</option>
            <option '.$v3.' value="min">Минимальная</option>
        </select></td>
</tr>';
$v1='';$v2='';$v3='';
if ($opt[2]=="az")$v1='selected';
if ($opt[2]=="0+")$v2='selected';
if ($opt[2]=="+0")$v3='selected';
echo'<tr>
    <td>Сортировка персонажей</td>
    <td width="120"><select size="1" name="sort" style="width: 120">
            <option '.$v1.' value="3">От a-z</option>
            <option '.$v2.' value="1">От 0 уровня</option>
            <option '.$v3.' value="2">К 0 уровню</option>
        </select></td>
</tr>';
$v1='';$v2='';$v3='';
if ($opt[3]=="yes")$v1='selected';
if ($opt[3]=="no")$v2='selected';
echo'<tr>
    <td>Показывать доп. информацию в чате</td>
    <td width="120"><select size="1" name="chat" style="width: 120">
            <option '.$v1.' value="yes">Да</option>
            <option '.$v2.' value="no">Нет</option>
        </select></td>
</tr>';
if ($opt[7]=="no")$v2='selected';
else$v1='selected';
echo'<tr>
    <td>Автоматически переключаться в боевой чат</td>
    <td width="120"><select size="1" name="fchat" style="width: 120">
            <option '.$v1.' value="yes">Да</option>
            <option '.$v2.' value="no">Нет</option>
        </select></td>
</tr>';
if ($options[6]) $design = 'SELECTED';
$v1='';$v2='';$v3='';$v4='';$v5='';$v6='';
if ($opt[4]=="0.1")$v1='selected';
if ($opt[4]=="0.3")$v2='selected';
if ($opt[4]=="0.6")$v3='selected';
if ($opt[4]=="1")$v4='selected';
if ($opt[4]=="2")$v5='selected';
if ($opt[4]=="0")$v6='selected';
echo'<tr>
    <td>Плавный переход(Только IExplorer)</td>
    <td width="120"><select size="1" name="dur" style="width: 120">
            <option '.$v1.' value="0.1">Оч. Быстро</option>
            <option '.$v2.' value="0.3">Быстро</option>
            <option '.$v3.' value="0.6">Средне</option>
            <option '.$v4.' value="1">Медленно</option>
            <option '.$v5.' value="2">Оч. медленно</option>
            <option '.$v6.' value="0">Нет</option>
        </select></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="Сохранить" class="inv_but"></td>
</tr>
</table> ';
/*
if ($player->pers["obr"]==0)// include ("hero/_avatars_show.php");
{
echo '<table border="2" width="100%" cellspacing="0" cellpadding="0">';

    for ($i=0;$i<$max_obr;$i++) { if ($i%3==0) echo "<tr>" ; echo "<td class=but><INPUT type=radio value=" .$i."
        name=selectob><br><img height=255 src='http://".IMG."/persons/".$player->pers["pol"]."_".$i.".gif' width=115
            border=0></td>";
        if ($i%3==2) echo "</tr>";
        }
        echo "</table>";
}
*/
echo "</form>";
?>