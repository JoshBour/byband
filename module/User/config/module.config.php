<?php
namespace User;

return array(
    'doctrine' => array(
        'driver' => array(
            'entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => 'entity',
                ),
            ),
        ),
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'User\Entity\User',
                'identity_property' => 'username',
                'credential_property' => 'password',
                'credential_callable' => 'User\Entity\User::verifyPassword'
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => __NAMESPACE__ . '\Controller\Auth',
                        'action' => 'login'
                    )
                )
            ),
            'logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => __NAMESPACE__ . '\Controller\Auth',
                        'action' => 'logout'
                    )
                )
            )
//            'workers' => array(
//                'type' => 'Zend\Mvc\Router\Http\Literal',
//                'options' => array(
//                    'route' => '/workers',
//                    'defaults' => array(
//                        'controller' => __NAMESPACE__ . '\Controller\Index',
//                        'action' => 'list',
//                    ),
//                ),
//                'may_terminate' => true,
//                'child_routes' => array(
//                    'save' => array(
//                        'type' => 'Zend\Mvc\Router\Http\Literal',
//                        'options' => array(
//                            'route' => '/save',
//                            'defaults' => array(
//                                'action' => 'save'
//                            )
//                        )
//                    ),
//                    'add' => array(
//                        'type' => 'Zend\Mvc\Router\Http\Literal',
//                        'options' => array(
//                            'route' => '/add',
//                            'defaults' => array(
//                                'action' => 'add'
//                            )
//                        )
//                    ),
//                    'remove' => array(
//                        'type' => 'Zend\Mvc\Router\Http\Literal',
//                        'options' => array(
//                            'route' => '/remove',
//                            'defaults' => array(
//                                'action' => 'remove'
//                            )
//                        )
//                    )
//
//                )
//            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'authStorage' => __NAMESPACE__ . '\Model\AuthStorage',
            'authService' => __NAMESPACE__ . '\Service\AuthService'
        ),
        'factories' => array(
            'loginForm' => __NAMESPACE__ . '\Factory\LoginFormFactory',
            'Zend\Authentication\AuthenticationService' => __NAMESPACE__ . '\Factory\AuthFactory',
        ),
        'aliases' => array(
            'zendAuthService' => 'Zend\Authentication\AuthenticationService'
        )
    ),
    'controller_plugins' => array(
        'factories' => array(
            'activeUser' => __NAMESPACE__ . '\Factory\ActiveUserPluginFactory'
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'activeUser' => __NAMESPACE__ . '\Factory\ActiveUserViewHelperFactory'
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            __NAMESPACE__ . '\Controller\Index' => __NAMESPACE__ . '\Controller\IndexController',
            __NAMESPACE__ . '\Controller\Auth' => __NAMESPACE__ . '\Controller\AuthController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),
);
