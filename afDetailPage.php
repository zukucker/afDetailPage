<?php

namespace afDetailPage;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
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

    public function install(InstallContext $context)
    {
	$service = $this->container->get('shopware_attribute.crud_service');

	$service->update(
	    's_articles_attributes',
	    'af_detailpage_image',
	    \Shopware\Bundle\AttributeBundle\Service\TypeMapping::TYPE_SINGLE_SELECTION,
	    [
		'entity'  => \Shopware\Models\Media\Media::class,
		'label'	    => 'Bild unter Artikel Nr. im Standart Template',
		'displayInBackend' => true,
		'supportText' => '',
		'translatable' => false,
		'position' => 1,
	    ]
	);
    }

    public function uninstall(Uninstallcontext $context)
    {
	$service = $this->container->get('shopware_attribute.crud_service');
	$service->delete('s_articles_attributes', 'af_detailpage_image');	
    }

    public static function getSubscribedEvents()
    {
	return [
	    'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onDetail',
	    ];
    }

    public function onDetail(\Enlight_Event_EventArgs $args)
    {
	$connection = $this->container->get('dbal_connection');
        $config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());
        $controller = $args->get('subject');
        $view = $controller->View();
        $this->container->get('Template')->addTemplateDir($this->getPath() . '/Resources/views/');
	$sArticle = $view->getAssign('sArticle');
	$articleImage = $sArticle['af_detailpage_image'];
	$view->assign('af_detailpage_image', $articleImage);

	$mediaservice = $this->container->get('shopware_media.media_service');

	    if($articleImage != NULL){
		$mediapath = $connection->fetchColumn(
		    'SELECT path FROM s_media WHERE id = '.$articleImage.''
		);
	    }

	    if($mediaservice->has($mediapath) == 1)
	    {
		$mediapathComplete = $mediaservice->getUrl($mediapath);
	    }
	$articleImg = $mediapathComplete;
	$controller->View()->assign('af_dp_image', $articleImg);
    }

}
