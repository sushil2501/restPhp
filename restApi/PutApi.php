<?php
namespace  app\restApi;

use app\restApi\ApiInterface;
use app\restApi\ServiceDelegate;
use app\restApi\Services;
use app\restApi\RequestType;
use yii\helpers\Json;
use app\restApi\CurlRequest;
/**
 * 
 * @author sushil
 */
class PutApi implements ApiInterface
{
	/**
	 * 
	 */
	public static function prepareRequestdata($serviceDelegateObject,$resquestInputDetail,$encodingType)
	{
		if($resquestInputDetail != null)
		{
			if($encodingType== Services::JSONEncodingType)
			{
				$serviceDelegateObject->requestData   = Json::encode($resquestInputDetail);
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
	}
	/**
	 * 
	 */
	public static function prepareResponsedata($serviceDelegateObject)
	{
		//print_r($serviceDelegateObject);die;
		if($serviceDelegateObject->acceptType == Services::JSONEncodingType && $serviceDelegateObject->responseFromServer!="")
		{
			$jsonObject = Json::decode($serviceDelegateObject->responseFromServer,true);
			return $jsonObject;
		}
		else
			return $service->responseFromServer;
	}
	
	
}