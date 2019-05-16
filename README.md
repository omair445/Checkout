>**:heavy_exclamation_mark: This library points to Checkout.com's classic API. **

### Requirements

PHP 5 > 5.3.0

### How to use the library

Add the dev-master version of Checkout Symfony Bundle into your project by using Composer or manually:

__Using Composer (Recommended)__

Either run the following command in the root directory of your project:
```
composer require checkout-bundle/checkout
```

Or require the Checkout.com package inside the composer.json of your project:
```
"require": {
    "php": ">=5.2.4",
    "checkout-bundle/checkout": "dev-master"
},
```
__Manually__

Download or clone the github repository, [master](https://github.com/omair445/Checkout) or download a [release](https://github.com/omair445/Checkout), and manually add it to your project.

### Example

After adding the library to your project, Register the Bundle in your *AppKernal.php*.
```html
 public function registerBundles()
    {
        $bundles = [
            .........
            ........
           .........
            new Checkout\PaymentBundle\CheckoutPaymentBundle(),
        ];
```
Add the routing for Checkout Bundle in your routing.yml 


```html
checkout_payment:
    resource: "@CheckoutPaymentBundle/Resources/config/routing.yml"
    prefix:   /

```

You can forword request to Checkout Controller to Initiate Payment using Checkout.js as under

In MyController.php

```html

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @\Sensio\Bundle\FrameworkExtraBundle\Configuration\Route("payment")
     */
    public function create_payment(Request $request){

        return $this->forward('CheckoutPaymentBundle:Checkout:show', [
        'currency' => 'USD',
        'amount' => 10,
        'customer_name' => 'Mannan',
        'cartObject' =>  null,
        'country_code' => 'US',
        'callback_url' => 'http://iam_callback_url.com',
        'timeout' => 300,
        'public_key' => 'XXXXXXXXXXX',
        'env' => 'sandbox'   //live
        ]);
    }

```
By default both **$connectTimeout** and **$readTimeout** are to 60 seconds. You may change them as needed.

**$env** accepts either `'sandbox'` or `'live'` as value.  This parameter allow you to shift between the sandbox environment or live environment. By Default the sandbox environment will be used. 
