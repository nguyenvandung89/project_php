<?php
  class Muser extends CI_Model{
    public function __construct(){
      parent::__construct();
    }

    // get all user in table user
    public function list_user($per_page, $start){
      $this->db->limit($per_page, $start);
      $query = $this->db->get('user');
      return $query->result_array();
    }

    // count number record in table user
    public function count_user(){
      return $this->db->count_all('user');
    }

    //insert user
    public function add_user($add){
      if ($this->db->insert('user', $add)){
        return true;
      }
      else {
        return false;
      }
    }

    // get user by username
    function getUser($username){
      // if(isset($username)){ //use for update
      //   $this->db->where("username",$username);
      //   $query = $this->db->get('user');
      // }
      // else{ //user for add
        $this->db->where("username",$username);
        $query = $this->db->get('user');
      // }
      
      if($query->num_rows()!=0){
        return FALSE;
      }
      else{
        return TRUE;
      }
    }

    // get user by id
    function getInfo($id){
      $this->db->where("id",$id);
      $query = $this->db->get('user');
      if ($query) {
        return $query->row_array();
      }
      else
      {
        return false;
      }
    }

    //update user
    function updateUser($data,$id){
      $this->db->where("id",$id);
      if($this->db->update('user', $data))
        return true;
      else
        return false;
    }

    function delUser($id){
      $this->db->where("id", $id);
      $this->db->delete("user");
    }
  }
?>
