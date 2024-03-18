<?php 
require('./config.php');
ini_set('display_errors', 0);
$id=$_GET['query'];
$mode=$_GET['mode'];
//ストリーム生成モード
if($mode=="stream"){
    $reruas_addr=api_address.'get/?query='.$id;
    //"enc.sh"を実行してffmpegでエンコードする。ffmpegの標準出力は"/dev/null(俗に言うnullデバイス)"に出力させる
    shell_exec("sh ./enc.sh ".$reruas_addr." ".$id.'> /dev/null &');
    //ストリームが再生可能か調べる
    while(true){
        if(file_exists("data/".$id."/stream.mpd")){
            sleep(1);
            echo '{"status":"ok","stream","'.$id.'"}';
            break;
        }
    }
    
}
//ストリーム破棄モード
else if($mode=="kill"){
    shell_exec("sh ./kill.sh ".$id." ".$id);
}

//サムネイル生成モード
else if($mode=="thumbnail"){
    $reruas_addr=api_address.'get/?query='.$id;

    $img = base64_encode(shell_exec("sh ./thumbnail.sh ".$reruas_addr." ".rand(1,30)));
    $decode_data = base64_decode($img);
    echo $decode_data;
}
?>
