<?php

if ( isset($_GET['save']) )
{
	$text = htmlspecialchars($_POST['msg_text']);
	if ( !empty($text) ) 
		$db->sql('UPDATE `lib_content` SET `text`="'.$text.'" WHERE `id`="'.$_GET['act'].'";');
}
elseif ( isset($_GET['edit']) )
{
	?>
<table class="bb_bar">
    <tr>
        <td><img src="./img/bb_icons/bold.png" alt="Жирным" onClick="add_code('b')" /></td>
        <td><img src="./img/bb_icons/italic.png" alt="Курсив" onClick="add_code('i')" /></td>
        <td><img src="./img/bb_icons/underline.png" alt="Подчеркнуть" onClick="add_code('u')" /></td>
        <td><img src="./img/bb_icons/align_justify.png" alt="По центру" onClick="add_code('center')" /></td>
        <td><img src="./img/bb_icons/blockquote.png" alt="Цитата" onClick="add_code('quote')" /></td>
        <td><img src="./img/bb_icons/insert_link.png" alt="Ссылка" onClick="add_code('url')" /></td>
        <td><img src="./img/bb_icons/insert_image.png" alt="Картинка" onClick="add_code('img')" /></td>
    </tr>
</table>
<form method="POST" action="?act=<?php echo $res['id'];?>&save=1">
    <textarea id="text" name="msg_text" rows="10" wrap="physical"
        style="width:100%"><?php echo $res['text'];?></textarea>
    <input type="submit" value="Отправить" class="login"><input type="reset" value="Очистить" class="login">
</form>
<?php
}

?>