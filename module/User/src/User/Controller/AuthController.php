<?php
/**
 * Created by PhpStorm.
 * User: Josh
 * Date: 30/5/2015
 * Time: 2:27 μμ
 */

namespace User\Controller;

use Application\Controller\BaseController;
use User\Entity\User;
use Zend\Authentication\AuthenticationService;
use Zend\View\Model\ViewModel;


class AuthController extends BaseController{
    const CONTROLLER_NAME = "User\\Controller\\Auth";
    const ROUTE_LOGIN = "login";
    const ROUTE_HOME = "home";

    /**
     * The module authentication service
     *
     * @var \User\Service\AuthService
     */
    private $authService;

    /**
     * The authentication storage.
     *
     * @var \User\Model\AuthStorage
     */
    private $authStorage = null;

    /**
     * The login form
     *
     * @var \Zend\Form\Form
     */
    private $loginForm;

    /**
     * The zend authentication service.
     *
     * @var AuthenticationService
     */
    private $zendAuthService = null;

    /**
     * The login action
     * Route: /
     *
     * @return mixed|\Zend\Http\Response|ViewModel
     */
    public function loginAction()
    {
        $this->getAuthStorage()->info();
        if (!$this->identity()) {
            $loginForm = $this->getLoginForm();
            /**
             * @var $request \Zend\Http\Request
             */
            $request = $this->getRequest();
            if ($request->isPost()) {
                $data = $request->getPost();
                $authService = $this->getAuthService();
                $success = $authService->login($loginForm,$data);
                if($success){
                    $this->flashMessenger()->addMessage($authService->getMessages());
                    return $this->redirect()->toRoute(self::ROUTE_HOME);
                }
                var_dump($authService->getMessages());
            }
            return new ViewModel(array(
                'form' => $loginForm,
                "pageTitle" => "Admin Login",
                "noAds" => true,
                "hideHeader" => true
            ));
        } else {
            return $this->redirect()->toRoute(self::ROUTE_HOME);
        }
    }

    public function registerAction(){

    }

    /**
     * The logout action
     * Route: /logout
     *
     * @return \Zend\Http\Response
     */
    public function logoutAction()
    {
        if ($this->identity()) {
            $this->getAuthStorage()->forgetMe();
            $this->getZendAuthService()->clearIdentity();
        }
        return $this->redirect()->toRoute(static::ROUTE_LOGIN);
    }

    public function getAuthService(){
        if(null === $this->authService)
            $this->authService = $this->getServiceLocator()->get('authService');
        return $this->authService;
    }

    /**
     * Get the auth storage
     *
     * @return \User\Model\AuthStorage
     */
    public function getAuthStorage()
    {
        if (null === $this->authStorage) {
            $this->authStorage = $this->getServiceLocator()->get('authStorage');
        }
        return $this->authStorage;
    }

    /**
     * Get the login form
     *
     * @return \Zend\Form\Form
     */
    public function getLoginForm()
    {
        if (null === $this->loginForm)
            $this->loginForm = $this->getServiceLocator()->get('loginForm');
        return $this->loginForm;
    }

    /**
     * Get the authentication service
     *
     * @return AuthenticationService
     */
    public function getZendAuthService()
    {
        if (null === $this->zendAuthService) {
            $this->zendAuthService = $this->getServiceLocator()->get('zendAuthService');
        }
        return $this->zendAuthService;
    }
}