
function show_w (name,sht,type,img,upgrated,upgratedRune,d,m_d,cena,pric,dprice,where_buy,art,attr,describe,present,clan_sign,clan_name,slots,radius,arrows,arrows_max,arrow_name,z_time,weight,index,trbs)
{
	var text = '';
	if (sht==1 || sht=='') sht=''; else sht = sht+'шт.';
	text += (`
	<table width=100% cellpadding="2" cellspacing="5">
	<tr><td colspan="3">`);
	if (upgrated==0) { text +=(`<b>${name}</b>`);}	
	if (upgrated==1) { text +=(`<b style="color:green;">${name} [МФ]</b>`);}
	if (upgrated==2) { text +=(`<b style="color:#9900CC;">${name} [МФ]</b>`);}
		
	
	text += (` (Масса: ${weight})<br>Цена: ${cena} Долговечность предмета: `);
	if (m_d!=0 && d>0) 
	{
		//text += ('<div><img src="/images/DS/expline.gif" height=3 width='+(60*d/m_d)+'><img src="/images/DS/expline_empty.gif" height=3 width='+(60-60*d/m_d)+'></div>'); 
		text += ('<b>'+d+'</b> [<b>'+m_d+'</b>]'); 
	}
	else if (m_d==0) text += ('вечная вещь'); 
	else if (m_d!=0 && d==0) text += ('иcпорчена'); 
	text += (`</td>	
	</tr>
	<tr>
	<td width="40%" align="center" style="background:#e2e0e0;vertical-align:top;"><b>Действие предмета</b></td>
	
	<td rowspan=2 align="center" style="border-left:1px solid #ccc;border-right:1px solid #ccc;vertical-align:top;">`);
// определяем размер картинки взависимости от типа предмета
switch (type) {
case "orujie":
   hi = 80, wi = 60;
   break; 
case "ojerelie":
   hi = 20, wi = 60;
   break;
case "poyas":
   hi = 40, wi = 60;
   break;
case "naruchi":
   hi = 40, wi = 60;
   break;
case "perchatki":
   hi = 40, wi = 60;
   break;
case "kolco":
   hi = 20, wi = 20;
   break;
case "kolchuga":
   hi = 80, wi = 60;
   break;
case "bronya":
   hi = 80, wi = 60;
   break;
case "braslet":
   hi = 20, wi = 30;
   break;
case "sapogi":
   hi = 40, wi = 60;
   break;
case "resources":
   hi = 60, wi = 60;
   break;
case "resources_forest":
   hi = 60, wi = 60;
   break;
case "rune":
   hi = 60, wi = 60;
   break;
case "zakl":
   hi = 30, wi = 44;
   break;
case "napad":
   hi = 30, wi = 44;
   break;	
case "teleport":
   hi = 30, wi = 44;
   break;	
case "kam":
   hi = 40, wi = 40;
   break;										 
case "shlem":
   hi = 60, wi = 60;
}	

text += (`<div style="position: relative;width:${wi};height:${hi};">`);
text += (`<img src="/images/weapons/${img}.gif">`);

if ((slots!=0) || (upgratedRune!=0)) { 
	text += ('<div style="position: absolute; bottom: 2px; left: 2px;">');	

	if (slots!=0) {
	for (let i = 0; i < slots; i++) {
 	 text += (`<div style="width:5px;height:5px;cursor: help; margin-bottom:1px; border: 1px solid #fff;" ></div>`);
	}
}
if (upgratedRune!=0) {
	for (let i = 0; i < upgratedRune; i++) {
 	 text += (`<div style="width:5px;height:5px;cursor: help; background:green; border: 1px solid #fff;" ></div>`);
	}
}

	//if (upgratedRune > 0) { text += (`<div style="width:8px;height:8px;background:red;cursor: help;border: 1px solid #fff;" ></div>`); }
	text += ('</div>');
	
}

text += ('</div>');
text += (`<div id='${img}_${d}_${pric}_${index}'>${sht}</div></td>
	<td width="40%" align="center" style="background:#e2e0e0;vertical-align:top;"><b>Минимальные требования</b></td>
	</tr><tr>`);
	text+= ('<td style="vertical-align:top;">');	

	
	if (dprice > 0) text+= ('<br><img src=/images/art.gif> <font class=hp>Артефакт</font>');
	if (present!='') text+= ('<br><img src=/images/art.gif> Подарок от <b>'+present+'</b>');
	if (where_buy==3) text+= ('<br><img src=/images/art.gif> <font class=hp>Раритет</font>');
	text+= (attr);
	if (slots!=0) text+= ('<font class=items> Слотов для заклинаний или рун: <b>'+slots+'</b></font><br>');
	//if (radius!=0) text+= ('<font class=items> Радиус поражения: <b>'+radius+'</b></font><br>');
	//if (arrows_max) text+= ('<font class=items> Заряды: <b>'+arrows+'</b></font><br>');
	//if (arrows_max) text+= ('<font class=items> Вмещаемость: <b>'+arrows_max+'</b></font><br>');
	//if (arrows_max) text+= ('<font class=items> Тип заряда: <b>'+arrow_name+'</b></font><br>');
	
	if (describe!='') text+= ("<div class='whiteBlock'>"+describe+"</div>");
	if (z_time!=0) text+= ("<br>Время Действия: <b>"+z_time+"</b>");
	text +=  ('</td>');
	//text += ('<td rowspan=2 align="center" style="border-left:1px solid #ccc;border-right:1px solid #ccc;"><img src="/images/weapons/'+img+'.gif"><div id=\''+img+'_'+d+'_'+pric+'_'+index+'\' class=time>'+sht+'</div></td>');
	
	//text += ('</td>');
	text += ('<td style="vertical-align:top;">'+trbs+'</td></tr></table>');
	document.write(text);
}
