<?php

namespace Dcs\Paymentsurcharge\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

		$setup->getConnection()->addColumn(
            $setup->getTable('quote'),
            'paymentsurcharge',
            'DECIMAL(12,4)'
        );
		
        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order'),
            'paymentsurcharge',
            'DECIMAL(12,4)'
        );
       
        $setup->getConnection()->addColumn(
            $setup->getTable('sales_invoice'),
            'paymentsurcharge',
            'DECIMAL(12,4)'
        );
        
        $installer->endSetup();
    }
}