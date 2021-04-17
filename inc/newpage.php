<?php

if ( isset($_GET['getpg']) and isset($_POST['msg_text']) )
{
	$text = htmlspecialchars($_POST['msg_text']);
	if ( !empty($text) ) 
		$db->sql('INSERT INTO `lib_content` (`id`, `title`, `text`, `file`) 
			VALUES ('.$_GET['act'].', "'.$_POST['title'].'", "'.$text.'", "'.$_POST['filename'].'");');
}
elseif ( isset($_GET['new_page']) )
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
<form method="POST" action="?act=<?php echo $_GET['act'];?>&new_page=1&getpg=1">
    Заголовок <input type="text" name="title" value="" />
    <textarea id="text" name="msg_text" rows="10" wrap="physical" style="width:100%"> </textarea>
    <input type="submit" value="Отправить" class="login"><input type="reset" value="Очистить" class="login">
</form>
<?php

$stop_view = true;

}
?>