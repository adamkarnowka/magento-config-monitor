<?php

class Creativestyle_Configmonitor_Block_Adminhtml_Grid_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {

        parent::__construct();
        $this->setId('config_monitor_grid');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('creativestyle_configmonitor/record')->getCollection();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }


    protected function _prepareColumns()
    {
        $this->addColumn('configmonitor_id', array(
            'header'    => Mage::helper('creativestyle_configmonitor')->__('ID'),
            'width'     => '30px',
            'index'     => 'configmonitor_id',
            'align'     => 'center',
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('creativestyle_configmonitor')->__('Created at'),
            'width'     => '90px',
            'index'     => 'created_at',
            'align'     => 'center',
            'type'      => 'datetime'
        ));

        $this->addColumn('path', array(
            'header'    => Mage::helper('creativestyle_configmonitor')->__('Config path'),
            'width'     => '130px',
            'index'     => 'path',
            'align'     => 'left',
            'frame_callback' => array($this, 'courierFont'),
        ));

        $this->addColumn('value_before', array(
            'header'    => Mage::helper('creativestyle_configmonitor')->__('Value before'),
            'width'     => '130px',
            'index'     => 'value_before',
            'align'     => 'left',
        ));

        $this->addColumn('value_after', array(
            'header'    => Mage::helper('creativestyle_configmonitor')->__('Value after'),
            'width'     => '130px',
            'index'     => 'value_after',
            'align'     => 'left',
        ));

        $this->addColumn('user', array(
            'header'    => Mage::helper('creativestyle_configmonitor')->__('User'),
            'width'     => '130px',
            'index'     => 'created_by_user',
            'align'     => 'left',
        ));

        return parent::_prepareColumns();
    }

    public function courierFont($value, $row)
    {
        $html = '<span style="font-family: Courier New, Courier;">'.$value.'</span>';

        return $html;
    }

    protected function _prepareMassaction()
    {
        return $this;
    }

    public function getRowUrl($row)
    {
        return "#";//$this->getUrl('*/*/index', array('id' => $row->getId(), "name"=> base64_encode($row->getName()),"since"=>base64_encode($row->getData("since_")),"till"=>base64_encode($row->getData("till_"))));
    }

}