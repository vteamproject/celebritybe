<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load rest controller extenstion
require_once(APPPATH.'/libraries/REST_Controller.php');

/**
*
* API class for settings  
*
*/
class Authenticate_api extends REST_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model("users/User_model");
    }

    /**
    * post method for users
    * @param json post params
    * @return json  api response
    */
    public function auth_post()
	{
		try{
			$postParams  = $this->post();
			
			if(isset($postParams['password'])){
				$postParams['password'] = md5($postParams['password']);
			}

			$user_id 	= $this->User_model->userRegistration($postParams);
			$response 	= array('status'=>'success', 'message'=>'User registration successfull', 'user_id'=>$user_id);
			$this->response($response, parent::HTTP_OK);

		}catch(Exception $ex){
			
			if($ex->getCode() == 10){
				$message = $ex->getMessage();
			}else{
				$message = 'Unexpected error occurred';
			}

			$response = array('status'=>'error', 'message'=> $message);
			$this->response($response, parent::HTTP_INTERNAL_SERVER_ERROR);
		}
	}
    
}

?>