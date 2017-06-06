<?php
 
class Job
{    
    private $attribute;
     
    public function __construct()
	{         
        $args = func_get_args();
        $num  = func_num_args();
        echo $num . PHP_EOL;
		
        if($num == 1){            
            if(isset($args[0]) and is_array($args[0]) and count($args[0]) > 0){                 
                if(method_exists($this, $func = 'set_attribute')){                     
                    call_user_func_array(array($this, $func), $args);                 
                }             
            }else{                 
                if(method_exists($this, $func = 'set_id')){                     
                    call_user_func_array(array($this, $func), $args);                 
                }             
            }         
        }     
    }
     
    private function set_attribute($row)
	{        
        $this->attribute = $row;     
    }
     
    private function set_id($id)
	{         
        $this->attribute['id'] = $id;     
    }
     
    public function __get($name)
	{         
        return $this->attribute[$name];     
    } 
}
 
/*
陣列代入建構式會執行set_attribute方法,
數字代入建構式會執行set_id方法.
 */
$job = new Job(10);
var_dump($job);
 
$job = new Job(['id' => 11, 'name' => 'Sean']);
var_dump($job);