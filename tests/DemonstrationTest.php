<?php

namespace Phunctional\Tests\Option;

use Phunctional\Option\{Some, None};

class DemonstrationTest extends \PHPUnit_Framework_TestCase
{
    public function testChain()
    {
        $option = new Some(1);

        $multiplyByTwo = function ($i) { return new Some($i * 2); };
        $multiplyByThree = function ($i) { return new Some($i * 3); };
        $assertValue = function ($i) {
            $this->assertSame(1 * 2 * 3, $i);
            return new Some($i);
        };
        $returnNone = function () { return new None(); };
        $thisNeverRuns = function () { throw new \Exception; };

        $option
            ->flatMap($multiplyByTwo)
            ->flatMap($multiplyByThree)
            ->flatMap($assertValue)
            ->flatMap($returnNone)
            ->flatMap($thisNeverRuns);
    }
}
