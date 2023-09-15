<?php
namespace Factory;
class PlatformFactory {
    private $platform;
    private $class;

    public function __construct($platform){
        $this->platform = ucfirst($platform);
        $this->class    = "\\Platform\\".$this->platform;
    }

    public function authanticate(){
        $platform_class = new $this->class();
        return $platform_class->authanticate();
    }

    public function getToken() {
        $platform_class = new $this->class();
        return $platform_class->getToken();
    }

    public function getUser() {
        $platform_class = new $this->class();
        return $platform_class->getUser();
    }

    public function token_information(){
        $platform_class = new $this->class();
        return $platform_class->token_information();
    }

}
