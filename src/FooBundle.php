<?php
namespace Survos\FooBundle;

use KickAssSubtitles\OpenSubtitles\OpenSubtitlesClient;
use Survos\FooBundle\Service\FooService;
use Survos\FooBundle\Twig\FooTwigExtension;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\HttpKernel\Config\FileLocator;

class FooBundle extends AbstractBundle
{

    // $config is the bundle Configuration that you usually process in ExtensionInterface::load() but already merged and processed
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $loader = new XmlFileLoader($builder, new \Symfony\Component\Config\FileLocator(__DIR__.'/Resources/config/'));
        $loader->load('services.xml');
//        $definition = $builder->getDefinition('survos.foo');
        $builder->autowire('survos.foo_twig', FooTwigExtension::class)
            ->addTag('twig.extension');

//        $serviceIdentifier = 'survos.foo';
//        $definition = $builder->autowire($serviceIdentifier, FooService::class);
////        $definition->setPublic(true);
//        $container->services()->alias(FooService::class, $serviceIdentifier);
//        $definition->setArgument(0, $config['title']);



    }

    public function configure(DefinitionConfigurator $definition): void
    {
        // if the configuration is short, consider adding it in this class
        $definition->rootNode()
            ->children()
                ->scalarNode('title')->defaultValue(null)->end()
                ->scalarNode('tagline')->defaultValue(null)->end()
            ->end();

        ;
    }
}
