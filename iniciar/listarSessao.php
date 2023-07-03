<?php
foreach(glob('c:/sawServerApi/wppconnect-server/userDataDir/*', GLOB_ONLYDIR) as $dir){
    $dir = str_replace('C:/sawServerApi/wppconnect-server/userDataDir/', '', $dir);
    echo 'Sessão: ' . $dir . '<br>';
}
?>