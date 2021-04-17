//d.write('<div class=but style="position:absolute; left:-5px; top:-5px; z-index: 65000; width:0px; height:0px;display:none;background:#f5f5f5;border:1px solid #ccc;" id="ec">&nbsp;</div>');
var ActionFormUse = 0;
var ec = $("#ec");
//$("#ec").fadeOut(1);
var Give = '';
var Give_names = '';
var inited = 0;

function Sinit_main_layer()
{
	if(inited) return;
	$("html, body").animate({ scrollTop: 0 }, 600);
	inited = 1;
	$("#ec").fadeOut(1);
	$("#ec").css({ left: '50%', top: '50%', width: '300px', display: 'block', transform: 'translate(-50%, -50%)'});
	d.getElementById('ec').innerHTML = '<div style="display:block;text-align:center;padding:15px;background:#e2e0e0;border:1px solid #ccc;"><div style="text-align:right;"><img src="/images/icons/delete.png" onclick="closesellingform()" style="cursor:pointer;"></div><div id=transfer></div></div>';
	$("#ec").show(300);
	setTimeout("Focus()",1000);
}
function Sdisable_main_layer()
{
	if(!inited) return;
	inited = 0;
	d.getElementById('ec').innerHTML = '&nbsp;';
	$("#ec").toggle(300);
}
function Focus()
{
	if(ActionFormUse)
		document.getElementById(ActionFormUse).focus();
}

function closesellingform()
{
	top.frames['ch_buttons'].document.mess.message.focus();
	ActionFormUse = '';
	Sdisable_main_layer();
	Give = '';
	Give_names = '';
}

function sellingform(wuid,wnametxt)
{
		Sinit_main_layer();
       $('#transfer').html('<form action=main.php method=POST><input type=hidden name=id value='+wuid+'><b>Продать "'+wnametxt+'"?</b><table border=0 cellspacing="0" cellpadding="5"><tr><Td><b>Кому:</b></td><td> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ></td></tr><tr><td> <b>Цена:</b></td><td> <INPUT TYPE="text" name=forprice  maxlength=5 ></td></tr></table> <input type=submit value="Продать"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

function giveallH(count)
{
		Sinit_main_layer();
       $('#transfer').html('<form action=main.php?giveallH=1 method=POST><b>Передать все травы['+count+']?</b><table border=0 cellspacing="0" cellpadding="5"><tr><Td><b>Кому:</b></td><td> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ></td></tr></table> <input type=submit value="Передать"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

function str_replace(replacement,substr,str)
{
while(str.indexOf(replacement)!=-1) str=str.replace(replacement,substr);
return str;
}

function peredat(wuid,wnametxt)
{
		Sinit_main_layer();
		if(wuid && Give.indexOf(wuid+'!') == -1)
		{
			Give += wuid+'!';
			Give_names += wnametxt+'~';
		}
		var table = '<table border=1 class=but width=100%>';
		var ar = Give_names.split("~");
		for(var i=0;i<ar.length-1;i++)
			table += '<tr><td><b>'+ar[i]+'</b></td><td style="cursor:pointer;" onclick=delete_p(\''+i+'\') ><center class=hp>X</center></td></tr>';
		table += '</table>';
      $('#transfer').html('<form action=main.php?ids='+Give+' method=POST><b>Передать</b> '+table+'<table border=0 width=100% cellspacing="0" cellpadding="5"><tr><Td><b>Кому:</b></td><td><INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ></td></tr><tr><td align=center><input type=submit value="Передать"  style="width:100%"></td></tr></table></FORM>');
       ActionFormUse = 'fornickname';
}

function delete_p(k)
{
	var ar = Give_names.split("~");
	var arg = Give.split("!");
	Give = '';
	Give_names = '';
	for(var i=0;i<ar.length-1;i++)
		if(i!=k)
		{
			Give += arg[i]+'!';
			Give_names += ar[i]+'~';
		}
	peredat(0,0);
}

function peredatm()
{
		Sinit_main_layer();
       $('#transfer').html('<form action=main.php method=POST><input type=hidden name=money value=1><b>Передать Деньги?</b><table border=0 cellspacing="0" cellpadding="5"><tr><Td><b>Кому:</b></td><td>  <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 > </td></tr><tr><td> <b>Сколько:</b> </td><td><INPUT TYPE="text" name=kolvo  maxlength=6 ></td></tr><tr><td> [Причина:]</td><td><INPUT TYPE="text" name=reason  maxlength=50 ></td></tr></table><input type=submit value="Передать"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

function napad(id)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=napad value='+id+'><b>Напасть/Вмешаться?</b><center >На кого? <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25  style="width:100%"><br><select size="1" name="za"  style="width:100%"><option value="0" selected>Против</option><option value="1">За</option></select></center> <input type=submit value="OK"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}
// кулачка
function napad_new(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=napad_new value='+id+'><b>Напасть с помощью свитка '+name+'?</b><center >На кого? <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25  style="width:100%"><br><select size="1" name="za"  style="width:100%"><option value="0" selected>Против</option><option value="1">За</option></select></center> <input type=submit value="OK"  style="width:100%"></FORM>');
        ActionFormUse = 'fornickname';
}
// боевое
function napad_b(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=napad_b value='+id+'><b>Напасть с помощью свитка '+name+'?</b><center >На кого? <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25  style="width:100%"><br><select size="1" name="za"  style="width:100%"><option value="0" selected>Против</option><option value="1">За</option></select></center> <input type=submit value="OK"  style="width:100%"></FORM>');
        ActionFormUse = 'fornickname';
}

function zakl(id,name,index)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=zakl value='+id+'><b>Использовать "'+name+'"?</b><br><b>На кого:</b> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ><input type=submit value="OK"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}



function prikol(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=prikol value='+id+'><b>Кинуть "'+name+'"?</b><br><b>В кого:</b> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ><input type=submit value="OK"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}



function scroll(id,name)
{
	Sinit_main_layer();
	$('#transfer').html('<form action=main.php method=POST><input type=hidden name=scroll value='+id+'><b>Использовать "'+name+'"?</b><br><input type=submit value="OK"  style="width:100%"></FORM>');
       ActionFormUse = 'fornicka';
}
function ustal(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=ustal value='+id+'><b>Использовать "'+name+'"?</b><br><b>На кого:</b> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ><input type=submit value="Использовать"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

function potion(id,name)
{
	Sinit_main_layer();
	$('#transfer').html('<form action=main.php method=POST><input type=hidden name=potion value='+id+'><b>Выпить "'+name+'"?</b><br><input type=submit value="OK"  style="width:100%"></FORM>');
       ActionFormUse = 'fornicka';
}
function teleport(id,name)
{
Sinit_main_layer();
$('#transfer').html('<form action=main.php method=POST><input type=hidden name=teleport value='+id+'><b>Использовать "'+name+'"?</b><br> Введите координаты для перемещения.<b><br>X: <INPUT TYPE="text" name=X  maxlength=5 ><br>Y: </b><INPUT TYPE="text" name=Y  maxlength=5 ><br><input type=submit value="OK"  style="width:100%"></FORM>');
}

// снег нг
function snejok(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=snejok value='+id+'><b>Кинуть "'+name+'"?</b><br><b>В кого:</b> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ><input type=submit value="Кинуть"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

// Буханье
function byxlo(id,name)
{
	Sinit_main_layer();
	$('#transfer').html('<form action=main.php method=POST><input type=hidden name=byxlo value='+id+'><b>Выпить "'+name+'"?</b><br><input type=submit value="OK"  style="width:100%"></FORM>');
       ActionFormUse = 'fornicka';
}

function antinevid(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type=hidden name=antinevid value='+id+'><b>Использовать "'+name+'"?</b><br><b>На кого:</b> <INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 ><input type=submit value="Использовать"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

function prim(id,name)
{
		Sinit_main_layer();
		$('#transfer').html('<form action=main.php method=POST><input type="hidden" name="prim" value='+id+'><b>Использовать "'+name+'"?</b><input type=submit value="Использовать"  style="width:100%"></FORM>');
       ActionFormUse = 'fornickname';
}

function show_imgs_sell(inp)
{
	document.write(`		
	<b style="COLOR: 315A94;margin-left:0px;text-decoration: underline;">Оружие:</b>
	<ul style="margin-left: 0px;padding-left: 15px;">
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=noji\'">Ножи и кинжалы</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=mech\'">Мечи</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=topo\'">Топоры и Секиры</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=drob\'">Дубины и Булавы</a></li>	
	<!--li><a href="#" onclick="location=\'main.php?${inp}&set_type=book\'">Книги заклинаний</a></!--li-->
	</ul>
	<b style="COLOR: 315A94;margin-left:0px;text-decoration: underline;">Доспехи:</b>
	<ul style="text-decoration: none;margin-left: 0px;padding-left: 15px;">
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=shle\'">Шлемы</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=kolchuga\'">Лёгкая броня</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=bron\'">Тяжёлая броня</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=naru\'">Нарукавники</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=perc\'">Перчатки</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=shit\'">Щиты</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=poya\'">Пояса</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=sapo\'">Обувь</a></li>
	</ul>
	<b style="COLOR: 315A94;margin-left:0px;text-decoration: underline;">Ювелирные изделия:</b>
	<ul style="text-decoration: none;margin-left: 0px;padding-left: 15px;">
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=braslet\'">Браслеты</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=kolc\'">Кольца</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=kylo\'">Ожерелья</a></li>
	</ul>	
	<b style="COLOR: 315A94;margin-left:0px;text-decoration: underline;">Магические предметы:</b>
	<ul style="text-decoration: none;margin-left: 0px;padding-left: 15px;">
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=napad\'">Нападения</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=zakl\'">Заклинаний</a></li>
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=kam\'">Восстановления в бою</a></li>
	<!--li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=potion\'">Зелья алхимические</a></li-->
	<!--li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=rune\'">Руны</a></li-->
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=teleport\'">Телепорт</a></li>
	</ul>
	<b style="COLOR: 315A94;margin-left:0px;text-decoration: underline;">Инструменты:</b>
	<ul style="text-decoration: none;margin-left: 0px;padding-left: 15px;">
	<li><a style="text-decoration: none;" href="#" onclick="location=\'main.php?${inp}&set_type=instrument\'">Инструменты</a></li><!-- onclick="location=\'main.php?${inp}&set_type=instrument\'" -->
	<li><a style="text-decoration: none;" href="#">Рыба и снасти</a></li> <!-- onclick="location=\'main.php?${inp}&set_type=fishing\'" -->
	</ul>		
	<!--img title="Травы алхимические" style="CURSOR: pointer" onclick="location=\'main.php?${inp}&set_type=herbal\'" height="50" src="/images/gameplay/shop_icons/travy.png" width="40" border="0">	
	<img border="0" src="/images/gameplay/shop_icons/resources.png" width="40" height="50" title="Ресурсы" style="CURSOR: pointer" onclick="location=\'main.php?${inp}&set_type=resources\'"-->
	`);
}