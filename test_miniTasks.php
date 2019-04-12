
<?php
//$title = 'Объект "Алексеево"';
//?>
<!--<meta charset="utf-8">-->
<!--<a href="" title="--><?php //echo htmlspecialchars($title);?><!--">test</a>-->

<?php
////1-вызов собственного класса при наследовании
//class a{
//    public  function b(){
//        echo get_called_class ();
////        echo __CLASS__;
//    }
//
//}
//class c extends a{
//
//}
//$c=new c();
//$c->b ();

////2-добавление к началу или к концу символов(
//echo str_pad (914,10,0,STR_PAD_LEFT);
//echo sprintf("%013d", 914);

////3-плавающяя точка
//echo str_pad($num, 2,0); ////1-вариант
//echo sprintf("%.2f", '210.000'); //2-вариант

////4-дерево файлов
//function tree ($directory,$sub)
//{
//    $files = scandir ( $directory );
//    foreach ( $files as $file ) {
//        if ( $file == '.' || $file == '..' )
//            continue;
//        if ( is_dir ( "$directory/$file" ) ) {
//            echo $sub.$file . "<br />";
//            tree ( "$directory/$file" ,$sub.'-');
//        } else
//            echo $sub.$file . "<br />";
//    }
//}
//tree ( __DIR__ ,null);

////fibonachi
//function fib($val){
//    $i=$res = 0;
//    $j = 1;
//    for ($k = 1; $k < $val; $k++) {
//        $res = $i + $j;
//        $i = $j;
//        $j = $res;
//        echo $res.'-';
//    }
//}
//fib (10);

////fibonachi-recursive
//function fib($val){
//        if ($val < 2) {
//            return $val;
//        }
//        return (fib($val - 1) + fib($val - 2));
//}
//$loop=10;
//for ($k = 0; $k <$loop; $k++) {
//   echo fib ($k).'-';
//}

////Записать Массив в Файл
//$array= array('a' => 1, 'b' => 2,'c' => 3);
//$var = var_export($array, true);
/*file_put_contents('text.txt', "<?php return $var ?>");*/
echo 'hello' > test
?>
<!-- Имеем форму с GET и POST запросом на handler.php какое значение вернет форма? -->
<!--<form method="post" action="/handler.php?id=1">-->
<!--    <input type="hidden" value="2" name="id">--><!--форма вернет "2" в соответсвии с приоритетом GET POST COOKIE SESSION -->
<!--    <input type="submit">-->
<!--</form>-->



<!--DbGateway::fetch($sql, $param1, $param2);-->
<!--DbGateway::fetch($sql, $param1, $param2, $param3);-->
<!--DbGateway::fetch($sql, $param1, $param2, $param4, $param5);-->
<?php
//class db{
//
//
//    public static function fetch(){
//        $count=func_num_args ();
//        $connection=mysqli_connect ("127.0.0.1:3306","root","","test");
//        if(mysqli_connect_error ()){
//            echo 'Failed'.mysqli_connect_error();
//        }
//        if ($count==1){
//            $var1=func_get_arg(0);
//           $connection->query ("INSERT INTO units (name) VALUES ('$var1')");
//        }elseif($count==2){
//            $var1=func_get_arg(0);
//            $var2=func_get_arg(1);
//            $connection->query ("INSERT INTO units (name,age) VALUES ('$var1','$var2')");
//        }
//    }
//}
//db::fetch ('name1',1);
//?>
<!---->


<?php
//$spl = new SplObjectStorage ();
//$keyForA = new StdClass();
//$keyForB = new StdClass();
//$spl[$keyForA] = 'value a';
//$spl[$keyForB] = 'value b';
//foreach ($spl as $key => $value)
//{
//    // $key is NOT an object, $value is!
//    // Must use standard array access to get strings.
//    echo $spl[$value] . "\n"; // prints "value a", then "value b"
//}
//// it may be clearer to use this form of foreach:
//foreach ($spl as $key)
//{
//    // $key is an object.
//    // Use standard array access to get values.
//    echo $spl[$key] . "\n"; // prints "value a", then "value b"
//}
//?>

<?php
//задача
//ссылка
function test(& $a, $b)
{
    $a++;
    $b++;
}

$a = 100;
$b = 200;

test($a, $b);

echo $a; // we changed $a: 101
echo $b; // still 200