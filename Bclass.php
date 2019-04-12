<?php
class db{
    public function  connection(){
$db=mysqli_connect ("127.0.0.1:3306","root","","test");
        if(mysqli_connect_error ()){
            echo 'Failed'.mysqli_connect_error();
        }
}
//    public function t($name){
//        $this->connection ();
//        $query="INSERT INTO test VALUES (?)";
//        $result=db::query($query,$name);
//    }
//    public function t($name,$age){
//        $this->connection ();
//        $query="SELECT * FROM test WHERE id=? AND name=?";
//        $result=db::query($query,$param1);
//    }
//function  __construct ()
//{
//
//    $i = func_num_args();
//
//    switch ($i){
//        case 1:
//                public function t($name){
//        $this->connection ();
//        $query="INSERT INTO test VALUES (?)";
//        db::query($query,$name);
//    }
//            break;
//        case 2:
//            public function t($name,$age){
//            $this->connection ();
//            $query="INSERT INTO test VALUES (?,?)";
//            db::query($query,$name,$age);
//        }
//            break;
//        case 3:
//            public function t($name,$age,$job){
//            $this->connection ();
//            $query="INSERT INTO test VALUES (?,?,?)";
//            db::query($query,$name,$age,$job);
//        }
//            break;
//    }
//}
//}
//<?php
//class db{
//
//
//    public static function t(){
//        $count=func_num_args ();
//        $connection=mysqli_connect ("127.0.0.1:3307","root","","test");
//        if(mysqli_connect_error ()){
//            echo 'Failed'.mysqli_connect_error();
//        }
//        if ($count==1){
//            $query="INSERT INTO name (name) VALUES (?)";
//            $connection->query ($query,func_get_arg(0));
//        }elseif($count==2){
//            $query="INSERT INTO name (name,age) VALUES (?,?)";
//            $connection->query ($query,func_get_arg(0),func_get_arg (1));
//        }
//    }
//}
//db::t (fetch())
?>
<style>
article {
  counter-reset: footnotes; /* создать счётчик */
}
[id^="ref"] {
  counter-increment: footnotes; /* указать, что каждая ссылка, чей id начинается "ref", прибавляет к счётчику единицу */
  text-decoration: none; /* убрать подчёркивание */
}
[id^="ref"]:after {
  content: '[' counter(footnotes) ']'; /* показать цифру на счётчике в скобках */
  vertical-align: super; /* поместить на линию верхнего индекса */
  font-size: 60%; /* уменьшить шрифт цифры */
  margin-left: .1em;
}
[href^="#ref"] {
  text-decoration: none;
}
[id^="node"]:target,
[id^="ref"]:target { /* изменить фон элемента при переходе к id */
  background: LightBlue;
}
footer {
  border-top: 1px solid silver; /* горизонтальная линия */
  font-size: 80%; /* уменьшить шрифт под горизонтальной линией */
}
</style>

<article>
  <h3>CSS сноски</h3>
  <p>Нумеровать CSS сноски нет необходимости. Это сделано с помощью <a href="#node-1" id="ref-1">нумерованного списка</a> и <a href="#node-2" id="ref-2">CSS счётчика</a>. Также тут использована разметка <a href="#node-3" id="ref-3">HTML5</a>.
  <footer>
    <ol>
      <li id="node-1"><a href="#ref-1">↩</a> Согласно w3.org рядом с пунктом &lt;li&gt;, находящимся внутри списка &lt;ol&gt;, браузер должен проставлять порядковый номер.
      <li id="node-2"><a href="#ref-2">↩</a> CSS счётчик определяет порядковый номер тега внутри указанного родителя, а псевдоэлемент показывает это число.
      <li id="node-3"><a href="#ref-3">↩</a> Тег &lt;footer&gt; может использоваться на странице более одного раза, а &lt;li&gt; может не иметь закрывающегося тега.
    </ol>
  </footer>
</article>
