<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.2
*/error_reporting(6135);$Tc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Tc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Ei=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Ei)$$X=$Ei;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($v){$le=substr($v,-1);return
str_replace($le.$le,$le,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($ng,$Tc=false){if(get_magic_quotes_gpc()){while(list($z,$X)=each($ng)){foreach($X
as$be=>$W){unset($ng[$z][$be]);if(is_array($W)){$ng[$z][stripslashes($be)]=$W;$ng[]=&$ng[$z][stripslashes($be)];}else$ng[$z][stripslashes($be)]=($Tc?$W:stripslashes($W));}}}}function
bracket_escape($v,$Na=false){static$qi=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($v,($Na?array_flip($qi):$qi));}function
min_version($Vi,$_e="",$h=null){global$g;if(!$h)$h=$g;$ih=$h->server_info;if($_e&&preg_match('~([\d.]+)-MariaDB~',$ih,$B)){$ih=$B[1];$Vi=$_e;}return(version_compare($ih,$Vi)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($th,$pi="\n"){return"<script".nonce().">$th</script>$pi";}function
script_src($Ji){return"<script src='".h($Ji)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($C,$Y,$eb,$ie="",$pf="",$jb="",$je=""){$I="<input type='checkbox' name='$C' value='".h($Y)."'".($eb?" checked":"").($je?" aria-labelledby='$je'":"").">".($pf?script("qsl('input').onclick = function () { $pf };",""):"");return($ie!=""||$jb?"<label".($jb?" class='$jb'":"").">$I".h($ie)."</label>":$I);}function
optionlist($vf,$ch=null,$Ni=false){$I="";foreach($vf
as$be=>$W){$wf=array($be=>$W);if(is_array($W)){$I.='<optgroup label="'.h($be).'">';$wf=$W;}foreach($wf
as$z=>$X)$I.='<option'.($Ni||is_string($z)?' value="'.h($z).'"':'').(($Ni||is_string($z)?(string)$z:$X)===$ch?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($C,$vf,$Y="",$of=true,$je=""){if($of)return"<select name='".h($C)."'".($je?" aria-labelledby='$je'":"").">".optionlist($vf,$Y)."</select>".(is_string($of)?script("qsl('select').onchange = function () { $of };",""):"");$I="";foreach($vf
as$z=>$X)$I.="<label><input type='radio' name='".h($C)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ja,$vf,$Y="",$of="",$Zf=""){$Uh=($vf?"select":"input");return"<$Uh$Ja".($vf?"><option value=''>$Zf".optionlist($vf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Zf'>").($of?script("qsl('$Uh').onchange = $of;",""):"");}function
confirm($Je="",$dh="qsl('input')"){return
script("$dh.onclick = function () { return confirm('".($Je?js_escape($Je):'Are you sure?')."'); };","");}function
print_fieldset($u,$qe,$Yi=false){echo"<fieldset><legend>","<a href='#fieldset-$u'>$qe</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$u');",""),"</legend>","<div id='fieldset-$u'".($Yi?"":" class='hidden'").">\n";}function
bold($Va,$jb=""){return($Va?" class='active $jb'":($jb?" class='$jb'":""));}function
odd($I=' class="odd"'){static$t=0;if(!$I)$t=-1;return($t++%2?$I:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($z,$X=null){static$Uc=true;if($Uc)echo"{";if($z!=""){echo($Uc?"":",")."\n\t\"".addcslashes($z,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Uc=false;}else{echo"\n}\n";$Uc=true;}}function
ini_bool($Od){$X=ini_get($Od);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Ui,$N,$V,$F){$_SESSION["pwds"][$Ui][$N][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($P){global$g;return$g->quote($P);}function
get_vals($G,$e=0){global$g;$I=array();$H=$g->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$e];}return$I;}function
get_key_vals($G,$h=null,$lh=true){global$g;if(!is_object($h))$h=$g;$I=array();$H=$h->query($G);if(is_object($H)){while($J=$H->fetch_row()){if($lh)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$wb=(is_object($h)?$h:$g);$I=array();$H=$wb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$I=array();foreach($w["columns"]as$z){if(!isset($J[$z]))continue
2;$I[$z]=$J[$z];}return$I;}}}function
escape_key($z){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$z,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($z);}function
where($Z,$p=array()){global$g,$y;$I=array();foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$e=escape_key($z);$I[]=$e.($y=="sql"&&preg_match('~^[0-9]*\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($y=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$z],q($X))));if($y=="sql"&&preg_match('~char|text~',$p[$z]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$z)$I[]=escape_key($z)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$cb);remove_slashes(array(&$cb));return
where($cb,$p);}function
where_link($t,$e,$Y,$rf="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($e)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$rf:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$L=array()){$I="";foreach($f
as$z=>$X){if($L&&!in_array(idf_escape($z),$L))continue;$Ga=convert_field($p[$z]);if($Ga)$I.=", $Ga AS ".idf_escape($z);}return$I;}function
cookie($C,$Y,$te=2592000){global$ba;return
header("Set-Cookie: $C=".urlencode($Y).($te?"; expires=".gmdate("D, d M Y H:i:s",time()+$te)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($Zc=false){if(!ini_bool("session.use_cookies")||($Zc&&@ini_set("session.use_cookies",false)!==false))session_write_close();}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Ui,$N,$V,$l=null){global$dc;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($dc))."|username|".($l!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Ui!="server"||$N!=""?urlencode($Ui)."=".urlencode($N)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($ve,$Je=null){if($Je!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($ve!==null?$ve:$_SERVER["REQUEST_URI"]))][]=$Je;}if($ve!==null){if($ve=="")$ve=".";header("Location: $ve");exit;}}function
query_redirect($G,$ve,$Je,$zg=true,$Bc=true,$Mc=false,$ci=""){global$g,$n,$b;if($Bc){$Ah=microtime(true);$Mc=!$g->query($G);$ci=format_time($Ah);}$wh="";if($G)$wh=$b->messageQuery($G,$ci,$Mc);if($Mc){$n=error().$wh.script("messagesPrint();");return
false;}if($zg)redirect($ve,$Je.$wh);return
true;}function
queries($G){global$g;static$sg=array();static$Ah;if(!$Ah)$Ah=microtime(true);if($G===null)return
array(implode("\n",$sg),format_time($Ah));$sg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$S,$yc='table'){foreach($S
as$Q){if(!queries("$G ".$yc($Q)))return
false;}return
true;}function
queries_redirect($ve,$Je,$zg){list($sg,$ci)=queries(null);return
query_redirect($sg,$ve,$Je,$zg,false,!$zg,$ci);}function
format_time($Ah){return
sprintf('%.3f s',max(0,microtime(true)-$Ah));}function
remove_from_uri($Kf=""){return
substr(preg_replace("~(?<=[?&])($Kf".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Ib){return" ".($E==$Ib?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($z,$Qb=false){$Sc=$_FILES[$z];if(!$Sc)return
null;foreach($Sc
as$z=>$X)$Sc[$z]=(array)$X;$I='';foreach($Sc["error"]as$z=>$n){if($n)return$n;$C=$Sc["name"][$z];$ki=$Sc["tmp_name"][$z];$zb=file_get_contents($Qb&&preg_match('~\.gz$~',$C)?"compress.zlib://$ki":$ki);if($Qb){$Ah=substr($zb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Ah,$Eg))$zb=iconv("utf-16","utf-8",$zb);elseif($Ah=="\xEF\xBB\xBF")$zb=substr($zb,3);$I.=$zb."\n\n";}else$I.=$zb;}return$I;}function
upload_error($n){$Ge=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Unable to upload a file.'.($Ge?" ".sprintf('Maximum allowed file size is %sB.',$Ge):""):'File does not exist.');}function
repeat_pattern($Xf,$re){return
str_repeat("$Xf{0,65535}",$re/65535)."$Xf{0,".($re%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$re=80,$Ih=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$re).")($)?)u",$P,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$re).")($)?)",$P,$B);return
h($B[1]).$Ih.(isset($B[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($ng,$Dd=array()){$I=false;while(list($z,$X)=each($ng)){if(!in_array($z,$Dd)){if(is_array($X)){foreach($X
as$be=>$W)$ng[$z."[$be]"]=$W;}else{$I=true;echo'<input type="hidden" name="'.h($z).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Nc=false){$I=table_status($Q,$Nc);return($I?$I:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$I=array();foreach($b->foreignKeys($Q)as$r){foreach($r["source"]as$X)$I[$X][]=$r;}return$I;}function
enum_input($T,$Ja,$o,$Y,$sc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Be);$I=($sc!==null?"<label><input type='$T'$Ja value='$sc'".((is_array($Y)?in_array($sc,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Be[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$eb=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$I.=" <label><input type='$T'$Ja value='".($t+1)."'".($eb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$s){global$U,$b,$y;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$s){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$s="json";}$Ig=($y=="mssql"&&$o["auto_increment"]);if($Ig&&!$_POST["save"])$s=null;$id=(isset($_GET["select"])||$Ig?array("orig"=>'original'):array())+$b->editFunctions($o);$Ja=" name='fields[$C]'";if($o["type"]=="enum")echo
h($id[""])."<td>".$b->editInput($_GET["edit"],$o,$Ja,$Y);else{$sd=(in_array($s,$id)||isset($id[$s]));echo(count($id)>1?"<select name='function[$C]'>".optionlist($id,$s===null||$sd?$s:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($id))).'<td>';$Qd=$b->editInput($_GET["edit"],$o,$Ja,$Y);if($Qd!="")echo$Qd;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ja value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ja value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Be);foreach($Be[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$eb=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$t]' value='".(1<<$t)."'".($eb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'>";elseif(($ai=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($ai&&$y!="sqlite")$Ja.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ja.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ja>".h($Y).'</textarea>';}elseif($s=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ja cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Ie=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($y=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Ie+=7;echo"<input".((!$sd||$s==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Ie?" data-maxlength='$Ie'":"").(preg_match('~char|binary~',$o["type"])&&$Ie>20?" size='40'":"")."$Ja>";}echo$b->editHint($_GET["edit"],$o,$Y);$Uc=0;foreach($id
as$z=>$X){if($z===""||!$X)break;$Uc++;}if($Uc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Uc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$v=bracket_escape($o["field"]);$s=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($s=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($s=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($s=="json"){$s="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Sc=get_file("fields-$v");if(!is_string($Sc))return
false;return$m->quoteBinary($Sc);}return$b->processInput($o,$Y,$s);}function
fields_from_edit(){global$m;$I=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$C=bracket_escape($z,1);$I[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$m->primary),);}return$I;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$fh="<ul>\n";foreach(table_status('',true)as$Q=>$R){$C=$b->tableName($R);if(isset($R["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$H=$g->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$H||$H->fetch_row()){$jg="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>";echo"$fh<li>".($H?$jg:"<p class='error'>$jg: ".error())."\n";$fh="";}}}echo($fh?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Ad,$Se=false){global$b;$I=$b->dumpHeaders($Ad,$Se);$Hf=$_POST["output"];if($Hf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Ad).".$I".($Hf!="file"&&!preg_match('~[^0-9a-z]~',$Hf)?".$Hf":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$z=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$J[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($s,$e){return($s?($s=="unixepoch"?"DATETIME($e, '$s')":($s=="count distinct"?"COUNT(DISTINCT ":strtoupper("$s("))."$e)"):$e);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$I=dirname($q);unlink($q);}}return$I;}function
file_open_lock($q){$gd=@fopen($q,"r+");if(!$gd){$gd=@fopen($q,"w");if(!$gd)return;chmod($q,0660);}flock($gd,LOCK_EX);return$gd;}function
file_write_unlock($gd,$Kb){rewind($gd);fwrite($gd,$Kb);ftruncate($gd,strlen($Kb));flock($gd,LOCK_UN);fclose($gd);}function
password_file($i){$q=get_temp_dir()."/adminer.key";$I=@file_get_contents($q);if($I||!$i)return$I;$gd=@fopen($q,"w");if($gd){chmod($q,0660);$I=rand_string();fwrite($gd,$I);fclose($gd);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$o,$bi){global$b;if(is_array($X)){$I="";foreach($X
as$be=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($be):"")."<td>".select_value($W,$A,$o,$bi);return"<table cellspacing='0'>$I</table>";}if(!$A)$A=$b->selectLink($X,$o);if($A===null){if(is_mail($X))$A="mailto:$X";if(is_url($X))$A=$X;}$I=$b->editVal($X,$o);if($I!==null){if(!is_utf8($I))$I="\0";elseif($bi!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$bi));else$I=h($I);}return$b->selectVal($I,$A,$o,$X);}function
is_mail($pc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Xf="$Ha+(\\.$Ha+)*@($cc?\\.)+$cc";return
is_string($pc)&&preg_match("(^$Xf(,\\s*$Xf)*\$)i",$pc);}function
is_url($P){$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($cc?\\.)+$cc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$Wd,$ld){global$y;$G=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($Wd&&($y=="sql"||count($ld)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$ld).")$G":"SELECT COUNT(*)".($Wd?" FROM (SELECT 1$G GROUP BY ".implode(", ",$ld).") x":$G));}function
slow_query($G){global$b,$mi,$m;$l=$b->database();$di=$b->queryTimeout();$qh=$m->slowQuery($G,$di);if(!$qh&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$ge=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ge,'&token=',$mi,'\');
}, ',1000*$di,');
</script>
';}else$h=null;ob_flush();flush();$I=@get_key_vals(($qh?$qh:$G),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$vg=rand(1,1e6);return($vg^$_SESSION["token"]).":$vg";}function
verify_token(){list($mi,$vg)=explode(":",$_POST["token"]);return($vg^$_SESSION["token"])==$mi;}function
lzw_decompress($Ra){$Yb=256;$Sa=8;$lb=array();$Kg=0;$Lg=0;for($t=0;$t<strlen($Ra);$t++){$Kg=($Kg<<8)+ord($Ra[$t]);$Lg+=8;if($Lg>=$Sa){$Lg-=$Sa;$lb[]=$Kg>>$Lg;$Kg&=(1<<$Lg)-1;$Yb++;if($Yb>>$Sa)$Sa++;}}$Xb=range("\0","\xFF");$I="";foreach($lb
as$t=>$kb){$oc=$Xb[$kb];if(!isset($oc))$oc=$jj.$jj[0];$I.=$oc;if($t)$Xb[]=$jj.$oc[0];$jj=$oc;}return$I;}function
on_help($rb,$nh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $rb, $nh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$J,$Hi){global$b,$y,$mi,$n;$Nh=$b->tableName(table_status1($a,true));page_header(($Hi?'Edit':'Insert'),$n,array("select"=>array($a,$Nh)),$Nh);if($J===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Rb=$_GET["set"][bracket_escape($C)];if($Rb===null){$Rb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Rb,$Eg))$Rb=$Eg[1];}$Y=($J!==null?($J[$C]!=""&&$y=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$C])?array_sum($J[$C]):+$J[$C]):$J[$C]):(!$Hi&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Rb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$s=($_POST["save"]?(string)$_POST["function"][$C]:($Hi&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$s="now";}input($o,$Y,$s);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Hi?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Hi?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."…', this); };"):"");}}echo($Hi?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$mi,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7�����t4���y�Zf4��i�AT�VV��f:Ϧ,:1�Qݼ�b2`�#�>:7G�1���s��L�XD*bv<܌#�e@�:4�!fo���t:<��咾�o��\ni���',�a_�:�i�Bv�|N�4.5Nf�i�vp�h��l��֚�O����= �OFQ��k\$��i����d2T�p��6�����-�Z�����6����h:�a�,����2�#8А�#��6n����J��h�t�����4O42��ok��*r���@p@�!������?�6��r[��L���:2B�j�!Hb��P�=!1V�\"��0��\nS���D7��Dڛ�C!�!��Gʌ� �+�=tC�.C��:+��=�������%�c�1MR/�EȒ4���2�䱠�`�8(�ӹ[W��=�yS�b�=�-ܹBS+ɯ�����@pL4Yd��q�����6�3Ĭ��Ac܌�Ψ�k�[&>���Z�pkm]�u-c:���Nt�δpҝ��8�=�#��[.��ޯ�~���m�y�PP�|I֛���Q�9v[�Q��\n��r�'g�+��T�2��V��z�4��8��(	�Ey*#j�2]��R����)��[N�R\$�<>:�>\$;�>��\r���H��T�\nw�N �wأ��<��Gw����\\Y�_�Rt^�>�\r}��S\rz�4=�\nL�%J��\",Z�8����i�0u�?�����s3#�ى�:���㽖��E]x���s^8��K^��*0��w����~���:��i���v2w����^7���7�c��u+U%�{P�*4̼�LX./!��1C��qx!H��Fd��L���Ġ�`6��5��f��Ć�=H�l �V1��\0a2�;��6����_ه�\0&�Z�S�d)KE'��n��[X��\0ZɊ�F[P�ޘ@��!��Y�,`�\"ڷ��0Ee9yF>��9b����F5:���\0}Ĵ��(\$����37H��� M�A��6R��{Mq�7G��C�C�m2�(�Ct>[�-t�/&C�]�etG�̬4@r>���<�Sq�/���Q�hm���������L��#��K�|���6fKP�\r%t��V=\"�SH\$�} ��)w�,W\0F��u@�b�9�\rr�2�#�D��X���yOI�>��n��Ǣ%���'��_��t\rτz�\\1�hl�]Q5Mp6k���qh�\$�H~�|��!*4����`S���S t�PP\\g��7�\n-�:袪p����l�B���7Өc�(wO0\\:��w���p4���{T��jO�6HÊ�r���q\n��%%�y']\$��a�Z�.fc�q*-�FW��k��z���j���lg�:�\$\"�N�\r#�d�Â���sc�̠��\"j�\r�����Ւ�Ph�1/��DA)���[�kn�p76�Y��R{�M�P���@\n-�a�6��[�zJH,�dl�B�h�o�����+�#Dr^�^��e��E��� ĜaP���JG�z��t�2�X�����V�����ȳ��B_%K=E��b弾�§kU(.!ܮ8����I.@�K�xn���:�P�32��m�H		C*�:v�T�\nR�����0u�����ҧ]�����P/�JQd�{L�޳:Y��2b��T ��3�4���c�V=���L4��r�!�B�Y�6��MeL������i�o�9< G��ƕЙMhm^�U�N����Tr5HiM�/�n�흳T��[-<__�3/Xr(<���������uҖGNX20�\r\$^��:'9�O��;�k����f��N'a����b�,�V��1��HI!%6@��\$�EGڜ�1�(mU��rս���`��iN+Ü�)���0l��f0��[U��V��-:I^��\$�s�b\re��ug�h�~9�߈�b�����f�+0�� hXrݬ�!\$�e,�w+����3��_�A�k��\nk�r�ʛcuWdY�\\�={.�č���g��p8�t\rRZ�v�J:�>��Y|+�@����C�t\r��jt��6��%�?��ǎ�>�/�����9F`ו��v~K�����R�W��z��lm�wL�9Y�*q�x�z��Se�ݛ����~�D�����x���ɟi7�2���Oݻ��_{��53��t���_��z�3�d)�C��\$?KӪP�%��T&��&\0P�NA�^�~���p� �Ϝ���\r\$�����b*+D6궦ψ��J\$(�ol��h&��KBS>���;z��x�oz>��o�Z�\nʋ[�v���Ȝ��2�OxِV�0f�����2Bl�bk�6Zk�hXcd�0*�KT�H=��π�p0�lV����\r���n�m��)(�(�:#����E��:C�C���\r�G\ré0��i����:`Z1Q\n:��\r\0���q���:`�-�M#}1;����q�#|�S���hl�D�\0fiDp�L��``����0y��1���\r�=�MQ\\��%oq��\0��1�21�1�� ���ќbi:��\r�/Ѣ� `)��0��@���I1�N�C�����O��Z��1���q1 ����,�\rdI�Ǧv�j�1 t�B���⁒0:�0��1�A2V���0���%�fi3!&Q�Rc%�q&w%��\r��V�#���Qw`�% ���m*r��y&i�+r{*��(rg(�#(2�(��)R@i�-�� ���1\"\0��R���.e.r��,�ry(2�C��b�!Bޏ3%ҵ,R�1��&��t��b�a\rL��-3�����\0��Bp�1�94�O'R�3*��=\$�[�^iI;/3i�5�&�}17�# ѹ8��\"�7��8�9*�23�!�!1\\\0�8��rk9�;S�23��ړ*�:q]5S<��#3�83�#e�=�>~9S螳�r�)��T*a�@і�bes���:-���*;,�ؙ3!i���LҲ�#1 �+n� �*��@�3i7�1���_�F�S;3�F�\rA��3�>�x:� \r�0��@�-�/��w��7��S�J3� �.F�\$O�B���%4�+t�'g�Lq\rJt�J��M2\r��7��T@���)ⓣd��2�P>ΰ��Fi಴�\nr\0��b�k(�D���KQ����1�\"2t����P�\r��,\$KCt�5��#��)��P#Pi.�U2�C�~�\"�");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n8��3)��7���81��x:\nOg#)��r7\n\"��`�|2�gSi�H)N�S��\r��\"0��@�)�`(\$s6O!��V/=��' T4�=��iS��6IO��er�x�9�*ź��n3�\rщv�C��`���2G%�Y�����1��f���Ȃl��1�\ny�*pC\r\$�n�T��3=\\�r9O\"�	��l<�\r�\\��I,�s\nA��eh+M�!�q0��f�`(�N{c��+w���Y��p٧3�3��+I��j�����k��n�q���zi#^r�����3���[��o;��(��6�#�Ґ��\":cz>ߣC2v�CX�<�P��c*5\n���/�P97�|F��c0�����!���!���!��\nZ%�ć#CH�!��r8�\$���,�Rܔ2���^0��@�2��(�88P/��݄�\\�\$La\\�;c�H��HX���\nʃt���8A<�sZ�*�;I��3��@�2<���!A8G<�j�-K�({*\r��a1���N4Tc\"\\�!=1^���M9O�:�;j��\r�X��L#H�7�#Tݪ/-���p�;�B \n�2!���t]apΎ��\0R�C�v�M�I,\r���\0Hv��?kT�4����uٱ�;&���+&���\r�X���bu4ݡi88�2B�/⃖4���N8A�A)52������2��s�8�5���p�WC@�:�t�㾴�e��h\"#8_��cp^��I]OH��:zd�3g�(���Ök��\\6����2�ږ��i��7���]\r�xO�n�p�<��p�Q�U�n��|@���#G3��8bA��6�2�67%#�\\8\r��2�c\r�ݟk��.(�	��-�J;��� ��L�� ���W��㧓ѥɤ����n��ҧ���M��9ZНs]�z����y^[��4-�U\0ta��62^��.`���.C�j�[ᄠ% Q\0`d�M8�����\$O0`4���\n\0a\rA�<�@����\r!�:�BA�9�?h>�Ǻ��~̌�6Ȉh�=�-�A7X��և\\�\r��Q<蚧q�'!XΓ2�T �!�D\r��,K�\"�%�H�qR\r�̠��C =�������<c�\n#<�5�M� �E��y�������o\"�cJKL2�&��eR��W�AΐTw�ё;�J���\\`)5��ޜB�qhT3��R	�'\r+\":�����.��ZM'|�et:3%L��#f!�h�׀e����+ļ�N�	��_�CX��G�1��i-ãz�\$�oK@O@T�=&�0�\$	�DA�����D�SJ�x9ׁFȈml��p�Gխ�T�6Rf�@�a�\rs�R�Fgih]��f�.�7+�<nhh�* �SH	P]� :Ғ��a\"�����2�&R�)�B�Pʙ�H/��f {r|�0^�hCA�0�@�M���2�B�@��z�U���O���Cpp��\\�L�%�𛄒y��odå���p3���7E����A\\���K��Xn��i.�Z�� ���s��G�m^�tI�Y�J��ٱ�G1��R��D��c���6�tMih��9��9g��q�RL��Mj-TQ�6i�G_!�.�h�v��cN�����^��0w@n|���V�ܫ�AЭ��3�[��]�	s7�G�P@ :�1т�b� ��ݟ���w�(i��:��z\\��;���A�PU T^�]9�`UX+U��Q+��b���*ϔs������[�ۉxk�F*�ݧ_w.��6~�b��mK�sI�MK�}�ҥ���eHɲ�d�*md�l�Q��eH�2�ԍL���a҂�=��s�P�aM\"ap��:<��GB�\r2Ytx&L}}��A�ԱN�GЬza��D4�t�4Q�vS�ùS\r�;U��������~�pB��{���,���O��t;�J��ZC,&Y�:Y\"�#�����t:\n�h8r����n���h>��>Z��`&�a�pY+�x�U��A�<?�PxWա�W�	i��.�\r`�\$,���Ҿ��V�]�Zr���H��5�f\\�-KƩ�v��Z��A��(�{3�o��l.��J��.�\\t2�;���2\0��>c+�|��*;-0�n��[�t@�ڕ��=cQ\n.z���wC&��@���F�����'cBS7_*rsѨ�?j�3@����!�.@7�s�]Ӫ�L�΁G��@��_�q���&u���t�\nՎ�L�E�T��}gG����w�o�(*�����A�-�����3�mk�����פ��t��S���(�d��A�~�x\n����k�ϣ:D��+�� g��h14 ��\n.��d꫖������AlY��j���jJ���PN+b� D�j������D��P���LQ`Of��@�}�(���6�^nB�4�`�e��\n��	�trp!�lV�'�}b�*�r%|\nr\r#���@w��-�T.Vv�8��\nmF�/�p��`�Y0�����P\r8�Y\r��ݤ�	�Q���%E�/@]\0��{@�Q���\0bR M\r��'|��%0SDr����f/����b:ܭ�����%߀�3H�x\0�l\0���	��W��%�\n�8\r\0}�D���1d#�x��.�jEoHrǢlb���%t�4�p���%�4���k�z2\r�`�W@�%\rJ�1��X���1�D6!��*��{4<E��k.m�4����\r\n�^i��� �!n��!2\$������(�f������k>����N��5\$���2T�,�LĂ� � Z@��*�`^P�P%5%�t�H�W��on���E#f���<�2@K:�o����Ϧ�-��2\\Wi+f�&��g&�n�L�'e�|����nK�2�rڶ�p�*.�n��������*�+�t�Bg* ��Q�1+)1h���^�`Q#�؎�n*h���v�B��\0\\F\n�W�r f\$�=4\$G4ed�b�:J^!�0��_���%2��6�.F���Һ�EQ�����dts\"�����B(�`�\r���c�R����V����X��:R�*2E*s�\$��+�:bXl��tb��-�S>��-�d�=��\$S�\$�2�ʁ7�j�\"[́\"��]�[6��SE_>�q.\$@z`�;�4�3ʼ�CS�*�[���{DO�ުCJj峚P�:'���ȕ QEӖ�`%r��7��G+hW4E*��#TuFj�\n�e�D�^�s��r.��Rk��z@��@���D�`C�V!C���\0��ۊ)3<��Q4@�3SP��ZB�5F�L�~G�5���:���5\$X���}ƞf���I���3S8�\0XԂtd�<\nbtN� Q�;\r��H��P�\0��&\n���\$V�\r:�\0]V5gV���D`�N1:�SS4Q�4�N��5u�5�`x	�<5_FH���}7��)�SV��Ğ#�|��< ռ�˰���\\��-�z2�\0�#�WJU6kv���#��\r�췐����U��i��_��^�UVJ|Y.��ɛ\0u,�������_UQD#�ZJu�Xt��_�&JO,Du`N\r5��`�}ZQM^m�P�G[��a�b�N䞮��re�\n��%�4��o_(�^�q@Y6t;I\nGSM�3��^SAYH�hB��5�fN?NjWU�J����֯Yֳke\"\\B1�؅0� �en���*<�O`S�L�\n��.g�5Zj�\0R\$�h��n�[�\\���r���,�4����cP�p�q@R�rw>�wCK��t��}5_uvh��`/����\$�J)�R�2Du73�d\r�;��w���H�I_\"4�r�����Ͽ+�&0>�_-eqeD��V��n��f�h��\"Z����Z�W�6\\L���ke&�~������i\$ϰ�Mr�i*�����\0�.Q,��8\r���\$׭K��Y� �io�e%t�2�\0�J��~��/I/.�e��n�~x!�8��|f�h�ۄ-H���&�/��o�����.K� �^j��t��>('L\r��HsK1�e�\0��\$&3�\0�in3� o�6�ж�����9�j������1�(b.�vC�ݎ8���:wi��\"�^w�Q����z�o~�/��Ғ���`Y2��D�V����/k�8��7Z�H����]2k2r���ϯh�=�T��]O&�\0�M\0�[8��Ȯ���8&L�Vm�v���j�ך�F��\\��	���&s��Q� \\\"�b��	��\rBs�Iw�	�Y��N �7�C/*����\n\n�H�[����*A���TE�VP.UZ(tz/}\n2��y�S���,#�3�i�~W@yCC\nKT��1\"@|�zC\$��_CZjzHB�LV�,K����O���P�@X���������;D�WZ�W�a���\0ފ�CG8�R �	�\n������P�A��&������,�pfV|@N�b�\$�[�I����������Z�@Zd\\\"�|��+�ۮ��tz�o\$�\0[����y�E���ə�bhU1��,�r\$�o8D���F��V&ځ5�h}��N�ͳ&�絕ef�ǙY��:�^z�VPu	W�Z\"r�:�h�w��h#1��O���K�hq`妄����v|�˧:wD�j�(W�������碌�?�;|Z��%�%ڡ�r@[����B�&������#���ُ��:)��Y6����&��	@�	���I��!����� ���2M���O;���W��)��C��FZ�p!��a��*F�b�I��;���#Ĥ9����S�/S�A�`z�L*�8�+��N���-�M���-kd���Li�J�·�Jn��b��>,�V�SP�8��>�w��\"E.��Rz`��u_����E\\��ɫ�3P��ӥs]���goVS���\n��	*�\r��7)�ʄ�m�PW�UՀ��ǰ���f��ܓi�ƅkЌ\r�('W`�Bd�/h*�A�l�M��_\n�������O��T�5�&A�2é`��\\R�E\"_�_��.7�M�6d;�<?��)(;���}K�[�����Z?��yI ��1p�bu\0�������{��\ri���E�`�~\n��=��o���'�����v�P�yC\0��\$�8�T�/m1GT��l��}o�e�=Gtb�I/[0�%�o|�Sy����^o��;�����@T�b�*��i���PZT	��Ӄ\0\$��>��e�L�J_�7�-Rf�0\"���6g��z\r�a3�a��6+3�DBg�3ՁY�'Y�d��x6I3_2}���;����`�@�b������ {�C:SuM\nļ��SK\0�B;T�`�8�G��x�I�`5��#\"N�����ҭ���v&�e�kD�sq���.F���<��s� h�e6������*�b�iS܊��̮�`��ق���+\0���5�LLBT�Ă�wdXc��F��1�&�0�^�P)\$\\8i����(L��x)�n@�C��?�\$�Yvy.\$(\0@p�u\rxo�����tb�{�7B�k\r�`Mt(� BTP��<�G�\$�>�^pC*���!.&�Lx�����\0]�4��\0���P��a�����\n�N�K�Ѧ�p�\$B˭@��wV����f#��r��|�Y�/q��YZ�VXB,w�܄hF�G���Sg_?3,�	sЊ�E�#�^�,�����4�R;���J��,<�e(V�#C���`�/8\rv�qmpjBA������R@\nЭ�v�w��^�����7��:�=J�P��i����yɥ���\0007E�(IU2!�҈f�C��I�8G�¢?e^`����A]�ę�(p�}�އ{�!�Fm(�R���B��eۂ@�)��,JO�����\n��\0�%]��w�LA�x��9�ڔ���Ɍ,�b�:��/�Q�HE|;��D���	�\$������o�b�+�[@��!Лd�Q�B�7ŞER\n�yW�|�EPJ+��:�X\0�Է A\rnˆi�� ����])q�<<jH�yܒ�\"!N�t�D0F��[ a�)'�V}Q9\$�n@O9x�X洔;�#�u�4 G�A��f.\\5�7b���\rz�h�~�y\0��-�G\0/7K����`+��,Q�:��⇃s�^�54��8ݍ�y\0����r��u���;�,8��\0��4t�5\n�_�ach� ���bZZ�����dQq����Z(�%@���!��@��%����Q�?�����C�k�#�	8 ���|dXc�����2U�I�!�^�-W�T9���@�����=�\0Ҙ\$��2��J�eϤ�t�2����K�T+��\0��� �\0��@<H��G�Bd}����ځzb������	^I�����hSI-��K��J���\r%R��\\&�hlNЊI1\n�J�9n#�4�KU1�vK�����ha�m�M#�����;L�*?�Le�\n���(q��LGp���8` H꩘4T�J`\"FM�%@�)QH�gVO4��)�\$��3\" ����*�2�0!��o\0��WM�P�rb�L�1qJ�Rŕ����,R\$��3�w��^�*�{��AAfh�U��YW\n�4���.�2,���a�Z���&=B?�b�@O/��`I���np��	WP�a0���`�x��YgH&q�����xC��4�ȉ��bXÌ.��,�H/�8N�E-�	�\"��2 l��R���ev\0���[��g�fr���\0P��,S�'�ׁp�р������.�08��\"����5үg����4���@\rFpK�Q��\0���e@�l�p?\0001���_�X>#�����<�H&(����ܠ/kD�t��`\$\"Zȓ6	�M�X�@jX������� l��E\0�Ɲ��t\0m���\0^��\$��S���f�2�1\0\r�/X�N6b���*`y�P�PW���t c��f� ��pf��'�:\0��ti\r���T9�\0�f�� ��O&<��rc\n�	�f6!9��������P^+ȼ���D�O�n��q��E�Y�\" n��%L��#��z\\�'1:��� -���|�V��X���c���&f�&�^a�1��꒘�H5Q��q5(>D�K�إIG��J:����J���{�Sd�&��)	��Ke��@L w�-�\\3��M�*Q�t�*�𧵤3BC� �\$qs�J�<F��x�8!QpFI��4��)��D,3�-�������::�!R��\$S ,�(!.�Q1\$N(�*��F�\0�G���8���?N��_X�̨�6��L��#	�\0T3D��6s�B�hFu���J'��\ne� ����'�V��Dp��D&)ѣ�z@9�\$��(� ����ĦY͞��@1,zEJ���W0��\0du�dP\"-MQ4ܦ�k���G�	N���B򬀶��2��Dr_��\0�N���Ν��/�ӈI�>SA{�e9�L�!W9Y�ᐄ������Y�B�b��h��x���;��ӄ/�c^3�?�Q�v������>j=O�1���T��t\\�B�-�^Ň)S��)���F\r����HR�����6I3+y6W�lxyA�`)N�(P��Y/`�x�]��Ș�II�UH�c�����T�g\\\r8��R��:�W��He\\|�MyD�T#�Cj�}����F��#�HH@R`��&�d Zt��@�����Y,)		n�����E6!%/��󦮱������:Q?)��П �t܆�\0��u=�s<����%��R+Z��\nS�}r |Efu[z���z?8T�B��M\$�Ū�\\bv���\$�z�W��IՐ���Ou\\����<��x � ��+�����|.0I+�U0 �D�[4\0/��\0|`��&� ����Y�����!�M�EZp.��:u�h�wMW%�m:c�N��k�[�`��LS[R!��U9_�X&���qt��]�ג2�UsY�w�|�0�\r���k�:�2���5l\rb\0��t�u�w�}E��A��n8�l�3z⁮� '�Z&�R@���M�Pʒ]��\n��\">(L��G��*vD�QA�D��<���u�\0\n��	Zv0Ůzl(�V\\��HB��2�\0�Hp�9B�0Hb��pY\$��cR����0��@Z}~�αE�����H\n\rڹ���w\$�e��\r(q ��!�\\�3�LX����b\n��\\���{gi�9�Z8�w��#�n9ń�3�!���a���5ma�ڹ:����T�2p&�`^L幋�n����p6����]s�[�,�e���o�W	�����\r�p.N4j:ks�^�\\#�@_��C�pB��� �)�	��R0��b~���Z�(:�bLC,	�QB�&\"[��.Q��U�#j��p�*�md�DZԬ@[�����v�M[>�g!�s,ǣ�UrՖ�p�jt�PBf��-ݦ\0`�3ҍ���-�XUB���A�*���@ON��\\VS�4.��	r�ʖM\"�h�ʌ�O�i�壌�@Z�[��(�8/(@��W��W����IYeyE�zb�V��o8����x��刯.���nx\$\n�8��\n<�ܙ ����R�d!ˊ-�U5�@{Y���A\n�;�*KR��qCP-�3jY��M�k��`�&�^5\0��l�RV\r���\rK�M�m�#@��!�޳����g�@�5:������igP:��3��O}��'Z�׍D�X�����\0�8�h��Ww���8	����h_T�`g�Ͷܫ���H	9���0X�̐B�-J-gC�(��t��\$�!�^�n�*HD�!\n:�Ɉ�t�&�'j�����G�e'�Vr7Y�����cjх*��~�uzU�i@d��\\P\r\rIp\0`����);�I�g�]W4/�@����)��L ��a����-2o��\"�a�����/r���\\p L\r����ڨ�'��/���HP���~��\n��9^`�u;�k���ܣھ�m�J\$ �r:k\rT9Y�*.l�,Z�m\r�B��q�J|a���بK��V@�d���#��\$Ϊ��� �Bk����aI���[�������G�����u\n	C�W�+�͂�m7��k�8����{�0ǍG����Bڊ������v��^ogq��=��a���j��f}���#8s%�����9<�  ���R<�h��s�����9 �q�K�w]\\�ĸJt���� ���(�:M�1�87b߬u�NP�8�c�'��\n��;l��S+��/�S�ǜ��Mu)�~!���e��HF�_�a�f8�]|�u@`�!3w�5��*gYNE.�k�r�j8t#�*|�«�̴��!a�w��eq>�p:E�K�'�-����i\$����11�&�\nt��t��\$(Y��PsX^�V�\r�b�	c��;�v�f��uS��s|��f����)�1�[�666'} �p��Py@�q��ʺ�����������j�A�U���t�C�%�+f~����)W]�&�j�zC'�ϕ��\$����R�(i��+�F��aSzS�Q��av�>Y�|�gOE�Ѐ�hZ��+�٠j[�ABtȰ�YF��'�|\r�Kf�����iP�t�JKv�_�p�`�y�,��W\"���A��K��@t�(6���,��I@p	@����\r �S;�D	nh4�g ���IZ�)�4�� ڟH��X��i��QB��2���K�	�a 4ER`��\"�a��^l�R(���%��_�r2ָk��\\.�Nns٧Y�\"\r�G�l�m��BD��`p\r=�F;�I�OF9�s3-n����A�-�j�-�V1/h��4��A&�\\�y�v���3_�D�	z�]���[���k\$5R�s{u��||��WD�T���K�ɉ��)�\n��싁p��u��\n�Bk���l���|��]�{	\r�NL �5�Z������� ��:J!�����?ԧ���u}��DNה a\\�4;a��=HJ�+?db��#vy 'e;0��hX��u��K�?7`PuO���Ø^�׉��&�fv��]]�~�R|���=X�3��@��������jTڐJ���vpO��Ǆ�'m�a���_&H��T�d{X�,�V�5����m�ZZ��K��d�)���<�P\nK4�N���ػݟ\n����et���R>i��E�@�(}3�\$�Ԋ�w\"��ai�\n�x9,���)	�k�m��cG`�2@Ԯ��Cr\"R=�.�y�&��P���n�G\0|<^��H����L�2�C�j������~���aP�i��ZrGf��\r��\rBՒ�Ȕl�2u��y4;@H�\rq����I��ie�X\"Ls^�X����e\n�=��ա�V�FC�Ӻ�>7\$��^�\$��\0�p�&���Y���n�A����w��#\"���:��?���kf�.P����`bl�Z�\$ĳ���3l'[\r��&,\0�m�*@�઼�8;fk%u&�ހ���UJc��@��i�MK�P��*<�p~��2k�l���8I�\$1�I��(Np��-f:��<��\$�AW��L�9�z	�g\0�(�>�0�^Yq��\\m��z�u��Zl����.��υM�rK'{��z��_�9K�jx_e����G��-%��X�/�d��\$�,�<KRO�i����!(�:�n!��ڻU)*��̭V���Vm�����Y�u���Uc9ܑ���)��Kk����QyS������Ia��|л2�����x0��D1��\rl�DLM��w���(;d�;\$���x;OBk�^ބ��f��6�k�[:�MЀ{�~�Ӄy������H��[O����b_G@�찐���q�楶y҇�8�F�H��(yj�s\"�\\�%��w1N���k�Z��#S 0�N-�tZ��@�@\"�`J5�w0I��@^,��Dw�c9F�\$!��|qc'?S�ƉI�� \\,RIʼ,���H�ej��E2�}f��N�ˮk��qĉ���!s.�R\\;���2���Δ9����N��l��x�2��я������vmIeI�Zz�����ΌK�`�p�.na4<*4�d�ÿ��v#�1��+9���q`oL��\0�A-���	�j�}��q~W䙀�\0���H@s�ۭ�U��}�WP	�����^�)���4FY�m�\n]�{�{T�W�w%o8D@�:6�������F_������\"�欄u��/�;�G��`	���\"/���	�-ay��\"�^��Q�7��N|����d�Rh8TMy�����N�>�D2<\0�S@��@=�7�����8���)T���h�nњ\0w(]���r�ܕ�;��ر���!��\$\n�P @�P<Ȗ4�B�����P!��M�pS�b�M�����\r4!���J��s��(�i�(I8]}����;����T2��F�j�@|�:�0�\$#��܅�p�y�򤄷q�Eg��\0�I3�kΫ0�oJ�� -ͷ�L�)��t�\"�k{BnCZ����R?h��z7�eS+Po�<Xu\rb�R��N�:iEE�h�P�QAL{�Q~�)Ш�-i�݉��QD���[�{`�Qv��;���o�p秈�<���p����Dw�Z���t{� }�m�\\_`�qvF�Z@��sf�_/��N����#^��Ɵ����2��q��~h��|X�4���D�:�����	٩�OHY\"�i���~�;S|�7��Hn��@��.�@��>��_��T_W�J�����7}5C�����;��Z���HV憽�����^h�}�/��{��=D;��Z�����hC�'��}��U�>_�5�Ɩj�?;���Pu��O�@����~�E�����j�R��14	��R���;}A㦃H~�\$�X�~o������������(�_�E����C�*��0��p2��(d_����=�\"�Q���������ZO[|����b7��1���#e@���v hT⛁�?����oY�j.��5(Rk~��� �?�e=p�ء׊�\0���=vx.��=b��K�쫲f��WK@\0V�O�L\0V�⭨a�L�*� ^�@o�OÆ�^��L����jJ^@m� �v��n�l�K������D���CV/S�\0��}M&8��߰/�~��\"��2��^��6H���<��&���Ą0`�fx��7��kJ����HZ�t<��M�U&�T��a�>dX�m��X�V���N&2-���~�<�M�@&T\$����]�#P=���D\r7�b�xSM7�6��\$	���x��l�@���	4��3��~�P#����p�`܄�g��� \$�c(\0�\\�;��\"V!�q`�>&X#�6Fh!aQ���\r�?`F(������[���x���\0utAӆ�V��'������i\"5�?�Mmȏ�A���x=F�pp��d^��WCdp�A����?���%X��\"���\"\\�&���F�щ@�f�0��K��e�z9� B`ӓO��2��7B@2�");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0��F����==��FS	��_6MƳ���r:�E�CI��o:�C��Xc��\r�؄J(:=�E���a28�x�?�'�i�SANN���xs�NB��Vl0���S	��Ul�(D|҄��P��>�E�㩶yHch��-3Eb�� �b��pE�p�9.����~\n�?Kb�iw|�`��d.�x8EN��!��2��3���\r���Y���y6GFmY�8o7\n\r�0��\0�Dbc�!�Q7Шd8���~��N)�Eг`�Ns��`�S)�O���/�<�x�9�o�����3n��2�!r�:;�+�9�CȨ���\n<�`��b�\\�?�`�4\r#`�<�Be�B#�N ��\r.D`��j�4���p�ar��㢺�>�8�\$�c��1�c���c����{n7����A�N�RLi\r1���!�(�j´�+��62�X�8+����.\r����!x���h�'��6S�\0R����O�\n��1(W0���7q��:N�E:68n+��մ5_(�s�\r��/m�6P�@�EQ���9\n�V-���\"�.:�J��8we�q�|؇�X�]��Y X�e�zW�� �7��Z1��hQf��u�j�4Z{p\\AU�J<��k��@�ɍ��@�}&���L7U�wuYh��2��@�u� P�7�A�h����3Û��XEͅZ�]�l�@Mplv�)� ��HW���y>�Y�-�Y��/�������hC�[*��F�#~�!�`�\r#0P�C˝�f������\\���^�%B<�\\�f�ޱ�����&/�O��L\\jF��jZ�1�\\:ƴ>�N��XaF�A�������f�h{\"s\n�64������?�8�^p�\"띰�ȸ\\�e(�P�N��q[g��r�&�}Ph���W��*��r_s�P�h���\n���om������#���.�\0@�pdW �\$Һ�Q۽Tl0� ��HdH�)��ۏ��)P���H�g��U����B�e\r�t:��\0)\"�t�,�����[�(D�O\nR8!�Ƭ֚��lA�V��4�h��Sq<��@}���gK�]���]�=90��'����wA<����a�~��W��D|A���2�X�U2��yŊ��=�p)�\0P	�s��n�3�r�f\0�F���v��G��I@�%���+��_I`����\r.��N���KI�[�ʖSJ���aUf�Sz���M��%��\"Q|9��Bc�a�q\0�8�#�<a��:z1Uf��>�Z�l������e5#U@iUG��n�%Ұs���;gxL�pP�?B��Q�\\�b��龒Q�=7�:��ݡQ�\r:�t�:y(� �\n�d)���\n�X;����CaA�\r���P�GH�!���@�9\n\nAl~H���V\ns��ի�Ư�bBr���������3�\r�P�%�ф\r}b/�Α\$�5�P�C�\"w�B_��U�gAt��夅�^Q��U���j���Bvh졄4�)��+�)<�j^�<L��4U*���Bg�����*n�ʖ�-����	9O\$��طzyM�3�\\9���.o�����E(i������7	tߚ�-&�\nj!\r��y�y�D1g���]��yR�7\"������~����)TZ0E9M�YZtXe!�f�@�{Ȭyl	8�;���R{��8�Į�e�+UL�'�F�1���8PE5-	�_!�7��[2�J��;�HR��ǹ�8p痲݇@��0,ծpsK0\r�4��\$sJ���4�DZ��I��'\$cL�R��MpY&����i�z3G�zҚJ%��P�-��[�/x�T�{p��z�C�v���:�V'�\\��KJa��M�&���Ӿ\"�e�o^Q+h^��iT��1�OR�l�,5[ݘ\$��)��jLƁU`�S�`Z^�|��r�=��n登��TU	1Hyk��t+\0v�D�\r	<��ƙ��jG���t�*3%k�YܲT*�|\"C��lhE�(�\r�8r��{��0����D�_��.6и�;����rBj�O'ۜ���>\$��`^6��9�#����4X��mh8:��c��0��;�/ԉ����;�\\'(��t�'+�����̷�^�]��N�v��#�,�v���O�i�ϖ�>��<S�A\\�\\��!�3*tl`�u�\0p'�7�P�9�bs�{�v�{��7�\"{��r�a�(�^��E����g��/���U�9g���/��`�\nL\n�)���(A�a�\" ���	�&�P��@O\n師0�(M&�FJ'�! �0�<�H�������*�|��*�OZ�m*n/b�/�������.��o\0��dn�)����i�:R���P2�m�\0/v�OX���Fʳψ���\"�����0�0�����0b��gj��\$�n�0}�	�@�=MƂ0n�P�/p�ot������.�̽�g\0�)o�\n0���\rF����b�i��o}\n�̯�	NQ�'�x�Fa�J���L������\r��\r����0��'��d	oep��4D��ʐ�q(~�� �\r�E��pr�QVFH�l��Kj���N&�j!�H`�_bh\r1���n!�Ɏ�z�����\\��\r���`V_k��\"\\ׂ'V��\0ʾ`AC������V�`\r%�����\r����k@N����B�횙� �!�\n�\0Z�6�\$d��,%�%la�H�\n�#�S\$!\$@��2���I\$r�{!��J�2H�ZM\\��hb,�'||cj~g�r�`�ļ�\$���+�A1�E���� <�L��\$�Y%-FD��d�L焳��\n@�bVf�;2_(��L�п��<%@ڜ,\"�d��N�er�\0�`��Z��4�'ld9-�#`��Ŗ����j6�ƣ�v���N�͐f��@܆�&�B\$�(�Z&���278I ��P\rk\\���2`�\rdLb@E��2`P( B'�����0�&��{���:��dB�1�^؉*\r\0c<K�|�5sZ�`���O3�5=@�5�C>@�W*	=\0N<g�6s67Sm7u?	{<&L�.3~D��\rŚ�x��),r�in�/��O\0o{0k�]3>m��1\0�I@�9T34+ԙ@e�GFMC�\rE3�Etm!�#1�D @�H(��n ��<g,V`R]@����3Cr7s~�GI�i@\0v��5\rV�'������P��\r�\$<b�%(�Dd��PW����b�fO �x\0�} ��lb�&�vj4�LS��ִԶ5&dsF M�4��\".H�M0�1uL�\"��/J`�{�����xǐYu*\"U.I53Q�3Q��J��g��5�s���&jь��u�٭ЪGQMTmGB�tl-c�*��\r��Z7���*hs/RUV����B�Nˈ�����Ԋ�i�Lk�.���t�龩�rYi���-S��3�\\�T�OM^�G>�ZQj���\"���i��MsS�S\$Ib	f���u����:�SB|i��Y¦��8	v�#�D�4`��.��^�H�M�_ռ�u��U�z`Z�J	e��@Ce��a�\"m�b�6ԯJR���T�?ԣXMZ��І��p����Qv�j�jV�{���C�\r��7�Tʞ� ��5{P��]�\r�?Q�AA������2񾠓V)Ji��-N99f�l Jm��;u�@�<F�Ѡ�e�j��Ħ�I�<+CW@�����Z�l�1�<2�iF�7`KG�~L&+N��YtWH飑w	����l��s'g��q+L�zbiz���Ţ�.Њ�zW�� �zd�W����(�y)v�E4,\0�\"d��\$B�{��!)1U�5bp#�}m=��@�w�	P\0�\r�����`O|���	�ɍ����Y��JՂ�E��Ou�_�\n`F`�}M�.#1��f�*�ա��  �z�uc���� xf�8kZR�s2ʂ-���Z2�+�ʷ�(�sU�cD�ѷ���X!��u�&-vP�ر\0'L�X �L����o	��>�Վ�\r@�P�\rxF��E��ȭ�%����=5N֜��?�7�N�Å�w�`�hX�98 �����q��z��d%6̂t�/������L��l��,�Ka�N~�����,�'�ǀM\rf9�w��!x��x[�ϑ�G�8;�xA��-I�&5\$�D\$���%��xѬ���´���]����&o�-3�9�L��z���y6�;u�zZ ��8�_�ɐx\0D?�X7����y�OY.#3�8��ǀ�e�Q�=؀*��G�wm ���Y�����]YOY�F���)�z#\$e��)�/�z?�z;����^��F�Zg�����������`^�e����#�������?��e��M��3u�偃0�>�\"?��@חXv�\"������*Ԣ\r6v~��OV~�&ר�^g���đٞ�'��f6:-Z~��O6;zx��;&!�+{9M�ٳd� \r,9���W��ݭ:�\r�ٜ��@睂+��]��-�[g��ۇ[s�[i��i�q��y��x�+�|7�{7�|w�}����E��W��Wk�|J؁��xm��q xwyj���#��e��(�������ߞþ��� {��ڏ�y���M���@��ɂ��Y�(g͚-��������J(���@�;�y�#S���Y��p@�%�s��o�9;�������+��	�;����ZNٯº��� k�V��u�[�x��|q��ON?���	�`u��6�|�|X����س|O�x!�:���ϗY]�����c���\r�h�9n�������8'������\rS.1��USȸ��X��+��z]ɵ��?����C�\r��\\����\$�`��)U�|ˤ|Ѩx'՜����<�̙e�|�ͳ����L���M�y�(ۧ�l�к�O]{Ѿ�FD���}�yu��Ē�,XL\\�x��;U��Wt�v��\\OxWJ9Ȓ�R5�WiMi[�K��f(\0�dĚ�迩�\r�M����7�;��������6�KʦI�\r���xv\r�V3���ɱ.��R������|��^2�^0߾\$�Q��[�D��ܣ�>1'^X~t�1\"6L���+��A��e�����I��~����@����pM>�m<��SK��-H���T76�SMfg�=��GPʰ�P�\r��>�����2Sb\$�C[���(�)��%Q#G`u��Gwp\rk�Ke�zhj��zi(��rO�������T=�7���~�4\"ef�~�d���V�Z���U�-�b'V�J�Z7���)T��8.<�RM�\$�����'�by�\n5����_��w����U�`ei޿J�b�g�u�S��?��`���+��� M�g�7`���\0�_�-���_��?�F�\0����X���[��J�8&~D#��{P���4ܗ��\"�\0��������@ғ��\0F ?*��^��w�О:���u��3xK�^�w���߯�y[Ԟ(���#�/zr_�g��?�\0?�1wMR&M���?�St�T]ݴG�:I����)��B�� v����1�<�t��6�:�W{���x:=��ޚ��:�!!\0x�����q&��0}z\"]��o�z���j�w�����6��J�P۞[\\ }��`S�\0�qHM�/7B��P���]FT��8S5�/I�\r�\n ��O�0aQ\n�>�2�j�;=ڬ�dA=�p�VL)X�\n¦`e\$�TƦQJ����lJ����y�I�	�:����B�bP���Z��n����U;>_�\n	�����`��uM򌂂�֍m����Lw�B\0\\b8�M��[z��&�1�\0�	�\r�T������+\\�3�Plb4-)%Wd#\n��r��MX\"ϡ�(Ei11(b`@f����S���j�D��bf�}�r����D�R1���b��A��Iy\"�Wv��gC�I�J8z\"P\\i�\\m~ZR��v�1ZB5I��i@x����-�uM\njK�U�h\$o��JϤ!�L\"#p7\0� P�\0�D�\$	�GK4e��\$�\nG�?�3�EAJF4�Ip\0��F�4��<f@� %q�<k�w��	�LOp\0�x��(	�G>�@�����9\0T����GB7�-�����G:<Q��#���Ǵ�1�&tz��0*J=�'�J>���8q��Х���	�O��X�F��Q�,����\"9��p�*�66A'�,y��IF�R��T���\"��H�R�!�j#kyF���e��z�����G\0�p��aJ`C�i�@�T�|\n�Ix�K\"��*��Tk\$c��ƔaAh��!�\"�E\0O�d�Sx�\0T	�\0���!F�\n�U�|�#S&		IvL\"����\$h���EA�N\$�%%�/\nP�1���{��) <���L���-R1��6���<�@O*\0J@q��Ԫ#�@ǵ0\$t�|�]�`��ĊA]���Pᑀ�C�p\\pҤ\0���7���@9�b�m�r�o�C+�]�Jr�f��\r�)d�����^h�I\\�. g��>���8���'�H�f�rJ�[r�o���.�v���#�#yR�+�y��^����F\0᱁�]!ɕ�ޔ++�_�,�\0<@�M-�2W���R,c���e2�*@\0�P ��c�a0�\\P���O���`I_2Qs\$�w��=:�z\0)�`�h�������\nJ@@ʫ�\0�� 6qT��4J%�N-�m����.ɋ%*cn��N�6\"\r͑�����f�A���p�MۀI7\0�M�>lO�4�S	7�c���\"�ߧ\0�6�ps�����y.��	���RK��PAo1F�tI�b*��<���@�7�˂p,�0N��:��N�m�,�xO%�!��v����gz(�M���I��	��~y���h\0U:��OZyA8�<2����us�~l���E�O�0��0]'�>��ɍ�:���;�/��w�����'~3GΖ~ӭ����c.	���vT\0c�t'�;P�\$�\$����-�s��e|�!�@d�Obw��c��'�@`P\"x����0O�5�/|�U{:b�R\"�0�шk���`BD�\nk�P��c��4�^ p6S`��\$�f;�7�?ls��߆gD�'4Xja	A��E%�	86b�:qr\r�]C8�c�F\n'ьf_9�%(��*�~��iS����@(85�T��[��Jڍ4�I�l=��Q�\$d��h�@D	-��!�_]��H�Ɗ�k6:���\\M-����\r�FJ>\n.��q�eG�5QZ����' ɢ���ہ0��zP��#������r���t����ˎ��<Q��T��3�D\\����pOE�%)77�Wt�[��@����\$F)�5qG0�-�W�v�`�*)Rr��=9qE*K\$g	��A!�PjBT:�K���!��H� R0?�6�yA)B@:Q�8B+J�5U]`�Ҭ��:���*%Ip9�̀�`KcQ�Q.B��Ltb��yJ�E�T��7���Am�䢕Ku:��Sji� 5.q%LiF��Tr��i��K�Ҩz�55T%U��U�IՂ���Y\"\nS�m���x��Ch�NZ�UZ���( B��\$Y�V��u@蔻����|	�\$\0�\0�oZw2Ҁx2���k\$�*I6I�n�����I,��QU4�\n��).�Q���aI�]����L�h\"�f���>�:Z�>L�`n�ض��7�VLZu��e��X����B���B�����Z`;���J�]�����S8��f \nڶ�#\$�jM(��ޡ����a�G��+A�!�xL/\0)	C�\n�W@�4�����۩� ��RZ����=���8�`�8~�h��P ��\r�	���D-FyX�+�f�QSj+X�|��9-��s�x�����+�V�cbp쿔o6H�q�����@.��l�8g�YM��WMP��U��YL�3Pa�H2�9��:�a�`��d\0�&�Y��Y0٘��S�-��%;/�T�BS�P�%f������@�F�(�֍*�q +[�Z:�QY\0޴�JUY֓/���pkzȈ�,�𪇃j�ꀥW�״e�J�F��VBI�\r��pF�Nقֶ�*ը�3k�0�D�{����`q��ҲBq�e�D�c���V�E���n����FG�E�>j�����0g�a|�Sh�7u�݄�\$���;a��7&��R[WX���(q�#���P���ז�c8!�H���VX�Ď�j��Z������Q,DUaQ�X0��ը���Gb��l�B�t9-oZ���L���­�pˇ�x6&��My��sҐ����\"�̀�R�IWU`c���}l<|�~�w\"��vI%r+��R�\n\\����][��6�&���ȭ�a�Ӻ��j�(ړ�Tѓ��C'��� '%de,�\n�FC�эe9C�N�Ѝ�-6�Ueȵ��CX��V������+�R+�����3B��ڌJ�虜��T2�]�\0P�a�t29��(i�#�aƮ1\"S�:�����oF)k�f���Ъ\0�ӿ��,��w�J@��V򄎵�q.e}KmZ����XnZ{G-���ZQ���}��׶�6ɸ���_�؁Չ�\n�@7�` �C\0]_ ��ʵ����}�G�WW: fCYk+��b۶���2S,	ڋ�9�\0﯁+�W�Z!�e��2������k.Oc��(v̮8�DeG`ۇ�L���,�d�\"C���B-�İ(����p���p�=����!�k������}(���B�kr�_R�ܼ0�8a%ۘL	\0���b������@�\"��r,�0T�rV>����Q��\"�r��P�&3b�P��-�x���uW~�\"�*舞�N�h�%7���K�Y��^A����C����p����\0�..`c��+ϊ�GJ���H���E����l@|I#Ac��D��|+<[c2�+*WS<�r��g���}��>i�݀�!`f8�(c����Q�=f�\n�2�c�h4�+q���8\na�R�B�|�R����m��\\q��gX����ώ0�X�`n�F���O p��H�C��jd�f��EuDV��bJɦ��:��\\�!mɱ?,TIa���aT.L�]�,J��?�?��FMct!a٧R�F�G�!�A���rr�-p�X��\r��C^�7���&�R�\0��f�*�A\n�՛H��y�Y=���l�<��A�_��	+��tA�\0B�<Ay�(fy�1�c�O;p���ᦝ`�4СM��*��f�� 5fvy {?���:y��^c��u�'���8\0��ӱ?��g��� 8B��&p9�O\"z���rs�0��B�!u�3�f{�\0�:�\n@\0����p���6�v.;�����b�ƫ:J>˂��-�B�hkR`-����aw�xEj����r�8�\0\\����\\�Uhm� �(m�H3̴�S����q\0��NVh�Hy�	��5�M͎e\\g�\n�IP:Sj�ۡٶ�<���x�&�L��;nfͶc�q��\$f�&l���i�����0%yΞ�t�/��gU̳�d�\0e:��h�Z	�^�@��1��m#�N��w@��O��zG�\$�m6�6}��ҋ�X'�I�i\\Q�Y���4k-.�:yz���H��]��x�G��3��M\0��@z7���6�-DO34�ދ\0Κ��ΰt\"�\"vC\"Jf�Rʞ��ku3�M��~����5V ��j/3���@gG�}D���B�Nq��=]\$�I��Ӟ�3�x=_j�X٨�fk(C]^j�M��F��ա��ϣCz��V��=]&�\r�A<	������6�Ԯ�״�`jk7:g��4ծ��YZq�ftu�|�h�Z��6��i〰0�?��骭{-7_:��ސtѯ�ck�`Y��&���I�lP`:�� j�{h�=�f	��[by��ʀoЋB�RS���B6��^@'�4��1U�Dq}��N�(X�6j}�c�{@8���,�	�PFC���B�\$mv���P�\"��L��CS�]����E���lU��f�wh{o�(��)�\0@*a1G� (��D4-c��P8��N|R���VM���n8G`e}�!}���p�����@_���nCt�9��\0]�u��s���~�r��#Cn�p;�%�>wu���n�w��ݞ�.���[��hT�{��值	�ˁ��J���ƗiJ�6�O�=������E��ٴ��Im���V'��@�&�{��������;�op;^��6Ŷ@2�l���N��M��r�_ܰ�Í�` �( y�6�7�����ǂ��7/�p�e>|��	�=�]�oc����&�xNm���烻��o�G�N	p����x��ý���y\\3����'�I`r�G�]ľ�7�\\7�49�]�^p�{<Z��q4�u�|��Qۙ��p���i\$�@ox�_<���9pBU\"\0005�� i�ׂ��C�p�\n�i@�[��4�jЁ�6b�P�\0�&F2~������U&�}����ɘ	��Da<��zx�k���=���r3��(l_���FeF���4�1�K	\\ӎld�	�1�H\r���p!�%bG�Xf��'\0���	'6��ps_��\$?0\0�~p(�H\n�1�W:9�͢��`��:h�B��g�B�k��p�Ɓ�t��EBI@<�%����` �y�d\\Y@D�P?�|+!��W��.:�Le�v,�>q�A���:���bY�@8�d>r/)�B�4���(���`|�:t�!����?<�@���/��S��P\0��>\\�� |�3�:V�uw���x�(����4��ZjD^���L�'���C[�'�����jº[�E�� u�{KZ[s���6��S1��z%1�c��B4�B\n3M`0�;����3�.�&?��!YA�I,)��l�W['��ITj���>F���S���BбP�ca�ǌu�N����H�	LS��0��Y`���\"il�\r�B���/����%P���N�G��0J�X\n?a�!�3@M�F&ó����,�\"���lb�:KJ\r�`k_�b��A��į��1�I,�����;B,�:���Y%�J���#v��'�{������	wx:\ni����}c��eN���`!w��\0�BRU#�S�!�<`��&v�<�&�qO�+Σ�sfL9�Q�Bʇ����b��_+�*�Su>%0�����8@l�?�L1po.�C&��ɠB��qh�����z\0�`1�_9�\"���!�\$���~~-�.�*3r?�ò�d�s\0����>z\n�\0�0�1�~���J����|Sޜ��k7g�\0��KԠd��a��Pg�%�w�D��zm�����)����j�����`k���Q�^��1���+��>/wb�GwOk���_�'��-CJ��7&����E�\0L\r>�!�q́���7����o��`9O`�����+!}�P~E�N�c��Q�)��#��#�����������J��z_u{��K%�\0=��O�X�߶C�>\n���|w�?�F�����a�ϩU����b	N�Y��h����/��)�G��2���K|�y/�\0��Z�{��P�YG�;�?Z}T!�0��=mN����f�\"%4�a�\"!�ޟ����\0���}��[��ܾ��bU}�ڕm��2�����/t���%#�.�ؖ��se�B�p&}[˟��7�<a�K���8��P\0��g��?��,�\0�߈r,�>���W����/��[�q��k~�CӋ4��G��:��X��G�r\0������L%VFLUc��䑢��H�ybP��'#��	\0п���`9�9�~���_��0q�5K-�E0�b�ϭ�����t`lm����b��Ƙ; ,=��'S�.b��S���Cc����ʍAR,����X�@�'��8Z0�&�Xnc<<ȣ�3\0(�+*�3��@&\r�+�@h, ��\$O���\0Œ��t+>����b��ʰ�\r�><]#�%�;N�s�Ŏ����*��c�0-@��L� >�Y�p#�-�f0��ʱa�,>��`����P�:9��o���ov�R)e\0ڢ\\����\nr{îX����:A*��.�D��7�����#,�N�\r�E���hQK2�ݩ��z�>P@���	T<��=�:���X�GJ<�GAf�&�A^p�`���{��0`�:���);U !�e\0����c�p\r�����:(��@�%2	S�\$Y��3�hC��:O�#��L��/����k,��K�oo7�BD0{���j��j&X2��{�}�R�x��v���أ�9A����0�;0�����-�5��/�<�� �N�8E����	+�Ѕ�Pd��;���*n��&�8/jX�\r��>	PϐW>K��O��V�/��U\n<��\0�\nI�k@��㦃[��Ϧ²�#�?���%���.\0001\0��k�`1T� ����ɐl�������p���������< .�>��5��\0��	O�>k@Bn��<\"i%�>��z��������3�P�!�\r�\"��\r �>�ad���U?�ǔ3P��j3�䰑>;���>�t6�2�[��޾M\r�>��\0��P���B�Oe*R�n���y;� 8\0���o�0���i���3ʀ2@����?x�[����L�a����w\ns����A��x\r[�a�6�clc=�ʼX0�z/>+����W[�o2���)e�2�HQP�DY�zG4#YD����p)	�H�p���&�4*@�/:�	�T�	���aH5���h.�A>��`;.���Y��a	���t/ =3��BnhD?(\n�!�B�s�\0��D�&D�J��)\0�j�Q�y��hDh(�K�/!�>�h,=�����tJ�+�S��,\"M�Ŀ�N�1�[;�Т��+��#<��I�Zğ�P�)��LJ�D��P1\$����Q�>dO��v�#�/mh8881N:��Z0Z���T �B�C�q3%��@�\0��\"�XD	�3\0�!\\�8#�h�v�ib��T�!d�����V\\2��S��Œ\nA+ͽp�x�iD(�(�<*��+��E��T���B�S�CȿT���� e�A�\"�|�u�v8�T\0002�@8D^oo�����|�N������J8[��3����J�z׳WL\0�\0��Ȇ8�:y,�6&@�� �E�ʯݑh;�!f��.B�;:���[Z3������n���ȑ��A���qP4,��Xc8^��`׃��l.����S�hޔ���O+�%P#Ρ\n?��IB��eˑ�O\\]��6�#��۽؁(!c)�N����?E��B##D �Ddo��P�A�\0�:�n�Ɵ�`  ��Q��>!\r6�\0��V%cb�HF�)�m&\0B�2I�5��#]���D>��3<\n:ML��9C���0��\0���(ᏩH\n����M�\"GR\n@���`[���\ni*\0��)������u�)��Hp\0�N�	�\"��N:9q�.\r!���J��{,�'����4�B���lq���Xc��4��N1ɨ5�Wm��3\n��F��`�'��Ҋx��&>z>N�\$4?����(\n쀨>�	�ϵP�!Cq͌��p�qGLqq�G�y�H.�^��\0z�\$�AT9Fs�Ѕ�D{�a��cc_�G�z�)� �}Q��h��HBָ�<�y!L����!\\�����'�H(��-�\"�in]Ğ���\\�!�`M�H,gȎ�*�Kf�*\0�>6���6��2�hJ�7�{nq�8����H�#c�H�#�\r�:��7�8�܀Z��ZrD��߲`rG\0�l\n�I��i\0<����\0Lg�~���E��\$��P�\$�@�PƼT03�HGH�l�Q%*\"N?�%��	��\n�CrW�C\$��p�%�uR`��%��R\$�<�`�Ifx���\$/\$�����\$���O�(���\0��\0�RY�*�/	�\rܜC9��&hh�=I�'\$�RRI�'\\�a=E����u·'̙wI�'T���������K9%�d����!��������j�����&���v̟�\\=<,�E��`�Y��\\����*b0>�r��,d�pd���0DD ̖`�,T �1�% P���/�\r�b�(���J����T0�``ƾ����J�t���ʟ((d�ʪ�h+ <Ɉ+H%i�����#�`� ���'��B>t��J�Z\\�`<J�+hR���8�hR�,J]g�I��0\n%J�*�Y���JwD��&ʖD�������R�K\"�1Q�� ��AJKC,�mV�������-���KI*�r��\0�L�\"�Kb(����J:qKr�d�ʟ-)��ˆ#Ը�޸[�A�@�.[�Ҩʼ�4���.�1�J�.̮�u#J���g\0��򑧣<�&���K�+�	M?�/d��%'/��2Y��>�\$��l�\0��+����}-t��ͅ*�R�\$ߔ��K�.����JH�ʉ�2\r��B���(P���6\"��nf�\0#Ї ��%\$��[�\n�no�LJ�����e'<����1K��y�Y1��s�0�&zLf#�Ƴ/%y-�ˣ3-��K��L�΁��0����[,��̵,������0���(�.D��@��2�L+.|�����2�(�L�*��S:\0�3����G3l��aːl�@L�3z4�ǽ%̒�L�3����!0�33=L�4|ȗ��+\"���4���7�,\$�SPM�\\��?J�Y�̡��+(�a=K��4���C̤<Ё�=\$�,��UJ]5h�W�&t�I%��5�ҳ\\M38g�́5H�N?W1H��^��Ը�Y͗ؠ�͏.�N3M�4Å�`��i/P�7�dM>�d�/�LR���=K�60>�I\0[��\0��\r2���Z@�1��2��7�9�FG+�Ҝ�\r)�hQtL}8\$�BeC#��r*H�۫�-�H�/���6��\$�RC9�ب!���7�k/P�0Xr5��3D���<T�Ԓq�K���n�H�<�F�:1SL�r�%(��u)�Xr�1��nJ�I��S�\$\$�.·9��IΟ�3 �L�l���Ι9��C�N�#ԡ�\$�/��s��9�@6�t���N�9���N�:����7�Ӭ�:D���M)<#���M}+�2�N��O&��JNy*���ٸ[;���O\"m����M�<c�´���8�K�,���N�=07s�JE=T��O<����J�=D��:�C<���ˉ=���K�ʻ̳�L3�����LTЀ3�S,�.���q-��s�7�>�?�7O;ܠ`�OA9���ϻ\$���O�;��`9�n�I�A�xp��E=O�<��5����2�O�?d�����`N�iO�>��3�P	?���O�m��S�M�ˬ��=�(�d�Aȭ9���\0�#��@��9D����&���?����i9�\n�/��A���ȭA��S�Po?kuN5�~4���6���=򖌓*@(�N\0\\۔dG��p#��>�0��\$2�4z )�`�W���+\0��80�菦������z\"T��0�:\0�\ne \$��rM�=�r\n�N�P�Cmt80�� #��J=�&��3\0*��B�6�\"������#��>�	�(Q\n���8�1C\rt2�EC�\n`(�x?j8N�\0��[��QN>���'\0�x	c���\n�3��Ch�`&\0���8�\0�\n���O`/����A`#��Xc���D �tR\n>���d�B�D�L��������Dt4���j�p�GAoQoG8,-s����K#�);�E5�TQ�G�4Ao\0�>�tM�D8yRG@'P�C�	�<P�C�\"�K\0��x��~\0�ei9���v))ѵGb6���H\r48�@�M�:��F�tQ�!H��{R} �URp���O\0�I�t8������[D4F�D�#��+D�'�M����>RgI���Q�J���U�)Em���TZ�E�'��iE����qFzA��>�)T�Q3H�#TL�qIjNT���&C��h�X\nT���K\0000�5���JH�\0�FE@'љFp�hS5F�\"�oѮ�e%aoS E)� ��DU��Q�Fm�ѣM��Ѳe(tn� �U1ܣ~>�\$��ǂ��(h�ǑG�y`�\0��	��G��3�5Sp(��P�G�\$��#��	���N�\n�V\$��]ԜP�=\"RӨ?Lzt��1L\$\0��G~��,�KN�=���GM����NS�)��O]:ԊS}�81�RGe@C�\0�OP�S�N�1��T!P�@��S����S�G`\n�:��P�j�7R� @3��\n� �������DӠ��L�����	��\0�Q5���CP��SMP�v4��?h	h�T�D0��֏��>&�ITx�O�?�@U��R8@%Ԗ��K���N�K��RyE�E#�� @����%L�Q�Q����?N5\0�R\0�ԁT�F�ԔR�S�!oTE�C(�����ĵ\0�?3i�SS@U�QeM��	K�\n4P�CeS��\0�NC�P��O�!�\"RT�����S�N���U5OU>UiI�PU#UnKP��UYT�*�C��U�/\0+���)��:ReA�\$\0���x��WD�3���`����U5�IHUY��:�P	�e\0�MJi�����Q�>�@�T�C{��u��?�^�v\0WR�]U}C��1-5+U�?�\r�W<�?5�JU-SX��L�� \\t�?�sM�b�ՃV܁t�T�>�MU+�	E�c���9Nm\rRǃC�8�S�X�'R��XjCI#G|�!Q�Gh�t�Q��� )<�Y�*��RmX0����M���OQ�Y�h���du���Z(�Ao#�NlyN�V�Z9I���M��V�ZuOՅT�T�EՇַS�e����\n�X��S�QER����[MF�V�O=/����>�gչT�V�oU�T�Z�N�*T\\*����S-p�S��V�q��M(�Q=\\�-UUUV�C���Z�\nu�V\$?M@U�WJ\r\rU��\\�'U�W]�W��W8�N�'#h=oC���F(��:9�Yu����V-U�9�]�C�:U�\\�\n�qW���(TT?5P�\$ R3�⺟C}`>\0�E]�#R��	��#R�)�W���:`#�G�)4�R��;��ViD%8�)Ǔ^�Q��#�h	�HX	��\$N�x��#i x�ԒXR��'�9`m\\���\nE��Q�`�bu@��N�dT�#YY����GV�]j5#?L�xt/#���#酽O�P��Q��6����^� �������M\\R5t�Ӛp�*��X�V\"W�D�	oRALm\rdG�N	����6�p\$�P废E5����Tx\n�+��C[��V�����8U�Du}ػF\$.��Q-;4Ȁ�NX\n�.X�b͐�\0�b�)�#�N�G4K��ZS�^״M�8��d�\"C��>��dHe\n�Y8���.� ���ҏF�D��W1cZ6��Q�KH�@*\0�^���\\Q�F�4U3Y|�=�Ӥ�E��ۤ�?-�47Y�Pm�hYw_\r�VeױM���ُe(0��F�\r�!�PUI�u�7Q�C�ю?0����gu\rqधY-Q�����=g\0�\0M#�U�S5Zt�֟ae^�\$>�ArV�_\r;t���HW�Z�@H��hzD��\0�S2J� HI�O�'ǁe�g�6�[�R�<�?� /��KM����\n>��H�Z!i����TX6���i�C !ӛg�� �G }Q6��4>�w�!ڙC}�VB�>�UQڑj�8c�U�T���'<�>����HC]�V��7jj3v���`0���23����x�@U�k�\n�:Si5��#Y�-w����M?c��MQ�GQ�уb`��\0�@��ҧ\0M��)ZrKX�֟�Wl������l�TM�D\r4�QsS�40�sQ́�mY�h�d��C`{�V�gE�\n��XkՁ�'��,4���^�6�#<4��NXnM):��OM_6d�������[\"KU�n��?l�x\0&\0�R56�T~>��ո?�Jn��� ��Z/i�6���glͦ�U��F}�.����JL�CTbM�4��cL�TjSD�}Jt���Z����:�L���d:�Ez�ʤ�>��V\$2>����[�p�6��R�9u�W.?�1��RHu���R�?58Ԯ��D��u���p�c�Z�?�r׻ Eaf��}5wY���ϒ���W�wT[Sp7'�_aEk�\"[/i��#�\$;m�fأWO����F�\r%\$�ju-t#<�!�\n:�KEA����]�\nU�Q�KE��#��X��5[�>�`/��D��֭VEp�)��I%�q���n�x):��le���[e�\\�eV[j�����7 -+��G�WEwt�WkE�~u�Q/m�#ԐW�`�yu�ǣD�A�'ױ\r��ՙO�D )ZM^��u-|v8]�g��h���L��W\0���6�X��=Y�d�Q�7ϓ��9����r <�֏�D��B`c�9���`�D�=wx�I%�,ᄬ�����j[њ����O��� ``��|�����������.�	AO���	��@�@ 0h2�\\�ЀM{e�9^>���@7\0��˂W���\$,��Ś�@؀����w^fm�,\0�yD,ם^X�.�ֆ�7����2��f;��6�\n����^�zC�קmz��n�^���&LFF�,��[��e��aXy9h�!:z�9c�Q9b� !���Gw_W�g�9���S+t���p�tɃ\nm+����_�	��\\���k5���]�4�_h�9 ��N����]%|��7�֜�];��|���X��9�|����G���[��\0�}U���MC�I:�qO�Vԃa\0\r�R�6π�\0�@H��P+r�S�W���p7�I~�p/��H�^������E�-%��̻�&.��+�Jђ;:���!���N�	�~����/�W��!�B�L+�\$��q�=��+�`/Ƅe�\\���x�pE�lpS�JS�ݢ��6��_�(ů���b\\O��&�\\�59�\0�9n���D�{�\$���K��v2	d]�v�C�����?�tf|W�:���p&��Ln��賞�{;���G�R9��T.y���I8���\rl� �	T��n�3���T.�9��3����Z�s����G����:	0���z��.�]��ģQ�?�gT�%��x�Ռ.����n<�-�8B˳,B��rgQ�����Ɏ`��2�:{�g��s��g�Z��� ׌<��w{���bU9�	`5`4�\0BxMp�8qnah�@ؼ�-�(�>S|0�����3�8h\0���C�zLQ�@�\n?��`A��>2��,���N�&��x�l8sah1�|�B�ɇD�xB�#V��V�׊`W�a'@���	X_?\n�  �_�. �P�r2�bUar�I�~��S���\0ׅ\"�2����>b;�vPh{[�7a`�\0�˲j�o�~���v��|fv�4[�\$��{�P\rv�BKGbp������O�5ݠ2\0j�لL���)�m��V�ejBB.'R{C��V'`؂ ��%�ǀ�\$�O��\0�`����4 �N�>;4���/�π��*��\\5���!��`X*�%��N�3S�AM���Ɣ,�1����\\��caϧ ��@��˃�B/����0`�v2��`hD�JO\$�@p!9�!�\n1�7pB,>8F4��f�π:��7���3��3����T8�=+~�n���\\�e�<br����Fز� ��C�N�:c�:�l�<\r��\\3�>���6�ONn��!;��@�tw�^F�L�;���,^a��\ra\"��ڮ'�:�v�Je4�א;��_d\r4\r�:����S�����2��[c��X�ʦPl�\$�ޣ�i�w�d#�B��b��������`:���~ <\0�2����R���P�\r�J8D�t@�E��\0\r͜6����7����Y���\"����\r�����3��.�+�z3�;_ʟvL����wJ�94�I�Ja,A����;�s?�N\nR��!��ݐ�Om�s�_��-zۭw���zܭ7���z���M����o����\0��a��ݹ4�8�Pf�Y�?��i��eB�S�1\0�jDTeK��UYS�?66R	�c�6Ry[c���5�]B͔�R�_eA)&�[凕XYRW�6VYaeU�fYe�w��U�b�w�E�ʆ;z�^W�9��ק�ݖ��\0<ޘ�e�9S���da�	�_-��L�8ǅ�Q��TH[!<p\0��Py5�|�#��P�	�9v��2�|Ǹ��fao��,j8�\$A@k����a���b�c��f4!4���cr,;�����b�=��;\0��ź���cd��X�b�x�a�Rx0A�h�+w�xN[��B��p���w�T�8T%��M�l2�������}��s.kY��0\$/�fU�=��s�gK���M� �?���`4c.��!�&�分g��f�/�f1�=��V AE<#̹�f\n�)���Np��`.\"\"�A�����q��X��٬:a�8��f��Vs�G��r�:�V��c�g�Vl��g=��`��W���y�gU��˙�Ẽ�eT=�����x 0� M�@����%κb���w��f��O�筘�*0���|t�%��P��p��gK���?p�@J�<Bٟ#�`1��9�2�g�!3~����nl��f��Vh���.����aC���?���-�1�68>A��a�\r��y�0��i�J�}�������z:\r�)�S���@��h@���Y���mCEg�cyφ��<���h@�@�zh<W��`��:zO���\r��W���V08�f7�(Gy���`St#��f�#����C(9���؀d���8T:���0�� q���79��phAg�6�.��7Fr�b� �j��A5��a1��h�ZCh:�%��gU��D9��Ɉ�׹��0~vTi;�VvS��w��\r΃?��f�����n�ϛiY��a��3�·9�,\n��r��,/,@.:�Y>&��F�)�����}�b���iO�i��:d�A�n��c=�L9O�h{�� 8hY.������������\r��և�����1Q�U	�C�h��e�O���+2o����N�����zp�(�]�h��Z|�O�c�zD���;�T\0j�\0�8#�>Ύ�=bZ8Fj���;�޺T酡w��)���N`���ÅB{��z\r�c���|dTG�i�/��!i��0���'`Z:�CH�(8�`V������\0�ꧩ��W��Ǫ��zgG������-[��	i��N\rq��n���o	ƥfEJ��apb��}6���=o���,t�Y+��EC\r�Px4=����@���.��F��[�zq���X6:FG��#��\$@&�ab��hE:����`�S�1�1g1���2uhY��_:Bߡdc�*���\0�ƗFYF�:���n���=ۨH*Z�Mhk�/�냡�zٹ]��h@����1\0��ZK�������^+�,vf�s��>���O�|���s�\0֜5�X��ѯF��n�A�r]|�Ii4�� ��C� h@ع����cߥ�6smO������gX�V2�6g?~��Y�Ѱ�s�cl \\R�\0��c��A+�1������\n(����^368cz:=z��(�� ;裨�s�F�@`;�,>yT��&��d�Lן��%��-�CHL8\r��b�����Mj]4�Ym9����Z�B��P}<���X���̥�+g�^�M� + B_Fd�X���l�w�~�\r⽋�\":��qA1X������3�ΓE�h�4�ZZ��&����1~!N�f��o���\nMe�଄��XI΄�G@V*X��;�Y5{V�\n���T�z\rF�3}m��p1�[�>�t�e�w����@V�z#��2��	i���{�9��p̝�gh���+[elU���A�ٶӼi1�!��omm�*K���}��!�Ƴ��{me�f`��m��C�z=�n�:}g� T�mLu1F��}=8�Z���O��mFFMf��OO����������/����ޓ���V�oqj���n!+����Z��I�.�9!nG�\\��3a�~�O+��::�K@�\n�@���Hph��\\B��dm�fvC���P�\" ��.nW&��n��HY�+\r���z�i>Mfqۤ��Qc�[�H+��o��*�1'��#āEw�D_X�)>�s��-~\rT=�������- �y�m����{�h��j�M�)�^����'@V�+i�������;F��D[�b!����B	��:MP���ۭoC�vAE?�C�IiY��#�p�P\$k�J�q�.�07���x�l�sC|���bo�2�X�>M�\rl&��:2�~��cQ����o��d�-��U�Ro�Y�nM;�n�#��\0�P�f��Po׿(C�v<���[�o۸����fѿ���;�ẖ�[�Y�.o�Up���pU���.���B!'\0���<T�:1�������<���n��F���I�ǔ��V0�ǁRO8�w��,aF��ɥ�[�Ο��YO����/\0��ox���Q�?��:ً���`h@:�����/M�m�x:۰c1������v�;���^���@��@�����\n{�����;���B��8�� g坒�\\*g�yC)��E�^�O�h	���A�u>���@�D��Y�����`o�<>��p���ķ�q,Y1Q��߸��/qg�\0+\0���D���?�� ����k:�\$����ץ6~I��=@���!��v�zO񁚲�+���9�i����a������g������?��0Gn�q�]{Ҹ,F���O���� <_>f+��,��	���&�����·�y�ǩO�:�U¯�L�\n�úI:2��-;_Ģ�|%�崿!��f�\$���Xr\"Kni����\$8#�g�t-��r@L�圏�@S�<�rN\n�D/rLdQk࣓�����e����Э��\n=4)�B���ך��Z-|Hb����Hk�*	�Q!�'��G ��Ybt!��(n,�P�Ofq�+X�Y����\"b F6��r f�\"�ܳ!N��^��r�B_(�\"�K�_-<��*Q���/,)�H\0����r�\"z2(�tه.F>��#3���268sh٠��ƑI1Sn20���-��4���2A�s(�4�˶��\0��#��r�K'�ͷG'�7&\n>x���J�GO8,�0���8���\0�W9��I�?:3n�\r-w:�����;3ȉ�!�;��ꃘ�Z�RM�+>�����0/=R�'1�4�8����m�%ȥ}χ9�;�=�nQ��=�hhL��G�kW�\r�	%�4Ҝs�ΖJ�3s�4�@�U�%\$���N;�?4���N��2|��Z�3�h\0�3�5�^�xi2d\r|�M�ʣbh|�#v�` \0�ꐮ���\$\r2h#���?���I\n���+o-��?6`ṽ�.\$���KY%�J?�c�R�N#K:�K�EL�>:��@��jP��n_t&slm�'�ЩɸӜ�����;6ۗHU5#�Q7U��WY�U bN��W�_���;TC�[�<ږ>����W�CU��6X#`MI:t�ӵ��	u#`�fu�\$�t���X�`�f<�;b�gh���9�7�S58���#^�-�\0����չR*�'��(���qZ壣�X�Q�FUv�W GW���T��W�~ڭ^�W�����J=_ؗbm��bV\\l��/�M��TmTOXu�=_��ITvvu�a\rL_�qR/]]m�su=H=u�g o\\UՅgM�	XVU��%�h��53U�\\=��Q��M�v���g�m��ue�����h�b�M�GCeO5�ԁ�O5��Y�i=e�	G�TURvOa�*�ivWX�J5<��bu�]������<����\$u3v#�'e�u�R5m��v�D5�.v���W=�U_�(�\\V��_<��S�n)�1M%Qh�Z�T�f5E�'��W��v�UmiՂU��]aW�U�dRv��-YUZu��UV��UiR�V������[��ZMU�\\=�v{�X���wQ�huHv��gqݴw!�oqt�U{TGq�{�#^G_ubQ���i9Qb>�NUd��k��5hP�mu[�\0����_��[�Y-����r���(�CrMe�J�!h?QrX3 x���#��x�<�{u5~���-�u��YyQ\r-��\0�uգuuٿpUڅ�)�P��\r<u�S�0��w��-i���!�֊�B���d]��Ň��E��vlmQݏ6k��J��w�Ğ����ED�U�R�e�v:X�c�NW}`-�t�H#e��b��u���	~B7� ?�	OP�CW���SE͕V>���U�7�����m�ӂ�z�=����1���+��m�I,>�X7��]�.��*	^��N��.��/\"���)�	���s��|��ӟ�l�}�����!�5n�p�j��h�}���m�E�zH�aO0d=A|w�߳������u���v���G�x#��b�cS�o-��tOm`C��^M��@�h�n\$k�`�`HD^�PE�[�]��rR�m�=�.�ه>Ayi� \"���	��o�-,.�\nq+���fXd����*߽�K�؃'�� �%a����9p���KLM��!�,������zX#�V�uH%!��63�J�ryՁ��q_�u	�W����|@3b1��7|~wﱳ��A7���	��9cS&{���%Vx��kZO��w�Ur?����N �|�C�#Ű��կ �/��9�ft�Ew�C��a�^\0�O<�W�{Y�=�e��n���gyf0h@�S�\0:C���^��VgpE9:85�3�ާ���@��j_�[�+��ǩx�^�ꮆ~@чW���㓜�9x�FC���.�����k^I���pU9��S������\$���\r4���\0��O���)L[�p?�.PECS�I1nm{�?�P�WA߲�;���D�;S�a�Kf��%�?�X��+��B>��9���Gj�c�z�A͎�:�a�n0bJ{o��!3��!'��K�����}�\\��3W��5�x���L;�2ζn�a;���׺Xӛ]�o��x�{�5ޙjX���vӚ��q��EE{р4����{���	�\n��>��aﯷ�����L����������'����{�\n��>J�ߌ��ӗ��Y�\rOʽ�t����-O���4��9F�;�����G��I�F��1�o����O���a{w�0����Ư;񔄑l�o��J�Tb\rw�2�J��=D#�n�:�y��S�^�,.�?(�I\$���Ư��3��s�4M�aCR���G̑��I߰n<�zy�XN��?��.��=���DǼ�\r����\n��\ro��\nПCl%��Y���߰��G���}#�VН%�(����3�ɍ�r��};��׿G��n�[�{����_<m4[	I����q��?�0cV�nms��nM���\"Nj1�w?@�\$1��>��^�����\\�{n�\\���7���ٟic1���hoo�?j<G�x�l���S�r}���|\"}��/�?s��tI���&^�1e��t��,�*'F��=�/F�k�,95rV������쑈��o9��/F��_�~*^��{�I����_�����^n���N��~���A�d����U�w�qY���T�2��G�?�&����:y��%��X�J�C�d	W�ߎ~�G!��J}��������B-��;���h�*�R���E��~���.�~���SAqDVx���='��E�(^���~����������o7~�M[��Q��(��y��nP�>[WX{q�aϤ���.&N�3]��HY������[���&�8?�3������݆����#���B�e�6��@��[������G\r�+��}������_��7�|N����4~(z�~����%��?����[��1�S�]x�k��KxO^�A���rZ+����*�W��k�wD(���R:��\0����'����m!O�\n��u���.�[ �P�!��}��m ��1p�u��,T��L 	0}��&P٥\n�=D�=���\rA/�o@��2�t�6�DK��\0���q�7�l���B���(�;[��kr\r�;#���lŔ\r�<}zb+��O�[�WrX�`�Z ţ�Pm'Fn����Sp�-�\0005�`d���P���Ǿ��;��n\0�5f�P���EJ�w�� �.?�;��N�ޥ,;Ʀ�-[7��e��i��-���dَ<[~�6k:&�.7�]�\0������/�59 ��@eT:煘�3�d�sݝ�5䏜5f\0�P��HB�����8J�LS\0vI\0���7Dm��a�3e��?B��\$�.E���f���@�n���b�Gb��q3�|��Paˈ�ϯX7Tg>�.�p�5��AHŵ��3S�,��@�#&w��3��m[���I�ѥ�^�̤J1?�gTၽ#�S�=_��_��	���Vq/C۾�݀�|�����D �g>܄��� 6\r�7}q��Ť�JG�B^�\\g������&%��[�2Ixì��6\03]�3�{�@RU��M��v<�1����sz�uP�5��F:�i�|�`�q���V| ��\nk��}�'|�gd�!�8� <,�P7�m��||���I�A��]BB �F�0X���	�D��`W���qm�OL�	�.�(�p��ҁ��\"!����\0��A����V��7k��M�\$�N0\\���\"�f������\0uq��,��5��A6�p���\n�ΐjY�7[pK��4;�l�5n��@�\\f��l	��M���P��3��C�HbЌ��cEpP���4eooe�{\r-��2.�֥��P50u���G}��\0����<\r��!��~�������\n7F��d�����>��a��%�c6Ԟ��M��|��d����O�_�?J��C0�>Ё�&7kM4�`%f�l�ΘB~�wx��ZG�P�2��0�=�*p��@�BeȔ��|2�\r�?q��8����Њ(�yr���0��>�>�E?w�|r]�%Av�����@�+�X��Ag����s��C��AXmNҝ�4\0\r���8J�J�ǸD�Қ�:=	������S�4��F;	�\\&��P!6%\$i�xi4c�0B�;62=��1��̈PC��m���dpc+�5��\$/rCR�`�MQ�6(\\��2A���\\��lG�l�\0Bq��P�r���B����т�_6Ll�!BQ��IG�����XRbs�]B�Hr���`�X��\$p�8���	nbR,±�L��\"�E%\0�aYB�s���D,�!��ϛpN9RbG�4��M��t����jU�����y\0��%\$.�iL!x��ғ�(�.�)6T(�I��a%�K�]m�t���&��G7�ITM�B�\rza��])va�%���41T�j͹(!�����\\�\\�W��\\t\$�0��%�\0aK\$�T�F(Y�C@��H���H�nD�d��Wp��hZ�'�ZC,/���\$����J�FB�uܬQ:Υ�A��:-a#��=jb��l�Ug;{R��U��EWn�Ua��V��Nj��u�G�*�yֹ%��@��*���Yx�_�z�]�)v\"��R��L�VIv�=`��'��U�) S\r~R���\ni��)5S��D49~�b�;)3�,�9M3�HsJkT�Ü�(����uJ�][\$uf��ob���\n.,�Yܵ9j1'��!�1�\$J��gڤ՟ĆU0��Zuah���cH��,�Yt��Kb�5��5��/dY��AU�҅��[W>�_V�\r��*���j��-T�� z�Y�d�c�m�ҹ��:����[Ut-{���l	�i+a)�.[��_:�5��h��W§�m��%JI��[T�h>�������;�X̺d�S�d�V�;\rƱ!N��K&�A�Ju4B��dg΢.Vp��mb��)�V!U\0G丨��`���\\��q�7Q�b�VL��:�Ղ���Z.�N��*�ԏU]Z�l�z������R D1I��£�r:\0<1~;#�Jb���M�y�+�۔/�\"ϛj<3�#��̌��:P.}�e����D\"q�yJ�G���sop�����X�\r��d��\rxJ%���ƼO:%yy��,��%{�3<�Xø����z�E�z(\0 �D_���.2+�g�b�c�x�pgި��|9CP����48U	Q�/Aq��Q�(4 7e\$D��v:�V�b��N4[��iv���2�\r�X1��AJ(<PlF�\0���\\z�)���W�(�4����� p�����`��\r�da6����O��m�a�}q�`��6P�'h��3�|����f� j��A�z���+�D�UW�D���5��%#�x�3{��L\r-͙]:jd�P	j�f�q:Z�\"sad�)�G�3	��+��r�NK��1Q���x=>�\"��-�:�F���Iك*�@ԟ�y�T�\\U��Y~������3D������f,s�8HV�'�t9v(:��B9�\\Z����(�&�E8���W\$X\0�\n��9�WB��b��66j9� �ʈ��?,��| �a��g1�\nPs�\0@�%#K����\r\0ŧ\0���0�?�š,�\0��h��h�\08\0l\0�-�Z��jb�Ŭ\0p\0�-�f`ql��0\0i-�\\ps��7�e\"-Z�lb�E�,�\0��]P ��E��b\0�/,Z��\r�\0000�[f-@\rӯEڋ�/�Z8��~\"��ڋ��.^��Qw��ϋ�\0�/t_ȼ���E���\0�0d]��b�Ť�|\0��\\ؼ���E�\0af0tZ��n�J�\0l\0�0L^��Qj@��J��^��q#F(�1�/�[�1�����I�.�^8��\0[�q��[Ñl\"�� ��\0�0,d����\r����c��{cE�\0o�0�]�\0\rc%�ۋ���8�w���Z��-�\\��{��֋G�/\\bp��@1�\0a�1�����s�!Ũ�/�/�]8��~c\"�ۋ��2�cΑm�\"�9�q�/\\^fQ~c�_���-\$i�\"�\0003����fX�qx#\09��Z.�i���@F���3tZH� \rcK�b\0j�/Dj��1����I�h�a��v�Ʃ�OZ4�Z��т#YE�\0i�.hH��sX/F<���.�j���b���\0mV/d\\���b�E����3T^(�шcKFR�����]X�q��������6�]h��c6Eċ�66�h����n\0005�sn/dn��`\r\"�F���-D`�Ց��N�2�Y��bx��#\\�닇V3x�1x�Fx��\0�6�b�q����!��8|^���ub�����-�r��q��:��%�0�pp�#����\0�6�f��Ǣ�Ŭ�d�0�qH����\$�@�q�-�^B4��\"�\08�1�/lnxϑ���G�3:0tjh�~@Ƽ���3�vH��b�G(�e��4gغq��2�1��-�nX��\"�F<�Q�1\\j��1���Eǋ��4m����[�n�z7�yh�1�#�ގ/�3\\x�q�KG����6�o��1{��FJ���6�lX�q⣄�u���9�r(�1��Gc\0�f:�rX��#�Ž\0i�<\\}���b�F�\0s�7�y2���#uFe��\">4i��������\n<{�㑍��Ɖ�J;�]��1�#��0��J;4^��D���Ǯ����4i��(H#��E�x�/�n��1��/ǡ��j6,l��1t�/\0005%�0�]x����GG5�!�0��������r�q�2��ޑ��NFP�o\"4�_��1�d�%�e �3�s8���G5�� �6�[H��c�H�jY�;�[辑�b�! �y�@�\\��q�#WHN���;�c�Q��:�-�%�.�kXƑ���G͌��1Df�ߑ�cWFl��!�0����c Eܐ��;l��q�\"�F����7\\\\������O�q�.T|\"?����E��f9TyYѩ�SG1���A\$f9R\n\"��x��>B��H��ߤ\0���:\$e�1���F?�=�3Tu)\nq�b��~���<T��α�c�H.�m~C�wHʱ�#/�I�]~3�^��ф#��>�Y�4�^��Qjc��K�1\"�8�|6��c\"�B��\"b4���%����G\0e\"�/t���1r�1��e!v2�y����<Ǡ���8\\o��ђ#t�ѐ\rz@�}H�b���y �1�\\���deG��Z3�~�r)�1ȿ���Bl~H��:�dF��-�?�k8�q�c(F͋�K�5|my�c1�<�*@�j���1��ž��>I�Z��Qj��2��\$0��h�Q��VFT�	\$�Al~�qڣȱ�\$�>\\p�\rq�\$/�u%�!�Jq \$��tE��GN-Tq)�\"��Hʌ��=�X�2-�H���8\\n��RW\$H��\"�C\\_�\0�d\$�f��\".D�u	'Q�zE��&0to��qj��ƿ��R@d������u�##�LLk�*q�\$*Gđi�@T�i�l��E����5���r\\d�I���\"/�Z�0�j\$T���z5Ld3�����o�.Tq�!1{�����9�Z��Q�b�F�wJ94n�����{�(�-�8�2h�u��;\$�-Dk��rs��H���#���Y7�\"�/E����	\$j�^�-�]�7�[\"N\$����W����/]�\$�+�1Ga�/&IDn�@\$��!��\$�-�k!�Q����)(N/\$t������O�KzP�tX��[\0�G��w(*K\$v��1�c�'��G̞I�xd��\n�A�8\\rX��a��I�iN�I%\$���_���6�f�Q�#��I�5#�F��غ��#�E⒕\"�3\$�I�c�H���vR|�Q��cE���:R�e��h�EΏfK`8�r.#�E��s�0L���R��F���!\nC\$`���\$�H?��nP�e�!�@F'���/�����������%�N,h��rF\$�����3�t��Ҁ���!1<��CQ�%�Ò��J�Z�f.�6ō����C���Ԝ.�[��Bҿx����\0NRn`���Y\n�%+N�IMs:ùYd�ef�B[���nƹY��m��R�ג��Y��C�X���j��U+Vk,�\0P��b@e���x��V��yT�7�u�[J�ȱ\nD��eR��mx&�l�\0)�}�J�,\0�I�ZƵ\$k!���Yb�����Re/Q���k�5.�e��5����W�`��\0)�Yv\"V�\0��\n�%��`Yn�աa��xÆQ!,�`\"�	_.�偩Ɩtm\$�\"��J��֍���v�%�M9j��	斧�*�Kp֔�;\\R ��3(���^��:}���|>µa-'U%w*�#>�@�̬e�J���;Pw/+��5E\rjn���d���^[���cΰ�u�z\\ؐ1mi\"x��p��;����P)����#��ؒ���!A�;��	4�a{`aV{K�U��8㨟0''o�2���yc̸9]K�@�җ^�lB��Or���,du��8�?����%�gB����Yn+�%c�e\0���ऱYr@f�(]ּ�\nbiz��n�SS2��GdBPj���@�(�ȥ�!�-�v��e�*c\0��4J�炒���,�U�	d��e�j'T�H]Ԋ�G!�)u��֯��ү�Z�B5�̓W��0\n���R���W��\\�Q j�^r�%l��3,�Yy��f3&��܎�Q:ϵ2�m�R)�T��(KR��0�ʔ@��Y��Y:��e3\r%���T�%�X����ST�.J\\�0�h�ą�D!�:�u���U\"�Ł�o+7�\"����f'��R\0���J��2S�2�#nm ��I劜�\"X���[�ր��} J��c�9p0���Q�(U\0�xDEW��.L��=<B�0+�)ZS V;�\\�I{�5I�A���,dW�u�5Ew\n\$%ҁ���2i_\$��+��O,����X��ՑJg&J��G��%\\J��b.��^L�T�Fl�薹]k#f@L�G�ĐT�ٗ��H��\"�q1S̰��j�V�(Ι��ZVz�ņ�,����G�.1F��gN�;�1ÊV��5E��5`�\0Ct�=F\nṛα�K����\0�ۊ�%��D]Q\$\r\0�3J\\,͙��<T4*���.�YK�D�Q��L�S%,�g������<��u0���Uĉ�*x(��NYv!��y�	w�4fd��rG��M \$��^;�����)<P�]D�%%�;�j��I0�a�u^Jp�[)�v�3RhR�E��\n�L_�#5|ܾ�m3P�*�\\Y51X��	i�N���\$\"��a���h*KU���V8��u�%&�r�˚��5o���g�;�rMl[ƨ�g������U�q�깚h|�eO2�f MlW2AP�׹�����v~eD�e�3Uӫl�E62i�����Ub���U���������V��iI!\$i�ʭ&Z:��xm!ņ�.�O�fwү!���kݤ̓��6b\"�I�J]]:T��6�Vr��}��ǫ]����U��	ys7f�Mř�3����Y��:T_M�w%3�n��\n��z*��3�h��	�`U��L���,�ۄ�5��vf��Û�42_Q��h���uD�\no��)�ĜիM9�7foۼ��r����WB~iT�eyQT�N\n�d�pr�#��M�;���4�p���t���(;���5	|��ǂ��',AV7ܔ��UA�&��R�P�\"��y�ҷ��)�[�n���-3V��,?�s6�p���3�f��A��9k|�ɮS�f�*@��5�g��ɿ2��}����U�ݙ����H�F�l%�p«Ie�be�M�SO\r�[��i�3�f��LV��r�u�����NA�:�%r��y3Q�_̸�W.���^Sl@&���5�Yl��1���}Vx�gʅ�^Sn���Q!:5�Z�iZCԈ:���3qg�%D��ݪ{U�3�tZ�`��u%w:�ZQ:Q���W f�훿9Jpl�)�3x�v���K7�b#�����X+J�(��h��P*Ӂ���Λ��!ה�ŏSL�h*'���\npB��ڪ�gNʝ�8BuҪ���Ό��8ni�I�s�US�I��;vvڳU�sR�7N�u�8�H|���ӷ�̎��8�q����+'���`�x�9R�	ծ��MaR8�x�)��'!���;�U��Y֓��sNI�g:�KT�y�3�g��Y����k���ܳn'LO(��3�w4�4������l���J����w��9�\\����hf(�_~���}9N���\0���b\"�Y餃Th,ڞ�@��D���\$�I��;�e��U��n����,�O��	X��g�-���+>ti'G����l�%\0�8�VB�U1�ye�\0KT�4���m��V2)\r]I/\rF���X���ߨ�a��G�¹�*�����>ER������Z�-)I\$����:�a�\0�Fyba�g�w��(�_@�v}�i�ʳ�S^�25DԳ�	��URO��JH��\\�is�f��K�N��qi�Sg�O\n�F~|���*@gR�_Q<9sܬ3i+ؗ�.Cw���|���y�6a�O�Y9���ɖ\n�Խ-([���_�}�S�]c�S=��������Y��U->�<���\n<�sO�Q4F�^}\0007u�k(/���/5{L�9�\0����&��[<���s�\0&��#�@h��3�V}��H���*�w+]'D�&�@�ց])��;TGe3��\\��n����d\$:�uN4�ykt�-dR!7����e4(P!��-��9�4�_PMGb��ıw����6O�S�F���)��yh0+����qT|��+u���+��A�?��	�T�3.q��41T��e��\n:P����{T�\n��h?��T�A�S��*���+�u�>�\\�Z����Y췢wEJ��%��s�L��d��y�+\rC�ߡ'A�l,�y�3���͗`�	_*�P� ThKDV���~5	�0�+�,�-?�]���3�֍K�`�^���I42(]�w�.�r����]�\nYƨB����	��}ЋR ��g�}:H��J�WP��\"޵���V\\�<��? >�����ܬ݆�=��:�\n0��\\+�S���f�U���U,�WCֈ�On��΅��.�e9|R�I'�[�/������2���Q��Bn:�I�\n��g�9�\r�,�R6����Q\$X�+�>����`\n�)/_8Qi�����=��v?5v�\0 \n���LG�Dm�w\\�F֌�Ѣ���dꟵ}s�\"��Yv�|�J*�9h���@XEU�*�(oQ]\$�B��,�����KT�v�AptCɃ\n�C,/�<��ڙEW�-V�P��=W�*%K�-Q`9	(��59Ӏ�m)�X��@�2���T@��\nS���bd�Eδa�+�DX��|U�	�	��F� 2�%5\nj�m��W�+�x�K��V�3#��CT�ek���&�,�l�jbd7)ӓ\"\n+�P��b��I�@�3��ܵjU��Es��)D�f뒃������P�Z3AΌ�\nwTh𗲪ۘ�4Z��<�uߩ�dq�ˊu(���bKG����n�Tﮈ]z��f%#�3I�fS��&}�@D�@++��A�h���\n��U�ޥ|B�;��Um��U�E�N�!�x2�1�\0�GmvH~��H�T�)�W��YN�\"�k5��vT#=�ڥ�<\n}�#R3Y�H�R�Iͳܦ;��Rl�1l�uB%TQJ�*���'�E�0i�dw,�z�ͥ:\$��;�?���j��)��)ԏ�\$32J}�&�[�\$��́�;Dn��E״�+0�aZ{���C ���(��:����O@h��D��\0��`PTou����F�\rQv����o�ܡ\$S��+��#7��Izr�pk�DW��Fs�9��Q� ���1�g��#�\0\\L�\$��3�g�X�y�y �-3h����!�nX��]+��	ɝ�c\0�\0�b��\0\r���-{�\0�Q(�Q�\$s�0���m(�[Ru�V����>��+�J[�6����J\0֗�\\���,��K�3�.�]a_\0R�J Ɨ`�^ԶClR�IK��\n�\$�nŏ���Kj��\n����~/��mn�].�`��ij��#K��f:`\0�錀6�7K▨zc��\0����/K���/�d���FE\0aL���dZ`�J�S��ʙ�2��4�@/�(��L��0�`�ĩ��_�L��]4Zh�Щ�SD�M��4:c��SR��M�E4�i��SG�EMj��4zd�թ�SFKL��%4�e��%\$�lKM2��1�ڔ�i����MV��.�ڔ�i����Lz�/���ۣӄ��M�,`�_��imS��gMƜ�jg�����5�9.��9j_��S���.��9�_���S���.�7�r�)��%�[2�m8�uT��S��3M:�]3�q���nӱ�KN�1|^�kt�\"��H�gKj�-;zc�i�Ӛ����\r<�_�-i�Ӹ��\"֞U.���i�RڑkOF��=:\\��\$Zө�MLE�5�x����ӻ_\"֜=<\0�t��S�9OҞ�1�~��i�����O��>�~q�)�F����=6:~���J���P:��=��T�)�ƫ��PJ8�@�w�����*��O�5]>��t���T\n��!\"��6Y	)��H�/P���3�	���/��P~���	�Ӯ�!\"��C����j� �eNJ������*%�4�1Q��CZ�Q�jTB�Q.�\rE)\0004��\$�2�SM+�<j�t�j0�,�9Q��}F\0\$�s��Ta��KΣ]Ecj*�'K�M��MGx��R�T1�#QꡥG��5�:�z�L��4u6z��\"j\"T�KuN֣�G�g\$jFSܨ�Q2��H��\"�MT��%R��Hz��\$�,�w�Re.\$r�z�)��Ԧ�-Q���J���ʪ@԰�=R&/�Iʕ1�*]T���7���Q��D&өqN�_(�q�c[Tw�QR�崜J�\0n��T���.��956c�܌�Sz�H���7�R�}�Sr8�N���\"b�T��Q�5MN���#����ES§-H��7\"�T��_S�}G�̕?*yԩ��S�P*�5#���܍�T:�]Pʟ�C*�ԉ�T:�-K8�5C����R�--MȾ�H��� �'T���H���H���ы�T���R���,���܋GTک-SJ��M*�ԩ�UTکmMH��M���>�gSD�5M�R���H�wU\"��K8��R���ڌ�U*�-U*��n¾T�IR�,t�Z���Y�IUF�51���W)v�k�_KƫpJ�5Zj�ů�R�4r\n�^jI�CK����}Uʓ_��ԛ��O�=N�R*�F-��R��%W���c��\\�aV>�EYj��d���ëUά�WX�5*�Ջ��Uy��Z��1k�ը�7V��R\\H�5h*�U���UƧM[���k�vո�3V�}[(�5W�zո�iB�O��1��T���V�;�[��pR�Gu�;T@0>\0��/I���W`�]��\0���8��P��]��1m*��ǍyUz�mW��|�ݓ[��֯�]J�ш��U������Z*�5\\j����Z��`Z�5~��E�W��4Z��5h�Q�^�cXZ��S��1o�V��U&��T��5}cU^��X��dm*���kUu��SfG=[��j�sտ��X�Kc\n�iR�H�i#��uWt��������X�cĹ��U���rڢ�UZ�Շ�NE���X���4��ud�E�eV^��K��n��V8�sX¥�f��/�hJ�-J]ӂ������zO��<Eh�\$勓���\0K��<bw��>���N�\")]b�	�+z�.cS.�iF�	���QNQ���V*������O[X�nx��P	k��oN��}<aO�Iߓ�h���T;�r񉉤�VD6Q�;z�]j�~'�:�[Iv��7^ʑ����j�w[������ņ�:u �Ds#���\\w�<n|*�h�m�Kv;Y҈��3�]��^#�Z�j�gy�jħY,�%;3������.�W\"��\$�3>gڜ���Ϧ�V�T�Zj�hY�j�kD*!�h&Xz�i���+GV��\"��Z�:Ҥ�+�NoG�Zjj�i�]ʞkO�_�֬ԐmjI����t��#�[�j\rn�����n��Z�_,���g�Ě�:���9����[L2�W=T��0��f�\0P�U6\ns%7isY�?��u�3���nb5�����X|G~l�&�k���M��������y�S��)�]�ܭr��ٸ�������?�}u'n0W-ι��b��Ǫ���k?�vQ�7��}p\n�����ٮZ*�9)��5ޕZW�-ZB���:��㫊W�\0WZfp�Gp���ٮ:�Fp����U��SN/��\\��%s9�S{� �8��Z�as�ۓ�+�N^��9�M�{�P5�� �Q���J���y����;����z����Y�V �3�:�D�I���+����19M;�������V���\rQ{��ծ���+��F�CLĹ�N���Ԉ�\\��)\$i���N'\0���P����]X�^�s1�f�&�\"'<O���̡�L\0�\"�@���%�6��UA�1�i(z��݁�\r�Ղ��bZ��+IQO�3���\r=*ĉ��)�!����`��h��,ЫmGPC��A��ٲ�A��(ZŰ%�t�,h/���i��k���XEJ6�ID�Ȭ\"�\n�aU- ��\nv�y��_���ګ�k	a�B<�V�D�/P���a��)9L�(Z��8�vvù�k	�o�ZXk���|�&�.�東C�����`�1�]7&ę+�H�CBcX�B7xX�|1��0��a�6��ubpJLǅ�(���mbl�8I�*R��@tk0�����xX���;�� al]4s�t��Ū�0�c�'��l�`8M�8����D4w`p?@706g̈~K�\r�� �P���bh�\"&��\n�q�PD����\$�(�0QP<�����Q�!X��x��5���R�`w/2�2#���� `���1�/�܁\r���:²����B7�V7Z��gMY�H3� ��b�	Z��J���G�w�gl�^�-�R-!�l�7̲L��ư<1 �QC/ղh��)�W�6C	�*d��6]VK!m����05G\$�R��4��=Cw&[��YP��dɚ�')VK,�5e�\r���K+�1�X)b�e)��uF2A#E�&g~�e�y�fp5�lYl�Ԝ5�����\n�m}`�(�M �Pl9Y��f����]�Vl-4�é����>`��/��fPE�i�\0k�v�\0�fhS0�&�¦lͼ�#fu���5	i%�:Fd��9��؀G<�	{�}��s[7\0�Ξ3�ft:+.Ȕ�p�>�ձ�@!Pas6q,���1bǬŋ�ZK���-��ar`�?RxX�鑡�V���#Ĥ�z�; �D���H��1��6D`��Y�`�R�P֋>-�!\$�����~π���`>���h�0�1����&\0�h���I�wl�Z�\$�\\\r��8�~,�\n�o_��B2D����a1��ǩ�=�v<�kF�p`�`�kBF�6� ����h��T T֎�	�@?dr�剀J�H@1�G�dn��w���%��JG��0b�Tf]m(�k�qg\\�������ш3vk'�^d��AX��~�W�Vs�*�ʱ�d��M����@?���}�6\\��m9<��i�ݧ��Ԭh�^s}�-�[K�s�q�b��-��OORm8\$�yw��##��@❷\0��ؤ 5F7����X\n��|J�/-S�W!f�� 0�,w��D4١RU�T������ZX�=�`�W\$@�ԥ(�XG��Ҋ��a>�*�Y���\n��\n��!�[mj���0,mu�W@ FX������=��(���b��<!\n\"��83�'��(R��\n>��@�W�r!L�H�k�\r�E\nW��\r��'FH�\$�����m���=�ۥ{LY��&���_\0����#�䔀[�9\0�\"��@8�iK���0�l���p\ng��'qbF��y�c�l@9�(#JU�ݲ�{io���.{�ͳ4�V́�VnF�x���z� Q�ޞ\$kSa~ʨ0s@���%�y@��5H��N�ͦ�@�x�#	ܫ /\\��?<hڂ���I�T��:�3�\n%��");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0!�����M��*)�o��) q��e���#��L�\0;";break;case"cross.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;";break;case"up.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;";break;case"down.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;";break;case"arrow.gif":echo"GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;";break;}}exit;}if($_GET["script"]=="version"){$gd=file_open_lock(get_temp_dir()."/adminer.version");if($gd)file_write_unlock($gd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$dc,$lc,$vc,$n,$id,$od,$ba,$Pd,$y,$ca,$ke,$nf,$Yf,$Fh,$td,$mi,$si,$U,$Gi,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Lf=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Lf[]=true;call_user_func_array('session_set_cookie_params',$Lf);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Tc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($ri,$ef=null){if(is_array($ri)){$bg=($ef==1?0:1);$ri=$ri[$bg];}$ri=str_replace("%d","%s",$ri);$ef=format_number($ef);return
sprintf($ri,$ef);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$bg=array_search("SQL",$b->operators);if($bg!==false)unset($b->operators[$bg]);}function
dsn($ic,$V,$F,$vf=array()){try{parent::__construct($ic,$V,$F,$vf);}catch(Exception$_c){auth_error(h($_c->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$Ai=false){$H=parent::query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$dc=array();class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($Q,$L,$Z,$ld,$xf=array(),$_=1,$E=0,$jg=false){global$b,$y;$Wd=(count($ld)<count($L));$G=$b->selectQueryBuild($L,$Z,$ld,$xf,$_,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$_!=""&&$ld&&$Wd&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($ld&&$Wd?"\nGROUP BY ".implode(", ",$ld):"").($xf?"\nORDER BY ".implode(", ",$xf):""),($_!=""?+$_:null),($E?$_*$E:0),"\n");$Ah=microtime(true);$I=$this->_conn->query($G);if($jg)echo$b->selectQuery($G,$Ah,!$I);return$I;}function
delete($Q,$tg,$_=0){$G="FROM ".table($Q);return
queries("DELETE".($_?limit1($Q,$G,$tg):" $G$tg"));}function
update($Q,$O,$tg,$_=0,$M="\n"){$Si=array();foreach($O
as$z=>$X)$Si[]="$z = $X";$G=table($Q)." SET$M".implode(",$M",$Si);return
queries("UPDATE".($_?limit1($Q,$G,$tg,$M):" $G$tg"));}function
insert($Q,$O){return
queries("INSERT INTO ".table($Q).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$K,$hg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$di){}function
convertSearch($v,$X,$o){return$v;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($Vg){return
q($Vg);}function
warnings(){return'';}function
tableHelp($C){}}$dc["sqlite"]="SQLite 3";$dc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$eg=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Vi=$this->_link->version();$this->server_info=$Vi["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($G,$Ai=false){$Pe=($Ai?"unbufferedQuery":"query");$H=@$this->_link->$Pe($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$z=>$X)$I[($z[0]=='"'?idf_unescape($z):$z)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$Xf='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Xf\\.)?$Xf\$~",$C,$B)){$Q=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$hg){$Si=array();foreach($K
as$O)$Si[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Si));}function
tableHelp($C){if($C=="sqlite_sequence")return"fileformat2.html#seqtab";if($C=="sqlite_master")return"fileformat2.html#$C";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$_,$D=0,$M=" "){return" $G$Z".($_!==null?$M."LIMIT $_".($D?" OFFSET $D":""):"");}function
limit1($Q,$G,$Z,$M="\n"){global$g;return(preg_match('~^INTO~',$G)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$M):" $G WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$M."LIMIT 1)");}function
db_collation($l,$ob){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($C=""){global$g;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){$J["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($C!=""?$I[$C]:$I);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$g;$I=array();$hg="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$J){$C=$J["name"];$T=strtolower($J["type"]);$Rb=$J["dflt_value"];$I[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Rb,$B)?str_replace("''","'",$B[1]):($Rb=="NULL"?null:$Rb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($hg!="")$I[$hg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$I[$C]["auto_increment"]=true;$hg=$C;}}$wh=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$wh,$Be,PREG_SET_ORDER);foreach($Be
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($I[$C])$I[$C]["collation"]=trim($B[3],"'");}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$wh=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$wh,$B)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$Be,PREG_SET_ORDER);foreach($Be
as$B){$I[""]["columns"][]=idf_unescape($B[2]).$B[4];$I[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$I){foreach(fields($Q)as$C=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$zh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$h);foreach(get_rows("PRAGMA index_list(".table($Q).")",$h)as$J){$C=$J["name"];$w=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$h)as$Ug){$w["columns"][]=$Ug["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$zh[$C],$Eg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Eg[2],$Be);foreach($Be[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$I[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$I[""]["columns"]||$w["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$C))$I[$C]=$w;}return$I;}function
foreign_keys($Q){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$J){$r=&$I[$J["id"]];if(!$r)$r=$J;$r["source"][]=$J["from"];$r["target"][]=$J["to"];}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($C){global$g;$Jc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Jc)\$~",$C)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$Jc));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='File exists.';return
false;}if(!check_sqlite_name($l))return
false;try{$A=new
Min_SQLite($l);}catch(Exception$_c){$g->error=$_c->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($C,$d){global$g;if(!check_sqlite_name($C))return
false;$g->__construct(":memory:");$g->error='File exists.';return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){$Mi=($Q==""||$ad);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Mi=true;break;}}$c=array();$Ff=array();foreach($p
as$o){if($o[1]){$c[]=($Mi?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Ff[$o[0]]=$o[1][0];}}if(!$Mi){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$C&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($Q,$C,$c,$Ff,$ad))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($C));return
true;}function
recreate_table($Q,$C,$p,$Ff,$ad,$x=array()){if($Q!=""){if(!$p){foreach(fields($Q)as$z=>$o){if($x)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Ff[$z]=idf_escape($z);}}$ig=false;foreach($p
as$o){if($o[6])$ig=true;}$gc=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$gc[$X[1]]=true;unset($x[$z]);}}foreach(indexes($Q)as$ee=>$w){$f=array();foreach($w["columns"]as$z=>$e){if(!$Ff[$e])continue
2;$f[]=$Ff[$e].($w["descs"][$z]?" DESC":"");}if(!$gc[$ee]){if($w["type"]!="PRIMARY"||!$ig)$x[]=array($w["type"],$ee,$f);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$ad[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$ee=>$r){foreach($r["source"]as$z=>$e){if(!$Ff[$e])continue
2;$r["source"][$z]=idf_unescape($Ff[$e]);}if(!isset($ad[" $ee"]))$ad[]=" ".format_foreign_key($r);}queries("BEGIN");}foreach($p
as$z=>$o)$p[$z]="  ".implode($o);$p=array_merge($p,array_filter($ad));if(!queries("CREATE TABLE ".table($Q!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($Ff&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$Ff).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Ff)))." FROM ".table($Q)))return
false;$yi=array();foreach(triggers($Q)as$wi=>$ei){$vi=trigger($wi);$yi[]="CREATE TRIGGER ".idf_escape($wi)." ".implode(" ",$ei)." ON ".table($C)."\n$vi[Statement]";}if(!queries("DROP TABLE ".table($Q)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$x))return
false;foreach($yi
as$vi){if(!queries($vi))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$C,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$hg){if($hg[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Xi){return
apply_queries("DROP VIEW",$Xi);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Xi,$Vh){return
false;}function
trigger($C){global$g;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$xi=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$xi["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$gf=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($gf?" OF":""),"Of"=>($gf[0]=='`'||$gf[0]=='"'?idf_unescape($gf):$gf),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($Q){$I=array();$xi=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$xi["Timing"]).')\s*(.*)\s+ON\b~iU',$J["sql"],$B);$I[$J["name"]]=array($B[1],$B[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Yg){return
true;}function
create_sql($Q,$La,$Gh){global$g;$I=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$C=>$w){if($C=='')continue;$I.=";\n\n".index_sql($Q,$w['type'],$C,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$I;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$g;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$I[$z]=$g->result("PRAGMA $z");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$uf){list($z,$X)=explode("=",$uf,2);$I[$z]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Oc);}$y="sqlite";$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Fh=array_keys($U);$Gi=array();$sf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$id=array("hex","length","lower","round","unixepoch","upper");$od=array("avg","count","count distinct","group_concat","max","min","sum");$lc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$dc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$eg=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($wc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Vi=pg_version($this->_link);$this->server_info=$Vi["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Ai=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$e);$I->name=pg_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$e);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($N,$V,$F){global$b;$l=$b->database();$P="pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$P dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($Vg){return
q($Vg);}function
query($G,$Ai=false){$I=parent::query($G,$Ai);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$hg){global$g;foreach($K
as$O){$Hi=array();$Z=array();foreach($O
as$z=>$X){$Hi[]="$z = $X";if(isset($hg[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Hi)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}function
slowQuery($G,$di){$this->_conn->query("SET statement_timeout = ".(1000*$di));$this->_conn->timeout=1000*$di;return$G;}function
convertSearch($v,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$v:"CAST($v AS text)");}function
quoteBinary($Vg){return$this->_conn->quoteBinary($Vg);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($C){$ue=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$A=$ue[$_GET["ns"]];if($A)return"$A-".str_replace("_","-",$C).".html";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b,$U,$Fh;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Fh['Strings'][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$g)){$Fh['Strings'][]="jsonb";$U["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$_,$D=0,$M=" "){return" $G$Z".($_!==null?$M."LIMIT $_".($D?" OFFSET $D":""):"");}function
limit1($Q,$G,$Z,$M="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$M):" $G".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$M."LIMIT 1)"));}function
db_collation($l,$ob){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($C!=""?$I[$C]:$I);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$I=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Bd=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Bd AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$B);list(,$T,$re,$J["length"],$wa,$Fa)=$B;$J["length"].=$Fa;$db=$T.$wa;if(isset($Ca[$db])){$J["type"]=$Ca[$db];$J["full_type"]=$J["type"].$re.$Fa;}else{$J["type"]=$T;$J["full_type"]=$J["type"].$re.$wa.$Fa;}if($J['identity'])$J['default']='GENERATED BY DEFAULT AS IDENTITY';$J["null"]=!$J["attnotnull"];$J["auto_increment"]=$J['identity']||preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$B))$J["default"]=($B[1]=="NULL"?null:(($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$Oh=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Oh AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Oh AND ci.oid = i.indexrelid",$h)as$J){$Fg=$J["relname"];$I[$Fg]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$Fg]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Ld)$I[$Fg]["columns"][]=$f[$Ld];$I[$Fg]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Md)$I[$Fg]["descs"][]=($Md&1?'1':null);$I[$Fg]["lengths"]=array();}return$I;}function
foreign_keys($Q){global$nf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$B)){$J['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$Ae)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Ae[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Ae[4]));}$J['target']=array_map('trim',explode(',',$B[3]));$J['on_delete']=(preg_match("~ON DELETE ($nf)~",$B[4],$Ae)?$Ae[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($nf)~",$B[4],$Ae)?$Ae[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
view($C){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".$g->result("SELECT oid FROM pg_class WHERE relname = ".q($C)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$I=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$B))$I=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\1<b>\2</b>',$B[2]).$B[4];return
nl_br($I);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($C,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){$c=array();$sg=array();if($Q!=""&&$Q!=$C)$sg[]="ALTER TABLE ".table($Q)." RENAME TO ".table($C);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Ri=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$sg[]="ALTER TABLE ".table($C)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Ri!="")$sg[]="COMMENT ON COLUMN ".table($C).".$X[0] IS ".($Ri!=""?substr($Ri,9):"''");}}$c=array_merge($c,$ad);if($Q=="")array_unshift($sg,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($sg,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$tb!="")$sg[]="COMMENT ON TABLE ".table($C)." IS ".q($tb);if($La!=""){}foreach($sg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($Q,$c){$i=array();$ec=array();$sg=array();foreach($c
as$X){if($X[0]!="INDEX")$i[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$ec[]=idf_escape($X[1]);else$sg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($i)array_unshift($sg,"ALTER TABLE ".table($Q).implode(",",$i));if($ec)array_unshift($sg,"DROP INDEX ".implode(", ",$ec));foreach($sg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Xi){return
drop_tables($Xi);}function
drop_tables($S){foreach($S
as$Q){$Ch=table_status($Q);if(!queries("DROP ".strtoupper($Ch["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Xi,$Vh){foreach(array_merge($S,$Xi)as$Q){$Ch=table_status($Q);if(!queries("ALTER ".strtoupper($Ch["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($Vh)))return
false;}return
true;}function
trigger($C,$Q=null){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($Q===null)$Q=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($Q).' AND t.trigger_name = '.q($C));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($Q))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($C,$T){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($C));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($C).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($C,$J){$I=array();foreach($J["fields"]as$o)$I[]=$o["type"];return
idf_escape($C)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($R,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Eg))return$Eg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Xg){global$g,$U,$Fh;$I=$g->query("SET search_path TO ".idf_escape($Xg));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Fh['User types'][]=$T;}}return$I;}function
create_sql($Q,$La,$Gh){global$g;$I='';$Ng=array();$hh=array();$Ch=table_status($Q);$p=fields($Q);$x=indexes($Q);ksort($x);$Xc=foreign_keys($Q);ksort($Xc);if(!$Ch||empty($p))return
false;$I="CREATE TABLE ".idf_escape($Ch['nspname']).".".idf_escape($Ch['Name'])." (\n    ";foreach($p
as$Qc=>$o){$Of=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Ng[]=$Of;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Be)){$gh=$Be[1];$vh=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($gh):"SELECT * FROM $gh"));$hh[]=($Gh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $gh;\n":"")."CREATE SEQUENCE $gh INCREMENT $vh[increment_by] MINVALUE $vh[min_value] MAXVALUE $vh[max_value] START ".($La?$vh['last_value']:1)." CACHE $vh[cache_value];";}}if(!empty($hh))$I=implode("\n\n",$hh)."\n\n$I";foreach($x
as$Gd=>$w){switch($w['type']){case'UNIQUE':$Ng[]="CONSTRAINT ".idf_escape($Gd)." UNIQUE (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;case'PRIMARY':$Ng[]="CONSTRAINT ".idf_escape($Gd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;}}foreach($Xc
as$Wc=>$Vc)$Ng[]="CONSTRAINT ".idf_escape($Wc)." $Vc[definition] ".($Vc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$I.=implode(",\n    ",$Ng)."\n) WITH (oids = ".($Ch['Oid']?'true':'false').");";foreach($x
as$Gd=>$w){if($w['type']=='INDEX'){$f=array();foreach($w['columns']as$z=>$X)$f[]=idf_escape($X).($w['descs'][$z]?" DESC":"");$I.="\n\nCREATE INDEX ".idf_escape($Gd)." ON ".idf_escape($Ch['nspname']).".".idf_escape($Ch['Name'])." USING btree (".implode(', ',$f).");";}}if($Ch['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($Ch['nspname']).".".idf_escape($Ch['Name'])." IS ".q($Ch['Comment']).";";foreach($p
as$Qc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($Ch['nspname']).".".idf_escape($Ch['Name']).".".idf_escape($Qc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$Ch=table_status($Q);$I="";foreach(triggers($Q)as$ui=>$ti){$vi=trigger($ui,$Ch['Name']);$I.="\nCREATE TRIGGER ".idf_escape($vi['Trigger'])." $vi[Timing] $vi[Events] ON ".idf_escape($Ch["nspname"]).".".idf_escape($Ch['Name'])." $vi[Type] $vi[Statement];;\n";}return$I;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}$y="pgsql";$U=array();$Fh=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$U+=$X;$Fh[$z]=array_keys($X);}$Gi=array();$sf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$id=array("char_length","lower","round","to_hex","to_timestamp","upper");$od=array("avg","count","count distinct","max","min","sum");$lc=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$dc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$eg=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($wc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){$this->_link=@oci_new_connect($V,$F,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
true;}function
query($G,$Ai=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$z=>$X){if(is_a($X,'OCI-Lob'))$J[$z]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$e);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$F){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$_,$D=0,$M=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($_+$D).") WHERE rnum > $D":($_!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($_+$D):" $G$Z"));}function
limit1($Q,$G,$Z,$M="\n"){return" $G$Z";}function
db_collation($l,$ob){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();$Zg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $Zg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $Zg":"")."
ORDER BY 1")as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)." ORDER BY column_id")as$J){$T=$J["DATA_TYPE"];$re="$J[DATA_PRECISION],$J[DATA_SCALE]";if($re==",")$re=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$T.($re?"($re)":""),"type"=>strtolower($T),"length"=>$re,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($Q)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$J){$Gd=$J["INDEX_NAME"];$I[$Gd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Gd]["columns"][]=$J["COLUMN_NAME"];$I[$Gd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Gd]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
view($C){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($K);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){$c=$ec=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$ec[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$ec||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$ec).")"))&&($Q==$C||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)));}function
foreign_keys($Q){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xi){return
apply_queries("DROP VIEW",$Xi);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Yg){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Yg));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Oc);}$y="oracle";$U=array();$Fh=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$U+=$X;$Fh[$z]=array_keys($X);}$Gi=array();$sf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$id=array("length","lower","round","upper");$od=array("avg","count","count distinct","max","min","sum");$lc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$dc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$eg=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$F){global$b;$l=$b->database();$xb=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($l!="")$xb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$N),$xb);if($this->_link){$Nd=sqlsrv_server_info($this->_link);$this->server_info=$Nd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Ai=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$z=>$X){if(is_a($X,'DateTime'))$J[$z]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($D){for($t=0;$t<$D;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$F){$this->_link=@mssql_connect($N,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$Ai=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($N,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$K,$hg){foreach($K
as$O){$Hi=array();$Z=array();foreach($O
as$z=>$X){$Hi[]="$z = $X";if(isset($hg[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Hi)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$_,$D=0,$M=" "){return($_!==null?" TOP (".($_+$D).")":"")." $G$Z";}function
limit1($Q,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$I=array();foreach($k
as$l){$g->select_db($l);$I[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($C=""){$I=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$ub=get_key_vals("SELECT objname, cast(value as varchar) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$J){$T=$J["type"];$re=(preg_match("~char|binary~",$T)?$J["max_length"]:($T=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$T.($re?"($re)":""),"type"=>$T,"length"=>$re,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],"comment"=>$ub[$J["name"]],);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$h)as$J){$C=$J["name"];$I[$C]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$C]["lengths"]=array();$I[$C]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$C]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$I[preg_replace('~_.*~','',$d)][]=$d;return$I;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($C,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){$c=array();$ub=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$ub[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($ad[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$C)queries("EXEC sp_rename ".q(table($Q)).", ".q($C));if($ad)$c[""]=$ad;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $z".implode(",",$X)))return
false;}foreach($ub
as$z=>$X){$tb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($C).", @level2type = N'Column', @level2name = ".q($z));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$tb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($C).", @level2type = N'Column', @level2name = ".q($z));}return
true;}function
alter_indexes($Q,$c){$w=array();$ec=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$ec[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$ec||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$ec)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$I=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($R,$Z){}function
foreign_keys($Q){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$J){$r=&$I[$J["FK_NAME"]];$r["table"]=$J["PKTABLE_NAME"];$r["source"][]=$J["FKCOLUMN_NAME"];$r["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xi){return
queries("DROP VIEW ".implode(", ",array_map('table',$Xi)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Xi,$Vh){return
apply_queries("ALTER SCHEMA ".idf_escape($Vh)." TRANSFER",array_merge($S,$Xi));}function
trigger($C){if($C=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($Q){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Xg){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$Oc);}$y="mssql";$U=array();$Fh=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$U+=$X;$Fh[$z]=array_keys($X);}$Gi=array();$sf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$id=array("len","lower","round","upper");$od=array("avg","count","count distinct","max","min","sum");$lc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$dc['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$eg=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){$this->_link=ibase_connect($N,$V,$F);if($this->_link){$Ki=explode(':',$N);$this->service_link=ibase_service_attach($Ki[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return($j=="domain");}function
query($G,$Ai=false){$H=ibase_query($G,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases($Yc){return
array("domain");}function
limit($G,$Z,$_,$D=0,$M=" "){$I='';$I.=($_!==null?$M."FIRST $_".($D?" SKIP $D":""):"");$I.=" $G$Z";return$I;}function
limit1($Q,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){}function
engines(){return
array();}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
tables_list(){global$g;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($g->_link,$G);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($k){return
array();}function
table_status($C="",$Nc=false){global$g;$I=array();$Kb=tables_list();foreach($Kb
as$w=>$X){$w=trim($w);$I[$w]=array('Name'=>$w,'Engine'=>'standard',);if($C==$w)return$I[$w];}return$I;}function
is_view($R){return
false;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"]);}function
fields($Q){global$g;$I=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($Q).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($g->_link,$G);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($Q,$h=null){$I=array();return$I;}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Xg){return
true;}function
support($Oc){return
preg_match("~^(columns|sql|status|table)$~",$Oc);}$y="firebird";$sf=array("=");$id=array();$od=array();$lc=array();}$dc["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$eg=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($G,$Ai=false){$Lf=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$Lf['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$Lf,$this->timeout);$this->timeout=0;if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Jh=0;foreach($H
as$Zd)$Jh+=$Zd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Jh,))));}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$Zd){$J=array();if($Zd->Name!='')$J['itemName()']=(string)$Zd->Name;foreach($Zd->Attribute
as$Ia){$C=$this->_processValue($Ia->Name);$Y=$this->_processValue($Ia->Value);if(isset($J[$C])){$J[$C]=(array)$J[$C];$J[$C][]=$Y;}else$J[$C]=$Y;}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($oc){return(is_object($oc)&&$oc['encoding']=='base64'?base64_decode($oc):(string)$oc);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$fe=array_keys($this->_rows[0]);return(object)array('name'=>$fe[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$hg="itemName()";function
_chunkRequest($Cd,$va,$Lf,$Dc=array()){global$g;foreach(array_chunk($Cd,25)as$hb){$Mf=$Lf;foreach($hb
as$t=>$u){$Mf["Item.$t.ItemName"]=$u;foreach($Dc
as$z=>$X)$Mf["Item.$t.$z"]=$X;}if(!sdb_request($va,$Mf))return
false;}$g->affected_rows=count($Cd);return
true;}function
_extractIds($Q,$tg,$_){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$tg,$Be))$I=array_map('idf_unescape',$Be[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$tg.($_?" LIMIT 1":"")))as$Zd)$I[]=$Zd->Name;}return$I;}function
select($Q,$L,$Z,$ld,$xf=array(),$_=1,$E=0,$jg=false){global$g;$g->next=$_GET["next"];$I=parent::select($Q,$L,$Z,$ld,$xf,$_,$E,$jg);$g->next=0;return$I;}function
delete($Q,$tg,$_=0){return$this->_chunkRequest($this->_extractIds($Q,$tg,$_),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$O,$tg,$_=0,$M="\n"){$Tb=array();$Rd=array();$t=0;$Cd=$this->_extractIds($Q,$tg,$_);$u=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$z=>$X){$z=idf_unescape($z);if($X=="NULL"||($u!=""&&array($u)!=$Cd))$Tb["Attribute.".count($Tb).".Name"]=$z;if($X!="NULL"){foreach((array)$X
as$be=>$W){$Rd["Attribute.$t.Name"]=$z;$Rd["Attribute.$t.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$be)$Rd["Attribute.$t.Replace"]="true";$t++;}}}$Lf=array('DomainName'=>$Q);return(!$Rd||$this->_chunkRequest(($u!=""?array($u):$Cd),'BatchPutAttributes',$Lf,$Rd))&&(!$Tb||$this->_chunkRequest($Cd,'BatchDeleteAttributes',$Lf,$Tb));}function
insert($Q,$O){$Lf=array("DomainName"=>$Q);$t=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$Lf["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$Lf["Attribute.$t.Name"]=$C;$Lf["Attribute.$t.Value"]=(is_array($Y)?$X:idf_unescape($Y));$t++;}}}}return
sdb_request('PutAttributes',$Lf);}function
insertUpdate($Q,$K,$hg){foreach($K
as$O){if(!$this->update($Q,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($G,$di){$this->_conn->timeout=$di;return$G;}}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
support($Oc){return
preg_match('~sql~',$Oc);}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$ob){}function
tables_list(){global$g;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$Q)$I[(string)$Q]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(($C!=""?array($C=>true):tables_list())as$Q=>$T){$J=array("Name"=>$Q,"Auto_increment"=>"");if(!$Nc){$Oe=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($Oe){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$z=>$X)$J[$z]=(string)$Oe->$X;}}if($C!="")return$J;$I[$Q]=$J;}return$I;}function
explain($g,$G){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($Q){return
fields_from_edit();}function
foreign_keys($Q){return
array();}function
table($v){return
idf_escape($v);}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
limit($G,$Z,$_,$D=0,$M=" "){return" $G$Z".($_!==null?$M."LIMIT $_":"");}function
unconvert_field($o,$I){return$I;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($Ba,$Kb,$z,$xg=false){$Ua=64;if(strlen($z)>$Ua)$z=pack("H*",$Ba($z));$z=str_pad($z,$Ua,"\0");$ce=$z^str_repeat("\x36",$Ua);$de=$z^str_repeat("\x5C",$Ua);$I=$Ba($de.pack("H*",$Ba($ce.$Kb)));if($xg)$I=pack("H*",$I);return$I;}function
sdb_request($va,$Lf=array()){global$b,$g;list($zd,$Lf['AWSAccessKeyId'],$ah)=$b->credentials();$Lf['Action']=$va;$Lf['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$Lf['Version']='2009-04-15';$Lf['SignatureVersion']=2;$Lf['SignatureMethod']='HmacSHA1';ksort($Lf);$G='';foreach($Lf
as$z=>$X)$G.='&'.rawurlencode($z).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$zd)."\n/\n$G",$ah,true)));@ini_set('track_errors',1);$Sc=@file_get_contents((preg_match('~^https?://~',$zd)?$zd:"http://$zd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$Sc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$kj=simplexml_load_string($Sc);if(!$kj){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($kj->Errors){$n=$kj->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$Uh=$va."Result";return($kj->$Uh?$kj->$Uh:true);}function
sdb_request_all($va,$Uh,$Lf=array(),$di=0){$I=array();$Ah=($di?microtime(true):0);$_=(preg_match('~LIMIT\s+(\d+)\s*$~i',$Lf['SelectExpression'],$B)?$B[1]:0);do{$kj=sdb_request($va,$Lf);if(!$kj)break;foreach($kj->$Uh
as$oc)$I[]=$oc;if($_&&count($I)>=$_){$_GET["next"]=$kj->NextToken;break;}if($di&&microtime(true)-$Ah>$di)return
false;$Lf['NextToken']=$kj->NextToken;if($_)$Lf['SelectExpression']=preg_replace('~\d+\s*$~',$_-count($I),$Lf['SelectExpression']);}while($kj->NextToken);return$I;}$y="simpledb";$sf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$id=array();$od=array("count");$lc=array(array("json"));}$dc["mongo"]="MongoDB";if(isset($_GET["mongo"])){$eg=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Ii,$vf){return@new
MongoClient($Ii,$vf);}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$_c){$this->error=$_c->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Zd){$J=array();foreach($Zd
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$J[$z]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$fe=array_keys($this->_rows[0]);$C=$fe[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$hg="_id";function
select($Q,$L,$Z,$ld,$xf=array(),$_=1,$E=0,$jg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$sh=array();foreach($xf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Db);$sh[$X]=($Db?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$L)->sort($sh)->limit($_!=""?+$_:0)->skip($E*$_));}function
insert($Q,$O){try{$I=$this->_conn->_db->selectCollection($Q)->insert($O);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$O['_id'];return!$I['err'];}catch(Exception$_c){$this->_conn->error=$_c->getMessage();return
false;}}}function
get_databases($Yc){global$g;$I=array();$Pb=$g->_link->listDBs();foreach($Pb['databases']as$l)$I[]=$l['name'];return$I;}function
count_tables($k){global$g;$I=array();foreach($k
as$l)$I[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$I;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$Jg=$g->_link->selectDB($l)->drop();if(!$Jg['ok'])return
false;}return
true;}function
indexes($Q,$h=null){global$g;$I=array();foreach($g->_db->selectCollection($Q)->getIndexInfo()as$w){$Wb=array();foreach($w["key"]as$e=>$T)$Wb[]=($T==-1?'1':null);$I[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$sf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Ii,$vf){$jb='MongoDB\Driver\Manager';return
new$jb($Ii,$vf);}function
query($G){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Zd){$J=array();foreach($Zd
as$z=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$z]=63;$J[$z]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$z=>$X)$I[$z]=$J[$z];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$fe=array_keys($this->_rows[0]);$C=$fe[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$hg="_id";function
select($Q,$L,$Z,$ld,$xf=array(),$_=1,$E=0,$jg=false){global$g;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$sh=array();foreach($xf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Db);$sh[$X]=($Db?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$_=$_GET['limit'];$_=min(200,max(1,(int)$_));$ph=$E*$_;$jb='MongoDB\Driver\Query';$G=new$jb($Z,array('projection'=>$L,'limit'=>$_,'skip'=>$ph,'sort'=>$sh));$Mg=$g->_link->executeQuery("$g->_db_name.$Q",$G);return
new
Min_Result($Mg);}function
update($Q,$O,$tg,$_=0,$M="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($tg);$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());if(isset($O['_id']))unset($O['_id']);$Gg=array();foreach($O
as$z=>$Y){if($Y=='NULL'){$Gg[$z]=1;unset($O[$z]);}}$Hi=array('$set'=>$O);if(count($Gg))$Hi['$unset']=$Gg;$Ya->update($Z,$Hi,array('upsert'=>false));$Mg=$g->_link->executeBulkWrite("$l.$Q",$Ya);$g->affected_rows=$Mg->getModifiedCount();return
true;}function
delete($Q,$tg,$_=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($tg);$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());$Ya->delete($Z,array('limit'=>$_));$Mg=$g->_link->executeBulkWrite("$l.$Q",$Ya);$g->affected_rows=$Mg->getDeletedCount();return
true;}function
insert($Q,$O){global$g;$l=$g->_db_name;$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());if(isset($O['_id'])&&empty($O['_id']))unset($O['_id']);$Ya->insert($O);$Mg=$g->_link->executeBulkWrite("$l.$Q",$Ya);$g->affected_rows=$Mg->getInsertedCount();return
true;}}function
get_databases($Yc){global$g;$I=array();$jb='MongoDB\Driver\Command';$rb=new$jb(array('listDatabases'=>1));$Mg=$g->_link->executeCommand('admin',$rb);foreach($Mg
as$Pb){foreach($Pb->databases
as$l)$I[]=$l->name;}return$I;}function
count_tables($k){$I=array();return$I;}function
tables_list(){global$g;$jb='MongoDB\Driver\Command';$rb=new$jb(array('listCollections'=>1));$Mg=$g->_link->executeCommand($g->_db_name,$rb);$pb=array();foreach($Mg
as$H)$pb[$H->name]='table';return$pb;}function
drop_databases($k){return
false;}function
indexes($Q,$h=null){global$g;$I=array();$jb='MongoDB\Driver\Command';$rb=new$jb(array('listIndexes'=>$Q));$Mg=$g->_link->executeCommand($g->_db_name,$rb);foreach($Mg
as$w){$Wb=array();$f=array();foreach(get_object_vars($w->key)as$e=>$T){$Wb[]=($T==-1?'1':null);$f[]=$e;}$I[$w->name]=array("type"=>($w->name=="_id_"?"PRIMARY":(isset($w->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($Q){$p=fields_from_edit();if(!count($p)){global$m;$H=$m->select($Q,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$z=>$X){$J[$z]=null;$p[$z]=array("field"=>$z,"type"=>"string","null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($R,$Z){global$g;$Z=where_to_query($Z);$jb='MongoDB\Driver\Command';$rb=new$jb(array('count'=>$R['Name'],'query'=>$Z));$Mg=$g->_link->executeCommand($g->_db_name,$rb);$li=$Mg->toArray();return$li[0]->n;}function
sql_query_where_parser($tg){$tg=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$tg));$tg=preg_replace('/\)\)\)$/',')',$tg);$hj=explode(' AND ',$tg);$ij=explode(') OR (',$tg);$Z=array();foreach($hj
as$fj)$Z[]=trim($fj);if(count($ij)==1)$ij=array();elseif(count($ij)>1)$Z=array();return
where_to_query($Z,$ij);}function
where_to_query($dj=array(),$ej=array()){global$b;$Kb=array();foreach(array('and'=>$dj,'or'=>$ej)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Gc){list($mb,$qf,$X)=explode(" ",$Gc,3);if($mb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$jb='MongoDB\BSON\ObjectID';$X=new$jb($X);}if(!in_array($qf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$qf,$B)){$X=(float)$X;$qf=$B[1];}elseif(preg_match('~^\(date\)(.+)~',$qf,$B)){$Mb=new
DateTime($X);$jb='MongoDB\BSON\UTCDatetime';$X=new$jb($Mb->getTimestamp()*1000);$qf=$B[1];}switch($qf){case'=':$qf='$eq';break;case'!=':$qf='$ne';break;case'>':$qf='$gt';break;case'<':$qf='$lt';break;case'>=':$qf='$gte';break;case'<=':$qf='$lte';break;case'regex':$qf='$regex';break;default:continue
2;}if($T=='and')$Kb['$and'][]=array($mb=>array($qf=>$X));elseif($T=='or')$Kb['$or'][]=array($mb=>array($qf=>$X));}}}return$Kb;}$sf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($v){return$v;}function
idf_escape($v){return$v;}function
table_status($C="",$Nc=false){$I=array();foreach(tables_list()as$Q=>$T){$I[$Q]=array("Name"=>$Q);if($C==$Q)return$I[$Q];}return$I;}function
create_database($l,$d){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
connect(){global$b;$g=new
Min_DB;list($N,$V,$F)=$b->credentials();$vf=array();if($V.$F!=""){$vf["username"]=$V;$vf["password"]=$F;}$l=$b->database();if($l!="")$vf["db"]=$l;try{$g->_link=$g->connect("mongodb://$N",$vf);if($F!=""){$vf["password"]="";try{$g->connect("mongodb://$N",$vf);return'Database does not support password.';}catch(Exception$_c){}}return$g;}catch(Exception$_c){return$_c->getMessage();}}function
alter_indexes($Q,$c){global$g;foreach($c
as$X){list($T,$C,$O)=$X;if($O=="DROP")$I=$g->_db->command(array("deleteIndexes"=>$Q,"index"=>$C));else{$f=array();foreach($O
as$e){$e=preg_replace('~ DESC$~','',$e,1,$Db);$f[$e]=($Db?-1:1);}$I=$g->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$C,));}if($I['errmsg']){$g->error=$I['errmsg'];return
false;}}return
true;}function
support($Oc){return
preg_match("~database|indexes|descidx~",$Oc);}function
db_collation($l,$ob){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){global$g;if($Q==""){$g->_db->createCollection($C);return
true;}}function
drop_tables($S){global$g;foreach($S
as$Q){$Jg=$g->_db->selectCollection($Q)->drop();if(!$Jg['ok'])return
false;}return
true;}function
truncate_tables($S){global$g;foreach($S
as$Q){$Jg=$g->_db->selectCollection($Q)->remove();if(!$Jg['ok'])return
false;}return
true;}$y="mongo";$id=array();$od=array();$lc=array(array("json"));}$dc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$eg=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Vf,$zb=array(),$Pe='GET'){@ini_set('track_errors',1);$Sc=@file_get_contents("$this->_url/".ltrim($Vf,'/'),false,stream_context_create(array('http'=>array('method'=>$Pe,'content'=>$zb===null?$zb:json_encode($zb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Sc){$this->error=$php_errormsg;return$Sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Sc;return
false;}$I=json_decode($Sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$yb=get_defined_constants(true);foreach($yb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$I;}function
query($Vf,$zb=array(),$Pe='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Vf,'/'),$zb,$Pe);}function
connect($N,$V,$F){preg_match('~^(https?://)?(.*)~',$N,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$F@$B[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($K);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$L,$Z,$ld,$xf=array(),$_=1,$E=0,$jg=false){global$b;$Kb=array();$G="$Q/_search";if($L!=array("*"))$Kb["fields"]=$L;if($xf){$sh=array();foreach($xf
as$mb){$mb=preg_replace('~ DESC$~','',$mb,1,$Db);$sh[]=($Db?array($mb=>"desc"):$mb);}$Kb["sort"]=$sh;}if($_){$Kb["size"]=+$_;if($E)$Kb["from"]=($E*$_);}foreach($Z
as$X){list($mb,$qf,$X)=explode(" ",$X,3);if($mb=="_id")$Kb["query"]["ids"]["values"][]=$X;elseif($mb.$X!=""){$Yh=array("term"=>array(($mb!=""?$mb:"_all")=>$X));if($qf=="=")$Kb["query"]["filtered"]["filter"]["and"][]=$Yh;else$Kb["query"]["filtered"]["query"]["bool"]["must"][]=$Yh;}}if($Kb["query"]&&!$Kb["query"]["filtered"]["query"]&&!$Kb["query"]["ids"])$Kb["query"]["filtered"]["query"]=array("match_all"=>array());$Ah=microtime(true);$Zg=$this->_conn->query($G,$Kb);if($jg)echo$b->selectQuery("$G: ".json_encode($Kb),$Ah,!$Zg);if(!$Zg)return
false;$I=array();foreach($Zg['hits']['hits']as$yd){$J=array();if($L==array("*"))$J["_id"]=$yd["_id"];$p=$yd['_source'];if($L!=array("*")){$p=array();foreach($L
as$z)$p[$z]=$yd['fields'][$z];}foreach($p
as$z=>$X){if($Kb["fields"])$X=$X[0];$J[$z]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($T,$yg,$tg,$_=0,$M="\n"){$Tf=preg_split('~ *= *~',$tg);if(count($Tf)==2){$u=trim($Tf[1]);$G="$T/$u";return$this->_conn->query($G,$yg,'POST');}return
false;}function
insert($T,$yg){$u="";$G="$T/$u";$Jg=$this->_conn->query($G,$yg,'POST');$this->_conn->last_id=$Jg['_id'];return$Jg['created'];}function
delete($T,$tg,$_=0){$Cd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Cd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$cb){$Tf=preg_split('~ *= *~',$cb);if(count($Tf)==2)$Cd[]=trim($Tf[1]);}}$this->_conn->affected_rows=0;foreach($Cd
as$u){$G="{$T}/{$u}";$Jg=$this->_conn->query($G,'{}','DELETE');if(is_array($Jg)&&$Jg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($N,$V,$F)=$b->credentials();if($F!=""&&$g->connect($N,$V,""))return'Database does not support password.';if($g->connect($N,$V,$F))return$g;return$g->error;}function
support($Oc){return
preg_match("~database|table|columns~",$Oc);}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
get_databases(){global$g;$I=$g->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($l,$ob){}function
engines(){return
array();}function
count_tables($k){global$g;$I=array();$H=$g->query('_stats');if($H&&$H['indices']){$Kd=$H['indices'];foreach($Kd
as$Jd=>$Bh){$Id=$Bh['total']['indexing'];$I[$Jd]=$Id['index_total'];}}return$I;}function
tables_list(){global$g;$I=$g->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$g->_db]["mappings"]),'table');return$I;}function
table_status($C="",$Nc=false){global$g;$Zg=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($Zg){$S=$Zg["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$I[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($C!=""&&$C==$Q["key"])return$I[$C];}}return$I;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$g;$H=$g->query("$Q/_mapping");$I=array();if($H){$ye=$H[$Q]['properties'];if(!$ye)$ye=$H[$g->_db]['mappings'][$Q]['properties'];if($ye){foreach($ye
as$C=>$o){$I[$C]=array("field"=>$C,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$C]["privileges"]["insert"]);unset($I[$C]["privileges"]["update"]);}}}}return$I;}function
foreign_keys($Q){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){global$g;$pg=array();foreach($p
as$Lc){$Qc=trim($Lc[1][0]);$Rc=trim($Lc[1][1]?$Lc[1][1]:"text");$pg[$Qc]=array('type'=>$Rc);}if(!empty($pg))$pg=array('properties'=>$pg);return$g->query("_mapping/{$C}",$pg,'PUT');}function
drop_tables($S){global$g;$I=true;foreach($S
as$Q)$I=$I&&$g->query(urlencode($Q),array(),'DELETE');return$I;}function
last_id(){global$g;return$g->last_id;}$y="elastic";$sf=array("=","query");$id=array();$od=array();$lc=array(array("json"));$U=array();$Fh=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$z=>$X){$U+=$X;$Fh[$z]=array_keys($X);}}$dc["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($l,$G){@ini_set('track_errors',1);$Sc=@file_get_contents("$this->_url/?database=$l",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($G)?"$G FORMAT JSONCompact":$G,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($Sc===false){$this->error=$php_errormsg;return$Sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Sc;return
false;}$I=json_decode($Sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$yb=get_defined_constants(true);foreach($yb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return
new
Min_Result($I);}function
isQuerySelectLike($G){return(bool)preg_match('~^(select|show)~i',$G);}function
query($G){return$this->rootQuery($this->_db,$G);}function
connect($N,$V,$F){preg_match('~^(https?://)?(.*)~',$N,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$F@$B[2]";$I=$this->query('SELECT 1');return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return"'".addcslashes($P,"\\'")."'";}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);return$H['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($H){$this->num_rows=$H['rows'];$this->_rows=$H['data'];$this->meta=$H['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J===false?false:array_combine($this->columns,$J);}function
fetch_row(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if($e<count($this->columns)){$I->name=$this->meta[$e]['name'];$I->orgname=$I->name;$I->type=$this->meta[$e]['type'];}return$I;}}class
Min_Driver
extends
Min_SQL{function
delete($Q,$tg,$_=0){return
queries("ALTER TABLE ".table($Q)." DELETE $tg");}function
update($Q,$O,$tg,$_=0,$M="\n"){$Si=array();foreach($O
as$z=>$X)$Si[]="$z = $X";$G=$M.implode(",$M",$Si);return
queries("ALTER TABLE ".table($Q)." UPDATE $G$tg");}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
explain($g,$G){return'';}function
found_rows($R,$Z){$K=get_vals("SELECT COUNT(*) FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($K)?false:$K[0];}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){foreach($p
as$o){if($o[1][2]===" NULL")$o[1][1]=" Nullable({$o[1][1]})";unset($o[1][2]);}}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xi){return
drop_tables($Xi);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases($Yc){global$g;$H=get_rows('SHOW DATABASES');$I=array();foreach($H
as$J)$I[]=$J['name'];sort($I);return$I;}function
limit($G,$Z,$_,$D=0,$M=" "){return" $G$Z".($_!==null?$M."LIMIT $_".($D?", $D":""):"");}function
limit1($Q,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
tables_list(){$H=get_rows('SHOW TABLES');$I=array();foreach($H
as$J)$I[$J['name']]='table';ksort($I);return$I;}function
count_tables($k){return
array();}function
table_status($C="",$Nc=false){global$g;$I=array();$S=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($g->_db));foreach($S
as$Q){$I[$Q['name']]=array('Name'=>$Q['name'],'Engine'=>$Q['engine'],);if($C===$Q['name'])return$I[$Q['name']];}return$I;}function
is_view($R){return
false;}function
fk_support($R){return
false;}function
convert_field($o){}function
unconvert_field($o,$I){if(in_array($o['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$o[type]($I)";return$I;}function
fields($Q){$I=array();$H=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($Q));foreach($H
as$J){$T=trim($J['type']);$cf=strpos($T,'Nullable(')===0;$I[trim($J['name'])]=array("field"=>trim($J['name']),"full_type"=>$T,"type"=>$T,"default"=>trim($J['default_expression']),"null"=>$cf,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$I;}function
indexes($Q,$h=null){return
array();}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Xg){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($Oc){return
preg_match("~^(columns|sql|status|table)$~",$Oc);}$y="clickhouse";$U=array();$Fh=array();foreach(array('Numbers'=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),'Date and time'=>array("Date"=>13,"DateTime"=>20),'Strings'=>array("String"=>0),'Binary'=>array("FixedString"=>0),)as$z=>$X){$U+=$X;$Fh[$z]=array_keys($X);}$Gi=array();$sf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$id=array();$od=array("avg","count","count distinct","max","min","sum");$lc=array();}$dc=array("server"=>"MySQL")+$dc;if(!defined("DRIVER")){$eg=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$F="",$j=null,$ag=null,$rh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($zd,$ag)=explode(":",$N,2);$_h=$b->connectSsl();if($_h)$this->ssl_set($_h['key'],$_h['cert'],$_h['ca'],'','');$I=@$this->real_connect(($N!=""?$zd:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($ag)?$ag:ini_get("mysqli.default_port")),(!is_numeric($ag)?$ag:$rh),($_h?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($bb){if(parent::set_charset($bb))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $bb");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($bb){if(function_exists('mysql_set_charset')){if(mysql_set_charset($bb,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $bb");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$Ai=false){$H=@($Ai?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$F){global$b;$vf=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$_h=$b->connectSsl();if($_h){if(!empty($_h['key']))$vf[PDO::MYSQL_ATTR_SSL_KEY]=$_h['key'];if(!empty($_h['cert']))$vf[PDO::MYSQL_ATTR_SSL_CERT]=$_h['cert'];if(!empty($_h['ca']))$vf[PDO::MYSQL_ATTR_SSL_CA]=$_h['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$F,$vf);return
true;}function
set_charset($bb){$this->query("SET NAMES $bb");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Ai=false){$this->setAttribute(1000,!$Ai);return
parent::query($G,$Ai);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$O){return($O?parent::insert($Q,$O):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$K,$hg){$f=array_keys(reset($K));$fg="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Si=array();foreach($f
as$z)$Si[$z]="$z = VALUES($z)";$Ih="\nON DUPLICATE KEY UPDATE ".implode(", ",$Si);$Si=array();$re=0;foreach($K
as$O){$Y="(".implode(", ",$O).")";if($Si&&(strlen($fg)+$re+strlen($Y)+strlen($Ih)>1e6)){if(!queries($fg.implode(",\n",$Si).$Ih))return
false;$Si=array();$re=0;}$Si[]=$Y;$re+=strlen($Y)+2;}return
queries($fg.implode(",\n",$Si).$Ih);}function
slowQuery($G,$di){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$di FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$B))return"$B[1] /*+ MAX_EXECUTION_TIME(".($di*1000).") */ $B[2]";}}function
convertSearch($v,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($v USING ".charset($this->_conn).")":$v);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($C){$ze=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($ze?"information-schema-$C-table/":str_replace("_","-",$C)."-table.html"));if(DB=="mysql")return($ze?"mysql$C-table/":"system-database.html");}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b,$U,$Fh;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Fh['Strings'][]="json";$U["json"]=4294967295;}return$g;}$I=$g->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($Vg=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$Vg;return$I;}function
get_databases($Yc){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($Yc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$_,$D=0,$M=" "){return" $G$Z".($_!==null?$M."LIMIT $_".($D?" OFFSET $D":""):"");}function
limit1($Q,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){global$g;$I=null;$i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$i,$B))$I=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$i,$B))$I=$ob[$B[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$I=array();foreach($k
as$l)$I[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(get_rows($Nc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$B);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$B[1])?$J["Default"]:null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$B)?$B[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),);}return$I;}function
indexes($Q,$h=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$h)as$J){$C=$J["Key_name"];$I[$C]["type"]=($C=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$C]["columns"][]=$J["Column_name"];$I[$C]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$C]["descs"][]=null;}return$I;}function
foreign_keys($Q){$I=array();foreach(get_rows("SELECT * FROM information_schema.REFERENTIAL_CONSTRAINTS WHERE CONSTRAINT_SCHEMA = DATABASE() AND TABLE_NAME = ".q($Q))as$J){$f=get_key_vals("SELECT COLUMN_NAME, REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE CONSTRAINT_SCHEMA = DATABASE() AND CONSTRAINT_NAME = ".q($J["CONSTRAINT_NAME"])." ORDER BY ORDINAL_POSITION");$l=$J["UNIQUE_CONSTRAINT_SCHEMA"];$I[$J["CONSTRAINT_NAME"]]=array("db"=>($l==DB?"":$l),"table"=>$J["REFERENCED_TABLE_NAME"],"source"=>array_keys($f),"target"=>array_values($f),"on_delete"=>$J["DELETE_RULE"],"on_update"=>$J["UPDATE_RULE"],);}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$z=>$X)asort($I[$z]);return$I;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$I=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($C,$d){$I=false;if(create_database($C,$d)){$Hg=array();foreach(tables_list()as$Q=>$T)$Hg[]=table($Q)." TO ".idf_escape($C).".".table($Q);$I=(!$Hg||queries("RENAME TABLE ".implode(", ",$Hg)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$Ma="";break;}if($w["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($Q,$C,$p,$ad,$tb,$tc,$d,$La,$Rf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$ad);$Ch=($tb!==null?" COMMENT=".q($tb):"").($tc?" ENGINE=".q($tc):"").($d?" COLLATE ".q($d):"").($La!=""?" AUTO_INCREMENT=$La":"");if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$Ch$Rf");if($Q!=$C)$c[]="RENAME TO ".table($C);if($Ch)$c[]=ltrim($Ch);return($c||$Rf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Rf):true);}function
alter_indexes($Q,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Xi){return
queries("DROP VIEW ".implode(", ",array_map('table',$Xi)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Xi,$Vh){$Hg=array();foreach(array_merge($S,$Xi)as$Q)$Hg[]=table($Q)." TO ".idf_escape($Vh).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$Hg));}function
copy_tables($S,$Xi,$Vh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$C=($Vh==DB?table("copy_$Q"):idf_escape($Vh).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $C"))||!queries("CREATE TABLE $C LIKE ".table($Q))||!queries("INSERT INTO $C SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J){$vi=$J["Trigger"];if(!queries("CREATE TRIGGER ".($Vh==DB?idf_escape("copy_$vi"):idf_escape($Vh).".".idf_escape($vi))." $J[Timing] $J[Event] ON $C FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($Xi
as$Q){$C=($Vh==DB?table("copy_$Q"):idf_escape($Vh).".".table($Q));$Wi=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $C"))||!queries("CREATE VIEW $C AS $Wi[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($K);}function
triggers($Q){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$T){global$g,$vc,$Pd,$U;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$uh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$_i="((".implode("|",array_merge(array_keys($U),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$vc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Xf="$uh*(".($T=="FUNCTION"?"":$Pd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$_i";$i=$g->result("SHOW CREATE $T ".idf_escape($C),2);preg_match("~\\(((?:$Xf\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$_i\\s+":"")."(.*)~is",$i,$B);$p=array();preg_match_all("~$Xf\\s*,?~is",$B[1],$Be,PREG_SET_ORDER);foreach($Be
as$Kf){$C=str_replace("``","`",$Kf[2]).$Kf[3];$p[]=array("field"=>$C,"type"=>strtolower($Kf[5]),"length"=>preg_replace_callback("~$vc~s",'normalize_enum',$Kf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Kf[8] $Kf[7]"))),"null"=>1,"full_type"=>$Kf[4],"inout"=>strtoupper($Kf[1]),"collation"=>strtolower($Kf[9]),);}if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($C,$J){return
idf_escape($C);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Xg){return
true;}function
create_sql($Q,$La,$Gh){global$g;$I=$g->result("SHOW CREATE TABLE ".table($Q),1);if(!$La)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I, SRID($o[field]))";return$I;}function
support($Oc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}$y="sql";$U=array();$Fh=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$U+=$X;$Fh[$z]=array_keys($X);}$Gi=array("unsigned","zerofill","unsigned zerofill");$sf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$id=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$od=array("avg","count","count distinct","group_concat","max","min","sum");$lc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.7.2";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($i=false){return
password_file($i);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($N){return
h($N);}function
database(){return
DB;}function
databases($Yc=true){return
get_databases($Yc);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$q="adminer.css";if(file_exists($q))$I[]="$q?v=".crc32(file_get_contents($q));return$I;}function
loginForm(){global$dc;echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('driver','<tr><th>'.'System'.'<td>',html_select("auth[driver]",$dc,DRIVER,"loginDriver(this);")."\n"),$this->loginFormField('server','<tr><th>'.'Server'.'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),$this->loginFormField('db','<tr><th>'.'Database'.'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($C,$vd,$Y){return$vd.$Y;}function
login($we,$F){if($F=="")return
sprintf('Adminer does not support accessing a database without a password, <a href="https://www.adminer.org/en/password/"%s>more information</a>.',target_blank());return
true;}function
tableName($Mh){return
h($Mh["Name"]);}function
fieldName($o,$xf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Mh,$O=""){global$y,$m;echo'<p class="links">';$ue=array("select"=>'Select data');if(support("table")||support("indexes"))$ue["table"]='Show structure';if(support("table")){if(is_view($Mh))$ue["view"]='Alter view';else$ue["create"]='Alter table';}if($O!==null)$ue["edit"]='New item';$C=$Mh["Name"];foreach($ue
as$z=>$X)echo" <a href='".h(ME)."$z=".urlencode($C).($z=="edit"?$O:"")."'".bold(isset($_GET[$z])).">$X</a>";echo
doc_link(array($y=>$m->tableHelp($C)),"?"),"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Lh){return
array();}function
backwardKeysPrint($Oa,$J){}function
selectQuery($G,$Ah,$Mc=false){global$y,$m;$I="</p>\n";if(!$Mc&&($aj=$m->warnings())){$u="warnings";$I=", <a href='#$u'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$u');","")."$I<div id='$u' class='hidden'>\n$aj</div>\n";}return"<p><code class='jush-$y'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($Ah).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".'Edit'."</a>":"").$I;}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($K,$bd){return$K;}function
selectLink($X,$o){}function
selectVal($X,$A,$o,$Ef){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".lang(array('%d byte','%d bytes'),strlen($Ef))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($A?"<a href='".h($A)."'".(is_url($A)?target_blank():"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($o["default"])?" <span title='".'Default value'."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".h($o["comment"]):""),"\n";}echo"</table>\n","</div>\n";}function
tableIndexesPrint($x){echo"<table cellspacing='0'>\n";foreach($x
as$C=>$w){ksort($w["columns"]);$jg=array();foreach($w["columns"]as$z=>$X)$jg[]="<i>".h($X)."</i>".($w["lengths"][$z]?"(".$w["lengths"][$z].")":"").($w["descs"][$z]?" DESC":"");echo"<tr title='".h($C)."'><th>$w[type]<td>".implode(", ",$jg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$f){global$id,$od;print_fieldset("select",'Select',$L);$t=0;$L[""]=array();foreach($L
as$z=>$X){$X=$_GET["columns"][$z];$e=select_input(" name='columns[$t][col]'",$f,$X["col"],($z!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($id||$od?"<select name='columns[$t][fun]'>".optionlist(array(-1=>"")+array_filter(array('Functions'=>$id,'Aggregation'=>$od)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($z!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($e)":$e)."</div>\n";$t++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$x){print_fieldset("search",'Search',$Z);foreach($x
as$t=>$w){if($w["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$w["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$t]' value='".h($_GET["fulltext"][$t])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$t]",1,isset($_GET["boolean"][$t]),"BOOL"),"</div>\n";}}$ab="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$t=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$t][col]'",$f,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".'anywhere'.")"),html_select("where[$t][op]",$this->operators,$X["op"],$ab),"<input type='search' name='where[$t][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $ab }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($xf,$f,$x){print_fieldset("sort",'Sort',$xf);$t=0;foreach((array)$_GET["order"]as$z=>$X){if($X!=""){echo"<div>".select_input(" name='order[$t]'",$f,$X,"selectFieldChange"),checkbox("desc[$t]",1,isset($_GET["desc"][$z]),'descending')."</div>\n";$t++;}}echo"<div>".select_input(" name='order[$t]'",$f,"","selectAddRow"),checkbox("desc[$t]",1,false,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($_)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($bi){if($bi!==null){echo"<fieldset><legend>".'Text length'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($bi)."'>","</div></fieldset>\n";}}function
selectActionPrint($x){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>"," <span id='noindex' title='".'Full table scan'."'></span>","<script".nonce().">\n","var indexColumns = ";$f=array();foreach($x
as$w){$Jb=reset($w["columns"]);if($w["type"]!="FULLTEXT"&&$Jb)$f[$Jb]=1;}$f[""]=1;foreach($f
as$z=>$X)json_row($z);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($qc,$f){}function
selectColumnsProcess($f,$x){global$id,$od;$L=array();$ld=array();foreach((array)$_GET["columns"]as$z=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$id)||in_array($X["fun"],$od)))){$L[$z]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$od))$ld[]=$L[$z];}}return
array($L,$ld);}function
selectSearchProcess($p,$x){global$g,$m;$I=array();foreach($x
as$t=>$w){if($w["type"]=="FULLTEXT"&&$_GET["fulltext"][$t]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$w["columns"])).") AGAINST (".q($_GET["fulltext"][$t]).(isset($_GET["boolean"][$t])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$z=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$fg="";$vb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Fd=process_length($X["val"]);$vb.=" ".($Fd!=""?$Fd:"(NULL)");}elseif($X["op"]=="SQL")$vb=" $X[val]";elseif($X["op"]=="LIKE %%")$vb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$vb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$fg="$X[op](".q($X["val"]).", ";$vb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$vb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$fg.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$vb;else{$qb=array();foreach($p
as$C=>$o){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"])))$qb[]=$fg.$m->convertSearch(idf_escape($C),$X,$o).$vb;}$I[]=($qb?"(".implode(" OR ",$qb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($p,$x){$I=array();foreach((array)$_GET["order"]as$z=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$z])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$bd){return
false;}function
selectQueryBuild($L,$Z,$ld,$xf,$_,$E){return"";}function
messageQuery($G,$ci,$Mc=false){global$y,$m;restart_session();$wd=&get_session("queries");if(!$wd[$_GET["db"]])$wd[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n…";$wd[$_GET["db"]][]=array($G,time(),$ci);$yh="sql-".count($wd[$_GET["db"]]);$I="<a href='#$yh' class='toggle'>".'SQL command'."</a>\n";if(!$Mc&&($aj=$m->warnings())){$u="warnings-".count($wd[$_GET["db"]]);$I="<a href='#$u' class='toggle'>".'Warnings'."</a>, $I<div id='$u' class='hidden'>\n$aj</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$yh' class='hidden'><pre><code class='jush-$y'>".shorten_utf8($G,1000)."</code></pre>".($ci?" <span class='time'>($ci)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($wd[$_GET["db"]])-1)).'">'.'Edit'.'</a>':'').'</div>';}function
editFunctions($o){global$lc;$I=($o["null"]?"NULL/":"");foreach($lc
as$z=>$id){if(!$z||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($id
as$Xf=>$X){if(!$Xf||preg_match("~$Xf~",$o["type"]))$I.="/$X";}if($z&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$I.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$I='Auto Increment';return
explode("/",$I);}function
editInput($Q,$o,$Ja,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ja value='-1' checked><i>".'original'."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ja value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ja,$o,$Y,0);return"";}function
editHint($Q,$o,$Y){return"";}function
processInput($o,$Y,$s=""){if($s=="SQL")return$Y;$C=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$s))$I="$s()";elseif(preg_match('~^current_(date|timestamp)$~',$s))$I=$s;elseif(preg_match('~^([+-]|\|\|)$~',$s))$I=idf_escape($C)." $s $I";elseif(preg_match('~^[+-] interval$~',$s))$I=idf_escape($C)." $s ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$s))$I="$s(".idf_escape($C).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$s))$I="$s($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>'open','file'=>'save');if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Gh,$Yd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Gh)dump_csv(array_keys(fields($Q)));}else{if($Yd==2){$p=array();foreach(fields($Q)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$i="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$i=create_sql($Q,$_POST["auto_increment"],$Gh);set_utf8mb4($i);if($Gh&&$i){if($Gh=="DROP+CREATE"||$Yd==1)echo"DROP ".($Yd==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($Yd==1)$i=remove_definer($i);echo"$i;\n\n";}}}function
dumpData($Q,$Gh,$G){global$g,$y;$De=($y=="sqlite"?0:1048576);if($Gh){if($_POST["format"]=="sql"){if($Gh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$H=$g->query($G,1);if($H){$Rd="";$Xa="";$fe=array();$Ih="";$Pc=($Q!=''?'fetch_assoc':'fetch_row');while($J=$H->$Pc()){if(!$fe){$Si=array();foreach($J
as$X){$o=$H->fetch_field();$fe[]=$o->name;$z=idf_escape($o->name);$Si[]="$z = VALUES($z)";}$Ih=($Gh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Si):"").";\n";}if($_POST["format"]!="sql"){if($Gh=="table"){dump_csv($fe);$Gh="INSERT";}dump_csv($J);}else{if(!$Rd)$Rd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$fe)).") VALUES";foreach($J
as$z=>$X){$o=$p[$z];$J[$z]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&$X!=''&&!preg_match('~\[~',$o["full_type"])?$X:q(($X===false?0:$X))):"NULL");}$Vg=($De?"\n":" ")."(".implode(",\t",$J).")";if(!$Xa)$Xa=$Rd.$Vg;elseif(strlen($Xa)+4+strlen($Vg)+strlen($Ih)<$De)$Xa.=",$Vg";else{echo$Xa.$Ih;$Xa=$Rd.$Vg;}}}if($Xa)echo$Xa.$Ih;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($Ad){return
friendly_url($Ad!=""?$Ad:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Ad,$Se=false){$Hf=$_POST["output"];$Hc=(preg_match('~sql~',$_POST["format"])?"sql":($Se?"tar":"csv"));header("Content-Type: ".($Hf=="gz"?"application/x-gzip":($Hc=="tar"?"application/x-tar":($Hc=="sql"||$Hf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Hf=="gz")ob_start('ob_gzencode',1e6);return$Hc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Privileges'."</a>\n":"");return
true;}function
navigation($Re){global$ia,$y,$dc,$g;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Re=="auth"){$Uc=true;foreach((array)$_SESSION["pwds"]as$Ui=>$jh){foreach($jh
as$N=>$Pi){foreach($Pi
as$V=>$F){if($F!==null){if($Uc){echo"<ul id='logins'>".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Uc=false;}$Pb=$_SESSION["db"][$Ui][$N][$V];foreach(($Pb?array_keys($Pb):array(""))as$l)echo"<li><a href='".h(auth_url($Ui,$N,$V,$l))."'>($dc[$Ui]) ".h($V.($N!=""?"@".$this->serverName($N):"").($l!=""?" - $l":""))."</a>\n";}}}}}else{if($_GET["ns"]!==""&&!$Re&&DB!=""){$g->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.7.2");if(support("sql")){echo'<script',nonce(),'>
';if($S){$ue=array();foreach($S
as$Q=>$T)$ue[]=preg_quote($Q,'/');echo"var jushLinks = { $y: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$ue).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$y;\n";}$ih=$g->server_info;echo'bodyLoad(\'',(is_object($g)?preg_replace('~^(\d\.?\d).*~s','\1',$ih):""),'\'',(preg_match('~MariaDB~',$ih)?", true":""),');
</script>
';}$this->databasesPrint($Re);if(DB==""||!$Re){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'SQL command'."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'Import'."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Export'."</a>\n";}if($_GET["ns"]!==""&&!$Re&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create table'."</a>\n";if(!$S)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Re){global$b,$g;$k=$this->databases();if($k&&!in_array(DB,$k))array_unshift($k,DB);echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Nb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".'database'."'>".'DB'."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Nb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".'Use'."'".($k?" class='hidden'":"").">\n";if($Re!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br>".'Schema'.": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Nb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}echo"</p></form>\n";}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$Ch){$C=$this->tableName($Ch);if($C!=""){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select").">".'select'."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($Ch)?"view":"structure"))." title='".'Show structure'."'>$C</a>":"<span>$C</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$sf;function
page_header($fi,$n="",$Wa=array(),$gi=""){global$ca,$ia,$b,$dc,$y;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$hi=$fi.($gi!=""?": $gi":"");$ii=strip_tags($hi.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$ii,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.2"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.2");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.2"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.2"),'">
';foreach($b->css()as$Hb){echo'<link rel="stylesheet" type="text/css" href="',h($Hb),'">
';}}echo'
<body class="ltr nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Vi=unserialize(file_get_contents($q));$qg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Vi["version"],base64_decode($Vi["signature"]),$qg)==1)$_COOKIE["adminer_version"]=$Vi["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$y,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Wa!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$dc[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=$b->serverName(SERVER);$N=($N!=""?$N:'Server');if($Wa===false)echo"$N\n";else{echo"<a href='".($A?h($A):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Wa)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Wa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Wa
as$z=>$X){$Vb=(is_array($X)?$X[1]:h($X));if($Vb!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$Vb</a> &raquo; ";}}echo"$fi\n";}}echo"<h2>$hi</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Gb){$ud=array();foreach($Gb
as$z=>$X)$ud[]="$z $X";header("Content-Security-Policy: ".implode("; ",$ud));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$bf;if(!$bf)$bf=base64_encode(rand_string());return$bf;}function
page_messages($n){$Ii=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ne=$_SESSION["messages"][$Ii];if($Ne){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ne)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ii]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Re=""){global$b,$mi;echo'</div>

';if($Re!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$mi,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Re);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Ue){while($Ue>=2147483648)$Ue-=4294967296;while($Ue<=-2147483649)$Ue+=4294967296;return(int)$Ue;}function
long2str($W,$Zi){$Vg='';foreach($W
as$X)$Vg.=pack('V',$X);if($Zi)return
substr($Vg,0,end($W));return$Vg;}function
str2long($Vg,$Zi){$W=array_values(unpack('V*',str_pad($Vg,4*ceil(strlen($Vg)/4),"\0")));if($Zi)$W[]=strlen($Vg);return$W;}function
xxtea_mx($mj,$lj,$Jh,$be){return
int32((($mj>>5&0x7FFFFFF)^$lj<<2)+(($lj>>3&0x1FFFFFFF)^$mj<<4))^int32(($Jh^$lj)+($be^$mj));}function
encrypt_string($Eh,$z){if($Eh=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Eh,true);$Ue=count($W)-1;$mj=$W[$Ue];$lj=$W[0];$rg=floor(6+52/($Ue+1));$Jh=0;while($rg-->0){$Jh=int32($Jh+0x9E3779B9);$kc=$Jh>>2&3;for($If=0;$If<$Ue;$If++){$lj=$W[$If+1];$Te=xxtea_mx($mj,$lj,$Jh,$z[$If&3^$kc]);$mj=int32($W[$If]+$Te);$W[$If]=$mj;}$lj=$W[0];$Te=xxtea_mx($mj,$lj,$Jh,$z[$If&3^$kc]);$mj=int32($W[$Ue]+$Te);$W[$Ue]=$mj;}return
long2str($W,false);}function
decrypt_string($Eh,$z){if($Eh=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Eh,false);$Ue=count($W)-1;$mj=$W[$Ue];$lj=$W[0];$rg=floor(6+52/($Ue+1));$Jh=int32($rg*0x9E3779B9);while($Jh){$kc=$Jh>>2&3;for($If=$Ue;$If>0;$If--){$mj=$W[$If-1];$Te=xxtea_mx($mj,$lj,$Jh,$z[$If&3^$kc]);$lj=int32($W[$If]-$Te);$W[$If]=$lj;}$mj=$W[$Ue];$Te=xxtea_mx($mj,$lj,$Jh,$z[$If&3^$kc]);$lj=int32($W[0]-$Te);$W[0]=$lj;$Jh=int32($Jh-0x9E3779B9);}return
long2str($W,true);}$g='';$td=$_SESSION["token"];if(!$td)$_SESSION["token"]=rand(1,1e6);$mi=get_token();$Yf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$Yf[$z]=$X;}}function
add_invalid_login(){global$b;$gd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$gd)return;$Ud=unserialize(stream_get_contents($gd));$ci=time();if($Ud){foreach($Ud
as$Vd=>$X){if($X[0]<$ci)unset($Ud[$Vd]);}}$Td=&$Ud[$b->bruteForceKey()];if(!$Td)$Td=array($ci+30*60,0);$Td[1]++;file_write_unlock($gd,serialize($Ud));}function
check_invalid_login(){global$b;$Ud=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Td=$Ud[$b->bruteForceKey()];$af=($Td[1]>29?$Td[0]-time():0);if($af>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($af/60)));}$Ka=$_POST["auth"];if($Ka){session_regenerate_id();$Ui=$Ka["driver"];$N=$Ka["server"];$V=$Ka["username"];$F=(string)$Ka["password"];$l=$Ka["db"];set_password($Ui,$N,$V,$F);$_SESSION["db"][$Ui][$N][$V][$l]=true;if($Ka["permanent"]){$z=base64_encode($Ui)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($l);$kg=$b->permanentLogin(true);$Yf[$z]="$z:".base64_encode($kg?encrypt_string($F,$kg):"");cookie("adminer_permanent",implode(" ",$Yf));}if(count($_POST)==1||DRIVER!=$Ui||SERVER!=$N||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Ui,$N,$V,$l));}elseif($_POST["logout"]){if($td&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.');}}elseif($Yf&&!$_SESSION["pwds"]){session_regenerate_id();$kg=$b->permanentLogin();foreach($Yf
as$z=>$X){list(,$ib)=explode(":",$X);list($Ui,$N,$V,$l)=array_map('base64_decode',explode("-",$z));set_password($Ui,$N,$V,decrypt_string(base64_decode($ib),$kg));$_SESSION["db"][$Ui][$N][$V][$l]=true;}}function
unset_permanent(){global$Yf;foreach($Yf
as$z=>$X){list($Ui,$N,$V,$l)=array_map('base64_decode',explode("-",$z));if($Ui==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Yf[$z]);}cookie("adminer_permanent",implode(" ",$Yf));}function
auth_error($n){global$b,$td;$kh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$kh]||$_GET[$kh])&&!$td)$n='Session expired, please login again.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$kh]&&$_GET[$kh]&&ini_bool("session.use_only_cookies"))$n='Session support must be enabled.';$Lf=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Lf["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$eg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($zd,$ag)=explode(":",SERVER,2);if(is_numeric($ag)&&$ag<1024)auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$we=null;if(!is_object($g)||($we=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($g)?h($g):(is_string($we)?$we:'Invalid credentials.'));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($Ka&&$_POST["token"])$_POST["token"]=$mi;$n='';if($_POST){if(!verify_token()){$Od="max_input_vars";$He=ini_get($Od);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$He||$X<$He)){$Od=$z;$He=$X;}}}$n=(!$_POST["token"]&&$He?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$Od'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
select($H,$h=null,$_f=array(),$_=0){global$y;$ue=array();$x=array();$f=array();$Ta=array();$U=array();$I=array();odd('');for($t=0;(!$_||$t<$_)&&($J=$H->fetch_row());$t++){if(!$t){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($ae=0;$ae<count($J);$ae++){$o=$H->fetch_field();$C=$o->name;$zf=$o->orgtable;$yf=$o->orgname;$I[$o->table]=$zf;if($_f&&$y=="sql")$ue[$ae]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($zf!=""){if(!isset($x[$zf])){$x[$zf]=array();foreach(indexes($zf,$h)as$w){if($w["type"]=="PRIMARY"){$x[$zf]=array_flip($w["columns"]);break;}}$f[$zf]=$x[$zf];}if(isset($f[$zf][$yf])){unset($f[$zf][$yf]);$x[$zf][$yf]=$ae;$ue[$ae]=$zf;}}if($o->charsetnr==63)$Ta[$ae]=true;$U[$ae]=$o->type;echo"<th".($zf!=""||$o->name!=$yf?" title='".h(($zf!=""?"$zf.":"").$yf)."'":"").">".h($C).($_f?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$z=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ta[$z]&&!is_utf8($X))$X="<i>".lang(array('%d byte','%d bytes'),strlen($X))."</i>";else{$X=h($X);if($U[$z]==254)$X="<code>$X</code>";}if(isset($ue[$z])&&!$f[$ue[$z]]){if($_f&&$y=="sql"){$Q=$J[array_search("table=",$ue)];$A=$ue[$z].urlencode($_f[$Q]!=""?$_f[$Q]:$Q);}else{$A="edit=".urlencode($ue[$z]);foreach($x[$ue[$z]]as$mb=>$ae)$A.="&where".urlencode("[".bracket_escape($mb)."]")."=".urlencode($J[$ae]);}$X="<a href='".h(ME.$A)."'>$X</a>";}echo"<td>$X";}}echo($t?"</table>\n</div>":"<p class='message'>".'No rows.')."\n";return$I;}function
referencable_primary($eh){$I=array();foreach(table_status('',true)as$Nh=>$Q){if($Nh!=$eh&&fk_support($Q)){foreach(fields($Nh)as$o){if($o["primary"]){if($I[$Nh]){unset($I[$Nh]);break;}$I[$Nh]=$o;}}}}return$I;}function
adminer_settings(){parse_str($_COOKIE["adminer_settings"],$mh);return$mh;}function
adminer_setting($z){$mh=adminer_settings();return$mh[$z];}function
set_adminer_settings($mh){return
cookie("adminer_settings",http_build_query($mh+adminer_settings()));}function
textarea($C,$Y,$K=10,$qb=80){global$y;echo"<textarea name='$C' rows='$K' cols='$qb' class='sqlarea jush-$y' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($z,$o,$ob,$cd=array(),$Kc=array()){global$Fh,$U,$Gi,$nf;$T=$o["type"];echo'<td><select name="',h($z),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($cd[$T])&&!in_array($T,$Kc))$Kc[]=$T;if($cd)$Fh['Foreign keys']=$cd;echo
optionlist(array_merge($Kc,$Fh),$T),'</select>
',on_help("getTarget(event).value",1),script("mixin(qsl('select'), {onfocus: function () { lastType = selectValue(this); }, onchange: editingTypeChange});",""),'<td><input name="',h($z),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":"");echo' aria-labelledby="label-length">',script("mixin(qsl('input'), {onfocus: editingLengthFocus, oninput: editingLengthChange});",""),'<td class="options">',"<select name='".h($z)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($ob,$o["collation"]).'</select>',($Gi?"<select name='".h($z)."[unsigned]'".(!$T||preg_match(number_type(),$T)?"":" class='hidden'").'><option>'.optionlist($Gi,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($z)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"CURRENT_TIMESTAMP":$o["on_update"])).'</select>':''),($cd?"<select name='".h($z)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$nf),$o["on_delete"])."</select> ":" ");}function
process_length($re){global$vc;return(preg_match("~^\\s*\\(?\\s*$vc(?:\\s*,\\s*$vc)*+\\s*\\)?\\s*\$~",$re)&&preg_match_all("~$vc~",$re,$Be)?"(".implode(",",$Be[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$re)));}function
process_type($o,$nb="COLLATE"){global$Gi;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Gi)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $nb ".q($o["collation"]):"");}function
process_field($o,$zi){return
array(idf_escape(trim($o["field"])),process_type($zi),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Rb=$o["default"];return($Rb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Rb)?q($Rb):$Rb));}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$z=>$X){if(preg_match("~$z|$X~",$T))return" class='$z'";}}function
edit_fields($p,$ob,$T="TABLE",$cd=array()){global$Pd;$p=array_values($p);echo'<thead><tr>
';if($T=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($T=="TABLE"?'Column name':'Parameter name'),'<td id="label-type">Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">Length
<td>','Options';if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="Auto Increment">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default">Default value
',(support("comment")?"<td id='label-comment'>".'Comment':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.2")."' alt='+' title='".'Add next'."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$t=>$o){$t++;$Af=$o[($_POST?"orig":"field")];$Zb=(isset($_POST["add"][$t-1])||(isset($o["field"])&&!$_POST["drop_col"][$t]))&&(support("drop_col")||$Af=="");echo'<tr',($Zb?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$t][inout]",explode("|",$Pd),$o["inout"]):""),'<th>';if($Zb){echo'<input name="fields[',$t,'][field]" value="',h($o["field"]),'" data-maxlength="64" autocapitalize="off" aria-labelledby="label-name">',script("qsl('input').oninput = function () { editingNameChange.call(this);".($o["field"]!=""||count($p)>1?"":" editingAddRow.call(this);")." };","");}echo'<input type="hidden" name="fields[',$t,'][orig]" value="',h($Af),'">
';edit_type("fields[$t]",$o,$ob,$cd);if($T=="TABLE"){echo'<td>',checkbox("fields[$t][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$t,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td>',checkbox("fields[$t][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$t,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td><input name='fields[$t][comment]' value='".h($o["comment"])."' data-maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.2")."' alt='+' title='".'Add next'."'> "."<input type='image' class='icon' name='up[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.7.2")."' alt='↑' title='".'Move up'."'> "."<input type='image' class='icon' name='down[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.7.2")."' alt='↓' title='".'Move down'."'> ":""),($Af==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$t]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.7.2")."' alt='x' title='".'Remove'."'>":"");}}function
process_fields(&$p){$D=0;if($_POST["up"]){$le=0;foreach($p
as$z=>$o){if(key($_POST["up"])==$z){unset($p[$z]);array_splice($p,$le,0,array($o));break;}if(isset($o["field"]))$le=$D;$D++;}}elseif($_POST["down"]){$ed=false;foreach($p
as$z=>$o){if(isset($o["field"])&&$ed){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($ed));break;}if(key($_POST["down"])==$z)$ed=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($jd,$mg,$f,$mf){if(!$mg)return
true;if($mg==array("ALL PRIVILEGES","GRANT OPTION"))return($jd=="GRANT"?queries("$jd ALL PRIVILEGES$mf WITH GRANT OPTION"):queries("$jd ALL PRIVILEGES$mf")&&queries("$jd GRANT OPTION$mf"));return
queries("$jd ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$f, ",$mg).$f).$mf);}function
drop_create($ec,$i,$fc,$Zh,$hc,$ve,$Me,$Ke,$Le,$jf,$Xe){if($_POST["drop"])query_redirect($ec,$ve,$Me);elseif($jf=="")query_redirect($i,$ve,$Le);elseif($jf!=$Xe){$Eb=queries($i);queries_redirect($ve,$Ke,$Eb&&queries($ec));if($Eb)queries($fc);}else
queries_redirect($ve,$Ke,queries($Zh)&&queries($hc)&&queries($ec)&&queries($i));}function
create_trigger($mf,$J){global$y;$ei=" $J[Timing] $J[Event]".($J["Event"]=="UPDATE OF"?" ".idf_escape($J["Of"]):"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($y=="mssql"?$mf.$ei:$ei.$mf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Rg,$J){global$Pd,$y;$O=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$O[]=(preg_match("~^($Pd)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Sb=rtrim("\n$J[definition]",";");return"CREATE $Rg ".idf_escape(trim($J["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($y=="pgsql"?" AS ".q($Sb):"$Sb;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$G);}function
format_foreign_key($r){global$nf;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$r["source"])).") REFERENCES ".table($r["table"])." (".implode(", ",array_map('idf_escape',$r["target"])).")".(preg_match("~^($nf)\$~",$r["on_delete"])?" ON DELETE $r[on_delete]":"").(preg_match("~^($nf)\$~",$r["on_update"])?" ON UPDATE $r[on_update]":"");}function
tar_file($q,$ji){$I=pack("a100a8a8a8a12a12",$q,644,0,0,decoct($ji->size),decoct(time()));$gb=8*32;for($t=0;$t<strlen($I);$t++)$gb+=ord($I[$t]);$I.=sprintf("%06o",$gb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$ji->send();echo
str_repeat("\0",511-($ji->size+511)%512);}function
ini_bytes($Od){$X=ini_get($Od);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($Wf,$ai="<sup>?</sup>"){global$y,$g;$ih=$g->server_info;$Vi=preg_replace('~^(\d\.?\d).*~s','\1',$ih);$Li=array('sql'=>"https://dev.mysql.com/doc/refman/$Vi/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Vi/static/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);if(preg_match('~MariaDB~',$ih)){$Li['sql']="https://mariadb.com/kb/en/library/";$Wf['sql']=(isset($Wf['mariadb'])?$Wf['mariadb']:str_replace(".html","/",$Wf['sql']));}return($Wf[$y]?"<a href='$Li[$y]$Wf[$y]'".target_blank().">$ai</a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($l){global$g;if(!$g->select_db($l))return"?";$I=0;foreach(table_status()as$R)$I+=$R["Data_length"]+$R["Index_length"];return
format_number($I);}function
set_utf8mb4($i){global$g;static$O=false;if(!$O&&preg_match('~\butf8mb4~i',$i)){$O=true;echo"SET NAMES ".charset($g).";\n\n";}}function
connect_error(){global$b,$g,$mi,$n,$dc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));page_header('Select database',$n,false);echo"<p class='links'>\n";foreach(array('database'=>'Create database','privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$z=>$X){if(support($z))echo"<a href='".h(ME)."$z='>$X</a>\n";}echo"<p>".sprintf('%s version: %s through PHP extension %s',$dc[DRIVER],"<b>".h($g->server_info)."</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$Yg=support("scheme");$ob=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".'Database'." - <a href='".h(ME)."refresh=1'>".'Refresh'."</a>"."<td>".'Collation'."<td>".'Tables'."<td>".'Size'." - <a href='".h(ME)."dbsize=1'>".'Compute'."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$S){$Qg=h(ME)."db=".urlencode($l);$u=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$u):""),"<th><a href='$Qg' id='$u'>".h($l)."</a>";$d=h(db_collation($l,$ob));echo"<td>".(support("database")?"<a href='$Qg".($Yg?"&amp;ns=":"")."&amp;database=' title='".'Alter database'."'>$d</a>":$d),"<td align='right'><a href='$Qg&amp;schema=' id='tables-".h($l)."' title='".'Database schema'."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".'Drop'."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$mi'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('Schema'.": ".h($_GET["ns"]),'Invalid schema.',true);page_footer("ns");exit;}}$nf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($_b){$this->size+=strlen($_b);fwrite($this->handler,$_b);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$vc="'(?:''|[^'\\\\]|\\\\.)*'";$Pd="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$m->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$m->value($J[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);$C=$b->tableName($R);page_header(($p&&is_view($R)?$R['Engine']=='materialized view'?'Materialized view':'View':'Table').": ".($C!=""?$C:h($a)),$n);$b->selectLinks($R);$tb=$R["Comment"];if($tb!="")echo"<p class='nowrap'>".'Comment'.": ".h($tb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".'Indexes'."</h3>\n";$x=indexes($a);if($x)$b->tableIndexesPrint($x);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Alter indexes'."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".'Foreign keys'."</h3>\n";$cd=foreign_keys($a);if($cd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td></thead>\n";foreach($cd
as$C=>$r){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$r["source"]))."</i>","<td><a href='".h($r["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($r["db"]),ME):($r["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($r["ns"]),ME):ME))."table=".urlencode($r["table"])."'>".($r["db"]!=""?"<b>".h($r["db"])."</b>.":"").($r["ns"]!=""?"<b>".h($r["ns"])."</b>.":"").h($r["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$r["target"]))."</i>)","<td>".h($r["on_delete"])."\n","<td>".h($r["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.'Alter'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Add foreign key'."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'Triggers'."</h3>\n";$yi=triggers($a);if($yi){echo"<table cellspacing='0'>\n";foreach($yi
as$z=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($z)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($z))."'>".'Alter'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Add trigger'."</a>\n";}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Ph=array();$Qh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Be,PREG_SET_ORDER);foreach($Be
as$t=>$B){$Ph[$B[1]]=array($B[2],$B[3]);$Qh[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$ni=0;$Qa=-1;$Xg=array();$Cg=array();$pe=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$bg=0;$Xg[$Q]["fields"]=array();foreach(fields($Q)as$C=>$o){$bg+=1.25;$o["pos"]=$bg;$Xg[$Q]["fields"][$C]=$o;}$Xg[$Q]["pos"]=($Ph[$Q]?$Ph[$Q]:array($ni,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$ne=$Qa;if($Ph[$Q][1]||$Ph[$X["table"]][1])$ne=min(floatval($Ph[$Q][1]),floatval($Ph[$X["table"]][1]))-1;else$Qa-=.1;while($pe[(string)$ne])$ne-=.0001;$Xg[$Q]["references"][$X["table"]][(string)$ne]=array($X["source"],$X["target"]);$Cg[$X["table"]][$Q][(string)$ne]=$X["target"];$pe[(string)$ne]=true;}}$ni=max($ni,$Xg[$Q]["pos"][0]+2.5+$bg);}echo'<div id="schema" style="height: ',$ni,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Qh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ni,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($Xg
as$C=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$Wh=>$Dg){foreach($Dg
as$ne=>$_g){$oe=$ne-$Ph[$C][1];$t=0;foreach($_g[0]as$th)echo"\n<div class='references' title='".h($Wh)."' id='refs$ne-".($t++)."' style='left: $oe"."em; top: ".$Q["fields"][$th]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$oe)."em;'></div></div>";}}foreach((array)$Cg[$C]as$Wh=>$Dg){foreach($Dg
as$ne=>$f){$oe=$ne-$Ph[$C][1];$t=0;foreach($f
as$Vh)echo"\n<div class='references' title='".h($Wh)."' id='refd$ne-".($t++)."' style='left: $oe"."em; top: ".$Q["fields"][$Vh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.7.2")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$oe)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Xg
as$C=>$Q){foreach((array)$Q["references"]as$Wh=>$Dg){foreach($Dg
as$ne=>$_g){$Qe=$ni;$Fe=-10;foreach($_g[0]as$z=>$th){$cg=$Q["pos"][0]+$Q["fields"][$th]["pos"];$dg=$Xg[$Wh]["pos"][0]+$Xg[$Wh]["fields"][$_g[1][$z]]["pos"];$Qe=min($Qe,$cg,$dg);$Fe=max($Fe,$cg,$dg);}echo"<div class='references' id='refl$ne' style='left: $ne"."em; top: $Qe"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Fe-$Qe)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Cb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$z)$Cb.="&$z=".urlencode($_POST[$z]);cookie("adminer_export",substr($Cb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Hc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$Xd=preg_match('~sql~',$_POST["format"]);if($Xd){echo"-- Adminer $ia ".$dc[DRIVER]." dump\n\n";if($y=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$g->query("SET time_zone = '+00:00';");}}$Gh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($g->select_db($l)){if($Xd&&preg_match('~CREATE~',$Gh)&&($i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($i);if($Gh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$i;\n";}if($Xd){if($Gh)echo
use_sql($l).";\n\n";$Gf="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Rg){foreach(get_rows("SHOW $Rg STATUS WHERE Db = ".q($l),null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE $Rg ".idf_escape($J["Name"]),2));set_utf8mb4($i);$Gf.=($Gh!='DROP+CREATE'?"DROP $Rg IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($i);$Gf.=($Gh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}if($Gf)echo"DELIMITER ;;\n\n$Gf"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Xi=array();foreach(table_status('',true)as$C=>$R){$Q=(DB==""||in_array($C,(array)$_POST["tables"]));$Kb=(DB==""||in_array($C,(array)$_POST["data"]));if($Q||$Kb){if($Hc=="tar"){$ji=new
TmpFile;ob_start(array($ji,'write'),1e5);}$b->dumpTable($C,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$Xi[]=$C;elseif($Kb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Xd&&$_POST["triggers"]&&$Q&&($yi=trigger_sql($C)))echo"\nDELIMITER ;;\n$yi\nDELIMITER ;\n";if($Hc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$C.csv",$ji);}elseif($Xd)echo"\n";}}foreach($Xi
as$Wi)$b->dumpTable($Wi,$_POST["table_style"],1);if($Hc=="tar")echo
pack("x512");}}}if($Xd)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header('Export',$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
';$Ob=array('','USE','DROP+CREATE','CREATE');$Rh=array('','DROP+CREATE','CREATE');$Lb=array('','TRUNCATE+INSERT','INSERT');if($y=="sql")$Lb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($y=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Ob,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],'Routines'):"").(support("event")?checkbox("events",1,$J["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Rh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$J["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$Lb,$J["data_style"]),'</table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="',$mi,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$gg=array();if(DB!=""){$eb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$eb>".'Tables'."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".'Data'."<input type='checkbox' id='check-data'$eb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$Xi="";$Sh=tables_list();foreach($Sh
as$C=>$T){$fg=preg_replace('~_.*~','',$C);$eb=($a==""||$a==(substr($a,-1)=="%"?"$fg%":$C));$jg="<tr><td>".checkbox("tables[]",$C,$eb,$C,"","block");if($T!==null&&!preg_match('~table~i',$T))$Xi.="$jg\n";else
echo"$jg<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$eb)."</label>\n";$gg[$fg]++;}echo$Xi;if($Sh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".'Database'."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$fg=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$fg%",$l,"","block")."\n";$gg[$fg]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Uc=true;foreach($gg
as$z=>$X){if($z!=""&&$X>1){echo($Uc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$z%")."'>".h($z)."</a>";$Uc=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');echo'<p class="links"><a href="'.h(ME).'user=">'.'Create user'."</a>";$H=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$jd=$H;if(!$H)$H=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($jd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Username'."<th>".'Server'."<th></thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.'Edit'."</a>\n";if(!$jd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'Edit'."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$xd=&get_session("queries");$wd=&$xd[DB];if(!$n&&$_POST["clear"]){$wd=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'Import':'SQL command'),$n);if(!$n&&$_POST){$gd=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$xh=$b->importServerPath();$gd=@fopen((file_exists($xh)?$xh:"compress.zlib://$xh.gz"),"rb");$G=($gd?fread($gd,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$rg=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$wd||reset(end($wd))!=$rg){restart_session();$wd[]=array($rg,time());set_session("queries",$xd);stop_session();}}$uh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ub=";";$D=0;$sc=true;$h=connect();if(is_object($h)&&DB!="")$h->select_db(DB);$sb=0;$xc=array();$Nf='[\'"'.($y=="sql"?'`#':($y=="sqlite"?'`[':($y=="mssql"?'[':''))).']|/\*|-- |$'.($y=="pgsql"?'|\$[^$]*\$':'');$oi=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$jc=$b->dumpFormat();unset($jc["sql"]);while($G!=""){if(!$D&&preg_match("~^$uh*+DELIMITER\\s+(\\S+)~i",$G,$B)){$Ub=$B[1];$G=substr($G,strlen($B[0]));}else{preg_match('('.preg_quote($Ub)."\\s*|$Nf)",$G,$B,PREG_OFFSET_CAPTURE,$D);list($ed,$bg)=$B[0];if(!$ed&&$gd&&!feof($gd))$G.=fread($gd,1e5);else{if(!$ed&&rtrim($G)=="")break;$D=$bg+strlen($ed);if($ed&&rtrim($ed)!=$Ub){while(preg_match('('.($ed=='/*'?'\*/':($ed=='['?']':(preg_match('~^-- |^#~',$ed)?"\n":preg_quote($ed)."|\\\\."))).'|$)s',$G,$B,PREG_OFFSET_CAPTURE,$D)){$Vg=$B[0][0];if(!$Vg&&$gd&&!feof($gd))$G.=fread($gd,1e5);else{$D=$B[0][1]+strlen($Vg);if($Vg[0]!="\\")break;}}}else{$sc=false;$rg=substr($G,0,$bg);$sb++;$jg="<pre id='sql-$sb'><code class='jush-$y'>".$b->sqlCommandQuery($rg)."</code></pre>\n";if($y=="sqlite"&&preg_match("~^$uh*+ATTACH\\b~i",$rg,$B)){echo$jg,"<p class='error'>".'ATTACH queries are not supported.'."\n";$xc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$jg;ob_flush();flush();}$Ah=microtime(true);if($g->multi_query($rg)&&is_object($h)&&preg_match("~^$uh*+USE\\b~i",$rg))$h->query($rg);do{$H=$g->store_result();if($g->error){echo($_POST["only_errors"]?$jg:""),"<p class='error'>".'Error in query'.($g->errno?" ($g->errno)":"").": ".error()."\n";$xc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break
2;}else{$ci=" <span class='time'>(".format_time($Ah).")</span>".(strlen($rg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($rg))."'>".'Edit'."</a>":"");$za=$g->affected_rows;$aj=($_POST["only_errors"]?"":$m->warnings());$bj="warnings-$sb";if($aj)$ci.=", <a href='#$bj'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$bj');","");$Ec=null;$Fc="explain-$sb";if(is_object($H)){$_=$_POST["limit"];$_f=select($H,$h,array(),$_);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$df=$H->num_rows;echo"<p>".($df?($_&&$df>$_?sprintf('%d / ',$_):"").lang(array('%d row','%d rows'),$df):""),$ci;if($h&&preg_match("~^($uh|\\()*+SELECT\\b~i",$rg)&&($Ec=explain($h,$rg)))echo", <a href='#$Fc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Fc');","");$u="export-$sb";echo", <a href='#$u'>".'Export'."</a>".script("qsl('a').onclick = partial(toggle, '$u');","")."<span id='$u' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$jc,$xa["format"])."<input type='hidden' name='query' value='".h($rg)."'>"." <input type='submit' name='export' value='".'Export'."'><input type='hidden' name='token' value='$mi'></span>\n"."</form>\n";}}else{if(preg_match("~^$uh*+(CREATE|DROP|ALTER)$uh++(DATABASE|SCHEMA)\\b~i",$rg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$za)."$ci\n";}echo($aj?"<div id='$bj' class='hidden'>\n$aj</div>\n":"");if($Ec){echo"<div id='$Fc' class='hidden'>\n";select($Ec,$h,$_f);echo"</div>\n";}}$Ah=microtime(true);}while($g->next_result());}$G=substr($G,$D);$D=0;}}}}if($sc)echo"<p class='message'>".'No commands to execute.'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$sb-count($xc))," <span class='time'>(".format_time($oi).")</span>\n";}elseif($xc&&$sb>1)echo"<p class='error'>".'Error in query'.": ".implode("",$xc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Bc="<input type='submit' value='".'Execute'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$rg=$_GET["sql"];if($_POST)$rg=$_POST["query"];elseif($_GET["history"]=="all")$rg=$wd;elseif($_GET["history"]!="")$rg=$wd[$_GET["history"]][0];echo"<p>";textarea("query",$rg,20);echo
script(($_POST?"":"qs('textarea').focus();\n")."qs('#form').onsubmit = partial(sqlSubmit, qs('#form'), '".remove_from_uri("sql|limit|error_stops|only_errors")."');"),"<p>$Bc\n",'Limit rows'.": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".'File upload'."</legend><div>";$pd=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$pd (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Bc":'File uploads are disabled.'),"</div></fieldset>\n";$Ed=$b->importServerPath();if($Ed){echo"<fieldset><legend>".'From server'."</legend><div>",sprintf('Webserver file %s',"<code>".h($Ed)."$pd</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n";}echo"<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),'Stop on error')."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),'Show only errors')."\n","<input type='hidden' name='token' value='$mi'>\n";if(!isset($_GET["import"])&&$wd){print_fieldset("history",'History',$_GET["history"]!="");for($X=end($wd);$X;$X=prev($wd)){$z=key($wd);list($rg,$ci,$nc)=$X;echo'<a href="'.h(ME."sql=&history=$z").'">'.'Edit'."</a>"." <span class='time' title='".@date('Y-m-d',$ci)."'>".@date("H:i:s",$ci)."</span>"." <code class='jush-$y'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$rg)))),80,"</code>").($nc?" <span class='time'>($nc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Hi=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$Hi?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$ve=$_POST["referer"];if($_POST["insert"])$ve=($Hi?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$ve))$ve=ME."select=".urlencode($a);$x=indexes($a);$Ci=unique_array($_GET["where"],$x);$ug="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($ve,'Item has been deleted.',$m->delete($a,$ug,!$Ci));else{$O=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($Hi){if(!$O)redirect($ve);queries_redirect($ve,'Item has been updated.',$m->update($a,$O,$ug,!$Ci));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$m->insert($a,$O);$me=($H?last_id():0);queries_redirect($ve,sprintf('Item%s has been inserted.',($me?" $me":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($y=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($C);$L[]=($Ga?"$Ga AS ":"").idf_escape($C);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$m->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$m->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($m->primary=>"");}if($J){foreach($J
as$z=>$X){if(!$Z)$J[$z]=null;$p[$z]=array("field"=>$z,"null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary));}}}edit_form($a,$p,$J,$Hi);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Pf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$z)$Pf[$z]=$z;$Bg=referencable_primary($a);$cd=array();foreach($Bg
as$Nh=>$o)$cd[str_replace("`","``",$Nh)."`".str_replace("`","``",$o["field"])]=$Nh;$Cf=array();$R=array();if($a!=""){$Cf=fields($a);$R=table_status($a);if(!$R)$n='No tables.';}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST)set_adminer_settings(array("comments"=>$_POST["comments"],"defaults"=>$_POST["defaults"]));if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'Table has been dropped.',drop_tables(array($a)));else{$p=array();$Da=array();$Mi=false;$ad=array();$Bf=reset($Cf);$Aa=" FIRST";foreach($J["fields"]as$z=>$o){$r=$cd[$o["type"]];$zi=($r!==null?$Bg[$r]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($z==$J["auto_increment_col"])$o["auto_increment"]=true;$og=process_field($o,$zi);$Da[]=array($o["orig"],$og,$Aa);if($og!=process_field($Bf,$Bf)){$p[]=array($o["orig"],$og,$Aa);if($o["orig"]!=""||$Aa)$Mi=true;}if($r!==null)$ad[idf_escape($o["field"])]=($a!=""&&$y!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$cd[$o["type"]],'source'=>array($o["field"]),'target'=>array($zi["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Mi=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$Bf=next($Cf);if(!$Bf)$Aa="";}}$Rf="";if($Pf[$J["partition_by"]]){$Sf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$z=>$X){$Y=$J["partition_values"][$z];$Sf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Rf.="\nPARTITION BY $J[partition_by]($J[partition])".($Sf?" (".implode(",",$Sf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Rf.="\nREMOVE PARTITIONING";$Je='Table has been altered.';if($a==""){cookie("adminer_engine",$J["Engine"]);$Je='Table has been created.';}$C=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$Je,alter_table($a,$C,($y=="sqlite"&&($Mi||$ad)?$Da:$p),$ad,($J["Comment"]!=$R["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$R["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$R["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Rf));}}page_header(($a!=""?'Alter table':'Create table'),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$R;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($Cf
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$hd="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $hd ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Sf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $hd AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Sf[""]="";$J["partition_names"]=array_keys($Sf);$J["partition_values"]=array_values($Sf);}}}$ob=collations();$uc=engines();foreach($uc
as$tc){if(!strcasecmp($tc,$J["Engine"])){$J["Engine"]=$tc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'Table name: <input name="name" data-maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($uc?"<select name='Engine'>".optionlist(array(""=>"(".'engine'.")")+$uc,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($ob&&!preg_match("~sqlite|mssql~",$y)?html_select("Collation",array(""=>"(".'collation'.")")+$ob,$J["Collation"]):""),' <input type="submit" value="Save">
';}echo'
';if(support("columns")){echo'<div class="scrollable">
<table cellspacing="0" id="edit-fields" class="nowrap">
';edit_fields($J["fields"],$ob,"TABLE",$cd);echo'</table>
</div>
<p>
Auto Increment: <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,($_POST?$_POST["defaults"]:adminer_setting("defaults")),'Default values',"columnShow(this.checked, 5)","jsonly"),(support("comment")?checkbox("comments",1,($_POST?$_POST["comments"]:adminer_setting("comments")),'Comment',"editingCommentsClick(this, true);","jsonly").' <input name="Comment" value="'.h($J["Comment"]).'" data-maxlength="'.(min_version(5.5)?2048:60).'">':''),'<p>
<input type="submit" value="Save">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}if(support("partitioning")){$Qf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",'Partition by',$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Pf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
Partitions: <input type="number" name="partitions" class="size',($Qf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Qf?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($J["partition_names"]as$z=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($z==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$z]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
',script("qs('#form')['defaults'].onclick();".(support("comment")?" editingCommentsClick(qs('#form')['comments']);":""));}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Hd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$R["Engine"]))$Hd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$R["Engine"]))$Hd[]="SPATIAL";$x=indexes($a);$hg=array();if($y=="mongo"){$hg=$x["_id_"];unset($Hd[0]);unset($x["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$w){$C=$w["name"];if(in_array($w["type"],$Hd)){$f=array();$se=array();$Wb=array();$O=array();ksort($w["columns"]);foreach($w["columns"]as$z=>$e){if($e!=""){$re=$w["lengths"][$z];$Vb=$w["descs"][$z];$O[]=idf_escape($e).($re?"(".(+$re).")":"").($Vb?" DESC":"");$f[]=$e;$se[]=($re?$re:null);$Wb[]=$Vb;}}if($f){$Cc=$x[$C];if($Cc){ksort($Cc["columns"]);ksort($Cc["lengths"]);ksort($Cc["descs"]);if($w["type"]==$Cc["type"]&&array_values($Cc["columns"])===$f&&(!$Cc["lengths"]||array_values($Cc["lengths"])===$se)&&array_values($Cc["descs"])===$Wb){unset($x[$C]);continue;}}$c[]=array($w["type"],$C,$O);}}}foreach($x
as$C=>$Cc)$c[]=array($Cc["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Indexes have been altered.',alter_indexes($a,$c));}page_header('Indexes',$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$z=>$w){if($w["columns"][count($w["columns"])]!="")$J["indexes"][$z]["columns"][]="";}$w=end($J["indexes"]);if($w["type"]||array_filter($w["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($x
as$z=>$w){$x[$z]["name"]=$z;$x[$z]["columns"][]="";}$x[]=array("columns"=>array(1=>""));$J["indexes"]=$x;}echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">Index Type
<th><input type="submit" class="wayoff">Column (length)
<th id="label-name">Name
<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.2")."' alt='+' title='".'Add next'."'>",'</noscript>
</thead>
';if($hg){echo"<tr><td>PRIMARY<td>";foreach($hg["columns"]as$z=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".'descending'."</label> ";}echo"<td><td>\n";}$ae=1;foreach($J["indexes"]as$w){if(!$_POST["drop_col"]||$ae!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$ae][type]",array(-1=>"")+$Hd,$w["type"],($ae==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($w["columns"]);$t=1;foreach($w["columns"]as$z=>$e){echo"<span>".select_input(" name='indexes[$ae][columns][$t]' title='".'Column'."'",($p?array_combine($p,$p):$p),$e,"partial(".($t==count($w["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($y=="sql"?"":$_GET["indexes"]."_")."')"),($y=="sql"||$y=="mssql"?"<input type='number' name='indexes[$ae][lengths][$t]' class='size' value='".h($w["lengths"][$z])."' title='".'Length'."'>":""),(support("descidx")?checkbox("indexes[$ae][descs][$t]",1,$w["descs"][$z],'descending'):"")," </span>";$t++;}echo"<td><input name='indexes[$ae][name]' value='".h($w["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$ae]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.7.2")."' alt='x' title='".'Remove'."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$ae++;}echo'</table>
</div>
<p>
<input type="submit" value="Save">
<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),'Database has been renamed.',rename_database($C,$J["collation"]));}else{$k=explode("\n",str_replace("\r","",$C));$Hh=true;$le="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$J["collation"]))$Hh=false;$le=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($le),'Database has been created.',$Hh);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$n,array(),h(DB));$ob=collations();$C=DB;if($_POST)$C=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$ob);elseif($y=="sql"){foreach(get_vals("SHOW GRANTS")as$jd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$jd,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" data-maxlength="64" autocapitalize="off">')."\n".($ob?html_select("collation",array(""=>"(".'collation'.")")+$ob,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if(DB!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.2")."' alt='+' title='".'Add next'."'>\n";echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$A=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$A,'Schema has been dropped.');else{$C=trim($J["name"]);$A.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$A,'Schema has been created.');elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$A,'Schema has been altered.');else
redirect($A);}}page_header($_GET["ns"]!=""?'Alter schema':'Create schema',$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header('Call'.": ".h($da),$n);$Rg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Fd=array();$Gf=array();foreach($Rg["fields"]as$t=>$o){if(substr($o["inout"],-3)=="OUT")$Gf[$t]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Fd[]=$t;}if(!$n&&$_POST){$Za=array();foreach($Rg["fields"]as$z=>$o){if(in_array($z,$Fd)){$X=process_input($o);if($X===false)$X="''";if(isset($Gf[$z]))$g->query("SET @".idf_escape($o["field"])." = $X");}$Za[]=(isset($Gf[$z])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$Za).")";$Ah=microtime(true);$H=$g->multi_query($G);$za=$g->affected_rows;echo$b->selectQuery($G,$Ah,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$H=$g->store_result();if(is_object($H))select($H,$h);else
echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$za)."\n";}while($g->next_result());if($Gf)select($g->query("SELECT ".implode(", ",$Gf)));}}echo'
<form action="" method="post">
';if($Fd){echo"<table cellspacing='0' class='layout'>\n";foreach($Fd
as$z){$o=$Rg["fields"][$z];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Je=($_POST["drop"]?'Foreign key has been dropped.':($C!=""?'Foreign key has been altered.':'Foreign key has been created.'));$ve=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Vh=array();foreach($J["source"]as$z=>$X)$Vh[$z]=$J["target"][$z];$J["target"]=$Vh;}if($y=="sqlite")queries_redirect($ve,$Je,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$ec="\nDROP ".($y=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$ec,$ve,$Je);else{query_redirect($c.($C!=""?"$ec,":"")."\nADD".format_foreign_key($J),$ve,$Je);$n='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$n";}}}page_header('Foreign key',$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($C!=""){$cd=foreign_keys($a);$J=$cd[$C];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}$th=array_keys(fields($a));$Vh=($a===$J["table"]?$th:array_keys(fields($J["table"])));$Ag=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($J["db"]==""&&$J["ns"]==""){echo'Target table:
',html_select("table",$Ag,$J["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">Source<th id="label-target">Target</thead>
';$ae=0;foreach($J["source"]as$z=>$X){echo"<tr>","<td>".html_select("source[".(+$z)."]",array(-1=>"")+$th,$X,($ae==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$z)."]",$Vh,$J["target"][$z],1,"label-target");$ae++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$nf),$J["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$nf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$C));}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$Df="VIEW";if($y=="pgsql"&&$a!=""){$Ch=table_status($a);$Df=strtoupper($Ch["Engine"]);}if($_POST&&!$n){$C=trim($J["name"]);$Ga=" AS\n$J[select]";$ve=ME."table=".urlencode($C);$Je='View has been altered.';$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$C&&$y!="sqlite"&&$T=="VIEW"&&$Df=="VIEW")query_redirect(($y=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ga,$ve,$Je);else{$Xh=$C."_adminer_".uniqid();drop_create("DROP $Df ".table($a),"CREATE $T ".table($C).$Ga,"DROP $T ".table($C),"CREATE $T ".table($Xh).$Ga,"DROP $T ".table($Xh),($_POST["drop"]?substr(ME,0,-1):$ve),'View has been dropped.',$Je,'View has been created.',$a,$C);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($Df!="VIEW");if(!$n)$n=error();}page_header(($a!=""?'Alter view':'Create view'),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],'Materialized view'):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="Save">
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Sd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Dh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Event has been dropped.');elseif(in_array($J["INTERVAL_FIELD"],$Sd)&&isset($Dh[$J["STATUS"]])){$Wg="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Event has been altered.':'Event has been created.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Wg.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$Wg)."\n".$Dh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Alter event'.": ".h($aa):'Create event'),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" data-maxlength="64" autocapitalize="off">
<tr><th title="datetime">Start<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">End<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>Every<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Sd,$J["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$Dh,$J["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" data-maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($aa!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$aa));}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Rg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$Af=routine($_GET["procedure"],$Rg);$Xh="$J[name]_adminer_".uniqid();drop_create("DROP $Rg ".routine_id($da,$Af),create_routine($Rg,$J),"DROP $Rg ".routine_id($J["name"],$J),create_routine($Rg,array("name"=>$Xh)+$J),"DROP $Rg ".routine_id($Xh,$J),substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($da):(isset($_GET["function"])?'Create function':'Create procedure')),$n);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Rg);$J["name"]=$da;}$ob=get_vals("SHOW CHARACTER SET");sort($ob);$Sg=routine_languages();echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($J["name"]),'" data-maxlength="64" autocapitalize="off">
',($Sg?'Language'.": ".html_select("language",$Sg,$J["language"])."\n":""),'<input type="submit" value="Save">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$ob,$Rg);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$J["returns"],$ob,array(),($y=="pgsql"?array("void","trigger"):array()));}echo'</table>
</div>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="Save">
';if($da!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$da));}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$A=substr(ME,0,-1);$C=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$A,'Sequence has been dropped.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$A,'Sequence has been created.');elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$A,'Sequence has been altered.');else
redirect($A);}page_header($fa!=""?'Alter sequence'.": ".h($fa):'Create sequence',$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="Save">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$fa))."\n";echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$A=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$A,'Type has been dropped.');else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$A,'Type has been created.');}page_header($ga!=""?'Alter type'.": ".h($ga):'Create type',$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$xi=trigger_options();$J=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$xi["Timing"])&&in_array($_POST["Event"],$xi["Event"])&&in_array($_POST["Type"],$xi["Type"])){$mf=" ON ".table($a);$ec="DROP TRIGGER ".idf_escape($C).($y=="pgsql"?$mf:"");$ve=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($ec,$ve,'Trigger has been dropped.');else{if($C!="")queries($ec);queries_redirect($ve,($C!=""?'Trigger has been altered.':'Trigger has been created.'),queries(create_trigger($mf,$_POST)));if($C!="")queries(create_trigger($mf,$J+array("Type"=>reset($xi["Type"]))));}}$J=$_POST;}page_header(($C!=""?'Alter trigger'.": ".h($C):'Create trigger'),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="layout">
<tr><th>Time<td>',html_select("Timing",$xi["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>Event<td>',html_select("Event",$xi["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$xi["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>Type<td>',html_select("Type",$xi["Type"],$J["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($J["Trigger"]),'" data-maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($C!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$C));}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$mg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Ab)$mg[$Ab][$J["Privilege"]]=$J["Comment"];}$mg["Server Admin"]+=$mg["File access on server"];$mg["Databases"]["Create routine"]=$mg["Procedures"]["Create routine"];unset($mg["Procedures"]["Create routine"]);$mg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$mg["Columns"][$X]=$mg["Tables"][$X];unset($mg["Server Admin"]["Usage"]);foreach($mg["Tables"]as$z=>$X)unset($mg["Databases"][$z]);$We=array();if($_POST){foreach($_POST["objects"]as$z=>$X)$We[$X]=(array)$We[$X]+(array)$_POST["grants"][$z];}$kd=array();$kf="";if(isset($_GET["host"])&&($H=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$B[1],$Be,PREG_SET_ORDER)){foreach($Be
as$X){if($X[1]!="USAGE")$kd["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$kd["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$B))$kf=$B[1];}}if($_POST&&!$n){$lf=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $lf",ME."privileges=",'User has been dropped.');else{$Ye=q($_POST["user"])."@".q($_POST["host"]);$Uf=$_POST["pass"];if($Uf!=''&&!$_POST["hashed"]&&!min_version(8)){$Uf=$g->result("SELECT PASSWORD(".q($Uf).")");$n=!$Uf;}$Eb=false;if(!$n){if($lf!=$Ye){$Eb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $Ye IDENTIFIED BY ".(min_version(8)?"":"PASSWORD ").q($Uf));$n=!$Eb;}elseif($Uf!=$kf)queries("SET PASSWORD FOR $Ye = ".q($Uf));}if(!$n){$Og=array();foreach($We
as$ff=>$jd){if(isset($_GET["grant"]))$jd=array_filter($jd);$jd=array_keys($jd);if(isset($_GET["grant"]))$Og=array_diff(array_keys(array_filter($We[$ff],'strlen')),$jd);elseif($lf==$Ye){$if=array_keys((array)$kd[$ff]);$Og=array_diff($if,$jd);$jd=array_diff($jd,$if);unset($kd[$ff]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$ff,$B)&&(!grant("REVOKE",$Og,$B[2]," ON $B[1] FROM $Ye")||!grant("GRANT",$jd,$B[2]," ON $B[1] TO $Ye"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($lf!=$Ye)queries("DROP USER $lf");elseif(!isset($_GET["grant"])){foreach($kd
as$ff=>$Og){if(preg_match('~^(.+)(\(.*\))?$~U',$ff,$B))grant("REVOKE",array_keys($Og),$B[2]," ON $B[1] FROM $Ye");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$n);if($Eb)$g->query("DROP USER $Ye");}}page_header((isset($_GET["host"])?'Username'.": ".h("$ha@$_GET[host]"):'Create user'),$n,array("privileges"=>array('','Privileges')));if($_POST){$J=$_POST;$kd=$We;}else{$J=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$kf;if($kf!="")$J["hashed"]=true;$kd[(DB==""||$kd?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Server<td><input name="host" data-maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>Username<td><input name="user" data-maxlength="80" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>Password<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo(min_version(8)?"":checkbox("hashed",1,$J["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);")),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'Privileges'.doc_link(array('sql'=>"grant.html#priv_level"));$t=0;foreach($kd
as$ff=>$jd){echo'<th>'.($ff!="*.*"?"<input name='objects[$t]' value='".h($ff)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$t]' value='*.*' size='10'>*.*");$t++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Ab=>$Vb){foreach((array)$mg[$Ab]as$lg=>$tb){echo"<tr".odd()."><td".($Vb?">$Vb<td":" colspan='2'").' lang="en" title="'.h($tb).'">'.h($lg);$t=0;foreach($kd
as$ff=>$jd){$C="'grants[$t][".h(strtoupper($lg))."]'";$Y=$jd[strtoupper($lg)];if($Ab=="Server Admin"&&$ff!=(isset($kd["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$C value='1'".($Y?" checked":"").($lg=="All privileges"?" id='grants-$t-all'>":">".($lg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$t-all'); };"))),"</label>";}$t++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$he=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$he++;}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$he),$he||!$_POST["kill"]);}page_header('Process list',$n);echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$t=-1;foreach(process_list()as$t=>$J){if(!$t){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($J
as$z=>$X)echo"<th>$z".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($z),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$y=="sql"?"Id":"pid"],0):"");foreach($J
as$z=>$X)echo"<td>".(($y=="sql"&&$z=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($y=="pgsql"&&$z=="current_query"&&$X!="<IDLE>")||($y=="oracle"&&$z=="sql_text"&&$X!="")?"<code class='jush-$y'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.'Clone'.'</a>':h($X));echo"\n";}echo'</table>
</div>
<p>
';if(support("kill")){echo($t+1)."/".sprintf('%d in total',max_connections()),"<p><input type='submit' value='".'Kill'."'>\n";}echo'<input type="hidden" name="token" value="',$mi,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$x=indexes($a);$p=fields($a);$cd=column_foreign_keys($a);$hf=$R["Oid"];parse_str($_COOKIE["adminer_import"],$ya);$Pg=array();$f=array();$bi=null;foreach($p
as$z=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$f[$z]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$bi=$b->selectLengthProcess();}$Pg+=$o["privileges"];}list($L,$ld)=$b->selectColumnsProcess($f,$x);$Wd=count($ld)<count($L);$Z=$b->selectSearchProcess($p,$x);$xf=$b->selectOrderProcess($p,$x);$_=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Di=>$J){$Ga=convert_field($p[key($J)]);$L=array($Ga?$Ga:idf_escape(key($J)));$Z[]=where_check($Di,$p);$I=$m->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$hg=$Fi=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$hg=array_flip($w["columns"]);$Fi=($L?$hg:array());foreach($Fi
as$z=>$X){if(in_array(idf_escape($z),$L))unset($Fi[$z]);}break;}}if($hf&&!$hg){$hg=$Fi=array($hf=>0);$x[]=array("type"=>"PRIMARY","columns"=>array($hf));}if($_POST&&!$n){$gj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$fb=array();foreach($_POST["check"]as$cb)$fb[]=where_check($cb,$p);$gj[]="((".implode(") OR (",$fb)."))";}$gj=($gj?"\nWHERE ".implode(" AND ",$gj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$hd=($L?implode(", ",$L):"*").convert_fields($f,$p,$L)."\nFROM ".table($a);$nd=($ld&&$Wd?"\nGROUP BY ".implode(", ",$ld):"").($xf?"\nORDER BY ".implode(", ",$xf):"");if(!is_array($_POST["check"])||$hg)$G="SELECT $hd$gj$nd";else{$Bi=array();foreach($_POST["check"]as$X)$Bi[]="(SELECT".limit($hd,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$nd,1).")";$G=implode(" UNION ALL ",$Bi);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$cd)){if($_POST["save"]||$_POST["delete"]){$H=true;$za=0;$O=array();if(!$_POST["delete"]){foreach($f
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($hg&&is_array($_POST["check"]))||$Wd){$H=($_POST["delete"]?$m->delete($a,$gj):($_POST["clone"]?queries("INSERT $G$gj"):$m->update($a,$O,$gj)));$za=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$cj="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$m->delete($a,$cj,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$cj)):$m->update($a,$O,$cj,1)));if(!$H)break;$za+=$g->affected_rows;}}}$Je=lang(array('%d item has been affected.','%d items have been affected.'),$za);if($_POST["clone"]&&$H&&$za==1){$me=last_id();if($me)$Je=sprintf('Item%s has been inserted.'," $me");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Je,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$H=true;$za=0;foreach($_POST["val"]as$Di=>$J){$O=array();foreach($J
as$z=>$X){$z=bracket_escape($z,1);$O[idf_escape($z)]=(preg_match('~char|text~',$p[$z]["type"])||$X!=""?$b->processInput($p[$z],$X):"NULL");}$H=$m->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Di,$p),!$Wd&&!$hg," ");if(!$H)break;$za+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$za),$H);}}elseif(!is_string($Sc=get_file("csv_file",true)))$n=upload_error($Sc);elseif(!preg_match('~~u',$Sc))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$H=true;$qb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Sc,$Be);$za=count($Be[0]);$m->begin();$M=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($Be[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$M]*)$M~",$X.$M,$Ce);if(!$z&&!array_diff($Ce[1],$qb)){$qb=$Ce[1];$za--;}else{$O=array();foreach($Ce[1]as$t=>$mb)$O[idf_escape($qb[$t])]=($mb==""&&$p[$qb[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$mb))));$K[]=$O;}}$H=(!$K||$m->insertUpdate($a,$K,$hg));if($H)$H=$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$za),$H);$m->rollback();}}}$Nh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Nh",$n);$O=null;if(isset($Pg["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if($cd[$X["col"]]&&count($cd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$O);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$f);$b->selectSearchPrint($Z,$f,$x);$b->selectOrderPrint($xf,$f,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($bi);$b->selectActionPrint($x);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$fd=$g->result(count_rows($a,$Z,$Wd,$ld));$E=floor(max(0,$fd-1)/$_);}$bh=$L;$md=$ld;if(!$bh){$bh[]="*";$Bb=convert_fields($f,$p,$L);if($Bb)$bh[]=substr($Bb,2);}foreach($L
as$z=>$X){$o=$p[idf_unescape($X)];if($o&&($Ga=convert_field($o)))$bh[$z]="$Ga AS $X";}if(!$Wd&&$Fi){foreach($Fi
as$z=>$X){$bh[]=idf_escape($z);if($md)$md[]=idf_escape($z);}}$H=$m->select($a,$bh,$Z,$md,$xf,$_,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$E)$H->seek($_*$E);$rc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$y=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$_!=""&&$ld&&$Wd&&$y=="sql")$fd=$g->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".'No rows.'."\n";else{$Pa=$b->backwardKeys($a,$Nh);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$ld&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Ve=array();$id=array();reset($L);$wg=1;foreach($K[0]as$z=>$X){if(!isset($Fi[$z])){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$z];$C=($o?$b->fieldName($o,$wg):($X["fun"]?"*":$z));if($C!=""){$wg++;$Ve[$z]=$C;$e=idf_escape($z);$_d=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$Vb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($_d.($xf[0]==$e||$xf[0]==$z||(!$xf&&$Wd&&$ld[0]==$e)?$Vb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($_d.$Vb)."' title='".'descending'."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($z)."');");}echo"</span>";}$id[$z]=$X["fun"];next($L);}}$se=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$z=>$X)$se[$z]=max($se[$z],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($_%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$cd)as$Ue=>$J){$Ci=unique_array($K[$Ue],$x);if(!$Ci){$Ci=array();foreach($K[$Ue]as$z=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$z))$Ci[$z]=$X;}}$Di="";foreach($Ci
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&preg_match('~char|text|enum|set~',$p[$z]["type"])&&strlen($X)>64){$z=(strpos($z,'(')?$z:idf_escape($z));$z="MD5(".($y!='sql'||preg_match("~^utf8~",$p[$z]["collation"])?$z:"CONVERT($z USING ".charset($g).")").")";$X=md5($X);}$Di.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$ld&&$L?"":"<td>".checkbox("check[]",substr($Di,1),in_array(substr($Di,1),(array)$_POST["check"])).($Wd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Di)."' class='edit'>".'edit'."</a>"));foreach($J
as$z=>$X){if(isset($Ve[$z])){$o=$p[$z];$X=$m->value($X,$o);if($X!=""&&(!isset($rc[$z])||$rc[$z]!=""))$rc[$z]=(is_mail($X)?$Ve[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$Di;if(!$A&&$X!==null){foreach((array)$cd[$z]as$r){if(count($cd[$z])==1||end($r["source"])==$z){$A="";foreach($r["source"]as$t=>$th)$A.=where_link($t,$r["target"][$t],$K[$Ue][$th]);$A=($r["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($r["db"]),ME):ME).'select='.urlencode($r["table"]).$A;if($r["ns"])$A=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($r["ns"]),$A);if(count($r["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Ci))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($Ci
as$be=>$W)$A.=where_link($t++,$be,$W);}$X=select_value($X,$A,$o,$bi);$u=h("val[$Di][".bracket_escape($z)."]");$Y=$_POST["val"][$Di][bracket_escape($z)];$mc=!is_array($J[$z])&&is_utf8($X)&&$K[$Ue][$z]==$J[$z]&&!$id[$z];$ai=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$mc)||$Y!==null){$qd=h($Y!==null?$Y:$J[$z]);echo"<td>".($ai?"<textarea name='$u' cols='30' rows='".(substr_count($J[$z],"\n")+1)."'>$qd</textarea>":"<input name='$u' value='$qd' size='$se[$z]'>");}else{$xe=strpos($X,"<i>…</i>");echo"<td id='$u' data-text='".($xe?2:($ai?1:0))."'".($mc?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$K[$Ue]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($K||$E){$Ac=true;if($_GET["page"]!="last"){if($_==""||(count($K)<$_&&($K||!$E)))$fd=($E?$E*$_:0)+count($K);elseif($y!="sql"||!$Wd){$fd=($Wd?false:found_rows($R,$Z));if($fd<max(1e4,2*($E+1)*$_))$fd=reset(slow_query(count_rows($a,$Z,$Wd,$ld)));else$Ac=false;}}$Jf=($_!=""&&($fd===false||$fd>$_||$E));if($Jf){echo(($fd===false?count($K)+1:$fd-$E*$_)>$_?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$_).", '".'Loading'."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Jf){$Ee=($fd===false?$E+(count($K)>=$_?2:1):floor(($fd-1)/$_));echo"<fieldset>";if($y!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" …":"");for($t=max(1,$E-4);$t<min($Ee,$E+5);$t++)echo
pagination($t,$E);if($Ee>0){echo($E+5<$Ee?" …":""),($Ac&&$fd!==false?pagination($Ee,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ee'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$E).($E>1?" …":""),($E?pagination($E,$E):""),($Ee>$E?pagination($E+1,$E).($Ee>$E+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$ac=($Ac?"":"~ ").$fd;echo
checkbox("all",1,0,($fd!==false?($Ac?"":"~ ").lang(array('%d row','%d rows'),$fd):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ac' : checked); selectCount('selected2', this.checked || !checked ? '$ac' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$dd=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($dd['sql']);break;}}if($dd){print_fieldset("export",'Export'." <span id='selected2'></span>");$Hf=$b->dumpOutput();echo($Hf?html_select("output",$Hf,$ya["output"])." ":""),html_select("format",$dd,$ya["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($rc,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$mi'>\n","</form>\n",(!$ld&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$Ch=isset($_GET["status"]);page_header($Ch?'Status':'Variables');$Ti=($Ch?show_status():show_variables());if(!$Ti)echo"<p class='message'>".'No rows.'."\n";else{echo"<table cellspacing='0'>\n";foreach($Ti
as$z=>$X){echo"<tr>","<th><code class='jush-".$y.($Ch?"status":"set")."'>".h($z)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Kh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$R){json_row("Comment-$C",h($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$z)json_row("$z-$C",h($R[$z]));foreach($Kh+array("Auto_increment"=>0,"Rows"=>0)as$z=>$X){if($R[$z]!=""){$X=format_number($R[$z]);json_row("$z-$C",($z=="Rows"&&$X&&$R["Engine"]==($wh=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Kh[$z]))$Kh[$z]+=($R["Engine"]!="InnoDB"||$z!="Data_free"?$R[$z]:0);}elseif(array_key_exists($z,$R))json_row("$z-$C");}}}foreach($Kh
as$z=>$X)json_row("sum-$z",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Th=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Th&&!$n&&!$_POST["search"]){$H=true;$Je="";if($y=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$Je='Tables have been truncated.';}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Je='Tables have been moved.';}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Je='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$Je='Tables have been dropped.';}elseif($y!="sql"){$H=($y=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Je='Tables have been optimized.';}elseif(!$_POST["tables"])$Je='No tables.';elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$Je.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Je,$H);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'Tables and views'."</h3>\n";$Sh=tables_list();if(!$Sh)echo"<p class='message'>".'No tables.'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'Search data in tables'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".'Search'."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}$bc=doc_link(array('sql'=>'show-table-status.html'));echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.'Table','<td>'.'Engine'.doc_link(array('sql'=>'storage-engines.html')),'<td>'.'Collation'.doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.'Data Length'.$bc,'<td>'.'Index Length'.$bc,'<td>'.'Data Free'.$bc,'<td>'.'Auto Increment'.doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.'Rows'.$bc,(support("comment")?'<td>'.'Comment'.$bc:''),"</thead>\n";$S=0;foreach($Sh
as$C=>$T){$Wi=($T!==null&&!preg_match('~table~i',$T));$u=h("Table-".$C);echo'<tr'.odd().'><td>'.checkbox(($Wi?"views[]":"tables[]"),$C,in_array($C,$Th,true),"","","",$u),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($C)."' title='".'Show structure'."' id='$u'>".h($C).'</a>':h($C));if($Wi){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.'Alter view'.'">'.(preg_match('~materialized~i',$T)?'Materialized view':'View').'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.'Select data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Alter table'),"Index_length"=>array("indexes",'Alter indexes'),"Data_free"=>array("edit",'New item'),"Auto_increment"=>array("auto_increment=1&create",'Alter table'),"Rows"=>array("select",'Select data'),)as$z=>$A){$u=" id='$z-".h($C)."'";echo($A?"<td align='right'>".(support("table")||$z=="Rows"||(support("indexes")&&$z!="Data_length")?"<a href='".h(ME."$A[0]=").urlencode($C)."'$u title='$A[1]'>?</a>":"<span$u>?</span>"):"<td id='$z-".h($C)."'>");}$S++;}echo(support("comment")?"<td id='Comment-".h($C)."'>":"");}echo"<tr><td><th>".sprintf('%d in total',count($Sh)),"<td>".h($y=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$z)echo"<td align='right' id='sum-$z'>";echo"</table>\n","</div>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Qi="<input type='submit' value='".'Vacuum'."'> ".on_help("'VACUUM'");$tf="<input type='submit' name='optimize' value='".'Optimize'."'> ".on_help($y=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>".($y=="sqlite"?$Qi:($y=="pgsql"?$Qi.$tf:($y=="sql"?"<input type='submit' value='".'Analyze'."'> ".on_help("'ANALYZE TABLE'").$tf."<input type='submit' name='check' value='".'Check'."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".'Repair'."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".'Truncate'."'> ".on_help($y=="sqlite"?"'DELETE'":"'TRUNCATE".($y=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".'Drop'."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$y!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".'Move'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."'> ".checkbox("overwrite",1,$_POST["overwrite"],'overwrite'):""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$mi'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.'Create table'."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.'Create view'."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".'Routines'."</h3>\n";$Tg=routines();if($Tg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td></thead>\n";odd('');foreach($Tg
as$J){$C=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Create procedure'.'</a>':'').'<a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".'Sequences'."</h3>\n";$hh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($hh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($hh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".'Create sequence'."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".'User types'."</h3>\n";$Oi=types();if($Oi){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($Oi
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3 id='events'>".'Events'."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?'At given time'."<td>".$J["Execute at"]:'Every'." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.'Alter'.'</a>';}echo"</table>\n";$zc=$g->result("SELECT @@event_scheduler");if($zc&&$zc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($zc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Sh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();