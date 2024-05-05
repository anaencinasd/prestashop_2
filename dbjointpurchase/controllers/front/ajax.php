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
 * @author    DevBlinders <soporte@devblinders.com>
 * @copyright Copyright (c) DevBlinders
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

class DbJointPurchaseAjaxModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        $this->ajax = true;
        parent::initContent();
    }


    public function displayAjax()
    {
        $action = Tools::getValue('action');
        if ($action === 'show_products') {
            $id_product = (int)Tools::getValue('id_product');
            //$id_category = (int)Tools::getValue('id_category');
            $key = (int)Tools::getValue('key');
            $best_product = (int)Tools::getValue('best_product');
            $products = $this->module->getTopSellerByCategory($id_product);
            $modal = $this->module->renderJointModal($products, $key, $best_product, $id_product);
            die(Tools::jsonEncode(array('modal' => $modal)));
        }

        if ($action === 'change_product') {
            $id_product = (int)Tools::getValue('id_product');
            $key = (int)Tools::getValue('key');
            $product = $this->module->renderJointProduct($id_product, $key);
            die(Tools::jsonEncode(array('product' => $product)));
        }

        if ($action === 'saveSelectedProducts') {
            
            $idProduct = (int) Tools::getValue('id_product');
            $selectedProducts = Tools::jsonDecode(Tools::getValue('selectedProducts'), true);
            
           
            if ($idProduct && !empty($selectedProducts)) {
               
                $joint1 = isset($selectedProducts[0]) ? (int) $selectedProducts[0] : 0;
                $joint2 = isset($selectedProducts[1]) ? (int) $selectedProducts[1] : 0;
                $joint3 = isset($selectedProducts[2]) ? (int) $selectedProducts[2] : 0;
        
                
                $sql = 'INSERT INTO ' . _DB_PREFIX_ . 'dbjoint_products_custom (id_product, joint_1, joint_2, joint_3) 
                        VALUES (' . $idProduct . ', ' . $joint1 . ', ' . $joint2 . ', ' . $joint3 . ')
                        ON DUPLICATE KEY UPDATE joint_1 = VALUES(joint_1), joint_2 = VALUES(joint_2), joint_3 = VALUES(joint_3)';
        
                if (Db::getInstance()->execute($sql)) {
                    die('success');
                } else {
                    die('error');
                }
            } else {
                die('Invalid data');
            }
        }

       
        
               
        }
    }
    



