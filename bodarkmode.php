<?php
/**
 * BO Dark Mode - Module for PrestaShop back office
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 *
 * @version 1.3.0-dev
 * @author Rocket Team
 * @copyright 2025-26 Adorade
 * @license http://opensource.org/licenses/mit-license.php MIT License
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
        $this->version = '1.3.0-dev';
        $this->author = 'Rocket Team';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->ps_versions_compliancy = ['min' => '1.7.0.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->trans('BO Dark Mode', [], 'Modules.Bodarkmode.Admin');
        $this->description = $this->trans('Just a Simple Dark Mode Module for PrestaShop back office', [], 'Modules.Bodarkmode.Admin');
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Bodarkmode.Admin');
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayBackOfficeHeader');
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
}
