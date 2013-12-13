<?php
namespace PurpleNeve\ControlPanelBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class WebserviceUserProvider implements UserProviderInterface {
    private $container;
    
    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function loadUserByUsername($username) {
        debugbreak('666@209.29.22.251:7869;d=1,p=0,c=0');
        if($userData) {
            $password = $userData->data->password;
            $salt = '';
            $roles = array('ROLE_ADMIN');
            
            return new WebserviceUser($userData->data->id, $username, $password, $salt, $roles, $userData->data->attributes, $userData->data->type);
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