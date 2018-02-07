PHP client for ResDiary API
========

This is a PHP client for ResDiary API. It includes basic HTTP client, which is a simple
HTTP wrapper around Guzzle HTTP client library. It then communicates with ResDiary API
by calling available endpoints. Check the documentation for available API calls.

Currently the only endpoint is `Setup` on `Restaurant` service, but the rest will be added in
the future.

Basic usage
------------------------

```php
use Thalvik\ResDiaryApiClient\RdaClient;

$rdaClient = new RDAClient([
	'api_url' => $api_url,
	'username' => $username,
	'password' => $password
]);
```

Since token is lasting 24 hours, you want to check if you havent already saved token, for example in database

```php
$token_saved = some_function_to_retrieve_saved_24h_token('YOUR_RESDIARY_TOKEN_NAME');
```

You then call `setAccessToken()` on a client, which if token has expired, will set new token and retrieve it
```php
$token_client = $rdaClient->setAccessToken($token_saved);
```

You can then check if token has changed, you set new one for next 24 hours
```php
if ($token_client != $token_saved) {
	some_function_to_save_24h_token( 'YOUR_RESDIARY_TOKEN_NAME', $token_client);
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

