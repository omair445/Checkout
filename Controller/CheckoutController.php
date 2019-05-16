<?php
namespace Checkout\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CheckoutController extends Controller
{

    private $publicKey = 'pk_test_6ff46046-30af-41d9-bf58-929022d2cd14';
    private $envUrl = 'https://cdn.checkout.com/sandbox/js/checkout.js';
    private $callBack = 'https://merchant.com/successUrl';
    private $currency = 'USD';
    private $cartObject = '';
    private $amount = 10;   /////actual amount multiple by 100
    private $customer_name = 'Test User';
    private $countryCode = 'US';
    private $buttonLabel = 'Buy Now';
    private $logo = 'http://coredirectiondev.engagiv.com/icon/logo.png';
    private $checkoutPaymentView = '@CheckoutPayment/checkout/initiate_payment.html.twig';

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param string $publicKey
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }

    /**
     * @return string
     */
    public function getEnvUrl()
    {
        return $this->envUrl;
    }

    /**
     * @param string $envUrl
     */
    public function setEnvUrl($envUrl)
    {
        $this->envUrl = $envUrl;
    }

    /**
     * @return string
     */
    public function getCallBack()
    {
        return $this->callBack;
    }

    /**
     * @param string $callBack
     */
    public function setCallBack($callBack)
    {
        $this->callBack = $callBack;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCartObject()
    {
        return $this->cartObject;
    }

    /**
     * @param string $cartObject
     */
    public function setCartObject($cartObject)
    {
        $this->cartObject = $cartObject;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        /**
         * @doc Amount is always multiplied by 100
         */
        $this->amount = $amount*100;
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * @param string $customer_name
     */
    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getButtonLabel()
    {
        return $this->buttonLabel;
    }

    /**
     * @param string $buttonLabel
     */
    public function setButtonLabel($buttonLabel)
    {
        $this->buttonLabel = $buttonLabel;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getCheckoutPaymentView()
    {
        return $this->checkoutPaymentView;
    }

    /**
     * @param string $checkoutPaymentView
     */
    public function setCheckoutPaymentView($checkoutPaymentView)
    {
        $this->checkoutPaymentView = $checkoutPaymentView;
    }



    public function showAction($currency=null,$amount=null,$customerName=null,$cartObject=null,$country_code=null,$callback=null)
    {
        if(isset($currency)){
            $this->setCurrency($currency);
        }if(isset($amount)){
            $this->setAmount($amount);
        }if(isset($customerName)){
            $this->setCustomerName($customerName);
        }if(isset($cartObject)){
            $this->setCartObject($cartObject);
        }if(isset($country_code)){
            $this->setCountryCode($country_code);
        }if(isset($callback)){
            $this->setCallBack($callback);
        }
        return $this->render($this->checkoutPaymentView, [
            'public_key' => $this->publicKey,
            'env_url' => $this->envUrl,
            'form_url' => $this->callBack,
            'currency' => $this->currency,
            'cart_object'  => $this->cartObject,
            'form_button_label' => $this->buttonLabel,
            'customer_name' =>$this->customer_name,
            'amount' =>$this->amount,
            'country_code' => $this->countryCode,
            'logo' => $this->logo,


        ]);
    }

}
