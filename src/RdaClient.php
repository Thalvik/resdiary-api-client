<?php 

namespace Thalvik\ResDiaryApiClient;
 
class RdaClient {

	private $accessToken = '';
	private $client;

	public function __construct($params = []) {
    	$this->base_uri = $params['api_url'];
    	$this->username = $params['username'];
    	$this->password = $params['password'];
    	$this->setClient();
    }
 
	public function getAccessToken() {
    	return $this->accessToken;
    }

    public function setAccessToken($token) {

    	if ($this->base_uri == '' or $this->username == '' or $this->password == '') {
    		throw new Exception('You must setup parameters', 1);
    		return false;
    	}

    	if ($token) {
    		$this->accessToken = $token;
    		return $this->accessToken;
    	}

		try {

		    $response = $this->getClient()->request('POST', 'Jwt/Token',[
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
			error_log($e->getMessage());
			return false;
		} catch (RequestException $e) {
			if ($e->hasResponse()) {
				if ($e->getResponse()->getStatusCode() == 401) {
					echo json_decode($e->getResponse()->getBody())->Message;
				}

				error_log(Psr7\str($e->getResponse()));
			}
		    return false;
		}
	}

    public function getClient() {
		return $this->client;
	}

	public function setClient() {
		$this->client = new \GuzzleHttp\Client([
		    'base_uri' => $this->base_uri,
		    'timeout'  => 2.0,
		]);
		return $this->client;
	}

    public function getService($serviceName = '') {

    	$service = $serviceName . '.php';
    	require_once dirname( __FILE__ ) . '/Consumer/'.$service;
    	
        return new $serviceName($this);
    }
 
}