<?php
  class Users extends Controller {
    public function __construct(){
      //connect from database
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = '您尚未填寫信箱';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = '信箱已被註冊，會員請登入';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = '您尚未填寫姓名';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = '密碼必須是六個字以上的英文或數字';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = '請再次輸入相同密碼';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = '輸入密碼必須相同，請重新輸入';
          }
        }

        // Validated
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('register_success', '您已成功註冊');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = '您尚未填寫信箱';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = '您尚未輸入密碼';
        }

        //check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          //user found
        }else{
          $data['email_err']='信箱尚未註冊';
        }

        // Validated
        if(empty($data['email_err']) && empty($data['password_err'])){
          // check and set logged in user
          $loggedInUser =$this->userModel->login($data['email'], $data['password']);
          //is found 
          if($loggedInUser){
            //create session
            $this->createUserSession($loggedInUser);
          }else{
            $data['password_err']='密碼錯誤';
            $this->view('users/login', $data);
          }
          
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }
    
    public function createUserSession($user){
        $_SESSION['user_id']=$user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;
        redirect('members/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

  }