<?php

namespace webignition\Tests\Cookie\PathMatcher;

use webignition\Cookie\PathMatcher\PathMatcher;

abstract class BaseTest extends \PHPUnit_Framework_TestCase {
    
    /**
     * 
     * @return \webignition\Cookie\PathMatcher\PathMatcher
     */
    protected function getMatcher() {
        return new PathMatcher();
    }
    
}