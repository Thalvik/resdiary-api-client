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
}
