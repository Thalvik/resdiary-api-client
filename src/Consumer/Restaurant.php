<?php

/**
 * Restaurant class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Restaurant extends ConsumerBase {


	/**
	 * Gets the booking reasons that can be associated with bookings for a specified restaurant. See Consumer API -> Restaurant -> Get Booking Reasons
	 *
	 */
    public function getBookingReasons() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/BookingReasons',[
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
	 * Gets cancellation reasons for this restaurant. See Consumer API -> Restaurant -> Get Booking Reasons
	 *
	 */
    public function getCancellationReasons() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/CancellationReasons',[
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
	 * Retrieves the days of the week and date periods during which the restaurant is closed for online bookings. See Consumer API -> Restaurant -> Get Closed Dates
	 *
	 */
    public function getClosedDates() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/ClosedDates',[
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
	 * Gets all the values of the cuisine type enum. See Consumer API -> Restaurant -> Get Cuisine Types
	 *
	 */
    public function getCuisineTypes() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/CuisineTypes',[
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
	 * Gets the expert ranking for this restaurant. See Consumer API -> Restaurant -> Get Closed Dates
	 *
	 */
    public function getExpertRankingForProvider() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Ranking',[
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
	 * Gets the microsite names of the restaurants that you have access to, and that have microsites on the resdiary.com booking portal. 
	 * See Consumer API -> Restaurant -> Get Microsites
	 *
	 */
    public function getMicrosites() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Microsites',[
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
	 * Gets information about the restaurant with the specified microsite name. See Consumer API -> Restaurant -> Get Restaurant
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function getRestaurant($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName(),[
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
	 * Gets the storage url of a specified menu. See Consumer API -> Restaurant -> Get Restaurant Menu
	 *
	 */
    public function getRestaurantMenu() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Menu/' . $this->getMenuName(),[
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
	 * Gets the microsite names of the restaurants that you have access to. See Consumer API -> Restaurant -> Get Restaurants
	 *
	 */
    public function getRestaurants() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurants',[
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
	 * Gets the reviews for the restaurant. See Consumer API -> Restaurant -> Get Reviews
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function getReviews($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Reviews',[
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
	 * Get restaurant setup. See Consumer API -> Restaurant -> Get Setup
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function getSetup($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Setup',[
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
	 * Gets a short summary of the restaurant's details. See Consumer API -> Restaurant -> Get Summary
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function getSummary($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Summary',[
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
	 * Gets the widget tracking details for a specified restaurant. See Consumer API -> Restaurant -> Get Widget Tracking Details
	 *
	 */
    public function getWidgetTrackingDetails() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/WidgetTracking',[
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
	 * Gets whether the specified restaurant has a fully populated microsite summary. See Consumer API -> Restaurant -> Has Microsite Summary
	 *
	 */
    public function hasMicrositeSummary() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/HasMicrositeSummary',[
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
	 * Gets microsite summary objects based on the parameters given. See Consumer API -> Restaurant -> Get Summary
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function micrositeSummaryDetails($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/MicrositeSummaryDetails',[
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
	 * Reports an issue with the specified review. See Consumer API -> Restaurant -> Report Review
	 *
	 * @param    array    $params       Arguments for request
	 *
	 */
    public function reportReview($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('POST', 'api/ConsumerApi/v1/Restaurant/' . $this->getMicroSiteName() . '/Reviews/' . $this->getReviewId() . '/Report',[
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
	 * Searches for restaurants near the specified location. See Consumer API -> Restaurant -> Search
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function search($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/Search',[
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
	 * Searches for restaurants near the specified location with availability in the supplied availability window and orders them based on their distance from the location.
	 * See Consumer API -> Restaurant -> Search Availability By Distance
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function searchAvailabilityByDistance($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/SearchAvailabilityByDistance',[
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
	 * Searches for restaurants matching a collection of names. See Consumer API -> Restaurant -> Search Availability By Name
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function searchAvailabilityByName($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/SearchAvailabilityByName',[
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
	 * Searches for restaurants near the specified location and orders them based on their availability. See Consumer API -> Restaurant -> Search By Availability
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function searchByAvailability($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/SearchAvailability',[
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
	 * Searches for restaurants whose name contains the specified text. See Consumer API -> Restaurant -> Search Restaurant Names
	 *
	 * @param    array    $params       Arguments for request
	 */
    public function searchName($params = []) {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/SearchName',[
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
