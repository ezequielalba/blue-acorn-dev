<?php
/**
 * Copyright © Blue Acorn iCi && Ezequiel Alba github@ezequielalba
 * Use of this material is prohibited without written approval of the author.
 */

namespace RedAlmond\Cms\Setup\Patch\Data;

use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

/**
 * Class NewPage
 * @package RedAlmond\Cms\Setup\Patch\Data
 */
class NewPage implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
 
    /**
     * @var PageFactory
     */
    private $pageFactory;
 
    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageFactory $pageFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PageFactory $pageFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->pageFactory = $pageFactory;
    }

    public function apply()
    {
        $cmsContent = '
            <h1>BUTTONS</h1>
            <div class="grid">
                <div class="col">
                    <button class="button load-more" type="button">
                        <span><span>Load More</span></span>
                    </button>
                </div>
                <div class="col">
                    <button class="button back-to-shop" title="Back To Shop" type="button">
                        <span><span>Back To Shop</span></span>
                    </button>
                </div>
                <div class="col">
                    <button class="button checkout" type="button">
                        Checkout
                    </button>
                </div>
            </div>
        ';

        $cmsPageData = [
            'title' => 'Red Almond Custom Buttons',
            'page_layout' => '1column',
            'meta_keywords' => 'Blue Acorn iCi Dev Test',
            'meta_description' => 'Red Almond Custom Buttons',
            'identifier' => 'buttons-custom-page',
            'content_heading' => '',
            'content' => $cmsContent,
            'layout_update_xml' => '',
            'url_key' => 'red-almond-custom-buttons',
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
        ];
 
        $this->moduleDataSetup->startSetup();
        $this->pageFactory->create()->setData($cmsPageData)->save();
        $this->moduleDataSetup->endSetup();
    }
 
    public static function getDependencies()
    {
        return [];
    }
 
    public static function getVersion()
    {
        return '1.0.0';
    }
 
    public function getAliases()
    {
        return [];
    }
}