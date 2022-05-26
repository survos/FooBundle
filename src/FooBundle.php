<?php
namespace Survos\FooBundle;

use KickAssSubtitles\OpenSubtitles\OpenSubtitlesClient;
use Survos\FooBundle\Service\FooService;
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
        $definition = $builder->getDefinition('survos.foo');


//        $definition = $builder->autowire('survos.foo', FooService::class);
//        $definition->setPublic(true);
//        $builder->register(FooService::class, 'survos.foo');

        $definition->setArgument(0, $config['title']);


//        $definition = $builder->register('kick_ass_subtitle.open_subtitles_client', OpenSubtitlesClient::class);
//
//        $definition = $builder->register(OpenSubtitlesClient::class, OpenSubtitlesClient::class);
//        $definition->setPublic(true);
////        $container->services()->alias()
//

//        dd($builder, $container, $config);

//        $loader = new XmlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
//        $loader->load('services.xml');
//
//        $configuration = new Configuration();
//        $config = $this->processConfiguration($configuration, $configs);
//
//
//        dd($config);
//        $container->parameters()->set('foo', $config['foo']);
//        $container->import('../config/services.php');
//
//        if ('bar' === $config['foo']) {
//            $container->services()->set(Parser::class);
//        }
    }

    public function configure(DefinitionConfigurator $definition): void
    {
//        // loads config definition from a file
//        $definition->import('../config/definition.php');
//
//        // loads config definition from multiple files (when it's too long you can split it)
//        $definition->import('../config/definition/*.php');


        // if the configuration is short, consider adding it in this class
        $definition->rootNode()
            ->children()
                ->scalarNode('title')->defaultValue(null)->end()
                ->scalarNode('tagline')->defaultValue(null)->end()
            ->end();

        ;
    }
}
