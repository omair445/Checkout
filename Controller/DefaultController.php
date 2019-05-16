<?php

namespace Checkout\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CheckoutPaymentBundle:Default:index.html.twig');
    }
}
