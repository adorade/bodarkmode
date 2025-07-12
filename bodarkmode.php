<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *
 * Don't forget to prefix your containers with your own identifier
 * to avoid any conflicts with others containers.
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class Bodarkmode extends Module
{
    public function __construct()
    {
        $this->name = 'bodarkmode';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Adorade';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('BO Dark Mode', [], 'Modules.Bodarkmode.Admin');
        $this->description = $this->trans('Just a Simple Dark Mode Module for PrestaShop BackOffice', [], 'Modules.Bodarkmode.Admin');
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Module.Bodarkmode.Admin');

        $this->ps_versions_compliancy = ['min' => '1.7.0.0', 'max' => _PS_VERSION_];
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    /**
     * Add the CSS & JavaScript files you want to be loaded in the BO.
     */
    public function hookDisplayBackOfficeHeader()
    {
        // Adds CSS file from a module's directory
        $this->context->controller->addCSS($this->_path . 'views/css/back.css');

        // Adds JavaScript file from a module's directory
        $this->context->controller->addJS($this->_path . 'views/js/darkreader.js');
        $this->context->controller->addJS($this->_path . 'views/js/back.js');
    }

    /**
     * Get content for the module configuration page.
     */
    // public function getContent()
    // {
    //     $this->context->smarty->assign([
    //         'admin_token' => Tools::getAdminTokenLite('AdminModules'),
    //         'module_token' => Tools::getAdminTokenLite('AdminBodarkmodeSavecss'),
    //         'admin_dir' => basename(_PS_ADMIN_DIR_),
    //     ]);

    //     return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/configure.tpl');
    // }
}
