<?php

namespace Optime\TriviaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class OptimeTriviaExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $this->registerDoctrineMapping($config);
    }

    public function registerDoctrineMapping($config)
    {
        $collector = DoctrineCollector::getInstance();

        foreach ($config['class'] as $type => $class) {
            if (!class_exists($class)) {
                return;
            }
        }

        $collector->addAssociation($config['class']['user'], 'mapOneToMany', [
            'fieldName' =>  'triviaAnswers',
            'targetEntity'  =>  'OptimeTriviaBundle\Entity\TriviaAnswers',
            'mappedBy'  =>  'user'
        ]);

        $collector->addAssociation('Optime\TriviaAnswer\Entity\TriviaAnswer', 'mapManyToOne', [
            'fieldName'         =>  'user',
            'targetEntity'      =>  $config['class']['user'],
            'inversedBy'        =>  'triviaAnswers'
        ]);
    }
}
