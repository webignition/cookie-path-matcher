<?php

namespace webignition\Tests\Cookie\PathMatcher;

class ExactMatchTest extends BaseTest {
    
    public function testSingleSlashPath() {
        $this->assertTrue($this->getMatcher()->isMatch('/' ,'/'));
    }
    
    public function testMoreFullPath() {
        $this->assertTrue($this->getMatcher()->isMatch('/foo/bar' ,'/foo/bar'));
    }    
    
}