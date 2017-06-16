<?php

use PHPUnit\Framework\TestCase;

class SomeClass
{
    public function doSomething()
    {
        throw new Exception;
    }    
}    

class StubTest extends TestCase
{
    public function testThrowExceptionStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->throwException(new Exception));

        $this->expectException('Exception');
        // $stub->doSomething() throws Exception
        $stub->doSomething();
    }
}