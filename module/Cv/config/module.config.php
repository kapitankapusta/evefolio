<?php
namespace Cv;
return array(
	'router' => array(
        'routes' => array(
            'cv' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/cv',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Cv\Controller',
                        'controller'    => 'Cv',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'add' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:type]',
                            'constraints' => array(
                                'type' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller'    => 'Cv',
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
            'Cv\Controller\Cv' => 'Cv\Factory\CvControllerFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
       
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'cv/cv/index' => __DIR__ . '/../view/cv/index.phtml',
            'cv/cv/add'   => __DIR__ . '/../view/cv/add.phtml'
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