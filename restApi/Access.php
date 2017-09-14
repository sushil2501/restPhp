<?php
namespace app\restApi;
/**
 * 
 * @author sushil
 *
 */
use yii;


class Access
{

  const CustomerAccess = "CustomerAccess";
  public static $access = array
  (
   	 Access::CustomerAccess => array("apiKey"=>"3b3b3kifnewj4nrif9f9","apiSecret"=>"2j2494c973e1e00fbd96871"),
  );
}
?>