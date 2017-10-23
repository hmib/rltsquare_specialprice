<?php

class RLTS_PriceCountDown_Model_Observer {
    
    
    public function priceCounter($observer){
        if(Mage::getStoreConfig('pricecountdown/price_countdown_config/if_enabled') && Mage::getStoreConfig('pricecountdown/price_countdown_config/show_in_list')){
        if(Mage::app()->getRequest()->getControllerName() == 'category' || Mage::app()->getRequest()->getControllerName() == 'result'){
            $_block = $observer->getBlock();
           
            $_type = $_block->getType();
           
            if ($_type == 'catalog/product_price' || $_type == 'bundle/catalog_product_price') {
                
                $productid = $_block->getProduct()->getEntityId();
                $timerview =Mage::app()->getLayout()->createBlock('pricecountdown/countdown_view')
                        ->setProduct($_block->getProduct())->setTemplate('RLTS/countdown/counter.phtml');
                $price = clone $_block;
                $price->setType('core/template');
                $_block->setChild('price_block'.$productid,$price);
                $_block->setChild('countdown_view'.$productid,$timerview);
                $_block->setproductId($productid)->setTemplate('RLTS/countdown/catalog_list.phtml');
              
            }
        }
        }
    }
    
    
   

    
}

