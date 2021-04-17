
var GlobalSupport = false;
if (REF_COMP==undefined) var REF_COMP = false;

function build_pers(sh,shd,oj,ojd,or1,or1d,po,pod,z1,z1d,z2,z2d,z3,z3d,sa,sad,na,nad,pe,ped,or2,or2d,braslet1,braslet1d,braslet2,braslet2d,br,brd,pers,inv,sign,nick,level,hp,mhp,ma,mma,tire,kam1,kam2,kam1d,kam2d,curh,maxh,curm,maxm,hp_int,ma_int,ss,sl,su,szd,szn,sp,sup,MONEY,dmoney,KB,gray1,gray2,gray3,gray4,gray5,udmin,udmax,rank_i,calling,victories,losses,experience,peace_experience,exp_to_lvl,zeroing,inv,dil,exp_proc,ws1,ws2,ws3,ws4,ws5,ws6,free_skills,help,ref,coins,lo,lod,zub,sss,imoney,kolco1,kolco1d,kolco2,kolco2d,kolco3,kolco3d,kolco4,kolco4d,kolco5,kolco5d,kolco6,kolco6d)
{
	var d=document;
	var ss1=ss;
	var sl1=sl;
	var su1=su;
	var szd1=szd;
	var szn1=szn;
	var sp1=sp;
	var ExpText = '';

	if (parseInt(ss)<1) ss=1;
	if (parseInt(sl)<1) sl=1;
	if (parseInt(su)<1) su=1;
	if (parseInt(szd)<1) szd=1;
	if (parseInt(szn)<1) szn=1;
	if (parseInt(sp)<1) sp=1;
	if (ws1!='0' && ws1!=undefined)ss='<b class=user>'+ss+'</b>'+' ('+(ss-ws1)+'<font color=green>'+ws1+'</font>)';else ss='<b class=user>'+ss+'</b>';
	if (ws2!='0' && ws2!=undefined)sl='<b class=user>'+sl+'</b>'+' ('+(sl-ws2)+'<font color=green>'+ws2+'</font>)';else sl='<b class=user>'+sl+'</b>';
	if (ws3!='0' && ws3!=undefined)su='<b class=user>'+su+'</b>'+' ('+(su-ws3)+'<font color=green>'+ws3+'</font>)';else su='<b class=user>'+su+'</b>';
	if (ws4!='0' && ws4!=undefined)szd='<b class=user>'+szd+'</b>'+' ('+(szd-ws4)+'<font color=green>'+ws4+'</font>)';else szd='<b class=user>'+szd+'</b>';
	if (ws5!='0' && ws5!=undefined)szn='<b class=user>'+szn+'</b>'+' ('+(szn-ws5)+'<font color=green>'+ws5+'</font>)';else szn='<b class=user>'+szn+'</b>';
	if (ws6!='0' && ws6!=undefined)sp='<b class=user>'+sp+'</b>'+' ('+(sp-ws6)+'<font color=green>'+ws6+'</font>)';else sp='<b class=user>'+sp+'</b>';
	
	d.write('<table border="1" width="100%" cellspacing="0" cellpadding="0" class=inv><tr>');
	var givem = 'javascript:peredatm()';
	if (level<5) givem = 'javascript:void(0)';
	if (MONEY) MONEY='Золотые монеты: <a href="'+givem+'" onmouseover="s_des(event,\'|Количество ваших Золотых монет , это игровая валюта. Для перевода другому игроку, нажмите на колличество зм.\')" onmouseout="h_des()" onmousemove="move_alt(event)" style="border-bottom:1px dashed #ccc;cursor:help;">'+MONEY+'</a> зм.'; else MONEY='Золотые монеты: <a href="'+givem+'">'+MONEY+' </a> зм.';

	var MoneyText = '<table cellspacing="0" cellspadding="0" width="100%" class="greyBlock margin-5"><tr> <td><b>Деньги</b></td> </tr> <tr> <td>'+MONEY+'</td> </tr>';
	if (imoney>0) MoneyText += '<tr> <td width=100%>Слитки золота: <b onmouseover="s_des(event,\'|Количество ваших Золотых слитков , получить их можно в Подземелье Драконов.\')" onmouseout="h_des()" onmousemove="move_alt(event)" style="border-bottom:1px dashed #ccc;cursor:help;">'+imoney+'</b> сз.</td> </tr>';
	if (dmoney>0) MoneyText += '<tr> <td width=100%>Слитки Платины: <a href=main.php?go=pers&gopers=service title="Слитки Платины">' + dmoney + '</a> сп.</td> </tr>';
	if (coins>0) MoneyText += ' <tr> <td width=100%>Пергаменты: <b onmouseover="s_des(event,\'|Количество ваших пергаментов , полученных за проведение отличных боёв. Они могут вам понадобиться в университете.\')" onmouseout="h_des()" onmousemove="move_alt(event)" style="border-bottom:1px dashed #ccc;cursor:help;">'+coins+'</b> пр.</td></tr>';
	//if (zub>0) MoneyText += ' <tr> <td width=100%>'+zub+' <img src=/images/gameplay/1_3.png height=12 title="Количество ваших пергаментов , полученных за проведение отличных боёв. Они могут вам понадобиться в университете."></td> </tr>';
	
	MoneyText += '</table>';

	d.write('<td valign="top" width=250 align=center class=inv>');
	show_pers_new(sh,shd,oj,ojd,or1,or1d,po,pod,z1,z1d,z2,z2d,z3,z3d,sa,sad,na,nad,pe,ped,or2,or2d,braslet1,braslet1d,braslet2,braslet2d,br,brd,pers,inv,sign,nick,level,hp,mhp,ma,mma,tire,kam1,kam2,kam1d,kam2d,inv,dil,lo,lod,kolco1,kolco1d,kolco2,kolco2d,kolco3,kolco3d,kolco4,kolco4d,kolco5,kolco5d,kolco6,kolco6d);
	d.write('<div id=aurasc class=aurasc></div></td>');
	d.write('<td valign="top" width="280" class=inv>');
	//d.write(sbox2b());
	//d.write(''+MONEY+'');

	var TIP_s1 = 'onmouseover="s_des(event,\'|<b>Сила</b> влияет на урон, наносимый при физическом контакте в бою.\')" onmouseout="h_des()" onmousemove=move_alt(event)';
	var TIP_s2 = 'onmouseover="s_des(event,\'|<b>Ловкость</b> влияет на шанс увернуться в бою от ударов противника, а так же уменьшает шанс противнику на уворот.\')" onmouseout="h_des()" onmousemove=move_alt(event)';
	var TIP_s3 = 'onmouseover="s_des(event,\'|<b>Удача</b> влияет на шанс нанести сокрушительный удар в бою.\')" onmouseout="h_des()" onmousemove=move_alt(event)';
	var TIP_s4 = 'onmouseover="s_des(event,\'|<b>Выносливость</b> повышает вашу жизнь, броню и влияет на массу, которую может носить ваш персонаж.\')" onmouseout="h_des()" onmousemove=move_alt(event)';
	var TIP_s5 = 'onmouseover="s_des(event,\'|<b>Разум</b> позволяет осваивать мирные профессии. Разум не влияет в бою.\')" onmouseout="h_des()" onmousemove=move_alt(event)';
	var TIP_s6 = 'onmouseover="s_des(event,\'|<b>Энергия</b> воли повышает количество энергии и увеличивает урон ваших заклинаний.\')" onmouseout="h_des()" onmousemove=move_alt(event)';
	var TIP_s7 = 'onmouseover="s_des(event,\'|Понижение физического урона '+DecreaseDamage+'%\')" onmouseout="h_des()" onmousemove=move_alt(event)';

	
	
	d.write('<table border="0" width="100%" cellspacing="5" cellspadding="5" class="greyBlock margin-5">');
	d.write('<tr> ');
	d.write('<td width="100%" colspan="2"><b>Характеристики</b></td> ');	
	d.write('</tr> ');
	d.write('<tr> ');
	d.write('<td width="60%" class="stats"><font '+TIP_s1+' style="border-bottom:1px dashed #ccc;cursor:help;">Сила:</font></td> ');
	d.write('<td ><div id=sila>'+ss+'</div></td> ');
	d.write('</tr> ');
	d.write('<tr> ');
	d.write('<td width="60%" class="stats"><font '+TIP_s2+' style="border-bottom:1px dashed #ccc;cursor:help;">Ловкость:</font></td> ');
	d.write('<td ><div id=lovk>'+sl+'</div></td> ');
	d.write('</tr>');
	d.write('<tr> ');
	d.write('<td width="60%" class="stats"><font '+TIP_s3+' style="border-bottom:1px dashed #ccc;cursor:help;">Удача:</font></td> ');
	d.write('<td ><div id=udacha>'+su+'</div></td> ');
	d.write('</tr> ');
	d.write('<tr>'); 
	d.write('<td width="60%" class="stats"><font '+TIP_s4+' style="border-bottom:1px dashed #ccc;cursor:help;">Выносливость:</font></td> ');
	d.write('<td ><div id=zdorov>'+szd+'</div></td>'); 
	d.write('</tr>');
	d.write('<tr>');
	d.write('<td width="60%" class="stats"><font '+TIP_s5+' style="border-bottom:1px dashed #ccc;cursor:help;">Разум:</font></td> ');
	d.write('<td ><div id=znanya>'+szn+'</div></td> ');
	d.write('</tr> ');
	d.write('<tr> ');
	d.write('<td width="60%" class="stats"><font '+TIP_s6+' style="border-bottom:1px dashed #ccc;cursor:help;">Энергия:</font></td> ');
	d.write('<td ><div id=power>'+sp+'</div></td>'); 
	d.write('</tr> ');
	d.write('<tr> ');
	d.write('<td colspan="2" align="center"><div id="ups" class="timef"></div></td>');
	d.write('</tr>');
	d.write('<tr> ');
	d.write('<td colspan="2" align="center">');	
	
	if (inv!=2 && sup>0)start(ss1,sl1,su1,szd1,szn1,sp1,sup,level);
	if (sup > 0 && inv != 2) d.write('<div id=SAVEstats align=center><a onclick="save()" class="bga" href="javascript:void(0)">Сохранить</a></div>');
	d.write('</td>');
	d.write('</tr>');

	if(inv==1)
	{
	d.write('<tr> ');
	d.write('<td colspan="2">');	
	if (DecreaseDamage) KB += ' [<span '+TIP_s7+' style="border-bottom:1px dashed #ccc;cursor:help;"><b>'+DecreaseDamage+'</b>%</span>]';
	d.write('<hr>');	
	if (udmax>2) d.write("Мин. урон: <b>"+udmin+"</b><br>Макс. урон: <b>"+udmax+"</b><hr>");	
	if (gray1!=0) d.write("Крит. удара: <b>"+gray1+"</b>%<br>");
	if (gray4!=0) d.write("Анти крит. удара: <b>"+gray4+"</b>%<br>");		
	if (gray2!=0) d.write("Уворота: <b>"+gray2+"</b>%<br>");
	if (gray3!=0) d.write("Анти уворота: <b>"+gray3+"</b>%<br>");
	d.write("<hr>Броня: "+KB+"<br>");
	if (gray5!=0) d.write("Пробой брони: <b>"+gray5+"</b>%<br>");
	if (rank_i > 15) d.write("Мощь персонажа:</font> <b>" + rank_i + "</b><br>");
	d.write('</td>');
	d.write('</tr>');
	
	//if (calling!="")d.write("<tr><td><font >Звание:</font></td><td align=center >"+calling+"</td></tr>");
		
	
	}	
	d.write('</table>');
	//d.write("</fieldset>");	
	if (exp_proc>100) exp_proc=100;
		//ExpText += ("<center class=but><font class=ma>Линия Опыта  ["+exp_proc+"%]</font></center>");
		exp = exp_proc;
		if (exp<0) exp=0;
		//ExpText +=('<center class=but><table border="0" width="90%" cellspacing="0" cellpadding="0"><tr><td align=center><img src="/public_content/ypimg/ma.png" width='+(97-exp)+'% height=9><img src="/public_content/ypimg/no.png" width='+(exp-3)+'% height=9></td></tr></table></center>');
		ExpText += ('<table border="0" width="100%" cellspacing="5" cellspadding="5" class="greyBlock margin-5"><tr><td><b>Статистика</b></td></tr><tr><td>');
		ExpText += ("Уровень: <b>"+level+"</b></br> Опыт: <b>"+experience+"</b><br> До уровня: <b>"+exp_to_lvl+"</b><hr> <!--Мирный опыт: <b>"+peace_experience+"</b> --> Побед: <b>"+victories+"</b><br> Поражений: <b>"+losses+"</b>");
		ExpText += ("</td></tr></table>");
	
	d.write("<div id='exps'></div>");
	d.getElementById('exps').innerHTML = ExpText;
	
	//d.write(sbox2e());
	d.write(MoneyText);
	d.write('</td>');
	d.write('<td align="left" valign="top" class="inv" id="weapons" height=100%>');
	if(inv!=1 && inv!=2)
	{
		var helpimg = ''; if (help == 0) helpimg = '<img src="/images/warningred.gif" width=10/>';
		var lawimg = ''; if (help == 1) lawimg = '<img src="/images/warningred.gif" width=10/>';
		var warnimg = ''; if (free_skills) warnimg = '<b style="color:red;">!!!</b>';
		d.write(sbox2b() + `
		<table border=0 width=100% height=100% cellspacing=0 cellspadding=0>
		<tr><td>
		<table border=0 width=100% height=100% cellspacing=0 cellspadding=0>
		<tr>
		<td width=14% align=center><a href=# onclick=\"obnyl()\" class="bga">Обнулиться [${zeroing}]</a> </td>
		<td width=14% align=center><a href="main.php?gopers=um" class="bga">Умения [${free_skills}] ${warnimg}</a> </td>
		<td width=14% align=center><a href="main.php?gopers=self" class="bga">Личное</a></td>`);
		if(level >= 10) d.write("<td width=14% align=center> <a href='main.php?gopers=student' class='bga'> Наставник</a> </td>");
		d.write(`<td width=14% align=center><a href="main.php?gopers=options" class="bga">Настройки</a></td>
		<td width=14% align=center><a href="main.php?gopers=parol" class="bga">Пароль</a></td>	
		<!--td width=14% align=center><a href="main.php?gopers=referals" class="bga">Рефералы</a></!--td-->
		<!--td width=16% align=center><a href="main.php?gopers=vozm" class="bga">Возможности</a></!--td-->
		<td width=14% align=center> <a href="javascript:support();" class="bga">Суппорт</a></td>
		</tr></table>
		</td></tr>
		<tr><td align=center>`);
		//if (zeroing>0) d.write("| <a href=# onclick=\"obnyl()\" class=nt>Обнулиться ["+zeroing+"]</a> ");
		//d.write("| <a href=main.php?go=possibilities class=nt>Возможности</a> ");
		//if (sign!='none') d.write("| <a href=main.php?go=orden class=nt>Клан </a> ");
		//if (dil==1) d.write("| <a href=main.php?gopers=diler class=nt>Реклама </a> ");
		//if(level > 1)  d.write("| <a href=main.php?gopers=service class=nt>Сервис</a> ");
		//if (ref>0)d.write("| <a href=main.php?gopers=referals class=nt>Рефералы</a> ");
		//if(level > 9) d.write('| < href=main.php?gopers=student class=nt>Ученик</> ');
		//if (sign=='watchers') d.write('| <a href=main.php?go=zakon class=nt>Проверки</a> ');
		//d.write('| <a href=main.php?go=self class=nt>Личное</a> ');
		//d.write('| <a href=main.php?gopers=birja class=nt>Биржа БР</a> ');
		//if (REF_COMP==true) d.write('| <a href=main.php?gopers=concurs class=hp>Конкурс</a> ');
		//d.write('| <a href=main.php class=nt>Назад</a></td></tr></table>'0;
		d.write(`<div id="support" class="greyBlock margin-5">
		<table border=0 width=100% height=100% cellspacing=0 cellspadding=0> <tr>
		<td valign="top" height=100%><div style="width:100%" id=information></div></td></tr></table>`);
	}
	d.write('</td></tr></table>');
	if (inv!=1 && inv!=2) d.getElementById('information').innerHTML = ''+d.getElementById('inf_from_php').innerHTML;
	else d.getElementById('weapons').innerHTML = d.getElementById('inf_from_php').innerHTML;
	d.getElementById('inf_from_php').innerHTML = '';
	
	if (inv!=2) ins_HP(curh, maxh, curm, maxm, hp_int, ma_int);
}

function obnyl (){
	if (confirm ('Вы действительно хотите обнулиться?')) {location='main.php?gopers=obnyl';}
}
function conf(url) {
	if (confirm('Вы действительно хотите выкинуть этот предмет?')) location = url;
}
function confc(url) {
	if (confirm('Вы действительно хотите пожертвовать клану этот предмет?')) location = url;
}
function conf_sale(url) {
	if (confirm('Вы действительно хотите сдать этот предмет?')) location = url;
}

var AuraCounts = 0;
function view_auras(text,where)
{
	var ars = text.split('|');
	var ar,t;
	for(var i=0;i<ars.length;i++)
	{
	if (ars[i]!='')
	{
	ar = ars[i].split('#');
	if (ar[0].indexOf('.gif')!=-1) ar[0] = ar[0].substr(0,ar[0].length-4);
	t = '<img src="/images/weapons/'+ar[0]+'.gif" onmouseover="s_des(event,\'0|<img src=/images/weapons/'+ar[0]+'.gif align=left>'+ar[1]+'\')" onmouseout="h_des()" onmousemove="move_alt(event)">';
	AuraCounts++;
	if ((i+1)%5==0 && i!=0) t+= '<br>';
	if (where)
	 document.getElementById(where).innerHTML += t;
	else
	 document.getElementById('aurasc').innerHTML += t;
	}
	}
}

function support()
{
	var s = '';
	if (GlobalSupport==false)
	{
		s += sbox2b();
		s += '<table width="100%" cellspacing="5" cellpadding="5">';
		s+= '<tr><td>Вы можете известить Администрацию проекта о найденой ошибке, либо выдвинуть Ваше предложение относительно проекта. Ограничение по символам - 1500.</td></tr>';
		s+= '<tr><td><form method="post" align="center"><p>Заголовок <input type="text" name="title" maxlength="50" size="59"></p><p><textarea name="support" rows="7" cols=70></textarea></p><p><input type="submit" class="inv_but" value="Отправить"></p></form></td></tr>';
		s+= '<tr><td>P.S. За флуд можно получить блок ;)</td></tr>';
		s+= '</table>';
		s+= sbox2e();
		GlobalSupport = true;
	} else GlobalSupport = false;
	$('#support').html(s);
}