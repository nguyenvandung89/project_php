<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  function varify_session(){
  	$CI = &get_instance();
    $user_session_id = $CI->session->userdata('logged_in');

    if($user_session_id ==  '') {
  	  redirect(base_url()."index.php/login");
    }
  }
?>