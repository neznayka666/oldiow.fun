
function show_w (name,sht,img,d,m_d,cena,pric,stype,dprice,art,attr,describe,present,clan_sign,clan_name,slots,radius,arrows,arrows_max,arrow_name,z_time,weight,index,trbs)
{
	var text = '';
	if (sht==1 || sht=='') sht=''; else sht = sht+'шт.';
	text += (`
	<table width=100% cellpadding="2" cellspacing="5">
	<tr><td colspan="3">
	<b>${name}</b> (Масса: ${weight})<br>Цена: ${cena}Долговечность предмета: `);
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
	
	<td rowspan=2 align="center" style="border-left:1px solid #ccc;border-right:1px solid #ccc;vertical-align:top;">
	<div style="position: relative;width:100%;">
	<img src="/images/weapons/${img}.gif">	
	<div style="position: absolute; bottom: 2px; left: 2px;">
	${stype}
	<div style="width:5px;height:5px;background:green;"></div>
	<div style="width:5px;height:5px;background:red;"></div>
	</div>
	</div>
	
	<div id='${img}_${d}_${pric}_${index}'>${sht}</div></td>
	<td width="40%" align="center" style="background:#e2e0e0;vertical-align:top;"><b>Минимальные требования</b></td>
	</tr><tr>`);
	text+= ('<td style="vertical-align:top;">');	

	
	if (art==1 && present=='') text+= ('<br><img src=/images/art.gif> <font class=hp>Артефакт</font>');
	else if (present!='') text+= ('<br><img src=/images/art.gif> Подарок от <b>'+present+'</b>');
	text+= (attr);
	if (slots!=0) text+= ('<font class=items> Слотов для заклинаний или рун: <b>'+slots+'</b></font><br>');
	//if (radius!=0) text+= ('<font class=items> Радиус поражения: <b>'+radius+'</b></font><br>');
	//if (arrows_max) text+= ('<font class=items> Заряды: <b>'+arrows+'</b></font><br>');
	//if (arrows_max) text+= ('<font class=items> Вмещаемость: <b>'+arrows_max+'</b></font><br>');
	//if (arrows_max) text+= ('<font class=items> Тип заряда: <b>'+arrow_name+'</b></font><br>');
	
	if (describe!='') text+= ("<br><center class=but>"+describe+"</center>");
	if (z_time!=0) text+= ("<br>Время Действия: <b>"+z_time+"</b>");
	text +=  ('</td>');
	//text += ('<td rowspan=2 align="center" style="border-left:1px solid #ccc;border-right:1px solid #ccc;"><img src="/images/weapons/'+img+'.gif"><div id=\''+img+'_'+d+'_'+pric+'_'+index+'\' class=time>'+sht+'</div></td>');
	
	//text += ('</td>');
	text += ('<td style="vertical-align:top;">'+trbs+'</td></tr></table>');
	document.write(text);
}
