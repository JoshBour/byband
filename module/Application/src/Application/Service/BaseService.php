<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 4/6/2014
 * Time: 1:44 πμ
 */

namespace Application\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Application\Service\Cache;

class BaseService implements ServiceManagerAwareInterface
{

    /**
     * @var Cache
     */
    protected $cacheService;

    /**
     * The entity manager
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * The service manager
     *
     * @var ServiceManager;
     */
    private $serviceManager;

    /**
     * The zend translator
     *
     * @var \Zend\I18n\Translator\Translator
     */
    private $translator;

    /**
     * The application's vocabulary
     *
     * @var array
     */
    private $vocabulary;

    /**
     * Magic method used to return entity repositories
     * @param $name
     * @param $variables
     * @return \Doctrine\ORM\EntityRepository
     */
    public function __call($name,$variables){
        $entity = ucfirst(substr($name,3,strlen($name) - 13));
        $namespace = ucfirst($variables[0]);
        return $this->getEntityManager()->getRepository("{$namespace}\\Entity\\{$entity}");
    }

    /**
     * @return Cache
     */
    protected function getCacheService(){
        if(null === $this->cacheService)
            $this->cacheService = $this->getServiceManager()->get('cache_service');
        return $this->cacheService;
    }

    /**
     * Get the doctrine entity manager
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager(){
        if(null === $this->entityManager)
            $this->entityManager = $this->getServiceManager()->get('Doctrine\ORM\EntityManager');
        return $this->entityManager;
    }

    /**
     * Set service manager
     *
     * @param ServiceManager $serviceManager
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * Get the service manager
     *
     * @return ServiceManager
     */
    protected function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * Get the zend translator
     *
     * @return \Zend\I18n\Translator\Translator
     */
    protected function getTranslator()
    {
        if (null === $this->translator)
            $this->translator = $this->getServiceManager()->get('translator');
        return $this->translator;
    }

    /**
     * Get the application's vocabulary
     *
     * @return array
     */
    protected function getVocabulary(){
        if(null === $this->vocabulary)
            $this->vocabulary = $this->getServiceManager()->get('config')['vocabulary'];
        return $this->vocabulary;
    }
} 