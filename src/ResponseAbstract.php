<?php

namespace GoGlobal;

use SimpleXMLElement;

abstract class ResponseAbstract extends ServiceBase implements ResponseInterface {

	/** @var RequestInterface */
	protected $_request;
	/** @var SimpleXMLElement */
	protected $_xml;
	/** @var array */
	protected $_data = [];
	/** @var array */
	protected $_allData = [];

	protected function process() {
	}

	public function setRequest(RequestInterface $request) {
		$this->_request = $request;
		$result = $request->getResult();
        $this->_allData = json_decode($result,true);

        //		$this->_xml = new SimpleXMLElement($result);
//		if($this->_xml->Main->Error) {
//			throw new Exception($this->_xml->Main->Error.'<br/>'.PHP_EOL.$this->_xml->Main->DebugError);
//		}
//		$this->_xml = $this->_xml->Main;
//		$this->process();
//        header('Content-type: application/json');
//        echo '<pre>';
//        var_dump($arrayResult);
//        echo '</pre>';
//        exit;
		return $result;
	}

	public function getRequest() {
		return $this->_request;
	}

	public function getData() {
		return $this->_allData;
	}

	public function toString()
	{
		return $this->_xml->asXML();
	}

	public function __toString()
	{
		return $this->toString();
	}

	public function toArray() {
		return $this->getData();
	}

}


