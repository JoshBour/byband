<?php
namespace User\Model;

use Zend\Authentication\Storage\Session;
use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;

class AuthStorage extends Session
{
    public function info(){
        echo "<pre>";
        var_dump($this->session->getManager()->getConfig());
        echo "</pre>";
    }

    /**
     * Sets the remember me time for the logged admin.
     *
     * @param int $rememberMe
     * @param int $time
     */
    public function setRememberMe($rememberMe = 1, $time = 2419200)
    {
        if ($rememberMe == 1) $this->session->getManager()->rememberMe($time);
    }

    /**
     *  Resets the remember me time.
     */
    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    }
}
