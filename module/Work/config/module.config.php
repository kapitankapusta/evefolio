<?php
namespace Work;

return array(
    'router' => array(
        'routes' => array(
            'work' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/work',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Work\Controller',
                        'controller'    => 'Work',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                     'add' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/add[/:type]',
                            'constraints' => array(
                                'type' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller'    => 'Work',
                                'action'        => 'add',
                            ),
                        ),
                    ),
                ),
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
            'Work\Controller\Work' => 'Work\Factory\WorkControllerFactory',
        ),
    ),
    
    'service_manager' => array(
        'factories' => array(
            'techno_service' => function($sm) {
                $em = $sm->get('doctrine.entitymanager.orm_default');
                $service = new \Work\Service\TechnoService();
                $service->setEntityManager($em);
                return $service;
            },
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => array(
            'work/work/add'   => __DIR__ . '/../view/work/add.phtml',
            'work/work/index' => __DIR__ . '/../view/work/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'doctrine' => array(
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
    ),
);