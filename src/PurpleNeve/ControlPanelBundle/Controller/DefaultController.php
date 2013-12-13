<?php
namespace PurpleNeve\ControlPanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller {
    
    /**
    * loginAction - Default page for the control panel, all users are directed here to authenticate prior to accessing anything within the system.
    * 
    * @param \Request $request
    */
    public function loginAction(Request $request) {
        $session = $request->getSession();
        
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        
        $authForm = $this->get('form.factory')->createNamedBuilder(null, 'form', array())
            ->setAction('/cp/login/process')
            ->setMethod('POST')
            ->add(
                '_username',
                'email',
                array('attr' => array('size' => 'small', 'placeholder' => 'Email', 'name' => '_username', 'value' => $session->get(SecurityContext::LAST_USERNAME)), 'label' => false)
            )
            ->add(
                '_password',
                'password',
                array('attr' => array('size' => 'small', 'placeholder' => 'Password', 'name' => '_password'), 'label' => false)
            )
            ->add(
                'authUser',
                'submit',
                array('attr' => array('size' => 'small'), 'label' => 'Login')
            )->getForm();
            
        return $this->render('ControlPanelBundle:Default:index.html.twig', array(
            'login_form'    => $authForm->createView(),
            'error'         => $error
            ));
    }
    
    public function checkLoginAction() {
        throw new NotFoundHttpException("We should not be calling this, the firewall is not intercepting the call");
    }
    
    public function logoutAction() {
        throw new NotFoundHttpException("We should not be calling this, the firewall is not intercepting the call");
    }
}
