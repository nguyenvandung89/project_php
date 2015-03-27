<?php
  class Users extends CI_Controller{
    public function __construct(){
      parent::__construct();
      varify_session();
      $this->load->Model("Muser");
      $this->output->enable_profiler(TRUE);
    }

    // get list user
    public function index(){
      $temp['title']="Nguyen Van Dung";
      $temp['template']="users/index";
      $config['base_url'] = base_url('index.php/users/page');
      $config['total_rows'] = $this->Muser->count_user();
      $config['per_page'] = 5;
      $config['use_page_numbers'] = TRUE;
      $start = ($this->uri->segment(3)=='') ? 0 : (5 * ($this->uri->segment(3) - 1));
      $this->load->library('pagination', $config);
      $pagination = $this->pagination->create_links();
      $temp['data']['pagination'] = $pagination;
      $temp['data']['users'] = $this->Muser->list_user($config['per_page'], $start);
      $this->load->view("layouts/layout", $temp);
    }

    //show user
    function show(){
      $id = $this->uri->segment(2);
      $temp['template']="users/show";
      $temp['data']['user'] = $this->Muser->getInfo($id);
      $this->load->view("layouts/layout", $temp);
    }

    // create user
    public function add_user(){
      $temp['title']="Create user";
      $this->form_validation->set_rules("username", "UserName", "required|min_length[6]|callback_checkUser");
      $this->form_validation->set_rules("password", "Password", "required|matches[repassword]");
      $temp['data']['error'] = "";
      $temp['template']="users/add_user";
      if($this->form_validation->run() == false){
        $this->load->view("layouts/layout", $temp);
      }
      else
      {
        $add = array(
          "username" => $this->input->post("username"),
          "password" => md5($this->input->post("password"))
          );
        $message = "";
        if($this->Muser->add_user($add)){
          $message = "Create success <br/>".
          redirect(base_url()."index.php/users/".$id);
        }
      }
    }

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
  }
?>