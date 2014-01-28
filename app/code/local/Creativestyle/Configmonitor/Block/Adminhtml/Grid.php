<?php
class Creativestyle_Configmonitor_Block_Adminhtml_Grid  extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_grid';
        $this->_blockGroup = 'creativestyle_configmonitor';
        $this->_headerText = Mage::helper('creativestyle_configmonitor')->__('Config data variables and their changes');

        parent::__construct();
        $this->_removeButton('add');
    }
}