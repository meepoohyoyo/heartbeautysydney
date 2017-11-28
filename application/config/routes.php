<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['home'] = 'home/page';
$route['admin'] = 'admin';
$route['shoppage'] = 'home/page';
// $route['login'] = 'home/login';
$route['report'] = 'admin/report';
$route['register'] = 'Customer/createuser';
$route['registeruser'] = 'Customer/createuser_action';
$route['newpayment'] = 'payment/create';
$route['clientpayment'] = 'Payment/create';
$route['clientpayment_action'] = 'Payment/create_action';
$route['shoppingbags'] = 'shoppingbagclient';
$route['detail/(:num)'] = 'detail/read/$1';
$route['add-to-cart/(:num)'] = 'Product/add_to_cart/$1';
$route['bagdelete/(:num)'] = 'shoppingbagclient/bagdelete/$1';
$route['allorders'] = 'shoppingbagclient/order_all';
$route['submitbag'] = 'shoppingbagclient/submitbag';
$route['skincare'] = 'home/skincare';
$route['supplementary'] = 'home/supplementary';
$route['body'] = 'home/body';
$route['user/info'] = 'Customer/getUserInfo';
$route['report/sale'] = 'admin/getSaleReport';
$route['report/best-sale'] = 'admin/getBestSaleReport';
$route['report/payment'] = 'admin/getPaymentReport';
// order route
// ยืนยัน slip เงิน
$route['order/confirm/(:num)']= 'order/confirmOrder/$1';
// ยืนยัน การส่ง
$route['order/complete/(:num)']= 'order/completeOrder/$1';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
