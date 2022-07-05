<?php
/** 
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

 if(!defined('_PS_VERSION_')){
    exit;
 }

 // main class

 class MyFirstModule extends Module {

    // constructor 

    public function __construct()
    {
        $this->name  = "myfirstmodule";
        $this->tab  = "front_office_features";
        $this->vession = "1.0";
        $this->author = "AENG Tech";
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            "min" => "1.6",
            "max" => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName =  $this->l("My very first module");
        $this->description = $this->l("This is a great testing module");
        $this->confirmUninstall = $this->l("Are you crazy?");  
    }

    //instal 
    public function install()
    {
        return parent::install() 
        && $this->registerHook('registerGDPRconsent')
        && $this->dbInstall();
    }

    //uninstall method
    public function uninstall()
    {
        return parent::uninstall();
    }

    //sql install

    public function dbInstall()
    {
        //sql query that create certain table
        return true;
    }

    public function hookdisplayFooter($params)
    {
        $this->context->smarty->assign(array(
            'MYMODULE_STR' => configuration::get('MYMODULE_STR')
        ));
        $this->context->controller->addCSS(array(
            $this->_path.'views/css/myfirstmodule.css'
        ));
        $this->context->controller->addJS(array(
            $this->_path.'views/js/myfirstmodule.js'
        ));
        return $this->display(__FILE__, 'views/templates/hook/footer.tpl');
    }

   public function getContent()
   {
    if(Tools::isSubmit('savetest'))
    {
        $name = Tools::getValue('print');
        configuration::updateValue('MYMODULE_STR', $name);
    }
    $this->context->smarty->assign(array(
        'MYMODULE_STR' => configuration::get('MYMODULE_STR')
    ));
    return $this->display(__FILE__, 'views/templates/admin/configure.tpl');

   }
 }