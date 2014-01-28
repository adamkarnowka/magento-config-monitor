<?php

class Creativestyle_Configmonitor_Model_Resource_Record extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('creativestyle_configmonitor/cs_configmonitor', 'configmonitor_id');
    }
}