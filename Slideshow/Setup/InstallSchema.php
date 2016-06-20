<?php
namespace Training\Slideshow\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface{
    
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
        $installer = $setup;
        $installer->startSetup();
 
        /*
         * Drop tables if exists
         */
        $installer->getConnection()->dropTable($installer->getTable('training_slideshow_slider'));
        $installer->getConnection()->dropTable($installer->getTable('training_slideshow_banner'));
        /*
         * Create table 'training_slider'
         */
        $table = $installer->getConnection()->newTable($installer->getTable('training_slideshow_slider'))
                ->addColumn(
                        'slider_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Slide ID')
                ->addColumn(
                        'title',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false, 'default' => ''],
                        'Slider title')
                ->addColumn(
                        'status',
                        \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                        null,
                        ['nullable' => false, 'default' => '1'],
                        'Slider status')
                ->addColumn(
                        'created_time',
                        \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                        null,
                        ['nullable' => false],
                        'Created time')
                ->addColumn(
                        'updated_time',
                        \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                        null,
                        ['nullable' => false],
                        'Update time')
                ->addIndex(
                        $installer->getIdxName('training_slideshow_slider', ['slider_id']),['slider_id']
                        )
                ->addIndex(
                        $installer->getIdxName('training_slideshow_slider', ['status']),['status']
                        )
                ->addIndex(
                        $installer->getIdxName('training_slideshow_slider', ['title']),['title']
                        );
        $installer->getConnection()->createTable($table);
        /*
         * End create table training_slideshow_slider
         */
        
        /*
         * Create table training_slideshow_banner
         */
        $table = $installer->getConnection()->newTable($installer->getTable('training_slideshow_banner'))
                ->addColumn(
                        'banner_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Banner ID')
                ->addColumn(
                        'slider_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        ['nullable' => true],
                        'Slider ID')
                ->addColumn(
                        'image',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false, 'default' => ''],
                        'Banner image')
                ->addColumn(
                        'url',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => true, 'default' => ''],
                        'Url image')
                ->addColumn(
                        'order_banner',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        ['nullable' => true, 'default' => 0],
                        'Banner order')
                ->addColumn(
                        'status',
                        \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                        null,
                        ['nullable' => false, 'default' => '1'],
                        'Banner status')
                ->addColumn(
                        'created_time',
                        \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                        null,
                        ['nullable' => false],
                        'Created time')
                ->addColumn(
                        'updated_time',
                        \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                        null,
                        ['nullable' => false],
                        'Updated time')
                ->addIndex(
                        $installer->getIdxName('training_slideshow_banner', ['banner_id']),['banner_id']
                        )
                ->addIndex(
                        $installer->getIdxName('training_slideshow_banner', ['status']),['status']
                        );
        $installer->getConnection()->createTable($table);
        /*
         * End create table training_slideshow_slider
         */
        $installer->endSetup();
    }
    
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
        
        $installer = $setup;
        $installer->startSetup();
        //Add custom field slider id to CMS Page
        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $tableName = $installer->getTable('cms_page');
            $connection = $installer->getConnection();
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $connection = $installer->getConnection();
                $connection->addColumn(
                    $tableName,
                    'slider_id',
                    ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,'nullable' => false, 'default' => '', 'afters' => 'custom_theme_to'],
                    'Slider Id'
                        );
            }
            
        }

        $installer->endSetup();
    }
}

?>