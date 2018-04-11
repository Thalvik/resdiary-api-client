<?php

/**
 * Booking class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Booking extends ConsumerBase {


    /**
	 * Authenticates a diner against a booking by its reference. See Consumer API -> Booking -> Authenticate Booking Diner
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function authenticateBookingDiner($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Booking/' . $this->getBookingReference() . '/Authenticate',[
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
	 * Cancels an existing booking. See Consumer API -> Booking -> Cancel Booking
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function cancelBooking($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Booking/' . $this->getBookingReference() . '/Cancel/',[
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
	 * Attempts to create a new booking. See Consumer API -> Booking -> Create Booking With Stripe Token
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function createBookintStripeToken($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/BookingWithStripeToken/',[
		        'headers' => $rdaClient->getHeaders(),
		        'body' => json_encode($params),
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }


    /**
	 * Finds bookings based on the specified search criteria. See Consumer API -> Booking -> Find Bookings
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function findBookings($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Bookings',[
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
	 * Gets the specified booking by its reference. See Consumer API -> Booking -> Get Booking
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function getBooking($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Booking/' . $this->getBookingReference(),[
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
	 * Updates an existing booking. See Consumer API -> Booking -> Update Booking
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function updateBooking($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('PUT', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Booking/' . $this->getBookingReference(),[
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
	 * Updates an existing booking with function and pre-order URLs. See Consumer API -> Booking -> Update Booking Function Sheet
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function updateBookingFunctionSheet($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('PUT', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Booking/' . $this->getBookingReference() . '/FunctionSheet',[
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
