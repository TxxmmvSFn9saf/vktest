<?php
////первый вариант
//    function __autoload($className){
//        $fileName=$className.'.php';
//        include_once ($fileName);
//    }

////второй вариант
//spl_autoload_register (function ($className1){
//    include_once $className1.'.php';
//});

//третий вариант
function myAutoLoad ( $className )
{
    $fileName = $className . '.php';
    $fileName1 = 'auto/auto2/' . $className . '.php';
    if (file_exists ( $fileName )) {
        include_once ($fileName);
    } elseif (file_exists ( $fileName1 )) {
        include_once ($fileName1);
    }
}

//
spl_autoload_register ( 'myAutoLoad' );

//spl_autoload_register (function ($className){
//    include_once $className'.php';
//});
$obj = new class1();
$obj = new class2();
//    $obj=new class3();
