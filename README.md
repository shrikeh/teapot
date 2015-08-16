## Teapot

This is a _very_ simple library that aims to aid verbosity in any Web-based application by defining clearly the HTTP 1.1 response codes as constants. It includes two main components: an interface, which contains the constants, and an exception specifically for HTTP.

[![Build Status](https://travis-ci.org/shrikeh/teapot.svg?branch=master)](https://travis-ci.org/shrikeh/teapot)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/shrikeh/teapot/badges/quality-score.png?s=401b84c5188e1d2397dc52931f4ccb323770f6ef)](https://scrutinizer-ci.com/g/shrikeh/teapot/)
[![Dependency Status](https://www.versioneye.com/user/projects/5314ea99ec13753e9900004b/badge.png)](https://www.versioneye.com/user/projects/5314ea99ec13753e9900004b)
[![Latest Stable Version](https://poser.pugx.org/shrikeh/teapot/v/stable.png)](https://packagist.org/packages/shrikeh/teapot) [![Total Downloads](https://poser.pugx.org/shrikeh/teapot/downloads.png)](https://packagist.org/packages/shrikeh/teapot) [![Latest Unstable Version](https://poser.pugx.org/shrikeh/teapot/v/unstable.png)](https://packagist.org/packages/shrikeh/teapot) [![License](https://poser.pugx.org/shrikeh/teapot/license.png)](https://packagist.org/packages/shrikeh/teapot)

### Using the StatusCodes interface

Assuming for a moment a PHPUnit test on a cURL client response:

```php
<?php

/**
 * @dataProvider someUrlProvider
 */
public function testResponseIsOK($url)
{
    $client = new Client($url);
    $response = $client->get();
    
    $this->assertSame(200, $response->getStatusCode());
}
```

This becomes:

```php
<?php

use Teapot\StatusCode;
...
$this->assertSame(StatusCode::OK, $response->getStatusCode());
```

While this is a trivial example, the additional verbosity of the code is clearer with other HTTP status codes:

```php
<?php

use Teapot\StatusCode;

$code = $response->getStatusCode();

$this->assertNotEquals(StatusCode::NOT_FOUND, $code);
$this->assertNotEquals(StatusCode::FORBIDDEN, $code);
$this->assertNotEquals(StatusCode::MOVED_PERMANENTLY, $code);
$this->assertSame(StatusCode::CREATED, $code);
```

As `StatusCode` is an interface without any methods, you can directly implement it if you prefer:

```php
<?php

use Teapot\StatusCode;

class FooController implements StatusCode
{
    public function badAction()
    {
        if ($this->request->getMethod() == 'POST') {
            throw new \Exception('Bad!', self::METHOD_NOT_ALLOWED);
        }
    }
}
```

This may be beneficial in an abstract class, so that child classes don't need to explicitly use the interface.

There are various "helper" interfaces within the library, such as WebDAV and Http. Additionally, the various status codes are split into the RFCs that defined them: the Http helper interface extends RFCs 2616, 2324, and 2774, for example. This allows you very granular control of what status codes you want to allow within your application.

All constants have doc blocks that use the official [W3C](http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html "W3C Status Code Definitions")  and [IETF draft specification](http://tools.ietf.org/html/rfc6585 "IETF Additional HTTP Status Codes") descriptions of the status code, to aid IDEs and for reference.

### Using the HttpException

The `HttpException` is very straightforward. It simply is a named exception to aid verbosity:


```php
<?php

use Teapot\HttpException;
use Teapot\StatusCode;

throw new HttpException(
    'Sorry this page does not exist!',
    StatusCode::NOT_FOUND
);
```

The exception itself uses the `StatusCode` interface, allowing you to avoid manually and explicitly importing it if you prefer:

```php
<?php

use Teapot\HttpException;

throw new HttpException(
    'Sorry this page does not exist!',
    HttpException::NOT_FOUND
);
```

### Coding Standards

The entire library is intended to be [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md "PSR-0"), [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md "PSR-1") and [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md "PSR-2") compliant.

### Get in touch

If you have any suggestions, feel free to email me at barney+teapot@shrikeh.net or ping me on Twitter with [@shrikeh](https://twitter.com/shrikeh).
