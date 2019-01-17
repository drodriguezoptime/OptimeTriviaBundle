<?php
/**
 * Created by PhpStorm.
 * User: DRODRIGUEZ
 * Date: 17/01/2019
 * Time: 2:39 PM
 */

namespace Optime\TriviaBundle\DependencyInjection\Compiler;

use Optime\TriviaBundle\Mapper\DoctrineCollector;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AddMapperInformationCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('doctrine')) {
            $container->removeDefinition('optime.doctrine.mapper');
            return;
        }

        $mapper = $container->getDefinition('optime.doctrine.mapper');

        foreach (DoctrineCollector::getInstance()->getAssociations() as $class => $associations) {
            foreach ($associations as $field => $options) {
                $mapper->addMethodCall('addAssociation', [$class, $field, $options]);
            }
        }

        foreach (DoctrineCollector::getInstance()->getDiscriminatorColumns() as $class => $columnDefinition) {
            $mapper->addMethodCall('addDiscriminatorColumn', [$class, $columnDefinition]);
        }

        foreach (DoctrineCollector::getInstance()->getDiscriminators() as $class => $discriminators) {
            foreach ($discriminators as $key => $discriminatorClass) {
                $mapper->addMethodCall('addDiscriminator', [$class, $key, $discriminatorClass]);
            }
        }

        foreach (DoctrineCollector::getInstance()->getInheritanceTypes() as $class => $type) {
            $mapper->addMethodCall('addInheritanceType', [$class, $type]);
        }

        foreach (DoctrineCollector::getInstance()->getIndexes() as $class => $indexes) {
            foreach ($indexes as $field => $options) {
                $mapper->addMethodCall('addIndex', [$class, $field, $options]);
            }
        }

        foreach (DoctrineCollector::getInstance()->getUniques() as $class => $uniques) {
            foreach ($uniques as $field => $options) {
                $mapper->addMethodCall('addUnique', [$class, $field, $options]);
            }
        }

        foreach (DoctrineCollector::getInstance()->getOverrides() as $class => $overrides) {
            foreach ($overrides as $type => $options) {
                $mapper->addMethodCall('addOverride', [$class, $type, $options]);
            }
        }

        DoctrineCollector::getInstance()->clear();
    }
}