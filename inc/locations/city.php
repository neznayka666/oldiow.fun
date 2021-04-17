<map name="links">
    <?php
$ti=time();
?>
    <!--area shape='rect' <?=build_go_string('merry',$lastom_new);?> coords='230,69,325,182' href='#' title="Дворец
        Бракосочетаний" onmouseover="s_des(event,'|Дворец Бракосочетаний')" onmouseout="h_des()"
        onmousemove="move_alt(event)"-->

    <area shape='rect' <?=build_go_string('arena',$lastom_new);?> coords='326,172,508,270' href='#' alt='Игровой замок'
        onmouseover="s_des(event,'|Игровой замок')" onmouseout="h_des()" onmousemove="move_alt(event)">

    <area SHAPE='rect' <?=build_go_string('lavka',$lastom_new);?> coords='645,205,734,288' href='#' alt='Гос. Магазин'
        onmouseover="s_des(event,'|Гос. Магазин')" onmouseout="h_des()" onmousemove="move_alt(event)" />

    <!--area shape='rect' <?=build_go_string('dhouse',$lastom_new);?> coords='508,84,643,205' href=# alt='Магазин «Бутик»'
        onmouseover="s_des(event,'|Магазин «Бутик»')" onmouseout="h_des()" onmousemove="move_alt(event)"-->

    <area shape='rect' <?=build_go_string('vhod',$lastom_new);?> coords="801,129,676,213" href=#
        alt='Подземелье Чемпионов' onmouseover="s_des(event,'|Подземелье Чемпионов')" onmouseout="h_des()"
        onmousemove="move_alt(event)">

    <area shape='rect' <?=build_go_string('pr_shop',$lastom_new);?> coords='736,213,822,312' href=#
        alt='Магазин Подарков' onmouseover="s_des(event,'|Магазин Подарков')" onmouseout="h_des()"
        onmousemove="move_alt(event)">

    <area shape='rect' <?=build_go_string('weditor',$lastom_new);?> coords='132,325,213,236' href=# alt='Кузница'
        onmouseover="s_des(event,'|Кузница')" onmouseout="h_des()" onmousemove="move_alt(event)">

    <area shape='rect' <?=build_go_string('lhouse_p',$lastom_new);?> coords='8,211,109,107' href=# alt='Академия'
        onmouseover="s_des(event,'|Академия')" onmouseout="h_des()" onmousemove="move_alt(event)">

    <!--area shape='rect' <?=build_go_string('hospital',$lastom_new);?> coords='101,152,267,251' href=# alt='Больница'
        onmouseover="s_des(event,'|Больница')" onmouseout="h_des()" onmousemove="move_alt(event)" /-->

    <area shape='rect' <?=build_go_string('podarok',$lastom_new);?> coords='34,243,109,307' href=# alt='Беседка'
        onmouseover="s_des(event,'|Беседка')" onmouseout="h_des()" onmousemove="move_alt(event)">

</map>
<div class="main">
    <div class="titleCity">Центральная площадь</div>
    <div class='cityWork'>
        <div class="stepLeft">
            <img src="/images/nav/icon/active/left.gif" <?php echo"".build_go_string('city3',$lastom_new)."";?>
                onmouseover="s_des(event,'|Манежная пл.')" onmouseout="h_des()" onmousemove="move_alt(event)">

        </div>
        <div class="location">
            <img src="/images/locations/city_new/saragosa2<? if(!(date(" H")<21 and date("H")>7)){echo
            "_n";}?>.jpg"
            width="830" height="329" USEMAP="#links">
        </div>
        <div class="stepRight">
            <img src="/images/nav/icon/active/right.gif" <?php echo"".build_go_string('city2',$lastom_new)."";?>
                onmouseover="s_des(event,'|ул. Краснодарская')" onmouseout="h_des()" onmousemove="move_alt(event)">

        </div>
    </div>
</div>