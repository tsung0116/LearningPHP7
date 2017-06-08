<?php
/**
* It is always good to avoid directly using the information that comes from the user, 
* without filtering, as the user could send malicious code.
*/

namespace Bookstore\Core;

class FilteredMap 
{
    private $map;

    public function __construct(array $baseMap) 
    {
        $this->map = $baseMap;
    }

    public function has(string $name): bool 
    {
        return isset($this->map[$name]);
    }

    public function get(string $name) 
    {
        return $this->map[$name] ?? null;
    }

    public function getInt(string $name) 
    {
        return (int) $this->get($name);
    }

    public function getNumber(string $name) 
    {
        return (float) $this->get($name);
    }

    public function getString(string $name, bool $filter = true) 
    {
        $value = (string) $this->get($name);
        // The addSlashed method adds slashes to some of the suspicious characters, 
        // such as slashes or quotes, trying to prevent malicious code with it.
        return $filter ? addslashes($value) : $value;
    }
}    