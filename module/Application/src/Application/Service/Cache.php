<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 8/28/14
 * Time: 12:46 AM
 */

namespace Application\Service;

use Zend\Cache\Storage\StorageInterface;
use Zend\Cache\StorageFactory;

class Cache extends BaseService
{

    /**
     * @var StorageInterface
     */
    protected $cache;

    public function isUpdateRequired($key){
        $cache = $this->getAdapter();
        return is_null($cache->getItem("reload_" . $key)) || ($cache->getItem("reload_" . $key) == 1);
    }


    public function unsetCacheUpdate($key)
    {
        $this->getAdapter()->setItem("reload_" . $key, 0);
    }

    public function setCacheUpdate($key)
    {
        $this->getAdapter()->setItem("reload_" . $key, 1);
    }

    /**
     * @return StorageInterface
     */
    public function getAdapter(){
        if(null === $this->cache)
            $this->cache = StorageFactory::factory(array(
                'adapter' => array(
                    'name'    => 'filesystem',
                    'options' => array(
                        'cache_dir' => ROOT_PATH.'/data/cache',
                        'ttl' => 7*24*60*60,
                    ),
                ),
            ));
        return $this->cache;
    }
} 