var d=document;
var rep_text='';
var dont_show_head = false;
d.write('<SCRIPT LANGUAGE="JavaScript" src="/js/mod/TollTips.js"></SCRIPT>');
d.write(`
<META Http-Equiv=Content-Type Content="text/html; charset=utf-8">
<META Http-Equiv=Cache-Control Content=No-Cache>
<META Http-Equiv=Pragma Content=No-Cache>
<META Http-Equiv=Expires Content=0>
<LINK href=/css/main_v2.css rel=STYLESHEET type=text/css>
<SCRIPT src="/js/mod/jquery.js"></SCRIPT>
<script language=javascript src=/js/_pers.js></script>
<script language=javascript src=/js/statsup_v2.js></script>
<body class=fightlong><form method=post name=del>
<input type=hidden value="" name=deleterep id=deleterep></form>`);

function sbox2(t,c,onl,nick)
{
	//return sbox2b(c)+t+onl+nick+sbox2e(); 
}

function sbox2b(c)
{
	//if (c) c = 'text-align:center;';
	return `<div style="display: table;width:300px;">
	<div style="display: table-row;">
	<div style="display: table-cell; background: url('/images/info/line_1.gif');background-repeat: repeat-x;width:9px;height:5px;"></div>
	<div style="display: table-cell; background: url('/images/info/line_1.gif');background-repeat: repeat-x;width:262px;height:5px;"></div>
	<div style="display: table-cell; background: url('/images/info/line_1.gif');background-repeat: repeat-x;width:9px;height:5px;"></div>
	</div>
	<div style="display: table-row;">
	<div style="display: table-cell; background: url('/images/info/ileft.gif');width:9px;height:100%;background-repeat: repeat-y;"></div>
	<div style="display: table-cell;background-color:#dab69e;width:282px;padding:10px 0;">`
}

function sbox2e()
{
return `
</div>
<div style="display: table-cell; background: url('/images/info/iright.gif');width:9px;height:100%;background-repeat: repeat-y;"></div>		
</div>
<div style="display: table-row;">
<div style="display: table-cell; background: url('/images/info/line_1.gif');background-repeat: repeat-x;width:9px;height:5px;"></div>
<div style="display: table-cell; background: url('/images/info/line_1.gif');background-repeat: repeat-x;width:262px;height:5px;"></div>
<div style="display: table-cell; background: url('/images/info/line_1.gif');background-repeat: repeat-x;width:9px;height:5px;"></div>
</div>
</div>`
}

function head(onl,nick)
{
var online = '';
var main_onl = '';
var crds = '';
var in_f = '';
if (onl[0])
{
	main_onl = '<font class=onl>Персонаж сейчас <b>в игре</b></font> <font class=timef> ['+onl[1]+'] </font>';
	online = '';
	online += 'Местоположение: <font class=user><b>'+onl[2]+'</b></font>'+' <font class=items>['+onl[3]+';'+onl[4]+']</font>';
	if (onl[5]>10) online += '<hr>Персонаж в <a href=fight.php?id='+onl[5]+' target=_blank class=nt>поединке</a>';
}
else
{
	main_onl = '<font class=ofl>Оффлайн</font>';
}
	//var inftxt = '<table border=0><tr><!--td><input class="login" type="button" value="Игровая" onclick="location=\'info.php?'+nick+'&no_watch=1\'" style="width: 110; height: 20; cursor:pointer;" id=but3></td--><td width=100% align=center>'+main_onl+online+'</td><!--td><input class="login" type="button" value="Личная" onclick="location=\'info.php?'+nick+'&no_watch=1&self=1\'" style="width: 110; height: 20; cursor:pointer;" id=but11></td--></tr></table>';
	var inftxt = ` ${main_onl} <hr style="background:#8e503a;height:2px;"> ${online}`;
	
	d.write("<center style='width:100%'>"+inftxt+"</center>");
}

function build_pers(sh,shd,oj,ojd,or1,or1d,po,pod,z1,z1d,z2,z2d,z3,z3d,sa,sad,na,nad,pe,ped,or2,or2d,braslet1,braslet1d,braslet2,braslet2d,br,brd,pers,inv,align,sign,nick,level,hp,mhp,ma,mma,tire,curh, maxh, curm, maxm, hp_int, ma_int,ss,sl,su,szd,szn,sp,sup,MONEY,dmoney,KB,mf1,mf2,mf3,mf4,mf5,udmin,udmax,rank_i,calling,victories,losses,experience,peace_experience,exp_to_lvl,zeroing,inv,dil,exp_proc,ws1,ws2,ws3,ws4,ws5,ws6,mpr,ISREP,pns,onl,kolco1,kolco1d,kolco2,kolco2d,kolco3,kolco3d,kolco4,kolco4d,kolco5,kolco5d,kolco6,kolco6d,persdr)
{
var puns = '';
if (pns[0]) puns += '<center class=puns>Персонаж&nbsp;заблокирован.<br>Причина:<hr width=80%>'+pns[0]+'</center>';
if (pns[1]) puns += '<center class=puns>Персонаж&nbsp;в&nbsp;тюрьме.<br>Причина:<hr width=80%>'+pns[1]+'[ещё '+pns[2]+']</center>';
if (pns[3]) puns += '<center class=puns>Кара инквизитора ещё:<hr width=80%>'+pns[3]+'</center>';
if (pns[4]) puns += '<center class=puns>Персонаж&nbsp;заблокирован.<hr width=80%>IP&nbsp;адрес&nbsp;заблокирован.</center>';
if (pns[5]) puns += '<center class=puns>Форумная&nbsp;молчанка.<hr width=80%>'+pns[5]+'</center>';

if (!mpr) mpr='';
if (parseInt(ss)<1) ss=1;
if (parseInt(sl)<1) sl=1;
if (parseInt(su)<1) su=1;
if (parseInt(szd)<1) szd=1;
if (parseInt(szn)<1) szn=1;
if (parseInt(sp)<1) sp=1;
if (ws1!='0' && ws1!=undefined)ss='<b class=user>'+ss+'</b>'+' ('+(ss-ws1)+'<font color=green>'+ws1+'</font>)';
if (ws2!='0' && ws2!=undefined)sl='<b class=user>'+sl+'</b>'+' ('+(sl-ws2)+'<font color=green>'+ws2+'</font>)';
if (ws3!='0' && ws3!=undefined)su='<b class=user>'+su+'</b>'+' ('+(su-ws3)+'<font color=green>'+ws3+'</font>)';
if (ws4!='0' && ws4!=undefined)szd='<b class=user>'+szd+'</b>'+' ('+(szd-ws4)+'<font color=green>'+ws4+'</font>)';
if (ws5!='0' && ws5!=undefined)szn='<b class=user>'+szn+'</b>'+' ('+(szn-ws5)+'<font color=green>'+ws5+'</font>)';
if (ws6!='0' && ws6!=undefined)sp='<b class=user>'+sp+'</b>'+' ('+(sp-ws6)+'<font color=green>'+ws6+'</font>)';
d.write('<title>Информация о ['+nick+'] | Инстинкты Воина: Возрождение</title>');

d.write('<center><table border="0" style="width:100%;padding:10px;" cellspacing="0" cellpadding="0"><tr>');
d.write('<td valign="top" width=250 rowspan="2" align=center id=mainpers>');
show_pers_new(sh,shd,oj,ojd,or1,or1d,po,pod,z1,z1d,z2,z2d,z3,z3d,sa,sad,na,nad,pe,ped,or2,or2d,braslet1,braslet1d,braslet2,braslet2d,br,brd,pers,inv,align,sign,nick,level,hp,mhp,ma,mma,tire,inv,dil,kolco1,kolco1d,kolco2,kolco2d,kolco3,kolco3d,kolco4,kolco4d,kolco5,kolco5d,kolco6,kolco6d);
	d.write('<div id=aurasc class=aurasc></div><div style="background-color:#dab69e;border-radius:3px;width:280px;margin:10px 0;padding:5px;">');
	
head(onl,nick);
	d.write('</div>');
	
if (alcohol.length>0){	
	for (var i = 0; i < alcohol.length; i++)
		//d.write(((alcohol[i][0]) ? 'Похмелье' : 'Алкогольное опьянение') + ', ещё ' + alcohol[i][1] + ' ' + alcohol[i][2] + ' ' + alcohol[i][3] + ' <br />');	
	d.write(((alcohol[i][0]) ? 'Похмелье' : ' <img width="40" src="/images/weapons/' + alcohol[i][1] + '.gif" alt="" onmouseover="s_des(event,\'0|<b>' + alcohol[i][2] + '</b><br>Еще: ' + alcohol[i][3] + ' \')" onmouseout="h_des()" onmousemove="move_alt(event)"> ') + '');
}
d.write('</td>');
d.write('<td align="center" valign="top" width="280">');



d.write('<div style="background: url(/images/info/inf_top.png);width:260px;height:60px;"></div>');
d.write('<div style="background:url(/images/info/inf_center.png);width:260px;">');
d.write('<div style="display:flex;width:240px; align-items: center; justify-content: center;">');
d.write('<div style="background:#8e503a;height:2px;width:45%;margin-left:3px;"></div>');
d.write('<div style="width:10%;"><img src="/images/info/isphere.gif" onmouseover="s_des(event,\'0|Физические характеристики:\')" onmouseout="h_des()" onmousemove="move_alt(event)"></div>');
d.write('<div style="background:#8e503a;height:2px;width:45%;"></div></div>');
d.write('<div style="width:220px;text-align:left;padding:0 10px;">');
d.write('<p style="padding:0px;margin:3px 0;">Сила: <b id=sila>'+ss+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Ловкость: <b id=lovk>'+sl+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Удача: <b id=udacha>'+su+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Выносливость: <b id=zdorov>'+szd+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Разум: <b id=znanya>'+szn+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Энергия: <b id=power>'+sp+'</b></p>');
d.write('</div>');
d.write('<div style="display:flex;width:240px; align-items: center; justify-content: center;">');
d.write('<div style="background:#8e503a;height:2px;width:45%;margin-left:3px;"></div>');
d.write('<div style="width:10%;"><img src="/images/info/isphere.gif" onmouseover="s_des(event,\'0|Дополнительные сведения:\')" onmouseout="h_des()" onmousemove="move_alt(event)"></div>');
d.write('<div style="background:#8e503a;height:2px;width:45%;"></div></div>');
d.write('<div style="width:220px;text-align:left;padding:0 10px;">');
d.write('<p style="padding:0px;margin:3px 0;">Уровень: <b >'+level+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Побед: <b >'+victories+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Поражений: <b >'+losses+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">Мощь персонажа: <b >'+rank_i+'</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">'+d.getElementById('bs').innerHTML+'</p>');
d.write('<p style="padding:0px;margin:3px 0;">Раса: <b>Дух</b></p>');
d.write('<p style="padding:0px;margin:3px 0;">'+d.getElementById('clan').innerHTML+'</b></p>');
d.write('</div>');
d.write('<div style="display:flex;width:240px; align-items: center; justify-content: center;">');
d.write('<div style="background:#8e503a;height:2px;width:45%;margin-left:3px;"></div>');
d.write('<div style="width:10%;"><img src="/images/info/isphere.gif" onmouseover="s_des(event,\'0|Знаки отличия персонажа:\')" onmouseout="h_des()" onmousemove="move_alt(event)"></div>');
d.write('<div style="background:#8e503a;height:2px;width:45%;"></div></div>');
d.write('<div style="width:220px;text-align:center;padding:0 10px;">');
d.write(''+mpr+'');
if (dil==1) d.write('<img width="60" height="60" src="//'+img_pack+'/info/sing/dealer.gif" alt="Консультант по финансовым вопросам" onmouseover="s_des(event,\'0|Консультант по финансовым вопросам.\')" onmouseout="h_des()" onmousemove="move_alt(event)">');
d.write('</div>');
d.write('</div>');
d.write('<div style="background: url(/images/info/inf_bottom.png);width:260px;height:60px;"></div>');


d.write('<br>'+puns+'');

// Табличка мирных умений
if (mirum!=false)
{
	var umnam = ['Кузнец','Рыбак','Шахтер','Путишественник','Торговец','Охотник','Алхимик','Рудокоп','Дровосек','Кожевейник','Лесник','Старатель'];
	var  t = '';
	for (var i in mirum)
	{
		if ( !mirum[i] || i == 12) continue;
		t+= ' <img src="//'+img_pack+'/nagrads/'+i+'_'+mirum[i]+'.gif" alt="'+umnam[i]+' №'+mirum[i]+'" onmouseover="s_des(event,\'0|<b>'+umnam[i]+'</b><br>'+mirum[i]+' ступень\')" onmouseout="h_des()" onmousemove="move_alt(event)"> ';
		if (i%6==0 && i!=0) t+= '<br/>';
	}
	if ( t != '' )
	{
		d.write(t);		
	}
}
	

d.write('</td><td valign=top>');
d.write('<div style="position:relative;">');
d.write('<div style="position:absolute;right:0;top:0;">');
d.write(d.getElementById('persdr').innerHTML);	
d.write('</div>');
d.write('</div>');
d.write('</td></tr></table>');
	d.write('<div style="width:98%;display:flex;margin:15px 0;">');
	

if (maridge!=false)
{
	var mar = '';
	if (maridge[3]=='male') mar += 'Женат на '; else mar += 'Замужем за ';
	mar += '<b>'+maridge[0]+'</b>';		
	d.write(`<div style="width:66px;"><a href='info.php?${maridge[0]}' target=_blank><img src="//${img_pack}/info/sing/obruchal.gif" onmouseover="s_des(event,\'0|${mar}\')" onmouseout="h_des()" onmousemove=move_alt(event)></a></div>`);	
	
}

d.write('<div class="presents" id="presents"></div>');	
d.write('</div>');	
d.write('<div class="about" id="about">' + d.getElementById('about').innerHTML + '</div>');		
d.write('<table style="width:98%;background-color:#dab69e;border-radius:3px;margin:0 auto;padding:5px;"><tr><td valign=top>' + d.getElementById('inf_from_php2').innerHTML + '</td></tr></table>');
d.write('<div>' + d.getElementById('wttable').innerHTML + '</div>');	


$(".wttable tr:nth-child(odd)").css("background-color","#000000");
//	d.write('<SCRIPT LANGUAGE=\'JavaScript\' SRC=\'js/c.js\'></SCRIPT>');
}

function report()
{
	d.getElementById('report').innerHTML = '<form method=post><textarea name=report class=inv rows=5 cols=50></textarea><br><input type=submit class=login value="Отправить[20 зм]"><hr></form>';
	$("#report").slideUp(1);
	$("#report").slideDown(500);
}

function pr_r(WHO,LVL,SIGN,DATE,text,del)
{
if (SIGN!= 'none') SIGN = '<img src=//'+img_pack+'/signs/'+SIGN+'.gif>'; else SIGN='';
if (del) del = '<input type=button class=but onclick="delete_rep('+del+')" value="X">'; else del = '';
	text = str_replace('<br>','\n',text);
	rep_text += '<tr><td class=login>'+del+''+SIGN+' <b>'+WHO+'</b>[<font class=lvl>'+LVL+'</font>] <img src="//'+img_pack+'/i.gif" onclick="window.open(\'info.php?'+WHO+'\',\'\',\'width=800,height=600,left=10,top=10,toolbar=no,scrollbars=yes,resizable=yes,status=no\');" style="cursor:pointer"> <font class=timef>'+DATE+'</font></td></tr><tr><td align=center><textarea cols=46 rows=3 class=gray style="width:100%;">'+text+'</textarea></td></tr>';
	return true;
}

function delete_rep(del)
{
if (confirm("Вы действительно хотите удалить этот отзыв?"))
{
	document.getElementById('deleterep').value = del;
	d.del.submit();
}
}

function reps_show()
{
	d.getElementById('mpers').style.visibility = 'hidden';
	d.getElementById('mpers').style.position = 'absolute';
	d.getElementById('reports').style.visibility = 'visible';
	d.getElementById('reports').style.position = 'fixed';
}
function reps_hide()
{
	d.getElementById('reports').style.visibility = 'hidden';
	d.getElementById('reports').style.position = 'absolute';
	d.getElementById('mpers').style.visibility = 'visible';
	d.getElementById('mpers').style.position = 'fixed';
}

function str_replace(replacement,replace,str)
{
	var w = str.split(replacement);
	return w.join(replace);
}

function exit()
{
top.window.close();
}

function view_auras(text)
{
	var ars = text.split('|');
	var ar,t;
	for(var i=0;i<ars.length;i++)
	{
		if (ars[i]!='')
		{
			ar = ars[i].split('#');
			if (ar[0].indexOf('.gif')!=-1) ar[0] = ar[0].substr(0,ar[0].length-4);
			t = '<img src="http://'+img_pack+'/weapons/'+ar[0]+'.gif" onmouseover="s_des(event,\'0|'+ar[1]+'\')" onmouseout="h_des()" onmousemove=move_alt(event) height=30>';
			if ((i+1)%5==0 && i!=0) t+= '<br>';
			document.getElementById('aurasc').innerHTML += t;
		}
	}
}

function show_presents()
{
	d.getElementById('presents').innerHTML += '';
	var t='';
	var inf='';
	for (var i=1;i<prs.length;i++)
	{
		inf = '| <font class=user>'+prs[i][0]+'</font> @'+prs[i][4]+'@От: <b>'+prs[i][2]+'</b>@<i class=timef>['+prs[i][3]+']</i>';
		if (i%5==1) t+= '';
		t += ' <img src=http://'+img_pack+'/presents/'+prs[i][1]+'.gif onmouseover="s_des(event,\''+inf+'\')" onmouseout="h_des()" onmousemove=move_alt(event)> ';
		if (i%5==0) t+= '';
	}
	t+= '';
	d.getElementById('presents').innerHTML += t;
//	d.write('<SCRIPT LANGUAGE=\'JavaScript\' SRC=\'/js/c.js\'></SCRIPT><SCRIPT SRC="j/s/end.js?3"></SCRIPT>');
}

