<?php
 
use Thalvik\ResDiaryApiClient\RdaClient;
 
class RdaClientTest extends PHPUnit_Framework_TestCase {

	public function __construct() {
		$this->base_uri = BASE_URI;
    	$this->username = USERNAME;
    	$this->password = PASSWORD;
	}

	public function testInitClient() {
		$rdaClient = new RDAClient([
			'api_url' => $this->base_uri,
			'username' => $this->username,
			'password' => $this->password
		]);
	}
 
	public function testGetAccessToken(){
		$rdaClient = new RDAClient([
			'api_url' => $this->base_uri,
			'username' => $this->username,
			'password' => $this->password
		]);
		$rdaClient->setAccessToken(false);
		$this->assertNotEmpty($rdaClient->getAccessToken());
	}

	public function testGetClient(){
		$rdaClient = new RDAClient([
			'api_url' => $this->base_uri,
			'username' => $this->username,
			'password' => $this->password
		]);
		$this->assertInstanceOf('GuzzleHttp\Client', $rdaClient->getClient());
	}

	public function testGetRestauranService(){
		$rdaClient = new RDAClient([
			'api_url' => $this->base_uri,
			'username' => $this->username,
			'password' => $this->password
		]);
		$rdaClient->setAccessToken(false);


		$now = new \DateTime();
		$restaurantSetup = $rdaClient->getService('Restaurant') //Service name
		->setMicroSiteName('SomeProvider') //Set microSiteName
		->getSetup([ //Call method
			'date' => $now->format('Y-m-d'),
			'channelCode' => 'ONLINE',
		]);

		$this->assertNotFalse($restaurantSetup);

	}

}