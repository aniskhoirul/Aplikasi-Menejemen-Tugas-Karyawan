<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'message' => 'Form harus diisi.'
            ]);
        }else{
            $email = $this->input->post('email', TRUE);
            $password = md5($this->input->post('password', TRUE));
            $where = array('tb_karyawan.email' => $email, 'tb_karyawan.pasword' => $password);

            $this->db->select('*');
            $this->db->from('tb_karyawan');
            $this->db->join('tb_jabatan', 'tb_karyawan.id_jabatan = tb_jabatan.id_jabatan');
            // $this->db->where($where);
            $this->db->where('tb_karyawan.email', $email);
            $this->db->where('tb_karyawan.pasword', $password);

            $data = $this->db->get();
            if ($data->num_rows() > 0) {
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'data' => $data->row()
                ]);
            }else{
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Email atau Password salah'
                ]);
            }
        }

    }
}