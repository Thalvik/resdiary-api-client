PHP client for ResDiary API
========

This is an unoffical PHP client for ResDiary API. It includes basic HTTP client, which is a simple
HTTP wrapper around Guzzle HTTP client library. It then communicates with ResDiary API by calling 
available endpoints. Check the ResDiary API documentation for available API calls.

Currently the only endpoint is `Setup` on `Restaurant` service, but the rest will be added in
the future.

Basic usage
------------------------

```php
use Thalvik\ResDiaryApiClient\RdaClient;

$rdaClient = new RDAClient([
	'api_url' => 'https://thegreatapi.com/', //Change this to value given by ResDiary
	'username' => 'someusername', //Change this to value given by ResDiary
	'password' => 'somepassword' //Change this to value given by ResDiary
]);
```

Since token is lasting 24 hours, you want to check if you havent already saved token, for example in database

```php
$tokenSaved = someFunctionToRetrieveSaved24hToken('YOUR_RESDIARY_TOKEN_NAME');
```

You then call `setAccessToken()` on a client, which if token has expired, will set new token and retrieve it
```php
$tokenClient = $rdaClient->setAccessToken($tokenSaved);
```

You can then check if token has changed, you set new one for next 24 hours
```php
if ($tokenClient != $tokenSaved) {
	someFunctionToSave24hToken( 'YOUR_RESDIARY_TOKEN_NAME', $tokenClient);
}
```
You can then use client to call methods on available services
```php

$now = new \DateTime();

$rdaClient->getService('Restaurant') //Service name
->setMicroSiteName('SomeProvider') //Set microSiteName
->getSetup([ //Call method
	'date' => $now->format('Y-m-d'),
	'channelCode' => 'ONLINE',
]);
```

