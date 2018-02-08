<?php

/**
 * Restaurant class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class Restaurant {

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
	 * Initialize the class and set its properties
	 *
	 * @param    object    $parentObject       Instance of RdaClient
	 */
    public function __construct($parentObject) {
        $this->parentObject = $parentObject;
    }


    /**
	 * Sets restaurant name
	 *
	 * @param    string    $microSiteName       Name of the restaurant
	 * @return   object    Instance of Restaurant
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
	 * Get restaurant setup. See GET api/ConsumerApi/v1/Restaurant/{micrositeName}/Setup in ResDiary docs
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function getSetup($params) {

    	try {
    		$this->parentObject->setHeaders();
		    $response = $this->parentObject->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Setup',[
		        'headers' => $this->parentObject->getHeaders(),
		        'query' => $params
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $this->parentObject->handleException($e);
		} catch (ClientException $e) {
			return $this->parentObject->handleException($e);
		}

    }

    

}
