<?php

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
    }

    public function index()
    {
        $this->load->view('upload_form', array(
            'error' => ' '
        ));
    }

    public function do_upload()
    {
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 100;//单位 kb
        $config['max_width']        = 2000;
        $config['max_height']       = 2000;
        $config['file_name']       = time();
        
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('userfile'))
        {
//             $error = array('error' => $this->upload->display_errors());
        
//             $this->load->view('upload_form', $error);
            
            echo $this->upload->display_errors();
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
            echo "成功！";
           
        }
    }
}

?>