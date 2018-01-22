<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct() {

        parent::__construct(); 
        $this->load->model('User_model');
        $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
      * This function is used to load login view page
      * @return Void
      */
    public function login(){

        if(isset($_SESSION['user_details'])){
            redirect( base_url().'user/profile', 'refresh');
        }   
        // echo $hash = password_hash('@90vcbose', PASSWORD_BCRYPT);
        $this->load->admin_template('login');
        // $this->auth_user();
    }

	/**
     * This function is used for user authentication ( Working in login process )
     * @return Void
     */
	public function auth_user($page =''){ 
        
		$return = $this->User_model->auth_user();

		if(empty($return)) { 
			
			$this->session->set_flashdata('messagePr', 'Invalid details');	
            redirect( base_url().'user/login', 'refresh');  
        } else { 

			if($return == 'not_varified') {
				$this->session->set_flashdata('messagePr', 'This accout is not varified. Please contact to your admin..');
                redirect( base_url().'user/login', 'refresh');
			} else {
				$this->session->set_userdata('user_details',$return);
			}

            redirect( base_url().'user/profile', 'refresh');
        }
    }


    /**
     * This function is used to registr user
     * @return Void
     */
    public function registration(){

        if(isset($_SESSION['user_details'])){
            redirect( base_url().'user/profile', 'refresh');
        }

        //Check if admin allow to registration for user
        // if(setting_all('register_allowed')==1){
            if($this->input->post()) {
                $this->add_user();
                $this->session->set_flashdata('messagePr', 'Successfully Registered..');
            } else {

                $a_all_settings = setting_all();
                foreach ($a_all_settings as $s_key => $s_value) {
                    $a_settings[$s_value->setting_type][$s_value->setting_id] = $s_value->setting_name;
                }
                $a_all_plans = $this->User_model->getPlans();
                //echo "<pre>";print_r($a_all_plans);die;
                foreach ($a_all_plans as $p_key => $p_value) {
                    $a_plans[$p_value->plan_id] = $p_value->plan_name;
                }
                $this->load->admin_template('register', array('a_settings'=>$a_settings, 'plans'=>$a_plans));
            }
        /*}
        else {
            $this->session->set_flashdata('messagePr', 'Registration Not allowed..');
            // redirect( base_url().'user/login', 'refresh');
        }*/
    }

    public function add_user()
    {
        $user_id = '';
        if($this->input->post('register_submit')){
            if($this->input->post('user_name') && ($this->input->post('password') == $this->input->post('confirm_password')) ){
                $user_data['user_name'] = $this->input->post('user_name');
                $user_data['password']  = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $user_id                = $this->User_model->insertRow('cb_users', $user_data);
            }
            if($user_id != ''){
                $file_names     = count($_FILES['photos']['name']) > 0?json_encode(cb_fileUpload('photos')):'';
                $videos_urls    = ($this->input->post('videos') && !empty($this->input->post('videos')))?json_encode($this->input->post('videos')):'';

                $user_details['user_id']        = $user_id;
                $user_details['first_name']     = $this->input->post('first_name');
                $user_details['middle_name']    = $this->input->post('middle_name');
                $user_details['last_name']      = $this->input->post('last_name');
                $user_details['display_name']   = $this->input->post('first_name').' '.$this->input->post('middle_name').' '.$this->input->post('last_name');
                $user_details['dob']            = $this->input->post('dob');
                $user_details['gender']         = $this->input->post('gender');
                $user_details['nationality']    = 'india';
                $user_details['state']          = $this->input->post('state');
                $user_details['city']           = $this->input->post('city');
                $user_details['location']       = '';
                $user_details['address']        = $this->input->post('address');
                $user_details['phone']          = $this->input->post('phone_num');
                $user_details['mobile']         = $this->input->post('mobile_num');
                $user_details['email']          = $this->input->post('email');   
                $user_details['description']    = $this->input->post('description');
                $user_details['tags_interest']  = '';
                $user_details['photos']         = $file_names;
                $user_details['videos']         = $videos_urls;
                $user_details['links']          = '';
                $user_details['experiance']     = '';
                $user_details['subscription_id']= '';
                $user_details['modified_on']    = date('y-m-d h:i:a');
                $user_details['modified_by']    = '';

                $this->User_model->insertRow('cb_user_details', $user_details);

                $user_meta_details['user_id']   = $user_id;
                $user_meta_details['hair']      = $this->input->post('hair_colour');
                $user_meta_details['eye']       = $this->input->post('eye_colour');
                $user_meta_details['colour']    = $this->input->post('body_colour');
                $user_meta_details['body_type'] = $this->input->post('body_type');
                $user_meta_details['weight']    = $this->input->post('weight');
                $user_meta_details['height']    = $this->input->post('hight');

                $this->User_model->insertRow('cb_user_details_meta', $user_meta_details);

                if($this->input->post('talent_category[]')){
                    foreach ($this->input->post('talent_category[]') as $key => $value) {
                        $user_meta[] = array(
                                        'user_id'   => $user_id,
                                        'meta_name' => 'talent',
                                        'meta_value'=> $value
                                    );
                    }
                    $this->db->insert_batch('cb_user_meta', $user_meta);
                }
                
                if($this->input->post('plan')){
                    $plan_data['user_id']   = $user_id;
                    $plan_data['plan_id']   = $this->input->post('plan');
                    $this->User_model->insertRow('cb_subscriptions', $plan_data);    
                } 
            }
            
        }
    }

    public function getplandata()
    {
        if( $this->input->post('plan_id') != ''){
            $plan_id    = $this->input->post('plan_id');
            $res        = $this->User_model->getAllPlanData($plan_id);
            $a_responce   = array(); 
            foreach ($res as $key => $value) {
                $a_responce[$value['setting_name']] = $value['feature_value'];
            }
            echo json_encode($a_responce);
            die;
        }
    }

    public function checkUserName()
    {
        if($this->input->post('user_name')){
            $check = $this->User_model->check_exists('cb_users', 'user_name', $this->input->post('username'));
            if(!$check){
                echo json_encode("Aready Taken");
            }else{
                echo "true";
            }
        }
    }

    /**
     * This function is used to add and update users
     * @return Void
     */
    public function add_edit($id='') {

        $data = $this->input->post();
        $profile_pic = 'user.png';
        if($this->input->post('users_id')) {
            $id = $this->input->post('users_id');
        }
        if(isset($this->session->userdata ('user_details')[0]->users_id)) {
            if($this->input->post('users_id') == $this->session->userdata ('user_details')[0]->users_id){
                $redirect = 'profile';
            } else {
                $redirect = 'userTable';
            }
        } else {
            $redirect = 'login';
        }
        if($this->input->post('fileOld')) {  
            $newname = $this->input->post('fileOld');
            $profile_pic =$newname;
        } else {
            $data[$name]='';
            $profile_pic ='user.png';
        }
        foreach($_FILES as $name => $fileInfo)
        { 
             if(!empty($_FILES[$name]['name'])){
                $newname=$this->upload(); 
                $data[$name]=$newname;
                $profile_pic =$newname;
             } else {  
                if($this->input->post('fileOld')) {  
                    $newname = $this->input->post('fileOld');
                    $data[$name]=$newname;
                    $profile_pic =$newname;
                } else {
                    $data[$name]='';
                    $profile_pic ='user.png';
                } 
            } 
        }
        if($id != '') {
            $data = $this->input->post();
            if($this->input->post('status') != '') {
                $data['status'] = $this->input->post('status');
            }
            if($this->input->post('users_id') == 1) { 
            $data['user_type'] = 'admin';
            }
            if($this->input->post('password') != '') {
                if($this->input->post('currentpassword') != '') {
                    $old_row = getDataByid('users', $this->input->post('users_id'), 'users_id');
                    if(password_verify($this->input->post('currentpassword'), $old_row->password)){
                        if($this->input->post('password') == $this->input->post('confirmPassword')){
                            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                            $data['password']= $password;     
                        } else {
                            $this->session->set_flashdata('messagePr', 'Password and confirm password should be same...');
                            redirect( base_url().'user/'.$redirect, 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('messagePr', 'Enter Valid Current Password...');
                        redirect( base_url().'user/'.$redirect, 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('messagePr', 'Current password is required');
                    redirect( base_url().'user/'.$redirect, 'refresh');
                }
            }
            $id = $this->input->post('users_id');
            unset($data['fileOld']);
            unset($data['currentpassword']);
            unset($data['confirmPassword']);
            unset($data['users_id']);
            unset($data['user_type']);
            if(isset($data['edit'])){
                unset($data['edit']);
            }
            if($data['password'] == ''){
                unset($data['password']);
            }
            $data['profile_pic'] = $profile_pic;
            $this->User_model->updateRow('users', 'users_id', $id, $data);
            $this->session->set_flashdata('messagePr', 'Your data updated Successfully..');
            redirect( base_url().'user/'.$redirect, 'refresh');
        } else { 
            if($this->input->post('user_type') != 'admin') {
                $data = $this->input->post();
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $checkValue = $this->User_model->check_exists('users','email',$this->input->post('email'));
                if($checkValue==false)  {  
                    $this->session->set_flashdata('messagePr', 'This Email Already Registered with us..');
                    redirect( base_url().'user/userTable', 'refresh');
                }
                $checkValue1 = $this->User_model->check_exists('users','name',$this->input->post('name'));
                if($checkValue1==false) {  
                    $this->session->set_flashdata('messagePr', 'Username Already Registered with us..');
                    redirect( base_url().'user/userTable', 'refresh');
                }
                $data['status'] = 'active';
                if(setting_all('admin_approval') == 1) {
                    $data['status'] = 'deleted';
                }
                
                if($this->input->post('status') != '') {
                    $data['status'] = $this->input->post('status');
                }
                //$data['token'] = $this->generate_token();
                $data['user_id'] = $this->user_id;
                $data['password'] = $password;
                $data['profile_pic'] = $profile_pic;
                $data['is_deleted'] = 0;
                if(isset($data['password_confirmation'])){
                    unset($data['password_confirmation']);    
                }
                if(isset($data['call_from'])){
                    unset($data['call_from']);    
                }
                unset($data['submit']);
                $this->User_model->insertRow('users', $data);
                redirect( base_url().'user/'.$redirect, 'refresh');
            } else {
                $this->session->set_flashdata('messagePr', 'You Don\'t have this autherity ' );
                redirect( base_url().'user/registration', 'refresh');
            }
        }
    
    }

    /**
      * This function is used to logout user
      * @return Void
      */
    public function profiles(){
        // is_login();
        // $this->session->unset_userdata('user_details'); 


        $this->load->admin_template('profiles');
    }

    /**
      * This function is used to logout user
      * @return Void
      */
    public function logout(){
        is_login();
        $this->session->unset_userdata('user_details');               
        redirect( base_url().'user/login', 'refresh');
    }
}
