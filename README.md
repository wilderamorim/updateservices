# UpdateServices @ElePHPant

[![Maintainer](http://img.shields.io/badge/maintainer-@wilderamorim-blue.svg?style=flat-square)](https://twitter.com/WilderAmorim)
[![Source Code](http://img.shields.io/badge/source-wilderamorim/updateservices-blue.svg?style=flat-square)](https://github.com/wilderamorim/updateservices)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/elephpant/updateservices.svg?style=flat-square)](https://packagist.org/packages/elephpant/updateservices)
[![Latest Version](https://img.shields.io/github/release/wilderamorim/updateservices.svg?style=flat-square)](https://github.com/wilderamorim/updateservices/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/wilderamorim/updateservices.svg?style=flat-square)](https://scrutinizer-ci.com/g/wilderamorim/updateservices)
[![Quality Score](https://img.shields.io/scrutinizer/g/wilderamorim/updateservices.svg?style=flat-square)](https://scrutinizer-ci.com/g/wilderamorim/updateservices)
[![Total Downloads](https://img.shields.io/packagist/dt/elephpant/updateservices.svg?style=flat-square)](https://packagist.org/packages/elephpant/updateservices)

## Installation

### Composer (recommended)

Use [Composer](https://getcomposer.org) to install this library from Packagist:
[`elephpant/updateservices`](https://packagist.org/packages/elephpant/updateservices)

Run the following command from your project directory to add the dependency:

```sh
composer require elephpant/updateservices "^1.0"
```

Alternatively, add the dependency directly to your `composer.json` file:

```json
"require": {
    "elephpant/updateservices": "^1.0"
}
```

## Usage

##### Ping-o-Matic (Only)

```php
<?php
use ElePHPant\UpdateServices\UpdateServices;

// Blog Name, Blog Home Page, RSS URL (optional)
(new UpdateServices('My Blog', 'https://domain.com', 'https://domain.com/rss.xml'))->pingOMatic();
```

##### Custom Ping List (Ping-o-Matic is Already Included)

```php
// XML-RPC Ping Services
// https://codex.wordpress.org/Update_Services
// https://codex.wordpress.org/pt-br:Servi%C3%A7os_de_Atualiza%C3%A7%C3%A3o
$pingServices = [
    'http://rpc.pingomatic.com',
    'http://rpc.twingly.com',
    'http://api.feedster.com/ping',
    'http://api.moreover.com/RPC2',
    'http://api.moreover.com/ping',
    'http://www.blogdigger.com/RPC2',
    'http://www.blogshares.com/rpc.php',
    'http://www.blogsnow.com/ping',
    'http://www.blogstreet.com/xrbin/xmlrpc.cgi',
    'http://bulkfeeds.net/rpc',
    'http://www.newsisfree.com/xmlrpctest.php',
    'http://ping.blo.gs/',
    'http://ping.feedburner.com',
    'http://ping.syndic8.com/xmlrpc.php',
    'http://ping.weblogalot.com/rpc.php',
    'http://rpc.blogrolling.com/pinger/',
    'http://rpc.technorati.com/rpc/ping',
    'http://rpc.weblogs.com/RPC2',
    'http://www.feedsubmitter.com',
    'http://blo.gs/ping.php',
    'http://www.pingerati.net',
    'http://www.pingmyblog.com',
    'http://geourl.org/ping',
    'http://ipings.com',
    'http://www.weblogalot.com/ping',
];

(new UpdateServices('My Blog', 'https://domain.com', 'https://domain.com/rss.xml', $pingServices))->all();
```

## Contributing

No one ever has enough engineers, so we're very happy to accept contributions
via Pull Requests. For details, see [CONTRIBUTING](CONTRIBUTING.md)

## Credits

- [Wilder Amorim](https://github.com/wilderamorim) (Developer)
- [All Contributors](https://github.com/wilderamorim/updateservices/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/wilderamorim/updateservices/blob/master/LICENSE) for more information.