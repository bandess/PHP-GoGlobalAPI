<?php

namespace GoGlobal\Request;

use GoGlobal\Helper;
use GoGlobal\RequestAbstract;
use GoGlobal\RequestInterface;

class BookingStatus extends RequestAbstract implements RequestInterface
{
	protected $_bookingCodes = [];

	static function getOperation() {
		return 'BOOKING_STATUS_REQUEST';
	}

	static function getRequestType() {
		return 5;
	}

	public function addBookingCode($code) {
		if(!is_array($code)) {
			$this->_bookingCodes[] = $code;
		}
		else {
			foreach($code as $c) {
				$this->addBookingCode($c);
			}
		}
		return $this;
	}

	public function getBookingCodes() {
		return $this->_bookingCodes;
	}

	public function getBody() {
		$xml = "";
		foreach($this->getBookingCodes() as $code) {
			$xml .= Helper::wrapTag('GoBookingCode', $code);
		}
		return $xml;
	}

	/**
	 * @return \GoGlobal\Response\BookingStatus
	 */
	public function getResponse() {
		return parent::getResponse();
	}

}
