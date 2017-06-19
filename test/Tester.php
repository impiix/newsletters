<?php

namespace Test;

class Tester
{
    public function assertEquals($expected, $passed)
    {
        if ($expected != $passed) {
            echo sprintf("Incorrectly asserted that '%s' equals '%s'.\n", $expected, $passed);
        } else {
            echo ".";
        }
    }
}
