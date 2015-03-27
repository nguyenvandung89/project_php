<?php defined("BASEPATH") or exit("No direct script access allowed");

  class Migrate extends CI_Controller {
    public function index() {
      if (ENVIRONMENT == 'development') {
        $this->load->library('migration');
        if ( !$this->migration->latest()) {
          show_error($this->migration->error_string());
        } else {
          echo "success";
        }
      } else {
        echo "go away";
      }
    }
  }
?>