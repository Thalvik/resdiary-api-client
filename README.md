PHP client for ResDiary API
========

This is an unoffical PHP client for ResDiary API. It includes basic HTTP client, which is a simple
HTTP wrapper around Guzzle HTTP client library. It then communicates with ResDiary API by calling 
available endpoints. Check the ResDiary API documentation for available API calls.


CURRENT STATUS: DEVELOPMENT!!!
========

Basic usage
------------------------

Run composer install to install necessary packages

`composer install`


Initalize the class with parameters


```php
use Thalvik\ResDiaryApiClient\RdaClient;

$rdaClient = new RDAClient([
	'api_url' => 'https://thegreatapi.com/', //Change this to value given by ResDiary
	'username' => 'someusername', //Change this to value given by ResDiary
	'password' => 'somepassword' //Change this to value given by ResDiary
]);
```

Since token is lasting 24 hours, you want to check if you havent already saved token, for example calling in
your custom function to check it in database

```php
$tokenSaved = someFunctionToRetrieveSaved24hToken('YOUR_RESDIARY_TOKEN_NAME');
```

You then call `setAccessToken()` on a client, which if token has expired, will set new token and retrieve it
```php
$tokenClient = $rdaClient->setAccessToken($tokenSaved);
```

You can then check if token has changed, you set new one for next 24 hours calling in your custom function
```php
if ($tokenClient != $tokenSaved) {
	someFunctionToSave24hToken( 'YOUR_RESDIARY_TOKEN_NAME', $tokenClient);
}
```
You can then use client to call methods on available services
```php
$now = new \DateTime();

$restaurantSetup = $rdaClient->getConsumerService('Restaurant') //Service name
->setMicroSiteName('TestProvider') //Set microSiteName
->getSetup([ //Call method
	'date' => $now->format('Y-m-d'),
	'channelCode' => 'ONLINE',
]);
```

If there are some errors in client request, you can check them by calling `hasErrors` and `getErrors` methods. `getErrors`
will return array with `Message` and `ValidationErrors`

```php
if ($rdaClient->hasErrors()) {
	print_r($rdaClient->getErrors());
	exit();
}
```

Else, the call will return relevant data
```php
print_r($restaurantSetup);
```

To run tests, fill the credentials in phpunit.xml.dist file

```xml
<const name="BASE_URI" value=""/>
<const name="USERNAME" value=""/>
<const name="PASSWORD" value=""/>
```

Then run PHPUnit

`vendor/bin/phpunit`

