<?php
namespace app\restApi;
use app\restApi\ServiceDelegate;
use app\restApi\GetApi;
use app\restApi\PostApi;
use app\restApi\PutApi;
use app\restApi\DeleteApi;

class APIFactory
{
	
   public function runAPI($serviceDelegateObject, $resquestInputDetail, $encodingType)
	{
	
		$serviceType  = new $serviceDelegateObject->serviceClassName();
		$serviceType->prepareRequestdata($serviceDelegateObject,$resquestInputDetail,$encodingType);
		$serviceType->callApi($serviceDelegateObject);
	    return  $serviceType->prepareResponsedata($serviceDelegateObject);
    }
}