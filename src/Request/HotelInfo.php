<?php

namespace GoGlobal\Request;

use GoGlobal\Helper;
use GoGlobal\RequestAbstract;
use GoGlobal\RequestInterface;

class HotelInfo extends RequestAbstract implements RequestInterface
{
	protected $_hotelSearchCode;
    protected $_hotelId;
    protected $_language = "hu";

	static function getOperation() {
		return 'HOTEL_INFO_REQUEST';
	}

	static function getRequestType() {
		return 6;
	}

	public function setHotelSearchCode($code) {
		$this->_hotelSearchCode = $code;
		return $this;
	}

	public function getHotelSearchCode() {
		return $this->_hotelSearchCode;
	}


	public function setHotelId($hotelId){
	    $this->_hotelId=$hotelId;
    }

    public function getHotelId(){
        return $this->_hotelId;
    }

    public function setLanguage($language){
        $this->_language=$language;
    }

    public function getLanguage(){
        return $this->_language;
    }

	public function getBody() {
        if($this->getHotelId()){
            $body = Helper::wrapTag('InfoHotelId', $this->getHotelId());
            $body .= Helper::wrapTag('InfoLanguage', $this->getLanguage());
            return $body;
        }
        else
    		return Helper::wrapTag('HotelSearchCode', $this->getHotelSearchCode());
	}

	/**
	 * @return \GoGlobal\Response\HotelInfo
	 */
	public function getResponse() {
		return parent::getResponse();
	}

}