<?php

/**
 * Customer Codes class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Customer_Codes extends ConsumerBase {

    /**
	 * Gets the customer codes for the specified restaurant. See Consumer API -> Customer Code -> Get Customer Codes
	 *
	 */
    public function getCustomerCodes() {

    	try {
    		$rdaClient = parent::getParentObject();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/CustomerCodes',[
		        'headers' => $rdaClient->getHeaders()
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }

}
