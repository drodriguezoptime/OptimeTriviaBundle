<?php

namespace Optime\TriviaBundle;

use Optime\TriviaBundle\DependencyInjection\Compiler\AddMapperInformationCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OptimeTriviaBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new AddMapperInformationCompilerPass());
    }
}
