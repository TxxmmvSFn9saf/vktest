<?php
namespace magicConstantsNameSpace;
//__LINE__
echo __LINE__.'<br>';

//__FILE__
echo __FILE__.'<br>';

//__DIR__
echo __DIR__.'<br>';

//__FUNCTION__
function fun(){
    echo __FUNCTION__.'<br>';
}
fun ();

//__CLASS__ & __METHOD__
class magicClass{
    //__CLASS__
    function testMagicClassFunc(){
        echo __CLASS__.'<br>';
    }

    //__METHOD__
    function magicMethod(){
        echo __METHOD__.'<br>';
    }
    //using trait
    use magicTrait;
}
$testMagicClassFunc=new magicClass();
$testMagicClassFunc->testMagicClassFunc ();

//__TRAIT__
trait magicTrait{
    function magicTrait(){
        echo __TRAIT__.'<br>';
    }
}
$testMagicClassFunc->magicTrait ();
$testMagicClassFunc->magicMethod ();

//_NAMESPACE__
echo __NAMESPACE__.'<br>';

//ClassName::class
echo magicClass::class;
