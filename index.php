<?php 
require('./config.php');
ini_set('display_errors', 0);
$id=$_GET['query'];
$mode=$_GET['mode'];
//ストリーム生成モード
if($mode=="stream"){
    $reruas_addr=api_address.'get/?query='.$id;
    shell_exec("sh ./enc.sh ".$reruas_addr." ".$id);
    $pid=trim($output);
}
//ストリーム破棄モード
else if($mode=="kill"){
    shell_exec("sh ./kill.sh ".$id." ".$id);
}
?>
