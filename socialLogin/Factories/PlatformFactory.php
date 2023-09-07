<?php
namespace Factory;
class PlatformFactory {
    private $platform;
    private $class;

    public function __construct($platform){
        $this->platform = ucfirst($platform);
        $this->class    = "\\Platform\\".$this->platform;
    }

    public function getToken() {
        $platform_class = new $this->class();
        return $platform_class->getToken();
    }
}