<?php
    session_start();

    function flash($name='', $message='', $class='alert alert-success'){
        //make sure there's a name set in session like $_SESSION['register_sucess']
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
                //unset
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }
                if(!empty($_SESSION[$name.'_class'])){
                    unset($_SESSION[$name.'_class']);
                }

                //reset
                $_SESSION[$name]=$message;
                $_SESSION[$name.'_class']=$class;

            }else if(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class']:'';
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }

    function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
    }