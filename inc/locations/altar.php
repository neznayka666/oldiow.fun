<body bgcolor="#E0DFE3">

    <table border=0 width=100% cellpadding=0 cellspacing=0 height=20>
        <tr>
            <td width=10>
                <table border=0 width=100% cellpadding=0 cellspacing=0>
                    <tr>
                        <Td><img src='img/cor_l_t.gif'></td>
                    </tr>
                    <tr>
                        <Td><img src='img/cor_l_b.gif'></td>
                    </tr>
                </table>
            </td>
            <td bgcolor=#cccccc><b>Алтарь Стихий </b></td>

            </td>
            <td width=10>
                <table border=0 width=100% cellpadding=0 cellspacing=0>
                    <tr>
                        <Td><img src='img/cor_r_t.gif'></td>
                    </tr>
                    <tr>
                        <Td><img src='img/cor_r_b.gif'></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br>
    <table width=100% cellpadding=0 cellspacing=0>
        <td width=20><img src='img/cor2_l_t.gif'></td>
        <td bgcolor=#cccccc>&nbsp;</td>
        <td width=20><img src='img/cor2_r_t.gif'></td>
        </tr>
    </table>
    <table border=0 cellpadding=0 width=100% bgcolor=#cccccc>
        <TR>
            <TD>
                <center>



                    <p>Для изучения стихии следует выбрать желаемую стихию и нажать кнопку "Молится". </p>
                    <p> Будте внимательны при изучении стихии, так как после начала молитвы Вы не сможете остановить её.
                    </p>
                    <table width="777" border="1">
                        <tr>
                            <th scope="col">Стихия Огня<img src="/img/magic/magic_fire.gif" alt="Стихия огня"
                                    width="100" height="99"></th>
                            <th scope="col">Стихия Воды<img src="/img/magic/magic_water.gif" alt="Стихия воды"
                                    width="100" height="99"></th>
                            <th scope="col">Стихия Ветра<img src="/img/magic/magic_wind.gif" alt="Стихия воздуха"
                                    width="100" height="99"></th>
                            <th scope="col">Стихия Земли <img src="/img/magic/magic_earth.gif" alt="Стихия земли"
                                    width="100" height="99"></th>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <p>Время молитвы </p>
                                    <p>15 мин </p>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <p>Время молитвы </p>
                                    <p>15 мин </p>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <p>Время молитвы</p>
                                    <p>15 мин </p>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <p>Время молитвы</p>
                                    <p>15 мин </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p align="center"><strong>Время действия </strong></p>
                                <p align="center"><strong>1 час</strong></p>
                                <p align="center">Сокрушение +15%</p>
                            </td>
                            <td>
                                <p align="center"><strong>Время действия </strong></p>
                                <p align="center"><strong>1 час</strong></p>
                                <p align="center">Ярость +15% </p>
                            </td>
                            <td>
                                <p align="center"><strong>Время действия </strong></p>
                                <p align="center"><strong>1 час</strong></p>
                                <p align="center">Уловка +15% </p>
                            </td>
                            <td>
                                <p align="center"><strong>Время действия </strong></p>
                                <p align="center"><strong>1 час</strong></p>
                                <p align="center">Клас Брони +20 </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <?php 
if( !empty($_POST['mol1']) and $pers['waiter']<tme() )
{
    $worktime=900; 
    $timeaura = 60; // В минутах
    $mf1 = 15;
    $pers['waiter'] = tme()+$worktime;
    $pers['mf1']+= $mf1;
    
    $a['image'] = 'magic_fire';
    $a['params'] = 'mf1='.$mf1.'@'; // Перечисление параметров..
    $a['esttime'] = $timeaura*60;
    $a['name'] = 'Аура Стихия Огня';
    $a['special'] = 20; ### Тип ауры.. 
    
    light_aura_on($a,$pers['uid']);
    set_vars(aq($pers),$pers['uid']); 
}
?>
                                    <?php
              if($pers["waiter"]>tme()){
              echo"<div id=waiter class=but align=center></div>
              <script>waiter(".($pers["waiter"]-tme()).");</script>";
              }else{
              echo'<form method="post" action="">
              <input name="mol1" type="submit" style="width: 150;" value="Начать молится" title="Чтобы начать молитву, нажмите на кнопку" class="login" />
              </form>';}
              
              ?>
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    <?php 
if( !empty($_POST['mol2']) and $pers['waiter']<tme() )
{
    $worktime=900; 
    $timeaura = 60; // В минутах
    $mf5 = 15;
    $pers['waiter'] = tme()+$worktime;
    $pers['mf5']+= $mf5;
    
    $a['image'] = 'magic_water';
    $a['params'] = 'mf5='.$mf5.'@'; // Перечисление параметров..
    $a['esttime'] = $timeaura*60;
    $a['name'] = 'Аура Стихии Воды';
    $a['special'] = 12; ### Тип ауры.. 
    
    light_aura_on($a,$pers['uid']);
    set_vars(aq($pers),$pers['uid']);
    
}
?>
                                    <?php
              if($pers["waiter"]>tme()){
              echo"<div id=waiter class=but align=center></div>
              <script>waiter(".($pers["waiter"]-tme()).");</script>";
              }else{
              echo'<form method="post" action="">
              <input name="mol2" type="submit" style="width: 150;" value="Начать молится" title="Чтобы начать молитву, нажмите на кнопку" class="login" />
              </form>';}
              
              ?>
                                </div>
                            </td>
                            <td>
                                <center><?php 
if( !empty($_POST['mol3']) and $pers['waiter']<tme() )
{
    $worktime=900; 
    $timeaura = 60; // В минутах
    $mf2 = 15;
    $pers['waiter'] = tme()+$worktime;
    $pers['mf2']+= $mf2;
    
    $a['image'] = 'magic_wind';
    $a['params'] = 'mf2='.$mf2.'@'; // Перечисление параметров..
    $a['esttime'] = $timeaura*60;
    $a['name'] = 'Аура Стихии Ветра';
    $a['special'] = 12; ### Тип ауры.. 
    
    light_aura_on($a,$pers['uid']);
    set_vars(aq($pers),$pers['uid']);
    
}
?>
                                    <?php
              if($pers["waiter"]>tme()){
              echo"<div id=waiter class=but align=center></div>
              <script>waiter(".($pers["waiter"]-tme()).");</script>";
              }else{
              echo'<form method="post" action="">
              <input name="mol3" type="submit" style="width: 150;" value="Начать молится" title="Чтобы начать молитву, нажмите на кнопку" class="login" />
              </form>';}
              
              ?></center>
                            </td>
                            <td>
                                <center><?php 
if( !empty($_POST['mol4']) and $pers['waiter']<tme() )
{
    $worktime=900; 
    $timeaura = 60; // В минутах
    $kb = 20;
    $pers['waiter'] = tme()+$worktime;
    $pers['kb']+= $kb;
    
    $a['image'] = 'magic_earth';
    $a['params'] = 'kb='.$kb.'@'; // Перечисление параметров..
    $a['esttime'] = $timeaura*60;
    $a['name'] = 'Аура Стихии Земли';
    $a['special'] = 12; ### Тип ауры.. 
    
    light_aura_on($a,$pers['uid']);
    set_vars(aq($pers),$pers['uid']);
    
}
?>
                                    <?php
              if($pers["waiter"]>tme()){
              echo"<div id=waiter class=but align=center></div>
              <script>waiter(".($pers["waiter"]-tme()).");</script>";
              }else{
              echo'<form method="post" action="">
              <input name="mol4" type="submit" style="width: 150;" value="Начать молится" title="Чтобы начать молитву, нажмите на кнопку" class="login" />
              </form>';}
              
              ?></center>
                            </td>
                        </tr>
                    </table>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                    <p><strong>Выберете, какому Богу стихии Вы желаете молиться</strong></p>



                    <br>
                    <br>

                </center>
            </td>
        </tr>
    </table>
    <table width=100% cellpadding=0 cellspacing=0>
        <td width=20><img src='img/cor2_l_b.gif'></td>
        <td bgcolor=#cccccc><img src='img/20_20.gif'></td>
        <td width=20><img src='img/cor2_r_b.gif'></td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <div align='right'></div>