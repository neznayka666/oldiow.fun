<?
if (isset($_GET["wood"]) and $this->pers["waiter"]<tme())
{
	if ($cell["last_trees_change"]<(time()-WOOD_CHANGE))
	{
		$w = $this->db->sqla("SELECT COUNT(image) FROM `trees_cell` WHERE x_y='".$cell["x"]."_".$cell["y"]."'");
		if ($w[0]>WOOD_COUNT)
		$this->db->sql("DELETE FROM trees_cell WHERE x_y='".$cell["x"]."_".$cell["y"]."'");
		$h = $this->db->sqla("SELECT * FROM trees WHERE image%5=".($cell["wood"]-1)." ORDER BY RAND() LIMIT 1");
		$this->db->sql("INSERT INTO `trees_cell` ( `image` , `name` , `time` , `x_y` ) 
VALUES ('".$h["image"]."', '".$h["name"]."', '".(time()-WOOD_GROW-1)."', '".$cell["x"]."_".$cell["y"]."');");
		$this->db->sql("UPDATE nature SET last_trees_change=".time()." WHERE x=".$cell["x"]." and y=".$cell["y"]."");
	}
	$this->pers["waiter"]=round(time()+HLOOK_TIME);
	set_vars("action=1,waiter=".round(time()+HLOOK_TIME),$this->pers["uid"]);
	//echo "<script>waiter(".(40).");</script><center class=items><b>Осмотр.</b></center><hr><div id=waiter class=items align=center></div>";
	$res = $this->db->sql("SELECT * FROM trees_cell WHERE x_y='".$cell["x"]."_".$cell["y"]."'");
	echo "<table cellspacing=0 cellspadding=0 width=500 border=0  Style=\"background-image:url('images/DS/chat_bg.jpg')\">";
	$i=0;
	$wood_grow = WOOD_GROW;
	if (WEATHER==2) $wood_grow/=2;
	if (WEATHER==3) $wood_grow*=2;
	if (WEATHER==1 and date("m")>5 and date("m")<9) $wood_grow*=3;
	if (WEATHER==6) $wood_grow/=3;
	while ($h = mysql_fetch_array($res))
	{
		if ($i%3==0) echo "<tr>";
		echo "<td width=30% class=but align=center>
		<b>".$h["name"]."</b><br>
		<img src=images/weapons/trees/".$h["image"].".gif title='".$h["name"]."' style='border-style: outset; border-width: 3; border-color:#FFFFFF;'><br>";
		if (($h["time"]+$wood_grow)>=tme()) 
		echo "<i>Срублено</i>";
		else 
		{
		$w = $this->db->sqla("SELECT id FROM wp WHERE uidp=".$this->pers["uid"]." and weared=1 and p_type=2 and durability>0");
		if ($w["id"])
		echo "<input type=button class=but value='Срубить' onclick=\"location='main.php?get_wood=".$h["image"]."&code=".md5($this->pers["city"].$h["name"])."'\" style='cursor:pointer;'>";
		else
		echo "<i>Нет инструмента</i>";
		}
		echo"</td>";
		$i++;
		if ($i%3==0) echo "</tr>";
	}
	echo "</table>";
}
?>