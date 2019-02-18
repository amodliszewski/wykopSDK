WykopSDK - Software Development Kit for Wykop API v2
=======================

WykopSDK is a PHP Software Development Kit for Wykop, makes it easy to develop PHP apps for Wykop.

- Simple class to handle requests with reasonable groups.
- Handle all the magic for you.
- Fully object oriented!
- Throws exceptions on issues.
- Abstracts away the API, allowing you to write
  proper application code.

```php
use XzSoftware\WykopSDK\Exceptions\ApiException;
use XzSoftware\WykopSDK\Profile\Request\Profile;
use XzSoftware\WykopSDK\SDK;
use XzSoftware\WykopSDK\UserManagement\Request\Login;

$sdk = SDK::buildNewSDK('APP_KEY','APP_SECRET');
try {
    $loginResponse = $sdk->auth()->logIn(new Login('USER_NAME', 'USER_ACCOUNT_KEY'));
    $sdk->auth()->authUser('micke', $loginResponse->getUserKey());
    $sdk->profiles()->getProfile(new Profile('micke'));
} catch (ApiException $e) {
    echo $e->getMessage();
    die();
}
```

## Installing

The recommended way to install is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version:

```bash
php composer.phar require xzsoftware/wykopsdk
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update wykopSDK using composer:

 ```bash
php composer.phar update
 ```
 
 ## Usage

Starting point is allways to create new SDK instance. 
It requires yours Wykop App Key and Secret -> you can get them 
[here](https://www.wykop.pl/dla-programistow/twoje-aplikacje/). 

You can also create [an new app](https://www.wykop.pl/dla-programistow/nowa-aplikacja/). 
Remember to check all needed permissions
 
 ```php
$sdk = XzSoftware\WykopSDK\SDK\SDK::buildNewSDK('APP_KEY','APP_SECRET');
```

## Auth

If you want to do anything you need to start from user authentication. 
First of all user needs to connect via application connect link.

```php
$sdk = XzSoftware\WykopSDK\SDK\SDK::buildNewSDK('APP_KEY','APP_SECRET');
$sdk->auth()->getConnectLink('127.0.0.1/redirectUrl'); // will return url that yuser needs to follow to access your app. He will be then redirected to redirectUrl param.

// on redirect page you need to read connect data
$data = $sdk->auth()->getAuthFromConnectData(
    $_GET['connectData']
);

// now you can authenticate user with this data:
$sdk->auth()->authUser($data->getLogin(), $data->getToken())
```

The other option is to access connection via USER_APP_KEY, 
that user needs to pass from his [settings](https://www.wykop.pl/ustawienia/sesje/) 
so this is more 'closed' option for power users

```php
use XzSoftware\WykopSDK\SDK;
use XzSoftware\WykopSDK\UserManagement\Request\Login;

$sdk = SDK::buildNewSDK('APP_KEY','APP_SECRET');
$loginResponse = $sdk->auth()->logIn(new Login('USER_NAME', 'USER_ACCOUNT_KEY'));
$sdk->auth()->authUser('USER_NAME', $loginResponse->getUserKey());

```

## Usage

Any endpoint group you can see on [docs](https://www.wykop.pl/dla-programistow/apiv2docs/)
is handled by specific sdk group, represented in table below:

| Group                   | Handles                                                                                 |
|-------------------------|-----------------------------------------------------------------------------------------|
| $sdk->addLink()         | [AddLink](https://www.wykop.pl/dla-programistow/apiv2docs/package/AddLink/)             |
| $sdk->auth()            | Authentication                                                                          |
| $sdk->entries()         | [Entries](https://www.wykop.pl/dla-programistow/apiv2docs/package/Entries/)             |
| $sdk->hits()            | [Hits](https://www.wykop.pl/dla-programistow/apiv2docs/package/Hits/)                   |
| $sdk->links()           | [Links](https://www.wykop.pl/dla-programistow/apiv2docs/package/Links/)                 |
| $sdk->myWykop()         | [MyWykop](https://www.wykop.pl/dla-programistow/apiv2docs/package/MyWykop/)             |
| $sdk->notifications()   | [Notifications](https://www.wykop.pl/dla-programistow/apiv2docs/package/Notifications/) |
| $sdk->privateMessages() | [PM](https://www.wykop.pl/dla-programistow/apiv2docs/package/Pm/)                       |
| $sdk->profiles()        | [Profiles](https://www.wykop.pl/dla-programistow/apiv2docs/package/Profiles/)           |
| $sdk->search()          | [Search](https://www.wykop.pl/dla-programistow/apiv2docs/package/Search/)               |
| $sdk->settings()        | [Settings](https://www.wykop.pl/dla-programistow/apiv2docs/package/Settings/)           |
| $sdk->suggest()         | [Suggest](https://www.wykop.pl/dla-programistow/apiv2docs/package/Suggest/)             |
| $sdk->tags()            | [Tags](https://www.wykop.pl/dla-programistow/apiv2docs/package/Tags/)                   |

Group can have sub group of endpoint handling specific stuff i.e. `$sdk->links()->related()`

Endpoint methods usualy accept specific request object as parameter that is needed to handle api call.
```php
$sdk
    ->links()
    ->related()
    ->add(
        new \XzSoftware\WykopSDK\Links\Request\Related\Add(
            12345,
            'http://some.valid.url',
            'some title'
        )
    );
```
Few endpoints break that rule accepting one of few objects extending specific abstract (voting),
```php
$sdk->links()->related()->vote(
        new \XzSoftware\WykopSDK\Links\Request\Related\VoteUp(1234, 12345)
    );
$sdk->links()->related()->vote(
        new \XzSoftware\WykopSDK\Links\Request\Related\VoteDown(1234, 12345)
    );
``` 

or accept simple value like string or int (when no other param is possible and that one is mandatory).
```php
$sdk->privateMessages()->getConversation('username');
```

All request objects can accept needed params via constructor. Non mandatory params can be modified via setters. i.e
```php
$followersRequest = new \XzSoftware\WykopSDK\Profile\Request\Followers('user');
$followersRequest->setPage(3);
$sdk->profiles()->getFollowers($followersRequest);
```

#### IMPORTANT

Each request object has public methods:

```php
    $request->setUserKey('key');
    $request->setAppKey('key');
```

There is no need to set these two params. SDK client will handle it for you!

