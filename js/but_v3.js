document.write('<LINK href="/css/ch_main_v2.css" rel="STYLESHEET" type="text/css"><body topmargin="0" style="word-spacing: 0; margin-left: 0; margin-right: 0" leftmargin=0><form action="/msg.php" target="ChatRefresh" method=POST name=mess onsubmit="return top.mess();">');
function cler()
{
	document.mess.message.value = "";
}
function show_buttons(sign)
{// /public_content/butimg
	var send = "onclick=\"document.mess.submit();\" style=\"cursor:pointer\"";
	var smiles = "onclick=\"top.show_smiles();\" style=\"cursor:pointer\"";
	var refresh = "onclick=\"top.ch_refresh()\" style=\"cursor:pointer\"";
	var clear = "onclick=\"top.cl_chat()\" style=\"cursor:pointer\"";
	var tref = "<img src='/images/nav/bottom/10_chat.png' onclick=\"top.change_chatspeed();\" name=chatspeed title=\"Скорость обновления (раз в 10 секунд)\">";
	var lat = "<img src='/images/nav/bottom/translit_off.png' onclick=\"top.ruslat_c();\" name=translit title=\"Транслит выключен\">";
	var setup = "<img src='/images/nav/bottom/chat_all.png' name=chatfyo onclick=\"top.change_chatsetup();\" title=\"Показывать все сообщения\">";
	var possib = "<img src='/images/nav/bottom/other.png' name=sdfsss onclick=\"top.frames['main_top'].location='/main.php?addon=action'\" title=\"Возможности\">";
	var sizec = 330;//300
	document.write('<div class="navBottom">');
	document.write('<div class="navBottomLeft"><img border="0" src="/images/nav/bottom/main.png" height="27"></div>');
	document.write('<div class="navBottomSay" id="ttype" onclick="ch_ttype(\''+sign+'\')">&nbsp;</div>');
	document.write('<div class="navBottomInput">');
	document.write('<input type="hidden" name="ttype" value="0">');
	document.write('<input type="hidden" name="type" value="1">');
	document.write('<input class="laar" title="Сообщение" size="256" name="message">');
	document.write('</div>');
	document.write('<div class="navBottomBtn"> ');
	document.write('<div class="navBottomBtn1" '+send+'>&nbsp;</div> ');
	document.write('<div class="navBottomBtn2" '+clear+'>&nbsp;</div> ');
	document.write('<div class="navBottomBtn3" '+refresh+'>&nbsp;</div>');
	document.write('<div class="navBottomBtn5"> '+tref+'</div>');
	document.write('<div class="navBottomBtn5">'+setup+'</div>');
	document.write('<div class="navBottomBtn5">'+lat+'</div> ');
	document.write('<div class="navBottomBtn6">'+possib+'</div>');
	document.write('<div class="navBottomClock" id="jtimer">Clock</div>');
	document.write('<div class="navBottomBtn4" '+smiles+'>&nbsp;</div>');
	document.write('</div>');
	document.write('</div>');

	ch_ttype(sign);
	clock();
}

function clock() { 
	jtime[2]++; var vt = [];
	if (jtime[2]>59) { jtime[2]=0; jtime[1]++; }
	if (jtime[1]>59) { jtime[1]=0; jtime[0]++; }
	if (jtime[0]>23) jtime[0]=0;
	if (jtime[0]<10) vt[0]="0"+jtime[0]; else vt[0]= jtime[0];
	if (jtime[1]<10) vt[1]="0"+jtime[1]; else vt[1]= jtime[1];
	if (jtime[2]<10) vt[2]="0"+jtime[2]; else vt[2]= jtime[2];
    ServerTime = vt[0] + ":" + vt[1] + ":" + vt[2]; 
	top.HOURS = jtime[0]; top.MINUTES = jtime[1]; top.SECONDS = jtime[2];
    document.getElementById('jtimer').innerHTML = ServerTime;
    Timer = setTimeout("clock()", 1000); 
}

function ch_ttype(sign,m)
{
	if (m===0)
	{
		document.mess.ttype.value = 'all';
		document.getElementById('ttype').innerHTML = '<b class="lall">ВСЕМ</b>';
	}else
	if (document.mess.ttype.value == 'priv' && sign || m==2)
	{
		document.mess.ttype.value = 'clan';
		document.getElementById('ttype').innerHTML = '<b class="lclan">КЛАН</b>';
	}else
	if (document.mess.ttype.value == 'all' || m==1)
	{
		document.mess.ttype.value = 'priv';
		document.getElementById('ttype').innerHTML = '<b class="lpriv">ПРИВАТ</b>';
	}else
	{
		document.mess.ttype.value = 'all';
		document.getElementById('ttype').innerHTML = '<b class="lall">ВСЕМ</b>';
	}
}