<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('getThaiOrder'))
{
  function getThaiOrder($order)
  {
      if($order==="ordering"){
          return "<span class=\"badge\">1</span>รอแจ้งการชำระเงิน";
      }elseif($order==="wait_confirm"){
          return "<span class=\"badge badge-wait_confirm\">2</span>รอตรวจสอบการชำระเงิน";
      }elseif($order==="confirm"){
          return "<span class=\"badge badge-confirm\">3</span>รอจัดส่ง";
      }elseif($order==="complete"){
          return "<span class=\"badge badge-complete\">4</span>จัดส่งแล้ว";
      }
   return "";
  }
}
