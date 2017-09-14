<?php
namespace app\restApi;

use app\restApi\RestUrl;
use yii\web\Response;
use app\enum\Config;
/**
 * @author sushil
 * service class for api calling.
 */
class Services
{
	/** encoding type**/
	const JSONEncodingType 		=  "application/json";
	const XMLEncodingType  		=  "application/xml";
	const urlEncodedRequestData =  "application/x-www-form-urlencoded";
	const postParamString 		=  "postString";   // www.abc.com?1id =3s
    const paramQueryString		=  "queryString"; // www.abc.com/11/3s
    /**/
	
	/*url **/
    //const  recovryurl 			=  "http://ec2-52-41-13-64.us-west-2.compute.amazonaws.com/api/index.php";
	//const  recovryurl 			=  "http://uat.recovry.com/api/index.php";


	const  recovryurl 				=  Config::ApiPath;
	const  products   		 		=  "products";
	const  productcode 	 			=  "productcode";
	const  productsummary   		=  "productsummary";
	const  alerts	 	 			=  "alert";
	const  producttype		 		=  "producttype";
	const  activate      			=  "activate";
	const  action		 			=  "action";
	const  getActionByProduct  		=  "actionByProduct";
	const  actionsummary			=  "actionsummary";
	const  alertsummary     		=  "alertsummary";
    const  dashboardsummary			=  "dashboardsummary";
    const  ProcessPayment			=  "ProcessPayment";
    const  getuser     		    	=  "getuser";
    const  tempproduct				=  "tempproduct";
    const  voucher					=  "voucher";
    const  uservoucher				=  "uservoucher";
    const  saveproductbyvoucher 	=  "saveproductbyvoucher";
    const  verifyvoucher			=  "verifyvoucher";
    const  voucherGift         		=  "vouchergift";
    const  renew					=  "renew";
    const  renewproductbyvoucher	=  "renewproductbyvoucher";
    const  recurringproduct			=  "recurringproduct";
    const  savefreeproduct 			=  "savefreeproduct";
    const  saveemail				=  "saveemail";
    const  configuration			=  "configuration";
    const  alertsByparam			=  "alertsByparam";
	/**
	 * 
	 * @var unknown
	 */
	public static $services = array( 
			                           //------------ productServices ------------------//
	                     Services::products 				=> 	array("ApiName"=>"/product","APIURL"=>Services::recovryurl),
			             Services::productcode 				=> 	array("ApiName"=>"/product/code","APIURL"=>Services::recovryurl),
		                 Services::producttype 				=> 	array("ApiName"=>"/producttype","APIURL"=>Services::recovryurl),
			             Services::productsummary 			=> 	array("ApiName"=>"/product/summary","APIURL"=>Services::recovryurl),
			             Services::alerts 					=> 	array("ApiName"=>"/alert","APIURL"=>Services::recovryurl),
                         Services::activate 				=> 	array("ApiName"=>"/product/activate","APIURL"=>Services::recovryurl),
						 Services::action 					=> 	array("ApiName"=>"/action","APIURL"=>Services::recovryurl),
						 Services::getActionByProduct		=> 	array("ApiName"=>"/action/product","APIURL"=>Services::recovryurl),
                         Services::alertsummary				=> 	array("ApiName"=>"/alert/summary","APIURL"=>Services::recovryurl),
						 Services::alertsByparam   			=>  array("ApiName"=>"/alert/byparam","APIURL"=>Services::recovryurl),
			             Services::actionsummary			=> 	array("ApiName"=>"/action/summary","APIURL"=>Services::recovryurl),
						 Services::dashboardsummary			=> 	array("ApiName"=>"/dashboard","APIURL"=>Services::recovryurl),
			             Services::ProcessPayment 			=> 	array("ApiName"=>"/payment/process","APIURL"=>Services::recovryurl),
						 Services::getuser					=>	array("ApiName"=>"/user","APIURL"=>Services::recovryurl),
						 Services::tempproduct				=>	array("ApiName"=>"/product/temp","APIURL"=>Services::recovryurl),
						 Services::voucher					=>	array("ApiName"=>"/voucher","APIURL"=>Services::recovryurl),
						 Services::uservoucher				=>	array("ApiName"=>"/voucher/user","APIURL"=>Services::recovryurl),
						 Services::saveproductbyvoucher		=>	array("ApiName"=>"/voucher/product","APIURL"=>Services::recovryurl),
						 Services::verifyvoucher			=>	array("ApiName"=>"/voucher/verify","APIURL"=>Services::recovryurl),
			             Services::voucherGift				=>	array("ApiName"=>"/voucher/gift","APIURL"=>Services::recovryurl),
						 Services::renew					=>	array("ApiName"=>"/product/renew","APIURL"=>Services::recovryurl),
						 Services::renewproductbyvoucher	=>	array("ApiName"=>"/voucher/renewproduct","APIURL"=>Services::recovryurl),
						 Services::recurringproduct			=>	array("ApiName"=>"/product/recurringproduct","APIURL"=>Services::recovryurl),
						 Services::savefreeproduct			=>	array("ApiName"=>"/product/free","APIURL"=>Services::recovryurl),
						 Services::saveemail		    	=>	array("ApiName"=>"/user/useremail","APIURL"=>Services::recovryurl),
						 Services::configuration   			=> array("ApiName"=>"/configuration","APIURL"=>Services::recovryurl),
							
	);
	
}
?>