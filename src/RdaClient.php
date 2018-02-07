<?php 

namespace Thalvik\ResDiaryApiClient;
 
class RdaClient {

	private $accessToken = '';
	private $client;
 
	public function getAccessToken() {
    	return $this->accessToken;
    }

    public function getClient() {
		return $this->client;
	}
 
}