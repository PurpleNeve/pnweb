<?php
namespace PurpleNeve\ControlPanelBundle\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

class WebserviceUser implements UserInterface, EquatableInterface {
    private $id;
    private $username;
    private $password;
    private $salt;
    private $roles;
    private $type;
    
    public function __construct($id, $username, $password, $salt, array $roles, $attributes, $type) {
        $this->id           = $id;
        $this->username     = $username;
        $this->password     = $password;
        $this->salt         = $salt;
        $this->roles        = $roles;
        $this->type         = $type;
    }
    
    public function getRoles() {
        return $this->roles;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getSalt() {
        return $this->salt;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function eraseCredentials() {}
    
    public function isEqualTo(UserInterface $user) {
        if(!$user instanceof WebserviceUser) {
            return false;
        }
        
        if ($this->password !== $user->getPassword()) {
            return false;
        }
        
        if ($this->getSalt() !== $user->getSalt()) {
            return false;
        }
        
        if ($this->username !== $user->getUsername()) {
            return false;
        }
        
        return true;
    }
}