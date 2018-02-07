<?php
 
use Thalvik\ResDiaryApiClient\RdaClient;
 
class RdaClientTest extends PHPUnit_Framework_TestCase {
 
  public function testgetAccessToken(){
    $rdaClient = new RdaClient;
    $this->assertEmpty($rdaClient->getAccessToken());
  }

  public function testgetClient(){
    $rdaClient = new RdaClient;
    $this->assertEmpty($rdaClient->getClient());
  }
 
}