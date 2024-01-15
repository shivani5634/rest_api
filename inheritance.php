<?php
class class1{
    protected function __construct(){
        echo "hello";
        $this->num=1;
    }
    function __destruct(){
        echo "released";
    }
}
class class2 extends class1{
     function __construct(){
         echo "Hello1";
         
         parent::__construct(); 
         echo $this->num=2;
        
         
    }
    function __destruct(){
        echo "released1";
    }
}
class class3 extends class1{
    function __construct(){
        echo "Hello3";  
        parent::__construct(); 
        echo $this->num=3;     
   }
   function __destruct(){
       echo "released3";
   }
}
$obj=new class3();

?>
