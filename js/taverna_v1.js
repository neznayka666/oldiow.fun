var count = 0;
var c_showed = 0;

function view_taverna()
{
	d.write('<div style="position: fixed; left:0; top:0; z-index: 6; width:0px; visibility:visible;" id="zcenter"></div><div style="position:absolute; left:0px; top:0px; z-index: 1; width:100%; height:200%; display:none; text-align:center;" id="center2" class=news onclick="windmenu()">&nbsp;</div>');
	d.write(`	
	<table cellpadding="5" cellspacing="5" border="0"  style="margin: 40px auto 0 auto;width:100%;max-width:1200px;">
	<tr><td style="width:25%;">У Вас с собой: <b>${usr[0]}</b> зм.</B></td>
	<td align="center" style="width:50%;"><div class="titleCity">Таверна</div></td>
	<td align="center" style="width:25%;"></td></tr></table>
	${(usr[1] ? ('<div class="greenBlock" style="width:100%;max-width:1200px;">'+usr[1]+'</div>') : '')}		
	<table cellpadding="5" cellspacing="5" border="0" align="center" style="width:100%;max-width:1200px;" id="ResTableData"></table>`);
	gen_view_resourses();
	//${(usr[1] ? ('<tr><td align="center" class="inv" bgcolor="#FFFFFF">'+usr[1]+'</td></tr>') : '')}
}

function gen_view_resourses()
{
	//var r = '<tr><td bgcolor="#CCCCCC" align="center">Название</td><td bgcolor="#CCCCCC" align="center">Характеристики</td><td bgcolor="#CCCCCC" align="center" width="100">Количество</td><td bgcolor="#CCCCCC" align="center" width="100">Цена</td><td bgcolor="#CCCCCC" align="center" width="100"> </td></tr>';
	var r = '';
	var rs;
	
	
	for (var i=0; i<res.length; i++)
	{
		clr = (count%2==0) ? 'greyBlock' : 'whiteBlock';
		clr2 = (count%2==0) ? 'whiteBlock' : 'greyBlock';
		count++;
		rs = res[i];
		r += `
		<tr>
		<td class="${clr} margin-5" align="center">
			<table cellpadding="0" cellspacing="0" align="center" width="100%">
			<tr class="${clr2}"><td width="50%" class="padding-5"><b>${rs[1]}</b> | Гос. Цена: <b>${rs[4]}</b> зм.</td><td width="25%" align="center" class="padding-5">В наличии: <b>${rs[3]}</b> шт.</td><td width="25%" align="center" class="padding-5">${Button_clicker(rs[0], ((rs[3]>0 && usr[0]>rs[4] && usr[2]<5) ? 1 : 0), rs[5])}</td></tr>
			<tr><td width="33%" class="padding-5"><img src="/images/weapons/${rs[6]}.gif" width="60" height="60"></td><td colspan="2" class="padding-5" width="67%">${gen_param(rs[2])}</td></tr>
			</table>
		</td>
		</tr>`;
	}
	
	$('#ResTableData').html(r);
}

function gen_param(p)
{
	var gp = '<table cellpadding="1" cellspacing="1" border="0" width="100%">';
	var i,p1,p2,s;
	p1 = p[0].split('@');
	p2 = p[1].split('@');
	
	for (i=0; i<p1.length; i++)
	{
		s = p1[i].split('=');
		gp+= '<tr>'+params(s[0], s[1])+'</tr>';
	}
	gp+= '</table>';
	return gp;
}

function windmenu(a)
{
	if (!c_showed)
	{
		$('#center2').css("display","block");
		c_showed=1;
		$('#zcenter').html('<div style="width:100%;text-align:right;padding:5px;"><a href="javascript:windmenu()"><img src="/images/icons/delete.png" title="Закрыть"></a></div><center class=but>'+a+'</center>'); 	
		$('#zcenter').show(1);
	}
	else
	{
		$('#center2').css("display","none");
		$('#zcenter').hide(1);
		c_showed=0;
	}
}

function Button_clicker(id, dis, tp)
{
	var Butt = '<input type=button class="inv_but" onclick="go_actopner(' + id + ', ' + dis + ',' + tp + ');"';
	//var Butt = '<input type=button class="inv_but" onclick="sebe_buhlo('+id+');"';
	Butt += '\'" value="Использовать">';
	return Butt;
}

function go_actopner(id,dis,tp)
{
	$("#zcenter").css({ left: '50%', top: '50%', width: '210px', transform: 'translate(-50%, -50%)' });
	$("#zcenter").addClass("whiteBlock");
	$("#zcenter").hide(1);
	var r = '';
	if (dis==1) r+= '<a href="javascript://" onClick="sebe_buhlo('+id+');" class="bga">Употребить</a>'; else r+= 'Вы слишком пьяны.';
	//if (tp==1) r+= '<a href="javascript://" onClick="go_friend('+id+')" class="bga">Угостить</a>';
	windmenu(r);
}

function sebe_buhlo(id)
{
	location = 'main.php?go_res='+id;
}


function go_friend(id)
{
	c_showed = 0;
	$("#zcenter").css({left:'50%',top:'50%',width:'210px',transform: 'translate(-50%, -50%)'});
	$("#zcenter").hide(1);
	var r = '<form action=main.php?go_friend='+id+' method=POST>Логин:<INPUT TYPE="text" name=fornickname id=fornickname  maxlength=25 class=laar><input type=submit value="Угастить" class=login style="width:100%"></FORM>';
	windmenu(r);
}

function params(id, val)
{
	var rt = '';
	switch (id)
	{
		case 's1': rt='<td width="50%">Сила:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b></td>'; break;
		case 's2': rt='<td width="50%">Ловкость:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b></td>'; break;
		case 's3': rt='<td width="50%">Удача:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b></td>'; break;
		case 's5': rt='<td width="50%">Разум:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b></td>'; break;
		case 's6': rt='<td width="50%">Энергия:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b></td>'; break;
		case 'kb': rt='<td width="50%">Броня:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b></td>'; break;
		case 'hp': rt='<td width="50%">Уровень жизни:</td><td width="50%">+ <b>'+Math.round(val*0.5)+'-'+val+'</b> HP</td>'; break;
		case 'ma': rt = '<td width="50%">Уровень энергии:</td><td width="50%">+ <b>' + Math.round(val * 0.5) + '-' + val + '</b> EP</td>'; break;
		case 'time': rt = '<td width="50%"><font color="#CC0000">Время действия</font>:</td><td width="50%"><b>' + (val / (60 * 60)) + '</b>ч</td>'; break;		
		//case '': rt=''; break;
		//case '': rt=''; break;
		//case '': rt=''; break;
		//case '': rt=''; break;
		//case '': rt=''; break;
		//case '': rt=''; break;
		
	}
	return rt;
}