<?php

namespace PurpleNeve\ClientAreaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    public function indexAction() {
        return $this->render('ClientAreaBundle:Default:index.html.twig');
    }
}
