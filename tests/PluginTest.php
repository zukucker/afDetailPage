<?php

namespace afDetailPage\Tests;

use afDetailPage\afDetailPage as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'afDetailPage' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['afDetailPage'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
