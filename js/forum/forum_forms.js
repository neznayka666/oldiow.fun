function view_forum_form_direct(){
	var i,s,j;
	var all_data = fdata.length;
	
	d.write('<FORM action="/action/" method=POST><input type=hidden name=act value=11><input type=hidden name=f value='+fmain[0]+'><input type=hidden name=p value='+fmain[1]+'><input type=hidden name=id value='+fmain[2]+'><input type=hidden name=tp value='+fmain[3]+'>');
	d.write('<SELECT class="inputTxt" name=forum_id>');
	for(i=0; i<all_data; i++){
		d.write('<option value=0>'+fdata[i][0]+'</option>');
		s = fdata[i].length;
		for(j=1; j<s; j++) d.write('<option value='+fdata[i][j][0]+'>------- '+fdata[i][j][1]+'</option>');
	}
	d.write('</SELECT><BR>');
	d.write('<INPUT type="submit" value="  Перенести  " class="inputTxt">');
	d.write('</FORM>');
}

function view_forum_error()
{

}