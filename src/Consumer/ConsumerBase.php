<?php

/**
 * Consumer base class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class ConsumerBase {

	/**
	 * Instance of RdaClient
	 *
	 * @access   private
	 * @var      object    $parentObject    Instance of RdaClient
	 */
	private $parentObject;

	/**
	 * Restaurant name
	 *
	 * @access   private
	 * @var      string    $microSiteName    Restaurant name
	 */
	private $microSiteName;


	/**
	 * Booking reference
	 *
	 * @access   private
	 * @var      string    $bookingReference    Booking reference
	 */
	private $bookingReference;


	/**
	 * Campaign name
	 *
	 * @access   private
	 * @var      string    $campaignName    Campaign name
	 */
	private $campaignName;


	/**
	 * Customer ID
	 *
	 * @access   private
	 * @var      integer    $customerId    Customer ID
	 */
	private $customerId;
	

	/**
	 * Initialize the class and set its properties
	 *
	 * @param    object    $parentObject       Instance of RdaClient
	 */
    public function __construct($parentObject) {
        $this->parentObject = $parentObject;
    }

    /**
	 * Returns the restaurant name
	 *
	 * @return    string    Restaurant name
	 */
    public function getParentObject() {
    	return $this->parentObject;
    }


    /**
	 * Sets restaurant name
	 *
	 * @param    string    $microSiteName       Name of the restaurant
	 * @return   object    Instance of ConsumerBase
	 */
    public function setMicroSiteName($microSiteName) {
    	$this->microSiteName = $microSiteName;
    	return $this;
    }


    /**
	 * Returns the restaurant name
	 *
	 * @return    string    Restaurant name
	 */
    public function getMicroSiteName() {
    	return $this->microSiteName;
    }



    /**
	 * Sets booking reference
	 *
	 * @param    string    $bookingReference      The booking reference
	 * @return   object    Instance of ConsumerBase
	 */
    public function setBookingReference($bookingReference) {
    	$this->bookingReference = $bookingReference;
    	return $this;
    }


    /**
	 * Returns the booking reference
	 *
	 * @return    string    Booking reference
	 */
    public function getBookingReference() {
    	return $this->bookingReference;
    }



    /**
	 * Sets campaign name
	 *
	 * @param    string    $campaignName      The campaign name
	 * @return   object    Instance of ConsumerBase
	 */
    public function setCampaignName($campaignName) {
    	$this->campaignName = $campaignName;
    	return $this;
    }


    /**
	 * Returns the campaign name
	 *
	 * @return    string    Campaign name
	 */
    public function getCampaignName() {
    	return $this->campaignName;
    }



    /**
	 * Sets Customer ID
	 *
	 * @param    integer   $customerId      The Customer ID
	 * @return   object    Instance of ConsumerBase
	 */
    public function setCustomerId($customerId) {
    	$this->customerId = $customerId;
    	return $this;
    }


    /**
	 * Returns the Customer ID
	 *
	 * @return    integer    The Customer ID
	 */
    public function getCustomerId() {
    	return $this->customerId;
    }
}
