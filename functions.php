<?php
function displayKey($key){
    printf("value='%s'", $key);
}
function scremblerf($originalData, $key){
    $data='';
    $normakKey='abcdefghijklmnopqrstuvwxyz0123456789';
    $len=strlen($originalData);
    for($i=0; $i<$len; $i++){
        $currentChar=$originalData[$i];
        $position=strpos($normakKey,$currentChar);
        if($position !== false){
            $data .= $key[$position];
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}

function decodeData($originalData, $key){
    $data='';
    $normakKey='abcdefghijklmnopqrstuvwxyz0123456789';
    $len=strlen($originalData);
    for($i=0; $i<$len; $i++){
        $currentChar=$originalData[$i];
        $position=strpos($key,$currentChar);
        if($position !== false){
            $data .= $normakKey[$position];
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}