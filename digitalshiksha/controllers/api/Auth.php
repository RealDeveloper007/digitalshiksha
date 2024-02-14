<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Auth extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->CI = & get_instance();
		$this->load->model('login_model');
        $this->load->library('form_validation');
		$this->load->library('email');

	}

	public function send_otp_post()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        $this->form_validation->set_rules('type', 'Sending Type', 'required');
        $this->form_validation->set_rules('type_value', 'Phone OR Email', 'required');

		// print_r($_POST); die;

        if ($this->post('type') == 'mobile') {
            $this->form_validation->set_rules('type_value', 'Phone No', 'required|min_length[10]|is_unique[users.user_phone]');
        } else {
            $this->form_validation->set_rules('type_value', 'Email Address', 'required|valid_email|is_unique[users.user_email]');
        }

        if ($this->form_validation->run() === FALSE)
		{
			$this->response([
				'status' => false,
				'message' => $this->validation_errors(),
				'data' => ['type' => 'validation_error']
			], 200);

        } else {


            if ($this->post('otp')) 
			{
                $GetOTP = true;

            } else {

                if ($this->post('type') == 'mobile') 
				{
                    $GetOTP =  $this->SendOTP($this->post('type_value'));

                } else {

                    $GetOTP =  $this->SendOtpOnEmail($this->post('type_value'));

                }
            }

            if ($GetOTP) 
			{
                $SaveOtpData =  $this->login_model->saveOtps($GetOTP);

                if ($SaveOtpData['status']) 
				{
					if($SaveOtpData['insert_id'] != null)
					{
						$this->response([
							'status' => true,
							'data' => ['type'=>$SaveOtpData['type'],'user_id'=>$SaveOtpData['insert_id'],'token'=>md5($SaveOtpData['insert_id'])],
						], 200);

					} else {

						$this->response([
							'status' => true,
							'data' => ['type'=>'otp_checked'],
						], 200);

					}

                } else {

					$this->response([
						'status' => false,
						'data' => ['type'=>$SaveOtpData['type']],
					], 200);
                }
            } else {

				$this->response([
					'status' => false,
					'data' => ['type'=>'otp_not_sent'],
				], 200);
            }
        }
    }

	public function register_user_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[4]|max_length[25]');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('user_phone', 'Phone No', 'required|min_length[10]|is_unique[users.user_phone]');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) 
		{
			$this->response([
				'status' => false,
				'message' => $this->validation_errors(),
			], 200);


        } else {

            $row = $this->db->where(['MD5(id)' => $this->input->post('token_data')])->get('register_otp')->result();

            date_default_timezone_set($this->session->userdata['time_zone']);
            $info = array();
            $info['user_name'] = $this->input->post('user_name');
            $info['user_email'] = $this->input->post('user_email');
            $info['user_phone'] = $this->input->post('user_phone');
            $info['user_role_id'] = $this->input->post('user_type');
            $info['user_pass'] = md5($this->input->post('user_pass'));
            //$info['confirm_password'] = $this->input->post('user_pass');
            $info['user_from'] = date('Y-m-d H:i:s');
            $info['active']    = $this->input->post('user_type') == 5 ? 1 : 0;

            if (isset($row[0])) 
			{
                $info['register_otp_id']    = $row[0]->id;
            }

            // Check athentication
            if ($this->login_model->register($info)) 
			{
				$CheckLogin = $this->login_model->login_check_in_api_new_one();
                if ($CheckLogin['status']) 
				{
				    if($this->input->post('user_type') == 5)
				    {
					    $CheckLogin['data']->login_access_url = base_url('login_access').'?email='.$this->input->post('user_email').'&user_pass='.$this->input->post('user_pass').'&role='.$this->input->post('user_type');
					    $SuccessMsg = 'Your details has been registered successfully.';
				    } else {
				        $CheckLogin['data']->login_access_url = null;
				        $SuccessMsg = 'Your details has been saved & your account will be approved by admin';

				    }

					$this->response([
						'status' => true,
						'message' => [$SuccessMsg],
						'data'=>$CheckLogin['data']
					], 200);
                } else {

					$this->response([
						'status' => false,
						'message' => [$CheckLogin['message']],
					], 200);

				}
            }
        }
    }

	public function login_post()
    {
		$this->load->library('form_validation');
		if (is_numeric($this->input->post('user_email'))) 
		{
			$this->form_validation->set_rules('user_email', 'Phone no', 'min_length[10]');
		} else {
			$this->form_validation->set_rules('user_email', 'Email', 'valid_email');
		}

		$this->form_validation->set_rules('user_pass', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) 
		{
			$this->response([
				'status' => false,
				'message' => $this->validation_errors(),
			], 200);


        } else {

            // Check athentication
				$CheckLogin = $this->login_model->login_check_in_api();
                if ($CheckLogin['status']) 
				{
					$CheckLogin['data']->login_access_url = base_url('login_access').'?email='.$this->input->post('user_email').'&user_pass='.$this->input->post('user_pass').'&role='.$CheckLogin['data']->user_role_id;

					$this->response([
						'status' => true,
						'message' => ['डिजिटल शिक्षा में आपका स्वागत है, आप लॉगिन हो चुके हैं'],
						'data'=>$CheckLogin['data']
					], 200);
                } else {

					$this->response([
						'status' => false,
						'message' => [$CheckLogin['message']],
					], 200);

				}
        }
    }

	private function SendOTP($mobile)
    {
        $OTP = rand(11111, 99999);
        $username = "ksmalik60@gmail.com";
        $hash = "b2a89c0a6ffc29d6763bad25d529cd67bdac282305853259abe9c365cf72b120";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        // $test = "0";

        // Data for text message. This is the text message data.
        $sender = "DIGISD"; // This is who the message appears to be from.
        $numbers = "91" . $mobile; // A single number or a comma-seperated list of numbers
        $SendOtp = $OTP;
        $message = "Dear Customer, Your OTP is " . $SendOtp . ". Kindly keep is secret for login. www.digitalshikshadarpan.com";
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers;
        $ch = curl_init('https://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        $result = json_decode($result);


        if ($result->status == true) {
            return $SendOtp;
        } else {

            return false;
        }

        curl_close($ch);
    }

	private function SendOtpOnEmail($email)
    {
        date_default_timezone_set("Asia/Kolkata");

        $OTP = rand(11111, 99999);
        $Date = date('d-m-Y') . '@' . date('h:i:s a');
        $from = 'info@digitalshikshadarpan.com';
        $to = $email;
        $suject = 'OTP Sent on ' . $Date . ' | ' . 'Digital Shiksha Darpan';
        $Data['name'] = '';
        $Data['brand'] = 'Digital Shiksha Darpan';
        $Data['brand_phone'] = '9813710460';
        $Data['brand_address'] = 'Ambala Haryana India';
        $Data['otp'] = $OTP;

        $config = array(
            // 'protocol' => 'smtp',
            // 'smtp_host'   => 'ssl://smtp.googlemail.com',
            // 'smtp_port' => 465,
            // 'smtp_user' => 'digitalshikshadarpan@gmail.com', 
            // 'smtp_pass' => '9996441188', 
            'mailtype'    => 'html',
            'crlf'        => "\n",
            'newline'     => "\r\n",
            'charset'     => 'utf-8',
            'wordwrap'    => TRUE
        );

        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@digitalshikshadarpan.com');
        $this->email->to($to);
        $this->email->subject($suject);

        $body = $this->load->view('emails/verify.php', $Data, TRUE);

        $this->email->message($body);
        if ($this->email->send()) {
            return $Data['otp'];
        } else {
            return false;
        }
    }


    public function forgot_password_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('value', 'Email Address/Phone', 'required');
        if($this->form_validation->run() == FALSE) 
		{
			$this->response([
				'status' => false,
				'message' => $this->validation_errors(),
			], 200);

        } else {

            $value = $this->input->post('value');
            $this->load->model('user_model');
            if ($this->user_model->check_user_exist($value)) 
            {
                $UserDetails = $this->user_model->get_user_details_by_email($value);
                $to = $value;
                $suject = 'Password reset request';

				$ForgotOTP = rand(11111, 99999);

				$this->db->where('user_id', $UserDetails->user_id);
				$UpdateOTP = $this->db->update('users', ['forgot_otp'=>$ForgotOTP]);

				$Data['otp'] = $ForgotOTP;
				$Data['name'] = $UserDetails->user_name;

				$this->load->library('email');

                $config = array(
                    'mailtype'    => 'html',
                    'crlf'        => "\n",
                    'newline'     => "\r\n",
                    'charset'     => 'utf-8',
                    'wordwrap'    => TRUE
                );

                $this->email->initialize($config);
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('info@digitalshikshadarpan.com');
                $this->email->to($to);
                $this->email->subject($suject);

                $body = $this->load->view('emails/forgot_by_otp.php', $Data, TRUE);
                $this->email->message($body);

                if ($this->email->send()) 
				{
					$this->response([
						'status' => true,
						'message' => ['Password reset otp sent to your email address! Check your inbox or spam.'],
					], 200);

                } else {

					$this->response([
						'status' => false,
						'message' => ['An ERROR occurred! Please try again.'],
					], 200);
                }
                
                // check by phone
            } else if($this->user_model->check_user_exist_by_phone($value)) {
                
                    $phone = $value;
                
                    $UserDetails = $this->user_model->get_user_details_by_phone($phone);
                    
                    $ForgotOTP =  $this->SendOTP($phone);                    

                     $this->db->where('user_id', $UserDetails->user_id);
                     $UpdateOTP = $this->db->update('users', ['forgot_otp'=>$ForgotOTP]);
                     
                     if($UpdateOTP)
                     {
							$this->response([
								'status' => true,
								'message' => ['OTP sent on your mobile no.'],
							], 200);

                     } else {
                         
						  $this->response([
							'status' => false,
							'message' => ['Sorry! Something went wrong. Please try again'],
						], 200);                        
                         
                     }
                
            } else {
                
				$this->response([
					'status' => false,
					'message' => ['User not exist!'],
				], 200);    
                
            }
        }
    }

	public function reset_password_by_mobile_post()
    {
        $this->load->library('form_validation');
         $this->form_validation->set_rules('otp', 'OTP', 'required');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE) 
		{                            
				 $this->response([
					'status' => false,
					'message' => $this->validation_errors(),
				], 200);    
            
        } else {
            
               $phone = $this->input->post('phone');

                $this->load->model('user_model');
                $Response = $this->user_model->reset_password_by_phone($this->input->post('phone'));
                
                if ($Response) 
                {
                    if($Response == 'password_change')
                    {					                       
						$this->response([
							'status' => true,
							'message' => ['Password reset successfully!.'],
						], 200);    
            
                    } else if($Response == 'password_not_change') {

							$this->response([
								'status' => false,
								'message' => ['Password not changed.  Please try again'],
							], 200);   
                        
                    } else {
                        
						$this->response([
								'status' => false,
								'message' => ['Password not changed.  Please try again OTP is invaild.'],
							], 200);   
                        
                    }
                } else {


					$this->response([
						'status' => false,
						'message' => ['An ERROR occurred! Please try again.'],
					], 200);  
                }

        }
    }

	public function reset_password_by_email_post()
    {
        $this->load->library('form_validation');
         $this->form_validation->set_rules('otp', 'OTP', 'required');
        $this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[6]|matches[user_passcf]');
        $this->form_validation->set_rules('user_passcf', 'Confirm Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE) 
		{                            
				 $this->response([
					'status' => false,
					'message' => $this->validation_errors(),
				], 200);    
            
        } else {
            
               $email = $this->input->post('email');
			   
                $this->load->model('user_model');
                $Response = $this->user_model->reset_password_by_email($this->input->post('email'));
                
                if ($Response) 
                {
                    if($Response == 'password_change')
                    {					                       
						$this->response([
							'status' => true,
							'message' => ['Password reset successfully!.'],
						], 200);    
            
                    } else if($Response == 'password_not_change') {

							$this->response([
								'status' => false,
								'message' => ['Password not changed.  Please try again'],
							], 200);   
                        
                    } else {
                        
						$this->response([
								'status' => false,
								'message' => ['Password not changed.  Please try again OTP is invaild.'],
							], 200);   
                        
                    }
                } else {


					$this->response([
						'status' => false,
						'message' => ['An ERROR occurred! Please try again.'],
					], 200);  
                }

        }
    }

	public function menu_data_post()
	{
	    if($this->input->post('user_type') == 5)
	    {
	    $Routes = [
						[
						    'name'=>'Home', 
						    'url'=>'https://digitalshikshadarpan.com/home',
						    'image'=>''
						],
						[
						    'name'=>'About_US', 
						    'url'=>'https://digitalshikshadarpan.com/about-us',
						    'image'=>''
						],
						[
						    'name'=>'Mock_Test',
						    'url'=>'https://digitalshikshadarpan.com/mock-test',
						    'image'=>''
						],
						[
						    'name'=>'Study_Material', 
						    'url'=>'https://digitalshikshadarpan.com/study-material',
						    'image'=>''
						],
						[
						    'name'=>'FAQ',
						    'url'=>'https://digitalshikshadarpan.com/faq',
						    'image'=>''
						],
						[
						    'name'=>'Digital_Search_Engine', 
						    'url'=>'https://digitalshikshadarpan.com/digital-shiksha-search-engine',
						    'image'=>''
						],
					    [
					        'name'=>'Dashboard', 
					        'url'=>'https://digitalshikshadarpan.com/dashboard/',
					        'image'=>''
					    ],
					    [
					        'name'=>'View_Results', 
					        'url'=>'https://digitalshikshadarpan.com/exam_control/view_results',
					        'image'=>''
					    ],
					    [
					        'name'=>'Profile_Settings', 
					        'url'=>'https://digitalshikshadarpan.com/admin_control',
					        'image'=>''
					    ],
					    [
					        'name'=>'Batch_Request', 
					        'url'=>'https://digitalshikshadarpan.com/exam_control/batch_request',
					        'image'=>''
					    ],
					    [
					        'name'=>'Join_Batch', 
					        'url'=>'https://digitalshikshadarpan.com/exam_control/join_batch',
					        'image'=>''
					    ],
					    [
					        'name'=>'Contact_Help_Desk', 
					        'url'=>'https://digitalshikshadarpan.com/message_control',
					        'image'=>''
					    ],
					    [
					        'name'=>'Logout', 
					        'url'=>'https://digitalshikshadarpan.com/login_control/logout',
					        'image'=>''
					    ],
				];
				
				$this->response([
			'status'    => true,
			'message'   => 'All frontend/backend menus',
			'data' 		=> $Routes], 200); 
			
	    } else {
				
		$Routes = [
							[
							    'name'=>'Home',
							    'url'=>'https://digitalshikshadarpan.com/home',
							    'image'=>''
							],
							[
							    'name'=>'About_US',
							    'url'=>'https://digitalshikshadarpan.com/about-us',
							    'image'=>''
							],
							[
							    'name'=>'Mock_Test',
							    'url'=>'https://digitalshikshadarpan.com/mock-test',
							    'image'=>''
							],
							[
							    'name'=>'Study_Material',
							    'url'=>'https://digitalshikshadarpan.com/study-material',
							    'image'=>''
							],
							[
							    'name'=>'FAQ',
							    'url'=>'https://digitalshikshadarpan.com/faq',
							    'image'=>''
							],
							[
							    'name'=>'Digital_Search_Engine',
							    'url'=>'https://digitalshikshadarpan.com/digital-shiksha-search-engine',
							    'image'=>''
							],
        					[
        					    'name'=>'Dashboard',
        					    'url'=>'https://digitalshikshadarpan.com/dashboard/',
        					    'image'=>''
        					],
        					[
        					    'name'=>'List_of_batches',
        					    'url'=>'https://digitalshikshadarpan.com/batches',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Student_request',
        					    'url'=>'https://digitalshikshadarpan.com/admin_control/student_batch_request',
        					    'image'=>''
        					],
        					[
        					    'name'=>'View_mock_test',
        					    'url'=>'https://digitalshikshadarpan.com/mocks/mock_test',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Create_mock_test',
        					    'url'=>'https://digitalshikshadarpan.com/admin_control/create_mock/mock_test',
        					    'image'=>''
        					],
        					[
        					    'name'=>'View_results',
        					    'url'=>'https://digitalshikshadarpan.com/exam_control/view_results',
        					    'image'=>''
        					],
        					[
        					    'name'=>'View_live_test',
        					    'url'=>'https://digitalshikshadarpan.com/mocks/live_mock_test',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Create_live_test',
        					    'url'=>'https://digitalshikshadarpan.com/admin_control/create_mock/live_mock_test',
        					    'image'=>''
        					],
        					[
        					    'name'=>'View_sub_sub_categories',
        					    'url'=>'https://digitalshikshadarpan.com/admin_control/view_sub_subcategories',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Create_sub_sub_categories',
        					    'url'=>'https://digitalshikshadarpan.com/admin_control/sub_subcategory_form',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Profile_Settings',
        					    'url'=>'https://digitalshikshadarpan.com/admin_control',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Contact_Help_Desk',
        					    'url'=>'https://digitalshikshadarpan.com/message_control',
        					    'image'=>''
        					],
        					[
        					    'name'=>'Logout',
        					    'url'=>'https://digitalshikshadarpan.com/login_control/logout',
        					    'image'=>''
        					],
				];
				
				$this->response([
			'status'    => true,
			'message'   => 'All frontend/backend menus',
			'data' 		=> $Routes], 200); 
	    }
		
	}

    
  
	// public function register_post()
	// {
	// 	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	// 	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

	// 	if ($this->form_validation->run()) {
		    
	// 		if ($user = $this->register($this->post('username'), $this->post('password'))) 
	// 		{
	// 			$data = ['user_id'=>$user,'email'=>$this->post('username')];
			    
	// 		    $SaveDetails = $this->Model_aaa_sender->saveDetails($data);

	// 		    if($SaveDetails)
	// 		    {

	// 				$this->response([
	// 					'status' => true,
	// 					'message' => 'Register successfully!. Verification link has been sent on your mail id',
	// 				], 200);

	// 			} else {

	// 				$this->response([
	// 					'status' => false,
	// 					'message' => 'Sender details are not saved due to some issue',
	// 				], 200);
	// 			}


	// 		} else {
	// 			$this->response([
	// 				'status' => false,
	// 				'message' => $this->aauth->print_errors(TRUE)
	// 			], 200);
	// 		}
	// 	} else {
	// 		$this->response([
	// 				'status' => false,
	// 				'message' => validation_errors()
	// 			], 200);
	// 	}
	// }

	/**
	 * @api {post} /user/login User login authentication.
	 * @apiVersion 0.1.0
	 * @apiName LoginUser
	 * @apiGroup User
	 * @apiHeader {String} X-Api-Key Users unique access-key.
	 * @apiPermission none
	 *
	 * @apiParam {String} Username Mandatory username of Users.
	 * @apiParam {String} Password Mandatory password of Users.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of user.
	 * @apiSuccess {String} Token token for access api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError InvalidCredential The username or password is invalid.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	// public function login_post()
	// {
	// 		// $this->response([
	// 		// 		'status' => false,
	// 		// 		'message' => $_SERVER["CONTENT_TYPE"]
	// 		// 	], 200);

	// 			// $json = file_get_contents('php://input');

	// 			// $this->response([
	// 			// 	'status' => false,
	// 			// 	// 'message' => json_decode($json)
	// 			// 	'message' => $_SERVER["CONTENT_TYPE"]
	// 			// ], 200);


	// 			// $_POST = json_decode($json);
	// 	// $_POST = json_decode(file_get_contents("php://input"), true);

	// 	 $this->form_validation->set_rules('user_id', 'user_id','required|trim|xss_clean');
	// 	// // // $this->form_validation->set_rules('password', 'Password', 'trim|required');

	// 	 if ($this->form_validation->run()) 
	// 	 {
	// 		// if ($user = $this->login($this->post('username'), $this->post('password'))) {
			    
	// 	        $token = $this->jwtEncode(['id' => $this->post('user_id')]);
		        
	// 			$decoded = $this->getUser($token);
				
	// 			if($decoded)
	// 			{

    // 				$this->response([
    // 					'status' => true,
    // 					'message' => 'Login successfully',
    // 					'data' => $decoded,
    // 					'token' => $token
    // 				], 200);
				
	// 			} else {
				    
	// 			    	$this->response([
	// 				'status' => false,
	// 				'message' => 'Your account is not activated'
	// 			], 200);
				    
	// 			}

	// 		// } else {
	// 		// 	$this->response([
	// 		// 		'status' => false,
	// 		// 		'message' => $this->aauth->print_errors(TRUE)
	// 		// 	], 200);
	// 		// }
				
	// 	} else {
	// 		$this->response([
	// 				'status' => false,
	// 				'message' => validation_errors()
	// 			], 200);
	// 	}
	// }

	public function check_version_get()
    {
        //ios,android
        if($this->get('type')=='ios')
        {
            if($this->get('version') == '1.0')
            {

                $this->response([
					'status' => true,
					'message' => 'Version Matched'
				], 200);

            } else {

                 $this->response([
					'status' => false,
					'message' => 'Version not Matched',
				], 200);

            }
        } else if($this->get('type')=='android') {

            if($this->get('version') == '2.3')
            {

                return $this->respond([
                            'status'    => true,
                            'message'   => 'Version Matched',
                        ]);
            } else {

                return $this->respond([
                            'status'    => false,
                            'message'   => 'Version not Matched',
                        ]);

            }

        }


    }
	
	public function reset_password_post()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		if ($this->form_validation->run()) 
		{
			if ($ResetPassword = $this->reset_password($this->post('username'))) {

    				$this->response([
    					'status' => true,
    					'message' => 'Password has been reset successfully! Link sent on your mail id also.',
    				], 200);
				

			} else {
				$this->response([
					'status' => false,
					'message' => 'this mail id is not found'
				], 200);
			}
		} else {
			$this->response([
					'status' => false,
					'message' => $this->validation_errors()
				], 200);
		}
	}

	/**
	 * @api {post} /user/request_token User authentication get token.
	 * @apiVersion 0.1.0
	 * @apiName GetTokenUser
	 * @apiGroup User
	 * @apiHeader {String} X-Api-Key Users unique access-key.
	 * @apiPermission none
	 *
	 * @apiParam {String} Username Mandatory username of Users.
	 * @apiParam {String} Password Mandatory password of Users.
	 *
	 * @apiSuccess {String} Token token for access api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError InvalidCredential The username or password is invalid.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function request_token_post()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run()) {
			if ($user = $this->login($this->post('username'), $this->post('password'))) {
				
		        $token = $this->jwtEncode(['id' => $user->id]);
		        $exp = $this->config->item('sess_expiration');
				$this->response([
					'status' => true,
					'message' => 'Token generated',
					'data' => [
						'token' => $token,
						'expiration' => [
							'seconds' => $exp,
							'hours' => $exp / (60 * 60),
						]
					]
				], 200);

			} else {
				$this->response([
					'status' => false,
					'message' => $this->aauth->print_errors(TRUE)
				], API::HTTP_NOT_ACCEPTABLE);
			}
		} else {
			$this->response([
					'status' => false,
					'message' => $this->validation_errors()
				], API::HTTP_NOT_ACCEPTABLE);
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/api/User.php */