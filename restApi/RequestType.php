<?php
namespace app\restApi;

use yii\web\Response;

class RequestType
{
    const recovryPost   	 	= "recovryPost";
	const recovryPut     		= "recovryPut";
	const recovryDelete 		= "recovryDelete";
	const recovryGet    	 	= "recovryGet";
	
	/** class paths**/
	const  postServiceclass     = 'app\restApi\PostApi';
	const  getServiceclass      = 'app\restApi\GetApi';
	const  putServiceclass      = 'app\restApi\PutApi';
	const  DeleteServiceclass   = 'app\restApi\DeleteApi';
	
   public static $requestType = array
   (
	     RequestType::recovryPost=>array("serviceClass"=>RequestType::postServiceclass,"verb"=>"POST"),
	  	 RequestType::recovryGet =>array("serviceClass"=>RequestType::getServiceclass,"verb"=>"GET"),
	  	 RequestType::recovryPut =>array("serviceClass"=>RequestType::putServiceclass,"verb"=>"PUT"),
	  	 RequestType::recovryDelete=>array("serviceClass"=>RequestType::DeleteServiceclass,"verb"=>"DELETE")
   );
   
}