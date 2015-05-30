<?php
return array (
  'view_manager' => 
  array (
    'template_path_stack' => 
    array (
      'zenddevelopertools' => 'C:\\webserver\\Apache24\\htdocs\\byband\\vendor\\zendframework\\zend-developer-tools\\config/../view',
      0 => 'C:\\webserver\\Apache24\\htdocs\\byband\\module\\Application\\config/../view',
    ),
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => 'C:\\webserver\\Apache24\\htdocs\\byband\\module\\Application\\config/../view/layout/layout.phtml',
      'application/index/index' => 'C:\\webserver\\Apache24\\htdocs\\byband\\module\\Application\\config/../view/application/index/index.phtml',
      'error/404' => 'C:\\webserver\\Apache24\\htdocs\\byband\\module\\Application\\config/../view/error/404.phtml',
      'error/index' => 'C:\\webserver\\Apache24\\htdocs\\byband\\module\\Application\\config/../view/error/index.phtml',
    ),
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'home' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\Index',
            'action' => 'index',
          ),
        ),
      ),
      'application' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/application',
          'defaults' => 
          array (
            '__NAMESPACE__' => 'Application\\Controller',
            'controller' => 'Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'default' => 
          array (
            'type' => 'Segment',
            'options' => 
            array (
              'route' => '/[:controller[/:action]]',
              'constraints' => 
              array (
                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
              ),
              'defaults' => 
              array (
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'service_manager' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\Cache\\Service\\StorageCacheAbstractServiceFactory',
      1 => 'Zend\\Log\\LoggerAbstractServiceFactory',
    ),
    'aliases' => 
    array (
      'translator' => 'MvcTranslator',
    ),
  ),
  'translator' => 
  array (
    'locale' => 'en_US',
    'translation_file_patterns' => 
    array (
      0 => 
      array (
        'type' => 'gettext',
        'base_dir' => 'C:\\webserver\\Apache24\\htdocs\\byband\\module\\Application\\config/../language',
        'pattern' => '%s.mo',
      ),
    ),
  ),
  'controllers' => 
  array (
    'invokables' => 
    array (
      'Application\\Controller\\Index' => 'Application\\Controller\\IndexController',
    ),
  ),
  'console' => 
  array (
    'router' => 
    array (
      'routes' => 
      array (
      ),
    ),
  ),
  'static_pages' => 
  array (
    0 => '/',
    1 => '/referrals',
    2 => '/about',
  ),
  'doctrine' => 
  array (
    'connection' => 
    array (
      'orm_default' => 
      array (
        'driverClass' => 'Doctrine\\DBAL\\Driver\\PDOMySql\\Driver',
        'params' => 
        array (
          'host' => 'localhost',
          'port' => '3306',
          'user' => 'root',
          'password' => '79346037/Liv',
          'dbname' => 'byband',
          'driverOptions' => 
          array (
            1002 => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
  ),
  'vocabulary' => 
  array (
    'ERROR_SUMMONER_EMPTY' => 'Your summoner name cannot be empty',
    'ERROR_REGION_EMPTY' => 'You have to select a region',
    'ERROR_POSITION_EMPTY' => 'You have to select a position',
    'ERROR_OPPONENT_EMPTY' => 'You have to select an opponent',
    'ERROR_RIOT' => 'Something went wrong. Make sure your summoner name and region are correct and try again.',
    'ERROR_NO_RANKED_GAMES' => 'It seems like you haven\'t played any ranked games. If this is not correct try searching again.',
    'ERROR_SEARCH' => 'Something went wrong. Make sure your summoner and region info are correct and that the champion exists.',
    'ERROR_EMAIL_INVALID' => 'The email address you added is invalid, please add a new one.',
    'ERROR_EMAIL_EMPTY' => 'The email address can\'t be empty.',
    'REFERRAL_SUCCESSFUL' => 'Hurray! We received your email and we will notify you when we accept your application. Have fun!',
    'ERROR_REFERRAL' => 'Something went wrong :( Do you mind trying again?',
    'ERROR_EMAIL_EXISTS' => 'The email you submitted already exists, please try a new one.',
    'ERROR_UNIQUE_ID_INVALID' => 'The unique id can contain only letters, numbers and/or the symbol _',
    'ERROR_UNIQUE_ID_LENGTH' => 'The unique id\'s length must be between 4-20 characters long.',
    'ERROR_UNIQUE_ID_EXISTS' => 'The unique id you submitted already exists, please try a new one.',
    'ERROR_UNIQUE_ID_EMPTY' => 'The unique id can\'t be empty.',
    'ERROR_PLAYER_EMPTY' => 'The player\'s name can\'t be empty.',
    'ERROR_VIDEO_ID_EMPTY' => 'The video id can\'t be empty',
    'MESSAGE_TUTORIAL_ADD_SUCCESS' => 'The tutorial has been created successfully',
    'ERROR_TUTORIAL_ADD' => 'Something went wrong when saving the tutorial.',
    'ERROR_RESULTS_NOT_FOUND' => 'The matchup you entered was not found. Mind trying an other one?',
    'ERROR_USERNAME_EMPTY' => 'The username can\'t be empty.',
    'ERROR_PASSWORD_EMPTY' => 'The password can\'t be empty.',
    'MESSAGE_INVALID_CREDENTIALS' => 'The username/password combination is invalid.',
    'MESSAGE_ALREADY_LOGGED' => 'You are already logged in!',
    'MESSAGE_WELCOME' => 'Welcome back',
    'PLACEHOLDER_USERNAME' => 'Enter your username..',
    'PLACEHOLDER_PASSWORD' => 'Enter your password..',
    'LABEL_USERNAME' => 'Username:',
    'LABEL_PASSWORD' => 'Password:',
    'LABEL_REMEMBER_ME' => 'Remember Me:',
    'ERROR_USERNAME_INVALID' => 'The username is invalid.',
    'ERROR_PASSWORD_INVALID' => 'The password is invalid.',
  ),
  'zenddevelopertools' => 
  array (
    'profiler' => 
    array (
      'enabled' => true,
      'strict' => true,
      'flush_early' => false,
      'cache_dir' => 'data/cache',
      'matcher' => 
      array (
      ),
      'collectors' => 
      array (
      ),
    ),
    'events' => 
    array (
      'enabled' => true,
      'collectors' => 
      array (
      ),
      'identifiers' => 
      array (
      ),
    ),
    'toolbar' => 
    array (
      'enabled' => true,
      'auto_hide' => false,
      'position' => 'bottom',
      'version_check' => false,
      'entries' => 
      array (
      ),
    ),
  ),
);