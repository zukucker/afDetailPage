<?php

namespace afDetailPage;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin afDetailPage.
 */
class afDetailPage extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_detail_page.plugin_dir', $this->getPath());
        parent::build($container);
    }

    public static function getSubscribedEvents()
    {
	return [
	    'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onDetail',
	    ];
    }

    public function onDetail(\Enlight_Event_EventArgs $args)
    {
        $config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());
        $controller = $args->get('subject');
        $view = $controller->View();
        $this->container->get('Template')->addTemplateDir($this->getPath() . '/Resources/views/');


    }

}
