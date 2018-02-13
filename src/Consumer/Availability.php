<?php

/**
 * Availability class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Availability extends ConsumerBase {

    /**
	 * Searches for availability. See Consumer API -> Availability -> Availability Search
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function availabilitySearch($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/AvailabilitySearch',[
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
	 * Searches for availability across multiple channel. See Consumer API -> Availability -> Availability Search By Multiple Channels
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function availabilitySearchMultipleChannels($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/AvailabilitySearchByMultipleChannels',[
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
	 * Gets the days that there is availability in the supplied restaurant for the search criteria. 
	 * See Consumer API -> Availability -> Get Available Days For Provider
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function getAvailableDaysProvider($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/AvailableDays',[
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
}
