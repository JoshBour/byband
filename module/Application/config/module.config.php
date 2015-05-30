<?php
namespace Application;
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        ),
        'invokables' => array(
            'authStorage' => __NAMESPACE__ . '\Model\AuthStorage',
        ),
        'factories' => array(
            'Zend\Session\SessionManager' => __NAMESPACE__ . '\Factory\SessionManagerFactory',
            'Zend\Authentication\AuthenticationService' => __NAMESPACE__ . '\Factory\AuthFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
            'auth_service' => 'Zend\Authentication\AuthenticationService'
        ),
    ),
    'controller_plugins' => array(
        'factories' => array(
            'admin' => __NAMESPACE__ . '\Factory\AdminPluginFactory',
            'translate' => __NAMESPACE__ . '\Factory\TranslatePluginFactory',
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'admin' => __NAMESPACE__ . '\Factory\AdminViewHelperFactory',
            'actionName' => __NAMESPACE__ . '\Factory\ActionNameHelperFactory'
        ),
        'invokables' => array(
            'mobile' => 'Application\View\Helper\Mobile',
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
        'initializers' => array(
            'entityManager' => __NAMESPACE__ . '\Factory\EntityManagerInitializer',
            'vocabulary' => __NAMESPACE__ . '\Factory\VocabularyInitializer'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'header' 				  => __DIR__ . '/../view/partial/header.phtml',
            'footer' 			      => __DIR__ . '/../view/partial/footer.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),
);
