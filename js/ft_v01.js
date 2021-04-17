var r;
var s = screen;
var sfo = s.width+'*'+s.height;
var dep = s.colorDepth ? s.colorDepth : s.pixelDepth;

function ft_s(t)
{
	return '';
	r = escape(d.referrer);
	switch(t)
	{
		case 1: return '<a href="http://top.mail.ru/jump?from=2126703" target="_blank"><img src="http://top.list.ru/counter?id=2126703;t=69;js=11;r='+r+';j='+navigator.javaEnabled()+';s='+sfo+';d='+dep+';rand='+Math.random()+'" border="0" height="31" width="38" style="filter:alpha(opacity=50);"></a>';
		case 2: return '<a href="http://www.liveinternet.ru/click" target="_blank"><img src="http://counter.yadro.ru/hit?t44.2;r'+r+((typeof(s) == 'undefined') ? '' : ';s'+sfo+'*'+dep)+';u'+escape(d.URL)+';'+Math.random()+'" border="0" width="31" height="31" style="filter:alpha(opacity=50);"></a>';
	}
}