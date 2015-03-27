<?php
  class Rankings extends CI_Controller{
    public function __construct(){
      parent::__construct();
    }

    public function index(){
      $this->load->view("rankings/index", array('error' => ''));
    }

    function upload(){
      $config['upload_path'] = "./uploads/images/";
      $config['allowed_types'] = 'jpg|jpeg|gif|png';
      $this->upload->initialize($config);
      $this->load->library('upload' , $config);
      if (!$this->upload->do_upload())
      {
        // die(realpath(APPPATH. "../uploads/images"));
        $error = $this->upload->display_errors();
        $this->load->view("rankings/index", array('error' => $error));
      }
      else
      {
        $image_data = $this->upload->data();
        $data['img'] = base_url().'uploads/images/'.$image_data['file_name'];
        $this->load->view("rankings/success", $data);
      }
    }
  }
?>