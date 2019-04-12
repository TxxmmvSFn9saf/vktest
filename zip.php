<?php
$zip = new ZipArchive();
$zipname='backup.zip';
if($zip->open($zipname, ZIPARCHIVE::CREATE)!==TRUE)
{
    $error .= "* Sorry ZIP creation failed at this time";
}
$zip->addFile ('test_miniTasks.php');
$zip->close ();

//while(true){ // запускаем бесконечный цикл
//    sleep(1); // задержка в 1 секунду
//}
