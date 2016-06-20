<?php
namespace Training\Slideshow\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
        
        $installer = $setup;
        $installer->startSetup();
        //Add custom field slider id to CMS Page
        if (version_compare($context->getVersion(), '1.0.2') < 0) {
            $tableName = $installer->getTable('cms_page');
            $connection = $installer->getConnection();
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $connection = $installer->getConnection();
                $column = [
                    'type' => Table::TYPE_INTEGER,
                    'length' => 10,
                    'nullable' => true,
                    'comment' => 'Slider id of Training_Slideshow',
                    'default' => '0'
                ];
                $connection->addColumn($tableName, 'slider_id', $column);
            }
            
        }

        $installer->endSetup();
    }
}

?>