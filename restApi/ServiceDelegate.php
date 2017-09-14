<?php
namespace app\restApi;

use app\restApi\Services;
use app\restApi\RequestType;
use app\restApi\APIFactory;

/**
 * 
 * @author sushil
 * This class contains the information related to the api requests
 *  acceptType  "json,xml,"
 *  contentType
 *  responseFromServer 
 *  serviceclassname "post,get,put,delete fqcn"
 *  serviceUrl   "create api url from name and url specified"
 *  paramType    
 */
class ServiceDelegate
{
	/*
	 * Request related parameters
	 */
	public $serviceUrl;
	public $serviceClassName;            // post,get,put,delete fqcn  
	public $acceptType;                  // acceptType
	public $contentType;                 // contentType
    public $requestVerb;                 // post,get,put,delete
    public $requestData;                 // data wich is to be sent             
    public $encodingType;                // Get Api paramtype encoding  
    
    //Response related parameters
    public $responseFromServer;          // responseFromServer
    public $responseInfo;                // resonse info from the server
    public $timestamp;
    public $apiKey;
    public $hashKey;
    public $authToken;
    
    /**
     * 
     * @param  $service
     * @param  $requestType
     * @param  $acceptType
     * @param  $contentType
     */
    
    public function __construct($serviceName,$requestType,$contentType = Services::JSONEncodingType,$acceptType = Services::JSONEncodingType) 
	{ 

		$service 	=  Services::$services[$serviceName];
		$request 	=  RequestType::$requestType[$requestType];
		$this->serviceUrl			= 	$service["APIURL"] .$service["ApiName"];
	    $this->serviceClassName		= 	$request["serviceClass"];
	    $this->requestVerb          =   $request["verb"];
		$this->acceptType			=	$acceptType;
		$this->contentType			=   $contentType;
		$this->timestamp			=	date("Y:m:d-h:m:s");
		
		$access = Access::$access[Access::CustomerAccess];
		$stringToSign = $access['apiKey'] . $access['apiSecret'].$this->timestamp;
		$sha256 = hash('sha256', $stringToSign, true);
		$hash = bin2hex($sha256);
		$this->apiKey = $access['apiKey'];
		$this->hashKey = $hash;
		$this->authToken = $_SESSION['authToken'];
   }
   
   public function fireApi($resquestInputDetail = array(),$encodingType = Services::JSONEncodingType)
   {
   	  	 $api = new APIFactory();
   	  	 return $api->runAPI($this, $resquestInputDetail,$encodingType);
   }
	
}