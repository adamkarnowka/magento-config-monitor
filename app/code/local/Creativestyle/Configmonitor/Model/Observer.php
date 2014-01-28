<?php

class Creativestyle_Configmonitor_Model_Observer {

    private function flattenObject($object){
        $arr = array();
        if(is_array($object) or $object instanceof Traversable){
            foreach($object as $key=>$value){
                if(is_object($value)||is_array($value))continue;
                $arr[$key] = $value;
            }
        }

        return $arr;
    }

    public function before_save($observer){
        if(Mage::app()->getStore()->isAdmin()){

              if($observer->getObject()->getPath()!=''){
                $oldData = Mage::getModel('core/config_data')->load($observer->getObject()->getId());
                $arrAfter = $this->flattenObject($observer->getObject()->getData());

                if($oldData->getValue()!=$arrAfter['value']){
                    $data = array('config_initialized' => 0,
                                  'path' => $arrAfter['path'],
                                  'store_code'=>$arrAfter['store_code'],
                                  'value_before' => $oldData->getValue(),
                                  'value_after' => $arrAfter['value'],
                                  'created_at' => Mage::getModel('core/date')->date('Y-m-d H:i:s'),
                                  'store_code' => $arrAfter['store_code'],
                                  'config_initialized'=>0,
                                  'created_by_user' => Mage::getSingleton('admin/session')->getUser()->getUsername()
                    );

                    if(!$oldData->getConfigId()){
                        $data['config_initialized'] = 1;
                    }

                    $record = Mage::getModel('creativestyle_configmonitor/record');
                    $record->setId(NULL)->setData($data);
                    $record->save();
                }
            }
        }
    }
}