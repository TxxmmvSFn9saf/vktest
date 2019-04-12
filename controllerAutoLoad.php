<?php

spl_autoload_register (function ($className){
    $fileName='/var/www/production/vkpc/module/Vk/src/'.$className.'.php';
    if(file_exists ($fileName)) {
        include_once ($fileName);
    }
});

