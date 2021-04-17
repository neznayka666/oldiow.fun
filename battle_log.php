<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        background: #8E503A !important;
    }

    .logbox {
        background: rgb(211, 171, 144) !important;
        border: 0 !important;
    }

    .timef {
        color: #8A6246 !important;
    }

    .hp_in_f {
        font-size: 12px !important;
    }

    .h2 {
        COLOR: #7F3116 !important;
    }
    </style>
</head>

<body>
    <div style="height: 100%;">
        <div class="log-top" style="display:flex;">
            <div class="log-top-left"
                style="background:url('/images/info/top_left.gif') repeat-y; height:25px; width:27px;"></div>
            <div class="log-top-center" style="background:url('/images/info/top_center.gif'); height:25px; width:100%;">
            </div>
            <div class="log-top-right"
                style="background:url('/images/info/top_right.gif') repeat-y; height:25px; width:27px;">
            </div>
        </div>
        <div class="log-center" style="display:flex;height: 100%;">
            <div class="log-center-left" style="background:url('/images/info/left_2.gif');width:7px;">
            </div>
            <div class="log-center-center" style="width:75%; margin:25px auto;">

                <div class="log-bg-top" style="background:url('/images/info/line_1.gif');height:5px; width:100%;">
                </div>

                <div style="width:100%;display:flex;">

                    <div class="log-bg-left" style="background:url('/images/info/ileft.gif');width:7px;">
                    </div>
                    <div class="log-bg-center" style="background-color:#dab69e;width:100%;padding:25px;">
                        <div style="width:100%;display:flex;padding:25px 0;">
                            <div style="width:25%;text-align:left;"><img src="/images/info/clans_top.gif"></div>
                            <div style="width:50%;text-align:center;">
                                <h2>Лог боя</h3>
                            </div>
                            <div style="width:25%;text-align:right;"><img src="/images/info/logo.gif"></div>
                        </div>
                        <?php

	define('MICROLOAD', true);
	// Загружаем файл конфига, ВАЖНЫЙ.
	include ($_SERVER['DOCUMENT_ROOT'].'/configs/config.php');
	// Подключаемся к SQL базе
	$db = new MySQL(SQL_USER, SQL_PASS, SQL_BASE);
	############################## 
	
	$bid = intval($_GET["id"]);
	$page = intval($_GET["page"]);
	$results = intval($_GET["results"]);
	define("C_LIST",12);
	$pages = $db->sqlr("SELECT COUNT(*) FROM fight_log WHERE cfight=".$bid." ");
	$limits = $page*C_LIST; 
	if (!$results)
	{
		$res = $db->sql("SELECT * FROM fight_log WHERE cfight=".$bid." ORDER BY turn ASC LIMIT ".$limits.",".C_LIST."");
		while( $txt = mysql_fetch_assoc($res) )
			$s.= "['".$txt["time"]."','".str_replace("'",'"',$txt["log"])."'],";
	}
	
	$battle = $db->sqla("SELECT travm,oruj,type,result,ltime,timeout FROM fights WHERE id=".$bid."");
	if ($results)
	{
		echo "<div id=info style='visibility:hidden;height:0px;top:-10000;position:absolute;z-index:2;'>".$battle["result"]."</div>";
	}
	$s = substr($s,0,strlen($s)-1);
	$injury = $battle["travm"];
	$ins = $battle["oruj"];
	$finished = ($battle["type"] == 'f')? 1 : 0;
	$ltime = $battle["timeout"] + $battle["ltime"] - tme();
	echo "<script>
			var bid = ".$bid.";
			var page = ".$page.";
			var pages = ".intval($pages/C_LIST).";
			var log = [".$s."];
			var inj = ".$injury.";
			var ins = ".$ins.";
			var fin = ".$finished.";
			var ltime = ".$ltime.";
			var results = ".$results.";
	</script>";		
?>
                        <SCRIPT src="/js/battle_log.js?12"></SCRIPT>
                        <SCRIPT SRC='js/c.js'></SCRIPT>
                        <SCRIPT SRC='js/end.js'></SCRIPT>



                    </div>

                    <div class="log-bg-right" style="background: url('/images/info/iright.gif');width:9px;">

                    </div>
                </div>

                <div class="log-bg-bottom" style="background:url('/images/info/line_1.gif');height:5px; width:100%;">
                </div>
            </div>


            <div class="log-center-right" style="background:url('/images/info/right_2.gif'); width:7px;">
            </div>
        </div>
        <div class="log-center">
            <div class="log-bottom" style="background:url('/images/info/bottom_center.gif');height:7px; width:100%;">
            </div>
        </div>
    </div>
</body>

</html>