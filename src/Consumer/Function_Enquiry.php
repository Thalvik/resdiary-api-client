<?php

/**
 * Function Enquiry class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Function_Enquiry extends ConsumerBase {

    /**
	 * Accepts a function enquiry, causing it to be converted to a booking. See Consumer API -> Function Enquiry -> Accept
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function accept($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Function/' . $this->getBookingReference() . '/Accept',[
		        'headers' => $rdaClient->getHeaders(),
		        'json' => $params
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }


    /**
	 * Cancels an existing function enquiry. See Consumer API -> Function Enquiry -> Cancel
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function cancel() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('DELETE', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Function/' . $this->getBookingReference(),[
		        'headers' => $rdaClient->getHeaders()
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }



    /**
	 * Creates a new function enquiry. See Consumer API -> Function Enquiry -> Create
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function create($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Function',[
		        'headers' => $rdaClient->getHeaders(),
		        'json' => $params
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }



    /**
	 * Gets a function enquiry by it's reference. See Consumer API -> Function Enquiry -> Get
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function get() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Function/' . $this->getBookingReference(),[
		        'headers' => $rdaClient->getHeaders()
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }



    /**
	 * Searches for availability for function bookings. See Consumer API -> Function Enquiry -> Search
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function search($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Function/Search',[
		        'headers' => $rdaClient->getHeaders(),
		        'json' => $params
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }


    /**
	 * Updates an existing function enquiry. See Consumer API -> Function Enquiry -> Update
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function update($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('PUT', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Function/' . $this->getBookingReference(),[
		        'headers' => $rdaClient->getHeaders(),
		        'json' => $params
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }

}
