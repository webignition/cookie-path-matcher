<?php

namespace webignition\Cookie\PathMatcher;

/**
 * Implementation of cookie path matching defined in RFC6265:
 * http://tools.ietf.org/html/rfc6265#section-5.1.4
 */
class PathMatcher {
    
    /**
     *
     * @var string
     */
    private $cookiePath;
    
    
    /**
     *
     * @var string
     */
    private $requestPath;
    
    
    /**
     * 
     * @param string $cookiePath
     * @param string $requestPath
     * @return boolean
     */
    public function isMatch($cookiePath, $requestPath) {        
        $this->cookiePath = $this->normaliseInput($cookiePath);
        $this->requestPath = $this->normaliseInput($requestPath);
        
        return $this->isExactMatch() || $this->isCookiePathPrefixOfRequestPath();
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function isExactMatch() {
        return $this->cookiePath == $this->requestPath;
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function isCookiePathPrefixOfRequestPath() {
        if (!$this->isCookiePathPrefix()) {
            return false;
        }
        
        $cookiePathLength = strlen($this->cookiePath);
        
        if (substr($this->cookiePath, $cookiePathLength - 1) == '/') {
            return true;
        }        
        
        if (substr($this->requestPath, $cookiePathLength, 1) == '/') {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function isCookiePathPrefix() {
        $cookiePathLength = strlen($this->cookiePath);
        $requestPathLength = strlen($this->requestPath);
        
        if ($cookiePathLength > $requestPathLength) {
            return false;
        }
        
        return substr($this->requestPath, 0, $cookiePathLength) == $this->cookiePath;
    }
    
   
    /**
     * 
     * @param strings $value
     * @return string
     */
    private function normaliseInput($value) {
        return trim($value);
    }
    
}