<?php
//json_encode
$data=Array ( "name" => "artur", "email" => "email@gmail.com" );
$encode=json_encode ($data);
file_put_contents('sample.json',print_r ($encode,true) );

//json_decode
$content=file_get_contents ('sample.json');
$content=json_decode ($content,true);
print_r ($content);