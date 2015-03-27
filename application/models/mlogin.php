<?php
  class Mlogin extends CI_Model{
    public function __construct(){
      parent::__construct();
    }
    function checkuser($user){
      $condition = array('username' => $user['username'], 'password' => $user['password']);
      $this->db->where($condition);
      $query = $this->db->get('user');
      if ($query->num_rows() == 1){
        return true;
      }
      else
      {
        return false;
      }
    }
  }
?>
