<?php
  class Marticle extends CI_Model{
    public function __construct(){
      parent::__construct();
    }

    // get all article in table article
    public function list_article($per_page, $start){
      $this->db->limit($per_page, $start);
      $query = $this->db->get('articles');
      return $query->result_array();
    }

    public function search($search_text){
      $this->db->like('title', $search_text);
      $this->db->or_like('content', $search_text);
      $query = $this->db->get('articles');
      return $query->result_array();
    }

    // count number record in table article
    public function count_article(){
      return $this->db->count_all('articles');
    }

    //insert article
    public function add_article($add){
      if ($this->db->insert('articles', $add)){
        return true;
      }
      else {
        return false;
      }
    }

    // get article by id
    function getInfo($id){
      $this->db->where("id",$id);
      $query = $this->db->get('articles');
      if ($query) {
        return $query->row_array();
      }
      else
      {
        return false;
      }
    }

    //update article
    function updatearticle($data,$id){
      $this->db->where("id",$id);
      if($this->db->update('articles', $data))
        return true;
      else
        return false;
    }

    public function do_upload($image_name)
    {
      die($image_name);
      $image_path = realpath(FCPATH. "/uploads/images");
      $config = array(
        'allowed_types' => 'jpg|jpeg|gif|png',
        'upload_path' => $image_path
      );
      $this->load->library('upload' , $config);
      if (!$this->upload->do_upload($image_name))
      {
        $error = array('error' => $this->upload->display_errors());
        die($this->upload->display_errors());
      }
      else
      {
        $image_data = $this->upload->data();
        return $image_data['file_name'];
      }
    }

    function delArticle($id)
    {
      $this->db->where("id", $id);
      $this->db->delete("articles");
    }
  }
?>
