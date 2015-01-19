<?php
/**
 * Class ImplementationTest.php
 *
 * Description
 *
 * User: Bruno
 * Date: 19.1.2015.
 */

namespace Swader\Diffbot\Test;


use Swader\Diffbot\Implementation;

class ImplementationTest extends \PHPUnit_Framework_TestCase {
    public function testSetTimeout()
    {
        $mock = new Implementation();

        $validTimeouts = [
            0,
            1000,
            2000,
            3000,
            3000000,
            40000000,
            null
        ];

        $invalidTimeouts = [
            -298979879827,
            -4983,
            'abcef',
            '',
            false
        ];

        try {
            $mock->setTimeout();
        } catch (\InvalidArgumentException $e) {
            $this->fail('Failed with supposedly valid (empty) timeout.');
        }

        foreach ($validTimeouts as $timeout) {
            try {
                $mock->setTimeout($timeout);
            } catch (\InvalidArgumentException $e) {
                $this->fail('Failed with supposedly valid timeout: ' . $timeout);
            }
        }

        foreach ($invalidTimeouts as $timeout) {
            try {
                $mock->setTimeout($timeout);
            } catch (\InvalidArgumentException $e) {
                // Got expected exception
                continue;
            }
            $this->fail('Failed, assumed invalid parameter was valid.');
        }
    }

}
