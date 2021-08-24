<?php

$do = isset($http->get['do']) ? intval($http->get['do']) : 1;
$do = isset($http->post['do']) ? intval($http->post['do']) : $do;

echo '
<div style="margin:0 auto;max-width:1200px;width:100%;">
<h3 class="titleCity">Подземелье Драконов</h3>


<table border="0" cellspacing="0" width="100%" class="greyBlock" style="margin:10px 0;">
<tr>
<td width="50%"><a href="main.php?do=1" class="'.(($do==1) ? 'blocked' : 'bga').'">В битву с драконом</a></td>
<!--td width="50%"><a href="main.php?do=2" class="'.(($do==2) ? 'blocked' : 'bga').'">Лавка Драконоборца</a></!--td>
<!--td width="30%"><a href="main.php?do=3" class="'.(($do==3) ? 'bga' : 'blocked').'">Стражник у врат подземелья</a></!--td-->	
</tr>
</table>

';

switch( $do )
{
	case 1: include('instant/dragons.php'); break;
	//case 2: include('instant/lavka.php'); break;
	//case 3: include('instant/vhod.php'); break;
	default: echo 'Выберите раздел.';
}
?>
</div>