<?php
namespace PurpleNeve\ControlPanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {
    
    /**
    * dashboardAction - Load the default dashboard, all users land here after logging into the CP.
    * 
    * @param none
    */
    public function dashboardAction() {
        return $this->render('ControlPanelBundle:Dashboard:dashboard.html.twig');
    }
}