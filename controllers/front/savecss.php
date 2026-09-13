<?php

/**
 * BO Dark Mode - Module for PrestaShop BackOffice
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT
 *
 * @version 1.2.0
 * @author Rocket Team
 * @copyright 2025-26 Adorade
 * @license MIT License
 */

/**
 * Bodarkmode Save CSS Module Front Controller.
 *
 * This controller handles saving the generated CSS from DarkReader to a file.
 * It expects a JSON input with the CSS content.
 */
class BodarkmodeSavecssModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        header('Content-Type: application/json');
        $rawInput = file_get_contents('php://input');
        $input = json_decode($rawInput, true);

        if (isset($input['css'])) {
            $css = $input['css'];
            $file = _PS_MODULE_DIR_ . 'bodarkmode/views/css/generated.css';
            file_put_contents($file, $css);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No CSS provided']);
        }
        exit;
    }
}
