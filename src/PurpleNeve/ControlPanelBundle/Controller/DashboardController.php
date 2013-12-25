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
        $userObj = $this->getUser();
        debugbreak('666@209.29.22.251:7869;d=1,p=0,c=0');
        return $this->render('ControlPanelBundle:Dashboard:dashboard.html.twig');
    }
}