<?php

/**
 * Customer class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Customer extends ConsumerBase {

    /**
	 * Bulk Unsubscribe Customers. See Consumer API -> Customer -> Bulk Unsubscribe Customers
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function bulkUnsubscribeCustomers($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Customers/Unsubscribe',[
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
	 * Creates a new customer. See Consumer API -> Customer -> Create Customer
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function bulkUnsubscribeCustomers($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Customer',[
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
	 * Finds the customers that match the specified search parameters. See Consumer API -> Customer -> Find Customers
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function findCustomers($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Customers',[
		        'headers' => $rdaClient->getHeaders(),
		        'query' => $params
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }


    /**
	 * Gets a customer by Id. See Consumer API -> Customer -> Get Customer
	 *
	 */
    public function getCustomer() {

    	try {
    		$rdaClient = parent::getParentObject();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Customer/' . $this->getCustomerId(),[
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
	 * Updates an existing customer. See Consumer API -> Customer -> Update Customer
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function updateCustomer($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
		    $response = $rdaClient->getClient()->request('PUT', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Customer/' . $this->getCustomerId(),[
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
