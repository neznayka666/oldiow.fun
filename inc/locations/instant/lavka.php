<table cellSpacing="0" cellPadding="5" cellspacing="5" cellspadding="5" width="100%">
    <tr>
        <td colspan="2">
            <?php echo 'У вас с собой: <b>'.round($player->pers['imoney'],2).' сз.</b>'; ?>
        </td>
    </tr>
    <tr>
        <td style="width:250px;" valign="top" class="greyBlock margin-5 padding-15">
            <b style="COLOR: 315A94;margin-left:0px;text-decoration: underline;">Ювелирные изделия:</b>
            <ul style="text-decoration: none;margin-left: 0px;padding-left: 15px;">
                <li>
                    <a href="main.php?do=2&set_type=kolc">Кольцо</a>
                </li>
            </ul>
            <!--img title="Ножи" style="cursor: pointer" onclick="location='main.php?do=2&set_type=noji'" height="50" src="/images/weapons/set_knife.gif" width="40" border="0"-->
            <!--img title="Брони" style="cursor: pointer" onclick="location='main.php?do=2&set_type=bron'" height="50" src="/images/weapons/set_body.gif" width="40" border="0"-->
            <!--img title="Перчатки" style="cursor: pointer" onclick="location='main.php?do=2&set_type=perc'" height="50" src="/images/weapons/set_gloves.gif" width="40" border="0"-->
            <!--img title="Расходники" style="cursor: pointer" onclick="location='main.php?do=2&set_type=zakl'" height="50" src="/images/weapons/set_decoct.gif" width="40" border="0"-->
        </td>
        <td>

            <table width="100%" cellspacing="0" cellpadding="0">
                <?php
$lavka = 1;

if ($_FILTER["lavkatype"]!='napad') $stype = "`stype`='".$_FILTER["lavkatype"]."'";
else $stype = "`type` = 'noji' ";
	
$enures = $db->sql("SELECT * FROM `weapons` WHERE  ".$stype." and `where_buy`='4' ORDER BY `price` ASC");
while ($v = mysql_fetch_array($enures))
{
	echo "<tr><td align=left class=weapons_box>";
	if ($v["q_s"]<1) echo "<font class=hp><b> Нет в наличии</b></font> ";
	if ($v["q_s"]>0 and $v["price"]<=$player->pers["imoney"]) echo "<p id='id".$v["id"]."' style='margin:5px;color:green;'></p><input type=text size=2 id='".$v["id"]."k' value=1 MAXLENGTH=2 > <input type=button class=inv_but onclick=\"w_buy('".$v["id"]."')\" value='Купить, Осталось: ".$v["q_s"]."'>";
	$vesh = $v;
	include (ROOT.'/inc/inc/weapon.php');
	echo "</td></tr>";
}

?></table>
        </td>
    </tr>
</table>
<script>
var MAINID;

function w_buy(id) {
    MAINID = 'id' + id;
    $('#' + MAINID).html('<img src=http://<?php echo IMG;?>/spinner.gif>');
    $.get('/gameplay/ajax/get_lavka_instant.php', {
        'buy': id,
        'kolvo': $('#' + id + 'k').val()
    }, function(r) {
        arr = r.split('@');
        if (arr[0] == 'NO') $('#' + MAINID).html(arr[1]);
        else if (arr[0] == 'OK') success(arr[1], arr[2], arr[3]);
    });
}

function success(name, price, kolvo) {
    document.getElementById(MAINID).innerHTML = 'Вы удачно купили <b>"' + name + '"</b> за <b>' + price +
        ' сз.</b> в количестве ' + kolvo + ' шт.';
}
</script>