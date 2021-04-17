<map name="links">
    <?php
$ti=time();
echo "
<!--area shape='rect' ".build_go_string('bank',$lastom_new)." coords='236,12,60,250' href='#' title='Банк' alt='Банк' /-->
<area shape='rect' ".build_go_string('taverna',$lastom_new)." coords='324,128,243,281' href='#' title='Таверна' alt='Таверна' />
</map>
";
".build_go_string('taverna',$lastom_new)."

?>
    <div class="main">
        <div class="titleCity">Манежная пл.</div>
        <div class='cityWork'>
            <div class="stepLeft">
                <img src="/images/nav/icon/n_active/left.gif" alt="Проход закрыт!"
                    onmouseover="s_des(event,'|Проход закрыт!')" onmouseout="h_des()" onmousemove="move_alt(event)">

            </div>
            <div class="location">
                <img src="/images/locations/city_new/saragosa3<? if(!(date(" H")<21 and date("H")>7)){echo
                "_n";}?>.jpg"
                width="830" height="329" USEMAP="#links">
            </div>
            <div class="stepRight">
                <img alt="Центральная площадь" src="/images/nav/icon/active/right.gif"
                    <?php echo"".build_go_string('city',$lastom_new)."";?>
                    onmouseover="s_des(event,'|Центральная площадь')" onmouseout="h_des()"
                    onmousemove="move_alt(event)">

            </div>
        </div>
    </div>