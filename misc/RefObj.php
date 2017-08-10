<?php

class Foo 
{
    private static $used = 0;
    private $id;
    
    public function __construct() 
    {        
        $this->id = self::$used++;
    }
    
    public function __destruct() 
    {        
        echo $this->id . ' destroyed.' . PHP_EOL;
    }    
    
    /* public function __clone() 
    {
        $this->id = self::$used++;
    } */
    
    public function getId()
    {
        return $this->id;
    }    
}


$a = new Foo; 
$b = $a;                        // $a and $b are copies of the same identifier
                                // ($a) = ($b) = &lt;id0&gt;
echo $a->getId() . PHP_EOL;     // 0
echo $b->getId() . PHP_EOL;     // 0             
$c =& $a;                       // $a and $c are references
                                // ($a, $c) = ($b) = &lt;id0&gt;
echo $c->getId() . PHP_EOL;     // 0
$a = new Foo;                   // ($a, $c) = &lt;id1&gt;, ($b) = &lt;id0&gt;
echo $a->getId() . PHP_EOL;     // 1
echo $b->getId() . PHP_EOL;     // 0
echo $c->getId() . PHP_EOL;     // 1
unset($a);                      // ($b) = &lt;id0&gt;, ($c) = &lt;id1&gt;, 
$a =& $b;                       // ($a, $b) = &lt;id0&gt;, ($c) = &lt;id1&gt;
echo $a->getId() . PHP_EOL;     // 0
echo $b->getId() . PHP_EOL;     // 0
echo $c->getId() . PHP_EOL;     // 1
$a = NULL;                      // $a and $b now become a reference to NULL. 
                                // 0 destroyed.
unset($c);                      // 1 destroyed.                                
/* $a = clone $c;                  // ($a, $b) = &lt;id2&gt;, ($c) = &lt;id1&gt;
echo $a->getId() . PHP_EOL;     // 2
echo $b->getId() . PHP_EOL;     // 2
echo $c->getId() . PHP_EOL;     // 1
unset($c);                      // 1 destroyed.
$c = $a;                        // ($a, $b, $c) = &lt;id2&gt;
echo $a->getId() . PHP_EOL;     // 2
echo $b->getId() . PHP_EOL;     // 2
echo $c->getId() . PHP_EOL;     // 2 */
echo "Completed.";              // Completed.