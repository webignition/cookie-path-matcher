<?php

namespace webignition\Tests\Cookie\PathMatcher;

/**
 * Tests against the following aspects of RFC6265:
 * 
 *  o  The cookie-path is a prefix of the request-path, and the last
 *     character of the cookie-path is %x2F ("/").
 *
 *  o  The cookie-path is a prefix of the request-path, and the first
 *     character of the request-path that is not included in the cookie-
 *     path is a %x2F ("/") character.
 */
class CookiePathIsPrefixOfRequestPathTest extends BaseTest {    
    
    public function testIsPrefixAndLastCharacterofCookiePathIsSlash() {
        $this->assertTrue($this->getMatcher()->isMatch('/foo/' ,'/foo/bar'));
    }
    
    public function testIsPrefixAndLastCharacterofRequestPathNotMatchesIsSlash() {
        $this->assertTrue($this->getMatcher()->isMatch('/foo' ,'/foo/bar'));
    } 
    
}