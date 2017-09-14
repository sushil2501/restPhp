<?php
namespace app\restApi;
/**
 * 
 * @author sushil
 *  APIInterface is the interface that should be implemented by a class .
 */
interface ApiInterface
{
	/**
	 * prepare data  which is to be send along with the Request
	 */
	public static function prepareRequestdata($serviceDelegateObject,$resquestInputDetail,$encodingType);
	
	/**
	 * calling of api processed by this function.
	 */
	public static function callApi($serviceDelegateObject);
	/**
	 * prepare response  on the basis of the data return by the api.
	 */
	public static function prepareResponsedata($serviceDelegateObject);
	
}