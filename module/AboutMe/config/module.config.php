<?php
return array(
    'router' => array(
        'routes' => array(
            'me' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/me',
                    'defaults' => array(
                        '__NAMESPACE__' => 'AboutMe\Controller',
                        'controller'    => 'AboutMe',
                        'action'        => 'index',
                    ),
                ),
                // 'may_terminate' => true,
                // 'child_routes' => array(
                //     'default' => array(
                //         'type'    => 'Segment',
                //         'options' => array(
                //             'route'    => '/[:controller[/:action]]',
                //             'constraints' => array(
                //                 'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                //                 'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                //             ),
                //             'defaults' => array(
                //             ),
                //         ),
                //     ),
                // ),
            ),
        ),
    ),
    
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'AboutMe\Controller\AboutMe' => 'AboutMe\Factory\AboutMeControllerFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        // 'template_map' => array(
        //     'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
        // ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

     'driver' => array(
        __NAMESPACE__ . '_driver' => array(
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => array(
                __DIR__ . '/../src/' . basename(dirname(__DIR__)) . '/Entity'
            ),
        ),
        'orm_default' => array(
            'drivers' => array(
                __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
            ),
        ),
    ),

    'age' => new \DateTime('1987-12-18'),
);