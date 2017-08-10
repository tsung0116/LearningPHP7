<?php

class Person 
{
    private static $used = 0;
    private $id;
    private $gid;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->id = self::$used++;
        // $this->uid =& $this->id;
    }

    public function __destruct() 
    {        
        echo $this->id . ' destroyed.' . PHP_EOL;
    }  

    public function __clone() 
    {
        $this->id = self::$used++;
    }

    /*
    public function __toString()
    {
        return "Hello";
    }
    */

    public function setName($name) 
    {
        $this->name = $name;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setGid(&$id)
    {
        $this->gid = $id;
    }

    public function getGid()
    {
        return $this->gid;
    }

    public function getId()
    {
        return $this->id;
    }  
}

class WorkingGroup 
{
    private $leader;

    public function __clone() 
    {
        foreach($this as $key => $val) {
            echo "Key: " . $key . PHP_EOL;
            //echo "val: " . $val . PHP_EOL;            
            //var_dump($key);
            echo "val is obj: " . is_object($val) . ", is array: " . is_array($val) . PHP_EOL;
            // var_dump($val);
            if (is_object($val) || (is_array($val))) {
                $this->{$key} = unserialize(serialize($val));
            }
        }
    }

    /*
    public function __clone()
    {
        $this->leader = clone $this->leader;
    }
    */
    
    public function setLeader($leader) 
    {
        $this->leader = $leader;
    }

    public function getLeader() 
    {
        return $this->leader;
    }
}

/*
$jacob = new Person("Jacob");
$project_one = new Project();
$project_one->setLeadDeveloper($jacob);
$project_two = clone $project_one;

$matthew = new Person("Matthew");
$project_two->setLeadDeveloper($matthew);

print $project_one->getLeadDeveloper()->getName(); // Outputs "Jacob" 
*/

$jeff = new Person("Jeff Lamb");
$wg1 = new WorkingGroup();
$wg1->setLeader($jeff);
$wg2 = clone $wg1;
// echo $wg1->getLeader()->getId() . PHP_EOL; // 0
// echo $wg2->getLeader()->getId() . PHP_EOL; // 0
$gid = 100;
$wg2->getLeader()->setGid($gid);
echo $wg1->getLeader()->getGid() . PHP_EOL; // 
echo $wg2->getLeader()->getGid() . PHP_EOL; // 100
echo $wg1->getLeader()->getId() . PHP_EOL;  // 0
echo $wg2->getLeader()->getId() . PHP_EOL;  // 1
$jeff = null; 
$wg1->setLeader(null);     // 0 destroyed.
$wg2->setLeader(null);     // 1 destroyed.
// echo $wg1->getLeader()->getName() . PHP_EOL; // 
// echo $wg2->getLeader()->getName() . PHP_EOL; // 
// $wg2->getLeader()->setName("Mary Jones");

echo "Completed.";         // Completed.
// print $project_one->getLeadDeveloper()->getName(); // Outputs "Matthew"