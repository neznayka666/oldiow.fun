document.write('<div style="position:absolute;left:0px; top:-100px; z-index: 65000;display:none;" id="description" onmouseover=h_des()></div>');
var curHP, maxHP, intHP, curMA, maxMA, intMA, interv;
var w = 186;
var h = 205;
var ZW = 300;
var InFight=0;
var sdTimeOut = -1;
var divchp,divcma;

function ins_HP(curh, maxh, curm, maxm, hp_int, ma_int)
{ 
 if (maxh<5) maxh=5;
 if (maxm<9) maxm=9;
 intHP = hp_int;
 intMA = ma_int;
 interv = setInterval("cha_HP()",1000);
 if(curm < 0) curm = 0;
 if(maxm <= 0) maxm = 9;
 
 curHP = curh;
 curMA = curm;
 maxHP = maxh;
 maxMA = maxm;

document.getElementById("hptitle").title = '1 здоровья за '+Math.round(intHP/(maxHP*2),1)+' сек.';
document.getElementById("matitle").title = '1 маны за '+Math.round(intMA/(maxMA*2),1)+' сек.';
}

function cha_HP()
{
if(curHP > maxHP) curHP = maxHP;
if(curMA > maxMA) curMA = maxMA;

if(curHP<0) curHP = 0;
if(curMA<0) curMA = 0;
var hp_f = Math.round(h*(1-curHP/maxHP));
var ma_f = Math.round(h*(1-curMA/maxMA));
if (hp_f<0) hp_f=0;
if (ma_f<0) ma_f=0;

document.images["no_hp"].height = hp_f;
document.images["no_ma"].height = ma_f;
document.images["hp"].height = h-hp_f;
document.images["ma"].height = h-ma_f;

if(divchp!=undefined)
{
	divchp.innerHTML = Math.round(curHP)+'/'+maxHP;
	divcma.innerHTML = Math.round(curMA)+'/'+maxMA;
}
else
{
	divchp = document.getElementById("chp");
	divcma = document.getElementById("cma");
}

curHP = curHP+(maxHP/intHP);
curMA = curMA+(maxMA/intMA);

if((curMA > maxMA) && (curHP > maxHP)) 
	clearInterval(interv);
}

function show_pers_new (sh,shd,oj,ojd,or1,or1d,po,pod,z1,z1d,z2,z2d,z3,z3d,sa,sad,na,nad,pe,ped,or2,or2d,braslet1,braslet1d,braslet2,braslet2d,br,brd,pers,inv,align,sign,nick,level,hp,mhp,ma,mma,tire,i,dil,kolco1,kolco1d,kolco2,kolco2d,kolco3,kolco3d,kolco4,kolco4d,kolco5,kolco5d,kolco6,kolco6d) {
var d=document;
if (tire==undefined) tire=0;
var s = 'style=\'cursor:pointer;\' onclick =\'location="main.php?';
var sha,oja,or1a,poa,z1a,z2a,z3a,saa,naa,pea,or2a,braslet1a,braslet2a,bra,pea,kolco1a,kolco2a,kolco3a,kolco4a,kolco5a,kolco6a;
if (inv==1) 
{
	if (shd!='0')sha = s+'sn='+take_id(shd)+'"\'';
	if (ojd!='0')oja = s+'sn='+take_id(ojd)+'"\'';
	if (or1d!='0')or1a= s+'sn='+take_id(or1d)+'"\'';
	if (pod!='0')poa = s+'sn='+take_id(pod)+'"\'';
	if (z1d!='0')z1a= s+'sn='+take_id(z1d)+'"\'';
	if (z2d!='0')z2a= s+'sn='+take_id(z2d)+'"\'';
	if (z3d!='0')z3a= s+'sn='+take_id(z3d)+'"\'';
	if (or2d!='0')or2a= s+'sn='+take_id(or2d)+'"\'';
	if (braslet1d!='0')braslet1a= s+'sn='+take_id(braslet1d)+'"\'';
	if (braslet2d!='0')braslet2a= s+'sn='+take_id(braslet2d)+'"\'';
	if (brd!='0')bra= s+'sn='+take_id(brd)+'"\'';
	//if (kam1d!='0')kam1a= s+'sn='+take_id(kam1d)+'"\'';
	//if (kam2d!='0')kam2a= s+'sn='+take_id(kam2d)+'"\'';
	//if (kam3d!='0')kam3a= s+'sn='+take_id(kam3d)+'"\'';
	//if (kam4d!='0')kam4a= s+'sn='+take_id(kam4d)+'"\'';
	if (sad!='0')saa= s+'sn='+take_id(sad)+'"\'';
	if (nad!='0')naa= s+'sn='+take_id(nad)+'"\'';
	if (ped!='0')pea= s+'sn='+take_id(ped)+'"\'';
	if (kolco1d!='0')kolco1a= s+'sn='+take_id(kolco1d)+'"\'';
	if (kolco2d!='0')kolco2a= s+'sn='+take_id(kolco2d)+'"\'';
	if (kolco3d!='0')kolco3a= s+'sn='+take_id(kolco3d)+'"\'';
	if (kolco4d!='0')kolco4a= s+'sn='+take_id(kolco4d)+'"\'';
	if (kolco5d!='0')kolco5a= s+'sn='+take_id(kolco5d)+'"\'';
	if (kolco6d!='0')kolco6a= s+'sn='+take_id(kolco6d)+'"\'';
}
var prvte='';
//if (inv!=2) prvte = '<img src=http://'+img_pack+'/pr.gif title="Приват" onclick="top.say_private(\''+nick+'\',1)" style="cursor:pointer" style="cursor:pointer" height=16> ';
//if (inv==2 || window.opener) prvte = '<img src=http://'+img_pack+'/pr.gif title="Приват" onclick="window.opener.top.say_private(\''+nick+'\',1)" style="cursor:pointer" height=16> ';
if (dil==1) dil='<img src=//'+img_pack+'/signs/diler.gif title="Официальный дилер проекта">'; else dil='';
if (align!='')
{
	align = align.split(';');
	align = '<img src=//'+img_pack+'/signs/align/'+align[0]+'.gif title="'+align[1]+'" width="12" height="15"> ';
}
if (sign!='' && sign!='none' )
{
	sign = '<img src="//'+img_pack+'/signs/'+sign+'.gif" width="12" height="12"> ';
} else sign = '';

if (!InFight) d.write(sbox2b());
d.write('<table width=220 border="0" cellspacing="0" cellpadding="0" style="position:relative;top:-2px;">');
//show_only_hp(hp,mhp,ma,mma);
d.write('<tr><td align=center width=100%> '+prvte+' '+align+sign+'<font class=user>'+nick+'</font> ['+level+'] '+dil+' &nbsp; <font class=green title=Усталость>'+parseInt(tire)+'%</font></td> </tr> <tr><td>');
//d.write('<img src="http://'+img_pack+'/weapons/slots/slot1.gif" width=60 height=20><img src="http://'+img_pack+'/weapons/'+na+'.gif" width=60 height=40 onmouseover="s_des(event,\''+nad+'\')" onmouseout="h_des()" '+naa+' onmousemove=move_alt(event)><img  src=http://'+img_pack+'/weapons/'+pe+'.gif width=60 height=40 onmouseover="s_des(event,\''+ped+'\')" onmouseout="h_des()" '+pea+' onmousemove=move_alt(event)><img  src="http://'+img_pack+'/weapons/'+or1+'.gif" width=60 height=91 onmouseover="s_des(event,\''+or1d+'\')" onmouseout="h_des()" '+or1a+' onmousemove=move_alt(event)><img  src="http://'+img_pack+'/weapons/'+br+'.gif" width=60 height=90 onmouseover="s_des(event,\''+brd+'\')" onmouseout="h_des()" '+bra+' onmousemove=move_alt(event)></td> <td align=center width=115><img src="http://'+img_pack+'/persons/'+pers+'.gif" title="'+nick+'" width=115></td><td width=60 valign=top align=right><img src="http://'+img_pack+'/weapons/'+sh+'.gif" width=60 height=65 onmouseover="s_des(event,\''+shd+'\')" onmouseout="h_des()" '+sha+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+oj+'.gif" width=60 height=35 onmouseover="s_des(event,\''+ojd+'\')" onmouseout="h_des()" '+oja+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+or2+'.gif" width=60 height=91 onmouseover="s_des(event,\''+or2d+'\')" onmouseout="h_des()" '+or2a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+po+'.gif" width=60 height=30 onmouseover="s_des(event,\''+pod+'\')" onmouseout="h_des()" '+poa+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+sa+'.gif" width=60 height=60 onmouseover="s_des(event,\''+sad+'\')" onmouseout="h_des()" '+saa+' onmousemove=move_alt(event)></td></tr><tr><td align=left width=100%><img src="http://'+img_pack+'/weapons/'+kam1+'.gif" width=31 height=31 onmouseover="s_des(event,\''+kam1d+'\')" onmouseout="h_des()" '+kam1a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+kam2+'.gif" width=31 height=31 onmouseover="s_des(event,\''+kam2d+'\')" onmouseout="h_des()" '+kam2a+' onmousemove=move_alt(event)></td><td align=center><img src="http://'+img_pack+'/weapons/'+ko1+'.gif" width=31 height=31 onmouseover="s_des(event,\''+ko1d+'\')" onmouseout="h_des()" '+ko1a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+ko2+'.gif" width=31 height=31 onmouseover="s_des(event,\''+ko2d+'\')" onmouseout="h_des()" '+ko2a+' onmousemove=move_alt(event)></td><td align=right><img src="http://'+img_pack+'/weapons/'+kam3+'.gif" width=31 height=31 onmouseover="s_des(event,\''+kam3d+'\')" onmouseout="h_des()" '+kam3a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+kam4+'.gif" width=31 height=31 onmouseover="s_des(event,\''+kam4d+'\')" onmouseout="h_des()" '+kam4a+' onmousemove=move_alt(event)></td> <td height=32 align=right valign=bottom></td></tr></table></td> <td width=30 height=272 valign=bottom> </td></tr></table></td></tr></table>');
//d.write('<img src="http://'+img_pack+'/weapons/'+sh+'.gif" width=60 height=60 onmouseover="s_des(event,\''+shd+'\')" onmouseout="h_des()" '+sha+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+oj+'.gif" width=60 height=20 onmouseover="s_des(event,\''+ojd+'\')" onmouseout="h_des()" '+oja+' onmousemove=move_alt(event)><img  src="http://'+img_pack+'/weapons/'+or1+'.gif" width=60 height=80 onmouseover="s_des(event,\''+or1d+'\')" onmouseout="h_des()" '+or1a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+po+'.gif" width=60 height=30 onmouseover="s_des(event,\''+pod+'\')" onmouseout="h_des()" '+poa+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+sa+'.gif" width=60 height=63 onmouseover="s_des(event,\''+sad+'\')" onmouseout="h_des()" '+saa+' onmousemove=move_alt(event)></td> <td align=center width=115><img src="images/persons/'+pers+'.gif" title="'+nick+'" width=115></td><td width=60 valign=top align=right><img src="http://'+img_pack+'/weapons/slots/slot1.gif" width=60 height=12><img src="http://'+img_pack+'/weapons/'+na+'.gif" width=60 height=40 onmouseover="s_des(event,\''+nad+'\')" onmouseout="h_des()" '+naa+' onmousemove=move_alt(event)><img  src=http://'+img_pack+'/weapons/'+pe+'.gif width=60 height=40 onmouseover="s_des(event,\''+ped+'\')" onmouseout="h_des()" '+pea+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+or2+'.gif" width=60 height=91 onmouseover="s_des(event,\''+or2d+'\')" onmouseout="h_des()" '+or2a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+braslet1+'.gif" width=30 height=20 onmouseover="s_des(event,\''+braslet1d+'\')" onmouseout="h_des()" '+braslet1a+' onmousemove=move_alt(event)><img src="http://'+img_pack+'/weapons/'+braslet2+'.gif" width=30 height=20 onmouseover="s_des(event,\''+braslet2d+'\')" onmouseout="h_des()" '+braslet2a+' onmousemove=move_alt(event)><img  src="http://'+img_pack+'/weapons/'+br+'.gif" width=60 height=90 onmouseover="s_des(event,\''+brd+'\')" onmouseout="h_des()" '+bra+' onmousemove=move_alt(event)></td></tr></table></td></tr></table></td></tr></table>');
d.write('<div id="pers" style="display: table;text-align:center;width:260px;margin:10px auto;">');
d.write('<div class="tr" style="display: table-row;">');
d.write('<div class="td" style="display: table-cell;width:100px;vertical-align: middle;">');
show_all_hp(hp,mhp);
d.write('</div>');
d.write('<div class="td" style="display: table-cell;width:60px;text-align:center;"><img src="/images/weapons/'+sh+'.gif" width=60 height=60 onmouseover="s_des(event,\''+shd+'\')" onmouseout="h_des()" '+sha+' onmousemove=move_alt(event)></div>');
d.write('<div class="td" style="display: table-cell;width:100px;vertical-align: middle;">');
show_all_ma(ma,mma);
d.write('</div>');
d.write('</div>');
d.write('</div>');
d.write('<div style="display: table;text-align:center;width:260px;margin:0 auto;">');
d.write('<div class="tr" style="display: table-row;">');
show_only_hp(hp,mhp);
d.write('<div class="td" style="display: table-cell;width:60px;vertical-align: top;">');
d.write('<img src="/images/weapons/'+oj+'.gif" width="60" height="20" onmouseover="s_des(event,\''+ojd+'\')" onmouseout="h_des()" '+oja+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+or1+'.gif" width="60" height="80" onmouseover="s_des(event,\''+or1d+'\')" onmouseout="h_des()" '+or1a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+br+'.gif" width=60 height=80 onmouseover="s_des(event,\''+brd+'\')" onmouseout="h_des()" '+bra+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+kolco1+'.gif" width="20" height="20" onmouseover="s_des(event,\''+kolco1d+'\')" onmouseout="h_des()" '+kolco1a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+kolco2+'.gif" width="20" height="20" onmouseover="s_des(event,\''+kolco2d+'\')" onmouseout="h_des()" '+kolco2a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+kolco3+'.gif" width="20" height="20" onmouseover="s_des(event,\''+kolco3d+'\')" onmouseout="h_des()" '+kolco3a+' onmousemove=move_alt(event)>');
d.write('</div>');
d.write('<div class="td" style="display: table-cell;width:100px;text-align:center;">');
d.write('<img src="/images/persons/'+pers+'.gif" title="'+nick+'" width="100" height="225">');
//d.write('<img style="position:absolute;bottom:73px;left:24px;" src="/images/weapons/'+lo+'.gif" width=60 height=80 onmouseover="s_des(event,\''+lod+'\')" onmouseout="h_des()" '+loa+' onmousemove=move_alt(event)>');
d.write('</div>');

d.write('<div class="td" style="display: table-cell;width:60px;vertical-align: top;">');
d.write('<img src="/images/weapons/'+na+'.gif" width="60" height="40" onmouseover="s_des(event,\''+nad+'\')" onmouseout="h_des()" '+naa+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+braslet1+'.gif" width="30" height="20" onmouseover="s_des(event,\''+braslet1d+'\')" onmouseout="h_des()" '+braslet1a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+braslet2+'.gif" width="30" height="20" onmouseover="s_des(event,\''+braslet2d+'\')" onmouseout="h_des()" '+braslet2a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+pe+'.gif" width="60" height="40" onmouseover="s_des(event,\''+ped+'\')" onmouseout="h_des()" '+pea+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+or2+'.gif" width="60" height="80" onmouseover="s_des(event,\''+or2d+'\')" onmouseout="h_des()" '+or2a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+kolco4+'.gif" width="20" height="20" onmouseover="s_des(event,\''+kolco4d+'\')" onmouseout="h_des()" '+kolco4a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+kolco5+'.gif" width="20" height="20" onmouseover="s_des(event,\''+kolco5d+'\')" onmouseout="h_des()" '+kolco5a+' onmousemove=move_alt(event)>');
d.write('<img src="/images/weapons/'+kolco6+'.gif" width="20" height="20" onmouseover="s_des(event,\''+kolco6d+'\')" onmouseout="h_des()" '+kolco6a+' onmousemove=move_alt(event)>');
d.write('</div>');
show_only_ma(ma,mma);
d.write('</div>');
d.write('</div>');
d.write('<div style="display: table;text-align:center;width:260px;margin:10px auto;">');
d.write('<div class="tr" style="display: table-row;">');
d.write('<div class="td" style="display: table-cell;width:100px;"></div>');
d.write('<div class="td" style="display: table-cell;width:60px;text-align:center;"><img src="/images/weapons/'+po+'.gif" width="60" height="40" onmouseover="s_des(event,\''+pod+'\')" onmouseout="h_des()" '+poa+' onmousemove=move_alt(event)><br><img src="/images/weapons/'+sa+'.gif" width=60 height=40 onmouseover="s_des(event,\''+sad+'\')" onmouseout="h_des()" '+saa+' onmousemove=move_alt(event)></div>');
d.write('<div class="td" style="display: table-cell;width:100px;"></div>');
d.write('</div>');
d.write('</div>');
d.write('</div>');

d.write('</td></tr></table>');

if (!InFight) d.write(sbox2e());
}

function show_statsn(ss,sl,su,szd,szn,sp)
{
if (ss<1) ss=1;
if (sl<1) sl=1;
if (su<1) su=1;
if (szd<1) szd=1;
if (szn<1) szn=1;
if (sp<1) sp=1;
document.write('<table border="0" width="100%" cellspacing="1" class=LinedTable>	<tr> <td width=80 class=statsn>Сила:</td> <td class=user align=right>'+ss+'</td></tr><tr><td width=80 class=statsn>Реакция:</td><td class=user align=right>'+sl+'</td></tr><tr><td width=80 class=statsn>Удача:</td><td class=user align=right>'+su+'</td></tr><tr><td class=statsn width=80>Здоровье:</td><td class=user align=right>'+szd+'</td></tr><tr><td width=80 class=statsn>Интеллект:</td><td class=user align=right>'+szn+'</td></tr><tr><td width=80 class=statsn>Сила&nbsp;Воли:</td><td class=user align=right>'+sp+'</td></tr></table>');
}


function s_des (event,id,z)
{
	if (!event) var event = window.event;
	var descr = document.getElementById('description');
	//ZW=200;
	if (id=='0') 
	{
		id = '<b>Пустой слот.</b>';
		//ZW=90;
	}
	else
	{
		var ww = id.split("|");
		id = ww[1];
		while (id.indexOf('@')!=-1) id = id.replace('@','<br>');
	}
	id = '<div class=but style="BACKGROUND: #FFFFE1;padding:5px;border:1px solid #000;color:#000;">'+id+'</div>';
	descr.innerHTML = id;
	descr.style.left = event.clientX+document.body.scrollLeft+25+'px';
	if (event.clientX+document.documentElement.scrollLeft+200>=screen.width)
	descr.style.left = event.clientX+document.body.scrollLeft-200+'px';
	descr.style.top  = event.clientY+document.body.scrollTop +'px';
	descr.style.width = ZW;
	//descr.style.display = 'block';
	clearTimeout(sdTimeOut);
	$(descr).fadeIn(100);
}

function h_des () {
var descr = d.getElementById('description');
sdTimeOut = setTimeout("$('#description').fadeOut(40)",100);
}
function move_alt(event){
if (!event) var event = window.event;
var descr = document.getElementById('description');
var x =  event.clientX+document.body.scrollLeft;
var y =  event.clientY+document.body.scrollTop;
descr.style.left = x+25+'px';
if (event.clientX+document.documentElement.scrollLeft+275>=screen.width)
descr.style.left = x-225+'px';
if (y>(document.height-100)) y = document.height-100;
descr.style.top  = y+'px';
descr.style.width = ZW;
}

function take_id(id)
{
var ww = id.split("|");
return parseInt(ww[0]);
}



function show_only_hp(hp,mhp)
{
if (mhp<5) mhp=5;
var d=document;
if (hp<0) hp=0;
var no_hp = Math.round(h*(1-hp/mhp));
if (no_hp<0) no_hp=0;
var zhp = h-no_hp;
d.write('<div class="td" style="display: table-cell;width:10px;vertical-align: bottom;background:url(\'/images/icons/hp/hp-bar.png\');" id="hptitle">');
d.write('<img src="/images/icons/hp/no_c_helth.png" width="10" height="'+no_hp+'" border="0" title="Уровень жизни: '+hp+'/'+mhp+'" name="no_hp">');
d.write('<img src="/images/icons/hp/_helth.gif" width="10" height="10" border="0" title="Уровень жизни: '+hp+'/'+mhp+'">');
d.write('<img src="/images/icons/hp/helth.gif" width="10" height="'+zhp+'" border="0" title="Уровень жизни: '+hp+'/'+mhp+'" name="hp">');
d.write('<img src="/images/icons/hp/_helth_.gif" width="10" height="10" border="0" title="Уровень жизни: '+hp+'/'+mhp+'">');
d.write('</div>');
}

function show_only_ma(ma,mma)
{
if (mma<5) mma=9;
var d=document;
if (ma<0) ma=0;
var no_ma = Math.round(h*(1-ma/mma));
if (no_ma<0) no_ma=0;
var zma = h-no_ma;
d.write('<div class="td" style="display: table-cell;width:10px;vertical-align: bottom;background:url(\'/images/icons/hp/ma-bar.png\');" id="matitle">');
d.write('<img src="/images/icons/hp/no_c_energy.png" width="10" height="'+no_ma+'" border="0" title="Уровень энергии: '+ma+'/'+mma+'" name="no_ma">');
d.write('<img src="/images/icons/hp/_energy.gif" width="10" height="10" border="0" title="Уровень энергии: '+ma+'/'+mma+'">');
d.write('<img src="/images/icons/hp/energy.gif" width="10" height="'+zma+'" border="0" title="Уровень энергии: '+ma+'/'+mma+'" name="ma">');
d.write('<img src="/images/icons/hp/_energy_.gif" width="10" height="10" border="0" title="Уровень энергии: '+ma+'/'+mma+'">');
d.write('</div>');
}

function show_all_hp(hp,mhp)
{
if (mhp<5) mhp=5;
var d=document;
if (hp<0) hp=0;
var no_hp = Math.round(h*(1-hp/mhp));
if (no_hp<0) no_hp=0;
d.write('<div id="chp" class="hp" style="vertical-align: middle;">'+hp+'/'+mhp+'</div>');
}

function show_all_ma(ma,mma)
{
	if (mma<5) mma=9;
	var d=document;
	if (ma<0) ma=0;
	var no_ma = Math.round(h*(1-ma/mma));
	if (no_ma<0) no_ma=0;
d.write('<div id="cma" class="ma" style="vertical-align: middle;">'+ma+'/'+mma+'</div>');
}
/*
function show_only_hp2(hp,mhp,ma,mma)
{
if (mhp<5) mhp=5;
if (mma<5) mma=9;
var d=document;
if (ma<0) ma=0;
if (hp<0) hp=0;
var no_hp = Math.round(h*(1-hp/mhp));
var no_ma = Math.round(h*(1-ma/mma));
if (no_hp<0) no_hp=0;
if (no_ma<0) no_ma=0;
var zhp = h-no_hp;
var zma = h-no_ma;

return '<table border="1" width="230" cellspacing="0" cellpadding="0"> 	<tr> 		<td width="26"><img border="0" src="/public_content/ypimg/hp_left.gif"></td> 		<td align=center> 		<table border="0" width="100%" cellspacing="0" cellpadding="0"> 			<tr> 				<td title="" id=hptitle><img border="0" src="/public_content/ypimg/hp.gif" width="'+zhp+'" height="8" name=hp><img border="0" src="/public_content/ypimg/no.png" width='+no_hp+' height="8" name=no_hp></td> 			</tr> 			<tr class=login> 				<td id=chp class=hp>'+hp+'/'+mhp+'</td> <td id=cma class=ma align=right>'+ma+'/'+mma+'</td> 			</tr> 			<tr> 				<td title="" id=matitle><img border="0" src="/public_content/ypimg/ma.gif" width="'+zma+'" height="8" name=ma><img border="0" src="/public_content/ypimg/no.png" width='+no_ma+' height="8" name=no_ma></td> 			</tr> 		</table> 		</td> 		<td width="26" align=left><img border="0" src="/public_content/ypimg/hp_right.gif"></td> 	</tr> </table>';
}
*/


/*

function show_only_hp(hp,mhp,ma,mma)
{
if (mhp<5) mhp=5;
if (mma<5) mma=9;
var d=document;
if (ma<0) ma=0;
if (hp<0) hp=0;
var no_hp = Math.round(w*(1-hp/mhp));
var no_ma = Math.round(w*(1-ma/mma));
if (no_hp<0) no_hp=0;
if (no_ma<0) no_ma=0;
var zhp = w-no_hp;
var zma = w-no_ma;

d.write('<table border="0" width="220" cellspacing="0" cellpadding="0"> 	<tr> 		<td width="26"><img border="0" src="http://'+img_pack+'/design/hot/hp_left.gif"></td> 		<td align=center> 		<table border="0" width="100%" cellspacing="0" cellpadding="0"> 			<tr> 				<td colspan="2" title="" id=hptitle><img border="0" src="http://'+img_pack+'/design/new/hp.gif" width="'+zhp+'" height="8" name=hp><img border="0" src="http://'+img_pack+'/no.png" width='+no_hp+' height="8" name=no_hp></td> 			</tr> 			<tr class=login> 				<td id=chp class=hp>'+hp+'/'+mhp+'</td> <td id=cma class=ma align=right>'+ma+'/'+mma+'</td> 			</tr> 			<tr> 				<td colspan="2" title="" id=matitle><img border="0" src="http://'+img_pack+'/design/new/ma.gif" width="'+zma+'" height="8" name=ma><img border="0" src="http://'+img_pack+'/no.png" width='+no_ma+' height="8" name=no_ma></td> 			</tr> 		</table> 		</td> 		<td width="26" align=left><img border="0" src="http://'+img_pack+'/design/hot/hp_right.gif"></td> 	</tr> </table>');
}

function show_only_hp2(hp,mhp,ma,mma)
{
if (mhp<5) mhp=5;
if (mma<5) mma=9;
var d=document;
if (ma<0) ma=0;
if (hp<0) hp=0;
var no_hp = Math.round(w*(1-hp/mhp));
var no_ma = Math.round(w*(1-ma/mma));
if (no_hp<0) no_hp=0;
if (no_ma<0) no_ma=0;
var zhp = w-no_hp;
var zma = w-no_ma;

return '<table border="0" width="230" cellspacing="0" cellpadding="0"> 	<tr> 		<td width="26"><img border="0" src="http://'+img_pack+'/design/hot/hp_left.gif"></td> 		<td align=center> 		<table border="0" width="100%" cellspacing="0" cellpadding="0"> 			<tr> 				<td colspan="2" title="" id=hptitle><img border="0" src="http://'+img_pack+'/design/new/hp.gif" width="'+zhp+'" height="8" name=hp><img border="0" src="http://'+img_pack+'/no.png" width='+no_hp+' height="8" name=no_hp></td> 			</tr> 			<tr class=login> 				<td id=chp class=hp>'+hp+'/'+mhp+'</td> <td id=cma class=ma align=right>'+ma+'/'+mma+'</td> 			</tr> 			<tr> 				<td colspan="2" title="" id=matitle><img border="0" src="http://'+img_pack+'/design/new/ma.gif" width="'+zma+'" height="8" name=ma><img border="0" src="http://'+img_pack+'/no.png" width='+no_ma+' height="8" name=no_ma></td> 			</tr> 		</table> 		</td> 		<td width="26" align=left><img border="0" src="http://'+img_pack+'/design/hot/hp_right.gif"></td> 	</tr> </table>';
}
*/