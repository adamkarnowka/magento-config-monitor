<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$sql = "CREATE TABLE `cs_configmonitor` (
`configmonitor_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`path` VARCHAR(255) NOT NULL,
	`config_initialized` TINYINT UNSIGNED NOT NULL,
	`store_code` VARCHAR(64) NOT NULL,
	`value_before` TEXT NOT NULL,
	`value_after` TEXT NOT NULL,
	`created_by_user` VARCHAR(64) NOT NULL,
	`created_at` DATETIME NOT NULL,
	PRIMARY KEY (`configmonitor_id`)
)
COMMENT='Table which stores config_data fields changes log'
COLLATE='utf8_general_ci'
ENGINE=MyISAM;";

$installer->run($sql);
$installer->endSetup();