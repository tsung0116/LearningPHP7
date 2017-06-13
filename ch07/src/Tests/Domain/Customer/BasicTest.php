<?php

namespace Bookstore\Tests\Domain\Customer;

require_once __DIR__ . '/../../../../vendor/autoload.php'; 

use Bookstore\Domain\Customer\Basic;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase 
{
    public function testAmountToBorrow() 
    {
        $customer = new Basic(1, 'han', 'solo', 'han@solo.com');
        $this->assertSame(3, $customer->getAmountToBorrow(), 'Basic customer should borrow up to 3 books.');
    }
}