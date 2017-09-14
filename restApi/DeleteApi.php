<?php
namespace  app\restApi;

use  app\restApi\ApiInterface;
use  app\restApi\ServiceDelegate;
use  app\restApi\Services;
use  app\restApi\RequestType;
use  yii\helpers\Json;
use  app\restApi\CurlRequest;

/**
 * 
 * @author sushil
 *
 */

class DeleteApi implements ApiInterface 
{
	/**
	 * 
	 * @param unknown $serviceDelegateObject
	 * @param unknown $resquestInputDetail
	 */
	public static function prepareRequestdata($serviceDelegateObject,$resquestInputDetail,$encodingType)
	{
		
	
		if(!is_array($resquestInputDetail))
			$serviceDelegateObject->requestData =  get_object_vars($resquestInputDetail);
		else
			$serviceDelegateObject->requestData =  $resquestInputDetail;
		  
		  if($encodingType == Services::postParamString)
		  {
		    $serviceDelegateObject->requestData = "?".http_build_query($serviceDelegateObject->requestData);
		    $serviceDelegateObject->serviceUrl =  $serviceDelegateObject->serviceUrl.$serviceDelegateObject->requestData;
		  }
		  else 
		  {
		  	$paramString = "";
		  	$count=0;
		  	foreach ($serviceDelegateObject->requestData as $key => $value)
		  	{
		  		if($count==0)
		  			$paramString = $paramString.$value;
		  		else
		  			$paramString = $paramString."/".$value;
		  	
		  		$count=$count+1;
		  	}
		      $serviceDelegateObject->requestData = "/".$paramString;
		  	  $serviceDelegateObject->serviceUrl =  $serviceDelegateObject->serviceUrl.$serviceDelegateObject->requestData;
		  }
	}
	/**
	 * 
	 * @param unknown $serviceDelegateObject
	 */
	public static function callApi($serviceDelegateObject)
	{
		$request = new CurlRequest($serviceDelegateObject);
		$request->execute();
		$serviceDelegateObject->responseFromServer = $request->responseBody;
    }
    /**
     * 
     * @param unknown $serviceDelegateObject
     * @return unknown
     */
	public static function prepareResponsedata($serviceDelegateObject)
	{
		if($serviceDelegateObject->acceptType == Services::JSONEncodingType && $serviceDelegateObject->responseFromServer!="")
		{
			$jsonObject = Json::decode($serviceDelegateObject->responseFromServer,true);
			return $jsonObject;
		}
		else
			return $serviceDelegateObject->responseFromServer;
	}
}
