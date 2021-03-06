<?php

class CulqiChargeAjaxModuleFrontController extends ModuleFrontController
{

  public function initContent()
  {
    parent::initContent();
    $this->ajax = true;
  }

  public function displayAjax()
  {
    $result = $this->module->charge(Tools::getValue("token_id"), Tools::getValue("installments")); //$_POST["token_id"], $_POST["installments"]
    if($result->id) Configuration::updateValue($result->id,'generatedCulqi');
    die(Tools::jsonEncode($result));
  }


  public function displayAjaxOrder()
  { 
    error_log('Actualizando orden');
    $result = $this->module->updateOrder(Tools::getValue("order_id")); //$_POST["cart_id"]    
    if($result->id) Configuration::updateValue($result->id,'generatedCulqi');
    die(Tools::jsonEncode($result));
  }

}