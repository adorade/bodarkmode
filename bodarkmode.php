<?php
/**
 * BO Dark Mode Module for PrestaShop BackOffice
 *
 * @author Adorade
 * @copyright 2025 Adorade
 * @license MIT
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
