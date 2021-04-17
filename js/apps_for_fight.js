var $ = function(id){
	return document.getElementById(id);
};

function dw(txt)
{
	return document.write(txt);
}

function df(txt)
{
	$('app').innerHTML += txt;
}

function dfm(txt)
{
	$('apps_m').innerHTML += txt;
}

function da(txt)
{
	$('apps_m').innerHTML += txt;
}

function dam(txt)
{
	$('app').innerHTML += '<font class=timef>'+txt+'</font>';
}

function str_replace(replacement,substr,str)
{
while(str.indexOf(replacement)!=-1) str=str.replace(replacement,substr);
return str;
}

function apps_head(type,hp,mhp,ma,mma,sort_apps)
{
	var cat1,cat2,cat3,cat4;
	if (type==1) cat1 = 'class=blocked'; else cat1 = 'class=bga';
	if (type==2) cat2 = 'class=blocked'; else cat2 = 'class=bga';
	if (type==3) cat3 = 'class=blocked'; else cat3 = 'class=bga';
	if (type==4) cat4 = 'class=blocked'; else cat4 = 'class=bga';
	var s1,s2;
	var TEXT = '';
	if (sort_apps) { s2 = ' class=bga'; s1 = ' class=blocked'; }
	else { s1 = ' class=bga'; s2 = ' class=blocked'; }
	var sort_lvl = '<td style="width:50%;text-align:center;"><a style="width:75%" href=main.php?cat='+type+'&filter_apps=1 '+s1+'>Ваш уровень</a></td>';
	sort_lvl += '<td style="width:50%;text-align:center;"><a style="width:75%" href=main.php?cat=' + type + '&filter_apps=2 ' + s2 + '>Все уровни</a></td>';
	
	
	dw (`<table border="1" width="1200" cellspacing="0" cellpadding="0" style="margin:25px auto;">
	<tr><td style="width:25%;">
	Персонаж: <b>${your_nick}</b> [ <b>${your_lvl}</b> ] <div style="display:flex;"><div style="margin:0 3px;" class="hp"> Уровень жизни:</div> `
	);	
	show_all_hp(hp, mhp);
	dw('</div><div style="display:flex;"><div style="margin:0 3px;" class="ma">Уровень энергии: </div> ');
	show_all_ma(ma, mma);	
	dw('</div></td>');
	dw(`<td style="width:50%;text-align:center;"><h3>Арена</h3></td>
	<td style="width:25%"></td>
	</tr></table>
	`);
	dw ('<table border="1" width="1200" cellspacing="0" cellpadding="0" style="margin:25px auto;" class="greyBlock">');
	dw('<tr>');
	var imgtmp = '';
	if (HELP == 3) imgtmp = '';
	dw('<td align="center" width="25%"><a href="main.php?cat=1&&filter_apps=2" '+cat1+'>Физические</a></td>');
	dw('<td align="center" width="25%"><a href="main.php?cat=2&&filter_apps=2" '+cat2+'>Групповые</a></td>');
	dw('<td align="center" width="25%"><a href="main.php?cat=3&&filter_apps=2" '+cat3+'>Хаотические</a></td>');
	if(testing)dw('<td align="center" width="25%"><a href="main.php?cat=4" '+cat4+'>Тестирование</a></td>');
	dw('</tr></table>');

	//dw ('<table border="1" width="1200" cellspacing="0" cellpadding="0" style="margin:25px auto;background:#f5f5f5;padding:5px;">');
	//dw(`<tr>
	//<td colspan="2"><h4>Заявки на поединки</h4></td>
	//</tr>
	//<tr style="text-align:center;">
	//${sort_lvl}
	//</tr>
	//</table>
	//`);

	
	document.getElementById('_top').innerHTML = TEXT;
	dw('<table border="1" width="1200" cellspacing="0" cellpadding="0" style="margin:0 auto;" class="greyBlock">');
	dw('<tr><td width="10" valign="top" style="display:none;">');
	show_only_hp(hp, mhp);
	dw('</td><td width=100% align=center style="border: 0px" valign="top">');		
	dw('<table border="1" width="100%" cellspacing="0" cellpadding="0"> <tr> <td align=center valign=center id=apps_m></td> </tr> <tr> <td align=center height=40 valign=center>' + sbox2('<center id=app>&nbsp;</center>') + '</td> </tr> </table>');
	dw('</td><td width="10" valign="top" style="display:none;">');
	show_only_ma(ma, mma);
	dw('</td></tr>');
	dw('</table>');
}

var oruj = 0;
var travm=10;
var timeout=120;
var bplace = '';

function do_app_1(is_can)
{
var tip = '';
 tip = '<div class="greenBlock"><center><i>+50% опыта за подачу заявки.</i></center></div>';
if (your_lvl>9) bplace = '<select name=bplace style="display:none;"><option value="0">Классический</option><option value=1 SELECTED>Тактический: Поле зелени</option><option value=5>Тактический: Вода</option> <option value=3>Тактический: Пустыня</option></select>';
if (orujd==1) oruj=1;
	dfm('' + sbox2(`<div class="whiteBlock margin-5">
		<form method="POST" action="main.php?cat=1" name="apps">
		<b>Подать заявку:</b><hr>

		<table border="0" width="100%" cellspacing="5" cellpadding="5"> 
		<tr style="background:#f5f5f5;"> 			
			<td width="25%" align="center">Травматичность: ${bplace}
			<!--img border="0" src="images/icons/battle/10.gif" width="17"  name=travm--> 
			<b name="travm">${travm}</b>%
			</td>
			<td width="25%" align="center">
			Тип поединка: <b name="oruj">с оружием</b>
			<!--img border="0" src="images/arena/zayor_${oruj}.gif" width="17"  name=oruj-->
			</td> 
			<td width="25%" align="center">Тайм-аут: <a href="#" id=timeout onclick="change_timeout();">&nbsp;2&nbsp;</a> мин.</td> 
			<td width="25%" align="center"><input type="hidden" name="travm" value="10"><input type="hidden" name="oruj" value="${oruj}"><input type=hidden name="timeout" value="120"><input type="submit" value="Подать заявку" class="inv_but">
			</td>
		</tr>
		</table>${tip}</form></div>`)+' ');
//document.images['oruj'].onclick = change_oruj;
//document.images['travm'].onclick = change_travm;
//if(your_lvl<5) {change_travm();change_travm();change_travm();}
}

function do_app_2(is_can)
{
if (your_lvl>9) bplace = '<select name=bplace style="display:none;"><option value="0">Классический</option><option value=1 SELECTED>Тактический: Поле зелени</option><option value=5>Тактический: Вода</option> <option value=3>Тактический: Пустыня</option></select>';
if (orujd==1) oruj=1;
var minlvl1,minlvl2,maxlvl1,maxlvl2;
your_lvl = parseInt(your_lvl);
for (var i=0;i<=(your_lvl+8);i++)
if (i>-1)
{
	if (i!=your_lvl) minlvl1 += '<option value='+i+'>'+i+'</option>';
	else minlvl1 += '<option value='+i+' SELECTED>'+i+'</option>';
}
minlvl2 = minlvl1;
maxlvl1 = minlvl1;
maxlvl2 = minlvl1;

dfm(`<div class="whiteBlock margin-5">
<form name="apps" method="post" action="main.php?cat=2"> 
<table border="0" width="100%" cellspacing="5" cellpadding="5">
<tr><td colspan="3"><b>Подать свою заявку:</b><hr></td></tr> 
<tr><td width="40%">
<table border="0" width="100%" cellspacing="5" cellpadding="5"> 
<tr><td><b>Команда 1:</b></td>
<td>Кол-во: <input type="text" name="count1" size="5"  value="1"> , уровни <select size="1" name="minlvl1" > ${minlvl1} </select>-<select size="1" name="maxlvl1" >${maxlvl1}</select></td> </tr> 
<tr><td><b>Команда 2:</b></td><td> Кол-во: <input type="text" name="count2" size="5"  value="1"> , уровни <select size="1" name="minlvl2" >${minlvl2}</select>-<select size="1" name="maxlvl2">${maxlvl2}</select></td> </tr> </table> 
</td> 
<td width="30%"> 
<table style="CURSOR: pointer" cellSpacing="0" cellPadding="0" width="100%" border="0" style="border:1px solid #ccc;"> 
<tr><td width="10%"><img ${mouser("Для изменения Травмотичности, нажмите на картинку")} src="images/icons/battle/${travm}.gif" border="0" name="travm"></td> 
<td width="10%"><img ${mouser("Для изменения Типа поединка, нажмите на картинку")} src="images/icons/battle/${oruj}.png" name="oruj"></td> 
<td class="user" id="timeout" width="10%"><a href="#" ${mouser("Для изменения время Тайм-аута, нажмите на цифру")}>2</a></td> 
<td align="left" width="70%"> <input type="hidden" value="10" name="travm"> <input type="hidden" value="0" name="oruj"> <input type="hidden" value="120" name="timeout"> <input size="20" value="описание" name="comment" style="text-align: center"><br>${bplace}</td> </tr> 
</table></td> 
<td align="center" width="30%">
<select size="1" name="atime" > <option selected>Ожидание</option> <option value="120">2 мин</option> <option value="300">5 мин</option> <option value="600">10 мин</option> <option value="1200">20 мин</option> <option value="2400">40 мин</option> </select> | <input type="submit" value="Подать" class="inv_but"></td> 
</tr></table></form></div>`);
document.images['oruj'].onclick = change_oruj;
document.images['travm'].onclick = change_travm;
document.apps.comment.onclick = clear_comment;
$('timeout').onclick = change_timeout;
}

function do_app_3(is_can)
{
if (your_lvl>9) bplace = '<select name=bplace style="display:none;"><option value="0">Классический</option><option value=1 SELECTED>Тактический: Поле зелени</option><option value=5>Тактический: Вода</option> <option value=3>Тактический: Пустыня</option></select>';
if (orujd==1) oruj=1;
var minlvl1,maxlvl1;
your_lvl = parseInt(your_lvl);
for (var i=0;i<=(your_lvl+8);i++)
if (i>-1)
{
	if (i!=your_lvl) minlvl1 += '<option value='+i+'>'+i+'</option>';
	else minlvl1 += '<option value='+i+' SELECTED>'+i+'</option>';
}
maxlvl1 = minlvl1;

dfm(`<div class="whiteBlock margin-5">
<form name="apps" method="post" action="main.php?cat=3"> 

<table border="0" width="100%" cellspacing="5" cellpadding="5"> 
<tr> 
<td><b>Подать свою заявку:</b><hr></td> 
</tr>
</table>

<table border="0" width="100%" cellspacing="5" cellpadding="5"> 
<tbody>
	<tr style="background:#f5f5f5;"> 			
		<td width="28%" align="center">Участники:</td>
		<td width="13%" align="center"><img src="images/icons/battle/${travm}.gif" border="0"> Травматичность:</td>
		<td width="13%" align="center"><img src="images/icons/battle/${oruj}.png"  border="0"> Тип поединка:</td> 
		<td width="13%" align="center"><img src="images/icons/battle/clock.gif" width="16"> Тайм-аут:</td> 
		<td width="10%" align="center">Начало боя</td>
		<td width="10%" align="center">Действие</td>
	</tr>
</tbody>
</table>
<table border="0" width="100%" cellspacing="5" cellpadding="5"> 
<tr>
<td width="28%" align="center"> 
Кол-во: <input type="text" name="count1" size="3"  value="2"> , уровни от
<select size="1" name="minlvl1" > ${minlvl1} </select> до 
<select size="1" name="maxlvl1" >${maxlvl1}</select>
</td> 
<!--td width="17"><img  src="images/icons/battle/${travm}.gif" border="0" name="travm"></!--td-->
<td width="13%" align="center">Травматичность: <a href="#" id="travm" name="travm">10</a>%</td>
<td width="13%" align="center"><a href="#" id="oruj" name="oruj">с оружием</a> <div style="display:none;">${oruj}</div></td> 
<td width="13%" align="center">Тайм-аут: <a href="#" id="timeout">2</a> мин.</td> 
<td width="10%" align="center">
<select size="1" name="atime"> 
<option selected>Ожидание</option> 
<option value="120">2 мин</option> 
<option value="300">5 мин</option> 
<option value="600">10 мин</option> 
<option value="1200">20 мин</option> 
<option value="2400">40 мин</option> 
</select>
</td>
<td align="center" width="10%">
<input type="hidden" value="10" name="travm"> 
<input type="hidden" value="0" name="oruj">
<input type="hidden" value="120" name="timeout">
<input class="inv" size="20" value="описание" name="comment" style="text-align: center;display:none;">
${bplace}<input type="submit" value="Подать заявку" class="inv_but"></td></tr></table>
</form></div>`);
//document.images['oruj'].onclick = change_oruj;
$('oruj').onclick = change_oruj;
$('travm').onclick = change_travm;
//document.images['travm'].onclick = change_travm;
document.apps.comment.onclick = clear_comment;
$('timeout').onclick = change_timeout;
}

function change_oruj()
{
	if (orujd==0)
	{
		oruj++;
		oruj%=2;
		//document.images['oruj'].src = 'images/icons/battle/'+oruj+'.png';
		//document.apps.oruj.value = oruj;
		$('oruj').innerHTML = ''+oruj+'';
		document.apps.oruj.value = oruj;
	}
}

function change_travm()
{
		if (travm==10) travm=30;
		else if (travm==30) travm=50;
		else if (travm==50) travm=80;
		else if (travm == 80) travm = 10;	
		$('travm').innerHTML = ''+travm+'';
		document.apps.travm.value = travm;
		/*
		document.images['travm'].src = 'images/icons/battle/'+travm+'.gif';
		document.apps.travm.value = travm;
		*/
}

function change_timeout()
{
		if (timeout==120) timeout=180;
		else if (timeout==180) timeout=240;
		else if (timeout==240) timeout=300;
		else if (timeout==300) timeout=120;
		$('timeout').innerHTML = ''+timeout/60+'';
		document.apps.timeout.value = timeout;
}

function clear_comment()
{
	document.apps.comment.value = '';
}

function show_apps_1()
{
	if(lb_attack!=0) da("Вы сможете начать бой с существом через "+lb_attack+" сек.");
	
	df("<p style='text-align:left;'><b>Список заявок:</b></p><hr>");
	if (!apps.length) 
	{
		dam('<div class="redBlock margin-5">Здесь нет ни одной заявки на поединок.</div>');
		return false;
	}
	var w,ds,p1,p2,pt1,pt2,ptm,sign,nick,info,maintxt,radio,txt,bplace;
	pt1 = '';
	pt2 = '';
	sign = '';
	info = '';
	nick = '';
	maintxt = '';
	radio = '';
	txt='';
	for (i=0;i<apps.length;i++)
	{
		w = apps[i].split(':');
		ds = str_replace(' ','&nbsp;',w[10]);
		p1 = w[11].split('•');
		p2 = w[12].split('•');
		bplace = '';
		if (w[14]==1) bplace = 'Поле зелени';
		else if (w[14]==3) bplace = 'Пустыня';
		else if (w[14]==5) bplace = 'Вода';
		pt1 = '';
		pt2 = '';
		for (j=0;j<p1.length;j++)
		{
				ptm = p1[j].split('|');
				sign = ptm[0];
				if (sign!='none' && sign) sign = '<img src="images/signs/'+sign+'.gif" width=15 height=12 title="'+ptm[3]+'">'; else sign = '';
				if (ptm[2]!='??') info = info_icon(ptm[1])+' '; else info = '';
				if (w[13]<0) info = binfo_icon(w[13])+' ';
				nick = ptm[1];
				if (nick==your_nick) nick=' '+nick+' ';
				else nick=' '+nick+' ';
				nick = '<b>'+nick+'</b> [ '+ptm[2]+' ]';
				pt1 += sign+nick+info;
		}
		for (j=0;j<p2.length && p2[j];j++)
		{
				ptm = p2[j].split('|');
				sign = ptm[0];
				if (sign!='none' && sign) sign = '<img src="images/signs/'+sign+'.gif" width=15'+
				' height=12 title="'+ptm[3]+'">'; else sign = '';
				if (ptm[2]!='??') info = info_icon(ptm[1])+' '; else info = '';
				nick = ptm[1];
				if (nick==your_nick) nick=' '+nick+' ';
				else nick=' '+nick+' ';
				nick = '<b>'+nick+'</b> [ '+ptm[2]+' ]';
				pt2 += sign+nick+info;
		}
		radio = '<a href=main.php?cat=1&ar_loc=2&id='+w[13]+' class=bga>ПРИНЯТЬ</a>';
		if (!((orujd==0 || orujd==w[1]) && can_join)) radio = '<a class=bga>принять</a>';
		if (pt2=='') pt2 = '<b>нет соперника</b>';
		maintxt = pt1 + ' </td><td width="7%" align="center"><i>против</i></td><td width="40%" align="center"> ' + pt2;
		txt += `
		<tr style="background:#f5f5f5;"> 
		<td width="25" align="center"><img src="images/icons/battle/${w[1]}.png"></td>
		<td width="25" align="center">${w[2] / 60}</td>
		<td width="25" align="center">${w[0]}%</td>
		<td width="40%" align="center">
		<i class=timef>${bplace}</i> <small>${ds}</small>  ${maintxt} </td>
		<td width="25%" class=but>${radio}</td> 
		</tr>`;
	}
	
	df(`<table border="0" width="100%" cellspacing="5" cellpadding="5" style="border:1px solid #ccc;" >
	<tr style="background:#e2e0e0;"><td width="25" align="center"><b ${mouser("Тип поединка")} style="cursor:help;">#</b></td>
	<td width="25" align="center"><img src='images/icons/battle/clock.gif' width='16' ${mouser("Таймер, мин.")} style="cursor:help;"></td>
	<td width="25" align="center"><img src='images/icons/battle/light.png' ${mouser("Вероятность получить травму")} style="cursor:help;"></td>
	<td width="85%" align="center" colspan="3"></td>	
	<td width="25%" align="center">Действие</td>
	</tr>
	${txt}
	</table>`);
}

function show_apps_2()
{
df("<b>Заявки на групповой бой:</b><br>");
if (!apps.length) 
{
	dam('<div class="redBlock margin-5">Здесь нет ни одной заявки на поединок.</div>');
	return false;
}
	var w,ds,p1,p2,pt1,pt2,ptm,sign,nick,info,maintxt,radio1,radio2,txt,IN1=0,IN2=0,bplace;
	pt1 = '';
	pt2 = '';
	sign = '';
	info = '';
	nick = '';
	maintxt = '';
	radio = '';
	txt='';
	for (i=0;i<apps.length;i++)
	{
		w = apps[i].split(':');
		ds = str_replace(' ','&nbsp;',w[10]).substr(0,20);
		p1 = w[11].split('•');
		p2 = w[12].split('•');
		bplace = '';
		if (w[14]==1) bplace = 'Поле зелени';
		else if (w[14]==3) bplace = 'Пустыня';
		else if (w[14]==5) bplace = 'Вода';
		pt1 = '';
		pt2 = '';
		for (j=0;j<p1.length;j++)
			{
				IN1++;
				ptm = p1[j].split('|');
				sign = ptm[0];
				if (sign!='none' && sign) sign = '<img src="images/signs/'+sign+'.gif" width=15'+
				' height=12 title="'+ptm[3]+'">'; else sign = '';
				if (ptm[2]!='??') info = info_icon(ptm[1])+' '; else info = '';
				nick = ptm[1];
				if (nick==your_nick) nick='<font color=#994444 >'+nick+'</font>';
				else nick=' '+nick+' ';
				nick = '<b>'+nick+'</b> [ '+ptm[2]+' ]';
				pt1 += sign+nick+info+',';
			}
		for (j=0;j<p2.length && p2[j];j++)
			{
				IN2++;
				ptm = p2[j].split('|');
				sign = ptm[0];
				if (sign!='none' && sign) sign = '<img src="images/signs/'+sign+'.gif" width=15'+
				' height=12 title="'+ptm[3]+'">'; else sign = '';
				if (ptm[2]!='??') info = info_icon(ptm[1])+' '; else info = '';
				nick = ptm[1];
				if (nick==your_nick) nick='<font color=#994444 >'+nick+'</font>';
				else nick='<font  color=#444499 >'+nick+'</font>';
				nick = '<b>'+nick+'</b>[<font class=lvl>'+ptm[2]+'</font>]';
				pt2 += sign+nick+info+',';
			}
		pt1 = pt1.substr(0,pt1.length-1);
		pt2 = pt2.substr(0,pt2.length-1);
		radio1 = '<a href=main.php?cat=2&ar_loc=2&id='+w[13]+'&fteam=1 class=bga>принять</a>';
		radio2 = '<a href=main.php?cat=2&ar_loc=2&id='+w[13]+'&fteam=2 class=bga>принять</a>';
		if (!((orujd==0 || orujd==w[1]) && can_join)) 
			{
				radio1 = '<b>принять</b>';
				radio2 = '<b>принять</b>';
			}
		if (your_lvl<w[5] || your_lvl>w[7] || IN1>=w[3]) radio1 = '<b>принять</b>';
		if (your_lvl<w[6] || your_lvl>w[8] || IN2>=w[4]) radio2 = '<b>принять</b>';
		if (pt2=='') pt2 = '<b>нет соперника</b>';
		maintxt = pt1+' против '+pt2;
		if (w[9]>60) w[9] = w[9]+'cек'; else w[9] = 'Меньше минуты';
		txt += '<tr> <td width="10%"> '+radio1+' </td><td style="display:none;"> '+bplace+' </td><td width="5%"><img src="images/icons/battle/'+w[0]+'.gif"></td> <td width="5%"> <img border="0" src="images/icons/battle/'+w[1]+'.gif"></td> <td width="5%">'+(w[2]/60)+'</td> <td width="20" style="display:none;">'+ds+'</td> <td width="60"><b>'+w[3]+'</b>['+w[5]+'-'+w[7]+']</td> <td align="center" > '+maintxt+' 1</td>  <td width="60" ><b>'+w[4]+'</b>['+w[6]+'-'+w[8]+']</td> <td align="center" > '+w[9]+' </td>  <td width="17">'+radio2+'</td></tr>';
	}
	df(`<table border="0" width="100%" cellspacing="5" cellpadding="5">
	<tr>
	<td width="10%">Команда №1</td>
	<td width="5%" align="center"><img src='images/icons/battle/light.png' ${mouser("Вероятность получить травму")} style="cursor:help;"></td>
	<td width="5%" align="center"><b ${mouser("Тип поединка")} style="cursor:help;">#</b></td>
	<td width="5%" align="center"><img src='images/icons/battle/clock.gif' width='16' ${mouser("Таймер, мин.")} style="cursor:help;"></td>
	<td>6</td><td>7</td><td>8</td><td>9</td><td width="10%">Команда №2</td>
	</tr>
	${txt}
	</table>`);
}

function show_apps_3()
{
df("<b>Заявки на хаотический бой:</b><br>");
if (!apps.length) 
{
	dam('<div class="redBlock margin-5">Здесь нет ни одной заявки на поединок. Пока...</div>');
	return false;
}
	var w,ds,p1,pt1,ptm,sign,nick,info,maintxt,radio1,txt,IN1=0,bplace;
	pt1 = '';
	pt2 = '';
	sign = '';
	info = '';
	nick = '';
	maintxt = '';
	radio = '';
	txt='';
	for (i=0;i<apps.length;i++)
	{
		w = apps[i].split(':');
		ds = str_replace(' ','&nbsp;',w[10]).substr(0,20);
		p1 = w[11].split('•');
		bplace = '';
		if (w[14]==1) bplace = 'Поле зелени';
		else if (w[14]==3) bplace = 'Пустыня';
		else if (w[14]==5) bplace = 'Вода';
		pt1 = '';
		for (j=0;j<p1.length;j++)
			{
				IN1++;
				ptm = p1[j].split('|');
				sign = ptm[0];
				if (sign!='none' && sign) sign = '<img src="images/signs/'+sign+'.gif" width=15'+
				' height=12 title="'+ptm[3]+'">'; else sign = '';
				if (ptm[2]!='??') info = info_icon(ptm[1])+' '; else info = '';
				nick = ptm[1];
				if (nick==your_nick) nick='<font color=#994444 >'+nick+'</font>';
				else nick=' '+nick+'';
				nick = '<b>'+nick+'</b> [ '+ptm[2]+' ]';
				pt1 += sign+nick+info+',';
			}
		pt1 = pt1.substr(0,pt1.length-1);
		radio1 = '<a href=main.php?cat=3&ar_loc=2&id='+w[13]+' class=bga>принять</a>';
		if (!((orujd==0 || orujd==w[1]) && can_join))	radio1 = '<b>принять</b>';
		if (your_lvl<w[5] || your_lvl>w[7] || IN1>=w[3]) radio1 = '<b>принять</b>';
		maintxt = pt1;
		if (w[9]>60) w[9] = w[9]+'cек'; else w[9] = 'Меньше минуты';
		//txt += '< tr > <td width="17">(222)'+radio1+'</td><td>'+bplace+'</td><td width="17"> <img border="0" src="images/icons/battle/'+w[0]+'.gif" ></td> <td width="17"> <img border="0" src="images/icons/battle/'+w[1]+'.gif" ></td> <td width="10" class="user">'+(w[2]/60)+'</td> <td width="20" class="time">'+ds+'</td> <td width="60" ><b>'+w[3]+'</b>['+w[5]+'-'+w[7]+']</td> <td align="center" > '+maintxt+' </td> <td align="center"  width=50> '+w[9]+' </td></>';
		txt=`
<tr style="background:#e2e0e0;">
    <td width="5%" align="center"><b onmousemove="TipShow('Тип поединка', event);" onmouseout="TipHide();" style="cursor:help;">#</b></td>
	<td width="5%" align="center"><img src="images/icons/battle/clock.gif" width="16" onmousemove="TipShow('Таймер, мин.', event);" onmouseout="TipHide();" style="cursor:help;"></td>
	<td width="5%" align="center"><img src="images/icons/battle/light.png" onmousemove="TipShow('Вероятность получить травму', event);" onmouseout="TipHide();" style="cursor:help;"></td>
	<td width="70%" align="center"></td>	
	<td width="15%" align="center">Действие</td>
</tr>
<tr>
	<td style="display:none;">${bplace}</td>	
	<td width="5%" align="center"><img border="0" src="images/icons/battle/${w[1]}.png"></td>
	<td width="5%" align="center">${(w[2]/60)}</td> 
	<td width="5%" align="center"><b>${w[0]}</b>%</td> 	
	<td width="70%">Количество участников: <b>${w[3]}</b> чел. | Уровень: от <b>${w[5]}</b> до <b>${w[7]}</b> | Бой начнется через: <b>${w[9]}</b></td>
    <td align="center" width="15%">${radio1}</td>
</tr>
		`;
	}
	df('<table border="0" width="100%" cellspacing="5" cellpadding="5"  class="whiteBlock margin-5">'+txt+'</table>');
}

function info_icon(nick)
{
	return ' <img src="images/icons/inf.gif" onclick="window.open(\'info.php?p='+nick+'\',\'\',\'width=800,height=600,left=10,top=10,toolbar=no,scrollbars=yes,resizable=yes,status=no\');" style="cursor:pointer">';
}

function binfo_icon(nick)
{
	return ' <img src="images/icons/inf.gif" onclick="window.open(\'binfo.php?'+Math.abs(nick)+'\',\'\',\'width=800,height=600,left=10,top=10,toolbar=no,scrollbars=yes,resizable=yes,status=no\');" style="cursor:pointer">';
}

function show_apps_4()
{
	df('Тестирование это специальный временный модуль, позволяющий администрации настроить баланс в игре.<br>Опыт и вещи за тестовые бои с ботами не получаются. Спасибо за желание помочь проекту!');
	df(text);
}
