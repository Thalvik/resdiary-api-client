<?php

/**
 * Main client class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient;

use GuzzleHttp;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
 
class RdaClient {

	/**
	 * Access token
	 *
	 * @access   private
	 * @var      string    $accessToken    Access token
	 */
	private $accessToken = '';

	/**
	 * Client
	 *
	 * @access   private
	 * @var      object    $client    Instance of GuzzleHttp\Client
	 */
	private $client;

	/**
	 * Headers
	 *
	 * @access   protected
	 * @var      array    $headers    Headers for every request
	 */
	protected $headers;


	/**
	 * Errors
	 *
	 * @access   private
	 * @var      array    $errors
	 */
	private $errors;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param    array    $params       Array of credentials
	 */
	public function __construct($params = []) {
		$this->errors = [];
    	$this->base_uri = $params['api_url'];
    	$this->username = $params['username'];
    	$this->password = $params['password'];
    	$this->setClient();
    }
 	
 	/**
	 * Returns the access token
	 *
	 * @return    string    Access token
	 */
	public function getAccessToken() {
    	return $this->accessToken;
    }


    /**
	 * Sets the access token
	 *
	 * @param    string    $token Access token
	 * @return   string|boolean   Will return access token in string if valid. Will return false on failiure
	 */
    public function setAccessToken($token) {

    	if ($this->base_uri == '' or $this->username == '' or $this->password == '') {
    		throw new \Exception('You must setup parameters', 1);
    		return false;
    	}

    	if ($token) {
    		$this->accessToken = $token;
    		return $this->accessToken;
    	}

		try {

		    $response = $this->getClient()->request('POST', 'api/Jwt/Token',[
		        'headers' => [
		            'Content-Type' => 'application/json', 
		            'Accept' => 'application/json'
		        ],
		        'json' => [
		            'Username' => $this->username,
		            'Password' => $this->password
		        ]
		    ]);

		    if ($response->getStatusCode() == 200) {
		    	$this->accessToken = $response->getBody();
		    	$this->accessToken = str_replace('"', '', $this->accessToken);
		    }

		    return $this->accessToken;
		} catch (ConnectException $e) {
			echo $e->getMessage();
			return false;
		} catch (RequestException $e) {
			echo $e->getMessage();
		    return false;
		}
	}


	/**
	 * Returns the client
	 *
	 * @return    object    Instance of GuzzleHttp\Client
	 */
    public function getClient() {
		return $this->client;
	}


	/**
	 * Sets the client
	 *
	 * @param    string    $token Access token
	 * @return    object    Current instance of RdaClient
	 */
	public function setClient() {
		$this->client = new GuzzleHttp\Client([
		    'base_uri' => $this->base_uri,
		    'timeout'  => 2.0,
		]);

		return $this;
	}


	/**
	 * Returns the instance of class for ConsumerAPI
	 *
	 * @return    object    Instance of Thalvik\ResDiaryApiClient\Consumer\$serviceName
	 */
    public function getConsumerService($serviceName = '') {

    	$service = $serviceName . '.php';
    	require_once dirname( __FILE__ ) . '/Consumer/' . $service;

    	$serviceClassName = 'Thalvik\ResDiaryApiClient\Consumer\\' . $serviceName;
    	$serviceClass = new $serviceClassName($this);
    	return $serviceClass;
    }


    /**
	 * Returns the instance of class for Data Extract API
	 *
	 * @return    object    Instance of Thalvik\ResDiaryApiClient\DataExtract\$serviceName
	 */
    public function getDataExtractService($serviceName = '') {

    	$service = $serviceName . '.php';
    	require_once dirname( __FILE__ ) . '/DataExtract/' . $service;

    	$serviceClassName = 'Thalvik\ResDiaryApiClient\DataExtract\\' . $serviceName;
    	$serviceClass = new $serviceClassName($this);
    	return $serviceClass;
    }


    /**
	 * Returns message from response if fail
	 *
	 * @return    string    Message from response
	 */
    public function handleException ($exception) {
    	$responseErrors = [];
    	if ($exception->hasResponse()) {
    		$statusCode = $exception->getResponse()->getStatusCode();
    		if ($statusCode == 404) {
    			$this->errors['Message'] = $exception->getResponse()->getReasonPhrase();
    			$this->errors['ValidationErrors'] = [];
    			return;
    		}
	    	$responseObj = GuzzleHttp\json_decode($exception->getResponse()->getBody());
	    	
	    	if (property_exists($responseObj, 'Message')) {
	    		$this->errors['Message'] = $responseObj->Message;
	    	}

	    	if (property_exists($responseObj, 'ValidationErrors')) {
	    		$this->errors['ValidationErrors'] = $responseObj->ValidationErrors;
	    	}
	    }

    }

    /**
	 * Returns errors
	 *
	 * @return    array    array with Message and ValidationErrors
	 */
    public function getErrors () {
    	return $this->errors;
    }

    /**
	 * Check if there are errors in request
	 *
	 * @return    boolean    True on has errors, false if not
	 */
    public function hasErrors (){
    	if (count($this->errors) > 0) {
    		return true;
    	}
    	return false;
    }


    /**
	 * Returns headers
	 *
	 * @return    array    HTTP headers
	 */
    public function getHeaders() {
    	return $this->headers;
    }


    /**
	 * Sets the headers for every request
	 *
	 * @return    object    Current instance of RdaClient
	 */
    public function setHeaders() {
    	$this->headers = [
            'Content-Type' => 'application/json', 
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken()
        ];

    	return $this;
    }
 
}