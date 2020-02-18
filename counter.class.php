<?php 

class counter{

    static public $a = 1;

    function geta(){
        global $a;
        $i = $a;
        return $i;
    }

    function increase()
    {
        
        global $a;
        $a++;

    }

    function reset_count(){
        global $a ;
        $a= 1;

    }


}

?>