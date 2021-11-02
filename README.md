# Omnipay: Ameria

**Ameria driver for the Omnipay Laravel payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.5+. This package implements Ameria support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "gauravjain028/omnipay-ameria": "dev-master"
    }
}
```

And run composer to update your dependencies:

    composer update

Or you can simply run

    composer require gauravjain028/omnipay-ameria


## Basic Usage

1. Use Omnipay gateway class:

```php
    use Omnipay\Omnipay;
```

2. Initialize Ameria gateway:

```php

    $gateway = Omnipay::create('Ameria');
    $gateway->setUsername(env('AMERIA_USERNAME'));
    $gateway->setPassword(env('AMERIA_PASSWORD'));
    $gateway->setReturnUrl(env('AMERIA_RETURN_URL')); // Return url, that should be point to your ameria webhook route
    $gateway->setLanguage(\App::getLocale()); // Language
    $gateway->setAmount(10); // Amount to charge
    $gateway->setTransactionId(XXXX); // Transaction ID from your system

```

3. Call purchase, it will automatically redirect to Ameria's hosted page

```php

    $purchase = $gateway->purchase()->send();
    $purchase->redirect();

```

4. Create a webhook controller to handle the callback request at your `AMERIA_RESULT_URL` and catch the webhook as follows

```php

    $gateway = Omnipay::create('Ameria');
    $gateway->setUsername(env('AMERIA_USERNAME'));
    $gateway->setPassword(env('AMERIA_PASSWORD'));
    
    $purchase = $gateway->completePurchase()->send();
    
    // Do the rest with $purchase and response with 'OK'
    if ($purchase->isSuccessful()) {
        
        // Your logic
        
    }
    
    return new Response('OK');

```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

