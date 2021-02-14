<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Login Admin';
        $this->load->view('login/index', $data);
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek_login = $this->login_model->login($username, $password);

        if ($cek_login) {
            foreach ($cek_login as $row);
            $this->session->set_userdata('id_user', $row->id_user);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('level', $row->level);

            if ($this->session->userdata('level') == "admin") {
                redirect('CAdmin\index');
            } else if ($this->session->userdata('level') == "supervisor") {
                redirect('CSupervisor\index');
            } else if ($this->session->userdata('level') == "operator") {
                redirect('Operator\index');
            }
        } else {
            $data['pesan'] = 'Username dan Password Anda Salah';
            $data['title'] = 'Login Admin';
            $this->load->view('login/index', $data);
            // redirect('CLogin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('CLogin');
    }
}
