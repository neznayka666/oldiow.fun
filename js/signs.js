var align_ar = [];align_ar[0] = ";";align_ar['darks'] = "darks.gif;Дети Тьмы";align_ar['lights'] = "lights.gif;Дети Света";align_ar['sumers'] = "sumers.gif;Дети Сумерек";align_ar['chaoss'] = "chaoss.gif;Дети Хаоса";align_ar['light'] = "light.gif;Истинный Свет";align_ar['dark'] = "dark.gif;Истинная Тьма";align_ar['sumer'] = "sumer.gif;Нейтральные Сумерки";align_ar['chaos'] = "chaos.gif;Абсолютный Хаос";align_ar['angel'] = "angel.gif;Ангел";

var reg_exp = /[f]\d\d\d/i;

function sh_align(alid,mode)
{
    if(alid != '')
    {
        split_ar = align_ar[alid].split(";");
        return '<img src="http://'+img_host+'/signs/align/'+split_ar[0]+'" width=15 height=12 border=0 align=absmiddle alt="'+split_ar[1]+'">'+(!mode ? '&nbsp;' : '');
    }
    return '';
}

function sh_sign(sign,signn,signs)
{
    if(sign && sign!='none') return '<img src=http://'+img_host+'/signs/'+sign+' width=15 height=12 border=0 align=absmiddle alt=" '+signn+(signs ? ' ('+signs+')' : '')+' ">&nbsp;';
    else return '';
}

function sh_sign_s(sign)
{
    if(sign && sign!='none') return '<img src=http://'+img_host+'/signs/'+sign+'.gif width=15 height=12 border=0 align=absmiddle>&nbsp;';
    else return '';
}
