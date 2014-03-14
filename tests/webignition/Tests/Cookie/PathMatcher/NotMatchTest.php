<?php

namespace webignition\Tests\Cookie\PathMatcher;

class NotMatchTests extends BaseTest {
    
    public function testCookiePathIsLongerThanRequestPath() {
        $this->assertFalse($this->getMatcher()->isMatch('/foo' ,'/'));
    }
    
    public function testCookiePathIsNotPrefixOfRequestPath() {
        $this->assertFalse($this->getMatcher()->isMatch('/bar' ,'/foo/bar'));
    } 
    
    public function testCookiePathIsPrefixAndLastCharacterOfCookiePathIsNotSlashAndFirstNonIncludedCharacterOfRequestPathIsNotSlash() {
        $this->assertFalse($this->getMatcher()->isMatch('/foo' ,'/foobar'));
    }   
    
}