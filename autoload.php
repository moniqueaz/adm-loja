<?php

function customAutoload($className){
    $arquivo = strtolower($className);
    if(file_exists($className) . '.php'):
        require_once $className . '.php';
    endif;
}

spl_autoload_register('customAutoload');

?>