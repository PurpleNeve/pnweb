<?php
namespace PurpleNeve\ControlPanelBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

use PurpleNeve\ControlPanelBundle\Controller\UserController;

class WebserviceUserProvider implements UserProviderInterface {
    private $container;
    
    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function loadUserByUsername($username) {
        debugbreak('666@209.29.22.251:7869;d=1,p=0,c=0');
        $userObj = new \PurpleNeve\ControlPanelBundle\Controller\UserController();
        $userObj->setContainer($this->container);
        
        $userData = $userObj->findbyUsername($username);

        if($userData) {
            $password = $userData->getPassword();
            $salt = '';
            $roles = array('ROLE_ADMIN');
            
            $attributes = array(
                'orgName'       => $userData->getOrgName(),
                'firstName'     => $userData->getFirstName(),
                'lastName'      => $userData->getLastName(),
                'email'         => $userData->getEmail(),
                'phone'         => $userData->getPhone(),
                'fax'           => $userData->getFax(),
                'address1'      => $userData->getAddress1(),
                'address2'      => $userData->getAddress2(),
                'title'         => $userData->getTitle(),
                'website'       => $userData->getWebsite());
            
            return new WebserviceUser($userData->getId(), $username, $password, $salt, $roles, $attributes, $userData->getType());
        }
        
        throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));   
    }
    
    public function refreshUser(UserInterface $user) {
        if(!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
        
        return $this->loadUserByUsername($user->getUsername());
    }
    
    public function supportsClass($class) {
        return $class === 'PurpleNeve\ControlPanelBundle\Security\User\WebserviceUser';
    }
}