<?php

$json = trim(file_get_contents('php://input'));


$produto = json_decode($json);

$fp = fopen('requestlog.txt','a');
fwrite($fp, $json);
fclose($fp);