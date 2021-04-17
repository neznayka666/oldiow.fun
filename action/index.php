<?php
if(empty($_REQUEST['act'])){
	exit(header("Location: /"));
}
include( $_SERVER["DOCUMENT_ROOT"] . "/includes/config.inc.php");
include( DROOT . "/includes/functions.inc.php");

$pers = GetUser();

$access = explode("|",$pers['forum_accesses']);

switch($_REQUEST['act']){
	case'1':/* Добовляем Тему / Сообщение */
		if(in_array('1',$access)){
			include( DROOT . "/includes/bbcodes.inc.php");
			if($_POST['subact'] == '1'){
				if(!empty($_POST['topic_subj']) and !empty($_POST['topic_mess'])){
					mysql_query("INSERT INTO `forum_topics` (`fid`,`name`,`msg`,`poster`,`create`,`lastmsg`,`lposter`) VALUES ('".$_POST['f']."','".htmlspecialchars($_POST['topic_subj'])."','".bbCodes($_POST['topic_mess'])."','".PosterIns($pers['uid'])."','".time()."','".time()."','".PosterIns($pers['uid'])."');");
					$lastid = mysql_fetch_array(mysql_query("SELECT LAST_INSERT_ID()"));
				}
				header("Location: /".$_POST['f']."/1/".$lastid[0]."/1");
			}elseif($_POST['subact'] == '2'){
				if(!empty($_POST['reply_mess']) and !empty($_POST['reply_subj'])){
					mysql_query("INSERT INTO `forum_posts` (`fid`, `tid`, `name`, `msg`, `poster`, `time`) VALUES ('".$_POST['f']."', '".$_POST['id']."', '".htmlspecialchars($_POST['reply_subj'])."', '".bbCodes($_POST['reply_mess'])."', '".PosterIns($pers['uid'])."', '".time()."');");
					mysql_query("UPDATE `forum_topics` SET `lastmsg`='".time()."',`lposter`='".PosterIns($pers['uid'])."' WHERE `id`='".$_POST['id']."'");
					$lastid = mysql_fetch_array(mysql_query("SELECT LAST_INSERT_ID()"));
				}
				header("Location: /".$_POST['f']."/1/".$_POST['id']."/1");
			}
		}
	break;
	case'2':/* Закрыть / Открыть тему */
		if(in_array('32',$access)){
			$post = mysql_fetch_array(mysql_query("SELECT `id`,`close` FROM `forum_topics` WHERE `id` = '".intval($_GET['id'])."'"));
			if($post['close'] == '0'){
				mysql_query("UPDATE `forum_topics` SET `close` = '1' WHERE `id` = '".$post['id']."'");
				header("Location: /".$_GET['f']."/".$_GET['p']."/".$_GET['id']."/".$_GET['tp']."/");
			}elseif($post['close'] == '1'){
				mysql_query("UPDATE `forum_topics` SET `close` = '0' WHERE `id` = '".$post['id']."'");
				header("Location: /".$_GET['f']."/".$_GET['p']."/".$_GET['id']."/".$_GET['tp']."/");
			}
		}
	break;
	case'3':/* Переместить тему */
		if(in_array('64',$access)){
			echo'<script>SubmitForm = function(){$.ajax({type: "POST",url: "/action/?act=11&f='.$_GET['f'].'&p='.$_GET['p'].'&id='.$_GET['id'].'&tp='.$_GET['tp'].'",cache: false,data:{\'forum_id\' : $(\'#forum_id\').val(),\'id\' : '.$_GET['id'].'},success: function(response){$("#CloseBut").click();if($(\'#forum_id\').val()!=0){location = \'/\'+$(\'#forum_id\').val()+\'/1\';}}});}</script><table cellpadding="0" cellspacing="0" border="0" width="650"><tr><td width="70"><img src="http://'.IMG.'/forum/design/ff1.gif" width="70" height="17" border="0"></td><td><img src="http://'.IMG.'/forum/design/ff2.gif" width="26" height="17" border="0" align="left"><img src="http://'.IMG.'/forum/design/ff3.gif" width="26" height="17" border="0" align="right"></td><td width="70"><img src="http://'.IMG.'/forum/design/ff4.gif" width="70" height="17" border="0"></td></tr><tr><td><img src="http://'.IMG.'/forum/design/ff5.gif" width="70" height="39" border="0"></td><td class="tbg" valign="top" style="padding-top: 8px;"><span class="redText">Перемещение темы</span></td><td><img src="http://'.IMG.'/forum/design/ff6.gif" width="70" height="39" border="0"></td></tr><tr><td class="forBg1Inner">&nbsp;</td><td style="padding-top: 10px"><form onSubmit="SubmitForm();return false;"><table cellpadding="3" cellspacing="0" width="98%" align="center" border="0"><tr><td><strong>Разделы:</strong></td><td width="100%"><select class="inputTxt" style="width:100%;" name="forum_id" id="forum_id">';
			$Cats = mysql_query("SELECT `id`,`name` FROM `forum_cat` ORDER BY `id` ASC");
			while($cat=mysql_fetch_array($Cats)){
				echo'<option value=0>'.$cat['name'].'</option>';
				$Sec = mysql_query("SELECT `id`,`name` FROM `forum_section` WHERE `cid`='".$cat['id']."' ORDER BY `id` ASC");
				while($sec=mysql_fetch_array($Sec)){
					echo'<option value='.$sec['id'].'>------- '.$sec['name'].'</option>';
				}
			}
			echo'</select></td></tr><tr><td colspan="2" align="center"><div style="position: relative; width: 100%; height: auto;"><input type="submit" name="s" value="  Перенести  " class=buttons></div></td></tr></table></form></td><td class="forBg2Inner">&nbsp;</td></tr><tr><td><img src="http://'.IMG.'/forum/design/ff7.gif" width="70" height="44" border="0"></td><td class="ffbg">&nbsp;</td><td><img src="http://'.IMG.'/forum/design/ff8.gif" width="70" height="44" border="0"></td></tr></table>';
		}
	break;
	case'4':/* Удалить тему */
		if(in_array('128',$access)){
			mysql_query("DELETE FROM `forum_topics` WHERE `id` = '".intval($_GET['id'])."'");
			mysql_query("DELETE FROM `forum_posts` WHERE `tid` = '".intval($_GET['id'])."'");
			header("Location: /".$_GET['f']."/".$_GET['p']."/");	
		}
	break;
	case'5':/* Изменить тему */
		if(in_array('256',$access)){
			include( DROOT . "/includes/bbcodes.inc.php");
			if(!empty($_POST)){
				foreach($_POST as $val=>$key){
					$_POST[$val] = iconv("UTF-8","windows-1251",$key);
				}
				mysql_query("UPDATE `forum_topics` SET `name` = '".htmlspecialchars($_POST['reply_subj'])."',`msg` = '".bbCodes($_POST['reply_mess'])."' WHERE `id` = '".intval($_GET['id'])."'");
			}elseif(empty($_POST)){
				$EditTop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_topics` WHERE `id` = '".intval($_GET['id'])."'"));
				if(!empty($EditTop['id'])){
					echo'<script>SubmitForm = function(){$.ajax({type: "POST",url: "/action/?act=5&f='.$_GET['f'].'&p='.$_GET['p'].'&id='.$_GET['id'].'&tp='.$_GET['tp'].'",cache: false,data:{\'reply_subj\' : $(\'#reply_subj\').val(),\'reply_mess\' : $(\'#reply_mess\').val()},success: function(response){$("#CloseBut").click();window.location.reload();}});}</script><table cellpadding="0" cellspacing="0" border="0" width="650"><tr><td width="70"><img src="http://'.IMG.'/forum/design/ff1.gif" width="70" height="17" border="0"></td><td><img src="http://'.IMG.'/forum/design/ff2.gif" width="26" height="17" border="0" align="left"><img src="http://'.IMG.'/forum/design/ff3.gif" width="26" height="17" border="0" align="right"></td><td width="70"><img src="http://'.IMG.'/forum/design/ff4.gif" width="70" height="17" border="0"></td></tr><tr><td><img src="http://'.IMG.'/forum/design/ff5.gif" width="70" height="39" border="0"></td><td class="tbg" valign="top" style="padding-top: 8px;"><span class="redText">Редактирование темы</span></td><td><img src="http://'.IMG.'/forum/design/ff6.gif" width="70" height="39" border="0"></td></tr><tr><td class="forBg1Inner">&nbsp;</td><td style="padding-top: 10px"><form onSubmit="SubmitForm();return false;"><table cellpadding="3" cellspacing="0" width="98%" align="center" border="0"><tr><td><strong>Заголовок:</strong></td><td width="100%"><input class="inputTxt" type="text" name="reply_subj" id="reply_subj" value="'.$EditTop['name'].'" style="width:99%;"></td></tr><tr><td colspan="2"><strong>Сообщение:</strong></td></tr><tr><td colspan="2"><textarea class="inputTxt" style="width: 99%;" name="reply_mess" id="reply_mess" cols="40" rows="5">'.deCodes($EditTop['msg']).'</textarea></td></tr><tr><td colspan="2" align="center"><div style="position: relative; width: 100%; height: auto;"><input type="submit" name="s" value="  Сохранить  " class=buttons></div></td></tr></table></form></td><td class="forBg2Inner">&nbsp;</td></tr><tr><td><img src="http://'.IMG.'/forum/design/ff7.gif" width="70" height="44" border="0"></td><td class="ffbg">&nbsp;</td><td><img src="http://'.IMG.'/forum/design/ff8.gif" width="70" height="44" border="0"></td></tr></table>';
				}
			}
		}
	break;
	case'6':/* Открыть / Скрыть сообщение */
		if(in_array('2048',$access)){
			$post = mysql_fetch_array(mysql_query("SELECT `id`,`hide` FROM `forum_posts` WHERE `id` = '".intval($_GET['rid'])."'"));
			if($post['hide'] == '0'){
				mysql_query("UPDATE `forum_posts` SET `hide` = '1', `hposter` = '".PosterIns($pers['uid'])."' WHERE `id` = '".$post['id']."'");
				header("Location: /".$_GET['f']."/".$_GET['p']."/".$_GET['id']."/".$_GET['tp']."/");
			}elseif($post['hide'] == '1'){
				mysql_query("UPDATE `forum_posts` SET `hide` = '0', `hposter` = '||||0|0' WHERE `id` = '".$post['id']."'");
				header("Location: /".$_GET['f']."/".$_GET['p']."/".$_GET['id']."/".$_GET['tp']."/");
			}
		}
	break;
	case'7':/* Удалить сообщение */
		if(in_array('4096',$access)){
			mysql_query("DELETE FROM `forum_posts` WHERE `id` = '".intval($_GET['rid'])."'");
			header("Location: /".$_GET['f']."/".$_GET['p']."/".$_GET['id']."/".$_GET['tp']."/");
		}
	break;
	case'8':/* Изменить сообщение */
		if(in_array('8192',$access)){
			include( DROOT . "/includes/bbcodes.inc.php");
			if(!empty($_POST)){
				foreach($_POST as $val=>$key){
					$_POST[$val] = iconv("UTF-8","windows-1251",$key);
				}
				mysql_query("UPDATE `forum_posts` SET `name` = '".htmlspecialchars($_POST['reply_subj'])."',`msg` = '".bbCodes($_POST['reply_mess'])."' WHERE `id` = '".intval($_GET['rid'])."'");
			}elseif(empty($_POST)){
				$EditPost = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_posts` WHERE `id` = '".intval($_GET['rid'])."'"));
				if(!empty($EditPost['id'])){
					echo'<script>SubmitForm = function(){$.ajax({type: "POST",url: "/action/?act=8&f='.$_GET['f'].'&p='.$_GET['p'].'&id='.$_GET['id'].'&tp='.$_GET['tp'].'&rid='.$_GET['rid'].'",cache: false,data:{\'reply_subj\' : $(\'#reply_subj\').val(),\'reply_mess\' : $(\'#reply_mess\').val()},success: function(response){$("#CloseBut").click();window.location.reload();}});}</script><table cellpadding="0" cellspacing="0" border="0" width="650"><tr><td width="70"><img src="http://'.IMG.'/forum/design/ff1.gif" width="70" height="17" border="0"></td><td><img src="http://'.IMG.'/forum/design/ff2.gif" width="26" height="17" border="0" align="left"><img src="http://'.IMG.'/forum/design/ff3.gif" width="26" height="17" border="0" align="right"></td><td width="70"><img src="http://'.IMG.'/forum/design/ff4.gif" width="70" height="17" border="0"></td></tr><tr><td><img src="http://'.IMG.'/forum/design/ff5.gif" width="70" height="39" border="0"></td><td class="tbg" valign="top" style="padding-top: 8px;"><span class="redText">Редактирование сообщения</span></td><td><img src="http://'.IMG.'/forum/design/ff6.gif" width="70" height="39" border="0"></td></tr><tr><td class="forBg1Inner">&nbsp;</td><td style="padding-top: 10px"><form onSubmit="SubmitForm();return false;"><table cellpadding="3" cellspacing="0" width="98%" align="center" border="0"><tr><td><strong>Заголовок:</strong></td><td width="100%"><input class="inputTxt" type="text" name="reply_subj" id="reply_subj" value="'.$EditPost['name'].'" style="width:99%;" id="MTITLE"></td></tr><tr><td colspan="2"><strong>Сообщение:</strong></td></tr><tr><td colspan="2"><textarea class="inputTxt" style="width: 99%;" name="reply_mess" id="reply_mess" cols="40" rows="5" id="MESSAGE">'.deCodes($EditPost['msg']).'</textarea></td></tr><tr><td colspan="2" align="center"><div style="position: relative; width: 100%; height: auto;"><input type="submit" name="s" value="  Сохранить  " class=buttons></div></td></tr></table></form></td><td class="forBg2Inner">&nbsp;</td></tr><tr><td><img src="http://'.IMG.'/forum/design/ff7.gif" width="70" height="44" border="0"></td><td class="ffbg">&nbsp;</td><td><img src="http://'.IMG.'/forum/design/ff8.gif" width="70" height="44" border="0"></td></tr></table>';
				}
			}
		}
	break;
	case'9':/* Создать форум */
		if(in_array('32768',$access)){
		if(!empty($_GET['DelID'])){
			mysql_query("DELETE FROM `forum_section` WHERE `id`='".intval($_GET['DelID'])."'");
			header("Location: /action/?act=9&cat=".$_GET['cat']);
		}
		$array	= $_POST['arrayorder'];

		if ($_POST['update'] == "update"){
			$count = 1;
			foreach ($array as $idval) {
				mysql_query("UPDATE `forum_section` SET `listorder`=".$count." WHERE `id`='".$idval."'") or die('Ошибка');
				$count ++;
			}
			exit('Информация сохранена!');
		}elseif ($_POST['update'] == "chname"){
			
			mysql_query("UPDATE `forum_section` SET `name`='".iconv("UTF-8", "cp1251",$_POST['name'])."' WHERE `id`='".$_POST['id']."'");
			exit('Информация сохранена!');
		}elseif ($_POST['update'] == "add"){
			mysql_query("INSERT INTO `forum_section` (`cid`,`name`) VALUES ('".$_GET['cat']."','".$_POST['AddCat']."');");
		}
		
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <META Http-Equiv="Content-Type" Content="text/html; charset=utf-8">
    <TITLE>Форум Guild of Honor - Создать форум</TITLE>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
    <style>
    ul {
        padding: 0px;
        margin: 0px;
    }

    #response {
        padding: 10px;
        background-color: #9F9;
        border: 2px solid #396;
    }

    #list li {
        margin: 0 0 3px;
        padding: 8px;
        background-color: #333;
        color: #fff;
        list-style: none;
    }
    </style>
    <script type="text/javascript">
    function ShowForm(id, func) {
        if (func == 1) {
            document.getElementById('inputid_' + id).style.display = 'block';
            document.getElementById('textid_' + id).style.display = 'none';
        } else if (func == 2) {
            document.getElementById('inputid_' + id).style.display = 'none';
            document.getElementById('textid_' + id).style.display = 'block';
        }
    }

    function cheangename(id) {
        $.post("/action/?act=9", '&update=chname&id=' + id + '&name=' + encodeURIComponent($("#inptxt_" + id).val()),
            function(theResponse) {
                $("#textid_" + id).html('(<b>' + id + '</b>) ' + $("#inptxt_" + id).val());
                ShowForm(id, 2);
                $("#response").html(theResponse);
                $("#response").slideDown('slow');
                setTimeout(function() {
                    $("#response").slideUp("slow", function() {});
                }, 2000);
            });
    }
    $(document).ready(function() {
        function slideout() {
            setTimeout(function() {
                $("#response").slideUp("slow", function() {});
            }, 2000);
        }
        $("#response").hide();
        $(function() {
            $("#list ul").sortable({
                opacity: 0.8,
                cursor: 'move',
                update: function() {

                    var order = $(this).sortable("serialize") + '&update=update';
                    $.post("/action/?act=9", order, function(theResponse) {
                        $("#response").html(theResponse);
                        $("#response").slideDown('slow');
                        slideout();
                    });
                }
            });
        });

    });
    </script>
</head>

<body>
    <div id="response"></div>
    <table cellpadding="1" cellspacing="1" border="0" width="500" align="center">
        <?php
$result = mysql_query("SELECT * FROM `forum_cat` ORDER BY `listorder` ASC");
while($row = mysql_fetch_assoc($result)){
	$id = stripslashes($row['id']);
	$name = stripslashes($row['name']);
	echo'<tr><td style="background-color:#333;color:#fff;list-style: none;">(<b>'.$id.'</b>) <a href="/action/?act=9&cat='.$id.'"><font color="'.(($_GET['cat']==$id)?'red"><b>':'green">').$name.'</font></b></a></td></tr>';
}
if(!empty($_GET['cat'])){
?>
        <tr>
            <td>
                <div id="container">
                    <div id="list">
                        <ul><?php
$result = mysql_query("SELECT * FROM `forum_section` WHERE `cid`='".$_GET['cat']."' ORDER BY `listorder` ASC");
while($row = mysql_fetch_assoc($result)){
	$id = stripslashes($row['id']);
	$name = stripslashes($row['name']);
	echo'<li id="arrayorder_'.$id.'"><form method="POST" action=""><span id="textid_'.$id.'" ondblclick="ShowForm(\''.$id.'\',1)" style="display:block;">(<b>'.$id.'</b>) '.$name.'</span><span id="inputid_'.$id.'" style="display:none;">(<b>'.$id.'</b>) <input type="text" id="inptxt_'.$id.'" value="'.$name.'"><input type="button" onclick="cheangename(\''.$id.'\')" value="Изменить"><input type="button" onclick="ShowForm(\''.$id.'\',2)" value="Отменить"><input type="button" onClick="location=\'?act=9&cat='.$_GET['cat'].'&DelID='.$id.'\'" value="Удалить"></span></form></li>';
}?></ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center">
                <form method="POST" action="">
                    <input type="hidden" name="update" value="add"><input type="text" name="AddCat" style="width:300px;"
                        onfocus="if(this.value == 'Название форума') this.value  = '';"
                        onblur="if(this.value == '') this.value = 'Название форума';" value="Название форума"><input
                        type="submit" value="Добавить">
                </form>
            </td>
        </tr>
        <?php
}
?>
    </table>
</body>

</html>
<?php
		}
	break;
	case'10':/* Создать категорию */
		if(in_array('65536',$access)){
		if(!empty($_GET['DelID'])){
			mysql_query("DELETE FROM `forum_cat` WHERE `id`='".intval($_GET['DelID'])."'");
			header("Location: /action/?act=10");
		}
		$array	= $_POST['arrayorder'];

		if ($_POST['update'] == "update"){
			$count = 1;
			foreach ($array as $idval) {
				mysql_query("UPDATE `forum_cat` SET `listorder`=".$count." WHERE `id`='".$idval."'") or die('Ошибка');
				$count ++;
			}
			exit('Информация сохранена!');
		}elseif ($_POST['update'] == "chname"){
			
			mysql_query("UPDATE `forum_cat` SET `name`='".iconv("UTF-8", "cp1251",$_POST['name'])."' WHERE `id`='".$_POST['id']."'");
			exit('Информация сохранена!');
		}elseif ($_POST['update'] == "add"){
			mysql_query("INSERT INTO `forum_cat` (`name`) VALUES ('".$_POST['AddCat']."');");
		}
		
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <META Http-Equiv="Content-Type" Content="text/html; charset=utf-8">
    <TITLE>Форум Guild of Honor - Создать категорию</TITLE>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
    <style>
    ul {
        padding: 0px;
        margin: 0px;
    }

    #response {
        padding: 10px;
        background-color: #9F9;
        border: 2px solid #396;
    }

    #list li {
        margin: 0 0 3px;
        padding: 8px;
        background-color: #333;
        color: #fff;
        list-style: none;
    }
    </style>
    <script type="text/javascript">
    function ShowForm(id, func) {
        if (func == 1) {
            document.getElementById('inputid_' + id).style.display = 'block';
            document.getElementById('textid_' + id).style.display = 'none';
        } else if (func == 2) {
            document.getElementById('inputid_' + id).style.display = 'none';
            document.getElementById('textid_' + id).style.display = 'block';
        }
    }

    function cheangename(id) {
        $.post("/action/?act=10", '&update=chname&id=' + id + '&name=' + encodeURIComponent($("#inptxt_" + id).val()),
            function(theResponse) {
                $("#textid_" + id).html('(<b>' + id + '</b>) ' + $("#inptxt_" + id).val());
                ShowForm(id, 2);
                $("#response").html(theResponse);
                $("#response").slideDown('slow');
                setTimeout(function() {
                    $("#response").slideUp("slow", function() {});
                }, 2000);
            });
    }
    $(document).ready(function() {
        function slideout() {
            setTimeout(function() {
                $("#response").slideUp("slow", function() {});
            }, 2000);
        }
        $("#response").hide();
        $(function() {
            $("#list ul").sortable({
                opacity: 0.8,
                cursor: 'move',
                update: function() {

                    var order = $(this).sortable("serialize") + '&update=update';
                    $.post("/action/?act=10", order, function(theResponse) {
                        $("#response").html(theResponse);
                        $("#response").slideDown('slow');
                        slideout();
                    });
                }
            });
        });

    });
    </script>
</head>

<body>
    <div id="response"></div>
    <table cellpadding="0" cellspacing="0" border="0" width="500" align="center">
        <tr>
            <td>
                <div id="container">
                    <div id="list">
                        <ul><?php
$result = mysql_query("SELECT * FROM `forum_cat` ORDER BY `listorder` ASC");
while($row = mysql_fetch_assoc($result)){
	$id = stripslashes($row['id']);
	$name = stripslashes($row['name']);
	echo'<li id="arrayorder_'.$id.'"><form method="POST" action=""><span id="textid_'.$id.'" ondblclick="ShowForm(\''.$id.'\',1)" style="display:block;">(<b>'.$id.'</b>) '.$name.'</span><span id="inputid_'.$id.'" style="display:none;">(<b>'.$id.'</b>) <input type="text" id="inptxt_'.$id.'" value="'.$name.'"><input type="button" onclick="cheangename(\''.$id.'\')" value="Изменить"><input type="button" onclick="ShowForm(\''.$id.'\',2)" value="Отменить"><input type="button" onClick="location=\'?act=10&DelID='.$id.'\'" value="Удалить"></span></form></li>';
}?></ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td align="center">
                <form method="POST" action="">
                    <input type="hidden" name="update" value="add"><input type="text" name="AddCat" style="width:300px;"
                        onfocus="if(this.value == 'Название раздела') this.value  = '';"
                        onblur="if(this.value == '') this.value = 'Название раздела';" value="Название раздела"><input
                        type="submit" value="Добавить">
                </form>
            </td>
        </tr>
    </table>
</body>

</html>
<?php
		}
	break;
	case'11':/* Переместить тему */
		if(in_array('64',$access)){
			if($_POST['forum_id'] != '0'){
				mysql_query("UPDATE `forum_topics` SET `fid` = '".intval($_POST['forum_id'])."' WHERE `id` = '".intval($_POST['id'])."'");
				mysql_query("UPDATE `forum_posts` SET `fid` = '".intval($_POST['forum_id'])."' WHERE `tid` = '".intval($_POST['id'])."'");
			}
		}
	break;
	case'12':/* Закрепить / Открепить тему */
		if(in_array('512',$access)){
			$post = mysql_fetch_array(mysql_query("SELECT `id`,`fixed` FROM `forum_topics` WHERE `id` = '".intval($_GET['id'])."'"));
			if($post['fixed'] == '0'){
				mysql_query("UPDATE `forum_topics` SET `fixed` = '1' WHERE `id` = '".$post['id']."'");
				header("Location: /".$_GET['f']."/".$_GET['p']."/");
			}elseif($post['fixed'] == '1'){
				mysql_query("UPDATE `forum_topics` SET `fixed` = '0' WHERE `id` = '".$post['id']."'");
				header("Location: /".$_GET['f']."/".$_GET['p']."/");
			}
		}
	break;
}
?>