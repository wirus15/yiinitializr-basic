<?php

/**
 * @author Maciej Krawczyk <wirus15@gmail.com>
 */
class HttpRequest extends CHttpRequest
{
    private $_baseUrl;
    
    public function getBaseUrl($absolute=false)
    {
	if($this->_baseUrl===null)
	    $this->_baseUrl=rtrim(dirname(dirname($this->getScriptUrl())),'\\/');
	return $absolute ? $this->getHostInfo() . $this->_baseUrl : $this->_baseUrl;
    }
    
    public function setBaseUrl($baseUrl)
    {
	$this->_baseUrl = $baseUrl;
    }
}