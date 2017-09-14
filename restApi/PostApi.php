<?php
namespace app\restApi;

use app\restApi\ApiInterface;
use app\restApi\ServiceDelegate;
use app\restApi\Services;
use app\restApi\RequestType;
use yii\helpers\Json;
use app\restApi\CurlRequest;

/**
 * 
 * @author sushil
 * This class handles Post request
 */
class PostApi implements ApiInterface
{
	/**
	 * 
	 */
	public static function prepareRequestdata($serviceDelegateObject,$resquestInputDetail,$encodingType)
	{
	
		if($resquestInputDetail != null)
		{
			if($encodingType == Services::JSONEncodingType)
			{
               $serviceDelegateObject->requestData  = Json::encode($resquestInputDetail);
		    }
			else if($encodingType  == Services::urlEncodedRequestData)
			{
		         if(!is_array($resquestInputDetail))
					$serviceDelegateObject->requestData  = get_object_vars($resquestInputDetail);
				 else
				    $serviceDelegateObject->requestData  = $resquestInputDetail;
						
					$serviceDelegateObject->requestData  = http_build_query($serviceDelegateObject->requestData);
		    }
		    else
			{
					
			}
		}
		
		
	}
	/**
	 * 
	 */
	public static function callApi($serviceDelegateObject)
	{
		$request = new CurlRequest($serviceDelegateObject);
		$request->execute();
		$serviceDelegateObject->responseFromServer = $request->responseBody;
		$serviceDelegateObject->responseInfo = $request->responseInfo;
    }
	/**
	 * 
	 */
	public static function prepareResponsedata($serviceDelegateObject)
	{
		if($serviceDelegateObject->acceptType == Services::JSONEncodingType && $serviceDelegateObject->responseFromServer!="")
		{
			 $jsonObject = Json::decode($serviceDelegateObject->responseFromServer,true);
		     return $jsonObject;  		
		}
		else 
		 return $service->responseFromServer;
		
	}
}