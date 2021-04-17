var iRevision = 20;
var prev_select_id = false;
var txt = '';

// Восстановим сохранившееся меню
if (casheGet('menu') && parseInt(casheGet('revision')) == iRevision)
{
	$('id_menu').innerHTML = casheGet('menu');
}


function q_expand(obj,height)
{
	if(obj.style.height=='auto') 
	{
		obj.style.height = height+'px'; 
		obj.style.overflow = 'hidden';
	}
	else 
	{
		obj.style.height = 'auto';
		obj.style.overflow = 'visible';
	}
}

function restore_menu (id)
{
	var obj = document.getElementById(id);
	if (obj)
	{
		obj.innerHTML = obj.innerHTML + '&nbsp;&raquo;';
		obj = obj.parentNode;
		while (obj.className=='menu_name' || obj.className=='menu_content')
		{
			obj.style.height = 'auto';
			obj.style.overflow = 'visible';
			obj = obj.parentNode;
		}
	}
}

function save_menu(obj)
{
	/*
	// Удалим курсор у предыдущего пункта меню
	if (prev_select_id)
		$(prev_select_id).innerHTML = $(prev_select_id).innerHTML.replace('&nbsp;&laquo;','');
	obj.parentNode.innerHTML = obj.parentNode.innerHTML + '&nbsp;&laquo;';
	// Сменим предыдущего
	prev_select_id = obj.parentNode.id;	
	*/
	cashePut('menu', $('id_menu').innerHTML);
	cashePut('revision',iRevision);
}

function add_code(code)
{
	if (document.selection)
	{
		str = document.selection.createRange();
		str.text = '['+code+']'+str.text+'[/'+code+']';
    }else{
		txt = document.getElementById('text');
		txt.value = txt.value.substring(0, txt.selectionStart)+'['+code+']'+txt.value.substring(txt.selectionStart, txt.selectionEnd)+'[/'+code+']'+txt.value.substring(txt.selectionEnd, txt.value.length);
	}
}