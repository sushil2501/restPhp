<?php
namespace app\restApi;

/**
 * 
 * @author sushil
 *
 */
class CurlRequest
{
	public $url;
	public $verb;
	public $service;
	public $timestamp;
	public $responseBody;
	public $responseInfo;
	public $curlObject;
	
    public function __construct ($serviceDelegate = null,$timestamp =null)
	{
		$this->verb				= $serviceDelegate->requestVerb;
		$this->service		    = $serviceDelegate;
		$this->timestamp		= $timestamp;
	}
	
	
   public function execute ()
	{
		try
		{
			switch (strtoupper($this->verb))
			{
				case 'GET':
					$this->executeGet();
					break;
				case 'POST':
					$this->executePost();
					break;
				case 'PUT':
					$this->executePut();
					break;
				case 'DELETE':
					$this->executeDelete();
					break;
				default:
					throw new InvalidArgumentException('Current verb (' . $this->verb . ') is an invalid REST verb.');
			}
		}
		catch (InvalidArgumentException $e)
		{
			curl_close( $this->curlObject);
			throw $e;
		}
		catch (Exception $e)
		{
			curl_close( $this->curlObject);
			throw $e;
		}
	}
	
	public function intializeCurlRequest()
	{
		$this->curlObject = curl_init();
		curl_setopt( $this->curlObject, CURLOPT_TIMEOUT, 120);
		curl_setopt( $this->curlObject, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $this->curlObject, CURLOPT_URL, $this->service->serviceUrl);
	}
	
	public function executeGet ()
	{
	    $this->intializeCurlRequest();	
		$headers = array(
				'Accept:'.$this->service->acceptType,
				'Content-Type:'.$this->service->contentType,
				'timestamp:'.$this->service->timestamp,
				'hash:'.$this->service->hashKey,
				'api_key:'.$this->service->apiKey,
				'authtoken:'.$this->service->authToken
		);
		curl_setopt( $this->curlObject, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt( $this->curlObject, CURLOPT_HTTPHEADER, $headers);
		$this->executeRequest();

	}
	
	public function executePost ()
	{
	
		$data = $this->service->requestData;
		$this->intializeCurlRequest();
		curl_setopt( $this->curlObject, CURLOPT_POST, 1);
        curl_setopt( $this->curlObject, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt( $this->curlObject, CURLOPT_POSTFIELDS, $data);
		$headers = array(
				'Content-Type:'.$this->service->contentType,
				'Content-Length:'.strlen($data),
				'timestamp:'.$this->service->timestamp,
				'hash:'.$this->service->hashKey,
				'api_key:'.$this->service->apiKey,
				'authtoken:'.$this->service->authToken
		);
		curl_setopt( $this->curlObject, CURLOPT_HTTPHEADER, $headers);
		$this->executeRequest();
	}
	
	
	public function executePut ()
	{
	   
		$data = $this->service->requestData;
		
		$this->intializeCurlRequest();
		curl_setopt( $this->curlObject, CURLOPT_POST, 1);
		curl_setopt( $this->curlObject, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt( $this->curlObject, CURLOPT_POSTFIELDS, $data);
		$headers = array(
				'Content-Type:'.$this->service->contentType,
				'Content-Length:'.strlen($data),
				'timestamp:'.$this->service->timestamp,
				'hash:'.$this->service->hashKey,
				'api_key:'.$this->service->apiKey,
				'authtoken:'.$this->service->authToken
		);
		curl_setopt( $this->curlObject, CURLOPT_HTTPHEADER, $headers);
		$this->executeRequest();
	}
	
	public function executeDelete ()
	{
		$this->intializeCurlRequest();
		$headers = array(
				'Accept:'.$this->service->acceptType,
				'Content-Type:'.$this->service->contentType,
				'timestamp:'.$this->service->timestamp,
				'hash:'.$this->service->hashKey,
				'api_key:'.$this->service->apiKey,
				'authtoken:'.$this->service->authToken
		);
		curl_setopt( $this->curlObject, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt( $this->curlObject, CURLOPT_HTTPHEADER, $headers);
		$this->executeRequest();
	}
	
	public function executeRequest()
	{
		$this->responseBody = curl_exec($this->curlObject);
		$this->responseInfo = curl_getinfo($this->curlObject);
		curl_close( $this->curlObject);
	}
	
}