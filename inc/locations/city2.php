<map name="links">
    <?php
$ti=time();
echo "
<!--area shape='rect' ".build_go_string('house',$lastom_new)." coords='291,274,496,21' href='#' title='Перейти на городскую площадь' alt='Перейти на городскую площадь' -->
</map>
";

?>
    <div class="main">
        <div class="titleCity">ул. Краснодарская</div>
        <div class='cityWork'>
            <div class="stepLeft">
                <img <?php echo"".build_go_string('city',$lastom_new)."";?> src="/images/nav/icon/active/left.gif"
                    alt="Центральная площадь" onmouseover="s_des(event,'|Центральная площадь')" onmouseout="h_des()"
                    onmousemove="move_alt(event)">

            </div>
            <div class="location">
                <img src="/images/locations/city_new/saragosa1<? if(!(date(" H")<21 and date("H")>7)){echo
                "_n";}?>.jpg"
                width="830" height="329" USEMAP="#links">
            </div>
            <div class="stepRight">
                <img alt="Выход из города" src="/images/nav/icon/active/right.gif"
                    <?php echo "".build_go_string('out',$lastom_new)."";?> onmouseover="s_des(event,'|Выход из города')"
                    onmouseout="h_des()" onmousemove="move_alt(event)">

            </div>
        </div>
    </div>