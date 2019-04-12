<meta charset="utf-8">
<?php
////Tutorial-1
//$regexp = "/к[а-яё]т/ui";
//
//$lines = [
//    'рыжий кот',
//    'рыжий крот',
//    'кит и кот'
//];

//foreach ($lines as $line) {
//    echo "Строка: $line\n";
//
//    // сюда будет помещено первое
//    // совпадение с шаблоном
//    $match = [];
//    if (preg_match($regexp, $line, $match)) {
//        echo "+ Найдено слово '{$match[0]}'\n";
//    } else {
//        echo "- Ничего не найдено\n";
//    }
//}

////Tutorial-2
//$text1='89857182454';
//$regexp='/^[8]([0-9]{3})([0-9]{7})$/';
//$matches=array ();
//if(preg_match ($regexp,$text1,$matches) ){
//    echo $matches[1].'-'.$matches[2];
//}else {
//    echo 'Нету такого номера';
//}

////Tutorial-3
//$car='a346gb';
//
//$regexp='/^[a-b]([0-9]{3})([a-z]{2})/u';
//$arr=array ();
//if(preg_match ($regexp,$car,$arr)){
//    echo 'номер-'.$arr[0];
////    echo 'номер-'.$arr[1].$arr[2].$arr[3];
//}else{
//    echo 'неверный номер машины';
//}

////Tutorial-4
//$correctNumbers = [
//    '84951234567',  '+74951234567', '8-495-1-234-567',
//    ' 8 (8122) 56-56-56', '8-911-1234567', '8 (911) 12 345 67',
//    '8-911 12 345 67', '8 (911) - 123 - 45 - 67', '+ 7 999 123 4567',
//    '8 ( 999 ) 1234567', '8 999 123 4567'
//];
//$incorrectNumbers = [
//    '02', '84951234567 позвать люсю', '849512345', '849512345678',
//    '8 (409) 123-123-123', '7900123467', '5005005001', '8888-8888-88',
//    '84951a234567', '8495123456a',
//    '+1 234 5678901', /* неверный код страны */
//    '+8 234 5678901', /* либо 8 либо +7 */
//    '7 234 5678901' /* нет + */
//];
//$arr=array ();
//
//$regexp='/^([7+]{2}|[8])(\d{3})(\d{7})$/u';
//foreach ($correctNumbers as $item){
//
//    $str=preg_replace ("/[-.?!)(,:]/","",$item) ;
//    $explode=explode (" ",$str);
//    $implode=implode ("",$explode);
//    if(preg_match ($regexp,$implode,$arr)){
//        echo 'Номер-'.$item.'<br>';
//    }else{
//        echo 'Неверный Номер'.'<br>';
//    }
//}

////1-задача
//$s = 'levykin.m@vkcomfort.ru';
//$regexp='/[a-zA-z._-]+[@][a-z]+[.][a-z]+/ui';
//$mathces=array ();
//if(preg_match ($regexp,$s,$mathces)){
//    echo 'Верно';
//}else {
//    echo 'неверно';
//}

////2-задача
//$value = '0.212';
//$regexp='/^([0][.])[0-9]+/ui';
//$matches=array ();
//if(preg_match ($regexp,$value,$matches)){
//    echo 'дробное '.$matches[0];
//}else {
//    echo 'целое '.$matches[0];
//}

////3-задача
//$dt = '2018-10-16 wqeww';
//$regexp='/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/ui';
//$matches=array ();
//if(preg_match ($regexp,$dt,$matches)){
//    echo 'Верно';
//}else {
//    echo 'неверно';
//}

////4-задача
//$string='img src="/images/img1.png"';
//$regexp='/(["](.*?)["])/';
//$matches=array ();
//if(preg_match($regexp, $string, $matches)){
//    echo 'src->'.$matches[0];
//}else {
//    echo 'не найдено';
//}

////5-задача
//$string='<img src="/images/img1.png"> text "abc" <img src="/images/img2.png">';
//$regexp='/src="(.*?)"/i';
// preg_match_all ($regexp,$string,$matches);
// foreach ($matches[1] as $val=>$item){
//     echo $matches[1][$val].'<br>';
// }


////6-задача
//$dt = '2018-01-12 12:00:21 text';
//$pattern='/(\d{4})-(\d{2})-(\d{2}) ([1|2]\d):([0-5]\d):([0-5]\d)(.*)/'; //(.*)-
//$replacement='${3}-${2}-${1} ${4}:${5}:${6}';
//echo preg_replace($pattern, $replacement, $dt);

////7-задача
//$dt = '01:53';
//var_dump(preg_replace('/([012345]{1}\d):([012345]\d)/', '$2 $1', $dt));

////8-задача
//$string='<ul class="footer-nav">
//
//			<li><a href="/about/">о нас</a></li>
//
//			<li><a href="/objects/">Объекты</a></li>
//
//			<li><a href="/open_info/">Раскрытие информации</a></li>
//
//			<li><a href="/services/">Услуги</a></li>
//
//			<li><a href="/news/">Новости</a></li>
//
//</ul>';
//$regexp='/href="\D(.*?)\D"/';
//$matches=array ();
//$explode=explode(" ",$string);
// preg_match_all ($regexp,$string,$matches);
// foreach ($matches[1] as $val=>$item){
//     echo $matches[1][$val];
// }

////9-задача(1-Вариант)
//$s = 'abc nbv asd abc';
//$regexp='/(\w{3})/';
//$matches=array ();
//$arr=array ();
//if (preg_match_all ($regexp,$s,$matches)) {
//    foreach ( $matches[ 1 ] as $val => $item ) {
//        if ( array_count_values ( $matches[ 0 ] )[ $item ] >= 2 ) {
//            echo preg_replace ( $regexp , '<b>${1}</b>' , $matches[ 1 ][ $val ] );
//        }
//    }
//}

////9-задача(2-Вариант)
//$s = 'abc nbv asd abc';
//$regexp='/(\w{3})/';
//$matches=array ();
//$arr=array ();
//
//if (preg_match_all ($regexp,$s,$matches)){
//    $values = array_count_values($matches[0]);
//    foreach($values as $val => $count) {
//        if($count > 1) {
//                     echo preg_replace('/' . preg_quote($val) . '/u', "<b>$val</b>", $s);
//        }
//    }
//}

////10-задача
//$string="home.html script.js backend1.php backend2.php";
//$regexp='/(\w+.php)/i';
//$matches=array ();
//
//if(preg_match_all($regexp,$string,$matches)){
//    foreach ($matches[0] as $val => $count){
//                        echo preg_replace ( $regexp , '${1}' , $matches[ 0 ][ $val ] ).'<br>';
//    }
//}
////11-задача(1-Вариант)
//$dir=__DIR__;
//$files = scandir($dir); ////scandir-проходит по все директории
//$regexp='/.*\.(?:php)/i';
//$matches=array ();
//foreach($files as $var=>$count){
//    if(preg_match ($regexp,$files[$var], $matches)){
//        echo $matches[0].'<br>';
//    }
//}

////11-задача(2-Вариант)
//$files=glob ('*.{php}',GLOB_BRACE);
//foreach($files as $var=>$count){
//    echo $files[$var].'<br>';
//}
