<?php
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class Restaurant {

	public $parentObject;
	private $microSiteName;

    public function __construct($parentObject) {
        $this->parentObject = $parentObject;
    }

    public function setMicroSiteName($microSiteName) {
    	$this->microSiteName = $microSiteName;
    	return $this;
    }

    public function getSetup($params) {

    	try {
		    $response = $this->parentObject->getClient()->request('GET', 'api/ConsumerApi/v1/Restaurant/' . $this->microSiteName . '/Setup',[
		        'headers' => [
		            'Content-Type' => 'application/json', 
		            'Accept' => 'application/json',
		            'Authorization' => 'Bearer ' . $this->parentObject->getAccessToken()
		        ],
		        'query' => $params
		    ]);

		    return $response->getBody();
		} catch (RequestException $e) {
			if ($e->hasResponse()) {
				if ($e->getResponse()->getStatusCode() == 400) {
					return json_decode($e->getResponse()->getBody())->Message;
				}

				if ($e->getResponse()->getStatusCode() == 404) {
					return json_decode($e->getResponse()->getBody())->Message;
				}

				error_log(Psr7\str($e->getResponse()));
			}
		    return false;
		}

    }

}
