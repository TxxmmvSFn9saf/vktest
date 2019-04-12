<?php
$contents = file_get_contents ( 'php://stdin' );
$path=getopt(null, ['dir::']);
$fileName = date ( 'd.m.Y-H.i.s' ) . '.txt';
file_put_contents ( $path['dir'] . $fileName , $contents );

