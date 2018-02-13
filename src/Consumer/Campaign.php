<?php

/**
 * Campaign class
 *
 * @author     Aleksandar Andrijevic <yu1nis@gmail.com>
 * @package    Thalvik/ResDiaryApiClient
 */

namespace Thalvik\ResDiaryApiClient\Consumer;

use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Thalvik\ResDiaryApiClient\Consumer\ConsumerBase;

class Campaign extends ConsumerBase {

    /**
	 * Gets the campaign with the specified name. See Consumer API -> Campaign -> Get Campaign
	 *
	 */
    public function getCampaign() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Campaign/' . $this->getCampaignName(),[
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
	 * Gets a list of campaigns. See Consumer API -> Campaign -> Get Campaigns
	 *
	 */
    public function getCampaigns() {

    	try {
    		$rdaClient = parent::getParentObject();
    		$rdaClient->setHeaders();
		    $response = $rdaClient->getClient()->request('GET', 'api/ConsumerApi/v1/Campaigns',[
		        'headers' => $rdaClient->getHeaders()
		    ]);

		    return GuzzleHttp\json_decode($response->getBody());
		} catch (RequestException $e) {
			return $rdaClient->handleException($e);
		} catch (ClientException $e) {
			return $rdaClient->handleException($e);
		}
    }
}
