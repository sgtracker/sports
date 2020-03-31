<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('sendsms_helper');
		$response = sendsms( '919918xxxxxx', 'test message', true); 
//             $response =   send_message_global($user['c_code'], $user['mobile'], $msg);
		echo $response;

	}
        
        public function verify()
	{
		$this->load->helper('sendsms_helper');
		$response = verify( '919918xxxxxx', 'test message', true); 
//             $response =   send_message_global($user['c_code'], $user['mobile'], $msg);
		echo $response;

	}
        
         public function index7() {
         $this->load->helper('sendsms_helper');
        if ($this->input->post()) {
            //$input = $this->input->post('formdata');
            $inputs = parse_formdata($this->input->post());
            //pre($inputs);            die;
            if (isset($inputs['email']) && !empty($inputs['email'])) {
                $inputs['email'] = str_replace("%40", "@", $inputs['email']);
            }
            if ($inputs['name'] == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please enter your name'));
                die;
            }
            if ($inputs['email'] == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please enter your valid email'));
                die;
            }
//            if (filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
//                echo json_encode(array('status' => 0, 'message' => 'Please enter an valid email'));
//                die;
//            }
            if ($inputs['mobile'] == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please enter your mobile number'));
                die;
            }
            if (strlen($inputs['mobile']) < 10) {
                echo json_encode(array('status' => 0, 'message' => 'Enter mobile 10 digit mobile number'));
                die;
            }
            if ($inputs['password'] == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please enter password'));
                die;
            }
            if (strlen($inputs['password']) < '8') {
                echo json_encode(array('status' => 0, 'message' => 'Enter password atleast 8 character'));
                die;
            }

            if ($inputs['city_id'] == 0) {
                echo json_encode(array('status' => 0, 'message' => 'Please select city'));
                die;
            }
            if ($inputs['user_type'] == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please select User registration type'));
                die;
            }
            //$this->db->where('email',$inputs('email'));
            $email_result = $this->db->get_where('users', ['email' => $inputs['email']])->row_array();
            if (isset($email_result['otp_verify']) && $email_result['otp_verify'] == 1) {
                echo json_encode(array('status' => 0, 'message' => 'This Email already exist'));
                die;
            }
            //$this->db->where('mobile',$inputs('mobile'));
            $mobile_result = $this->db->get_where('users', ['mobile' => $inputs['mobile']])->row_array();
            if (isset($mobile_result['otp_verify']) && $mobile_result['otp_verify'] == 1) {
                echo json_encode(array('status' => 0, 'message' => 'This Mobile number already exist'));
                die;
            }
            if ((isset($email_result['otp_verify']) && $email_result['otp_verify'] == 0) || (isset($mobile_result['otp_verify']) && $mobile_result['otp_verify'] == 0)) {
                $otp = rand(1000, 9999);
                if (isset($email_result['id'])) {
                    $user_id = $email_result['id'];
                    $user['c_code'] = $email_result['c_code'];
                    $user['mobile'] = $email_result['mobile'];
                } else {
                    $user_id = $mobile_result['id'];
                    $user['c_code'] = $mobile_result['c_code'];
                    $user['mobile'] = $mobile_result['mobile'];
                }
                $msg = "Your otp is $otp";
                send_message_global($user['c_code'], $user['mobile'], $msg);

                $this->session->set_userdata('otp', $otp);
                echo json_encode(array('status' => 1, 'user_id' => $user_id, 'message' => 'Please verify your mobile number'));
                die;
            }

//            unset($inputs['c_password'], $inputs['captcha_code']);
//            $this->db->where('id', $inputs['country_id']);
//            $country_code = $this->db->get('master_countries')->row()->country_code;
            $inputs['email'] = strtolower($inputs['email']);
            //$inputs['c_code'] = $country_code;
            $inputs['password'] = md5($inputs['password']);
            $inputs['status'] = 1;
            $inputs['creation_time'] = time() . "000";
            // pre($inputs); die;
            $this->db->insert('users', $inputs);
            $user_id = $this->db->insert_id();
            if ($user_id) {
                $user = $this->db->get_where('users', ['id' => $user_id])->row_array();
                $otp = rand(1000, 9999);
                $msg = "Your otp is $otp";
                send_message_global($user['c_code'], $user['mobile'], $msg);
                $this->session->set_userdata('otp', $otp);
                echo json_encode(array('status' => 1, 'user_id' => $user_id, 'message' => 'Registered successfully ! Please verify your moblie number'));
                die;
            } else {
                echo json_encode(array('status' => 0, 'message' => 'Registered Unsuccessfull'));
                die;
            }
        }
    }
}
