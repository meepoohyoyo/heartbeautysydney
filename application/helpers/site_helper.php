<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('getThaiOrder'))
{
  function getThaiOrder($order)
  {
      if($order==="ordering"){
          return "รอแจ้งการชำระเงิน";
      }elseif($order==="wait_confirm"){
          return "รอตรวจสอบการชำระเงิน";
      }elseif($order==="wait_send"){
          return "รอจัดส่ง";
      }elseif($order==="complete"){
          return "จัดส่งแล้ว";
      }
   return "";
  }
}
