<?php
namespace User\Factory;

use User\View\Helper\ActiveUser;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ActiveUserViewHelperFactory implements FactoryInterface{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $helper = new ActiveUser();
        $helper->setServiceManager($serviceLocator->getServiceLocator());
        return $helper;
    }

}

