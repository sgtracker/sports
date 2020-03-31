<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'html', 'cookie', 'custom', 'array', 'message_sender_helper'));
    }

    public function index() {

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

    public function verify_otp() {
        if ($this->input->post('otp') == "") {
            echo json_encode(array('status' => false, 'message' => 'Please enter an OTP code'));
            die;
        }
        if ($this->input->post('otp') != $this->session->userdata('otp')) {
            echo json_encode(array('status' => false, 'message' => 'Wrong OTP code'));
            die;
        }
        $this->db->where('id', $this->input->post('user_id'));
        $this->db->update('users', ['otp_verify' => 1]);
        $result = $this->db->get_where('users', ['id' => $this->input->post('user_id')])->row_array();
        if ($result) {
            $newdata = array(
                'active_user_flag' => True,
                'active_user_id' => $result['id'],
                'active_sm_userdata' => $result
            );
            $this->session->set_userdata($newdata);
            $this->send_welcome_mail($result);
            echo json_encode(array('status' => true, 'message' => 'Successfully Registered'));
            die;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Something went wrong'));
            die;
        }
    }

    public function send_welcome_mail($data) {
        $input['email'] = $data['email'];
        $input['subject'] = "Welcome to Sunil Minglani";
        // $input['body'] = "Welcome to sunil Minglani";
        $input['body'] = $this->load->view('emailer/welcome_new_registration', $data, True);
        //pre($input); die;
        $send = send_custom_email($input);
        if ($send) {
            return true;
        } else {
            return false;
        }
    }

    public function verify_otp_for_password() {
        if ($this->input->post('otp') == "") {
            echo json_encode(array('status' => false, 'message' => 'Please enter an OTP code'));
            die;
        }
        if ($this->input->post('otp') != $this->session->userdata('verify_otp')) {
            echo json_encode(array('status' => false, 'message' => 'Wrong OTP code'));
            die;
        }
        $this->db->where('id', $this->input->post('user_id'));
        $this->db->update('users', ['otp_verify' => 1]);
        $result = $this->db->get_where('users', ['id' => $this->input->post('user_id')])->row_array();
        if ($result) {

//            $newdata = array(
//                'active_user_flag' => True,
//                'active_user_id' => $result['id'],
//                'active_sm_userdata' => $result
//            );
//            $this->session->set_userdata($newdata);
            echo json_encode(array('status' => true, 'message' => 'Success', 'user_id' => $result['id']));
            die;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Something went wrong'));
            die;
        }
    }

    public function send_otp_mail($data) {
        $input['email'] = $data['email'];
        if (isset($data['mail_type']) && $data['mail_type'] == 1) {
            $input['subject'] = "SUNIL MINGLANI Singup OTP";
            $view_page = 'emailer/otp_for_sign_up';
        } else {
            $input['subject'] = "SUNIL MINGLANI forgot password OTP";
            $view_page = 'emailer/email_for_change_password';
        }
        // $input['body'] = "Welcome to sunil Minglani";
        $input['body'] = $this->load->view($view_page, $data, True);
        //pre($input); die;
        $send = send_custom_email($input);
        if ($send) {
            return true;
        } else {
            return false;
        }
    }

    public function change_password() {
        if ($this->input->get('sdfsdf')) {
            $user_id = base64_decode($this->input->get('sdfsdf'));
            if ($this->input->post()) {
                $password = md5($this->input->post('password'));
                $this->db->where('id', $user_id);
                $this->db->update('users', ['password' => $password]);
                $this->db->where('id', $user_id);
                $result = $this->db->get('users')->row_array();
                $newdata = array(
                    'active_user_flag' => True,
                    'active_user_id' => $result['id'],
                    'active_sm_userdata' => $result
                );
                $this->session->set_userdata($newdata);
                redirect('web_panel/Userlogin/home');
            }
        } else {
            redirect('web_panel/Userlogin/home');
        }
        $this->load->view('include/change_password');
    }

    public function is_email_exist() {
        if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('status' => false, 'message' => 'Please enter an valid email'));
            die;
        }
        //$filter['email'] = $this->input->post('email');
        $email = $this->input->post('email');
        $this->db->select('id,name,mobile,email');
        $result = $this->db->get_where('users', ['email' => $email])->row_array();
        //$result = $this->User_model->get_user($filter);
        if ($result) {
            echo json_encode(array('status' => false, 'message' => 'Email already exist choose another'));
            die;
        } else {
            echo json_encode(array('status' => true, 'message' => 'Email not exist'));
            die;
        }
    }

    public function is_mobile_exist() {
        if (strlen(($this->input->post('mobile'))) < 10) {
            echo json_encode(array('status' => false, 'message' => 'Please enter an valid email'));
            die;
        }
        //$filter['mobile'] = $this->input->post('mobile');
        $mobile = $this->input->post('email');
        $this->db->select('id,name,mobile,email');
        $result = $this->db->get_where('users', ['mobile' => $mobile])->row_array();
        //$result = $this->User_model->get_user($filter);
        if ($result) {
            echo json_encode(array('status' => false, 'message' => 'Mobile number already exist choose another'));
            die;
        } else {
            echo json_encode(array('status' => true, 'message' => 'Mobile number not exist'));
            die;
        }
    }

    public function verify_email() {
        if ($this->input->post('email') == '') {
            echo json_encode(array('status' => false, 'message' => 'Please enter an email or mobile number'));
            die;
        }
//        if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
//            echo json_encode(array('status' => false, 'message' => 'Please enter an valid email'));
//            die;
//        }

        $email = $this->input->post('email');
        //$this->db->select('id,name,mobile,email');
        $this->db->where('email', $email);
        $this->db->or_where('mobile', $email);
        $result = $this->db->get('users')->row_array();
        //$result = $this->db->get_where('users', ['email' => $email])->row_array();
        //pre($result); die;
        if ($result) {
            $otp = rand(1000, 9999);
            $this->session->set_userdata('verify_otp', $otp);
            $msg = "Your otp is $otp";
            send_message_global($result['c_code'], $result['mobile'], $msg);
            $input['email'] = $result['email'];
            $input['otp'] = $otp;
            $input['mail_type'] = 2;
            $this->send_otp_mail($input);
            echo json_encode(array('status' => true, 'message' => 'success', 'user_id' => $result['id']));
            die;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Mobile Number Not Registered'));
            die;
        }
    }

    public function get_country_list() {
        $this->db->order_by('name', 'ASC');
        return $this->db->get('countries')->result_array();
    }

//    public function ajax_get_state_list() {
//        $selected_id = "";
//        if (isset($this->session->userdata['step2_verfication'])) {
//            $this->db->join('service_provider_detail', 'service_provider_detail.user_id = users.id');
//            $user = $this->db->get_where('users', array('users.id' => $this->session->userdata['step2_verfication']['table1']))->row_array();
//            //pre($data['result']);die;
//            $selected_id = $user['state'];
//        }
//        $this->db->order_by('name', 'ASC');
//        $this->db->where('country_id', $this->input->post('country_id'));
//        $states = $this->db->get('states')->result_array();
//        echo '<option>Please select State</option>';
//        if ($states) {
//            foreach ($states as $state) {
//                $selected = "";
//                if ($state['id'] == $selected_id) {
//                    $selected = "selected";
//                }
//                echo '<option ' . $selected . ' value="' . $state['id'] . '">' . $state['name'] . '</option>';
//            }
//        }
//    }

    public function ajax_get_city_list() {
        $this->db->order_by('city', 'ASC');
        $this->db->where('state_id', $this->input->post('state_id'));
        $cities = $this->db->get('master_cities')->result_array();
        echo '<option value="0">Select City</option>';
        if ($cities) {
            foreach ($cities as $city) {
                echo '<option value="' . $city['id'] . '">' . $city['city'] . '</option>';
            }
        }
    }

    public function ajax_get_state_list() {
        $this->db->order_by('state', 'ASC');
        $this->db->where('country_id', $this->input->post('country_id'));
        $cities = $this->db->get('master_states')->result_array();
        echo '<option value="0">Select State</option>';
        if ($cities) {
            foreach ($cities as $city) {
                echo '<option value="' . $city['id'] . '">' . $city['state'] . '</option>';
            }
        }
    }

}
