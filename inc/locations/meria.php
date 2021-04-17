<script type="text/javascript" src="/globals/JS/auction_v06.js"></script>
<center>
    <div
        style="width:525px; height:25px; background-image:url(/interface/clan_top2.gif); background-repeat:no-repeat; vertical-align:top; padding-top:5px;">
        <a href="/main.php?clans=1"><strong>Кланы</strong></a><br>
        <br><a href="/main.php?clans=1&new=1"><strong>Заявка на регистрацию клана</strong></a> | <a
            href="/main.php?clans=1&del=1"><strong>Заявка на расформирование клана</strong></a>

        <?php
if (isset ($req))
	{
		echo '<tr>
		<td class=hp colspan=3 align=center valign=center>Ваша заявка на рассмотрении.</td>
		</tr>';
	}
if (isset($_GET["new"])) { $new = $_GET["new"];}
if (isset($_GET["del"])) { $del = $_GET["del"];}
if (isset ($new) or ($del))
{
print <<<HERE
<form align="left" name="form1" method="post" action="">

	 		          <p>
           <label>
             <select size="1" name="align" class="laar"><option selected value="light">Свет</option><option value="dark">Тьма</option><option value="сhaos">Хаос</option><option value="middle">Равновесие</option></select> - [Склонность]
             </label>
         </p>
		 
		            <label>
             <input class='laar' value="" type="file" name="sign" id="sign"> - [Значек Клана]
             </label>
			 
         <p>
           <label>
             <input class='laar' value="" type="text" name="name" id="name"> - [Название Клана]
             </label>
         </p>
		 
		          <p>
           <label>
             <input class='laar' value="" type="text" name="glav" id="glav"> - [Глава Клана]
             </label>
         </p>
		 
		 		          <p>
           <label>
             <input class='laar' value="" type="text" name="sait" id="sait"> - [Сайт Клана]
             </label>
         </p>
         <p>
           <label>
           <input class="laar" type="submit" name="submit" id="submit" value="Подать заявку">
           </label>
         </p>
       </form>



HERE;
}

$req = sqlr("SELECT id_req FROM clan_request WHERE id_req=creq".$pers["uid"]);
	if (($_POST['name']) and $_FILES["sign"]["type"]=="image/gif")
{
	sql("INSERT INTO `clan_request` ( `id_req` , `name_req` , `glav_req` , `sign_req` , `align_req`, `sait_req` ) 
VALUES (
'creq".$pers["uid"]."', '".addslashes($_POST["name"])."', '".addslashes($_POST["glav"])."', 'creq".$pers["uid"]."', '".addslashes($_POST["align"])."','".addslashes($_POST["sait"])."');");

	print "<pre>";
if (move_uploaded_file($_FILES['sign']['tmp_name'], "images/tmp/creq".$pers["uid"].".gif")) 
{
				set_vars("money=money-100000",$pers["uid"]);
				$req = 1;
	}

}


?>