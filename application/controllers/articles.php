<?php
  class Articles extends CI_Controller{
    public function __construct(){
      parent::__construct();
      varify_session();
      $this->load->Model("Marticle");
    }

    // get list article
    public function index(){
      $temp['title']="Nguyen Van Dung";
      $temp['template']="articles/index";
      $config['base_url'] = base_url('index.php/articles/page');
      $config['total_rows'] = $this->Marticle->count_article();
      $config['per_page'] = 5;
      $config['use_page_numbers'] = TRUE;
      $start = ($this->uri->segment(3)=='') ? 0 : (5 * ($this->uri->segment(3) - 1));
      $this->load->library('pagination', $config);
      $pagination = $this->pagination->create_links();
      $temp['data']['pagination'] = $pagination;
      if($search_text = $this->input->get('search_text')){
        $temp['data']['articles'] = $this->Marticle->search($search_text);
      }else{
        $temp['data']['articles'] = $this->Marticle->list_article($config['per_page'], $start);
      }
      $this->load->view("layouts/layout", $temp);
    }

    //show article
    function show(){
      $id = $this->uri->segment(2);
      $temp['template']="articles/show";
      $temp['data']['article'] = $this->Marticle->getInfo($id);
      $this->load->view("layouts/layout", $temp);
    }

    // create article
    function create(){
      $temp['title']="Create article";
      $this->form_validation->set_rules("title", "Title", "required");
      $this->form_validation->set_rules("content", "Content", "required");
      
      $temp['data']['error'] = "";
      $temp['template']="articles/create";
      if($this->form_validation->run() == false){
        $this->load->view("layouts/layout", $temp);
      }
      else
      {
        $message = "";
        $image_path = "./uploads/images/";
        $config = array(
          'allowed_types' => 'jpg|jpeg|gif|png',
          'upload_path' => $image_path,
          'encrypt_name' => TRUE
        );
        $this->upload->initialize($config);
        $this->load->library('upload' , $config);
        if (!$this->upload->do_upload())
        {
          $error = array('error' => $this->upload->display_errors());
        }
        else
        {
          $image_data = $this->upload->data();
          $add = array(
            "title" => $this->input->post("title"),
            "content" => $this->input->post("content"),
            "user_id" => "18",
            "sub_categories_id" => $this->input->post("sub_categories_id"),
            "image_name" => $image_data['file_name']
            );
          if($this->Marticle->add_article($add)){
            $message = "Create success <br/>".
            redirect(base_url()."index.php/articles/".$id);
          }
        }
      }
    }

    function get_category(){
      $category_id = $this->input->post('category_id');
      $this->db->where('category_id', $category_id);
      $query = $this->db->get('sub_categories');
      $result = $query->result();
      echo json_encode($result);
    }

    function del_article(){
      $id = $this->uri->segment(3);
      if (is_numeric($id)) {
        $this->Marticle->delArticle($id);
        redirect(base_url()."index.php/articles");
      }
      else
      {
        redirect(base_url()."index.php/articles");
      }
    }
/*
    function edit_user(){
      $temp['title']="Update user";
      $temp['data']['userid'] = $id = $this->uri->segment(3);
      $temp['template']="users/edit_user";
      $temp['data']['info'] = $this->Muser->getInfo($id);
      if(is_numeric($id) && $temp['data']['info']!=null)
        {
          if(isset($_POST['ok']))
          {
            $this->form_validation->set_rules("username","Username","required|min_length[6]|callback_checkUser");
            $this->form_validation->set_rules("password","Password","matches[repassword]");
            $temp['data']['error'] = "";
            if($this->form_validation->run()==false){
              $this->load->view("layouts/layout", $temp);
            }else{
              $update = array(
                "username"  => $this->input->post("username"),
              );
              if($this->input->post("password")!="")
              {
                $update['password'] = md5($this->input->post("password"));
              }
              $message = "";
              if($this->Muser->updateUser($update,$id)){
                $message = "Updated success <br/>".
                redirect(base_url()."index.php/users/".$id);
              }
            }
          }
          else
          {
            $this->load->view("layouts/layout", $temp);
          }
      }
      else
      {
        // $data['report'] = "Đường dẫn không hợp lệ";
        redirect(base_url()."index.php/users");
      }
    }

    //delete user
    function del_user(){
      $id = $this->uri->segment(3);
      if (is_numeric($id)) {
        $this->Muser->delUser($id);
        redirect(base_url()."index.php/users");
      }
      else
      {
        redirect(base_url()."index.php/users");
      }
    }

    function checkUser($username)
    {
      if($this->Muser->getUser($username)==TRUE){
        return TRUE;
      }
      else{
        $this->form_validation->set_message("checkUser","Your username has been register, please try again");
        return FALSE;
      }
    }
    */
  }
?>