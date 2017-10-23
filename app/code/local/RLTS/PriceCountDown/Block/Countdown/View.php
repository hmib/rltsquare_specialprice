<?php

 class RLTS_PriceCountDown_Block_Countdown_View extends Mage_Core_Block_Template{
     
     public function getProduct(){
        if ($this->hasData('product')) {
            $product = $this->getData('product');
            return $product;
        } else {
            if (!Mage::registry('product') && $this->getProductId()) {
                $product = Mage::getModel('catalog/product')->load($this->getProductId());
                Mage::register('product', $product);
            }
            return $product;
        }
    }

 }