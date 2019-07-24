<?php

namespace GoGlobal\Request;

use GoGlobal\Helper;
use GoGlobal\RequestAbstract;
use GoGlobal\RequestInterface;

class PriceBreakdown extends RequestAbstract implements RequestInterface
{
	// @TODO implement

    protected $_hotelSearchCode;

    public function setHotelSearchCode($hotelSearchCode){
        $this->_hotelSearchCode = $hotelSearchCode;
        return $this;
    }

    public function getHotelSearchCode(){
        return $this->_hotelSearchCode;
    }

	static function getOperation() {
		return 'PRICE_BREAKDOWN_REQUEST';
	}

	static function getRequestType() {
		return 14;
	}

	public function getBody() {
        $xml = '';
        $xml.= Helper::wrapTag('HotelSearchCode', $this->getHotelSearchCode());
        return $xml;
	}

    /**
     * @return \GoGlobal\Response\VoucherDetails
     */
    public function getResponse() {
        return parent::getResponse();
    }

}